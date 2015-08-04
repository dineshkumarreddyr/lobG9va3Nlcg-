
	 'use strict';
	var slider;
		slider = new PercisionSlider('slider', { value :500, max: 3000, input: 'slider-display', prefix : 'Rs.' });
	function PercisionSlider(element, options)
	{
		this.element = null,
		this.handle = null,
		this.base = null,
		this.targetX = 0,
		this.clickOffset = 0,
		this.baseOffset = 0,
		this.elementRect = null,
		this.baseRect = null,
		this.handleRect = null,
		this.ease = 5,
		this.dragging = false,
		this.maxHandleX = 0,
		this.min = 0,
		this.max = 100,
		this.spacing = 100,
		this.zoom = 2,
		this.input = null,
		this.value = 0,

		this.init = function(element, options)
		{
			var self = this;

			if(options)
			{
				this.min = options.min ? options.min : 0;
				this.max = options.max ? options.max : 100;
				this.value = options.value ? options.value : 0;
				this.zoom = options.zoom ? options.zoom : this.zoom;
				this.input = options.input ? document.getElementById(options.input) : null;
				this.prefix = options.prefix ? options.prefix : '';
			}

			this.element = document.getElementById(element);
			this.element.innerHTML = '<div class="base"></div><span class="handle"></span><div class="fade-left"></div><div class="fade-right"></div>';

			this.handle = this.element.getElementsByTagName('span')[0];
			this.base = this.element.getElementsByTagName('div')[0];

			window.onresize = function(e){ self.resize(); };
			this.handle.onmousedown = function(e){ e.preventDefault(); self.startHandleDrag(e); };
			this.base.onmousedown = function(e){ e.preventDefault(); self.setPositionFromBase(e); };
			if(this.input) this.input.onblur = this.input.onkeyup = function(e){ self.inputChange(e); };
		},

		this.setPositionFromBase = function(e)
		{
			if(e.toElement !== this.base) return;
			var self = this;

			this.targetX = e.layerX;

			this.updateInterval = window.setInterval(function(){ self.updateHandle(); }, 10);

			setTimeout(function(){ if(!self.dragging) window.clearInterval(self.updateInterval); }, 200);
		},

		this.startHandleDrag = function(e)
		{
			this.dragging = true;

			var handleLeftMargin = getComputedStyle(this.handle).marginLeft;
			var handleMargin = parseInt(handleLeftMargin.replace('px',''));

			this.clickOffset = e.layerX+handleMargin;

			var self = this;
			document.onmousemove = function(e){ self.updateDrag(e); };
			document.onmouseup = function(e){ self.stopHandleDrag(e); };

			this.updateInterval = window.setInterval(function(){ self.updateHandle(); }, 1);

			if(this.zoom > 0) this.zoomIn();
		},

		this.stopHandleDrag = function(e)
		{
			this.dragging = false;
			document.onmousemove = null;
			document.onmouseup = null;

			if(this.zoom > 0) this.zoomOut();

			var self = this;
			setTimeout(function(){ if(!self.dragging) window.clearInterval(self.updateInterval); }, 200);
		},

		this.updateDrag = function(e)
		{
			this.targetX = (e.x-this.clickOffset-this.baseOffset);
		},

		this.updateHandle = function()
		{
			var left = parseInt(this.handle.style.left.replace('px', ''));
			if(isNaN(left)) left = 0;

			var positionX = Math.max(0, Math.min(left+((this.targetX-left)/this.ease), this.maxHandleX));

			this.handle.style.left = positionX+'px';

			var percent = positionX / this.maxHandleX;
			this.value = Number(this.max * percent).toFixed(2);

			if(this.dragging)
			{
				var newMargin = percent*-(this.zoom * 100);
				this.base.style.marginLeft = newMargin+'%';
				this.labels.style.marginLeft = newMargin+'%';
			}

			this.updateDisplay();
		},

		this.resize = function()
		{
			this.elementRect = this.element.getBoundingClientRect();
			this.baseRect = this.element.getBoundingClientRect();
			this.handleRect = this.handle.getBoundingClientRect();
			this.baseOffset = this.elementRect.left;
			this.maxHandleX = this.baseRect.width;
		},

		this.setValue = function(value)
		{
			if(value.length == 0 || String(value).slice(-1) === '.') return;

			value = parseFloat(value);
			this.value = Math.max(0, Math.min(this.max, value));
			this.value = isNaN(this.value) ? 0 : this.value;

			var self = this;

			this.targetX = (this.baseRect.width * (this.value / this.max));

			this.handle.style.left = this.targetX+'px';

			this.updateDisplay();
		},

		this.updateDisplay = function()
		{
			if(!this.input) return;

			var selectStart = this.input.selectionStart,
			selectEnd = this.input.selectionEnd;

			this.input.value = this.prefix+this.value;
			this.input.setSelectionRange(selectStart, selectEnd);
		},

		this.inputChange = function(e)
		{
			if(e.type == 'keyup')
			{
				if(e.which >= 37 && e.which <= 40) return;
			}

			var value = this.input.value.replace(this.prefix, '');
			this.setValue(value);
		},

		this.createLabels = function()
		{
			var labels = '';
			var totalLabel = Math.max(this.max / this.spacing)+1;
			var adjustedSpacing = this.spacing * (100 / this.max);

			for(var i = 0; i < totalLabel; i++) labels += '<li style="left:'+(i*adjustedSpacing)+'%"><i></i><em>'+(i*this.spacing)+'</em></li>';

			this.element.insertAdjacentHTML('beforeend', '<ul>'+labels+'</ul>');

			this.labels = this.element.getElementsByTagName('ul')[0];
		},

		this.zoomIn = function()
		{
		var self = this;
		var timing = this.zoom * .1;
		var newWidth = 100+(this.zoom * 100);
		var newMargin = (parseInt(this.handle.style.left.replace('px','')) / this.maxHandleX)*-(100+(this.zoom * 100));

		var zoomStyle = 'width: '+newWidth+'%; margin-left:'+newMargin+'%; -webkit-transition: all '+timing+'s ease-in; -moz-transition: all '+timing+'s ease-in; -o-transition: all '+timing+'s ease-in; transition: all '+timing+'s ease-in;';

		this.base.setAttribute('style', zoomStyle);
		this.labels.setAttribute('style', zoomStyle);
		this.labels.className = 'show';

		this.base.addEventListener( 'webkitTransitionEnd', function(e)
		 {
			var zoomStyle = 'width: '+self.base.style.width+'%; margin-left:'+self.base.style.marginLeft+'%; -webkit-transition: all 0s ease-in; -moz-transition: all 0s ease-in; -o-transition: all 0s ease-in; transition: all 0s ease-in;';
			self.base.setAttribute('style', zoomStyle);
			self.labels.setAttribute('style', zoomStyle);
		 }, false );
		},

		this.zoomOut = function()
		{
			this.base.removeAttribute('style');
			this.labels.removeAttribute('style');

			this.labels.className = '';
		}

		this.init(element, options);
		this.resize();
		this.setValue(this.value);
		this.createLabels();
	}

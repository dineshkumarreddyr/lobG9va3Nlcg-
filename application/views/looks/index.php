		<div class="slideshow listing-slider">
		<div id="slideshow" class="carousel slide carousel-fade" data-ride="carousel" 
		data-interval="3000">
		<div class="carousel-inner">
		<div class="item active">
		<img class="img-responsive" src="<?php echo base_url();?>assets/images/listing.jpg" alt="First Slide">
		</div><!-- /. Item Active -->
		</div><!-- /. Carousel-Inner -->
		</div><!-- /# Slideshow .Carousel -->
		</div><!-- /. Slideshow -->
		</div><!-- /. Container -->
		</div><!-- /# Mastehead -->  
	<!--slider ends-->
		
	<div class="filters-top-wrap">
	  <div class="container">
	      <div class="row">
	      <form method="get" action="">
		    <div class="col-md-5"><input type="text" name="s" id="search" tabindex="1"
			class="form-control" placeholder="Search by Product, Look and Designer" value="<?php if(isset($_GET['s'])) { echo strip_tags($_GET['s']); } ?>"></div>
			<div class="col-md-2">
             <div class="dropdown dropdown-dark">
				<select name="gender" id="s_gen" class="dropdown-select">
					<option value="">Gender</option>
					<?php
					$genders = array('Male'=>'Male', 'Female'=>'Female');
					foreach ($genders as $key => $gender) {
						?>
					<option value="<?php echo $key; ?>" <?php if(isset($_GET['gender'])) { echo ($_GET['gender'] == $key) ? 'selected="selected"' : ''; } ?> ><?php echo $gender; ?></option>
						<?php
					}
					?>
				</select>
			   </div>
			 </div>
			 
			<div class="col-md-3">
			  <div class="dropdown dropdown-dark">
				<select name="category" class="dropdown-select">
				  <option value="">Category</option>
				  <?php
					foreach ($lcategories as $key => $lcategory) {
						?>
						<option value="<?php echo $lcategory->lc_id; ?>" <?php if(isset($_GET['category'])) { echo ($_GET['category'] == $lcategory->lc_id) ? 'selected="selected"' : ''; } ?>><?php echo $lcategory->lc_name; ?></option>
						<?php
					}
					?>
				</select>
				</div>
			  </div>
			<div class="col-md-2"><button type="submit" name="search" id="search">Search</button></div>
			</form>
		  </div>
		 </div> 
	</div>
	
	<!-- filtred products -->
	<h2 class="heads">Explore our looks</h2>
	<div class="container products-wrap">
	 <div class="row">
	 <div class="col-md-3 clearfix filters-left"> 
	 	<?php // echo $this->load->view('looks/filter', $lcategories); ?>
	   <h4>by Categories</h4>
	   <ul class="f_cat">
		 <?php
		foreach ($lcategories as $key => $lcategory) {
			?>
			<li><input id='f_cat<?php echo $lcategory->lc_id; ?>' name="f_cat" value="<?php echo $lcategory->lc_id; ?>" type='checkbox' onclick="lf_search();" />
				<label for='f_cat<?php echo $lcategory->lc_id; ?>'><span></span><?php echo $lcategory->lc_name; ?>
				</label>
			</li>
			<?php
		}
		?>
		</ul>
		
	   <!-- <div class="clearfix">&nbsp;</div>
	   <h4>By Provider</h4>
	   <ul>
		 <li><input id='six' type='checkbox' />
			<label for='six'><span></span>Myntra
			<ins><i>Myntra</i></ins></label></li>
        <li><input id='seven' type='checkbox' />
			<label for='seven'><span></span>Flipkart
			<ins><i>Flipkart</i></ins></label></li>
        <li><input id='eight' type='checkbox' />
			<label for='eight'><span></span>Jabong
			<ins><i>Jabong</i></ins></label></li>
		<li><input id='eight' type='checkbox' />
			<label for='eight'><span></span>Yepme
			<ins><i>Yepme</i></ins></label></li>
		<li><input id='eight' type='checkbox' />
			<label for='eight'><span></span>Fashionara
			<ins><i>Fashionara</i></ins></label></li>
		</ul> -->
		
	 <!-- <div id="budget-wrapper">
	   <h4>Budget <input type="text" id="slider-display" name="slider-display" value="0" /></h4>
	   <div id="slider"></div>
	 </div> -->
	 
	 <!-- <div class="clearfix">&nbsp;</div>
	 <h4>by Color &nbsp;<select name="colorpicker-picker-longlist">
	  <option value="#ac725e">#ac725e</option>
	  <option value="#d06b64">#d06b64</option>
	  <option value="#f83a22">#f83a22</option>
	  <option value="#fa573c">#fa573c</option>
	  <option value="#ff7537">#ff7537</option>
	  <option value="#ffad46">#ffad46</option>
	  <option value="#42d692">#42d692</option>
	  <option value="#16a765">#16a765</option>
	  <option value="#7bd148">#7bd148</option>
	  <option value="#b3dc6c">#b3dc6c</option>
	  <option value="#fbe983">#fbe983</option>
	  <option value="#fad165">#fad165</option>
	  <option value="#92e1c0">#92e1c0</option>
	  <option value="#9fe1e7">#9fe1e7</option>
	  <option value="#9fc6e7">#9fc6e7</option>
	  <option value="#4986e7">#4986e7</option>
	  <option value="#9a9cff">#9a9cff</option>
	  <option value="#b99aff">#b99aff</option>
	  <option value="#c2c2c2">#c2c2c2</option>
	  <option value="#cabdbf">#cabdbf</option>
	  <option value="#cca6ac">#cca6ac</option>
	  <option value="#f691b2">#f691b2</option>
	  <option value="#cd74e6">#cd74e6</option>
	  <option value="#a47ae2">#a47ae2</option>
	</select></h4> -->
	 
	 
	  <!-- <div class="clearfix">&nbsp;</div>
	  <h4>Size</h4>
	  <div class="sizes clearfix">
	  <input type="radio" name="size" id="small" value="small" checked="checked" /> 
      <label for="small">S</label>
      <input type="radio" name="size" id="medium" value="medium" />     
      <label for="medium">M</label>
      <input type="radio" name="size" id="large" value="large" />     
      <label for="large">L</label>
      <input type="radio" name="size" id="xlarge" value="xlarge" />     
      <label for="xlarge">XL</label>
	  <input type="radio" name="size" id="xxlarge" value="xxlarge" />     
      <label for="xlarge">XXL</label>
	  </div> -->
	 </div>
	 <!--filters left end-->
	 
	 <div class="col-md-9 looks-list-wrap" id="looks_wrapper">

    <?php if (count($looks)): ?>
    <?php foreach ($looks as $key => $look): ?>
	  <a href="<?php echo base_url('looks/view/'.$look['l_id']); ?>">
	  <div class="col-md-3 col-xs-6 trend-each">


		      <?php if(count($look['l_products']) == 5): ?>
	    <div class="pattern<?php echo count($look['l_products']); ?>">
	    	<div class="pattern5-left">
		  <ul>
		    <?php $i=1; foreach ($look['l_products'] as $key => $lp): ?>
			<li><img data-original="<?php echo $lp->p_image;?>" class="img-responsive lazy"></li>
			<?php if($i==3):  ?>
				</ul>
	    	</div>

	    	<div class="pattern5-right">
				<ul>
			<?php endif; $i++ ?>
			<?php endforeach; ?>
		  </ul>
	    	</div>
		</div>
      <?php else: ?>
	    <div class="pattern<?php echo count($look['l_products']); ?>">
		  <ul>
		    <?php foreach ($look['l_products'] as $key => $lp): ?>
			<li><img data-original="<?php echo $lp->p_image;?>" class="img-responsive lazy"></li>
			<?php endforeach; ?>
		  </ul>
		</div>
      <?php endif; ?>




		<h4><?php echo $look['l_title']; ?></h4>
		<div class="col-md-12 text-center">
		<?php if($look['l_mrp'] != '' && $look['l_mrp'] > 0): ?>
		<span class="mrp"><?php echo $look['l_mrp']; ?></span>
		<?php endif; ?>
		<span class="aftrdsnt"><span class="webrupee">Rs.</span><?php echo $look['l_price']; ?></span>
		</div>
	  </div>
	  </a>
	<?php endforeach; ?>
	<?php else: ?>
		No Looks found..
	<?php endif; ?>
   </div>	  
   </div>
   </div>
   </div>
	<!-- trending products -->
	
	
	<!--top designers carousel-->
	<div class="carousel-designers">
		<div class="container text-center">
		<div class="carousel-head"><a href="#">top designers</a></div>
			<div class="row">
				<div id="carousel-reviews" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
					<?php
					for ($i=0, $j=0; $i < count($tdesigners); $i++) { 
						?>
						<div class="item active">
						  <ul>
						  <?php
						  foreach ($tdesigners as $key => $tdesigner) {
						  	?>
							<a href="<?php echo base_url('designer/'.$tdesigner->user_id); ?>">
							<li class="col-md-3 col-sm-6">
							   <div class="designer">
								<!-- <div class="count girl">02</div> -->
								<div class="designer-image">
								   <img src="<?php echo base_url();?>uploads/designers/<?php echo ($tdesigner->user_image == '') ? 'default.jpg' : $tdesigner->user_image; ?>" class="img-responsive">
								</div>
								<h3><?php echo $tdesigner->user_fname; ?></h3>
								<div class="rating"><img src="<?php echo base_url();?>assets/images/rating.png"></div>
								<h4><strong>+<?php echo $tdesigner->l_count; ?></strong> Looks Created</h4>
							  </div>
							</li>		
							</a>						  	
						  	<?php
						  	$j++;
						  	if($j%4 == 0) {
						  		break;
						  	}
						  }
						  if($i<$j) {
						  		break;
						  	}
						  ?>
						  </ul>
						</div>   
					<?php
					}
					?>                
					</div>
					<a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
						<img src="<?php echo base_url();?>assets/images/left.png" width="20">
					</a>
					<a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
						<img src="<?php echo base_url();?>assets/images/right.png" width="20">
					</a>
				</div>
			</div>
		</div>
	</div>
	<!--top designers carousel-->

<script type="text/javascript">
	function lf_search() {
		var f_cat = [];
		$('.f_cat input:checked').each(function() {
		    f_cat.push($(this).val());
		});

		// var f_prov = [];
		// $('.f_prov input:checked').each(function() {
		//     f_prov.push($(this).val());
		// });

		var s_input = {};
		s_input['f_cat'] = f_cat;
		// s_input['f_prov'] = f_prov;

		$.ajax({
			type:"POST",
			url:'<?php echo base_url("looks/lf_ajax");?>',
			data:s_input,
			dataType:"json",
			success: function(data){
				// console.log(data);
				generate_looks(data);
			},
		  error: function(e) {
			//called when there is an error
			console.log(e.message);
		  }
		});
	}

	function generate_looks (looks) {
		var content = '';
		if(looks.length == 0) {
			content = 'No Products found...';
		}
		$.each(looks, function(index, look){
			var base_url = '<?php echo base_url("looks/view");?>';
			content += '<a href="'+ base_url +'/'+ look.l_id+'">'+
					  '<div class="col-md-3 trend-each">'+
				    	'<div class="pattern'+look.l_products.length+'">'+
						  '<ul>';
		  	$.each(look.l_products, function(index, lp){
				content += '<li><img src="'+lp.p_image+'" class="img-responsive"></li>';
			});


			content +=	  '</ul>'+
						'</div>'+
						'<h4>'+look.l_title+'</h4>'+
						'<div class="col-md-12 text-center"><span class="mrp">'+look.l_mrp+'</span>'+
						'<span class="aftrdsnt"><span class="webrupee">Rs.</span>'+look.l_price+'</span></div>'+
					  '</div>'+
					  '</a>';
		});

		$('#looks_wrapper').html(content);
	}
</script>
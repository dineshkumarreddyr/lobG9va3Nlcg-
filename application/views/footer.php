
	<div class="clearfix"></div>
			<div class="footer">
            <div class="container">
               <div class="col-md-7 col-sm-7 footer-left">
                  <div class="col-md-3">
                     <div class="footer-list">
                     <h3>COMPANY</h3>
                        <ul>
                          <li><a href="<?php echo base_url(); ?>">HOME</a></li>
                          <li><a href="javascript:;">ASTROLOGY</a></li>
                          <li><a href="javascript:;">YOGA</a></li>
                          <li><a href="javascript:;">IMMEDIATE HELP</a></li>
                          <li><a href="javascript:;">VIDEOS</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="footer-list">
                     <h3>WEBSITE</h3>
                        <ul>
                          <li><a href="index.html">ABOUT US</a></li>
                          <li><a href="javascript:;">CORPORATE</a></li>
                          <li><a href="javascript:;">WISH LIST</a></li>
                          <li><a href="javascript:;">ORDER TRACKING</a></li>
                          <li><a href="javascript:;">CAREERS</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="footer-list">
                     <h3>POLICIES</h3>
                        <ul>
                          <li><a href="index.html">PRIVACY POLICY</a></li>
                          <li><a href="javascript:;">TERMS & CONDITIONS	</a></li>
                          <li><a href="javascript:;">DELIVERY POLICY</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="footer-list">
                     <h3>HELP</h3>
                        <ul>
                          <li><a href="index.html">SUPPORT</a></li>
                          <li><a href="javascript:;">855.255.2011</a></li>
                          <li><a href="mailto:info@cosmicweb.com?Subject=Hello%20again" target="_top">info@cosmicweb.com</a></li>
                          <li><a href="javascript:;">LIST YOUR SPACE</a></li>
                          <li><a href="javascript:;">CONTACT US</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               
               <div class="col-md-5 col-sm-5 social">
                  <h3>CONNECT ONLINE</h3>
                    <ul>
                       <li><a href="javascript:;"><img src="<?php echo base_url();?>assets/images/fb1.png" width="10" alt="social icons"></a></li>
                       <li><a href="javascript:;"><img src="<?php echo base_url();?>assets/images/ftw.png" alt="social icons"></a></li>
                       <li><a href="javascript:;"><img src="<?php echo base_url();?>assets/images/gplus.png" alt="social icons"></a></li>
                       <li><a href="javascript:;"><img src="<?php echo base_url();?>assets/images/yt.png" alt="social icons"></a></li>
                       <li><a href="javascript:;"><img src="<?php echo base_url();?>assets/images/sc.png" alt="social icons"></a></li>
                       <li><a href="javascript:;"><img src="<?php echo base_url();?>assets/images/fl.png" alt="social icons"></a></li>
                    </ul>
                  <h3>STAY IN THE LOOP</h3>
                  <form action="#">
              <div class="input-group ">
                 <input class="btn btn-lg" name="email" id="email" type="email" placeholder="" required>
                 <button class="btn btn-info btn-lg" type="submit">Submit</button>
              </div>
             </form>
               </div>
              </div>
            </div><!--end of footer-->
	
	       <div class="copy">
			    <div class="container">
				  <div class="col-md-7">&copy; 2015 Fashionoo | ALL RIGHTS RESERVED</div>
				  <div class="col-md-5 icons">
				    <ul>
					  <li><a href="#"><img src="<?php echo base_url();?>assets/images/tw.png"></a></li>
					  <li><a href="#"><img src="<?php echo base_url();?>assets/images/tw.png"></a></li>
					</ul>
				  </div>
				</div>
			  </div>
	

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>	
	<script src="<?php echo base_url();?>assets/js/budget.js"></script>
	<script src="<?php echo base_url();?>assets/js/color.js"></script>
	<script>$('.carousel').carousel();</script>
	<script>
      function contentSwitcher(settings){
		var settings = {
		   contentClass : '.content',
		   navigationId : '#created-categ'
		};
	   $(settings.contentClass).not(':first').hide();
	   $(settings.navigationId).find('li:first').addClass('active');
	   $(settings.navigationId).find('a').click(function(e){

			var contentToShow = $(this).attr('href');
			contentToShow = $(contentToShow);
			e.preventDefault();
			$(settings.navigationId).find('li').removeClass('active');
			$(this).parent('li').addClass('active');
			$(settings.contentClass).hide();
			contentToShow.show();
		});
	}
	contentSwitcher();
	</script>
	<script>
		$(document).ready(function() {
		$('#Carousel').carousel({
			interval: 5000
		})
	});
	</script>
	
	<!--color-->
	<script>
	$(document).ready(function() {
		$('select[name="colorpicker-longlist"]').simplecolorpicker();
		$('select[name="colorpicker-picker-longlist"]').simplecolorpicker({picker: true, theme: 'glyphicons'});

	  $('#destroy').on('click', function() {
		$('select').simplecolorpicker('destroy');
	  });
	});
	</script>
	<!--color-->
	

  </body>
</html>
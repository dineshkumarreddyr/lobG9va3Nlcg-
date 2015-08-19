
		<div class="designerslide">
		<div id="slideshow" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000">
		  <div class="carousel-inner">
		    <div class="item active">
		       <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/designer.jpg" alt="First Slide">
		    </div>
		  </div>
		</div><!-- /. Slideshow -->
		</div>
		</div><!-- /. Container -->
		</div><!-- /# Mastehead -->  
	<!--slider ends-->
		
	<!--designer top-->    
    <div class="container designertop-main">
      <div class="row">
        <div class="col-md-1 no-pad">
           <div class="designerpro-img">
              <img src="<?php echo base_url(); ?>assets/images/d4.jpg" class="img-responsive">
              <div class="changepic"><a href="#"><img src="<?php echo base_url(); ?>assets/images/changepic.png" class="img-responsive" type="file"></a></div>
           </div> 
        </div>
        <div class="col-md-7">
          <h2><?php echo $designer_details->user_fname; ?></h2>
          <h3><i class="flaticon-placeholder9"></i> Hyderabad, Telangana.</h3>
        </div>
        <div class="col-md-4 designerpro-top-right">
          <ul>
            <li class="col-md-4"><span><a href="#"><i class="glyphicon glyphicon-heart"></i>
            </span><br> Follow</a></li>
            <li class="col-md-4"><span><?php echo count($d_looks); ?></span><br> Looks</li>
            <li class="col-md-4"><span><?php echo $d_followers; ?></span><br> Followers</li>
          </ul>
        </div>
      </div>     
    </div>
	<!--designer top-->  

	<!--designer main-->  
    <div class="container designerpro-main">
     <div class="row">
     <div class="col-md-9 designerpro-left">
		 <ul class="nav nav-tabs">
		   <li class="active"><a href="#looks" data-toggle="tab"><i class="flaticon-user7"></i>Lookser profile</a></li>
		   <li><a href="#profile" data-toggle="tab"><i class="flaticon-profile29"></i> Personal Profile</a></li>
		   <li><a href="#wallet" data-toggle="tab"><i class="flaticon-money407"></i> Wallet</a></li>
		 </ul>
		    <div id="myTabContent" class="tab-content">
		      <div class="tab-pane active in" id="looks">
		      <div class="row">
		      <?php
		      foreach ($d_looks as $key => $look) {
		      ?>
				  <div class="col-md-4 created-each">
				    <div class="share"><a href="#" data-toggle="modal" data-target="#shareModal">
				      <img src="<?php echo base_url(); ?>assets/images/share.png" alt="share icon" class="img-circle"></a>
				    </div>
				    <div class="pattern<?php echo count($look['l_products']); ?>">
					  <ul>
					    <?php foreach ($look['l_products'] as $key => $lp): ?>
						<li><img src="<?php echo $lp->p_image;?>" class="img-responsive"></li>
						<?php endforeach; ?>
					  </ul>
					</div>
					<div class="created-by">
					<h3><?php echo $look['l_title']; ?></h3>
					<div class="col-md-12 clearfix text-center"><span class="mrp"><span class="webrupee">Rs.</span>2300</span>
					<span class="aftrdsnt"><span class="webrupee">Rs.</span>2000</span></div>
				  </div>
				  <div class="rating"><img src="<?php echo base_url(); ?>assets/images/rating.png"></div>
				</div>
				<?php
			}
				?>
			
				</div>
				<ul class="pagination pull-right">
	              <li class="disabled"><a href="#">«</a></li>
	              <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
	              <li><a href="#">2</a></li>
	              <li><a href="#">3</a></li>
	              <li><a href="#">4</a></li>
	              <li><a href="#">5</a></li>
	              <li><a href="#">»</a></li>
                </ul>
		      </div>

		      <!--profile starts-->
		      <div class="tab-pane fade" id="profile">
		    <form class="form-horizontal" action="" method="post">
              <fieldset>
            <div class="form-group">
              <label class="col-md-2 control-label" for="name">Name</label>
              <div class="col-md-9">
                <input id="name" name="name" type="text" placeholder="Your Name" class="form-control" disabled="disabled" value="Aneel Kaushik">
              </div>
            </div>
    
             <!-- about me -->
            <div class="form-group">
              <label class="col-md-2 control-label" for="about">About Me</label>
              <div class="col-md-9">
                <textarea class="form-control" id="about" name="about" rows="5" placeholder="Iam Aneel Kaushik. I have been in Web Design & Front-end Development, delivering unique and creative designs with optimal user experience for more than 4 years now.I have developed XHTML/CSS mark-up for various web/mobile sites & Apps with standards & cross-browser compatibility" disabled="disabled"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label" for="email">Email Address</label>
              <div class="col-md-9">
                <input id="email" name="email" type="text" placeholder="Email Address" class="form-control"
                value="Aneelkaushikk@gmail.com" disabled="disabled">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label" for="location">Location</label>
              <div class="col-md-9">
                <input id="location" name="location" type="text" placeholder="Your Location" class="form-control"
                value="Hyderabad" disabled="disabled">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label" for="mobile">Mobile</label>
              <div class="col-md-9">
                <input id="mobile" name="mobile" type="text" placeholder="Mobile Number" class="form-control"
                value="9700078025" disabled="disabled">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label" for="Institution">Institution</label>
              <div class="col-md-9">
                <input id="institution" name="Institution" type="text" placeholder="Institution" class="form-control"
                 value="NIFT" disabled="disabled">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label" for="Website">Experience</label>
              <div class="col-md-9">
                <input id="experience" name="experience" type="text" placeholder="Experience" class="form-control"
                 value="2 years" disabled="disabled">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label" for="Website">Website</label>
              <div class="col-md-9">
                <input id="website" name="Website" type="text" placeholder="Website" class="form-control"
                 value="Not Available" disabled="disabled">
              </div>
            </div>
          </fieldset>
          </form>         
             <div class="col-md-12 no-pad text-right">
                <button type="button">Edit Profile</button>
             </div>
		  </div>

		  <!--wallet starts-->
		   <div class="tab-pane fade" id="wallet">
		    <div class="row wallet-top">
              <div class="col-md-4">Current Balance <strong><span class="webrupee">Rs.</span>2348</strong></div>
              <div class="col-md-4">Owe Balance <strong><span class="webrupee">Rs.</span>348</strong></div>
              <div class="col-md-4">Payment Date <strong> 21 Aug 2015</strong></div>
		    </div>
		    <form class="form-horizontal" action="" method="post">
            <fieldset>
            <div class="form-group">
              <label class="col-md-2 control-label" for="name">Name</label>
              <div class="col-md-9">
                <input id="name" name="name" type="text" placeholder="Your Name" class="form-control" disabled="disabled" value="Aneel Kaushik">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label" for="Website">Experience</label>
              <div class="col-md-9">
                <input id="experience" name="experience" type="text" placeholder="Experience" class="form-control"
                 value="2 years" disabled="disabled">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
              </div>
            </div>
          </fieldset>
          </form>
		  </div>
		  </div>
		  </div>

       <div class="col-md-3 designerpro-right">    
         <h3>Profile Statistics</h3>
         <div class="designpro-right-main">
           <div class="profile-right-each">
             <h3>Profile Percentage</h3>
			  <div id="bar-1" class="bar-main-container">
			    <div class="wrap">
			      <div class="bar-percentage" data-percentage="46"></div>
			      <div class="bar-container">
			        <div class="bar"></div>
			      </div>
			    </div>
			  </div>
			</div>
			<div class="profile-right-each">
              <ul class="procounts">
      	        <li><i class="flaticon-profile29"></i><br><span><?php echo count($d_looks); ?></span></li>
      	        <li><i class="flaticon-eye106"></i><br><span><?php echo $d_views; ?></span></li>
      	      </ul>
            </div>

           <div class="profile-right-each">
             <h3>link to your Profile</h3>
      	     <input type="text" class="form-control" value="<?php echo base_url('designer/'.$did); ?>">
           </div>
           
         </div>
       </div>
     </div>
    </div>
    </div>
	<!--designer main-->  
	
	 
	 	  
   </div>
   </div>
   </div>
	<!-- trending products -->
	
	<script>
     $('.bar-percentage[data-percentage]').each(function () {
	  var progress = $(this);
	  var percentage = Math.ceil($(this).attr('data-percentage'));
	  $({countNum: 0}).animate({countNum: percentage}, {
	    duration: 2000,
	    easing:'linear',
	    step: function() {
	      // What todo on every count
	      var pct = Math.floor(this.countNum) + '%';
	      progress.text(pct) && progress.siblings().children().css('width',pct);
	    }
	  });
	});
    </script>
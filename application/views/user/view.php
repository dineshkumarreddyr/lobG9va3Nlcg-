		<div class="designerslide"></div>
		</div><!-- /. Container -->
		</div><!-- /# Mastehead -->  
	<!--slider ends-->
		
	<!--designer top-->    
    <div class="container designertop-main">
      <div class="row">
        <div class="col-md-2 no-pad">
           <div class="designerpro-img">
              <img src="<?php echo base_url(); ?>uploads/designers/<?php echo ($designer_details->user_image == '') ? 'default.jpg' : $designer_details->user_image; ?>" class="img-responsive">
           </div> 
        </div>
        <div class="col-md-6">
          <h2><?php echo $designer_details->user_fname; ?></h2>
          <h3><i class="flaticon-placeholder9"></i> <?php echo $designer_details->user_location . ', ' . $designer_details->user_state ?>.</h3>
          <?php
          $uid = $this->session->userdata('uid');
          $role = $this->session->userdata('role');
          if(isset($uid) && !empty($uid) && $role == 2 && $uid == $designer_details->user_id) {
          ?>
          <h3><i class="flaticon-pen29"></i><a href="<?php echo base_url('designer/edit/'.$designer_details->user_id); ?>"> Edit Profile</a></h3>
          <?php
          }
          ?>
        </div>
        <div class="col-md-4 designerpro-top-right">
          <ul>
            <?php if($this->session->userdata('uid') && $this->session->userdata('uid') != $designer_details->user_id): ?>
              <?php if($d_follow): ?>
              <li class="col-md-4 following" id="follow">
                <span><i class="glyphicon glyphicon-heart"></i></span>
                <br> Following
              </li>
              <?php else: ?>
                <li class="col-md-4" id="follow" onclick="follow_d(<?php echo $designer_details->user_id; ?>);">
                  <span><i class="glyphicon glyphicon-heart"></i></span>
                  <br> Follow
                </li>
              <?php endif; ?>
            <?php elseif($this->session->userdata('uid') != $designer_details->user_id): ?>
            <li class="col-md-4" id="follow" data-toggle="modal" data-target="#LoginModal"><span><i class="glyphicon glyphicon-heart"></i>
            </span><br> Follow</li>
            <?php endif; ?>
            <li class="col-md-4"><span><?php echo count($d_looks); ?></span><br> Looks</li>
            <li class="col-md-4"><span id="followers"><?php echo $d_followers; ?></span><br> Followers</li>
          </ul>
        </div>
      </div>     
    </div>
	<!--designer top-->  

	<!--designer main-->  
    <div class="container designerpro-main">
     <div class="row">
     <div class="col-md-9 no-pad designerpro-left">
		 <ul class="nav nav-tabs">
		   <li class="active"><a href="#looks" data-toggle="tab"><i class="flaticon-user7"></i>Looks Created</a></li>
       <li><a href="#profile" data-toggle="tab"><i class="flaticon-profile29"></i> Profile</a></li>
       <!-- <li><a href="#wallet" data-toggle="tab"><i class="flaticon-money407"></i> Wallet</a></li> -->
		   <li><a href="#blog" data-toggle="tab"><i class="flaticon-profile29"></i> Blog</a></li>
		 </ul>
		    <div id="myTabContent" class="tab-content">
		      <div class="tab-pane active in" id="looks">
		      <div class="row">
		      <?php
		      foreach ($d_looks as $key => $look) {
		      ?>
				  <div class="col-md-4 created-each">
				    <div class="share"><a href="#" data-toggle="modal" data-target="#shareModal" data-value="<?php echo $look['l_id']; ?>">
				      <img src="<?php echo base_url(); ?>assets/images/share.png" alt="share icon" class="img-circle"></a>
				    </div>
            <a href="<?php echo base_url('look/'.$look['l_id'].'/'.url_title($look['l_title'])); ?>">
				    <div class="pattern<?php echo count($look['l_products']); ?>">
					  <ul>
					    <?php foreach ($look['l_products'] as $key => $lp): ?>
						<li><img src="<?php echo $lp->p_image;?>" class="img-responsive"></li>
						<?php endforeach; ?>
					  </ul>
					</div>
          </a>
          <a href="<?php echo base_url('looks/view/'.$look['l_id']); ?>">
					<div class="created-by">
					<h3><?php echo $look['l_title']; ?></h3>
					<div class="col-md-12 clearfix text-center">
          <?php if($look['l_mrp'] != '' && $look['l_mrp'] > 0): ?>
            <span class="mrp"><span class="webrupee">Rs.</span><?php echo $look['l_mrp']; ?></span>
          <?php endif; ?>
          <span class="aftrdsnt"><span class="webrupee">Rs.</span><?php echo $look['l_price']; ?></span></div>
				  </div>
          </a>
				  <div class="rating"><img src="<?php echo base_url(); ?>assets/images/rating.png"></div>
				</div>
				<?php
			}
				?>
			
				</div>
				<!-- <ul class="pagination pull-right">
			              <li class="disabled"><a href="#">«</a></li>
			              <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
			              <li><a href="#">2</a></li>
			              <li><a href="#">3</a></li>
			              <li><a href="#">4</a></li>
			              <li><a href="#">5</a></li>
			              <li><a href="#">»</a></li>
		                </ul> -->
		      </div>

		      <!--profile starts-->
		      <div class="tab-pane fade" id="profile">
		    <form class="form-horizontal" action="" method="post">
              <fieldset>
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Name</label>
              <div class="col-md-9 prolheight"><?php echo $designer_details->user_fname; ?></div>
            </div>
    
             <!-- about me -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="about">About Me</label>
              <div class="col-md-9 abtme"> <?php echo $designer_details->user_about; ?> </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="gender">Gender</label>
              <div class="col-md-9 abtme"> <?php echo $designer_details->user_gender; ?> </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Email Address</label>
              <div class="col-md-9 prolheight">
                <?php
                  $email = explode('@', $designer_details->user_email);
                  echo 'XXXXX@'.$email[1];
                ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="location">Location</label>
              <div class="col-md-9 prolheight"><?php echo $designer_details->user_location; ?></div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="mobile">Mobile</label>
              <div class="col-md-9">
                XXXX-XXXX-XX
                <?php // echo $designer_details->user_mobile; ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="Institution">Institution</label>
              <div class="col-md-9"><?php echo $designer_details->user_institution; ?> </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="Website">Experience</label>
              <div class="col-md-9"><?php echo $designer_details->user_experience; ?></div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="Website">Website</label>
              <div class="col-md-9"><?php echo $designer_details->user_website; ?></div>
            </div>
          </fieldset>
          </form>         
	</div>

			  <!--wallet starts-->
		   <!-- <div class="tab-pane fade" id="wallet">
		   	<div class="row earnings">
		      <h3>Your Earnings</h3>
              <div class="col-md-4 earn-each">Flipkart <strong><span class="webrupee">Rs.</span>2348</strong></div>
              <div class="col-md-4 earn-each">Jabong <strong><span class="webrupee">Rs.</span>348</strong></div>
              <div class="col-md-4 earn-each">Snapdeal <strong><span class="webrupee">Rs.</span>348</strong></div>
              <div class="col-md-4 earn-each">Total Earnings <strong><span class="webrupee">Rs.</span>2348</strong>
              </div>
              <div class="col-md-4 earn-each">Owe Earnings <strong><span class="webrupee">Rs.</span>348</strong></div>
              <div class="col-md-4 earn-each">Last Payed on <strong> 21 Aug 2015</strong></div>
              <div class="col-md-12"><p>Note: The Payment will be processed to the bank account linked, once you reach a minimun amount of Rs 1,000 (One Thousand)</p></div>
		    </div>
            
            <div class="row profile-sales">
              <div class="col-md-12 sales-each">
                <div class="row sales-head">
                <div class="col-md-1 sale-img">
                   <img src="images/trending/t1.jpg" alt="sale" class="img-responsive">
                </div>
                <div class="col-md-11">
                  <div class="row">
                  <div class="col-md-12"><h3>Lee Cooper T-shirt <span>Successful</span></h3></div>
                  <div class="col-md-2">Look ID <strong>012</strong></div>
                  <div class="col-md-3">Sale Date <strong>12 Aug 2015</strong></div>
                  <div class="col-md-2">Time <strong>12:52 PM</strong></div>
                  <div class="col-md-2">Cost <strong><span class="webrupee">Rs.</span>449</strong></div>
                  <div class="col-md-3">Your Amount <strong><span class="webrupee">Rs.</span>49</strong></div>
                  </div>
                </div>
                </div>
              </div>

              <div class="col-md-12 sales-each">
                <div class="row sales-head">
                <div class="col-md-1 sale-img">
                   <img src="images/trending/t1.jpg" alt="sale" class="img-responsive">
                </div>
                <div class="col-md-11">
                  <div class="row">
                  <div class="col-md-12"><h3>Lee Cooper T-shirt <span>Successful</span></h3></div>
                  <div class="col-md-2">Look ID <strong>012</strong></div>
                  <div class="col-md-3">Sale Date <strong>12 Aug 2015</strong></div>
                  <div class="col-md-2">Time <strong>12:52 PM</strong></div>
                  <div class="col-md-2">Cost <strong><span class="webrupee">Rs.</span>449</strong></div>
                  <div class="col-md-3">Your Amount <strong><span class="webrupee">Rs.</span>49</strong></div>
                  </div>
                </div>
                </div>
              </div>

              <div class="col-md-12 sales-each">
                <div class="row sales-head">
                <div class="col-md-1 sale-img">
                   <img src="images/trending/t1.jpg" alt="sale" class="img-responsive">
                </div>
                <div class="col-md-11">
                  <div class="row">
                  <div class="col-md-12"><h3>Lee Cooper T-shirt <span>Successful</span></h3></div>
                  <div class="col-md-2">Look ID <strong>012</strong></div>
                  <div class="col-md-3">Sale Date <strong>12 Aug 2015</strong></div>
                  <div class="col-md-2">Time <strong>12:52 PM</strong></div>
                  <div class="col-md-2">Cost <strong><span class="webrupee">Rs.</span>449</strong></div>
                  <div class="col-md-3">Your Amount <strong><span class="webrupee">Rs.</span>49</strong></div>
                  </div>
                </div>
                </div>
              </div>

              <div class="col-md-12 sales-each">
                <div class="row sales-head">
                <div class="col-md-1 sale-img">
                   <img src="images/trending/t1.jpg" alt="sale" class="img-responsive">
                </div>
                <div class="col-md-11">
                  <div class="row">
                  <div class="col-md-12"><h3>Lee Cooper T-shirt <span>Successful</span></h3></div>
                  <div class="col-md-2">Look ID <strong>012</strong></div>
                  <div class="col-md-3">Sale Date <strong>12 Aug 2015</strong></div>
                  <div class="col-md-2">Time <strong>12:52 PM</strong></div>
                  <div class="col-md-2">Cost <strong><span class="webrupee">Rs.</span>449</strong></div>
                  <div class="col-md-3">Your Amount <strong><span class="webrupee">Rs.</span>49</strong></div>
                  </div>
                </div>
                </div>
              </div>
            </div>
	  </div> -->
        <!--wallet starts-->
       <div class="tab-pane fade" id="blog">
        <?php if($this->session->userdata('uid') == $designer_details->user_id  && $this->session->userdata('role') == 2): ?>
        <div class="col-md-12 text-right addarticle "><a href="<?php echo base_url('blog/add'); ?>"><i class="flaticon-plus79"></i> Add New Article</a></div>
        <?php endif; ?>
            <div class="row profile-sales">
             <?php foreach ($posts as $key => $post): ?>
               <div class="col-md-6 blog-tile">
                 <div class="blog-main-wrap">
                   <div class="blog-writer-wrap">
                    <div class="blog-writer-img"><img src="<?php echo base_url();?>assets/images/d4.jpg" class="img-responsive"></div> 
                    <div class="writer-details"><h3><a href="#">by <?php echo $post->postedBy; ?></a></h3>
                    <span><?php echo date('d M Y', strtotime($post->postedOn)); ?></span></div>         
                   </div>
                   <div class="blog-img"><a href="<?php echo base_url('blog/'.$post->id.'/'.url_title($post->title)); ?>"><img src="<?php echo base_url();?>assets/images/designer.jpg" class="img-responsive"></a></div>
                   <h2><a href="<?php echo base_url('blog/'.$post->id.'/'.url_title($post->title)); ?>"><?php echo $post->title; ?></a></h2>
                   <div class="blog-main-content">
                    <?php echo substr($post->content, 0, 220); ?>...
                   </div>
                   <div class="blog-bottom">
                    <div class="blog-more text-left"><a href="<?php echo base_url('blog/'.$post->id.'/'.url_title($post->title)); ?>">Readmore</a></div>
                    <div class="blog-counts">
                      <div class="col-md-4"><i class="flaticon-eye106"></i> 78</div>
                      <div class="col-md-4"><i class="flaticon-speech-bubble25"></i> 15</div>
                      <div class="col-md-4"><i class="flaticon-social24"></i> 23</div>
                    </div>
                    </div>
                 </div>
               </div>
             <?php endforeach; ?>
            </div>
    </div>
	  </div>
	  </div>
		  

   <div class="col-md-3 designerpro-right">    
     <h3>Profile Statistics</h3>
     <div class="designpro-right-main">
      <!-- <div class="profile-right-each">
        <h3>Profile Percentage</h3>
			  <div id="bar-1" class="bar-main-container">
			    <div class="wrap">
			      <div class="bar-percentage" data-percentage="46"></div>
			      <div class="bar-container">
			        <div class="bar"></div>
			      </div>
			    </div>
			  </div>
			</div> -->
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
	
<!--share pop-->
  <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="clearfix modal-content">
      <div class="clearfix modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel1">Share Your Look</h4>
      </div>
      <div class="col-md-10 col-md-offset-1 sharemodal-wrap">
        <p>Share the link to your look</p>
        <input type="text" class="form-control" value="http://www.lookser.com/look123" name="share_url" id="share_url">
        <ul>
          <p>Or share it on</p>
          <li><a href="javascript:void(0);" id="share_fb"><img src="<?php echo base_url();?>assets/images/sharefb.png" alt="share on facebook"></a></li>
          <!-- <li><a href="#"><img src="<?php echo base_url();?>assets/images/sharetw.png" alt="share on twitter"></a></li>
          <li><a href="#"><img src="<?php echo base_url();?>assets/images/sharepin.png" alt="share on pinterest"></a></li>
          <li><a href="#"><img src="<?php echo base_url();?>assets/images/shareinst.png" alt="share on instagram"></a></li>
          <li><a href="#"><img src="<?php echo base_url();?>assets/images/sharebe.png" alt="share on behance"></a></li> -->
        </ul>
      </div>
    </div>
  </div>
  </div>
  <!--share pop-->
  	 
	 	  
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

   $('.share a').click(function(){
    var url = '<?php echo base_url("looks/view"); ?>'+'/'+$(this).attr('data-value');
    $('#share_url').val(url);

   });

   $('#share_fb').click(function(){
      window.open('https://www.facebook.com/sharer.php?u='+encodeURIComponent($('#share_url').val())+'&t='+encodeURIComponent('look'),'sharer','toolbar=0,status=0,width=626,height=436');
      return false;
   });

   function follow_d(did) {
    $.ajax({
      type:"POST",
      url:'<?php echo base_url();?>user/follow',
      data:{'did':did},
      dataType:"json",
      success: function(data) {
        // console.log(data);
        if(data.status == 'error') {
          // $('#s_msg').html('Sorry, Your email already subscribed.');
        }
        else if(data.status == 'success') {
          $('#follow').addClass('following');
          $('#follow').html($('#follow').html().replace(/Follow/, 'Following'));
          $('#followers').text(parseInt($('#followers').text())+1);
          // $('#s_msg').html('Thanks, Your email successfully subscribed.');
        }
      }
    });
   }

    </script>
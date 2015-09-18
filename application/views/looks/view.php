		</div><!-- /. Container -->
		</div><!-- /# Mastehead -->  
	<!--slider ends-->
	

	<!--look description starts-->
<?php $url = array(); ?>
	<div class="container lookdesp-wrap">
	  <div class="row hidden-xs">
	      <section class="breadcrumbs">
	      <ul>
	        <li><a href="<?php echo base_url(); ?>">Home</a></li>
	        <li><a href="<?php echo base_url('looks?category='.$look['l_category']);?>"><?php echo $look['lc_name']; ?></a></li>
	        <li><a href="#"><?php echo $look['l_title']; ?></a></li>
	      </ul>
	    </section>
	    </div>
	    <div class="row">
	      <div class="col-md-4 lookdesp-left trend-each">
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

	          <div class="clearfix lookdetails">
	            <div class="col-md-2 col-xs-2 no-pad lookdetails-img">
	               <a href="#"><img src="<?php echo base_url();?>uploads/designers/<?php echo ($look['l_user_image'] == '') ? 'default.jpg' : $look['l_user_image']; ?>" class="img-responsive"></a>
	            </div>
	            <div class="col-md-8 col-xs-8 lookdetail-designer">
	              <div class="clearfix"><a href="<?php echo base_url('designer/'.$look['l_uid'].'/'.url_title($look['l_user'])); ?>">by <?php echo $look['l_user']; ?></a></div>
	              <div class="detail-each pull-left"><i class="flaticon-eye106"></i> <?php echo $look['l_views']; ?></div>
	              <div class="detail-each pull-left"><i class="flaticon-like78"></i> 21</div>
	            </div>
	            <div class="col-md-2 col-xs-2 sharelook"><a href="#" data-toggle="modal" data-target="#shareModal"><i class="flaticon-social24"></i></a>
	            </div>
	           </div>
	      </div>

	      <div class="col-md-8 lookdesp-right">
	        <h3><?php echo $look['l_title']; ?> <span><a href="#">{ <?php echo $look['lc_name']; ?> }</a></span></h3>
	        <div class="wrap row">
	        	<?php if(!empty($look['l_mrp']) && $look['l_mrp'] > 0): ?>
	            <div class="col-md-2 col-xs-4 mrpBig"><span class="webrupee">Rs.</span><?php echo $look['l_mrp']; ?></div>
	        <?php endif; ?>
	            <div class="col-md-2 col-xs-4 aftrdsntBig"><span class="webrupee">Rs.</span><?php echo $look['l_price']; ?></div>
	        </div>
	        <div class="clearfix selectedprod-wrap">
	         <?php
	         $i = 01;
	         foreach ($look['l_products'] as $key => $lp):
	         $url[] = $lp->p_url;
	         ?>
	         <div class="selectedprod-each">
	         <div class="row">
	         <div class="col-md-2 col-xs-4">
	         <div class="looklist-number"><?php echo $i; $i++; ?></div>
	         </div>
	         <div class="col-md-10 col-xs-8 prodpick-details">
	           <div class="row">
	           <h3><a href="<?php echo base_url('product/'.$lp->p_id.'/'.url_title($lp->p_name)); ?>" target="_blank"><?php echo $lp->p_name;?></a></h3>
	           <div class="col-md-6 col-xs-3 prodpick-left">
	           <div class="provider"><img src="<?php echo $lp->provider_image; ?>" title="<?php echo $lp->provider_name; ?>" alt="<?php echo $lp->provider_name; ?>"></div>
	           </div>
	           <div class="col-md-2 col-xs-4 prodpick-right">
	           	<?php if(!empty($lp->p_mrp) && $lp->p_mrp > 0): ?>
	           <div class="mrp"><span class="webrupee">Rs.</span> <?php echo $lp->p_mrp;?></div>
	       		<?php endif; ?>
	           </div>
	            <div class="col-md-2 col-xs-4 prodpick-right">
	           <div class="cost"><span class="webrupee">Rs.</span> <?php echo $lp->p_price;?></div>
	           </div> 
	           <!-- <div class="col-md-2 col-xs-1 no-pad removeadded">
	             <a href="#">Remove <img src="<?php echo base_url();?>assets/images/removeadded.png"></a>
	           </div> -->          
	         </div>
	         </div>
	         </div>
	         </div>
	     	<?php endforeach; ?>
	        <div class="row btn-wrap">
	             <?php if($this->session->userdata('uid')): ?>
					<?php if($favourite): ?>
					<div class="col-md-6"><button class="favbtn" >Added to your favourites</button></div>
					<?php else: ?>
					<div class="col-md-6"><button class="favbtn" onclick="add_to_favourites(<?php echo $look['l_id']; ?>)">Add to Favourites</button></div>
					<?php endif; ?>
				<?php else: ?>
				<div class="col-md-6"><button class="favbtn" data-toggle="modal" data-target="#LoginModal">Add to Favourites</button></div>
				<?php endif; ?>
	             <div class="col-md-6 col-xs-6"><button id="goto_providers" onclick="OpenInNewTab(this.vaue);" value="<?php echo implode(',', $url); ?>" class="buybtn">Buy from Providers</button></div>
	        </div>
	      </div>
	    </div>
	  </div>
</div>

	<!--look description ends-->
	<!--similar looks-->
	<div class="whitebg">
	  <div class="container text-center">
	  <div class="carousel-head"><a href="#">Similar Looks</a></div>
	    <div class="row">   
	   <?php if (count($slooks)): ?>
    <?php foreach ($slooks as $key => $look): ?>
	  <a href="<?php echo base_url('look/'.$look['l_id'].'/'.url_title($look['l_title'])); ?>">
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
	<!--similar looks-->

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
        <input type="text" class="form-control" value="<?php echo base_url(uri_string()); ?>" name="share_url" id="share_url">
        <ul>
          <p>Or share it on</p>
          <li><a href="javascript:void(0);" id="share_fb"><img src="<?php echo base_url();?>assets/images/sharefb.png" alt="share on facebook"></a></li>
          <li><a href="http://twitter.com/intent/tweet?status=<?php echo $look['l_title']; ?>+<?php echo current_url(); ?>"><img src="<?php echo base_url();?>assets/images/sharetw.png" alt="share on twitter"></a></li>
          <!-- <li><a href="#"><img src="<?php echo base_url();?>assets/images/sharepin.png" alt="share on pinterest"></a></li>
          <li><a href="#"><img src="<?php echo base_url();?>assets/images/shareinst.png" alt="share on instagram"></a></li>
          <li><a href="#"><img src="<?php echo base_url();?>assets/images/sharebe.png" alt="share on behance"></a></li> -->
        </ul>
      </div>
    </div>
  </div>
  </div>
  <!--share pop-->


<script type="text/javascript">
$('#goto_providers').click(function(){
	var url = $(this).val().split(',');
  	for(var i=0;i < url.length; i++) {
//setTimeout(function(){
  	var win = window.open(url[i], '_blank');
  	// win.focus();
//}, 1000);
  }

});


   $('#share_fb').click(function(){
      window.open('https://www.facebook.com/sharer.php?u='+encodeURIComponent($('#share_url').val())+'&t='+encodeURIComponent('look'),'sharer','toolbar=0,status=0,width=626,height=436');
      return false;
   });	


function add_to_favourites(id) {
	$.ajax({
	  type:"POST",
	  url:'<?php echo base_url();?>user/add_to_favourites',
	  data:{'type':'look','id':id},
	  dataType:"json",
	  success: function(data) {
	    // console.log(data);
	    if(data.status == 'error') {
	      // $('#s_msg').html('Sorry, Your email already subscribed.');
	    }
	    else if(data.status == 'success') {
	      $('.favbtn').html('Added to your favourites');
	      // $('#follow').html($('#follow').html().replace(/Follow/, 'Following'));
	      // $('#followers').text(parseInt($('#followers').text())+1);
	      // $('#s_msg').html('Thanks, Your email successfully subscribed.');
	    }
	  }
	});
}
</script>
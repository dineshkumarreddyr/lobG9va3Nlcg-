
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
	          <div class="pattern<?php echo count($look['l_products']); ?>">
	            <ul>
	            <?php foreach ($look['l_products'] as $key => $lp): ?>
				<li><img src="<?php echo $lp->p_image;?>" class="img-responsive"></li>
				<?php endforeach; ?>
	            </ul>
	          </div>
	          <div class="clearfix lookdetails">
	            <div class="col-md-2 col-xs-2 no-pad lookdetails-img">
	               <a href="#"><img src="<?php echo base_url();?>assets/images/d4.jpg" class="img-responsive"></a>
	            </div>
	            <div class="col-md-8 col-xs-8 lookdetail-designer">
	              <div class="clearfix"><a href="<?php echo base_url('designer/'.$look['l_uid']); ?>">by <?php echo $look['l_user']; ?></a></div>
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
	            <div class="col-md-2 col-xs-4 mrpBig"><span class="webrupee">Rs.</span><?php echo $look['l_mrp']; ?></div>
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
	           <h3><a href="<?php echo base_url('product/'.$lp->p_id); ?>" target="_blank"><?php echo $lp->p_name;?></a></h3>
	           <div class="col-md-6 col-xs-3 prodpick-left">
	           <div class="provider"><img src="<?php echo base_url();?>assets/images/flipkart.png"></div>
	           </div>
	           <div class="col-md-2 col-xs-4 prodpick-right">
	           <div class="mrp"><span class="webrupee">Rs.</span> <?php echo $lp->p_mrp;?></div>
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
	             <div class="col-md-6 col-xs-6"><button class="favbtn">Add to Favourites</button></div>
	             <div class="col-md-6 col-xs-6"><button id="goto_providers" onclick="OpenInNewTab(this.vaue);" value="<?php echo implode(',', $url); ?>" class="buybtn">Buy from Providers</button></div>
	        </div>
	      </div>
	    </div>
	  </div>
</div>

	<!--look description ends-->

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
          <li><a href="#"><img src="<?php echo base_url();?>assets/images/sharetw.png" alt="share on twitter"></a></li>
          <li><a href="#"><img src="<?php echo base_url();?>assets/images/sharepin.png" alt="share on pinterest"></a></li>
          <li><a href="#"><img src="<?php echo base_url();?>assets/images/shareinst.png" alt="share on instagram"></a></li>
          <li><a href="#"><img src="<?php echo base_url();?>assets/images/sharebe.png" alt="share on behance"></a></li>
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
  	var win = window.open(url[i], '_blank');
  	// win.focus();
  }

});
</script>
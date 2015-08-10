
		<div class="slideshow">
		<div id="slideshow" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000">
		<div class="carousel-inner">
		<div class="item active">
		<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/look.jpg" alt="First Slide">
		</div><!-- /. Item Active -->
		</div><!-- /. Carousel-Inner -->
		</div><!-- /# Slideshow .Carousel -->
		</div>
		</div><!-- /. Container -->
		</div><!-- /# Mastehead -->  
	<!--slider ends-->
		
	
	<!-- create look -->
	<div class="container createlook-main">
		<h2>create a look</h2>
		  <div class="filter-bar">
				<div class="row">
					<div class="col-md-2">
						<select class="minimal">
							<option value="">By Gender</option>
							<option value="">Male</option>
							<option value="">Female</option>
						</select>
					</div>
					<div class="col-md-2">
						<select class="minimal">
							<option value="">By Category</option>
							<?php
							foreach ($pcategories as $key => $pcategory) {
								?>
								<option value="<?php echo $pcategory->pc_id; ?>"><?php echo $pcategory->pc_name; ?></option>
								<?php
							}
							?>
						</select>
					</div>
					<div class="col-md-2">
						<select class="minimal">
							<option value="">By Provider</option>
							<?php
							foreach ($providers as $key => $provider) {
								?>
								<option value="<?php echo $provider->provider_id; ?>"><?php echo $provider->provider_name; ?></option>
								<?php
							}
							?>
						</select>
					</div>
					<div class="col-md-2">
						<select class="minimal">
							<option value="">By Brand</option>
							<?php
							foreach ($brands as $key => $brand) {
								?>
								<option value="<?php echo $brand->brand_id; ?>"><?php echo $brand->brand_name; ?></option>
								<?php
							}
							?>
						</select>
					</div>
				</div>
			</div>
		
	   <div class="row">
	     <div class="col-md-7 createlook-left"> 
           <p><strong>8</strong> Products added to the look</p>
		   <div class="prodsadded">
		     <ul>
			  <li><a href="#" target="_blank"><img src="<?php echo base_url();?>assets/images/trending/t1.jpg" class="img-responsive"></a></li>
			  <li><a href="#" target="_blank"><img src="<?php echo base_url();?>assets/images/trending/t2.jpg" class="img-responsive"></a></li>
			  <li><a href="#" target="_blank"><img src="<?php echo base_url();?>assets/images/trending/t3.jpg" class="img-responsive"></a></li>
			  <li><a href="#" target="_blank"><img src="<?php echo base_url();?>assets/images/trending/t4.jpg" class="img-responsive"></a></li>
			  <li><a href="#" target="_blank"><img src="<?php echo base_url();?>assets/images/trending/t5.jpg" class="img-responsive"></a></li>
			  <li><a href="#" target="_blank"><img src="<?php echo base_url();?>assets/images/trending/t6.jpg" class="img-responsive"></a></li>
			  <li><a href="#" target="_blank"><img src="<?php echo base_url();?>assets/images/trending/t5.jpg" class="img-responsive"></a></li>
			  <li><a href="#" target="_blank"><img src="<?php echo base_url();?>assets/images/trending/t1.jpg" class="img-responsive"></a></li>
			 </ul>
		   </div>
		   
		   <div class="clearfix"></div>
		   <div class="clearfix selectedprod-wrap" id="lp">
		     
			 <div class="totaladded">
			  <div class="row">
			    <div class="col-md-8 text-right"><strong>Total</strong></div>
			    <div class="col-md-4 no-pad">Rs.12345</div>
			  </div>
			 </div>
		   </div>
	     </div>
		 
		 <div class="col-md-5"> 
	       <p>Showing <strong><?php echo count($products); ?></strong> Results </p>
		   <div class="createlook-right">
		     <!--list one-->
		     <?php
		     foreach ($products as $key => $product) {
		     ?>
		     <div class="clearfix createlook-list">
			   <div class="col-md-3">
			   <div class="looklist-image">
			     <img src="<?php echo $product->p_image; ?>" id="p_image_<?php echo $product->p_id; ?>" title="<?php echo $product->p_name; ?>" alt="<?php echo $product->p_name; ?>" class="img-responsive">
			   </div>
			   </div>
			   <div class="col-md-9 prodpick-details">
			     <div class="row">
				   <h3 id="p_name_<?php echo $product->p_id; ?>"><?php echo $product->p_name; ?></h3>
				   <div class="col-md-5 prodpick-left">
				    <div class="rating"><img src="<?php echo base_url();?>assets/images/rating.png"></div>
					<div class="provider"><img src="<?php echo base_url();?>assets/images/jabong.png"></div>
					<div class="brand"><span>Brand</span><br>Jabong</div>					
				   </div>
				   <div class="col-md-7 prodpick-right">
				     <div class="mrp"><span>MRP: Rs</span> <?php echo $product->p_mrp; ?></div>
					 <div class="cost" id="p_price_<?php echo $product->p_id; ?>">Rs. <?php echo $product->p_price; ?></div>
				     <div class="addtolook">
					   <a href="javascript:void(0);" onclick="add_to_look(<?php echo $product->p_id; ?>);">Add to look <img src="<?php echo base_url();?>assets/images/addlook.png"></a>
					 </div>
					 <div class="fav">
					   <a href="javascript:void(0);"><img src="<?php echo base_url();?>assets/images/fav.png"></a>
					 </div>
				   </div>				   
				 </div>
			   </div>
			 </div>
			 <?php
			}
			 ?>
			 
			 
		   </div>
	     </div>
	   </div>
	 </div>
	<!--create look end-->

<script type="text/javascript">

<!-- Add to look -->
function add_to_look(p_id) {
	var count = n_count = 0;
	if (localStorage.p_ids) {
	    var p_ids = JSON.parse(localStorage.p_ids);
	    count = p_ids.length;
	    p_ids[p_id] =p_id;
	    n_count = p_ids.length;
	} else {
	    var p_ids = [];
	    count = p_ids.length;
	    p_ids[p_id] = p_id;
	    n_count = p_ids.length;
	}
	if(count == n_count) {
		alert(1);
	}

	localStorage.p_ids = JSON.stringify(p_ids);


	var p_name = $('#p_name_'+p_id).text();
	var p_price = $('#p_price_'+p_id).text();
	var p_image = $('#p_image_'+p_id).attr('src');

	var lp = '<div class="selectedprod-each" id="lp_'+p_id+'">' +
			   '<div class="row">' +
			   '<div class="col-md-2">' +
			   '<img src="'+p_image+'" id="lp_image_'+p_id+'" style="max-width:85px;height:60px">' +
			   '</div>' +
			   '<div class="col-md-10 prodpick-details">' +
			     '<div class="row">' +
				   '<h3 id="lp_name_'+p_id+'">'+p_name+'</h3>' +
				   '<div class="col-md-7 prodpick-left">' +
					'<div class="provider"><img src="<?php echo base_url(); ?>assets/images/jabong.png"></div>' +
				   '</div>' +
				   '<div class="col-md-3 prodpick-right">' +
					 '<div class="cost" id="lp_price_'+p_id+'">'+p_price+'</div>' +
				   '</div>' +
	               '<div class="col-md-2 no-pad removeadded">' +
				     '<a href="javascript:void(0);" onclick="remove_lp('+p_id+');" id="lp_remove_'+p_id+'">Remove <img src="<?php echo base_url(); ?>assets/images/removeadded.png"></a>' +
				   '</div>' +
				 '</div>' +
			   '</div>' +
			   '</div>' +
		     '</div>';
	$('#lp').append(lp);
}
<!-- Add to look -->

<!-- Remove product from look -->
function remove_lp(p_id) {
	$('#lp_'+p_id).remove();
}
<!-- Remove product from look -->
</script>

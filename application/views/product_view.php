
</div><!-- /. Container -->
</div><!-- /# Mastehead -->  
<!--slider ends-->

<div class="container clearfix prod-desp-main">
	<div class="row">
		<section class="breadcrumbs">
			<ul>
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li><a href="<?php echo base_url('products?category='.$product['p_category']);?>"><?php echo $product['pc_name']; ?></a></li>
				<li><a><?php echo $product['p_name']; ?></a></li>
			</ul>
		</section>
	</div> 
	<div class="row">
		<div class="col-md-6 no-pad prod-desp-left viewer zoomer-element"><div class="zoomer"><div class="zoomer-positioner" style="transform: translate3d(250px, 250px, 0px);"><div class="zoomer-holder" style="height: 1024px; width: 682px; transform: translate3d(-50%, -50%, 0px) scale(0.429618768328446, 0.4296875); opacity: 1;"><img class="zoomer-image" src="<?php echo $product['p_image']; ?>"></div></div><div class="zoomer-controls zoomer-controls-bottom"><span class="zoomer-previous">‹</span><span class="zoomer-zoom-out">-</span><span class="zoomer-zoom-in">+</span><span class="zoomer-next">›</span></div></div></div>
		<div class="col-md-6 prod-desp-right">
			<h3><?php echo $product['p_name']; ?></h3>	
			<div class="wrap row">
				<?php if($product['p_mrp'] > $product['p_price']):  ?>
				<div class="col-md-2 mrpBig"><span class="webrupee">Rs.</span><?php echo $product['p_mrp']; ?></div>
				<?php endif; ?>
				<div class="col-md-2 aftrdsntBig"><span class="webrupee">Rs.</span><?php echo $product['p_price']; ?></div>
				<?php if($product['p_mrp'] > $product['p_price']):  ?>
				<span class="discount"><?php if($product['p_mrp'] > $product['p_price']) { echo ceil(100 -($product['p_price']/$product['p_mrp']) * 100); } ?>% OFF</span>
				<?php endif; ?>
			</div>
			<p><?php echo $product['p_desc']; ?></p>
				<div class="row">
					<div class="col-md-6">
						<div class="desp-content"><strong>Provider:</strong> <?php echo $product['provider_name']; ?></div>
						<!-- <div class="clearfix desp-content"><strong>Available Sizes:</strong> 
							<ul class="sizes">
								<li>xxl</li>
								<li class="nosize">xl</li>
								<li>l</li>
								<li class="nosize">s</li>
								<li>xs</li>
							</ul>
						</div> -->
					</div>
					<div class="col-md-6">
						<div class="desp-content"><strong>Brand:</strong> <?php echo $product['brand_name']; ?></div>
						<div class="desp-content"><strong>Category:</strong> <?php echo $product['pc_name']; ?></div>
						<!-- <div class="desp-content"><strong>Fabric:</strong> Cotton</div> -->
					</div>
				</div>
				<div class="row btn-wrap">
					<div class="col-md-6"><button class="favbtn">Add to Favourites</button></div>
					<div class="col-md-6">
					<button id="goto_providers" onclick="OpenInNewTab(this.vaue);" value="<?php echo $product['p_url']; ?>" class="buybtn">Buy from <?php echo $product['provider_name']; ?></button>
					<!-- <a href="<?php echo $product['p_url']; ?>" target="_blank" class="buybtn">Buy from <?php echo $product['provider_name']; ?></a> -->
					</div>
				</div>

			</div>
		</div>
	</div>
<script type="text/javascript">
$('#goto_providers').click(function(){
	var url = $(this).val().split(',');
  	for(var i=0;i < url.length; i++) {
  	var win = window.open(url[i], '_blank');
  	// win.focus();
  }

});
</script>

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
		<div class="col-md-6 no-pad prod-desp-left viewer zoomer-element"><div class="zoomer"><div class="zoomer-positioner" style="transform: translate3d(250px, 250px, 0px);"><div class="zoomer-holder" style="height: 1024px; width: 682px; transform: translate3d(-50%, -50%, 0px) scale(0.429618768328446, 0.4296875); opacity: 1;"><img class="zoomer-image" src="<?php echo $product['p_oimage']; ?>"></div></div><div class="zoomer-controls zoomer-controls-bottom"><span class="zoomer-previous">‹</span><span class="zoomer-zoom-out">-</span><span class="zoomer-zoom-in">+</span><span class="zoomer-next">›</span></div></div></div>
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
						<div class="clearfix desp-content"><strong>Available Sizes:</strong> 
							<ul class="sizes">
								<li><?php echo $product['p_size']; ?></li>
								<!-- <li class="nosize">xl</li>
								<li>l</li>
								<li class="nosize">s</li>
								<li>xs</li> -->
							</ul>
						</div>
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
<!--top designers carousel-->
<div class="carousel-designers">
	<div class="container text-center">
	<div class="carousel-head"><a href="#">Similar Products</a></div>
		<div class="row">
			<div id="owl-demo" class="owl-carousel owl-theme" style="opacity: 1; display: block;">
			  <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 3510px; left: 0px; display: block; transition: all 800ms ease; transform: translate3d(-468px, 0px, 0px);">
			  <?php
				foreach ($rproducts as $key => $tproduct) {
				?>
				<a href="<?php echo base_url('product/'.$tproduct->p_id);?>">
			  <div class="owl-item" style="width: 117px;"><div class="col-md-12 item trend-each">
			        <div class="listimg">
					  <img data-original="<?php echo $tproduct->p_image; ?>" title="<?php echo $tproduct->p_name; ?>" alt="<?php echo $tproduct->p_name; ?>" class="img-responsive lazy">
					</div>
					<h4><?php echo $tproduct->p_name; ?></h4>
					<div class="col-md-12 text-center">
					<?php if($tproduct->p_mrp > $tproduct->p_price): ?>
					<span class="mrp"><span class="webrupee">Rs.</span><?php echo $tproduct->p_mrp; ?></span>
					<?php endif; ?>
					<span class="aftrdsnt"><span class="webrupee">Rs.</span><?php echo $tproduct->p_price; ?></span>
					</div>
			  </div></div>
			  </a>
			<?php } ?>

			  </div></div>
			  
			<div class="owl-controls clickable"><div class="owl-pagination"><div class="owl-page active"><span class=""></span></div><div class="owl-page"><span class=""></span></div></div></div></div>
		</div>
	</div>
</div>
<!--top designers carousel-->
<script type="text/javascript">
$('#goto_providers').click(function(){
	var url = $(this).val().split(',');
  	for(var i=0;i < url.length; i++) {
  	var win = window.open(url[i], '_blank');
  	// win.focus();
  }

});
</script>
<!--
<script src="<?php echo base_url();?>assets/js/owl.carousel.js"></script>
	<script>
      $(document).ready(function() {	 
	  var owl = $("#owl-demo"); 
	  owl.owlCarousel({
	      items : 10, //10 items above 1000px browser width
	      itemsDesktop : [1000,5], //5 items between 1000px and 901px
	      itemsDesktopSmall : [900,3], // betweem 900px and 601px
	      itemsTablet: [600,2], //2 items between 600 and 0
	      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
	  });
	});
	</script>
-->

		<div class="slideshow">
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
					$genders = array("male" => "Male", "female" => "Female");
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
	
	<!-- filtered products -->
	<h2>Looks</h2>
	<div class="container products-wrap">
	 <div class="row">
	 <div class="col-md-2 filters-left"> 
	 	<?php echo $this->load->view('looks/filter', $lcategories); ?>
	   
	 </div>
	 <!--filters left end-->
	 
	 <div class="col-md-10 looks-list-wrap">

    <?php foreach ($looks as $key => $look): ?>
	  <a href="<?php echo base_url('looks/view/'.$look['l_id']); ?>">
	  <div class="col-md-3 trend-each">
    	<div class="pattern<?php echo count($look['l_products']); ?>">
		  <ul>
		  <?php foreach ($look['l_products'] as $key => $lp): ?>
			<li><img src="<?php echo $lp->p_image;?>" class="img-responsive"></li>
			<?php endforeach; ?>
		  </ul>
		</div>
		<h4><?php echo $look['l_title']; ?></h4>
		<div class="col-md-12 text-center"><span class="mrp"><?php echo $look['l_mrp']; ?></span>
		<span class="aftrdsnt"><span class="webrupee">Rs.</span><?php echo $look['l_price']; ?></span></div>
	  </div>
	  </a>
		<?php endforeach; ?>  
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
							<li class="col-md-3 col-sm-6">
							   <div class="designer">
								<div class="count girl">02</div>
								<div class="designer-image">
								   <img src="<?php echo base_url();?>assets/images/d3.jpg" class="img-responsive">
								</div>
								<h3><?php echo $tdesigner->user_fname; ?></h3>
								<div class="rating"><img src="<?php echo base_url();?>assets/images/rating.png"></div>
								<h4><strong>+<?php echo $tdesigner->l_count; ?></strong> Looks Created</h4>
							  </div>
							</li>						  	
						  	<?php
						  	$j++;
						  	if($j%4 == 0) {
						  		break;
						  	}
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


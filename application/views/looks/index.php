
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
		    <div class="col-md-5"><input type="text" name="search" id="search" tabindex="1"
			class="form-control" placeholder="Search by Product, Look and Designer" value=""></div>
			<div class="col-md-2">
             <div class="dropdown dropdown-dark">
				<select name="gender" class="dropdown-select">
				  <option value="">Gender</option>
				  <option value="male">Male</option>
				  <option value="female">Female</option>
				</select>
			   </div>
			 </div>
			 
			<div class="col-md-3">
			  <div class="dropdown dropdown-dark">
				<select name="category" class="dropdown-select">
				  <option value="">Category</option>
				  <option value="Marriage">Marriage</option>
				  <option value="Party Wear">Party Wear</option>
				  <option value="Casual Wear">Casual Wear</option>
				</select>
				</div>
			  </div>
			<div class="col-md-2"><button>Search</button></div>
		  </div>
		 </div> 
	</div>
	
	<!-- filtered products -->
	<h2>Products</h2>
	<div class="container products-wrap">
	 <div class="row">
	 <div class="col-md-2 filters-left"> 
	 	<?php echo $this->load->view('looks/filter'); ?>
	   
	 </div>
	 <!--filters left end-->
	 
	 <div class="col-md-10 looks-list-wrap">
	  <div class="col-md-3 trend-each">
        <div class="pattern3">
		  <ul>
			<li><img src="<?php echo base_url();?>assets/images/trending/t4.jpg" class="img-responsive"></li>
			<li><img src="<?php echo base_url();?>assets/images/trending/t2.jpg" class="img-responsive"></li>
			<li><img src="<?php echo base_url();?>assets/images/trending/t6.jpg" class="img-responsive"></li>
		  </ul>
		</div>
		<h4>classic chick look</h4>
		<div class="col-md-12 text-center"><span class="mrp">2300</span>
		<span class="aftrdsnt">2000</span></div>
	  </div>

      <div class="col-md-3 trend-each">
        <div class="pattern2">
		  <ul>
			<li><img src="<?php echo base_url();?>assets/images/trending/t4.jpg" class="img-responsive"></li>
			<li><img src="<?php echo base_url();?>assets/images/trending/t6.jpg" class="img-responsive"></li>
		  </ul>
		</div>
		<h4>classic chick look</h4>
		<div class="col-md-12 text-center"><span class="mrp">2300</span>
		<span class="aftrdsnt">2000</span></div>
	  </div>

      <div class="col-md-3 trend-each">
        <div class="pattern4">
		  <ul>
			<li><img src="<?php echo base_url();?>assets/images/trending/t4.jpg" class="img-responsive"></li>
			<li><img src="<?php echo base_url();?>assets/images/trending/t2.jpg" class="img-responsive"></li>
			<li><img src="<?php echo base_url();?>assets/images/trending/t6.jpg" class="img-responsive"></li>
			<li><img src="<?php echo base_url();?>assets/images/trending/t3.jpg" class="img-responsive"></li>
		  </ul>
		</div>
		<h4>classic chick look</h4>
		<div class="col-md-12 text-center"><span class="mrp">2300</span>
		<span class="aftrdsnt">2000</span></div>
	  </div>

      <div class="col-md-3 trend-each">
        <div class="pattern3">
		  <ul>
			<li><img src="<?php echo base_url();?>assets/images/trending/t2.jpg" class="img-responsive"></li>
			<li><img src="<?php echo base_url();?>assets/images/trending/t6.jpg" class="img-responsive"></li>
			<li><img src="<?php echo base_url();?>assets/images/trending/t3.jpg" class="img-responsive"></li>
		  </ul>
		</div>
		<h4>classic chick look</h4>
		<div class="col-md-12 text-center"><span class="mrp">2300</span>
		<span class="aftrdsnt">2000</span></div>
	  </div>

      <div class="col-md-3 trend-each">
        <div class="pattern2">
		  <ul>
			<li><img src="<?php echo base_url();?>assets/images/trending/t4.jpg" class="img-responsive"></li>
			<li><img src="<?php echo base_url();?>assets/images/trending/t6.jpg" class="img-responsive"></li>
		  </ul>
		</div>
		<h4>classic chick look</h4>
		<div class="col-md-12 text-center"><span class="mrp">2300</span>
		<span class="aftrdsnt">2000</span></div>
	  </div>

	 <div class="col-md-3 trend-each">
        <div class="listimg">
		  <img src="<?php echo base_url();?>assets/images/trending/t6.jpg" class="img-responsive">
		</div>
		<h4>classic chick look</h4>
		<div class="col-md-12 text-center"><span class="mrp">2300</span>
		<span class="aftrdsnt">2000</span></div>
	  </div>

	<div class="col-md-3 trend-each">
        <div class="listimg">
		  <img src="<?php echo base_url();?>assets/images/trending/t2.jpg" class="img-responsive">
		</div>
		<h4>classic chick look</h4>
		<div class="col-md-12 text-center"><span class="mrp">2300</span>
		<span class="aftrdsnt">2000</span></div>
	  </div>

    <div class="col-md-3 trend-each">
        <div class="listimg">
		  <img src="<?php echo base_url();?>assets/images/trending/t8.jpg" class="img-responsive">
		</div>
		<h4>classic chick look</h4>
		<div class="col-md-12 text-center"><span class="mrp">2300</span>
		<span class="aftrdsnt">2000</span></div>
	  </div>

	<div class="col-md-3 trend-each">
        <div class="listimg">
		  <img src="<?php echo base_url();?>assets/images/trending/t1.jpg" class="img-responsive">
		</div>
		<h4>classic chick look</h4>
		<div class="col-md-12 text-center"><span class="mrp">2300</span>
		<span class="aftrdsnt">2000</span></div>
	  </div>

      <div class="col-md-3 trend-each">
        <div class="listimg">
		  <img src="<?php echo base_url();?>assets/images/trending/t7.jpg" class="img-responsive">
		</div>
		<h4>classic chick look</h4>
		<div class="col-md-12 text-center"><span class="mrp">2300</span>
		<span class="aftrdsnt">2000</span></div>
	  </div>

      <div class="col-md-3 trend-each">
        <div class="listimg">
		  <img src="<?php echo base_url();?>assets/images/trending/t3.jpg" class="img-responsive">
		</div>
		<h4>classic chick look</h4>
		<div class="col-md-12 text-center"><span class="mrp">2300</span>
		<span class="aftrdsnt">2000</span></div>
	  </div>

      <div class="col-md-3 trend-each">
        <div class="listimg">
		  <img src="<?php echo base_url();?>assets/images/trending/t4.jpg" class="img-responsive">
		</div>
		<h4>classic chick look</h4>
		<div class="col-md-12 text-center"><span class="mrp">2300</span>
		<span class="aftrdsnt">2000</span></div>
	  </div>

      <div class="col-md-3 trend-each">
        <div class="listimg">
		  <img src="<?php echo base_url();?>assets/images/trending/t5.jpg" class="img-responsive">
		</div>
		<h4>classic chick look</h4>
		<div class="col-md-12 text-center"><span class="mrp">2300</span>
		<span class="aftrdsnt">2000</span></div>
	  </div>

	 <div class="col-md-3 trend-each">
        <div class="listimg">
		  <img src="<?php echo base_url();?>assets/images/trending/t6.jpg" class="img-responsive">
		</div>
		<h4>classic chick look</h4>
		<div class="col-md-12 text-center"><span class="mrp">2300</span>
		<span class="aftrdsnt">2000</span></div>
	  </div>

	<div class="col-md-3 trend-each">
        <div class="listimg">
		  <img src="<?php echo base_url();?>assets/images/trending/t2.jpg" class="img-responsive">
		</div>
		<h4>classic chick look</h4>
		<div class="col-md-12 text-center"><span class="mrp">2300</span>
		<span class="aftrdsnt">2000</span></div>
	  </div>

    <div class="col-md-3 trend-each">
        <div class="listimg">
		  <img src="<?php echo base_url();?>assets/images/trending/t8.jpg" class="img-responsive">
		</div>
		<h4>classic chick look</h4>
		<div class="col-md-12 text-center"><span class="mrp">2300</span>
		<span class="aftrdsnt">2000</span></div>
	  </div>	  
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
						<div class="item active">
						  <ul>
							<li class="col-md-3 col-sm-6">
							   <div class="designer">
								<div class="count girl">02</div>
								<img src="<?php echo base_url();?>assets/images/d3.jpg" class="img-circle">
								<h3>Rishab Gupta</h3>
								<div class="rating"><img src="<?php echo base_url();?>assets/images/rating.png"></div>
								<h4><strong>+23</strong> Looks Created</h4>
							  </div>
							</li>
							 <li class="col-md-3 col-sm-6">
							   <div class="designer">
								<div class="count">02</div>
								<img src="<?php echo base_url();?>assets/images/d3.jpg" class="img-circle">
								<h3>Ashitha Rao</h3>
								<div class="rating"><img src="<?php echo base_url();?>assets/images/rating.png"></div>
								<h4><strong>+50</strong> Looks Created</h4>
							  </div>
							</li>
							<li class="col-md-3 col-sm-6">
							   <div class="designer">
								<div class="count">02</div>
								<img src="<?php echo base_url();?>assets/images/d3.jpg" class="img-circle">
								<h3>James Duke</h3>
								<div class="rating"><img src="<?php echo base_url();?>assets/images/rating.png"></div>
								<h4><strong>+50</strong> Looks Created</h4>
							  </div>
							</li>
							<li class="col-md-3 col-sm-6">
							   <div class="designer">
								<div class="count girl">02</div>
								<img src="<?php echo base_url();?>assets/images/d3.jpg" class="img-circle">
								<h3>Rajesh Varma</h3>
								<div class="rating"><img src="<?php echo base_url();?>assets/images/rating.png"></div>
								<h4><strong>+50</strong> Looks Created</h4>
							  </div>
							</li>
							</ul>
						</div>
						
						<div class="item">
											  <ul>
							<li class="col-md-3 col-sm-6">
							   <div class="designer">
								<div class="count girl">02</div>
								<img src="<?php echo base_url();?>assets/images/d3.jpg" class="img-circle">
								<h3>Rishab Gupta</h3>
								<div class="rating"><img src="<?php echo base_url();?>assets/images/rating.png"></div>
								<h4><strong>+23</strong> Looks Created</h4>
							  </div>
							</li>
							 <li class="col-md-3 col-sm-6">
							   <div class="designer">
								<div class="count">02</div>
								<img src="<?php echo base_url();?>assets/images/d3.jpg" class="img-circle">
								<h3>Ashitha Rao</h3>
								<div class="rating"><img src="<?php echo base_url();?>assets/images/rating.png"></div>
								<h4><strong>+50</strong> Looks Created</h4>
							  </div>
							</li>
							<li class="col-md-3 col-sm-6">
							   <div class="designer">
								<div class="count">02</div>
								<img src="<?php echo base_url();?>assets/images/d3.jpg" class="img-circle">
								<h3>James Duke</h3>
								<div class="rating"><img src="<?php echo base_url();?>assets/images/rating.png"></div>
								<h4><strong>+50</strong> Looks Created</h4>
							  </div>
							</li>
							<li class="col-md-3 col-sm-6">
							   <div class="designer">
								<div class="count girl">02</div>
								<img src="<?php echo base_url();?>assets/images/d3.jpg" class="img-circle">
								<h3>Rajesh Varma</h3>
								<div class="rating"><img src="<?php echo base_url();?>assets/images/rating.png"></div>
								<h4><strong>+50</strong> Looks Created</h4>
							  </div>
							</li>
							</ul>
						</div>                   
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

	<!--ecom-->
	<div class="container-fluid">
	  <div class="container ecom-main">
		<div class="col-md-12">
                <div id="Carousel" class="carousel slide">              
                <ol class="carousel-indicators">
                    <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#Carousel" data-slide-to="1"></li>
                </ol>              
                <!-- Carousel items -->
                <div class="carousel-inner">     
                <div class="item active">
                	<div class="row">
                	  <div class="col-md-3"><a href="#"><img src="<?php echo base_url();?>assets/images/flipkart.png" alt="Image" style="max-width:100%;"></a></div>
                	  <div class="col-md-3"><a href="#"><img src="<?php echo base_url();?>assets/images/myntra.png" alt="Image" style="max-width:100%;"></a></div>
                	  <div class="col-md-3"><a href="#"><img src="<?php echo base_url();?>assets/images/yepme.png" alt="Image" style="max-width:100%;"></a></div>
                	  <div class="col-md-3"><a href="#"><img src="<?php echo base_url();?>assets/images/fashinara.png" alt="Image" style="max-width:100%;"></a></div>
                	</div><!--.row-->
                </div><!--.item-->
                 
                <div class="item">
                	<div class="row">
                	  <div class="col-md-3"><a href="#"><img src="<?php echo base_url();?>assets/images/snapdeal.png" alt="Image" style="max-width:100%;"></a></div>
                	  <div class="col-md-3"><a href="#"><img src="<?php echo base_url();?>assets/images/paytm.png" alt="Image" style="max-width:100%;"></a></div>
                	  <div class="col-md-3"><a href="#"><img src="<?php echo base_url();?>assets/images/jabong.png" alt="Image" style="max-width:100%;"></a></div>
                	  <div class="col-md-3"><a href="#"><img src="<?php echo base_url();?>assets/images/shopclues.png" alt="Image" style="max-width:100%;"></a></div>
                	</div><!--.row-->
                </div><!--.item-->		 
			</div>  
		</div>
	</div>
	</div>
	</div>
	<!--ecom-->
	
	
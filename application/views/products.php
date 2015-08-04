	
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
	 <div class="col-md-3 filters-left"> 
	   <h4>by Categories</h4>
	   <ul>
		 <li><input id='one' type='checkbox' />
			<label for='one'><span></span>Shirts
			<ins><i>Shirts</i></ins></label></li>
        <li><input id='two' type='checkbox' />
			<label for='two'><span></span>T-Shirts
			<ins><i>T-Shirts</i></ins></label></li>
        <li><input id='three' type='checkbox' />
			<label for='three'><span></span>Sports Wear
			<ins><i>Sports Wear</i></ins></label></li>
		<li><input id='four' type='checkbox' />
			<label for='four'><span></span>Foot Wear
			<ins><i>Foot Wear</i></ins></label></li>
		<li><input id='five' type='checkbox' />
			<label for='five'><span></span>Watches
			<ins><i>Watches</i></ins></label></li>
		</ul>
		
	   <div class="clearfix">&nbsp;</div>
	   <h4>By Provider</h4>
	   <ul>
		 <li><input id='six' type='checkbox' />
			<label for='six'><span></span>Myntra
			<ins><i>Myntra</i></ins></label></li>
        <li><input id='seven' type='checkbox' />
			<label for='seven'><span></span>Flipkart
			<ins><i>Flipkart</i></ins></label></li>
        <li><input id='eight' type='checkbox' />
			<label for='eight'><span></span>Jabong
			<ins><i>Jabong</i></ins></label></li>
		<li><input id='eight' type='checkbox' />
			<label for='eight'><span></span>Yepme
			<ins><i>Yepme</i></ins></label></li>
		<li><input id='eight' type='checkbox' />
			<label for='eight'><span></span>Fashionara
			<ins><i>Fashionara</i></ins></label></li>
		</ul>
		
	 <div id="budget-wrapper">
	   <h4>Budget <input type="text" id="slider-display" name="slider-display" value="0" /></h4>
	   <div id="slider"></div>
	 </div>
	 
	 <div class="clearfix">&nbsp;</div>
	 <h4>by Color &nbsp;<select name="colorpicker-picker-longlist">
	  <option value="#ac725e">#ac725e</option>
	  <option value="#d06b64">#d06b64</option>
	  <option value="#f83a22">#f83a22</option>
	  <option value="#fa573c">#fa573c</option>
	  <option value="#ff7537">#ff7537</option>
	  <option value="#ffad46">#ffad46</option>
	  <option value="#42d692">#42d692</option>
	  <option value="#16a765">#16a765</option>
	  <option value="#7bd148">#7bd148</option>
	  <option value="#b3dc6c">#b3dc6c</option>
	  <option value="#fbe983">#fbe983</option>
	  <option value="#fad165">#fad165</option>
	  <option value="#92e1c0">#92e1c0</option>
	  <option value="#9fe1e7">#9fe1e7</option>
	  <option value="#9fc6e7">#9fc6e7</option>
	  <option value="#4986e7">#4986e7</option>
	  <option value="#9a9cff">#9a9cff</option>
	  <option value="#b99aff">#b99aff</option>
	  <option value="#c2c2c2">#c2c2c2</option>
	  <option value="#cabdbf">#cabdbf</option>
	  <option value="#cca6ac">#cca6ac</option>
	  <option value="#f691b2">#f691b2</option>
	  <option value="#cd74e6">#cd74e6</option>
	  <option value="#a47ae2">#a47ae2</option>
	</select></h4>
	 
	 
	  <div class="clearfix">&nbsp;</div>
	  <h4>Size</h4>
	  <div class="sizes clearfix">
	  <input type="radio" name="size" id="small" value="small" checked="checked" /> 
      <label for="small">S</label>
      <input type="radio" name="size" id="medium" value="medium" />     
      <label for="medium">M</label>
      <input type="radio" name="size" id="large" value="large" />     
      <label for="large">L</label>
      <input type="radio" name="size" id="xlarge" value="xlarge" />     
      <label for="xlarge">XL</label>
	  <input type="radio" name="size" id="xxlarge" value="xxlarge" />     
      <label for="xlarge">XXL</label>
	  </div>
	 </div>
	 <!--filters left end-->
	 
	 <div class="col-md-9">
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
	
	
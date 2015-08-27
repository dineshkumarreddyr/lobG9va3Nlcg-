		</div><!-- /. Container -->
		</div><!-- /# Mastehead -->  
	<!--slider ends-->
		
	
	<!-- create look -->
	<div class="container createlook-main">
		<h2>create a look</h2>
		  <div class="filter-bar">
				<div class="row">
					<div class="col-md-2">
						<select class="minimal" name="f_gen" id="f_gen">
							<option value="">By Gender</option>
							<?php
							$genders = array('Male'=>'Male', 'Female'=>'Female');
							foreach ($genders as $key => $gender) {
								?>
							<option value="<?php echo $key; ?>"><?php echo $gender; ?></option>
								<?php
							}
							?>
						</select>
					</div>
					<div class="col-md-2">
						<select class="minimal" name="f_cat" id="f_cat">
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
						<select class="minimal" name="f_scat" id="f_scat">
							<option value="">Sub Category</option>
						</select>
					</div>
					<div class="col-md-2">
						<select class="minimal" name="f_prov" id="f_prov">
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
						<select class="minimal" name="f_brd" id="f_brd">
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
	     	<p><strong id="lp_count">0</strong> Products added to the look</p>
		   <div class="prodsadded">
		     <ul id="ld">
		     </ul>
		   </div>
		   
		   <div class="clearfix"></div>
		   <div class="clearfix selectedprod-wrap">
		     <div id="lp">
		     </div>
			 <div class="totaladded hide" id="lp_total_div" >
			  <div class="row">
			    <div class="col-md-8 text-right"><strong>Total</strong></div>
			    <div class="col-md-4 no-pad" id="lp_total">Rs. 0</div>
			  </div>
			 </div>
			 <!-- -->
			 <div class="lookname-wrap hide" id="lc_create">
			 	<div class="row">
                  <div class="col-md-6">
                  	<input placeholder="Look name" value="" id="l_name" name="l_name" class="form-control" type="text">
                  </div>
                  <div class="col-md-6">
	                  <select class="minimal" id="l_cat" name="l_cat">
		     			<option value="">--Look Category--</option>
		     			<?php
							foreach ($lcategories as $key => $lcategory) {
								?>
								<option value="<?php echo $lcategory->lc_id; ?>"><?php echo $lcategory->lc_name; ?></option>
								<?php
							}
							?>
		     		</select>
                  </div>
                  <div class="col-md-6">
	                  <select class="minimal" name="l_gen" id="l_gen">
							<option value="">--Gender--</option>
							<?php
							$genders = array('Male'=>'Male', 'Female'=>'Female');
							foreach ($genders as $key => $gender) {
								?>
							<option value="<?php echo $key; ?>"><?php echo $gender; ?></option>
								<?php
							}
							?>
						</select>
                  </div>
                  <div class="col-md-6">
                  	<input type="button" class="form-control savelook" value="Create Look" id="l_create" name="l_create" onclick="create_look();">
                  </div>
			 	</div>
			 </div>
			 <!-- -->
		   </div>
	     </div>
		 
		 <div class="col-md-5"> 
	       <p>Showing <strong><?php echo count($products); ?></strong> Results </p>
		   <div class="create-search">
		     <input type="text" name="f_name" id="f_name" class="form-control" placeholder="Search by Product name">
		   </div>
		   <div class="createlook-right" id="f_products_wrapper">
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
				   <a href="<?php echo base_url('product/'.$product->p_id); ?>" target="_blank"><h3 id="p_name_<?php echo $product->p_id; ?>"><?php echo $product->p_name; ?></h3></a>
				   <div class="col-md-5 prodpick-left">
				    <div class="rating"><img src="<?php echo base_url();?>assets/images/rating.png"></div>
					<div class="provider"><img src="<?php echo base_url();?>assets/images/flipkart.png"></div>
					<div class="brand"><span>Brand</span><br>Flipkart</div>					
				   </div>
				   <div class="col-md-7 prodpick-right">
				     <div class="mrp" id="p_mrp_<?php echo $product->p_id; ?>"><span class="webrupee"> Rs.</span>  <?php echo $product->p_mrp; ?></div>
					 <div class="cost" id="p_price_<?php echo $product->p_id; ?>"><span class="webrupee"> Rs.</span> <?php echo $product->p_price; ?></div>
				     <div class="addtolook" onclick="add_to_look(<?php echo $product->p_id; ?>);">
					   <a href="javascript:void(0);">Add to look <img src="<?php echo base_url();?>assets/images/addlook.png"></a>
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
localStorage.p_ids = [];
// localStorage.lp_mrp = 0;
localStorage.lp_total = 0;
function add_to_look(p_id) {
	var count = n_count = 0;
	if (localStorage.p_ids) {
	    var p_ids = JSON.parse(localStorage.p_ids);
	    count = p_ids.length;
	    if($.inArray(p_id, p_ids) == -1) {
	    	p_ids.push(p_id);
	    }
	    n_count = p_ids.length;
	} else {
	    var p_ids = [];
	    count = p_ids.length;
	    p_ids.push(p_id);
	    n_count = p_ids.length;
	}
	if(count == n_count) {
		alert('Already added');
		return false;
	}
	$('#lp_count').text(n_count);

	localStorage.p_ids = JSON.stringify(p_ids);


	var p_name = $('#p_name_'+p_id).text();
	var p_price = $('#p_price_'+p_id).text();
	// var p_mrp = $('#p_mrp_'+p_id).text();
	var p_image = $('#p_image_'+p_id).attr('src');
	var base_url = '<?php echo base_url("product/");?>';
	var lp = '<div class="selectedprod-each" id="lp_'+p_id+'">' +
			   '<div class="row">' +
			   '<div class="col-md-2">' +
			   '<img src="'+p_image+'" id="lp_image_'+p_id+'" style="max-width:85px;height:60px">' +
			   '</div>' +
			   '<div class="col-md-10 prodpick-details">' +
			     '<div class="row">' +
				   '<a href="'+base_url+'/'+p_id+'" target="_blank"><h3 id="lp_name_'+p_id+'">'+p_name+'</h3></a>' +
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

	<!-- look products total calculating -->
	// p_mrp = p_mrp.split('s. ');
	p_price = p_price.split('s. ');
	if (localStorage.lp_total) {
		// localStorage.lp_mrp = parseInt(localStorage.lp_mrp) + parseInt(p_mrpmrp[1]);
		localStorage.lp_total = parseInt(localStorage.lp_total) + parseInt(p_price[1]);
	}
	else {
		// localStorage.lp_mrp = parseInt(p_mrp[1]);	
		localStorage.lp_total = parseInt(p_price[1]);	
	}
	$('#lp_total_div').removeClass('hide');
	$('#lc_create').removeClass('hide');
	$('#lp_total').text('Rs. ' + localStorage.lp_total);
	<!-- look products total calculating -->

	var ld = '<li id="ld_'+p_id+'">'+
						'<a href="javascript:void(0);" target="_blank">'+
							'<img src="'+p_image+'" class="img-responsive">'+
						'</a>'+
					'</li>';
	$('#ld').append(ld);
}
<!-- Add to look -->

<!-- Remove product from look -->
function remove_lp(p_id) {

	<!-- look products total calculating -->
	lp_price = $('#lp_price_'+p_id).text().split('s. ');
	if (localStorage.lp_total) {
		localStorage.lp_total = parseInt(localStorage.lp_total) - parseInt(lp_price[1]);
	}
	$('#lp_total').text('Rs. '+localStorage.lp_total);
	if(localStorage.lp_total == 0) {
		$('#lp_total_div').addClass('hide');
		$('#lc_create').addClass('hide');
	}
	<!-- look products total calculating -->

	$('#lp_'+p_id).remove();
	$('#ld_'+p_id).remove();
	if (localStorage.p_ids) {
	    var p_ids = JSON.parse(localStorage.p_ids);
	    p_ids = jQuery.grep(p_ids, function(value) {
		  return value != p_id;
		});
	}
	localStorage.p_ids = JSON.stringify(p_ids);
}
<!-- Remove product from look -->

<!-- Create look -->
function create_look() {
	var l_cat = $('#l_cat').val();
	var l_name = $('#l_name').val();
	var l_gender = $('#l_gen').val();
	if(l_cat == '') {
		alert('Please select look category');
		return false;
	}
	if(l_name == '') {
		alert('Please enter look name');
		return false;
	}
	if(l_gender == '') {
		alert('Please select gender');
		return false;
	}
	var l_price = $('#lp_total').text().split('s. ')[1];

	$.ajax({
		type:"POST",
		url:'<?php echo base_url("looks/create_ajax");?>',
		data:{'l_cat':l_cat,'l_gender':l_gender,'l_name':l_name,'l_price':l_price,'l_pids':localStorage.p_ids},
		dataType:"json",
		success: function(data){
			if(data.status == 'success') {
				alert("Look created successfully");
				window.location.href = '<?php echo base_url("looks"); ?>';
			}
			else if(data.status == 'error') {
				alert(data.message);
			}
		},
	  error: function(e) {
		//called when there is an error
		console.log(e.message);
	  }
	});
}
<!-- Create look -->
</script>

<script type="text/javascript">
	$('#f_cat').change(function(){
		var f_cat = $('#f_cat').val(); // get category value
		$.ajax({
			type:"GET",
			url:'<?php echo base_url("looks/f_pcategories");?>/'+f_cat,
			// data:f_cat,
			dataType:"json",
			success: function(data){
				// console.log(data.length);
				var select = '<option value="">Sub Category</option>';
				$.each(data, function(index) {
		            select += '<option value="'+index+'">'+data[index]+'</option>';
		        });
		        $('#f_scat').html(select);
			},
		  error: function(e) {
			//called when there is an error
			console.log(e.message);
		  }
		});

	});
	
	$('#f_gen, #f_cat, #f_scat, #f_prov, #f_brd').change(function(){
		ps_filter();
	});
	$('#f_name').keyup(function(){
		ps_filter();
	});

	function ps_filter () {
		// var s_pdt = $('#s_pdt').val();
		var f_name = $('#f_name').val();	// get search name value
		var f_gen = $('#f_gen').val();	// get gender value
		var f_cat = $('#f_cat').val(); // get category value
		var f_scat = $('#f_scat').val(); // get sub category value
		var f_prov = $('#f_prov').val(); // get provider value
		var f_brd = $('#f_brd').val(); // get brand value
		
		var f_input = {};
		f_input['f_name'] = f_name;
		f_input['f_gen'] = f_gen;
		f_input['f_cat'] = f_cat;
		if(f_scat != '') {
			f_input['f_cat'] = f_scat;
		}
		f_input['f_prov'] = f_prov;
		f_input['f_brd'] = f_brd;

		// console.log(JSON.stringify(f_input));

		$.ajax({
			type:"POST",
			url:'<?php echo base_url("looks/f_ajax");?>',
			data:f_input,
			dataType:"json",
			success: function(data){
				// console.log(data);
				generate_products(data);
			},
		  error: function(e) {
			//called when there is an error
			console.log(e.message);
		  }
		});
	}

	function generate_products (products) {
		var content = '';
		if(products.length == 0) {
			content = '<p>No results found...</p>';
		}
		$.each(products, function(index, product){
			var base_url = '<?php echo base_url("product/");?>';
			content += '<div class="clearfix createlook-list">'+
						   '<div class="col-md-3">'+
						   '<div class="looklist-image">'+
						     '<img src="'+product.p_image+'" id="p_image_'+product.p_id+'" title="'+product.p_name+'" alt="'+product.p_name+'" class="img-responsive">'+
						   '</div>'+
						   '</div>'+
						   '<div class="col-md-9 prodpick-details">'+
						     '<div class="row">'+
							   '<a href="'+base_url+'/'+product.p_id+'" target="_blank"><h3 id="p_name_'+product.p_id+'">'+product.p_name+'</h3></a>'+
							   '<div class="col-md-5 prodpick-left">'+
							    '<div class="rating"><img src="<?php echo base_url();?>assets/images/rating.png"></div>'+
								'<div class="provider"><img src="<?php echo base_url();?>assets/images/flipkart.png"></div>'+
								'<div class="brand"><span>Brand</span><br>Filpkart</div>'+
							   '</div>'+
							   '<div class="col-md-7 prodpick-right">'+
							     '<div class="mrp"><span>MRP: Rs</span> '+product.p_mrp+'</div>'+
								 '<div class="cost" id="p_price_'+product.p_id+'">Rs. '+product.p_price+'</div>'+
							     '<div class="addtolook" onclick="add_to_look('+product.p_id+');">'+
								   '<a href="javascript:void(0);">Add to look <img src="<?php echo base_url();?>assets/images/addlook.png"></a>'+
								 '</div>'+
								 '<div class="fav">'+
								   '<a href="javascript:void(0);"><img src="<?php echo base_url();?>assets/images/fav.png"></a>'+
								 '</div>'+
							   '</div>'+				   
							 '</div>'+
						   '</div>'+
						 '</div>';
		});

		$('#f_products_wrapper').html(content);
	}
</script>
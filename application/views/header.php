<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $seo['title']; ?> || Latest trends in fashion lookser.com</title>
  <meta name="description" content="<?php echo $seo['description']; ?>" />
  <meta name="keywords" content="<?php echo $seo['keywords']; ?>, fashion, trends, discover, tops, dresses, jewellery, accessories, shoes, bags, lingerie, tops, dresses, pants, kurtis, salwaar-kameez, lastest fashion, lastest styles,  fashion looks, classy looks, awesome looks, lookser shop, fashion one stop, perfection looks, lookser, lookser.com." />

  <meta property="og:title" content="<?php echo $seo['title']; ?> || Latest trends in fashion lookser.com" />
  <meta property="og:site_name" content="Lookser"/>
  <meta property="og:url" content="<?php echo base_url(uri_string()); ?>" />
  <meta property="og:description" content="<?php echo $seo['description']; ?>" />
  <meta property="og:type" content="article" />
  <meta property="og:image" content="<?php echo @$seo['image']; ?>" />
  <meta property="og:app_id" content="105609389794209" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Bootstrap -->
	<link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/layout.css" rel="stylesheet">
 	<link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet">
 	<link href="<?php echo base_url(); ?>assets/css/zoomer.css" rel="stylesheet">
  	<link href="<?php echo base_url(); ?>assets/css/owl.carousel.css" rel="stylesheet">

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
  </head>
  <body>

    <?php if(!$this->session->userdata('uid')): ?>
  	<!--signin modal starts-->
  <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-login">
    <div class="modal-content modal-wrap">
  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"> <img src="<?php echo base_url();?>assets/images/close.png"></span>
  </button>
      </div>
      <div class="col-md-5 no-pad">
        <img src="<?php echo base_url();?>assets/images/login-img.jpg" alt="login image" class="img-responsive">
   </div>
   
   <div class="col-md-6 signup-main">
    <div class="row">
     <h2>Login to Lookser</h2>
     <div class="row with">
       <div class="col-md-6"><a href="#"><img src="<?php echo base_url();?>assets/images/signinfb.png"
        alt="login with facebook" class="img-responsive"></a></div>
        <div class="col-md-6"><a href="#"><img src="<?php echo base_url();?>assets/images/signingplus.png"
         alt="login with google plus" class="img-responsive"></a></div>
     </div> 

          <form accept-charset="" action="" class=""  method="">
            <div class='row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'>E-mail ID</label>
                <input class='form-control' type='text' name="login_email" id="login_email">
              </div>
            </div>
            <div class='row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'>Password</label>
                <input class='form-control' type="password" name="login_pass" id="login_pass">
              </div>
            </div>
              <div class='form-group'>
              <button type="submit" id="login_submit" name="login_submit" class="submit">Submit</button>
              </div>
          </form>
   </div>
   </div>
   <div class="clearfix"></div>
    </div>
  </div>
  </div>
  	<!-- signin modal ends-->

  <!--signup user starts-->
  <div class="modal fade" id="signupUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-login">
    <div class="modal-content modal-wrap">
   <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"> <img src="<?php echo base_url();?>assets/images/close.png"></span>
    </button>
      </div>
      <div class="col-md-5 no-pad">
        <img src="<?php echo base_url();?>assets/images/signupuser.jpg" alt="login image" class="img-responsive">
    </div>
    
    <div class="col-md-6 signup-main">
      <div class="row">
      <h2>Signup as User</h2>
      <div class="row with">
        <div class="col-md-6"><a href="#"><img src="<?php echo base_url();?>assets/images/signinfb.png"
         alt="login with facebook" class="img-responsive"></a></div>
         <div class="col-md-6"><a href="#"><img src="<?php echo base_url();?>assets/images/signingplus.png"
          alt="login with google plus" class="img-responsive"></a></div>
      </div> 

    <form accept-charset="" action="" class=""  method="">
            <div class='row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'>Full Name</label>
                <input class='form-control' type='text'>
              </div>
            </div>
       <div class='row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'>E-mail ID</label>
                <input class='form-control' type='text'>
              </div>
            </div>
            <div class='row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'>Password</label>
                <input class='form-control' type="password">
              </div>
            </div>
              <div class='form-group'>
                 <button class="submit">Signup</button>
              </div>
          </form>
    </div>
    </div>
    <div class="clearfix"></div>
    </div>
  </div>
  </div>
  <!-- signup user ends-->

  <!--signup designer starts-->
  <div class="modal fade" id="signupDsgnModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-login">
    <div class="modal-content modal-wrap">
   <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"> <img src="<?php echo base_url();?>assets/images/close.png"></span>
    </button>
      </div>
      <div class="col-md-5 no-pad">
        <img src="<?php echo base_url();?>assets/images/login-img.jpg" alt="login image" class="img-responsive">
    </div>
    
    <div class="col-md-6 signup-main">
      <div class="row">
      <h2>Signup as Designer</h2>
      <div class="row with">
        <div class="col-md-6"><a href="#"><img src="<?php echo base_url();?>assets/images/signinfb.png"
         alt="login with facebook" class="img-responsive"></a></div>
         <div class="col-md-6"><a href="#"><img src="<?php echo base_url();?>assets/images/signingplus.png"
          alt="login with google plus" class="img-responsive"></a></div>
      </div> 

    <form accept-charset="" action="" class=""  method="">
            <div class='row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'>Full Name</label>
                <input class='form-control' type='text'>
              </div>
            </div>
       <div class='row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'>E-mail ID</label>
                <input class='form-control' type='text'>
              </div>
            </div>
            <div class='row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'>Password</label>
                <input class='form-control' type="password">
              </div>
            </div>
              <div class='form-group'>
                 <button class="submit">Login</button>
              </div>
          </form>
    </div>
    </div>
    <div class="clearfix"></div>
    </div>
  </div>
  </div>
  <!-- signup designer ends-->
    <?php endif; ?>

  	<!-- head top starts--> 
  	<div class="container-fluid hidden-xs head-top">
  		<div class="container">
  			<div class="col-md-6 head-left no-pad">
  				<ul>
  					<!-- <li>(855) 255 - 5011</li>-->
  				</ul>
  			</div>

  			<div class="col-md-6">
  				<nav class="navbar">
  					<div class="navbar-header">
  						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
  							<span class="sr-only">Toggle navigation</span>
  							<span class="icon-bar"></span>
  							<span class="icon-bar"></span>
  							<span class="icon-bar"></span>
  						</button>
  					</div>

  					<?php if(!$this->session->userdata('uid')): ?>
  					<!-- Collect the nav links, forms, and other content for toggling -->
  					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  						<ul class="nav navbar-nav navbar-right top-menu">
  							<li><a href="#" data-toggle="modal" data-target="#LoginModal">Login</a></li>
  							<li>
  								<div class="ui-group-buttons">
  									<button type="button" class="btn userbtn btn-xs" data-toggle="modal" 
  								data-target="#signupUserModal">Signup As User</button>
  									<div class="or or-xs"></div>
  									<button type="button" class="btn desbtn btn-xs" data-toggle="modal" 
  								data-target="#signupDsgnModal">Signup As Designer</button>
  								</div>
  							</li>
  						</ul>
  					</div><!-- /.navbar-collapse -->
  					<?php else: ?>
  					<!-- Collect the nav links, forms, and other content for toggling -->
  					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  						<ul class="nav navbar-nav navbar-right top-menu">
  							<li><a href="<?php echo base_url('user/logout'); ?>">Logout</a></li>
  						</ul>
  					</div><!-- /.navbar-collapse -->
  					<?php endif; ?>
  				</nav>
  			</div>
  		</div>
  	</div>
  	<!--head top end-->

  	<!-- slider starts -->
  	<div id="masterhead">
  		<div class="container-fluid no-pad">
  			<div class="menu-main">
  				<nav class="navbar">
  					<div class="container">
  						<!-- Brand and toggle get grouped for better mobile display -->
  						<div class="navbar-header">
  							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
  								<span class="sr-only">Toggle navigation</span>
  								<span class="icon-bar"></span>
  								<span class="icon-bar"></span>
  								<span class="icon-bar"></span>
  							</button>
                <a class="navbar-brand logo" href="<?php echo base_url(); ?>">
                  <img src="<?php echo base_url();?>assets/images/logo.png" alt="Lookser" title="Looser">
                </a>
  						</div>

  						<!-- Collect the nav links, forms, and other content for toggling -->
  						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  							<ul class="nav navbar-nav navbar-right">
  								<li class="active"><a href="<?php echo base_url(); ?>looks">get the look <span class="sr-only">(current)</span></a></li>
  								<li><a href="<?php echo base_url(); ?>products">shop</a></li>
                  <?php if($this->session->userdata('role') == 2): ?>
                  <li><a href="<?php echo base_url('looks/create'); ?>">Create look</a></li>
                  <?php endif; ?>
  								<!-- <li><a href="#">top offers</a></li> -->
  								<!-- <li><a href="#">how it works</a></li> -->
  								<!-- <li><a href="#">blog</a></li> -->
  								<form class="navbar-form navbar-left" role="search" action="<?php echo base_url('looks'); ?>">
  									<div class="form-group">
  										<input type="text" name="s" id="s" class="form-control menu-search" placeholder="Search" value="<?php if(isset($_GET['s'])) { echo strip_tags($_GET['s']); } ?>">
  									</div>
  								</form>
  							</ul>
  						</div><!-- /.navbar-collapse -->
  					</div><!-- /.container-fluid -->
  				</nav>
  			</div>

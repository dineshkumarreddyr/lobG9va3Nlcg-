<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $seo['title']; ?> || Latest trends in fashion lookser - lookser.com</title>
    <meta name="description" content="<?php echo $seo['description']; ?> - lookser" />
    <meta name="keywords" content="<?php echo $seo['keywords']; ?>, fashion, trends, discover, tops, dresses, jewellery, accessories, shoes, bags, lingerie, tops, dresses, pants, kurtis, salwaar-kameez, lastest fashion, lastest styles,  fashion looks, classy looks, awesome looks, lookser shop, fashion one stop, perfection looks, lookser, lookser.com." />

    <link rel="icon" type="image/ico" href="<?php echo base_url(); ?>assets/images/favicon.ico"/>

  <meta property="og:title" content="<?php echo $seo['title']; ?> || Latest trends in fashion lookser.com" />
  <meta property="og:site_name" content="Lookser"/>
  <meta property="og:url" content="<?php echo base_url(uri_string()); ?>" />
  <meta property="og:description" content="<?php echo $seo['description']; ?>" />
  <meta property="og:type" content="article" />
  <meta property="og:image" content="<?php echo @$seo['image']; ?>" />
  <meta property="og:app_id" content="105609389794209" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>  
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
      <div class="col-md-5 no-pad hidden-xs">
        <img src="<?php echo base_url();?>assets/images/login-img.jpg" alt="login image" class="img-responsive">
   </div>
   
   <div class="col-md-6 signup-main">
    <div class="row">
     <h2>Login to Lookser</h2>
     <div class="row with">
       <div class="col-md-6 col-xs-6"><a href="<?php echo base_url('user/fb_login'); ?>"><img src="<?php echo base_url();?>assets/images/signinfb.png"
        alt="login with facebook" class="img-responsive"></a></div>
        <div class="col-md-6 col-xs-6"><a href="<?php echo base_url('user/gp_login'); ?>"><img src="<?php echo base_url();?>assets/images/signingplus.png"
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
            <div class='row'>
              <div class="col-md-8"><a href="#">Forgot Password ?</a></div>
              <div class='col-md-4 form-group text-right'>
              <button type="submit" id="login_submit" name="login_submit" class="submit">Submit</button>
              </div>
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
      <div class="col-md-5 no-pad hidden-xs">
        <img src="<?php echo base_url();?>assets/images/signupuser.jpg" alt="login image" class="img-responsive">
    </div>
    
    <div class="col-md-6 signup-main">
      <div class="row">
      <h2>Signup as User</h2>
      <div class="row with">
        <div class="col-md-6 col-xs-6"><a href="<?php echo base_url('user/fb_login'); ?>"><img src="<?php echo base_url();?>assets/images/signinfb.png"
         alt="login with facebook" class="img-responsive"></a></div>
         <div class="col-md-6 col-xs-6"><a href="<?php echo base_url('user/gp_login'); ?>"><img src="<?php echo base_url();?>assets/images/signingplus.png"
          alt="login with google plus" class="img-responsive"></a></div>
      </div> 

    <form accept-charset="" action="" class=""  method="">
            <div class='row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'>Full Name</label>
                <input class='form-control' type='text' name="ur_name" id="ur_name">
              </div>
            </div>
       <div class='row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'>E-mail ID</label>
                <input class='form-control' type='text' name="ur_email" id="ur_email">
              </div>
            </div>
            <div class='row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'>Password</label>
                <input class='form-control' type="password" name="ur_pass" id="ur_pass">
              </div>
            </div>
            <div id="ur_msg"></div>
              <div class='form-group'>
                 <button type="submit" id="ur_submit" name="ur_submit" class="submit">Submit</button>
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
      <div class="col-md-5 no-pad hidden-xs">
        <img src="<?php echo base_url();?>assets/images/login-img.jpg" alt="login image" class="img-responsive">
    </div>
    
    <div class="col-md-6 signup-main">
      <div class="row">
      <h2>Signup as Designer</h2>
      <div class="row with">
        <div class="col-md-6 col-xs-6"><a href="<?php echo base_url('user/fb_login'); ?>"><img src="<?php echo base_url();?>assets/images/signinfb.png"
         alt="login with facebook" class="img-responsive"></a></div>
         <div class="col-md-6 col-xs-6"><a href="<?php echo base_url('user/gp_login'); ?>"><img src="<?php echo base_url();?>assets/images/signingplus.png"
          alt="login with google plus" class="img-responsive"></a></div>
      </div> 

    <form accept-charset="" action="" class=""  method="">
            <div class='row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'>Full Name</label>
                <input class='form-control' type='text' name="dr_name" id="dr_name">
              </div>
            </div>
       <div class='row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'>E-mail ID</label>
                <input class='form-control' type='email' name="ur_email" id="dr_email">
              </div>
            </div>
            <div class='row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'>Password</label>
                <input class='form-control' type="password" name="dr_pass" id="dr_pass">
              </div>
            </div>
            <div id="dr_msg"></div>
              <div class='form-group'>
                 <button type="submit" id="dr_submit" name="dr_submit" class="submit">Submit</button>
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
    
    <!--mobile menu starts-->
	<div class="container visible-xs">
	<div class="row mob-menu">
	 <div class="col-xs-2">
	  <ul>
	    <li><a href="#" id="c-button--slide-left" class="c-button"><img src="http://www.lookser.com/assets/images/mob-menu.png" class="img-responsive"></a></li>
	  </ul>
	 </div>
	 <div class="col-xs-8"><img src="http://www.lookser.com/assets/images/logo.png" class="img-responsive"></div>
	</div>
	</div>

	<div class="mob-items-wrap visible-xs">
	  <nav id="c-menu--slide-left" class="c-menu c-menu--slide-left">
	  <div class="mob-blue">
	    <img src="<?php echo base_url();?>assets/images/hi.png" alt="">
		<div class="options"><a href="#" data-toggle="modal" data-target="#LoginModal">Login</a> </div>
		<div class="options"><a href="#" data-toggle="modal" data-target="#signupUserModal">Signup as User</a> 0r 
		<a href="#" data-toggle="modal" data-target="#signupDsgnModal">Signup as Designer</a></div>
	  </div>
	  <ul class="c-menu__items">
		<li class="c-menu__item">
		  <a href="<?php echo base_url(); ?>" class="row c-menu__link">
		  <div class="col-xs-2 text-left"><i class="flaticon-home7"></i></div>
		  <div class="col-xs-10 text-left">Home</div>
		  </a>
		</li>
		<li class="c-menu__item">
		  <a href="<?php echo base_url('products'); ?>" class="row c-menu__link">
		  <div class="col-xs-2 text-left"><i class="flaticon-purse10"></i></div>
		  <div class="col-xs-10 text-left">Shop With Us</div>
		  </a>
		</li>
		<li class="c-menu__item">
		  <a href="<?php echo base_url('looks'); ?>" class="row c-menu__link">
		  <div class="col-xs-2 text-left"><i class="flaticon-users78"></i></div>
		  <div class="col-xs-10 text-left">Get the Look</div>
		  </a>
		</li>
		<li class="c-menu__item">
		  <a href="#" class="row c-menu__link">
		  <div class="col-xs-2 text-left"><i class="flaticon-all6"></i></div>
		  <div class="col-xs-10 text-left">Create Look</div>
		  </a>
		</li>
	  </ul>
	  
	  <ul class="c-menu__items">
		<li class="c-menu__item">
		  <a href="#" class="row c-menu__link">
		  <div class="col-xs-2 text-left"><i class="flaticon-home7"></i></div>
		  <div class="col-xs-10 text-left">About Us</div>
		  </a>
		</li>
		<li class="c-menu__item">
		  <a href="#" class="row c-menu__link">
		  <div class="col-xs-2 text-left"><i class="flaticon-identification57"></i></div>
		  <div class="col-xs-10 text-left">Blog</div>
		  </a>
		</li>
		<li class="c-menu__item">
		  <a href="#" class="row c-menu__link">
		  <div class="col-xs-2 text-left"><i class="flaticon-career1"></i></div>
		  <div class="col-xs-10 text-left">Careers</div>
		  </a>
		</li>
		<li class="c-menu__item">
		  <a href="#" class="row c-menu__link">
		  <div class="col-xs-2 text-left"><i class="flaticon-agreement2"></i></div>
		  <div class="col-xs-10 text-left">Partner With Us</div>
		  </a>
		</li>
	  </ul>
	  
	  <ul class="c-menu__items">
		<li class="c-menu__item">
		  <a href="#" class="row c-menu__link">
		  <div class="col-xs-2 text-left"><i class="flaticon-identification57"></i></div>
		  <div class="col-xs-10 text-left">My Account</div>
		  </a>
		</li>
		<li class="c-menu__item">
		  <a href="#" class="row c-menu__link">
		  <div class="col-xs-2 text-left"><i class="flaticon-loving18"></i></div>
		  <div class="col-xs-10 text-left">My Favourites</div>
		  </a>
		</li>
	  </ul>
	  <button class="c-menu__close">&larr; Close Menu</button>
	</nav>
	<div id="c-mask" class="c-mask"></div>
	</div>
  <!--mobile menu ends-->

    <!-- head top starts--> 
    <div class="container-fluid hidden-xs head-top">
      <div class="container">
        <div class="col-md-6 head-left no-pad"></div>

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
                <li><a href="#" data-toggle="modal" data-target="#LoginModal"><i class="flaticon-user7"></i> Login</a></li>
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
              <ul class="navbar-nav navbar-right loggedmenu">
                <!--<li><a href="<?php echo base_url('user/logout'); ?>">Logout</a></li>-->
                <div class="btn-group">
                <a href="<?php echo base_url('designer/'.$this->session->userdata('uid')); ?>" class="btn logged">
                <?php echo $this->session->userdata('name'); ?></a>
                <button data-toggle="dropdown" class="btn dropdown-toggle" type="button"><i class="glyphicon glyphicon-chevron-down"></i>
                </button>
                <ul class="dropdown-menu">
                  <?php if($this->session->userdata('role') == 3): ?>
                  <li><a href="<?php echo base_url('myaccount'); ?>">My Profile</a></li>
                  <?php elseif($this->session->userdata('role') == 2): ?>
                  <li><a href="<?php echo base_url('designer/'.$this->session->userdata('uid')); ?>">My Profile</a></li>
                  <li><a href="<?php echo base_url('designer/edit/'.$this->session->userdata('uid')); ?>">Edit Profile</a></li>
                <?php endif; ?>
                  <li><a href="<?php echo base_url('followings'); ?>">My Followings</a></li>
                  <li><a href="<?php echo base_url('favourites'); ?>">My Favourites</a></li>
                  <li><a href="<?php echo base_url('user/logout'); ?>">Logout</a></li>
                </ul>
                  </div>
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
        <div class="menu-main hidden-xs">
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
                  <form class="navbar-form navbar-left" role="search" action="<?php echo base_url('looks'); ?>">
                    <div class="form-group">
                      <input type="text" name="s" id="s" class="form-control menu-search" placeholder="Search" value="<?php if(isset($_GET['s'])) { echo strip_tags($_GET['s']); } ?>">
                    </div>
                  </form>
                  <li class="active"><a href="<?php echo base_url(); ?>looks">get the look <span class="sr-only">(current)</span></a></li>
                  <li><a href="<?php echo base_url(); ?>products">shop</a></li>
                  <?php if($this->session->userdata('role') == 2): ?>
                  <li><a href="<?php echo base_url('looks/create'); ?>">Create look</a></li>
                  <?php endif; ?>
                  <!-- <li><a href="#">top offers</a></li> -->
                  <!-- <li><a href="#">how it works</a></li> -->
                  <!-- <li><a href="<?php echo base_url('blog'); ?>">blog</a></li> -->
                  <li><a href="<?php echo base_url('coupons'); ?>">Coupons/Offers</a></li>
                  <?php if($this->session->userdata('uid')): ?>
                  <li class="favs"><a href="<?php echo base_url('favourites'); ?>"><i class="flaticon-like78"></i> <?php echo $this->session->userdata('fav_count'); ?></a></li>
                  <?php endif; ?>
                  <?php if($this->session->userdata('uid')): ?>
                  <li class="foll"><a href="<?php echo base_url('followings'); ?>"><i class="flaticon-user7"></i> <?php echo $this->session->userdata('follow_count'); ?></a></li>
                  <?php endif; ?>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
        </div>
        
        
    <!--mobile menu script-->
	<script src="<?php echo base_url();?>assets/js/menu.js"></script>
	<script>
	  var slideLeft = new Menu({
		wrapper: '.mob-menu',
		type: 'slide-left',
		menuOpenerClass: '.c-button',
		maskId: '#c-mask'
	  });
	  var slideLeftBtn = document.querySelector('#c-button--slide-left');
	  slideLeftBtn.addEventListener('click', function(e) {
		e.preventDefault;
		slideLeft.open();
	  });
	</script>
	<!--mobile menu script-->
        
        
    <div class="slideshow">
    <div id="slideshow" class="carousel slide carousel-fade" data-ride="carousel" 
    data-interval="3000">
    <div class="carousel-inner">
    <div class="item active">
    <img class="img-responsive" src="<?php echo base_url();?>assets/images/coupons.jpg" alt="First Slide">
    <div class="container">
    <div class="carousel-caption">
    <h1>offers and Deals</h1>
    <h3>The best possible ways to save while you shop</h3>
    </div>
    </div>
    </div><!-- /. Item Active -->
    </div><!-- /. Carousel-Inner -->
    </div><!-- /# Slideshow .Carousel -->
    </div><!-- /. Slideshow -->
    </div><!-- /. Container -->
    </div><!-- /# Mastehead -->  
  <!--slider ends-->

    <!--coupon starts-->
    <div class="container coupon-wrap">
      <div class="row">
        <?php foreach ($coupons as $key => $coupon): ?>
        <div class="col-md-3">
          <div class="coupon-each">
            <div class="coupon-image">
              <img src="<?php echo base_url();?>assets/images/offer.jpg" class="img-responsive">
            </div>
            <div class="arrow"></div>
            <div class="coupon-content">
              <h3><a href="<?php echo $coupon->c_url; ?>" target="_blank"><?php echo $coupon->c_title; ?></a></h3>
              <div class="cou-prov">
                <div class="row">
                <div class="col-md-5">
                  <!-- <img src="<?php echo base_url();?>assets/images/yepme.png" class="img-responsive"> -->
                  <?php echo $coupon->c_merchant; ?>
                </div>
                <div class="col-md-7 expire">Expire - <?php echo date('d-m-Y', strtotime($coupon->c_expiryDate)); ?></div>
              </div>
              </div>
              <?php if($coupon->c_code != 'No Coupon Required'): ?>
              <div class="getcode">Coupon Code : <span><?php echo $coupon->c_code; ?></span></div>
              <?php else: ?>
              <div class="getcode"><a href="<?php echo $coupon->c_url; ?>" target="_blank">CLICK HERE<a></div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <!--coupon ends-->
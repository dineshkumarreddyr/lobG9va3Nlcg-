<div class="modal-dialog modal-md">
  <div class="clearfix modal-content">
    <div class="clearfix modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
    </div>
    <div class="col-md-10 col-md-offset-1 couponModal-wrap">
      <img src="<?php echo base_url();?>assets/images/cup.png" alt="coupon" width="100">
      <div class="clearfix">&nbsp;</div>
      <h3>Please visit <span><?php echo $coupon->c_merchant; ?></span> and use the code below to avail offer</h3>
      <div class="code"><?php echo $coupon->c_code; ?></div>
      <h2><a href="<?php echo $coupon->c_url; ?>" target="_blank"> >>CLICK HERE<< </a></h2>
      <div class="coupon-details">
        <h3><?php echo $coupon->c_title; ?></h3>
    <p><?php echo $coupon->c_description; ?></p>
      </div>
    </div>
  </div>
</div>
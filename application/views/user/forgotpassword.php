

		</div><!-- /. Container -->
		</div><!-- /# Mastehead -->  
	<!--slider ends-->
		
	<!--login starts-->
    <div class="container login-main">
      <div class="row">
        <div class="col-md-7 nopad-left">
            <img src="<?php echo base_url(); ?>assets/images/login.jpg" class="img-responsive">
        </div>
        <div class="col-md-5 login-card">
              <h1>Forgot password</h1>
              <form method="post" action="">
              <div><?php if(isset($errr_msg) && !empty($errr_msg)) { echo $errr_msg; }?></div>
                <input type="text" name="email" id="email" placeholder="Email-ID">
                <input type="submit" name="fg_pass" id="fg_pass" value="Submit">
                <p>Already a member? <a href="<?php echo base_url('login'); ?>">Login</a></p>
                <p>Not a Member? <a href="<?php echo base_url('register'); ?>">Register Now</a></p>
              </form>
              <div class="or-box">
                    <span class="formor">OR</span>
              </div>
              <ul>
                <li><a href="#"><img src="<?php echo base_url(); ?>assets/images/sharefb.png" alt="facebook"></a></li>
                <li><a href="#"><img src="<?php echo base_url(); ?>assets/images/sharetw.png" alt="Twitter"></a></a></li>
                <li><a href="#"><img src="<?php echo base_url(); ?>assets/images/shareinst.png" alt="Instagram"></a></a></li>
              </ul>
          </div>
      </div>
    </div>
    <!--login ends-->	

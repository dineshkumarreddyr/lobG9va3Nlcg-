<div class="clearfix"></div>
<div class="footer">
  <div class="container">
     <div class="col-md-7 col-sm-7 footer-left">
        <div class="col-md-3 hidden-xs">
           <div class="footer-list">
           <h3>COMPANY</h3>
              <ul>
                <li><a href="<?php echo base_url(); ?>">HOME</a></li>
                <li><a href="<?php echo base_url('products'); ?>">SHOP</a></li>
                <li><a href="<?php echo base_url('looks'); ?>">LOOKS</a></li>
                <li><a href="<?php echo base_url('looks/create'); ?>">CRATE A LOOK</a></li>
                <li><a href="<?php echo base_url('designers'); ?>">BROWSE DESIGNERS</a></li>
              </ul>
           </div>
        </div>
        <div class="col-md-3 hidden-xs">
           <div class="footer-list">
           <h3>WEBSITE</h3>
              <ul>
                <li><a href="<?php echo base_url('about'); ?>">ABOUT US</a></li>
                <li><a href="javascript:void(0);">HOW IT WORKS</a></li>
                <li><a href="javascript:void(0);">MY ACCOUNT</a></li>
                <li><a href="<?php echo base_url('coupons'); ?>">COUPONS</a></li>
                <li><a href="<?php echo base_url('personalize'); ?>">PERSONALIZE ME</a></li>
                <!-- <li><a href="javascript:void(0);">PARTNER WITH US</a></li> -->
                <!-- <li><a href="javascript:void(0);">CAREERS</a></li> -->
              </ul>
           </div>
        </div>
        <div class="col-md-3 hidden-xs">
           <div class="footer-list">
           <h3>POLICIES</h3>
              <ul>
                <li><a href="javascript:void(0);">PRIVACY POLICY</a></li>
                <li><a href="javascript:void(0);">TERMS</a></li>
              </ul>
           </div>
        </div>
        <div class="col-md-3 hidden-xs">
           <div class="footer-list">
           <h3>HELP</h3>
              <ul>
                <!-- <li><a href="javascript:void(0);">SUPPORT</a></li> -->
                <!-- <li><a href="javascript:void(0);">855.255.2011</a></li> -->
                <li><a href="mailto:info@lookser.com?Subject=Hello%20again" target="_top">info@lookser.com</a></li>
                <li><a href="javascript:void(0);">CONTACT US</a></li>
              </ul>
           </div>
        </div>
     </div>
     
     <div class="col-md-5 col-sm-5 social">
        <h3>CONNECT ONLINE</h3>
          <ul>
             <li><a href="https://www.facebook.com/lookserIndia" target="_blank"><img src="<?php echo base_url();?>assets/images/facebook.png" alt="social icons"></a></li>
             <li><a href="javascript:void(0);"><img src="<?php echo base_url();?>assets/images/googleplus.png" alt="social icons"></a></li>
             <li><a href="javascript:void(0);"><img src="<?php echo base_url();?>assets/images/linkedin.png" alt="social icons"></a></li>
             <li><a href="javascript:void(0);"><img src="<?php echo base_url();?>assets/images/pinterest.png" alt="social icons"></a></li>
             <li><a href="javascript:void(0);"><img src="<?php echo base_url();?>assets/images/twitter.png" alt="social icons"></a></li>
             <li><a href="javascript:void(0);"><img src="<?php echo base_url();?>assets/images/flickr.png" alt="social icons"></a></li>
          </ul>
        <h3>JOIN OUR MAILING LIST TO RECIEVE UPDATES</h3>
        <form action="#">
    <div class="input-group ">
      <form>
      <div id="s_msg"></div>
       <input class="btn btn-lg" name="s_email" id="s_email" type="email" placeholder="Please enter your Email-ID" required="">
       <button class="btn btn-info btn-lg" type="submit" name="s_submit" id="s_submit">Submit</button>
      </form>
    </div>
   </form>
     </div>
    </div>
  </div><!--end of footer-->

<div class="copy">
  <div class="container">
  <div class="col-md-12 text-center">© 2015 Lookser | ALL RIGHTS RESERVED</div>
</div>
</div>


<script src="<?php echo base_url(); ?>assets/js/jquery.fs.zoomer.js"></script>
<script>$(".viewer").zoomer();</script>
<!--<script src="<?php echo base_url();?>assets/js/budget.js"></script>-->

<script src="<?php echo base_url();?>assets/js/color.js"></script>
<script>$('.carousel').carousel();</script>
<!-- Lazy laod -->
<script src="<?php echo base_url();?>assets/js/jquery.lazyload.js"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
    $(function() {
      $("img.lazy").lazyload();
    });
  });
</script>
<!-- Lazy laod -->
<script>
function contentSwitcher(settings){
  var settings = {
   contentClass : '.content',
   navigationId : '#created-categ'
 };
 $(settings.contentClass).not(':first').hide();
 $(settings.navigationId).find('li:first').addClass('active');
 $(settings.navigationId).find('a').click(function(e){

   var contentToShow = $(this).attr('href');
   contentToShow = $(contentToShow);
   e.preventDefault();
   $(settings.navigationId).find('li').removeClass('active');
   $(this).parent('li').addClass('active');
   $(settings.contentClass).hide();
   contentToShow.show();
 });
}
contentSwitcher();
</script>
<script>
$(document).ready(function() {
  $('#Carousel').carousel({
   interval: 5000
 })
});
</script>

<!--color-->
<script>
$(document).ready(function() {
  $('select[name="colorpicker-longlist"]').simplecolorpicker();
  $('select[name="colorpicker-picker-longlist"]').simplecolorpicker({picker: true, theme: 'glyphicons'});

  $('#destroy').on('click', function() {
    $('select').simplecolorpicker('destroy');
  });
});
</script>
<!--color-->
<script type="text/javascript">
$(function(){
  $('#login_submit').click(function(){
    var login_email = $('#login_email').val();
    var login_pass = $('#login_pass').val();
    if(login_email == '') {
      alert('Invalid Email');
      return false;
    }
    else if(login_pass == '') {
      alert('Invalid password');
      return false;
    }
    else {
      $.ajax({
        type:"POST",
        url:'<?php echo base_url();?>user/ajax_login',
        data:{'email':login_email,'pass':login_pass},
        dataType:"json",
        success: function(data) {
          console.log(data);
          if(data.status == 'error') {
            alert(data.message);
          }
          else if(data.status == 'success') {
            window.location='<?php echo base_url(uri_string()); ?>';
          }
        }
      });
    }
    return false;
  });

  // user registration

  $('#ur_submit').click(function(){
    var ur_name = $('#ur_name').val();
    var ur_email = $('#ur_email').val();
    var ur_pass = $('#ur_pass').val();
    if(ur_name == '') {
      alert('Invalid Name');
      return false;
    }
    else if(ur_email == '') {
      alert('Invalid Email');
      return false;
    }
    else if(ur_pass == '') {
      alert('Invalid password');
      return false;
    }
    else {
      $.ajax({
        type:"POST",
        url:'<?php echo base_url();?>user/ajax_ur_register',
        data:{'name':ur_name,'email':ur_email,'pass':ur_pass},
        dataType:"json",
        success: function(data) {
          // console.log(data);
          if(data.status == 'error') {
            // alert(data.message);
            $('#ur_msg').text(data.message);
          }
          else if(data.status == 'success') {
            // window.location='<?php echo base_url(uri_string()); ?>';
            $('#ur_msg').text(data.message);
          }
        }
      });
    }
    return false;
  });

  // designer registration

  $('#dr_submit').click(function(){
    var dr_name = $('#dr_name').val();
    var dr_email = $('#dr_email').val();
    var dr_pass = $('#dr_pass').val();
    if(dr_name == '') {
      alert('Invalid Name');
      return false;
    }
    else if(dr_email == '') {
      alert('Invalid Email');
      return false;
    }
    else if(dr_pass == '') {
      alert('Invalid password');
      return false;
    }
    else {
      $.ajax({
        type:"POST",
        url:'<?php echo base_url();?>user/ajax_dr_register',
        data:{'name':dr_name,'email':dr_email,'pass':dr_pass},
        dataType:"json",
        success: function(data) {
          // console.log(data);
          if(data.status == 'error') {
            // alert(data.message);
            $('#dr_msg').text(data.message);
          }
          else if(data.status == 'success') {
            // window.location='<?php echo base_url(uri_string()); ?>';
            $('#dr_msg').text(data.message);
          }
        }
      });
    }
    return false;
  });
});
  /*$.ajax({
    type:"POST",
    url:'<?php echo base_url();?>',
    data:{'email':email,'pass':pass},
    dataType:"json",
    success: function(data) {
      if(data.result==1) {
        window.location='<?php echo base_url();?>index.php/landing/welcome';
      }
      else if(data.result==0) {

        $(".error").text("<?php echo $this->lang->line('please_enter_email_address');?>");
        $(".warning").css('display','block');
      }
      else if(data.result==2) {

        $(".error").text("<?php echo $this->lang->line('account_not_verified');?>");
        $(".warning").css('display','block');
      }
    }
  });*/

// mail subscritption

$(function(){
  $('#s_submit').click(function(){
    var s_email = $('#s_email').val();
    if(s_email == '') {
      alert('Invalid Email');
      return false;
    }
    else {
      $.ajax({
        type:"POST",
        url:'<?php echo base_url();?>user/subscription',
        data:{'email':s_email},
        dataType:"json",
        success: function(data) {
          console.log(data);
          if(data.status == 'error') {
            $('#s_msg').html('Sorry, Your email already subscribed.');
          }
          else if(data.status == 'success') {
            $('#s_msg').html('Thanks, Your email successfully subscribed.');
          }
        }
      });
    }
    return false;
  });

});

// mail subscritption

</script>

<script>
// google analytics
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-66671440-1', 'auto');
  ga('send', 'pageview');
// google analytics
</script>



</body>
</html>
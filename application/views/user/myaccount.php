
<!--change pic pop-->
  <div class="modal fade" id="changepic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post" enctype="multipart/form-data">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Change Profile Picture</h4>
      </div>
      <div class="modal-body">
        <div class="clearfix avatar-wrap">
          <div class="row">
          <div class="col-md-8">
          <h3>Choose Avatar</h3>
          <ul class="clearfix">
            <li>
               <div class="clearfix"><img src="<?php echo base_url(); ?>uploads/designers/male1.png" class="img-responsive"></div>
               <input value="male1.png" id="one" type="radio" name="avatar">
            </li>
            <li>
               <div class="clearfix"><img src="<?php echo base_url(); ?>uploads/designers/male2.png" class="img-responsive"></div>
               <input value="male2.png" id="two" type="radio" name="avatar">
            </li>
            <li>
               <div class="clearfix"><img src="<?php echo base_url(); ?>uploads/designers/female1.png" class="img-responsive"></div>
               <input value="female1.png" id="three" type="radio" name="avatar">
            </li>
            <li>
               <div class="clearfix"><img src="<?php echo base_url(); ?>uploads/designers/male2.png" class="img-responsive"></div>
               <input value="female2.png" id="four" type="radio" name="avatar">
            </li>
          </ul>
          <h3>Upload your Image</h3>
          <div class="file-area">
          <input type="file" name="fileToUpload" id="fileToUpload" accept=".png, .jpg, .jpeg">
          <div class="file-dummy">
            <div class="success">Great, your files are selected. Keep on.</div>
            <div class="default">Please select a file</div>
          </div>
          </div>
          </div>
          <div class="col-md-4"><img src="<?php echo base_url(); ?>uploads/users/<?php echo ($user_details->user_image == '') ? 'default.jpg' : $user_details->user_image; ?>" id="preview_pic" class="img-responsive"></div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <input type="submit" class="btn btn-primary" name="change_pic" id="change_pic" value="Save Picture" >
      </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('#fileToUpload').change( function(event) {
    var tmppath = URL.createObjectURL(event.target.files[0]);
    $("#preview_pic").attr('src',tmppath);       
});

</script>
  <!--change pic pop-->       
  <!--favourites starts-->
  <div class="container userProfile-wrap" id="favourites">
  <div class="text-center">
  <input type="image" class="avatar" src="<?php echo base_url();?>assets/images/male1.png" width="25px" data-toggle="modal" data-target="#changepic">
      <div class="uploadpic">
          <img src="<?php echo base_url(); ?>uploads/users/<?php echo ($user_details->user_image == '') ? 'default.jpg' : $user_details->user_image; ?>" class="img-responsive">          
      </div>
      *Upload a photo. Photographs are necessary
  </div>
  <div class="container creators-wrap">
    <div class="col-md-12" id="user-categ">
      <ul>
        <li><a href="#basic">Basic Profile</a></li>
        <li><a href="#full">Full Profile</a></li>    
      </ul>
    </div>
    <!--by designers-->
    <div id="basic" class="content">
      <div class="row">
        <div class="col-md-9 user-left">
          <form class="form-horizontal" name="basic_details" method="post" onsubmit="return save_basic_details();">
            <fieldset>
              <div class="control-group">
                <div class="row controls">
                  <div class="col-md-6">
                    <input type="text" id="fisrt_name" name="fisrt_name" placeholder="First name" class="input-xlarge" value="<?php echo $user_details->user_fname; ?>">
                  </div>
                  <div class="col-md-6">
                    <input type="text" id="last_name" name="last_name" placeholder="Last name" class="input-xlarge" value="<?php echo $user_details->user_lname; ?>">
                  </div>
                </div>
              </div>

              <div class="control-group">
                <div class="controls">
                  <input type="email" id="email" name="email" placeholder="Email id" class="input-xlarge" value="<?php echo $user_details->user_email; ?>">
                </div>
              </div>

              <div class="control-group">
                <div class="row controls">
                <div class="col-md-6">
                  <input type="text" id="mobile" name="mobile" placeholder="Mobile Number" class="input-xlarge" value="<?php echo $user_details->user_mobile; ?>">
                  </div>
                  <div class="col-md-6">
                  <input type="date" id="dob" name="dob" placeholder="Date of Birth dd/mm/yyyy" class="input-xlarge" value="<?php echo date('Y-m-d', strtotime($user_details->user_dob)); ?>">
                  </div>
                </div>
              </div>

              <div class="control-group">
                <div class="controls">
                  <input type="text" id="address1" name="address1" placeholder="Address1" class="input-xlarge" value="<?php echo $user_details->user_address1; ?>">
                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <input type="text" id="address2" name="address2" placeholder="Address2" class="input-xlarge" value="<?php echo $user_details->user_address2; ?>">
                </div>
              </div>

              <div class="control-group">
                <div class="controls">
                  <div class="row">
                    <div class="col-md-4">
                    <input type="text" id="city" name="city" placeholder="City" class="input-xlarge" value="<?php echo $user_details->user_location; ?>"></div>
                    <div class="col-md-4">
                      <select id="state" name="state" class="minimal">
                        <option value="" selected="">-- Please select state --</option>
                        <?php
                        $indian_all_states  = array (
                               'AP' => 'Andhra Pradesh',
                               'AR' => 'Arunachal Pradesh',
                               'AS' => 'Assam',
                               'BR' => 'Bihar',
                               'CT' => 'Chhattisgarh',
                               'GA' => 'Goa',
                               'GJ' => 'Gujarat',
                               'HR' => 'Haryana',
                               'HP' => 'Himachal Pradesh',
                               'JK' => 'Jammu & Kashmir',
                               'JH' => 'Jharkhand',
                               'KA' => 'Karnataka',
                               'KL' => 'Kerala',
                               'MP' => 'Madhya Pradesh',
                               'MH' => 'Maharashtra',
                               'MN' => 'Manipur',
                               'ML' => 'Meghalaya',
                               'MZ' => 'Mizoram',
                               'NL' => 'Nagaland',
                               'OR' => 'Odisha',
                               'PB' => 'Punjab',
                               'RJ' => 'Rajasthan',
                               'SK' => 'Sikkim',
                               'TN' => 'Tamil Nadu',
                               'TR' => 'Tripura',
                               'UK' => 'Uttarakhand',
                               'UP' => 'Uttar Pradesh',
                               'WB' => 'West Bengal',
                               'AN' => 'Andaman & Nicobar',
                               'CH' => 'Chandigarh',
                               'DN' => 'Dadra and Nagar Haveli',
                               'DD' => 'Daman & Diu',
                               'DL' => 'Delhi',
                               'LD' => 'Lakshadweep',
                               'PY' => 'Puducherry',
                              );
                          foreach ($indian_all_states as $key => $state) :
                            ?>
                          <option value="<?php echo $state; ?>" <?php echo ($user_details->user_state == $state) ? 'selected' : ''; ?>><?php echo $state; ?></option>
                          <?php
                          endforeach;
                        ?>
                      </select>
                    </div>
                    <div class="col-md-4">
                    <div class="control-group">
                      <div class="controls">
                        <input type="text" id="pincode" name="pincode" placeholder="Pincode" class="input-xlarge" value="<?php echo ($user_details->user_pincode == 0) ? '' : $user_details->user_pincode; ?>">
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="control-group">
                <div class="controls">
                  <input type="submit" class="btn btn-success" value="Save Profile" class="input-xlarge">
                </div>
              </div>
            </fieldset>
          </form>
        </div>
        <div class="col-md-3 designerpro-right">    
         <h3>Profile Statistics</h3>
         <div class="clearfix designpro-right-main">
      <div class="profile-right-each">
              <ul class="procounts">
                <li><i class="flaticon-like78"></i><br><span><?php echo $this->session->userdata('fav_count'); ?></span></li>
                <li><i class="flaticon-user7"></i><br><span><?php echo $this->session->userdata('follow_count'); ?></span></li>
              </ul>
      </div>          
      </div>
       <div class="clearfix change">
        <a href="#" type="button" class="change"><i class="glyphicon glyphicon-asterisk"></i> Change password</a>
      </div> 
       </div>
      </div>
   </div>
  <!-- basic -->
  
   <!--full-->
  <div id="full" class="container content">
    <form class="form-horizontal" role="form" id="profile_full" name="profile_full" method="post" onsubmit="return save_full_details();">
    <div class="form-group">
      <label for="maritalstatus" class="col-sm-2 control-label">Marital Status</label>
      <div class="col-sm-9">
        <select class="form-control" id="marstatus" name="marstatus">
          <option value="">-- Select Marital Status --</option>
          <?php
          $marital_status = array('Single'=>'Single', 'Married'=>'Married');
          foreach ($marital_status as $key => $status) {
            ?>
          <option value="<?php echo $key; ?>" <?php echo ($user_details->user_marital_status == $key) ? 'selected="selected"' : ''; ?> ><?php echo $status; ?></option>
            <?php
          }
          ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="gender" class="col-sm-2 control-label">Gender</label>
      <div class="col-sm-9">
        <select class="form-control" id="gender" name="gender">
          <option value="">-- Select gender --</option>
          <?php
          $genders = array('Male'=>'Male', 'Female'=>'Female');
          foreach ($genders as $key => $gender) {
            ?>
          <option value="<?php echo $key; ?>" <?php echo ($user_details->user_gender == $key) ? 'selected="selected"' : ''; ?> ><?php echo $gender; ?></option>
            <?php
          }
          ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="city" class="col-sm-2 control-label">Anniversary</label>
      <div class="col-sm-9">
        <input type="date" placeholder="Choose your anniversary date" id="special_date" class="form-control" name="special_date" value="<?php echo ($user_details->user_special_date != '0000-00-00') ? $user_details->user_special_date : ''; ?>">
      </div>
    </div>
    <div class="form-group">
      <label for="pincode" class="col-sm-2 control-label">I shop online</label>
      <div class="col-sm-9">
        <?php
        $shopping = array('week' => 'Week', 'fornight' => 'Fornight', 'monthly' => 'Monthly', 'quarterly' => 'Quarterly');
        foreach ($shopping as $key => $value) :
          ?>
        <div class="radio">
          <input type="radio" id="<?= $key; ?>" name="shopping" value="<?= $key; ?>" <?php echo ($user_details->user_shop_online == $key) ? 'checked="checked"' : ''; ?> >&nbsp;<?= $value; ?>
        </div>
        <?php
        endforeach;
        ?>
      </div>
    </div>

    <div class="form-group">
      <label for="mobile" class="col-sm-2 control-label">Average Online Bill</label>
      <div class="col-sm-9">
        <?php
        $bill = array('U500' => 'Upto 500', 'U1000' => 'Upto 1000', 'U2000' => 'Upto 2000', 'A2000' => 'Above 2000');
        foreach ($bill as $key => $value) :
          ?>
        <div class="radio">
          <input type="radio" id="<?= $key; ?>" name="bill" value="<?= $key; ?>" <?php echo ($user_details->user_avg_bill == $key) ? 'checked="checked"' : ''; ?>>&nbsp;<?= $value; ?>
        </div>
        <?php
        endforeach;
        ?>
      </div>
    </div>

    <div class="form-group">
      <label for="mobile" class="col-sm-2 control-label">Your Interests</label>
      <div class="col-sm-9" style="margin-left:14px;">
        <?php
        $interests = array('travel' => 'Travel', 'megastores' => 'Megastores', 'mens' => 'Mens', 'kids' => 'Kids', 'books' => 'Books', 'electronics' => 'Electronics', 'women' => 'Women', 'homeliving' => 'Homeliving', 'more' => 'More');
        $saved_interests = explode(',', $user_details->user_interests);
        foreach ($interests as $key => $value) :
          ?>
        <div class="checkbox">
          <input type="checkbox" id="<?= $key; ?>" name="interests" value="<?= $key; ?>" <?php echo ( in_array($key, $saved_interests)) ? 'checked="checked"' : ''; ?> >&nbsp;<?= $value; ?>
        </div>
        <?php
        endforeach;
        ?>
      </div>
    </div>

    <div class="form-group">
      <label for="mobile" class="col-sm-2 control-label">How did you hear about-us?</label>
      <div class="col-sm-9" style="margin-left:14px;">
        <?php
        $came_from = array('google' => 'Google', 'ad' => 'Advertisment', 'newspaper' => 'News Paper', 'radio' => 'Radio', 'facebook' => 'Facebook', 'friends' => 'Friends / Family');
        $saved_came_from = explode(',', $user_details->user_came_from);
        foreach ($came_from as $key => $value) :
          ?>
        <div class="checkbox">
          <input type="checkbox" id="<?= $key; ?>" name="came_from" value="<?= $key; ?>" <?php echo ( in_array($key, $saved_came_from)) ? 'checked="checked"' : ''; ?>>&nbsp;<?= $value; ?>
        </div>
        <?php
        endforeach;
        ?>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-3">
        <input type="submit" class="btn btn-success btn-feat tab-move1" value="Save Details" >
      </div>
    </div>
  </form>
  </div>
  </div>
  <!--full-->
  </div>
  <!--favourites ends-->
    <script>
    function contentSwitcher(settings){
    var settings = {
       contentClass : '.content',
       navigationId : '#user-categ'
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
    $("input[type='image']").click(function() {
    $("input[id='my_file']").click();
    });
  </script>

  <script type="text/javascript">
function save_basic_details () {
  var fisrt_name = $('#fisrt_name').val();
  var last_name = $('#last_name').val();
  var email = $('#email').val();
  var mobile = $('#mobile').val();
  var dob = $('#dob').val();
  var address1 = $('#address1').val();
  var address2 = $('#address2').val();
  var city = $('#city').val();
  var state = $('#state').val();
  var pincode = $('#pincode').val();

  $.ajax({
    type:"POST",
    url:'<?php echo base_url();?>user/ajax_update_user_basic_details',
    data:{'first_name':fisrt_name,'last_name':last_name,'email':email,'mobile':mobile,'dob':dob,'address1':address1,'address2':address2,'city':city,'state':state,'pincode':pincode},
    dataType:"json",
    success: function(data) {
      // console.log(data);
      if(data.status == 'error') {
        // alert(data.message);
        // $('#dr_msg').text(data.message);
      }
      else if(data.status == 'success') {
        alert('Successfully updated.');
        window.location='<?php echo base_url(uri_string()); ?>';
        // $('#dr_msg').text(data.message);
      }
    }
  });
  return false;
}

function save_full_details () {
  var marstatus = $('#marstatus').val();
  var gender = $('#gender').val();
  var special_date = $('#special_date').val();
  var shopping = '';
  $('input[name=shopping]:checked').map(function() {
    shopping = $(this).val();
  });

  var bill = '';
  $('input[name=bill]:checked').map(function() {
    bill = $(this).val();
  });

  var interests = [];
  $('input[name=interests]:checked').map(function() {
    interests.push($(this).val());
  });
  interests = interests.join();

  var came_from = [];
  $('input[name=came_from]:checked').map(function() {
    came_from.push($(this).val());
  });
  came_from = came_from.join();


  $.ajax({
    type:"POST",
    url:'<?php echo base_url();?>user/ajax_update_user_full_details',
    data:{'marital_status':marstatus,'gender':gender,'special_date':special_date,'shopping':shopping,'bill':bill,'interests':interests,'came_from':came_from},
    dataType:"json",
    success: function(data) {
      // console.log(data);
      if(data.status == 'error') {
        // alert(data.message);
        // $('#dr_msg').text(data.message);
      }
      else if(data.status == 'success') {
        alert('Successfully updated.');
        window.location='<?php echo base_url(uri_string()); ?>';
        // $('#dr_msg').text(data.message);
      }
    }
  });
  return false;
}
  </script>
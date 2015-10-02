
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
    <form class="form-horizontal" role="form" id="profile_full">
    <div class="form-group">
    <label for="maritalstatus" class="col-sm-2 control-label">Marital Status</label><div class="col-sm-9">
    <select class="form-control" id="marstatus" name="marstatus">
    <option value="" selected="">-- Select Marital Status --</option>
    <option value="Single">Single</option>
    <option value="Married">Married</option>
    </select></div></div>
    <div class="form-group">
    <label for="address1" class="col-sm-2 control-label">Occupation</label><div class="col-sm-9">
    <select class="form-control" id="occupation" name="occupation">
    <option value="" selected="">-- Please select state --</option>
    <option value="2">Accounting/Finance</option>
    <option value="3">Administrative</option>
    <option value="4">Advertising</option>
    <option value="5">Architecture</option>
    <option value="6">Artist/Actor/Creative/Performer</option>
    <option value="7">Aviation/Airlines</option>
    <option value="8">Banking/Financial</option>
    <option value="9">Bio-Pharmaceutical</option>
    <option value="10">Bookkeeper</option>
    <option value="11">Builder</option>
    <option value="12">Business</option>
    <option value="13">Celebrity</option>
    <option value="14">Chef</option>
    <option value="15">Clerical</option>
    <option value="16">Computer Related (hardware)</option>
    <option value="18">Computer Related (IT)</option>
    <option value="17">Computer Related (software)</option>
    <option value="19">Consulting</option>
    <option value="20">Craftsman/Construction</option>
    <option value="21">Customer Support</option>
    <option value="22">Designer</option>
    <option value="23">Doctor</option>
    <option value="24">Educator/Academic</option>
    <option value="25">Engineering/Architecture</option>
    <option value="26">Entertainment</option>
    <option value="27">Environmental</option>
    <option value="28">Executive/Senior Management</option>
    <option value="29">Farmer</option>
    <option value="30">Finance</option>
    <option value="31">Flight Attendant</option>
    <option value="32">Food Services</option>
    <option value="33">Government</option>
    <option value="34">Homemaker</option>
    <option value="35">Household</option>
    <option value="36">Human Resources</option>
    <option value="37">Industrial</option>
    <option value="38">Insurance</option>
    <option value="39">Lawyer</option>
    <option value="40">Legal Professions</option>
    <option value="42">Management</option>
    <option value="43">Manufacturing/Operations</option>
    <option value="44">Marine</option>
    <option value="45">Marketing</option>
    <option value="46">Media</option>
    <option value="41">Medical/Healthcare</option>
    <option value="47">Medical/Healthcare</option>
    <option value="48">Military</option>
    <option value="49">Musician</option>
    <option value="50">Nurse</option>
    <option value="76">Other</option>
    <option value="51">Political</option>
    <option value="52">Professor</option>
    <option value="53">Public Relations</option>
    <option value="54">Public Sector</option>
    <option value="55">Publishing</option>
    <option value="56">Real Estate</option>
    <option value="57">Recreation</option>
    <option value="58">Research/Scientist</option>
    <option value="59">Retail</option>
    <option value="60">Retired</option>
    <option value="61">Sales</option>
    <option value="62">Secretary</option>
    <option value="63">Self Employed</option>
    <option value="64">Service Industry</option>
    <option value="65">Social Science</option>
    <option value="66">Social Services</option>
    <option value="67">Sports</option>
    <option value="68">Student</option>
    <option value="71">Teaching</option>
    <option value="69">Technical</option>
    <option value="70">Technician</option>
    <option value="72">Telecommunications</option>
    <option value="73">Transportation/Logistics</option>
    <option value="74">Travel/Hospitality/Tourism</option>
    <option value="75">Unemployed</option>
    </select></div>
    </div>
    <div class="form-group">
    <label for="username" class="col-sm-2 control-label">Annual Income</label>
    <div class="col-sm-9">
    <select class="form-control" id="income" name="income">
    <option value="" selected="">-- Select one --</option>
    <option value="0" selected="selected">None</option>
    <option value="1">Upto 2,00,000</option>
    <option value="2">2 - 5 Lakh</option>
    <option value="3">5 - 10 Lakh</option>
    <option value="4">10 - 20 Lakh</option>
    <option value="5">More than 20 Lakh</option>
    </select></div>
    </div>
    <div class="form-group">
    <label for="city" class="col-sm-2 control-label">Anniversary</label>
    <div class="col-sm-9">
    <input type="text" placeholder="Choose your anniversary date" id="anniversary" class="form-control" name="anniversary"></div>
    </div>
    <div class="form-group">
    <label for="select-retailer" class="col-sm-2 control-label">What do you own?</label>
    <div class="col-sm-9" style="margin-left:14px;">
    <div class="checkbox">
    <input type="checkbox" id="car" name="car" value="car">&nbsp;Car</div>
    <div class="checkbox">
    <input type="checkbox" id="bike" name="bike" value="bike">&nbsp;Bike</div><div class="checkbox">
    <input type="checkbox" id="television" name="television" value="television">&nbsp;Television</div>
    <div class="checkbox"><input type="checkbox" id="refrigerator" name="refrigerator" value="refrigerator">&nbsp;Refrigerator</div>
    <div class="checkbox"><input type="checkbox" id="ac" name="ac" value="ac">&nbsp;Ac</div>
    <div class="checkbox"><input type="checkbox" id="mobile" name="mobile" value="mobile">&nbsp;Mobile</div>
    <div class="checkbox">
    <input type="checkbox" id="washingmachine" name="washingmachine" value="washingmachine">&nbsp;Washingmachine</div>
    <div class="checkbox"><input type="checkbox" id="house" name="house" value="house">&nbsp;House</div><div class="checkbox">
    <input type="checkbox" id="pc" name="pc" value="pc">&nbsp;Pc</div>
    <div class="checkbox"><input type="checkbox" id="tablet" name="tablet" value="tablet">&nbsp;Tablet</div></div></div>
    <div class="form-group"><label for="pincode" class="col-sm-2 control-label">I shop online</label>

    <div class="col-sm-9">
    <div class="radio"><input type="radio" id="week" name="shopping" value="week">&nbsp;Week</div><div class="radio"><input type="radio" id="fornight" name="shopping" value="fornight">&nbsp;Fornight</div><div class="radio"><input type="radio" id="monthly" name="shopping" value="monthly">&nbsp;Monthly</div><div class="radio"><input type="radio" id="quarterly" name="shopping" value="quarterly">&nbsp;Quarterly</div></div></div><div class="form-group"><label for="mobile" class="col-sm-2 control-label">Average Online Bill</label><div class="col-sm-9"><div class="radio"><input type="radio" id="U500" name="bill" value="U500">&nbsp;Upto 500</div><div class="radio"><input type="radio" id="U1000" name="bill" value="U1000">&nbsp;Upto 1000</div><div class="radio"><input type="radio" id="U2000" name="bill" value="U2000">&nbsp;Upto 2000</div><div class="radio"><input type="radio" id="A2000" name="bill" value="A2000">&nbsp;Above 2000</div></div></div>

    <div class="form-group"><label for="mobile" class="col-sm-2 control-label">Your Interests</label>
    <div class="col-sm-9" style="margin-left:14px;">
    <div class="checkbox"><input type="checkbox" id="travel" name="travel" value="travel">&nbsp;Travel</div><div class="checkbox"><input type="checkbox" id="megastores" name="megastores" value="megastores">&nbsp;Megastores</div><div class="checkbox"><input type="checkbox" id="mens" name="mens" value="mens">&nbsp;Mens</div><div class="checkbox"><input type="checkbox" id="kids" name="kids" value="kids">&nbsp;Kids</div><div class="checkbox"><input type="checkbox" id="books" name="books" value="books">&nbsp;Books</div><div class="checkbox"><input type="checkbox" id="electronics" name="electronics" value="electronics">&nbsp;Electronics</div><div class="checkbox"><input type="checkbox" id="women" name="women" value="women">&nbsp;Women</div><div class="checkbox"><input type="checkbox" id="homeliving" name="homeliving" value="homeliving">&nbsp;Homeliving</div><div class="checkbox"><input type="checkbox" id="more" name="more" value="more">&nbsp;More</div></div></div>

    <div class="form-group">
    <label for="mobile" class="col-sm-2 control-label">
    How did you hear about-us?</label>
    <div class="col-sm-9" style="margin-left:14px;"><div class="checkbox"><input type="checkbox" id="google" name="google" value="google">&nbsp;Google</div><div class="checkbox"><input type="checkbox" id="ad" name="ad" value="ad">&nbsp;Advertisment</div><div class="checkbox"><input type="checkbox" id="newspaper" name="newspaper" value="newspaper">&nbsp;News Paper</div><div class="checkbox"><input type="checkbox" id="radio" name="radio" value="radio">&nbsp;Radio</div><div class="checkbox"><input type="checkbox" id="facebook" name="facebook" value="facebook">&nbsp;Facebook</div><div class="checkbox"><input type="checkbox" id="friends" name="friends" value="friends">&nbsp;Friends / Family</div></div></div>

    <div class="form-group"><div class="col-sm-offset-2 col-sm-3"><button type="submit" class="btn btn-success btn-feat tab-move1">Save Details</button></div></div><input type="hidden" class="form-control" id="calling" name="calling" value="profile_last"></form>
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
  </script>
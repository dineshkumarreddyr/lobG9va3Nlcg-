    <div class="slideshow">
    <div id="slideshow" class="carousel slide carousel-fade" data-ride="carousel" 
    data-interval="3000">
    <div class="carousel-inner">
    <div class="item active">
    <img class="img-responsive" src="<?php echo base_url();?>assets/images/personal.jpg" alt="First Slide">
    <div class="container">
    <div class="carousel-caption">
    <h1>Get personal recommendation</h1>
    <h3>Our Designers are ready to serve you the best way</h3>
    </div>
    </div>
    </div><!-- /. Item Active -->
    </div><!-- /. Carousel-Inner -->
    </div><!-- /# Slideshow .Carousel -->
    </div><!-- /. Slideshow -->
    </div><!-- /. Container -->
    </div><!-- /# Mastehead -->  
  <!--slider ends-->

    <!--blog edit starts-->
    <div class="container personal-wrap">
      <div class="row">
        <div class="personal-main">
        <div class="col-md-8">
        <form class="row" action="" method="post" enctype="multipart/form-data">
        <div class="clearfix form-group">
          <div class="col-md-12">
          <label for="title">Name <span>let us know your name</span></label>
          <input type="text" name="name" id="name" class="form-controll" required="required"/>
          </div>
        </div>   
        <div class="clearfix form-group">
          <div class="col-md-6">
          <label for="title">Gender <span>Occasion for which you want to be styled</span></label>
          <select class="minimal" name="gender" id="gender" required="required">
            <option value="male">Male</option>
            <option value="male">Female</option>
          </select>
          </div>
          <div class="col-md-6">
            <label for="title">Occasion <span>Occasion for which you want to be styled</span></label>
            <select class="minimal" name="occasion" id="occasion" required="required">
              <option value="">---Occation-</option>
              <?php foreach ($lcategories as $key => $lcategory) { ?>
              <option value="<?php echo $lcategory->lc_id; ?>"><?php echo ucfirst(strtolower($lcategory->lc_name)); ?></option>
              <?php } ?>
            </select>
          <!-- <input type="text" name="occasion" id="occasion" class="form-controll" required="required"/> -->
          </div>
        </div>     
         <div class="clearfix form-group">
          <div class="col-md-6">
          <label for="title">Body Type <span>Your body type</span></label>
          <input type="text" class="minimal" data-toggle="modal" data-target="#changepic" name="bodytype" id="bodytype" required="required">
          <!-- <select class="minimal" name="bodytype" id="bodytype" required="required">
            <option value="Straight">Straight</option>
            <option value="Pear">Pear</option>
            <option value="Spoon">Spoon</option>
            <option value="Hourglass">Hourglass</option>
            <option value="Top Hourglass">Top Hourglass</option>
            <option value="Inverted Triangle">Inverted Triangle</option>
            <option value="Oval">Oval</option>
            <option value="Diamond">Diamond</option>
          </select> -->
          </div>
          <div class="col-md-6">
            <label for="title">Body Tone <span>Color of your skin</span></label>
            <input type="text" class="minimal" data-toggle="modal" data-target="#tonepick" name="bodytone" id="bodytone" required="required">
            <!-- <select class="minimal" name="bodytone" id="bodytone" required="required">
            <option value="Pale">Pale</option>
            <option value="White">White</option>
            <option value="Tanned">Tanned</option>
            <option value="Brown">Brown</option>
            <option value="Dark Brown">Dark Brown</option>
            <option value="Black">Black</option>
          </select> -->
          </div>
        </div>
        <div class="clearfix form-group">
          <div class="col-md-12">
            <label for="title">Select Designer<span>To style you</span></label>
            <div id="myDropdown"></div>
            <input type="hidden" name="designer" id="designer" value="" class="form-controll" required="required">
          </div>
        </div>
        <div class="clearfix form-group">
          <div class="col-md-6">
            <label for="title">Budget <span>Your Budget</span></label>
            <input type="text" name="budget" id="budget" class="form-controll" required="required"/>
          </div>
          <div class="col-md-6">
            <label for="title">Height <span>Your Height</span></label>
            <select class="minimal" name="height" id="height" required="required">
            <option value="4Feet - 4Feet 5Inch">4feet - 4Feet 5Inch</option>
            <option value="4Feet 5inch - 5Feet">4Feet 5inch - 5Feet</option>
            <option value="5Feet - 5Feet 5Inch">5Feet - 5Feet 5Inch</option>
            <option value="5Feet 5Inch - 6Feet">5Feet 5Inch - 6Feet</option>
          </select>
          </div>
        </div>
        <div class="clearfix form-group">
          <div class="col-md-12">
          <label for="caption">Specifications <span>Give details of what you are looking for</span></label>
          <textarea name="specifications" id="specifications" class="form-controll"></textarea>
        </div>
        </div>
         <div class="clearfix form-group file-area">
         <div class="col-md-12">
              <label for="images">Personal Image <span>Your image helps us serve you better with looks</span></label>
          <input type="file" name="fileToUpload" id="fileToUpload" required="required"/>
          <div class="file-dummy">
            <div class="success">Great, your files are selected. Keep on.</div>
            <div class="default">Please select a file</div>
          </div>
          </div>
        </div>
        <div class="clearfix form-group">
          <div class="col-md-12"> <input type="submit" class="savearticle" name="submit_request" id="submit_request" value="Submit Request"></div>
        </div>
      </form>
      </div>
      <div class="col-md-4 personal-right">
        <div class="clearfix personal-image">
         <img src="<?php echo base_url();?>assets/images/picture.jpg" class="img-responsive" id="preview_pic">
        </div>
        <!-- <div class="removePersonal"><a href="#">Remove Image</a></div> -->
      </div>
      </div>
      </div>
    </div>
    <!--blog edit ends-->

  <!--body shape pop-->
  <div class="modal fade" id="changepic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Choose Your Body Type</h4>
      </div>
      <div class="modal-body">
        <div class="clearfix personal-wrap">
          <div class="row">
          <div class="col-md-12">
          <ul class="clearfix">
            <li class="col-md-2">
               <div class="clearfix"><img src="<?php echo base_url(); ?>assets/images/male1.png" class="img-responsive"></div>
               <label class="control-label" for="Hourglass">Hourglass</label><br/>
               <input id="one" type="radio" value="Hourglass" name="bodytype_pop" class="bodytype_pop">
            </li>
            <li class="col-md-2">
               <div class="clearfix"><img src="<?php echo base_url(); ?>assets/images/male2.png" class="img-responsive"></div>
               <label class="control-label" for="Triangle">Triangle</label><br/>
               <input id="two" type="radio" value="Triangle" name="bodytype_pop" class="bodytype_pop">
            </li>
            <li class="col-md-2">
               <div class="clearfix"><img src="<?php echo base_url(); ?>assets/images/female1.png" class="img-responsive"></div>
               <label class="control-label" for="Apple">Apple</label><br/>
               <input id="three" type="radio" value="Apple" name="bodytype_pop" class="bodytype_pop">
            </li>
            <li class="col-md-2">
               <div class="clearfix"><img src="<?php echo base_url(); ?>assets/images/male2.png" class="img-responsive"></div>
               <label class="control-label" for="Square">Square</label><br/>
               <input id="four" type="radio" value="Square" name="bodytype_pop" class="bodytype_pop">
            </li>
            <li class="col-md-2">
               <div class="clearfix"><img src="<?php echo base_url(); ?>assets/images/male2.png" class="img-responsive"></div>
               <label class="control-label" for="Pear">Pear</label><br/>
               <input id="four" type="radio" value="Pear" name="bodytype_pop" class="bodytype_pop">
            </li>
          </ul>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!--body shape pop-->

  <!--body tone pop-->
  <div class="modal fade" id="tonepick" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Choose Your Skin Tone</h4>
      </div>
      <div class="modal-body">
        <div class="clearfix personal-wrap">
          <div class="row">
          <div class="col-md-12">
          <ul class="clearfix">
            <li class="col-md-2">
               <div class="clearfix"><img src="<?php echo base_url(); ?>assets/images/male1.png" class="img-responsive"></div>
               <label class="control-label" for="Light">Light</label><br/>
               <input id="one" type="radio" value="Light" name="bodytone_pop" class="bodytone_pop">
            </li>
            <li class="col-md-2">
               <div class="clearfix"><img src="<?php echo base_url(); ?>assets/images/male2.png" class="img-responsive"></div>
               <label class="control-label" for="Medium">Medium</label><br/>
               <input id="two" type="radio" value="Medium" name="bodytone_pop" class="bodytone_pop">
            </li>
            <li class="col-md-2">
               <div class="clearfix"><img src="<?php echo base_url(); ?>assets/images/female1.png" class="img-responsive"></div>
               <label class="control-label" for="Tan">Tan</label><br/>
               <input id="three" type="radio" value="Tan" name="bodytone_pop" class="bodytone_pop">
            </li>
            <li class="col-md-2">
               <div class="clearfix"><img src="<?php echo base_url(); ?>assets/images/male2.png" class="img-responsive"></div>
               <label class="control-label" for="Dark">Dark</label><br/>
               <input id="four" type="radio" value="Dark" name="bodytone_pop" class="bodytone_pop">
            </li>
            <li class="col-md-2">
               <div class="clearfix"><img src="<?php echo base_url(); ?>assets/images/male2.png" class="img-responsive"></div>
               <label class="control-label" for="Deep">Deep</label><br/>
               <input id="four" type="radio" value="Deep" name="bodytone_pop" class="bodytone_pop">
            </li>
          </ul>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!--body tone pop-->
<script type="text/javascript">
  $('#fileToUpload').change( function(event) {
    var tmppath = URL.createObjectURL(event.target.files[0]);
    $("#preview_pic").attr('src',tmppath);       
  });

  $('.bodytype_pop').click(function(){
    $('#bodytype').val($('.bodytype_pop').val());
  });

  $('.bodytone_pop').click(function(){
    $('#bodytone').val($('.bodytone_pop').val());
  });
</script>

    <script type="text/javascript" src="https://dl.dropboxusercontent.com/u/40036711/Scripts/jquery.ddslick.min.js"></script>
    <script>
    $(document).ready(function() {     
      var ddData = <?php echo $followings; ?>;

      $('#myDropdown').ddslick({
        data: ddData,
        width: 300,
        selectText: "Select your preferred Designer",
        imagePosition: "right",
        onSelected: function(selectedData) {
          //callback function: do something with selectedData;
          // console.log(selectedData.selectedData.value);
          $('#designer').val(selectedData.selectedData.value);
        }
      });
    });
    </script>

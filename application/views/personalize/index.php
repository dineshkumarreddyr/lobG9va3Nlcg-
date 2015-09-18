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
          <input type="text" name="occasion" id="occasion" class="form-controll" required="required"/>
          </div>
        </div>     
         <div class="clearfix form-group">
          <div class="col-md-6">
          <label for="title">Body Type <span>Your body type</span></label>
          <select class="minimal" name="bodytype" id="bodytype" required="required">
            <option value="Straight">Straight</option>
            <option value="Pear">Pear</option>
            <option value="Spoon">Spoon</option>
            <option value="Hourglass">Hourglass</option>
            <option value="Top Hourglass">Top Hourglass</option>
            <option value="Inverted Triangle">Inverted Triangle</option>
            <option value="Oval">Oval</option>
            <option value="Diamond">Diamond</option>
          </select>
          </div>
          <div class="col-md-6">
            <label for="title">Body Tone <span>Color of your skin</span></label>
            <select class="minimal" name="bodytone" id="bodytone" required="required">
            <option value="Pale">Pale</option>
            <option value="White">White</option>
            <option value="Tanned">Tanned</option>
            <option value="Brown">Brown</option>
            <option value="Dark Brown">Dark Brown</option>
            <option value="Black">Black</option>
          </select>
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
         <img src="<?php echo base_url();?>assets/images/d4.jpg" class="img-responsive" id="preview_pic">
        </div>
        <!-- <div class="removePersonal"><a href="#">Remove Image</a></div> -->
      </div>
      </div>
      </div>
    </div>
    <!--blog edit ends-->
<script type="text/javascript">
  $('#fileToUpload').change( function(event) {
    var tmppath = URL.createObjectURL(event.target.files[0]);
    $("#preview_pic").attr('src',tmppath);       
});

</script>
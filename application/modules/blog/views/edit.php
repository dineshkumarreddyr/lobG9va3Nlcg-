<!--blog add starts-->
<div class="container blog-edit-wrap">
  <div class="row">
    <h2 class="heads">Create new Article</h2>
    <div class="blog-edit-main">
    <?php
    if($msg != '') {
    ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $msg; ?>
    </div>
    <?php
    }
    ?>
    <?php
    if($err_msg != '') {
    ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $err_msg; ?>
    </div>
    <?php
    }
    ?>
    <form role="form" action="" method="POST">        
    <div class="form-group">
      <label for="title">Title <span>Use title case to get a better result</span></label>
      <input type="text" name="title" id="title" class="form-controll" value="<?php echo stripslashes($post->title); ?>">
    </div>        
    <div class="form-group">
      <label for="caption">Content <span>The content of the article</span></label>
      <textarea name="content" id="content" class="form-controll"><?php echo stripslashes($post->content); ?></textarea>
    </div>
     <!-- <div class="form-group file-area">
          <label for="images">Article Image <span>Your image should be at least 1024x768 wide</span></label>
      <input type="file" name="images" id="images" required="required" multiple="multiple">
      <div class="file-dummy">
        <div class="success">Great, your files are selected. Keep on.</div>
        <div class="default">Please select some files</div>
      </div>
    </div> -->
    <div class="form-group">
      <label for="caption">Courtesy <span>The source destination of the content/images selected</span></label>
      <input type="text" name="courtesy" id="courtesy" class="form-controll" value="<?php echo stripslashes($post->courtesy); ?>">
    </div>

    <div class="form-group">
      <!--<input type="button" class="buttons" value="Upload image">-->
      <input type="submit" name="submit" id="submit" class="savearticle" value="Update Article">
    </div>
  </form>
  </div>
  </div>
</div>
<!--blog add ends-->
<script type="text/javascript" src="<?php echo base_url();?>assets/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>

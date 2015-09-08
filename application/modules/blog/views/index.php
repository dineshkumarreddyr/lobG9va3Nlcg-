<div class="container blog-main">
    <h2 class="heads">Blog</h2>
    <div class="row">
      <?php foreach ($posts as $key => $post): ?>
       <div class="col-md-4 blog-tile">
         <div class="blog-main-wrap">
           <div class="blog-writer-wrap">
            <div class="blog-writer-img"><img src="<?php echo base_url();?>assets/images/d4.jpg" class="img-responsive"></div> 
            <div class="writer-details"><h3><a href="#">by <?php echo $post->postedBy; ?></a></h3>
            <span><?php echo date('d M Y', strtotime($post->postedOn)); ?></span></div>         
           </div>
           <div class="blog-img"><a href="<?php echo base_url('blog/'.$post->id.'/'.url_title($post->title)); ?>"><img src="<?php echo base_url();?>assets/images/designer.jpg" class="img-responsive"></a></div>
           <h2><a href="<?php echo base_url('blog/'.$post->id.'/'.url_title($post->title)); ?>"><?php echo $post->title; ?></a></h2>
           <div class="blog-main-content">
            <?php echo substr($post->content, 0, 220); ?>...
           </div>
           <div class="blog-bottom">
            <div class="blog-more text-left"><a href="<?php echo base_url('blog/'.$post->id.'/'.url_title($post->title)); ?>">Readmore</a></div>
            <div class="blog-counts">
              <div class="col-md-4"><i class="flaticon-eye106"></i> 78</div>
              <div class="col-md-4"><i class="flaticon-speech-bubble25"></i> 15</div>
              <div class="col-md-4"><i class="flaticon-social24"></i> 23</div>
            </div>
            </div>
         </div>
       </div>
     <?php endforeach; ?>

    </div>
    </div>
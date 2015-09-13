<div class="container blog-main">
    <h2 class="heads">Blog</h2>
    <?php if($this->session->userdata('uid') && $this->session->userdata('role') == 2): ?>
    <div class="clearfix text-center addarticle"><a href="<?php echo base_url('blog/add'); ?>"><i class="flaticon-plus79"></i> Add New Article</a></div>
  <?php endif; ?>
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
              <div class="col-md-4"><i class="flaticon-eye106"></i> <?php echo ($post->total_views) ? $post->total_views : 0; ?></div>
              <div class="col-md-4"><i class="flaticon-speech-bubble25"></i> 15</div>
              <div class="col-md-4"><i class="flaticon-social24"></i> 23</div>
            </div>
            </div>
         </div>
       </div>
     <?php endforeach; ?>

    </div>
    </div>
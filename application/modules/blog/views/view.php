<!--blog starts-->
<div class="fullblog-image"><img src="<?php echo base_url();?>assets/images/designer.jpg" class="img-responsive"></div>
<div class="container fullblog-main">
<?php if($this->session->userdata('uid') == $post->post_by): ?> 
<span class="row pull-right">
  <a href="<?php echo base_url('blog/edit/'.$post->id); ?>">Edit</a>
</span>
<?php endif; ?>
  <h3><?php echo ucfirst(stripslashes($post->title)); ?></h3>
  <h4>Posted on : <?php echo date('d M Y', strtotime($post->postedOn)); ?> by <a href="<?php echo base_url('designer/'.$post->uid.'/'.url_title($post->postedBy)); ?>"><?php echo $post->postedBy; ?></a></h4>
  <?php echo stripslashes($post->content); ?>

  <div id="disqus_thread"></div>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'lookser';
    
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>


</div>
<!--blog ends-->
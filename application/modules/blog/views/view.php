<!--blog starts-->
<div class="fullblog-image"><img src="<?php echo base_url();?>assets/images/designer.jpg" class="img-responsive"></div>
<div class="container fullblog-main">
  <h3><?php echo $post->title; ?></h3>
  <h4>Posted on : <?php echo date('d M Y', strtotime($post->postedOn)); ?> by <?php echo $post->postedBy; ?></h4>
  <?php echo $post->content; ?>

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
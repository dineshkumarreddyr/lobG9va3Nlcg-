    <div class="slideshow">
    <div id="slideshow" class="carousel slide carousel-fade" data-ride="carousel" 
    data-interval="3000">
    <div class="carousel-inner">
    <div class="item active">
    <img class="img-responsive" src="images/coupons.jpg" alt="First Slide">
    <div class="container">
    <div class="carousel-caption">
    <h1>offers and Deals</h1>
    <h3>The best possible ways to save while you shop</h3>
    </div>
    </div>
    </div><!-- /. Item Active -->
    </div><!-- /. Carousel-Inner -->
    </div><!-- /# Slideshow .Carousel -->
    </div><!-- /. Slideshow -->
    </div><!-- /. Container -->
    </div><!-- /# Mastehead -->  
  <!--slider ends-->
    
  <!--favourites starts-->
  <div class="container" id="favourites">
  <h2 class="heads">Your Favourites</h2>
  <div class="container creators-wrap">
    <div class="col-md-12" id="created-categ">
      <ul>
      <li><a href="#page1">Favourite Looks</a></li>
      <li><a href="#page2">Favourite Products</a></li>    
      </ul>
    </div>
    
    <!--by designers-->
    <div id="page1" class="content">
    <?php
      foreach ($flooks as $key => $pbd_look) {
      ?>
      <div class="col-md-3 created-each">
        <a href="<?php echo base_url('looks/view/'.$pbd_look['l_id'].'/'.url_title($pbd_look['l_title'])); ?>">
        <?php if(count($pbd_look['l_products']) == 5): ?>
        <div class="pattern<?php echo count($pbd_look['l_products']); ?>">
          <div class="pattern5-left">
        <ul>
          <?php $i=1; foreach ($pbd_look['l_products'] as $key => $lp): ?>
        <li><img data-original="<?php echo $lp->p_image;?>" class="img-responsive lazy"></li>
        <?php if($i==3):  ?>
          </ul>
          </div>

          <div class="pattern5-right">
          <ul>
        <?php endif; $i++ ?>
        <?php endforeach; ?>
        </ul>
          </div>
      </div>
        <?php else: ?>
        <div class="pattern<?php echo count($pbd_look['l_products']); ?>">
        <ul>
          <?php foreach ($pbd_look['l_products'] as $key => $lp): ?>
        <li><img data-original="<?php echo $lp->p_image;?>" class="img-responsive lazy"></li>
        <?php endforeach; ?>
        </ul>
      </div>
        <?php endif; ?>
      </a>
      <div class="created-by">
          <a href="<?php echo base_url('designer/'.$pbd_look['l_uid'].'/'.url_title($pbd_look['l_user'])); ?>">
      <div class="created-image"><img data-original="<?php echo base_url();?>uploads/designers/<?php echo ($pbd_look['l_user_image'] == '') ? 'default.jpg' : $pbd_look['l_user_image']; ?>" class="img-responsive lazy"></div>
          </a>
          <a href="<?php echo base_url('looks/view/'.$pbd_look['l_id'].'/'.url_title($pbd_look['l_title'])); ?>">
      <h3><?php echo $pbd_look['l_title']; ?></h3>
      </a>
      <div class="col-md-12 clearfix text-center">
      <?php if($pbd_look['l_mrp'] != '' && $pbd_look['l_mrp'] > 0): ?>
      <span class="mrp"><span class="webrupee">Rs.</span><?php echo $pbd_look['l_mrp']; ?></span>
      <?php endif; ?>
      <span class="aftrdsnt"><span class="webrupee">Rs.</span><?php echo $pbd_look['l_price']; ?></span></div>
          <a href="<?php echo base_url('designer/'.$pbd_look['l_uid'].'/'.url_title($pbd_look['l_user'])); ?>">
      <h4>By <?php echo $pbd_look['l_user']; ?></h4>
      </a>
      </div>
      <div class="rating"><img src="<?php echo base_url();?>assets/images/rating.png"></div>
    </div>
    <?php
    }
    ?>  
   
  </div>
  <!-- by designers-->
  
   <!--by users-->
    <div  id="page2" class="content">
      <?php
      foreach ($fproducts as $key => $fproduct) {
      ?>
      <a href="<?php echo base_url('product/'.$fproduct->p_id.'/'.url_title($fproduct->p_name));?>">
      <div class="col-md-3 col-xs-6 trend-each">
          <div class="listimg">
        <img data-original="<?php echo $fproduct->p_image; ?>" title="<?php echo $fproduct->p_name; ?>" alt="<?php echo $fproduct->p_name; ?>" class="lazy">
      </div>
      <h4><?php echo $fproduct->p_name; ?></h4>
      <div class="col-md-12 text-center">
      <?php if($fproduct->p_mrp > $fproduct->p_price): ?>
      <span class="mrp"><span class="webrupee">Rs.</span><?php echo $fproduct->p_mrp; ?></span>
      <?php endif; ?>
      <span class="aftrdsnt"><span class="webrupee">Rs.</span><?php echo $fproduct->p_price; ?></span></div>
      </div>
      </a>
      <?php
      }
      ?>

  </div>
  <!--by users-->
  </div>
  </div>
  <!--favourites ends-->
 
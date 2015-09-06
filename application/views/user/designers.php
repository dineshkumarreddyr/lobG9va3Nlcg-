		</div><!-- /. Container -->
		</div><!-- /# Mastehead -->  
	<!--slider ends-->
		
	 <!--designers starts-->
 <section class="container designers-main">
 <h2>The Stylists</h2>
    <div class="row active-with-click">
        <?php foreach ($designers as $key => $designer): ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <article class="material-card Pink">
                <h2><a href="<?php echo base_url('designer/'.$designer->user_id.'/'.url_title($designer->user_fname)); ?>">
                    <span><?php echo $designer->user_fname; ?></span>
                    <i class="fa fa-fw fa-star"></i> <?php echo $designer->l_count; ?> Looks</a>
                </h2>
                <div class="mc-content">
                    <div class="img-container">
                        <a href="<?php echo base_url('designer/'.$designer->user_id.'/'.url_title($designer->user_fname)); ?>"><img class="img-responsive" src="http://alisfashions.com/wp-content/uploads/2015/05/girl-picture-for-facebook-profile-mdp4hbdw.jpg"></a>
                    </div>
                    <div class="mc-description">
                        He has won two Academy Awards, for his roles in the mystery drama Mystic River (2003) and the biopic Milk (2008). Penn began his acting career in television with a brief appearance in a 1974 episode of Little House on the Prairie ...
                    </div>
                </div>
                <a class="mc-btn-action">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="mc-footer">
                    <a href="<?php echo base_url('designer/'.$designer->user_id.'/'.url_title($designer->user_fname)); ?>"> Follow</a>
                </div>
            </article>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="col-md-12 loadmore">Loadmore <img src="<?php echo base_url(); ?>assets/images/loadmore.gif" alt="loadmore">  Designers</div>
</section> 
 <!--designers ends-->
	


	
	 
	 	  
   </div>
   </div>
   </div>
	<!-- trending products -->
	
	<script>
     $(function() {
        $('.material-card > .mc-btn-action').click(function () {
            var card = $(this).parent('.material-card');
            var icon = $(this).children('i');
            icon.addClass('fa-spin-fast');

            if (card.hasClass('mc-active')) {
                card.removeClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-arrow-left')
                        .removeClass('fa-spin-fast')
                        .addClass('fa-bars');

                }, 800);
            } else {
                card.addClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-bars')
                        .removeClass('fa-spin-fast')
                        .addClass('fa-arrow-left');

                }, 800);
            }
        });
    });
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
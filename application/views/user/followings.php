		</div><!-- /. Container -->
		</div><!-- /# Mastehead -->  
	<!--slider ends-->
		
	 <!--designers starts-->
 <section class="container designers-main">
 <h2>My Followings</h2>
    <div class="row active-with-click">
        <?php foreach ($designers as $key => $designer): ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <article class="material-card <?php echo ($designer->user_gender == 'Male') ? 'Indigo' : 'Pink'; ?>">
                <h2><a href="<?php echo base_url('designer/'.$designer->user_id.'/'.url_title($designer->user_fname)); ?>">
                    <span><?php echo $designer->user_fname; ?></span>
                    <i class="fa fa-fw fa-star"></i> <?php echo $designer->l_count; ?> Looks</a>
                </h2>
                <div class="mc-content">
                    <div class="img-container">
                        <a href="<?php echo base_url('designer/'.$designer->user_id.'/'.url_title($designer->user_fname)); ?>"><img class="img-responsive" src="<?php echo base_url(); ?>uploads/designers/<?php echo ($designer->user_image == '') ? 'default.jpg' : $designer->user_image; ?>"></a>
                    </div>
                    <div class="mc-description">
                        <?php echo ($designer->user_about != '') ? substr($designer->user_about, 0, 130).' ...' : 'No data available.'; ?>
                    </div>
                </div>
                <a class="mc-btn-action">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="mc-footer">
                    <a href="<?php echo base_url('designer/'.$designer->user_id.'/'.url_title($designer->user_fname)); ?>"> View Profile</a>
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
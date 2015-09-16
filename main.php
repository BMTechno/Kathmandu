<?php
/**
 * Classified Theme Main Page
 *
 * @package Osclass
 * @subpackage Classified
 */
?>
	<?php osc_current_web_theme_path('head.php'); ?>
	
	<?php if(nc_osc_show_landing_popup()){ osc_current_web_theme_path('landing-popup.php') ;} ?>
	<?php if(nc_osc_show_shout_box()){ osc_current_web_theme_path('shoutbox/index.html') ;} ?>

    <?php osc_current_web_theme_path('header.php'); ?>
   
    <?php if(nc_osc_get_front_map_or_slider()){?>
    <?php osc_current_web_theme_path('google-maps.php') ; ?>
    <?php }else{ ?>
        <?php if(osc_get_preference('e_home_slider', 'classified')){ ?>
        <div style="margin-top:10px;" class="home-slider">
            <?php osc_current_web_theme_path('home-slider.php'); ?>
    	</div>
        <?php } ?>
    <?php } ?>    
    <div class="container-fluid" style="text-align:center;">
        <?php if(nc_osc_front_page_ads_enabled()){ ?>
            <?php echo nc_osc_get_front_page_ads(); ?>
        <?php } ?>
    </div>
    



    <div class="categories">
        <div class="container-fluid">	
            <?php if(nc_osc_premium_ads_display()){?>
                <?php osc_current_web_theme_path('premium-ads.php') ; ?>
            <?php } ?>

        	<?php if(nc_osc_get_recent_before_popular()){ ?>
        		<?php osc_current_web_theme_path('latest-listings.php') ; ?>
        		<?php osc_current_web_theme_path('popular-categories.php') ; ?>
        	<?php }else{ ?>
        		<?php osc_current_web_theme_path('popular-categories.php') ; ?>
        		<?php osc_current_web_theme_path('latest-listings.php') ; ?>
    		<?php } ?>
			

			
		</div>
	</div>				
	<?php osc_current_web_theme_path('footer.php') ; ?>
			
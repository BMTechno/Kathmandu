<?php
/**
 * Classified Theme User Public Profile Page
 *
 * @package Osclass
 * @subpackage Classified
 */

    $address = '';
    if(osc_user_address()!='') {
        if(osc_user_city_area()!='') {
            $address = osc_user_address().", ".osc_user_city_area();
        } else {
            $address = osc_user_address();
        }
    } else {
        $address = osc_user_city_area();
    }
    $location_array = array();
    if(trim(osc_user_city()." ".osc_user_zip())!='') {
        $location_array[] = trim(osc_user_city()." ".osc_user_zip());
    }
    if(osc_user_region()!='') {
        $location_array[] = osc_user_region();
    }
    if(osc_user_country()!='') {
        $location_array[] = osc_user_country();
    }
    $location = implode(", ", $location_array);
    unset($location_array);

    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('head.php'); ?>
        <script type="text/javascript">
            
            $(document).ready(function(){
                $(".opt_publicprofile").addClass('dashboard-active'); 
            });
        </script>     
    </head>
    <body>
        <?php osc_current_web_theme_path('dashboard-header.php'); ?>
        <div class="container-fluid dashboard-page">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="content-section">
                        <div class="row">
                            <div class="col-md-3">
                                <!-- <h4 class="my-account">My Public Profile</h4> -->
                            </div>
                            <div class="com-md-9 text-right">
                                <div class="my-account1">
                                    <?php if( osc_is_web_user_logged_in() ) { ?>
                                    <?php echo sprintf(__('Hi %s', 'classified'), osc_logged_user_name() . '!  '); ?>&nbsp;&nbsp;&nbsp;
                                    <a class="my_account" href="<?php echo osc_user_dashboard_url(); ?>"><?php _e('My account', 'classified'); ?></a>
                                    <?php if(nc_osc_get_post_ads_settings()){
                                            echo "<a class='post_an_ad' href=".osc_item_post_url() .">Post an Ad</a>";
                                        }
                                    ?>
                                    <a class="log_out" href="<?php echo osc_user_logout_url(); ?>"><?php _e('Logout', 'classified'); ?></a>
                                    <?php } ?>
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="account-sidebar">
                                    <img style="height:111px; margin:0 auto;" class="img-responsive img-circle" src="<?php echo nc_osc_get_picture_link();?>" alt="#">
                                    <h5 style="color:#ffffff; text-align:center;"><?php echo osc_logged_user_name();?></h5>
                                    <h6 style="color:#ffffff; text-align:center; padding-bottom:20px; border-bottom:1px solid #404040;">Member Since <?php echo nc_osc_get_logged_user_ref_date();?></h6>
                                    <?php echo osc_private_user_menu(); ?>
                                </div>                   
                            </div>
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                <div class="col col-xs-4" >
                                    <img src="<?php echo nc_osc_get_public_picture_link(osc_user_id());?>" class="img-circle">
                                </div>
        
                                <div class="col col-xs-8">
                                    <h3><?php _e('Full name', 'classified'); ?>: <?php echo osc_user_name(); ?></h3>
                                    <h6><?php _e('Address', 'classified'); ?>: <?php echo $address; ?></h6>
                                    <h6><?php _e('Location', 'classified'); ?>: <?php echo $location; ?></h6>
                                    <h6><?php _e('Website', 'classified'); ?>: <?php echo osc_user_website(); ?></h6>
                                    <h6><?php _e('Cell Phone','classified'); ?>: <?php echo osc_user_phone_mobile();?></h6>
                                    <h6><?php _e('Phone','classified'); ?>: <?php echo osc_user_phone_land(); ?></h6>
                                    
                                    <div id="act-rating"></div>
                                    <?php if(osc_is_web_user_logged_in()){ ?>
                                        <?php osc_current_web_theme_path('seller-ratings.php'); ?>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                            



               
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>

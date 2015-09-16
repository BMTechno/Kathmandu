<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('head.php'); ?>
        <script type="text/javascript">
            
            $(document).ready(function(){
                $(".opt_alerts").addClass('dashboard-active'); 
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
                                <!-- <h4 class="my-account">My Alerts</h4> -->
                            </div>
                            <div class="col-md-9 text-right">
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
                                <?php if(osc_count_alerts() == 0) { ?>
                                    <h3><?php _e('You do not have any alerts yet', 'classified'); ?>.</h3>
                                <?php } else { ?>
                                    <?php while(osc_has_alerts()) { ?>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Subscribed Alerts</th>
                                                    <th>Posted on</th>
                                                    <th>Price</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td rowspan="<?php echo osc_count_items(); ?>">
                                                         <a onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can\'t be undone. Are you sure you want to continue?', 'classified')); ?>');" href="<?php echo osc_user_unsubscribe_alert_url(); ?>"><i class="fa fa-trash-o"></i></a> 
                                                    </td>
                                                </tr>
                                                <?php while(osc_has_items()) { ?>

                                                <tr>
                                                    <td><a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title(); ?></a></td>
                                                    <td><?php echo osc_format_date(osc_item_pub_date()); ?></td>
                                                    <td><?php if( osc_price_enabled_at_items() ) { _e('Price', 'classified'); ?>: <?php echo osc_format_price(osc_item_price()); } ?></td>
                                                    <td></td>
                                                   
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                
                    <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>
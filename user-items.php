<!DOCTYPE html>
<html lang="en">

<head>
    <?php osc_current_web_theme_path('head.php'); ?>

    <script type="text/javascript">
            
    $(document).ready(function(){
        $(".opt_items").addClass('dashboard-active'); 
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
                                <!-- <h4 class="my-account">My account</h4> -->
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
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th><?php echo sprintf(__('Listings from %s', 'classified') ,osc_logged_user_name()); ?></th>
                                            <th>Posted on</th>
                                            <th>Price</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(osc_count_items() == 0) { ?>
                                        <tr>
                                            <h3><?php _e('No listings have been added yet', 'classified'); ?></h3>
                                        </tr>
                                        <?php } else { ?>
                                            <?php while(osc_has_items()) { ?>
                                                <tr class="success">
                                                    <td><a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title(); ?></a></td>
                                                    <td><?php echo osc_format_date(osc_item_pub_date()); ?></td>
                                                    <td><?php echo osc_format_price(osc_item_price()); ?></td>
                                                    <td></td>
                                                    <td>
                                                            <a onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can\'t be undone. Are you sure you want to continue?', 'classified')); ?>');" href="<?php echo osc_item_delete_url(); ?>"><i class="fa fa-trash-o"></i></a>
                                                        </i> | <span><a style="text-decoration:underline;" href="<?php echo osc_item_edit_url(); ?>">Edit</a></span></td>
                                                    <td>
                                                        <?php if(osc_item_is_premium()){ ?>
                                                            <h5>Premium Item</h5>
                                                            <?php }else{ ?>
                                                            <?php if(nc_osc_premium_fee_enabled()){ ?>
                                                                <h5><a style="text-decoration:underline;" href="<?php echo osc_route_url('payment-publish', array('itemId' => osc_item_id())); ?>">Mark Premium</a></h5>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>   
                                               <div class="paginate" >
                                                    <?php for($i = 0; $i < osc_list_total_pages(); $i++) {
                                                        if($i == osc_list_page()) {
                                                            printf('<a class="searchPaginationSelected" href="%s">%d  |  </a>', osc_user_list_items_url($i+1), ($i + 1));
                                                        } else {
                                                            printf('<a class="searchPaginationNonSelected" href="%s">%d  |  </a>', osc_user_list_items_url($i+1), ($i + 1));
                                                        }
                                                    } ?>
                                                </div>
                                            <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                                
                    </div>
                </div>    
            </div>
        </div>
        <?php osc_current_web_theme_path('footer.php') ; ?>    

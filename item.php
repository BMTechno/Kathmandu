
<?php $resource_url="";?>
    <?php if( osc_images_enabled_at_items() ) { ?>
        <?php if( osc_count_item_resources() > 0 ) { ?>
            <?php $GLOBALS['resource_url']=osc_resource_url();?>
       <?php } ?>
     <?php } ?>   
<!DOCTYPE html>
<html lang="en">

<head>
    <?php osc_current_web_theme_path('head.php'); ?>
</head>
<body>


        <?php/*
            osc_enqueue_style('style', osc_current_web_theme_url('style.css'));
            osc_enqueue_style('tabs', osc_current_web_theme_url('tabs.css'));
            osc_enqueue_style('jquery-ui-datepicker', osc_assets_url('css/jquery-ui/jquery-ui.css'));

            osc_register_script('jquery', osc_current_web_theme_js_url('jquery.js'));
            osc_enqueue_script('jquery');
            osc_enqueue_script('jquery-ui');
            osc_register_script('bootstrap-js', osc_base_url() . 'oc-content/themes/classified/bootstrap/bootstrap.min.js','jquery');
            osc_enqueue_script('bootstrap-js');
            osc_enqueue_script('tabber');
            osc_enqueue_script('bootstrap-dialog');
            osc_run_hook('header');
            */
        ?>
        <?php osc_current_web_theme_path('header.php'); ?>
        

        
        <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModal">
            <?php osc_current_web_theme_path('contact.php') ;  ?>      
        </div>
        <div class="modal fade" id="seller-profile" role="dialog" aria-labelledby="seller-profile">
            <?php osc_current_web_theme_path('seller-profile.php'); ?>
        </div>
        <div class="container"> 
            <?php $breadcrumb = osc_breadcrumb('&raquo;', false);?>
            <?php if( $breadcrumb != '') { ?>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div id="breadcrumb">
                                    <?php echo $breadcrumb; ?>
                                    <div class="clear"></div>
                        </div>      
                    </div>
            <?php } ?>
             <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <h4 style="margin-top:40px;" class="cat-title"><?php echo osc_item_title(); ?></h4>      
             </div>
             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
             <?php if(osc_is_web_user_logged_in()){ ?>
                    <form name="add-to-watchlist" method="post" action="<?php echo osc_route_url('nc-functions');?>">
                        <input type="hidden" name="nc_action" value="ADD-WATCHLIST"/>
                        <input type="hidden" name="item_id" value="<?php echo osc_item_id(); ?>" />
                        <input type="hidden" name="return_url" id="return_url" value="<?php echo osc_item_url();?>">
                        <?php if(!nc_osc_check_watchlist()){ ?>
                         <h4 style="margin-top:40px;">
                            <a href="#" onclick="$(this).closest('form').submit()"><span class="glyphicon glyphicon-star" ></span>Add to Watchlist</Button>
                        </h4>
                        <?php } ?>
                    </form>
                <?php } ?>
            </div>
            <div class="row item-page">
                  <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                    <div class="row">
                        <?php if( osc_images_enabled_at_items() ) { ?>
                            <?php if( osc_count_item_resources() > 0 ) { ?>
                                <?php include_once('image-slider.php'); ?>
                            <?php } ?>
                        <?php } ?>        
                           <h4 class="cat-title">DESCRIPTION</h4>
                        <p class="add-para"><?php echo osc_item_description(); ?></p>
                    </div>
                    <div class="row" style="text-align:center;padding-top:30px;">
                        <?php osc_current_web_theme_path('social-share.php'); ?>
                    </div>
                  </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <div class="new-class">
                            <?php if(nc_osc_item_page_top_ads_enabled()){ ?>
                                <div class="row" style="text-align:center">
                                    <?php echo nc_osc_get_item_page_top_ads();?>
                                </div>
                            <?php } ?>
                            <!--
                            <ul style="display:inline-block;" class="list-inline border-line">
                                <li><h4 class="cat-title"><?php echo osc_item_title(); ?></h4></li>
                                <li style="margin-left:50px;"><span style="color:#7e391a; font-weight:bold;"><?php echo osc_premium_formated_price();?></span></li>
                            </ul>
                            -->
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="cat-title"><?php echo osc_item_title(); ?></h4>
                                </div>
                                <div class="col-md-6">
                                    <span style="color:#7e391a; font-weight:bold;"><?php echo osc_premium_formated_price();?></span>
                                </div>
                            </div>                                
                            <ul class="list-group meta-content">
                                <li>
                                    <h5>Location : <?php echo osc_item_city(); ?></h5>
                                </li>
                                <li>
                                    <h5>Posted : <?php echo osc_format_date(osc_item_pub_date()); ?></h5>
                                </li>
                                <li>
                                    <h5>Condition : Used</h5>
                                </li>
                                <li>
                                    <h5>Seller : <?php echo osc_item_contact_name(); ?></h5>
                                </li>
                            </ul>
                    
                    <div class="text-center">
                        <button type="button" id="contact-seller" class="btn btn-danger"  role="button" data-toggle="modal" data-target="#myModal">Contact Seller</button>
                    </div>
                    
                        <ul style="display:inline-block;" class="list-inline border-line">
                            <li><h4 class="cat-title">About Seller </h4></li>
                            <li style="margin-left:50px;">
                                <span style="color:#7e391a; font-weight:bold;"><?php echo osc_premium_formated_price();?></span>
                            </li>
                        </ul> 
                        <div class="row">
                         <div class="col-lg-6 col-md-6">                             
                            <ul class="list-group meta-content">
                                <li>
                                    <h5>Location : <?php echo osc_item_city(); ?></h5>
                                </li>
                                <li>
                                    <h5>Posted : <?php echo osc_format_date(osc_item_pub_date()); ?></h5>
                                </li>
                                <li>
                                    <h5>Condition : Used</h5>
                                </li>
                                <li>
                                    <h5>Seller : <?php echo osc_item_contact_name(); ?></h5>
                                </li>
                                <li>
                                    <a href="#seller-profile" role="button" data-toggle="modal" data-target="#seller-profile">Seller Profile</a>
                                </li>
                            </ul>
                         </div>   
                         <div class="col-lg-6 col-md-6">
                            <div class="row">                             
                                <!--<a href="#seller-profile" role="button" data-toggle="modal" data-target="#seller-profile">Seller Profile</a>-->
                              <img src="<?php echo nc_osc_get_public_picture_link(osc_item_user_id());?>" class="img-responsive">
                            </div>
                            <div class="row">
                                <?php if(( osc_logged_user_id() != osc_item_user_id() ))  { ?>
                                
                                    <!--<a href="<?php echo osc_route_url('seller-items',array('seller' => osc_item_user_id())); ?>" >-->
                                    <a href="<?php echo osc_search_url(array('seller_post' => osc_item_user_id()));?>">See other items from seller</a>
                                <?php } ?>
                            </div>  
                            <div class="row">
                                <?php if(osc_is_web_user_logged_in()){ ?>
                                    <?php if(( osc_logged_user_id() != osc_item_user_id() ))  { ?>
                                        <?php osc_current_web_theme_path('seller-ratings.php'); ?>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                         </div> 
                    </div>  
                            

                 </div>
               </div>

            </div>
                
       </div>
    </div>       
       <?php if(nc_osc_item_page_bottom_ads_enabled()){ ?>
        <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                    <?php echo nc_osc_get_item_page_bottom_ads();?>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php osc_current_web_theme_path('footer.php') ; ?>
<?php
/**
 * Classified Theme Item Post Page
 *
 * @package Osclass
 * @subpackage Classified
 */

 osc_enqueue_script('jquery-validate');
 osc_enqueue_script('jquery-uniform');
 ?>

 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('head.php'); ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />

        
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php'); ?>  
        <section id="item-post-page" class="container">
            <div class="row">
                <form name="item" action="<?php echo osc_base_url(true);?>" method="post" enctype="multipart/form-data">
             <h3 style="margin-left:15px;"><?php _e('Publish a listing', 'classified'); ?></h3>
                <div class="col-sm-5">
                   
                    <hr class="featurette-divider"></hr>
                    <ul id="error_list"></ul>
                    
                        <input type="hidden" name="action" value="item_add_post" />
                        <input type="hidden" name="page" value="item" />
                        <h5><?php _e('General Information', 'classified'); ?></h5>
                            <div class="form-group control-group">
                                <div class="controls">    
                                    <label for="catId"><?php _e('Category', 'classified'); ?> *</label>    
                                    <?php ItemForm::category_select(null, null, __('Select a category', 'classified')); ?>
                                </div>
                            </div>
                            <div class="form-group control-group">
                                <div class="controls">
                                    <?php ItemForm::multilanguage_title_description(); ?>
                                </div>
                            </div>
                     <?php if( osc_price_enabled_at_items() ) { ?>
               
                </div>
                <div class="col-sm-5 col-md-offset-2">
               
                     <div class="form-group control-group">
                    <div class="controls">                       
                        <label for="price"><?php _e('Price', 'classified'); ?></label>
                        <div class="row">
                            <div class="col-md-6 price-input"><?php ItemForm::price_input_text(); ?></div>
                            <div class="col-md-6"><?php ItemForm::currency_select(); ?></div>
                        </div>
                    </div>
                </div>
                
                <?php } ?>
                <?php if( osc_images_enabled_at_items() ) { ?>
                 <div class="box photos">
                        <?php
                        if(osc_images_enabled_at_items()) {
                            if(classified_is_fineuploader()) {
                                // new ajax photo upload
                                ItemForm::ajax_photos();
                            }
                            } else { ?>
                                <h2><?php _e('Photos', 'classified'); ?></h2>
                                <?php ItemForm::photos(); ?>
                                <div id="photos">
                                    <?php if(osc_max_images_per_item()==0 || (osc_max_images_per_item()!=0 && osc_count_item_resources()<  osc_max_images_per_item())) { ?>
                                    <div class="row">
                                        <input type="file" name="photos[]" />
                                    </div>
                                    <?php }; ?>
                                </div>
                                <a href="#" onclick="addNewPhoto(); uniform_input_file(); return false;"><?php _e('Upload', 'classified'); ?></a>
                                <?php
                                }
                            }
                        ?>
                </div>
                
                <!--<div class="fileUpload btn btn-primary">
                    <a href="#" onclick="addNewPhoto(); uniform_form-group_file(); return false;"><span>Upload</span></a>
                    <form-group class="upload" name="phptos[]" />
                </div>
                -->
                    <h5><?php _e('Listing Location', 'classified'); ?></h5>
                    <div class="form-group control-group">
                        <div class="controls">    
                            <label for="countryId"><?php _e('Country', 'classified'); ?></label>
                            <?php ItemForm::country_select(osc_get_countries(), osc_user()); ?>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6 form-group control-group">
                        <div class="controls">
                            <label for="regionId"><?php _e('Region', 'classified'); ?></label>
                            <?php ItemForm::region_text(osc_user()); ?>
                        </div>
                    </div>
                    <div class="col-md-6 form-group control-group">
                        <div class="controls">    
                            <label for="city"><?php _e('City', 'classified'); ?></label>
                            <?php ItemForm::city_text(osc_user()); ?>
                        </div>    
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6 form-group control-group">
                        <div class="controls">
                            <label for="city"><?php _e('City Area', 'classified'); ?></label>
                            <?php ItemForm::city_area_text(osc_user()); ?>
                        </div>
                    </div>
                    <div class="col-md-6 form-group control-group">
                        <div class="controls">
                            <label for="address"><?php _e('Address', 'classified'); ?></label>
                            <?php ItemForm::address_text(osc_user()); ?>
                        </div>
                    </div>
                    </div>
                            <!-- seller info -->
                            <?php if(!osc_is_web_user_logged_in() ) { ?>
                                <h5><?php _e("Seller's information", 'classified'); ?></h5>
                                <div class="form-group control-group">
                                    <div class="controls">
                                        <label for="contactName"><?php _e('Name', 'classified'); ?></label>
                                        <?php ItemForm::contact_name_text(); ?>
                                    </div>
                                </div>
                                <div class="form-group control-group">
                                    <div class="controls">
                                        <label for="contactEmail"><?php _e('E-mail', 'classified'); ?> *</label>
                                        <?php ItemForm::contact_email_text(); ?>
                                    </div>
                                </div>
                                <div class="form-group control-group">
                                    <div class="controls">
                                        <div style="text-align: right;float:left;">
                                            <?php ItemForm::show_email_checkbox(); ?>
                                        </div>
                                    </div>
                                    <label for="showEmail" style="width: 250px;"><?php _e('Show e-mail on the listing page', 'classified'); ?></label>
                                </div>
                            <?php }; ?>
                            <?php ItemForm::plugin_post_item(); ?>
                            <?php if( osc_recaptcha_items_enabled() && !osc_is_web_user_logged_in()) {?>
                            <div class="form-group control-group">
                                <div class="controls">
                                    <?php osc_show_recaptcha(); ?>
                                </div>
                            </div>
                            <?php }?>
                        <div class="form-group control-group centered">
                            <?php if(nc_osc_premium_fee_enabled()){ ?>
                                <input type="checkbox" name="publish_fee_check" value="1"> Make this ad Premium for <?php echo nc_osc_get_default_currency()." ";?><?php echo nc_osc_get_premium_fee(); ?> 
                            <?php } ?>

                        </div> 
                         <div class="controls">
                                <button  type="submit" class="btn btn-primary"><?php _e('Publish', 'classified'); ?></button>
                        </div>   
                        </div>    
                       
                    </form><!--END OF col-sm-8-->
            </div><!--END OF ROW-->
        </section>    
<style>
    .qq-upload-button {
        display: block;
        padding: 7px 0px;
        text-align: center;
        background: #91a3ce none repeat scroll 0% 0%;
        border-bottom: 1px solid #DDD;
        color: #fff;
        width:60px;
    }
        .qq-upload-list li {
        background-color:#dff0d8!important;
        color:#333!important;
        display:inline-block;
        margin-bottom:10px;
        overflow:hidden;
        width:100%;
        height:auto;
        -webkit-box-sizing:border-box;
        -moz-box-sizing:border-box;
        box-sizing:border-box;
        float:left
    }
</style>        
<script type="text/javascript">    
$(document).ready(function(){
    $("#catId, #titleen_US, #descriptionen_US, #price, #currency").addClass('form-control'); 
    $("#is_stock, #stock_qty, #countryId, #regionId, #region, #city, #cityArea, #address").addClass('form-control');
    $("#contactName, #contactEmail, #showEmail").addClass('form-control');
    $('.description textarea').attr('rows', '5');

    $('div.qq-upload-button>div').each(function(index, value) { 
        $(this).html('Upload');
    });
                     
            });
        </script>
        <?php osc_current_web_theme_path('footer.php') ; ?>
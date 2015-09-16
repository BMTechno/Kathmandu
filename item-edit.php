<?php

/**
 * Classified Theme Item Edit Page
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

        <!-- only item-edit.php -->

        <script type="text/javascript">

            $(document).ready(function(){
                $("#catId, #titleen_US, #descriptionen_US, #price, #currency").addClass('form-control'); 
                $("#is_stock, #stock_qty, #countryId, #regionId, #region, #city, #cityArea, #address").addClass('form-control');
                $("#contactName, #contactEmail, #showEmail").addClass('form-control');

                $('body').on("created", '[name^="select_"]',function(evt) {
                    $(this).uniform();
                });
                $('body').on("removed", '[name^="select_"]',function(evt) {
                    $(this).parent().remove();
                });

               
            });
            function uniform_input_file(){
                            photos_div = $('div.photos');
                            $('div',photos_div).each(
                                function(){
                                    if( $(this).find('div.uploader').length == 0  ){
                                        divid = $(this).attr('id');
                                        if(divid != 'photos'){
                                            divclass = $(this).hasClass('box');
                                            if( !$(this).hasClass('box') & !$(this).hasClass('uploader') & !$(this).hasClass('row')){
                                                $("div#"+$(this).attr('id')+" input:file").uniform({fileDefaultText: fileDefaultText,fileBtnText: fileBtnText});
                                            }
                                        }
                                    }
                                }
                            );
                        }

            setInterval("uniform_plugins()", 250);
            function uniform_plugins() {

                var content_plugin_hook = $('#plugin-hook').text();
                content_plugin_hook = content_plugin_hook.replace(/(\r\n|\n|\r)/gm,"");
                if( content_plugin_hook != '' ){

                    var div_plugin_hook = $('#plugin-hook');
                    var num_uniform = $("div[id*='uniform-']", div_plugin_hook ).size();
                    if( num_uniform == 0 ){
                        if( $('#plugin-hook input:text').size() > 0 ){
                            $('#plugin-hook input:text').uniform();
                        }
                        if( $('#plugin-hook select').size() > 0 ){
                            $('#plugin-hook select').uniform();
                        }
                    }
                }
            }
            <?php if(osc_locale_thousands_sep()!='' || osc_locale_dec_point() != '') { ?>
            $().ready(function(){
                $("#price").blur(function(event) {
                    var price = $("#price").prop("value");
                    <?php if(osc_locale_thousands_sep()!='') { ?>
                    while(price.indexOf('<?php echo osc_esc_js(osc_locale_thousands_sep());  ?>')!=-1) {
                        price = price.replace('<?php echo osc_esc_js(osc_locale_thousands_sep());  ?>', '');
                    }
                    <?php }; ?>
                    <?php if(osc_locale_dec_point()!='') { ?>
                    var tmp = price.split('<?php echo osc_esc_js(osc_locale_dec_point())?>');
                    if(tmp.length>2) {
                        price = tmp[0]+'<?php echo osc_esc_js(osc_locale_dec_point())?>'+tmp[1];
                    }
                    <?php }; ?>
                    $("#price").prop("value", price);
                });
            });
            <?php }; ?>
          
        </script>
        <!-- end only item-edit.php -->
        <?php ItemForm::location_javascript_new(); ?>
        <?php
        if(osc_images_enabled_at_items() && !classified_is_fineuploader()) {
            ItemForm::photos_javascript();
        }
        ?>
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php'); ?>
        <div class="container-fluid content add_item">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="content-section">
                         <h4 class="my-account">Update your listing</h4>
                        <ul id="error_list"></ul>
                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="account-sidebar">
                                    <img style="height:111px; margin:0 auto;" class="img-responsive img-circle" src="<?php echo nc_osc_get_picture_link();?>" alt="#">
                                    <h5 style="color:#ffffff; text-align:center;"><?php echo osc_logged_user_name();?></h5>
                                    <h6 style="color:#ffffff; text-align:center; padding-bottom:20px; border-bottom:1px solid #404040;">Member Since <?php echo nc_osc_get_logged_user_ref_date();?></h6>
                                    <?php echo osc_private_user_menu(); ?>
                                </div>                 
                            </div>
                        <div class="col-md-6 col-sm-12 col-xs-12"> 
                            <div class="row">
                                <div class="col-md-6" style="padding-left:30px;">   
                                <form name="item" action="<?php echo osc_base_url(true)?>" method="post" enctype="multipart/form-data">
                                <fieldset>
                                <input type="hidden" name="action" value="item_edit_post" />
                                <input type="hidden" name="page" value="item" />
                                <input type="hidden" name="id" value="<?php echo osc_item_id();?>" />
                                <input type="hidden" name="secret" value="<?php echo osc_item_secret();?>" />
                                    <div class="box general_info">
                                        <h2><?php _e('General Information', 'classified'); ?></h2>
                                        <div class="row">
                                            <label><?php _e('Category', 'classified'); ?> *</label>
                                                <?php ItemForm::category_select(null, null, __('Select a category', 'classified')); ?>
                                        </div>
                                        <div class="row">
                                            <?php ItemForm::multilanguage_title_description(osc_get_locales()); ?>
                                        </div>
                                        <?php if( osc_price_enabled_at_items() ) { ?>
                                        <div class="row price">
                                            <label><?php _e('Price', 'classified'); ?></label>
                                            <?php ItemForm::price_input_text(); ?>
                                            <?php ItemForm::currency_select(); ?>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    
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
                                        <a href="#" onclick="addNewPhoto(); uniform_input_file(); return false;"><?php _e('Add new photo', 'classified'); ?></a>
                                    <?php
                                        }
                                    }
                                    ?>
                                    </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                    <div class="box location">
                                        <h2><?php _e('Location', 'classified'); ?></h2>
                                        <div class="row">
                                            <label><?php _e('Country', 'classified'); ?></label>
                                            <?php ItemForm::country_select(); ?>
                                        </div>
                                        <div class="row">
                                            <label><?php _e('Region', 'classified'); ?></label>
                                            <?php ItemForm::region_text(); ?>
                                        </div>
                                        <div class="row">
                                            <label><?php _e('City', 'classified'); ?></label>
                                                <?php ItemForm::city_text(); ?>
                                        </div>
                                        <div class="row">
                                            <label><?php _e('City area', 'classified'); ?></label>
                                            <?php ItemForm::city_area_text(); ?>
                                        </div>
                                        <div class="row">
                                            <label><?php _e('Address', 'classified'); ?></label>
                                            <?php ItemForm::address_text(); ?>
                                        </div>
                                    </div>
                                    <?php ItemForm::plugin_edit_item(); ?>
                                    <?php if( osc_recaptcha_items_enabled() ) {?>
                                    <div class="box">
                                        <div class="row">
                                            <?php osc_show_recaptcha(); ?>
                                        </div>
                                    </div>
                                    <?php }?>
                                    <button class="btn btn-success itemFormButton" type="submit"><?php _e('Update', 'classified'); ?></button>
                                    <button class="btn btn-success"><a style="color:#ffffff;" href="javascript:history.back(-1)" class="go_back"><?php _e('Cancel', 'classified'); ?></a></button>
                                </fieldset>
                            </form>
                            </div></div>
                            </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>           
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
        width:200px;
        height:auto;
        max-width:100%;
        max-height:100%;
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

        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>
<?php
/**
 * Classified Theme Footer Page
 *
 * @package Osclass
 * @subpackage Classified
 */
?>
<?php if(nc_osc_footer_top_ads_enabled() && !osc_is_ad_page()){ ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <?php echo nc_osc_get_footer_top_ads();?>
            </div>
        </div>
    </div>
<?php } ?>
<!-- footer -->
<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 footer-line">
                <div class="footer1" style="padding-top: 28px; ">
                    <?php if(!nc_osc_show_footer_about_us()){ ?> 
                    
                        <?php
                            osc_reset_static_pages();
                            while( osc_has_static_pages() ) { ?>
                                <ul class="list-inline">
                                    <li>
                                        <i class="fa fa-chrome" style="color:#fff;" ></i>
                                    </li>
                                    <li >
                                        <a style="color:#fff;" href="<?php echo osc_static_page_url(); ?>"><?php echo osc_static_page_title(); ?></a>
                                    </li>
                                </ul>    
                        <?php }?>
                    
                    <?php }else{ ?>
                    <ul>
                        <li>
                            <img style="" class="img-responsive" src="<?php echo osc_base_url().'oc-content/themes/classified/images/footerlogo.png'; ?>" alt="">
                        </li>
                        <li>    
                            <div class="footer2-title1"><?php echo osc_get_preference('about_us_heading','classified'); ?></div>                        
                        </li>    
                    </ul>
                    <p style="margin-top:-20px;" class="footer-para"><?php echo osc_get_preference('about_us','classified'); ?></p>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 footer-line">
                <div class="footer2">
                    <div class="footer2-title1">Subscribe for updates</div>
                    <input class="email-id" type="text" name="subscription_email" id="subscription_email" placeholder="email address"  />
                    <div class="subscribe" id="footer-subscribe"><h4>SUBSCRIBE</h4></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 footer-line">
                <div class="footer3">
                    <div class="footer2-title1">Contact Us</div>
                    <div class="footer3-list">
                        <ul class="list-inline">
                            <li><i class="fa fa-mobile fa-2x"></i></li>
                            <li><?php echo osc_get_preference('phone_info','classified'); ?></li>
                        </ul>
                        <ul class="list-inline">
                            <li><i class="fa fa-envelope fa-1x"></i></li>
                            <li><?php echo osc_get_preference('email_info','classified'); ?></li>
                        </ul>
                        <ul class="list-inline">
                            <li><i style="font-size:20px;" class="fa fa-home fa-1x"></i></li>
                            <li><?php echo osc_get_preference('address_info','classified'); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="footer4">
                    <div class="footer2-title">Follow Us</div>
                    <ul class="list-inline social-icon text-right">
                        <?php if(osc_get_preference('e_sb_twitter','classified')) { ?>
                        <li><a href="<?php echo osc_get_preference('sb_twitter','classified');?>"><img class="img-responsive" src="<?php echo osc_base_url().'oc-content/themes/classified/images/twitter-icon.jpg'; ?>" alt=""></a></li>
                        <?php }?>
                        <?php if(osc_get_preference('e_sb_facebook','classified')) { ?>
                        <li><a href="<?php echo osc_get_preference('sb_facebook','classified');?>"><img class="img-responsive" src="<?php echo osc_base_url().'oc-content/themes/classified/images/fb-icon.jpg'; ?>" alt=""></a></li>
                        <?php }?>
                        <?php if(osc_get_preference('e_sb_google','classified')) { ?>
                        <li><a href="<?php echo osc_get_preference('sb_google','classified');?>"><img class="img-responsive" src="<?php echo osc_base_url().'oc-content/themes/classified/images/g-plus.jpg'; ?>" alt=""></a></li>
                        <?php }?>

                        <?php if(osc_get_preference('e_sb_linkedin','classified')) { ?>    
                        <li><a href="<?php echo osc_get_preference('sb_linkedin','classified');?>"><img class="img-responsive" src="<?php echo osc_base_url().'oc-content/themes/classified/images/linkedin.jpg'; ?>" alt=""></a></li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> 
 <div class="scroll-top-wrapper ">
    <span class="scroll-top-inner">
        <i class="fa fa-1x fa-angle-up custom-angle-up"></i>
    </span>
</div>
<!-- /footer -->
<script type="text/javascript">
    //var sQuery = '<?php //echo $sQuery; ?>';
    function doSearch() {
        if($('input[name=sPattern]').val() == sQuery || ( $('input[name=sPattern]').val() != '' && $('input[name=sPattern]').val().length < 3 ) ) {
            $('input[name=sPattern]').css('background', '#FFC6C6');
            $('#search-example').text('<?php echo osc_esc_js( __('Your search must be at least three characters long','classified') ); ?>')
            return false;
        }
        return true;
    }
</script>
 <script>
     
    $(function(){
     
        $(document).on( 'scroll', function(){
     
            if ($(window).scrollTop() > 100) {
                $('.scroll-top-wrapper').addClass('show');
            } else {
                $('.scroll-top-wrapper').removeClass('show');
            }
        });
    });
    </script>
 <script>
     
    $(function(){
     
        $(document).on( 'scroll', function(){
     
            if ($(window).scrollTop() > 100) {
                $('.scroll-top-wrapper').addClass('show');
            } else {
                $('.scroll-top-wrapper').removeClass('show');
            }
        });
     
        $('.scroll-top-wrapper').on('click', scrollToTop);
    });
     
    function scrollToTop() {
        verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
        element = $('body');
        offset = element.offset();
        offsetTop = offset.top;
        $('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
    }
    </script>

<div class="modal fade" id="login" role="dialog">
    <?php osc_current_web_theme_path('user-login-modal.php') ;  ?>      
</div>
<div class="modal fade" id="register" role="dialog">
    <?php osc_current_web_theme_path('user-register-modal.php') ;  ?>      
</div>
<div class="modal fade" id="recover" role="dialog">
    <?php osc_current_web_theme_path('user-recover.php') ;  ?>      
</div>
<div class="subscribe-modal"><!-- Place at bottom of page --></div>      
</body>
</html>
<?php osc_run_hook('footer'); ?>
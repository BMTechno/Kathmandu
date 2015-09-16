<?php
/**
 * Classified Theme Header Page
 *
 * @package Osclass
 * @subpackage Classified
 */
?>

<script type="text/javascript">
    $(document).ready(function(){
        $("#breadcrumb ul").addClass('breadcrumb'); 
        $("#sCategory").addClass('form-control');
        $("#query").addClass('search_box_input_area');
        $(".flashmessage .ico-close").click(function(){
            $(this).parent().hide();
        });    

    });
</script>
<?php
/**
* If Custom ccs is enable, prints given css in theme settings
*/

if(nc_osc_custom_css_enabled()){
    echo nc_osc_get_custom_css();
}
?>
    <div style="padding-bottom:13px;" class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-left">
                    <div class="logo">
                        <a href="<?php echo osc_base_url(); ?>"><?php echo logo_header(); ?> </a>
                    </div>
                </div>
                <div class="head_new_cl col-lg-9 col-md-9 col-sm-12 col-xs-12 text-right">                                             
                        <?php if( osc_is_web_user_logged_in() ) { ?>
                            <?php echo sprintf(__('Hi %s', 'classified'), osc_logged_user_name() . '!  '); ?>&nbsp;&nbsp;&nbsp;
                            <a class="my_account" href="<?php echo osc_user_dashboard_url(); ?>"><?php _e('My account', 'classified'); ?></a>
                            <?php if(nc_osc_get_post_ads_settings()){
                                    echo "<a class='post_an_ad' href=".osc_item_post_url() .">Post an Ad</a>";
                                }
                            ?>
                            <a class="log_out" href="<?php echo osc_user_logout_url(); ?>"><?php _e('Logout', 'classified'); ?></a>
                        <?php }else{

                            echo '<a href="#" role="button" data-toggle="modal" data-target="#register" class="register-btn">Register</a>';
                            echo "<a id='login_open' href='#' role='button' data-toggle='modal' data-target='#login' class='login-btn'>Login</a>";
                            
                        } ?>                              
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function(){
        $(window).bind('scroll', function() {
            var navHeight = $( window ).height()-580;
            if ($(window).scrollTop() > 180) {    
                $('.quick-search').addClass('fixed');            
            } else {
                $('.quick-search').removeClass('fixed'); 
            }
        });
    });
</script>
<div class="quick-search">
    <div class="container-fluid">
        <div class="row search-head">
            <form action="<?php echo osc_base_url(true) ; ?>" method="get" class="search" onsubmit="javascript:return doSearch();" name="searchForm">
                <input type="hidden" name="page" value="search"/>            
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center nopadding">                        
                        <div id="custom-search-input">                            
                            <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="text" name="sPattern" id="query" placeholder="<?php echo nc_osc_get_keyword_placeholder(); ?>" class="search-query form-control" />       
                                <span class="input-group-btn">        
                                <button class="btn btn-danger" type="button">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button> 
                                </span>        
                            </div>                                
                        </div>                            
                    </div>                               
            </form>
        </div>            
    </div>
</div>

<?php
    osc_show_widgets('header');
 ?>
<div class="forcemessages-inline">
    <?php osc_show_flash_message(); ?>
</div>    
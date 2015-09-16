<!DOCTYPE html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=100%; initial-scale=1; maximum-scale=1; minimum-scale=1; user-scalable=no;" />
<?php
/**
 * Classified Theme Head
 *
 * @package Osclass
 * @subpackage Classified
 */
?>

<?php 
function getUrl() {
    $url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
    $url .= ( $_SERVER["SERVER_PORT"] != 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
    $url .= $_SERVER["REQUEST_URI"];
    return $url;
}
?>
<?php 
function getImage(){
    if(getUrl()==osc_base_url()){
        
        if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" ) ) {
            $image = osc_current_web_theme_url('images/logo.jpg');
        }
        else{
            $image = osc_current_web_theme_url('images/default-logo.jpg');
        }
    }else{
        
        if( osc_images_enabled_at_items() ) {
            if( osc_count_item_resources() > 0 ) {
                $image = osc_resource_url();
            }else{
                $image = osc_current_web_theme_url('images/logo.jpg');
            }
        }else{
                $image = osc_current_web_theme_url('images/logo.jpg');
        }
    }
    return $image;
}
?>
<?php
if(getUrl()==osc_base_url()){
    echo '<meta property="og:type" content="website" />';
}else{
    echo '<meta property="og:type" content="product" />';
}        
?>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />


<title><?php echo meta_title(); ?></title>
<meta name="title" content="<?php echo osc_esc_html(meta_title()); ?>" />

<?php if( meta_description() != '' ) { ?>
<meta name="description" content="<?php echo osc_esc_html(meta_description()); ?>" />
<?php } ?>

<?php if( function_exists('meta_keywords') ) { ?>
<?php if( meta_keywords() != '' ) { ?>
<meta name="keywords" content="<?php echo osc_esc_html(meta_keywords()); ?>" />
<?php } ?>
<?php } ?>
<?php if( osc_get_canonical() != '' ) { ?>
<link rel="canonical" href="<?php echo osc_get_canonical(); ?>"/>
<?php } ?>


<script type="text/javascript">
    var fileDefaultText = '<?php echo osc_esc_js( __('No file selected', 'classified') ); ?>';
    var fileBtnText     = '<?php echo osc_esc_js( __('Choose File', 'classified') ); ?>';
</script>

<?php
osc_enqueue_style('style', osc_current_web_theme_url('style.css'));
//osc_enqueue_style('tabs', osc_current_web_theme_url('tabs.css'));
//osc_enqueue_style('jquery-ui-datepicker', osc_assets_url('css/jquery-ui/jquery-ui.css'));


osc_register_script('jquery', osc_current_web_theme_js_url('jquery.js'));
osc_enqueue_script('jquery');
osc_enqueue_script('jquery-ui');
osc_register_script('bootstrap-js', osc_base_url() . 'oc-content/themes/classified/bootstrap/bootstrap.min.js','jquery');
osc_enqueue_script('bootstrap-js');
osc_enqueue_script('tabber');
osc_enqueue_script('bootstrap-dialog');
osc_run_hook('header');

//FieldForm::i18n_datePicker();

?>


<?php
/**
*   Custom Javascript from Theme Settings
*   Can be used for Chat or other JavaScript applications
*/
if(nc_osc_custom_javascript_enabled()){
    echo nc_osc_get_custom_javascript();
}
?>
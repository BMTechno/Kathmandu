<?php
    /**
     * CLASSIFIED THEME functions page
     */

    define('CLASSIFIED_THEME_VERSION', '1.0.0');

    /**
     *   
     *LOAD DAO CLASSES
     *
     */
    require_once('dao-class/ppicture.class.php');
    require_once('dao-class/seller-ratings.class.php');
    require_once('dao-class/watchlist.class.php');
    require_once('dao-class/facebook.class.php');
    require_once('dao-class/facebookuser.class.php');
    require_once('dao-class/paid-ads.class.php');
    require_once('dao-class/subscriber.class.php');
    
    /**
    *   Load Function Pages
    */
    require_once('facebook-function.php');

    /**
    *   UPLOAD and REMOVE Site's LOGO
    */
    function theme_classified_actions_admin() {
        switch( Params::getParam('action_specific') ) {
            case('upload_logo'):
                $package = Params::getFiles('logo');
                if( $package['error'] == UPLOAD_ERR_OK ) {
                    if( move_uploaded_file($package['tmp_name'], WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" ) ) {
                        osc_add_flash_ok_message(__('The logo image has been uploaded correctly', 'classified'), 'admin');
                    } else {
                        osc_add_flash_error_message(__("An error has occurred, please try again", 'classified'), 'admin');
                    }
                } else {
                    osc_add_flash_error_message(__("An error has occurred, please try again", 'classified'), 'admin');
                }
                header('Location: ' . osc_admin_render_theme_url('oc-content/themes/classified/admin/header.php')); exit;
            break;
            case('remove'):
                if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" ) ) {
                    @unlink( WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" );
                    osc_add_flash_ok_message(__('The logo image has been removed', 'classified'), 'admin');
                } else {
                    osc_add_flash_error_message(__("Image not found", 'classified'), 'admin');
                }
                header('Location: ' . osc_admin_render_theme_url('oc-content/themes/classified/admin/header.php')); exit;
            break;
        }
    }
    
    /**
    *
    * GETS LOGO or else DEFAULT LOGO
    *
    */
    if( !function_exists('logo_header') ) {
        function logo_header() {
            $html = '<img style="border:0px" alt="' . osc_page_title() . '" src="' . osc_current_web_theme_url('images/logo.jpg') . '" />';
            if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" ) ) {
                return $html;
            } else if( osc_get_preference('default_logo', 'classified') && (file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/default-logo.jpg")) ) {
                return '<img style="border:0px" alt="' . osc_page_title() . '" src="' . osc_current_web_theme_url('images/default-logo.jpg') . '" />';
            } else {
                return osc_page_title();
            }
        }
    }

    // install update options
    if( !function_exists('classified_theme_install') ) {
        function classified_theme_install() {
            osc_set_preference('keyword_placeholder', __('ie. PHP Programmer', 'classified'), 'classified');
            osc_set_preference('version', '1.0.0', 'classified');
            osc_set_preference('default_logo', '1', 'classified');
            osc_reset_preferences();
        }
    }

    if(!function_exists('check_install_classified_theme')) {
        function check_install_classified_theme() {
            $current_version = osc_get_preference('version', 'classified');
            //check if current version is installed or need an update
            if( !$current_version ) {
                classified_theme_install();
            }
        }
    }
    check_install_classified_theme();

    /* remove theme */
    function classified_delete_theme() {
        
    }
    osc_add_hook('theme_delete_classified', 'classified_delete_theme');
/**
*
*   FineUploader
*
*/
if (classified_is_fineuploader()) {
    if (!OC_ADMIN) {
        osc_enqueue_style('fine-uploader-css', osc_assets_url('js/fineuploader/fineuploader.css'));
    }
    osc_enqueue_script('jquery-fineuploader');
}

function classified_is_fineuploader() {
    return Scripts::newInstance()->registered['jquery-fineuploader'] && method_exists('ItemForm', 'ajax_photos');
}

/**
*
*   Header Logo and Theme Settings 
*
*/
osc_add_hook('init_admin', 'theme_classified_actions_admin');
if (function_exists('osc_admin_menu_appearance')) {
    osc_admin_menu_appearance(__('Header logo', 'classified'), osc_admin_render_theme_url('oc-content/themes/classified/admin/header.php'), 'header_classified');
    osc_admin_menu_appearance(__('Theme settings', 'classified'), osc_admin_render_theme_url('oc-content/themes/classified/admin/settings.php'), 'settings_classified');
  
} else {

    function classified_admin_menu() {
        echo '<h3><a href="#">' . __('Classified theme', 'classified') . '</a></h3>
            <ul>
                <li><a href="' . osc_admin_render_theme_url('oc-content/themes/classified/admin/header.php') . '">&raquo; ' . __('Header logo', 'classified') . '</a></li>
                <li><a href="' . osc_admin_render_theme_url('oc-content/themes/classified/admin/settings.php') . '">&raquo; ' . __('Theme settings', 'classified') . '</a></li>
            </ul>';
    }

    osc_add_hook('admin_menu', 'classified_admin_menu');
}

/**
*
* THEME SETTINGS MENU PAGE
*
*/
function style_admin_menu() { ?>
<style>
    #theme-settings .ico-theme-settings{
        background-image: url('<?php echo osc_base_url()."oc-content/themes/classified/images/theme-settings-small.png"; ?>') !important;
        width:48px;
        height: 48px;
        display:block;
    }
</style>
<?php
} //End of style_admin_menu function

osc_add_hook('admin_header','style_admin_menu');
$theme_settings_url = 'oc-content/themes/classified/admin/theme-settings.php';
osc_add_admin_menu_page("Theme-Settings", osc_admin_render_theme_url($theme_settings_url), 'theme-settings','administrator');



/**
*
*   jQuery and css to be loaded
*/
function load_my_script(){ 
    osc_register_script('jquery', osc_current_web_theme_js_url('jquery.js'));
    osc_enqueue_script('jquery');

    osc_register_script('jquery-ui', osc_base_url() . 'oc-content/themes/classified/js/jquery-ui.min.js','jquery');
    
    osc_register_script('cookie-plugin', osc_base_url() . 'oc-content/themes/classified/js/jquery.cookie.min.js','jquery');
    
    osc_register_script('ratings',osc_base_url().'oc-content/themes/classified/js/jRate.min.js');
    osc_enqueue_script('ratings');
    
    osc_register_script('jquery-validate', osc_base_url().'oc-content/themes/classified/js/jquery.validate.min.js','jquery');
    osc_enqueue_script('jquery-validate');
    
    osc_register_script('classified', osc_base_url().'oc-content/themes/classified/js/classified.js');
    osc_enqueue_script('classified');
    
    osc_register_script('jssor', osc_base_url().'oc-content/themes/classified/js/jssor.js');
    osc_enqueue_script('jssor');
    
    osc_register_script('jssor-slider', osc_base_url().'oc-content/themes/classified/js/jssor.slider.js');
    osc_enqueue_script('jssor-slider');

    osc_register_script('facebook-admin', osc_base_url().'oc-content/themes/classified/js/facebook-admin.js');
    osc_enqueue_script('facebook-admin');
    
    osc_enqueue_script('cookie-plugin');
    
    osc_register_script('bootstrap-js', osc_base_url() . 'oc-content/themes/classified/bootstrap/bootstrap.min.js','jquery');
    osc_register_script('bootstrap-dialog', osc_base_url().'oc-content/themes/classified/js/bootstrap-dialog.min.js');
    osc_register_script('jquery-uniform', osc_base_url().'oc-content/themes/classified/js/jquery.uniform.js');
    osc_register_script('jquery-fineuploader',osc_base_url().'oc-includes/osclass/assets/js/fineuploader/jquery.fineuploader.min.js','jquery');
     if( !OC_ADMIN ) {
        osc_enqueue_style('font-awesome',osc_base_url().'oc-content/themes/classified/css/font-awesome.min.css');
        osc_enqueue_style('bootstrap',osc_base_url().'oc-content/themes/classified/bootstrap/bootstrap.css');
        osc_enqueue_style('facebook-css',osc_base_url().'oc-content/themes/classified/css/facebook.css');
        osc_enqueue_style('default-css',osc_base_url().'oc-content/themes/classified/style.css');

    }
    if(osc_is_home_page()){
        //osc_enqueue_style('jCarouselLite-css',osc_base_url().'oc-content/themes/classified/css/premium_slide.css');
        //osc_register_script('jCarouselLite', osc_base_url().'oc-content/themes/classified/js/jCarouselLite.js');
        //osc_enqueue_script('jCarouselLite');
    }

}

osc_add_hook('init','load_my_script');

/**
*
* Script and CSS for admin pages
*/
function load_admin_script(){
    osc_register_script('tiny_mce',osc_base_url().'oc-includes/osclass/assets/js/tiny_mce/tiny_mce.js');
    osc_enqueue_script('tiny_mce');
   
    osc_enqueue_style('admin',osc_base_url().'oc-content/themes/classified/admin/style.css');
    osc_register_script('admin', osc_base_url().'oc-content/themes/classified/admin/admin.js');
    osc_enqueue_script('admin');
    
    osc_register_script('facebook-admin', osc_base_url().'oc-content/themes/classified/admin/facebook.js');
    osc_enqueue_script('facebook-admin');
}
osc_add_hook('init_admin', 'load_admin_script');


/**
*
*   Funtions for User Picture
*/
function nc_osc_get_picture(){
    return ProfilePicture::newInstance()->findPictureExist(osc_logged_user_id());
}
function nc_osc_get_picture_link(){
    $ext=ProfilePicture::newInstance()->getPictureExt(osc_logged_user_id());

    if($ext['name']==null){
        $name=osc_logged_user_id().'.'.$ext['pic_ext'];
    }else{
        $name='default.png';
    }
    return osc_current_web_theme_url().'profile_picture/'.$name;
}
function nc_osc_get_public_picture_link($user_id){

    $ext=ProfilePicture::newInstance()->getPictureExt($user_id);
    if($ext['name']==null){
        $name=$user_id.'.'.$ext['pic_ext'];
    }else{
        $name='default.png';
    }
    return osc_current_web_theme_url().'profile_picture/'.$name;
}


/**
*
*   Function related to User WatchList
*/
function nc_osc_check_watchlist(){
    return WatchList::newInstance()->checkItemAdded(osc_logged_user_id(),osc_item_id());
}
function nc_osc_add_watchllist($user_id,$item_id){
    return WatchList::newInstance()->addToWatchList($item_id,$user_id);
}
function nc_osc_remove_watchlist($user_id,$item_id){
    return WatchList::newInstance()->deleteFromWatchList($item_id,$user_id);
}

/**
*   Functions for various preferences
*/
function nc_osc_show_sb_facebook(){
    return osc_get_preference('e_sb_facebook','classified');
}
function nc_osc_get_sb_facebook(){
    return osc_get_preference('sb_facebook','classified');
}
function nc_osc_show_sb_twitter(){
    return osc_get_preference('e_sb_twitter','classified');
}
function nc_osc_get_sb_twitter(){
    return osc_get_preference('sb_twitter','classified');
}
function nc_osc_show_sb_instagram(){
    return osc_get_preference('e_sb_instagram','classified');
}
function nc_osc_get_sb_instagram(){
    return osc_get_preference('sb_instagram','classified');
}
function nc_osc_show_sb_linkedin(){
    return osc_get_preference('e_sb_linkedin','classified');
}
function nc_osc_get_sb_linkedin(){
    return osc_get_preference('sb_linkedin','classified');
}
function nc_osc_show_sb_google(){
    return osc_get_preference('e_sb_google','classified');
}
function nc_osc_get_sb_google(){
    return osc_get_preference('sb_google','classified');
}
function nc_osc_show_fb_comment(){
    return osc_get_preference('e_comment_fb','classified');
}
function nc_osc_get_fb_app_id(){
    return osc_get_preference('fb_app_id','classified');
}
function nc_osc_show_twitter_share(){
    return osc_get_preference('e_twitter_share','classified');
}
function nc_osc_show_facebook_share(){
    return osc_get_preference('e_facebook_share','classified');
}
function nc_osc_show_google_share(){
    return osc_get_preference('e_google_share','classified');
}
function nc_osc_show_pintrest_share(){
    return osc_get_preference('e_pintrest_share','classified');
}
function nc_osc_hide_categories(){
    return osc_get_preference('e_hide_categories','classified');
}
function nc_osc_show_premium_ads(){
    return osc_get_preference('e_show_premium_slider','classified');
}
function nc_osc_show_landing_popup(){
    return osc_get_preference('e_landing_popup','classified');
}
function nc_osc_get_popup_head(){
    return osc_get_preference('popup_head','classified');
}
function nc_osc_get_popup_body(){
    return osc_get_preference('popup_body','classified');
}
function nc_osc_get_popup_foot(){
    return osc_get_preference('popup_foot','classified');
}
function nc_osc_show_google_maps(){
    return osc_get_preference('e_show_google_maps','classified');
}
function nc_osc_show_shout_box(){
    return osc_get_preference('e_show_shout_box','classified');
}
function nc_osc_show_view_count(){
    return osc_get_preference('e_view_count','classified');
}
function nc_osc_get_search_content(){
    return osc_get_preference('search_content', 'classified');
}
function nc_osc_get_keyword_placeholder(){
    return osc_get_preference('keyword_placeholder', 'classified');
}
function nc_osc_get_post_ads_settings(){
    return osc_get_preference('e_post_ad_to_all', 'classified');
}
function nc_osc_premium_fee_enabled(){
    return osc_get_preference('premium_fee_check', 'classified');
}
function nc_osc_get_premium_fee(){
    return osc_get_preference('premium_cost','classified');
}
function nc_osc_get_default_currency(){
    return osc_get_preference('default_currency','classified');
}
function nc_osc_get_recent_before_popular(){
    return osc_get_preference('e_recent_before_popular', 'classified');
}
function nc_osc_front_display_with_image(){
    return osc_get_preference('e_front_display_with_image','classified');
}
function nc_osc_premium_ads_display(){
    return osc_get_preference('e_premium_ads_row', 'classified');
}
function nc_osc_premium_ads_row_num(){
    return osc_get_preference('select_premium_ads_row', 'classified');
}
function nc_osc_premium_ads_column_num(){
    return osc_get_preference('select_premium_ads_column','classified');
}
function nc_osc_front_page_ads_enabled(){
    return osc_get_preference('e_ads_front_page_below_slider','classified');
}
function nc_osc_get_front_page_ads(){
    return osc_get_preference('ads_front_page_below_slider','classified');
}
function nc_osc_search_results_ads_enabled(){
    return osc_get_preference('e_ads_search_result_below_header','classified');
}   
function nc_osc_get_search_results_ads(){
    return osc_get_preference('ads_search_result_below_header','classified');
}  
function nc_osc_item_page_top_ads_enabled(){
    return osc_get_preference('e_ads_item_page_top','classified');
}
function nc_osc_get_item_page_top_ads(){
    return osc_get_preference('ads_item_page_top','classified');
}
function nc_osc_item_page_bottom_ads_enabled(){
    return osc_get_preference('e_ads_item_page_bottom','classified');
}
function nc_osc_get_item_page_bottom_ads(){
    return osc_get_preference('ads_item_page_bottom','classified');
}
function nc_osc_footer_top_ads_enabled(){
    return osc_get_preference('e_ads_footer_top','classified');
}
function nc_osc_get_footer_top_ads(){
    return osc_get_preference('ads_footer_top','classified');
}
function nc_osc_get_front_map_or_slider(){
    return osc_get_preference('e_front_map_or_slider','classified');
}
function nc_osc_show_footer_about_us(){
    return osc_get_preference('e_about_us','classified');
}
function nc_osc_custom_css_enabled(){
    return osc_get_preference('e_custom_css','classified');
}
function nc_osc_get_custom_css(){
    return "<div><style scoped>".osc_get_preference('custom_css_text','classified')."</style></div>";
}
function nc_osc_custom_javascript_enabled(){
    return osc_get_preference('e_custom_javascript','classified');
}
function nc_osc_get_custom_javascript(){
    return osc_get_preference('custom_javascript_text','classified');
}


/**
* INSTALLING DATABASES
*/
if(!SellerRatings::newInstance()->checkTable()){
    SellerRatings::newInstance()->import('sql/seller_ratings.sql');
}
if(!WatchList::newInstance()->checkTable()){
    WatchList::newInstance()->import('sql/watchlist.sql');
}
if(!PaidAds::newInstance()->checkTable()){
    PaidAds::newInstance()->import('sql/paid-ads.sql');
}

if(!Subscriber::newInstance()->checkTable()){
    Subscriber::newInstance()->import('sql/subscriber.sql');
}

if(!ProfilePicture::newInstance()->checkTable()){
    Subscriber::newInstance()->import('sql/ppicture.sql');
}

/**
*   Function to run while installing theme
*/
function nc_osc_install(){
    //ncdb::newInstance();
}

/**
*   Function to run while uninstalling theme
*/
function nc_osc_uninstall(){
    
}
osc_add_hook('theme_activate','nc_osc_install');
osc_add_hook('theme_delete','nc_osc_uninstall');


/**
*   Function to Display Category Ads
*/

function popular_category_start(){
     $aCategory=array();
    while(osc_has_categories()){
        $iCategoryId = osc_category_id();
        $sCategoryName = osc_category_name();
        $iTotalListing = osc_category_total_items();
        $iParentId = get_parent_category_id($iCategoryId);
        $aCat = array('total_listing' => $iTotalListing,
                        'cat_name' => $sCategoryName,
                        'cat_id' => $iCategoryId,
                        'parent_id' => $iParentId);
        array_push($aCategory, $aCat);
    }
    return array_sort($aCategory,'total_listing',SORT_DESC);
}

/**
*   Selects top item
*/
function select_top_item($iCategoryId){
     $conn = getConnection();
     $query = "SELECT pk_i_id FROM %st_category WHERE fk_i_parent_id=".$iCategoryId;
     $iParentId =  $conn->osc_dbFetchResults($query, DB_TABLE_PREFIX);
     if(empty($iParentId)){
        return null;
     }
     $aPId=array();
     foreach($iParentId as $p_id){
        array_push($aPId,$p_id['pk_i_id']);
     }
     $aPId = implode(',', array_map('intval', $aPId));
     //return $pk_i_id;
     $sQuery = "SELECT pk_i_id FROM %st_item WHERE fk_i_category_id IN (".$aPId.")";
     $aCategories = $conn->osc_dbFetchResults($sQuery, DB_TABLE_PREFIX);  
     if(empty($aCategories)){
        return null;
     }
     $aPId=array();
     foreach($aCategories as $pk_id){
        array_push($aPId,$pk_id['pk_i_id']);
     }
     $aPId = implode(',', array_map('intval', $aPId));
     $sQuery="SELECT fk_i_item_id, SUM(i_num_views) AS TotalViews FROM %st_item_stats WHERE fk_i_item_id IN (".$aPId.") GROUP BY fk_i_item_id ORDER BY TotalViews DESC LIMIT 1";    
     $aResults=$conn->osc_dbFetchResults($sQuery, DB_TABLE_PREFIX);  
     if(empty($aResults)){
        return null;
     }
     return $aResults;
}


/**
*   Gets total number of item views
*/
function get_total_item_views($iCategoryId){
     $conn = getConnection();
     $sQuery = "SELECT pk_i_id FROM %st_category WHERE fk_i_parent_id=".$iCategoryId;
     $aParentId =  $conn->osc_dbFetchResults($sQuery, DB_TABLE_PREFIX);
     if(empty($aParentId)){
        return null;
     }
     $aPId=array();
     foreach($aParentId as $p_id){
        array_push($aPId,$p_id['pk_i_id']);
     }
     $aPId = implode(',', array_map('intval', $aPId));
     //return $pk_i_id;
     $sQuery = "SELECT pk_i_id FROM %st_item WHERE fk_i_category_id IN (".$aPId.")";
     $aCategories = $conn->osc_dbFetchResults($sQuery, DB_TABLE_PREFIX);  
     if(empty($aCategories)){
        return null;
     }
     $aPId=array();
     foreach($aCategories as $pk_id){
        array_push($aPId,$pk_id['pk_i_id']);
     }
     $aPId = implode(',', array_map('intval', $aPId));
     $sQuery="SELECT SUM(i_num_views) AS TotalViews FROM %st_item_stats WHERE fk_i_item_id IN (".$aPId.")";    
     $aResults=$conn->osc_dbFetchResults($sQuery, DB_TABLE_PREFIX);

     if(empty($aResults)){
        return null;
     }
     return $aResults;
}
/**
*   Sort Popular Categories
*/
function array_sort($aToSort, $sToSortOn, $order=SORT_ASC)
{
    $aNewArray = array();
    $aSortableArray = array();

    if (count($aToSort) > 0) {
        foreach ($aToSort as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $sToSortOn) {
                        $aSortableArray[$k] = $v2;
                    }
                }
            } else {
                $aSortableArray[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($aSortableArray);
            break;
            case SORT_DESC:
                arsort($aSortableArray);
            break;
        }

        foreach ($aSortableArray as $k => $v) {
            $aNewArray[$k] = $aToSort[$k];
        }
    }

    return $aNewArray;
}


function popular_ads_end(){
GLOBAL $stored_items;
   View::newInstance()->_exportVariableToView('items', $stored_items); //restore original item array
}

function get_total_listing_by_category($category_id){
    $aCategory = osc_get_category('id', $category_id);
    $parentCategory = osc_get_category('id', $aCategory['fk_i_parent_id']);
    osc_goto_first_category();
    while ( osc_has_categories() ) {
        if(osc_category_id()==$aCategory['fk_i_parent_id']){
            return osc_category_total_items();
        }
    }

}
function get_total_listing_by_parent($iCategoryId){
    $aCategory = osc_get_category('id', $iCategoryId);
    return($aCategory['i_num_items']);
    

}
function get_parent_category_name($iCategoryId){
    $aCategory = osc_get_category('id', $iCategoryId);
    $aParentCategory = osc_get_category('id', $aCategory['fk_i_parent_id']);
    return $aParentCategory ['s_name'];    

}
function get_category_name($iCategoryId){
    $aParentCategory = osc_get_category('id', $iCategoryId);
    return $aParentCategory ['s_name'];    
}
function get_parent_category_id($iCategoryId){
    $aCategory = osc_get_category('id', $iCategoryId);
    return $aCategory['fk_i_parent_id'];    

}
function get_parent_subcategories($iCategoryId){
    $aSubCategory=array();
    osc_goto_first_category();
    while(osc_has_categories()){
        if(osc_category_id()==$iCategoryId){
            if ( osc_count_subcategories() > 0 ) {
                while ( osc_has_subcategories() ) {
                    $aSubCat= array('name' => osc_category_name(),
                            'url' => osc_search_category_url());
                     array_push($aSubCategory, $aSubCat);
                }
            }
        }
        
    }
    return $aSubCategory;
}


/**
*   Redirect User to Dashboard after login
*/
osc_add_hook('after_login', 'userlogin' );
function userlogin(){
    osc_redirect_to( osc_user_dashboard_url() );
}


/**
*   Paypal Authentication
*/
function execute_paypal_auth($sUrl, $aPostData,$aCredentials) {
        $aHeader = array('Accept : application/json',
                        'Accept-language : en_US'
                        );
        $sUsername = $aCredentials['username'];
        $sPassword = $aCredentials['password'];
        
        $sCredentials = $sUsername.":".$sPassword;
        $curl = curl_init($sUrl); 
        curl_setopt($curl, CURLOPT_POST, true); 
        curl_setopt($curl, CURLOPT_USERPWD, $sCredentials);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $aHeader); 
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
        $aParams = $aPostData;
        curl_setopt($curl, CURLOPT_POSTFIELDS, $aParams); 
        //curl_setopt($curl, CURLOPT_VERBOSE, TRUE);
        $aResponse = curl_exec( $curl );
        
        if (empty($aResponse) && !curl_errno($curl)==0) {
            // some kind of an error happened
            $aResponse = "Error::".curl_error($curl).curl_errno($curl);
            curl_close($curl); // close cURL handler
        } else {
            $info = curl_getinfo($curl);
            curl_close($curl);
        }
        return $aResponse;
    }

/**
*   Post to Paypal
*/    
function execute_paypal_post($sUrl, $sPostData,$sAccessToken) {
        $aHeader = array('Content-Type : application/json',
                        'Authorization : Bearer '.$sAccessToken
                        );
        $curl = curl_init($sUrl); 
        curl_setopt($curl, CURLOPT_POST, true); 
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $aHeader); 
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
        $sParams = $sPostData;
        curl_setopt($curl, CURLOPT_POSTFIELDS, $sParams); 
        //curl_setopt($curl, CURLOPT_VERBOSE, TRUE);
        $aResponse = curl_exec( $curl );
        if (empty($aResponse) && !curl_errno($curl)==0) {
            // some kind of an error happened
            $aResponse= "Error::".curl_error($curl).curl_errno($curl);
            curl_close($curl); // close cURL handler
        } else {
            $info = curl_getinfo($curl);
            curl_close($curl); 
        }
        return $aResponse;
    } 
/**
*   Paypal Post through NVP
*/    
function execute_paypal_nvp_post($aPostData,$sUrl){
    $curl = curl_init($sUrl); 
    curl_setopt($curl, CURLOPT_POST, true); 
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($aPostData)); 
    $aResponse = curl_exec( $curl );
    if (empty($aResponse)) {
            // some kind of an error happened
        $aResponse = "Error::".curl_error($curl);
        curl_close($curl); // close cURL handler
    } else {
        $info = curl_getinfo($curl);
        curl_close($curl); // close cURL handler
    }
    $aNewResponse = array();
    parse_str($aResponse,$aNewResponse); // Break the NVP string to an array
    return $aNewResponse;
}      

function nc_osc_get_logged_user_ref_date(){
    $user = View::newInstance()->_get('_loggedUser');
    $d = $user['dt_reg_date'];
    return osc_format_date($d,'F j, Y');

} 
if (osc_is_web_user_logged_in()) {
    Preference::newInstance()->set('enabled_recaptcha_items', 0);
    Preference::newInstance()->set('recaptchaPubKey', '');
    Preference::newInstance()->set('recaptchaPrivKey', '');
}

/**
*   Add Items longitude and latitude, while adding or updating items for Google Maps
*/
function insert_longitude_latitude($aItemRef) {
        $iItemId = $aItemRef['pk_i_id'];
        $aItem = Item::newInstance()->findByPrimaryKey($iItemId);
        $sAddress = (isset($aItem['s_address']) ? $aItem['s_address'] : '');
        $sCity = (isset($aItem['s_city']) ? $aItem['s_city'] : '');
        $sRegion = (isset($aItem['s_region']) ? $aItem['s_region'] : '');
        $sCountry = (isset($aItem['s_country']) ? $aItem['s_country'] : '');
        $sAddress = sprintf('%s, %s, %s, %s', $sAddress, $sCity, $sRegion, $sCountry);
        $aResponse = osc_file_get_contents(sprintf('https://maps.googleapis.com/maps/api/geocode/json?address=%s', urlencode($sAddress)));
        $jsonResponse = json_decode($aResponse,true);
        $aLocation=$jsonResponse['results'][0]['geometry']['location'];
        if ($jsonResponse['status']=="OK") {
            ItemLocation::newInstance()->update (array('d_coord_lat' => $aLocation['lat']
                                                      ,'d_coord_long' => $aLocation['lng'])
                                                ,array('fk_i_item_id' => $iItemId));
        }
    }

    osc_add_hook('posted_item', 'insert_longitude_latitude');
    osc_add_hook('edited_item', 'insert_longitude_latitude');

    osc_add_hook('init','make_userlogin');

?>
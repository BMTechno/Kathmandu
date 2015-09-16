<?php
 require_once('../../../../oc-load.php');	
 require_once('../dao-class/paid-ads.class.php');
 require_once('../dao-class/subscriber.class.php');
 	if(isset($_POST['submit_type'])){
 		$settings =$_POST['submit_type']; 
 		switch($settings){
 			case	'social_url':
 				$facebook_check= Params::getParam('e_sb_facebook');
                $twitter_check = Params::getParam('e_sb_twitter');
                $instagram_check = Params::getParam('e_sb_instagram');
                $linkedin_check = Params::getParam('e_sb_linkedin');
                $google_check = Params::getParam('e_sb_google');
 				osc_set_preference('sb_facebook',Params::getParam('sb_facebook'),'classified');
                osc_set_preference('sb_twitter',Params::getParam('sb_twitter'),'classified');
                osc_set_preference('sb_instagram',Params::getParam('sb_instagram'),'classified');
                osc_set_preference('sb_linkedin',Params::getParam('sb_linkedin'),'classified');
                osc_set_preference('sb_google',Params::getParam('sb_google'),'classified');
                osc_set_preference('e_sb_facebook', ($facebook_check ? '1' : '0'), 'classified');
                osc_set_preference('e_sb_twitter', ($twitter_check ? '1' : '0'), 'classified');
                osc_set_preference('e_sb_instagram', ($instagram_check ? '1' : '0'), 'classified');
                osc_set_preference('e_sb_linkedin', ($linkedin_check ? '1' : '0'), 'classified');
                osc_set_preference('e_sb_google', ($google_check ? '1' : '0'), 'classified');
            	break;
               	
            case 'landing_popup':
            	$landing_popup_check = Params::getParam('e_landing_popup');
            	osc_set_preference('popup_head',Params::getParam('popup_head'),'classified');
                osc_set_preference('popup_body',Params::getParam('popup_body'),'classified');
                osc_set_preference('popup_foot',Params::getParam('popup_foot'),'classified');
                osc_set_preference('e_landing_popup',($landing_popup_check ? '1' : '0'),'classified');
                break;

            case 'facebook_login':
                $facebook_enable_check = Params::getParam('facebook_enable_status');
            	osc_set_preference('facebook_api_id',Params::getParam('facebook_api_id'),'classified');    
                osc_set_preference('facebook_api_secret',Params::getParam('facebook_api_secret'),'classified');
                osc_set_preference('connection',Params::getParam('connection'),'classified');
                osc_set_preference('e_facebook_enable_status',($facebook_enable_check ? '1' : '0'),'classified');
                break;

            case 'contact_us':
                $email_info = Params::getParam('email_info');
                $phone_info = Params::getParam('phone_info');
                $address_info = Params::getParam('address_info');
                osc_set_preference('email_info',$email_info,'classified');
                osc_set_preference('phone_info',$phone_info,'classified');
                osc_set_preference('address_info',$address_info,'classified');   
                break;
            case 'about_us':
                $about_us_heading = Params::getParam('about_us_heading');
                $about_us = Params::getParam('about_us');
                $e_about_us = Params::getParam('e_about_us');

                osc_set_preference('about_us_heading',$about_us_heading,'classified');
                osc_set_preference('about_us',$about_us,'classified');
                osc_set_Preference('e_about_us',$e_about_us,'classified');
                break;

            case 'home_slider':
                $enable_home_slider = Params::getParam('e_home_slider');    
                osc_set_preference('e_home_slider', ($enable_home_slider ? '1' : '0'), 'classified');
                break;

            case 'home_slider_item_add':
                $item_id = Params::getParam('home_slider_item_id');
                osc_set_preference('home_slider_item',$item_id,'classified');
                break;    

            case 'home_slider_item_check' :
                $item_id = Params::getParam('home_slider_item_id');
                $item = Item::newInstance()->findByPrimaryKey($item_id);
                if($item){
                    echo "TRUE";
                }else{
                    echo "FLASE";
                }
                break;    

            case 'home_slider_insert_item' :
                $item_id = Params::getParam('home_slider_item_id');
                $msg =  PaidAds::newInstance()->checkExists($item_id);
                if($msg){
                    echo "EXIST";
                } else{
                    PaidAds::newInstance()->insertPaidAds($item_id);
                    echo "ADDED";
                }
                break;
            case 'populate_home_slider' :
                $arr=PaidAds::newInstance()->selectPaidAdsData();
                $html="<table class='table'><thead><th>#</th><th>Title</th><th></th></thead>";
                foreach($arr as $ar){
                    $item = Item::newInstance()->findByPrimaryKey($ar['pk_paid_ads_id']);
                    $temp=array('id' => $item['pk_i_id'],
                                'title' => $item['s_title']);
                    $html=$html."<tr>";
                    $html=$html."<td>".$temp['id']."</td><td>".$temp['title']."</td>";
                    $html=$html."<td><a href='#' OnClick='remove_id(".$temp['id'].");' > Remove </a></td>";
                    $html=$html."</tr>";
                }
                $html=$html."</table>";
                echo $html;
                break;    
            case 'home_slider_remove_item' :
                $item_id=Params::getParam('home_slider_item_id');
                PaidAds::newInstance()->removeId($item_id);
                break; 
            case 'paypal_credentials' :
                $paypal_username = Params::getParam('paypal_username');
                $paypal_password = Params::getParam('paypal_password');
                $paypal_signature = Params::getParam('paypal_signature');
                $paypal_server_rest = Params:: getParam('paypal_server_rest');
                $paypal_server_classic = Params::getParam('paypal_server_classic');
                $paypal_client_id = Params:: getParam('paypal_client_id');
                $paypal_secret = Params:: getParam('paypal_secret');
                $paypal_status = Params::getParam('paypal_status');
                $paypal_server = Params::getParam('paypal_server');

                osc_set_preference('paypal_username',$paypal_username,'classified');
                osc_set_preference('paypal_password',$paypal_password,'classified');
                osc_set_preference('paypal_signature',$paypal_signature,'classified');
                osc_set_preference('paypal_server_rest',$paypal_server_rest,'classified');
                osc_set_preference('paypal_server_classic',$paypal_server_classic,'classified');
                osc_set_preference('paypal_client_id',$paypal_client_id,'classified'); 
                osc_set_preference('paypal_secret',$paypal_secret,'classified'); 
                osc_set_preference('paypal_status',$paypal_status,'classified'); 
                osc_set_preference('paypal_server',$paypal_server,'classified');
                break;
            case 'send_newsletter' :
                $subject = Params::getParam('newsletter_subject');
                $message=Params::getParam('newsletter_message');
                //$message = stripslashes($message) ;

                $message = str_replace('src="../', 'src="' . osc_base_url() . '/' , $message) ;
                $recipients = array();
                
                $recipients =  Subscriber::newInstance()->listAll();
                foreach($recipients as $user) {
                    $params = array(
                            'subject' => $subject
                            ,'to' => $user['subs_email']
                            ,'to_name' => osc_page_title()
                            ,'body' => $message
                            ,'alt_body' => strip_tags($message)
                            ,'add_bcc' => ''
                            ,'from' => 'donotreply@' . osc_get_domain()
                            ) ;

                osc_sendMail($params) ;
                //osc_add_flash_ok_message(__($user['subs_email'], 'nepcoders'),'admin');
                } 
                break;
            case 'payment_info' :
                $publish_fee_check =Params::getParam('publish_fee_check');
                $publish_cost = Params::getParam('publish_cost');
                $premium_fee_check = Params::getParam('premium_fee_check');
                $premium_cost = Params::getParam('premium_cost');
                $premium_days = Params::getParam('premium_days');
                $default_currency = Params::getParam('default_currency');

                osc_set_preference('publish_fee_check',$publish_fee_check,'classified');
                osc_set_preference('publish_cost',$publish_cost,'classified');
                osc_set_preference('premium_fee_check',$premium_fee_check,'classified');
                osc_set_preference('premium_cost', $premium_cost, 'classified');
                osc_set_preference('premium_days', $premium_days, 'classified');
                osc_set_preference('default_currency', $default_currency, 'classified');

                break;       

            case 'other_settings' :
                $e_post_ad_to_all = Params::getParam('e_post_ad_to_all');
                $e_recent_before_popular = Params::getParam('e_recent_before_popular');    
                $e_front_display_with_image = Params::getParam('e_front_display_with_image');
                $e_front_map_or_slider = Params::getParam('e_front_map_or_slider');
                $e_custom_css = Params::getParam('e_custom_css');
                $custom_css_text = Params::getParam('custom_css_text');
                $e_custom_javascript = Params::getParam('e_custom_javascript');
                $custom_javascript_text = trim(Params::getParam('custom_javascript_text', false, false, false));

                
                osc_set_preference('e_post_ad_to_all',$e_post_ad_to_all,'classified');
                osc_set_preference('e_recent_before_popular',$e_recent_before_popular,'classified');
                osc_set_preference('e_front_display_with_image',$e_front_display_with_image,'classified');
                osc_set_preference('e_front_map_or_slider',$e_front_map_or_slider,'classified');
                osc_set_preference('e_custom_css',$e_custom_css,'classified');
                osc_set_preference('custom_css_text', $custom_css_text,'classified');
                osc_set_preference('e_custom_javascript',$e_custom_javascript,'classified');
                osc_set_preference('custom_javascript_text', $custom_javascript_text,'classified');

                break;

            case 'premium_ads_settings' :
                $e_premium_ads_row = Params::getParam('e_premium_ads_row');
                $select_premium_ads_row = Params::getParam('select_premium_ads_row');
                $select_premium_ads_column = Params::getParam('select_premium_ads_column');  

                osc_set_preference('e_premium_ads_row',$e_premium_ads_row,'classified');
                osc_set_preference('select_premium_ads_row', $select_premium_ads_row, 'classified');
                osc_set_preference('select_premium_ads_column', $select_premium_ads_column, 'classified');

                break;  

            case 'ad_sense_information' :
                $e_ads_front_page_below_slider = Params::getParam('e_ads_front_page_below_slider');
                $e_ads_search_result_below_header = Params::getParam('e_ads_search_result_below_header');
                $e_ads_item_page_top = Params::getParam('e_ads_item_page_top');
                $e_ads_item_page_bottom = Params::getParam('e_ads_item_page_bottom');
                $e_ads_footer_top = Params::getParam('e_ads_footer_top');
                $ads_front_page_below_slider = trim(Params::getParam('ads_front_page_below_slider', false, false, false));
                $ads_search_result_below_header = trim(Params::getParam('ads_search_result_below_header', false, false, false));
                $ads_item_page_top = trim(Params::getParam('ads_item_page_top', false, false, false));
                $ads_item_page_bottom = trim(Params::getParam('ads_item_page_bottom', false, false, false));
                $ads_footer_top = trim(Params::getParam('ads_footer_top', false, false, false));


                osc_set_preference('e_ads_front_page_below_slider',$e_ads_front_page_below_slider,'classified');
                osc_set_preference('e_ads_search_result_below_header',$e_ads_search_result_below_header,'classified');
                osc_set_preference('e_ads_item_page_top',$e_ads_item_page_top,'classified');
                osc_set_preference('e_ads_item_page_bottom',$e_ads_item_page_bottom,'classified');
                osc_set_preference('e_ads_footer_top', $e_ads_footer_top, 'classified');
                osc_set_preference('ads_front_page_below_slider',$ads_front_page_below_slider,'classified');
                osc_set_preference('ads_search_result_below_header',$ads_search_result_below_header,'classified');
                osc_set_preference('ads_item_page_top',$ads_item_page_top,'classified');
                osc_set_preference('ads_item_page_bottom',$ads_item_page_bottom,'classified');
                osc_set_preference('ads_footer_top', $ads_footer_top, 'classified');

                break;

                
        }
    }        
?>
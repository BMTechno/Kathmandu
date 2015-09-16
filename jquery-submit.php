<?php
 require_once('../../../../oc-load.php');	
 require_once('../dao-class/paid-ads.class.php');
 require_once('../includes/helpers.php');
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

            case 'facebppk_login':
            	var_dump($_POST);    
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
                osc_set_preference('about_us_heading',$about_us_heading,'classified');
                osc_set_preference('about_us',$about_us,'classified');
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
                $paypal_server = Params:: getParam('paypal_server');      
                osc_set_preference('paypal_username',$paypal_username,'classified');
                osc_set_preference('paypal_password',$paypal_password,'classified');
                osc_set_preference('paypal_signature',$paypal_signature,'classified');
                osc_set_preference('paypal_server',$paypal_server,'classified'); 
            case 'send_newsletter' :
                $subject = Params::getParam('newsletter_subject');
                $message = stripslashes(Params::getParam('newsletter_message')) ;
                $message = str_replace('src="../', 'src="' . osc_base_url() . '/' , $message) ;
                $recipients = array();
                $recipients = array_merge ($recipients, User::newInstance()->listAll());
                foreach($recipients as $user) {
                    $params = array(
                            'subject' => $subject
                            ,'to' => $user['s_email']
                            ,'to_name' => osc_page_title()
                            ,'body' => $message
                            ,'alt_body' => strip_tags($message)
                            ,'add_bcc' => ''
                            ,'from' => 'donotreply@' . osc_get_domain()
                            ) ;

                osc_sendMail($params) ;
                osc_add_flash_ok_message(__('Your email has been sent', 'nepcoders'),'admin');
                }    
        }
    }        
?>
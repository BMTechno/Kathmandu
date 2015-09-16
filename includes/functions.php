<?php
$action = Params::getParam('nc_action');
switch($action){
	case("FOLLOW"):
		if(osc_is_web_user_logged_in()){
			$user_id=osc_logged_user_id();
			$seller_id=Params::getParam("seller-id");
			$return_url = Params::getParam("return_url");
			nc_osc_insert_follow($user_id,$seller_id);
			header('Location:'.htmlspecialchars_decode($return_url));
		}
		break;
	case("UNFOLLOW"):
		if(osc_is_web_user_logged_in()){
			$user_id=osc_logged_user_id();
			$seller_id = Params::getParam("seller-id");
			$return_url = Params::getParam("return_url");
			nc_osc_delete_follow($user_id,$seller_id);
			header('Location:'.htmlspecialchars_decode($return_url));
		}
		break;
	case("ADD-WATCHLIST"):
		if(osc_is_web_user_logged_in()){
			$user_id=osc_logged_user_id();
			$item_id=Params::getParam("item_id");
			$return_url = Params::getParam("return_url");
			nc_osc_add_watchllist($user_id,$item_id);
			$aItem=Item::newInstance()->findByPrimaryKey($item_id);
			$item_title=$aItem['s_title'];
			osc_add_flash_ok_message($item_title." is added to your watch list.");
			header('Location:'.htmlspecialchars_decode($return_url));
		}
		break;
	case("REMOVE-WATCHLIST"):
		if(osc_is_web_user_logged_in()){
			$user_id=osc_logged_user_id();
			$item_id=Params::getParam("item_id");
			$return_url = Params::getParam("return_url");
			nc_osc_remove_watchlist($user_id,$item_id);
			header('Location:'.htmlspecialchars_decode($return_url));
		}	
		break;
}
?>
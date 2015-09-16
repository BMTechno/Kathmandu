<?php
/**
 * Classified Ajax Subscription page
 *
 * @package Osclass
 * @subpackage Classified
 */
?>
<?php
 require_once('../../../oc-load.php');	
 require_once('dao-class/subscriber.class.php');
 require_once('includes/helpers.php');
 	if(isset($_POST['submit_type'])){
 		$settings =$_POST['submit_type']; 
 		switch($settings){
 			case 	'subscribe_user':
 					$email=Params::getParam('subs_email');
 					if(Subscriber::newInstance()->checkEmail($email)){
 						echo "Already Subscribed";
 					}else{
 						Subscriber::newInstance()->SubscribeUser($email);
 						echo "Email Subscribed.";
 					}
 			break;
 		}
 	}
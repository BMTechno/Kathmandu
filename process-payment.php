<?php
/**
 * Classified Theme Paypal Payment Process
 *
 * @package Osclass
 * @subpackage Classified
 */

require_once('../../../oc-load.php');
require_once('functions.php');
     
  if(isset($_POST['payment-button'])){
       $sCreditCardNumber = Params::getParam('credit-card-number');
       $sCreditCardType ="visa";
       $iExpiryMonth = Params::getParam('expiry-month');
       $iExpiryYear = Params::getParam('expiry-year');
       $iCvv = Params::getParam('cvv');
       $iItemId = Params::getParam('itemId');
       $sUserFullName = Params::getParam('user-fullname');
       $sCurrency = osc_get_preference('default_currency', 'classified');
       $sPaypalUsername = osc_get_preference('paypal_client_id', 'classified');
       $sPaypalPassword = osc_get_preference('paypal_secret', 'classified');
       $sPaypalServer = osc_get_preference('paypal_server_rest', 'classified');
       $iPremiumCost = osc_get_preference('premium_cost', 'classified');
       $aCredentials = array('username' => $sPaypalUsername,
                            'password' => $sPaypalPassword);
       $item = Item::newInstance()->findByPrimaryKey($iItemId);
       
       if ($item['b_premium']==1) {
          osc_add_flash_error_message( _m('Seems like this item is premium already'));
          osc_redirect_to(osc_base_url()); 
          exit;
       }
       
       $result=execute_paypal_auth($sPaypalServer."oauth2/token", 'grant_type=client_credentials',$aCredentials);
       $result_array = json_decode($result);
       
       if(isset($result_array->access_token)){
          $json = array('intent' => 'sale',
                        'payer' => array('payment_method' => 'credit_card',
                                         'funding_instruments' => array(array('credit_card' => array('number' => $sCreditCardNumber,
                                                                                                'type'  => $sCreditCardType,
                                                                                                'expire_month' => $iExpiryMonth,
                                                                                                'expire_year' => $iExpiryYear,
                                                                                                'cvv2' => $iCvv,
                                                                                                'first_name' => $sUserFullName,
                                                                                                'last_name' => $sUserFullName
                                                                                                )
                                                                        ))

                                        ),
                        'transactions' => array(array('amount' => array('total' => $iPremiumCost,
                                                                  'currency' => $sCurrency 
                                                                  ),
                                                'description' => 'Premium Item Payment'                   
                                                ))
            );
            $json=json_encode($json);
            $result = execute_paypal_post($sPaypalServer."payments/payment", $json,$result_array->access_token);
            $result_array = json_decode($result);
            if(isset($result_array->state)){
              if($result_array->state=="approved"){
                //Mark this item as premium
                $mItems  = new ItemActions( true );
                if ($mItems->premium($iItemId, 1) ) {
                      osc_add_flash_ok_message( _m('Changes have been applied'));
                       osc_redirect_to(osc_route_url('payment-thankyou', array('paymentId' => $result_array->id))); 
                } else {
                      osc_add_flash_error_message( _m('Seems like item is premium already'));
                       osc_redirect_to(osc_route_url('payment-publish', array('itemId' => $iItemId))); 
                }
                //Redirect to thank you page
              }else{
                osc_add_flash_ok_message( _m('Changes have been applied'));
                 osc_redirect_to(osc_route_url('payment-publish', array('itemId' => $iItemId))); 
              
              }
            }elseif(isset($result_array->name)){
              osc_add_flash_ok_message( _m($result_array->name));
               osc_redirect_to(osc_route_url('payment-publish', array('itemId' => $iItemId))); 

            }
       }
  }       
if(isset($_POST['paypal-payment'])){
  $item_title = Params::getParam('item_title');
  $premium_cost = Params::getParam('premium_cost');
  $paypal_api_server = osc_get_preference('paypal_server_classic', 'classified');
  $paypal_server = osc_get_preference('paypal_server', 'classified');
  $username = osc_get_preference('paypal_username', 'classified');
  $password = osc_get_preference('paypal_password', 'classified');
  $signature = osc_get_preference('paypal_signature', 'classified');
  $currency = osc_get_preference('default_currency', 'classified');
  $id = Params::getParam('itemId');
  $post_data = array(
              'USER' => $username,
              'PWD' => $password,
              'SIGNATURE' => $signature,
              'VERSION' => '93',
              'PAYMENTREQUEST_0_PAYMENTACTION' => 'SALE',
              'PAYMENTREQUEST_0_AMT' => $premium_cost,
              'PAYMENTREQUEST_0_ITEMAMT' => $premium_cost,
              'PAYMENTREQUEST_0_CURRENCYCODE' => $currency,
              'PAYMENTREQUEST_0_DESC' => 'Premium payment for '.$item_title,
              'METHOD' => 'SetExpressCheckout',
              'RETURNURL' => osc_route_url('payment-return', array('itemId' => $id)),
              'CANCELURL' => osc_route_url('payment-cancel', array('itemId' => $id)),
              'L_PAYMENTREQUEST_0_AMT0' => $premium_cost,
              'L_PAYMENTREQUEST_0_QTY0' => 1,
              'L_PAYMENTREQUEST_0_NAME0' => 'Premium payment for '.$item_title
              );
  $response=execute_paypal_nvp_post($post_data,$paypal_api_server);
  if($response['ACK']=='Success'){
    $token=$response['TOKEN'];
    header('Location:'. $paypal_server .'cgi-bin/webscr?cmd=_express-checkout&token='.$token);

  }elseif($response['ACK']=='Failure'){
     osc_add_flash_error_message( _m($response['L_LONGMESSAGE0']));
    osc_redirect_to(osc_route_url('payment-publish', array('itemId' => $id))); 
  }
}
?>
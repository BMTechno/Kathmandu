<?php
//CURRENCY ARRAY
$currencyCodes=array('AUD'=>'Australian Dollar',
                    'BRL'=>'Brazilian Real',
                    'CAD'=>'Canadian Dollar',
                    'CZK'=>'Czech Koruna',
                    'DKK'=>'Danish Krone',
                    'EUR'=>'Euro',
                    'HKD'=>'Hong Kong Dollar',
                    'HUF'=>'Hungarian Forint',
                    'ILS'=>'Israeli New Sheqel',
                    'JPY'=>'Japanese Yen',
                    'MYR'=>'Malaysian Ringgit',
                    'MXN'=>'Mexican Peso',
                    'NOK'=>'Norwegian Krone',
                    'NZD'=>'Norwegian Krone',
                    'PHP'=>'Philippine Peso',
                    'PLN'=>'Polish Zloty',
                    'GBP'=>'Pound Sterling',
                    'SGD'=>'Singapore Dolla',
                    'SEK'=>'Swedish Krona',
                    'CHF'=>'Swiss Franc',
                    'TWD'=>'Taiwan New Dollar',
                    'THB'=>'Thai Baht',
                    'TRY'=>'Turkish Lira',
                    'USD'=>'USD');

?>
<div class="alert-box" id="payment_alert"></div>
<h1>Payment Settings</d1>
  <table class="table">
  <tr>
    <td>
      <label for="publish-fee-check">Item Publish Fee</label>
    </td>
    <td>  
      <input type="checkbox" name="publish_fee_check" value="1" <?php echo (osc_get_preference('publish_fee_check', 'classified') ? 'checked' : ''); ?>> Pay per post ads 
    </td>
  </tr>
  <tr>
    <td>
      <label for="publish_cost">Default Publish cost</label>
    </td>
    <td>
      <input type="text" class="form-control" id="publish_cost" name="publish_cost" value="<?php echo osc_get_preference('publish_cost','classified');?>" >
    </td>
  </tr>
  <tr>
    <td>
      <label for="premium-fee-check">Premium Ads</label>
    </td>
    <td>
      <input type="checkbox" name="premium_fee_check" value="1" <?php echo (osc_get_preference('premium_fee_check', 'classified') ? 'checked' : ''); ?>> Allow Premium ads 
    </td>
  </tr>
  <tr>
    <td>
      <label for="premium_cost">Default Premium cost</label>
    </td>
    <td>
      <input type="text" class="form-control" id="premium_cost" name="premium_cost" value="<?php echo osc_get_preference('premium_cost','classified');?>" >
    </td>
  </tr>
  <tr>
    <td>
      <label for="premium_days">Premium Days</label>
    </td>
    <td>
      <input type="text" class="form-control" id="premium_days" name="premium_days" value="<?php echo osc_get_preference('premium_days','classified');?>" >
    </td>
  </tr>
  <tr>
    <td>
      <label for="default_currency">Default Currency</label>
    </td>
    <td>
      <select class="form-control" id="default_currency" name="default_currency" >
        <?php
          $default_currency=osc_get_preference('default_currency','classified');
          foreach($currencyCodes as $code => $name){
            $selected=null;
            if($default_currency==$code){
              $selected="selected";
            }
            echo "<option name=".$code." ".$selected." "." id=".$code." value=".$code.">".$name."</option>";
          }
        ?>
      </select>
    </td>  
  </tr>
  </table>
  <div class="submit-data" id="add-payment-imformation" type="button" > Submit</div>
<h1>Paypal Information</h1>
<table class="table">
  <tr>
      <td>
        Paypal API Username
      </td>
      <td>
        <input type="text" id="paypal_username" name="paypal_username" value="<?php echo osc_esc_html( osc_get_preference('paypal_username', 'classified') ); ?>" placeholder="Enter Username">
      </td>
  </tr>
  <tr>
      <td>
        Paypal API Password
      </td>
      <td>
        <input type="text" id="paypal_password" name="paypal_password" value="<?php echo osc_esc_html( osc_get_preference('paypal_password', 'classified') ); ?>" placeholder="Enter Password">
      </td>
  </tr>
  <tr>
      <td>
        Signature
      </td>
      <td>
        <input type="text" id="paypal_signature" name="paypal_signature" value="<?php echo osc_esc_html( osc_get_preference('paypal_signature', 'classified') ); ?>" placeholder="Enter Signature">
      </td>
  </tr>
  <tr>
      <td>
        Paypal API Server REST API
      </td>
      <td>
        <input type="text" id="paypal_server_rest" name="paypal_server_rest" value="<?php echo osc_esc_html( osc_get_preference('paypal_server_rest', 'classified') ); ?>" placeholder="Paypal REST API Server">
      </td>
  </tr>
  <tr>
      <td>
        Paypal API Server Classic API
      </td>
      <td>
        <input type="text" id="paypal_server_classic" name="paypal_server_classic" value="<?php echo osc_esc_html( osc_get_preference('paypal_server_classic', 'classified') ); ?>" placeholder="Paypal Classic API Server">
      </td>
  </tr>
  <tr>
      <td>
        Paypal Client ID
      </td>
      <td>
        <input type="text" id="paypal_client_id" name="paypal_client_id" value="<?php echo osc_esc_html( osc_get_preference('paypal_client_id', 'classified') ); ?>" placeholder="Paypal Clent ID">
      </td>
  </tr>
  <tr>
      <td>
        Paypal Client Secret
      </td>
      <td>
        <input type="text" id="paypal_secret" name="paypal_secret" value="<?php echo osc_esc_html( osc_get_preference('paypal_secret', 'classified') ); ?>" placeholder="Paypal Client Secret">
      </td>
  </tr>
  <tr>
      <td>
        Paypal Server
      </td>
      <td>
        <input type="text" id="paypal_server" name="paypal_server" value="<?php echo osc_esc_html( osc_get_preference('paypal_server', 'classified') ); ?>" placeholder="Paypal Server">
      </td>
  </tr>
</table>
<a href="javascript:void(0);" onclick="Verify_Paypal_API();"><b style="color:#FFFFFF !important;background-color:#000000;padding:5px;">VERIFY API</b></a>
<div id="verification_msg"></div>
      <input type="checkbox" name="paypal_status" id="paypal_status" value="1" <?php echo (osc_get_preference('paypal_status', 'classified') ? 'checked' : ''); ?>> Enable Paypal
    </label>
   <div class="submit-data" id="add-paypal-credentials" type="button" > Submit</div>

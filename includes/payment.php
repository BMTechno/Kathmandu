<?php
$item = Item::newInstance()->findByPrimaryKey(Params::getParam('itemId'));       
       if ($item['b_premium']==1) {
          osc_add_flash_error_message( _m('Seems like this item is premium already'));
          osc_redirect_to(osc_user_dashboard_url() ); 
       }  
?>
<div class="container">
  <div style="float:left; width: 50%;">
      <label style="font-weight: bold;"><?php _e("Item's title", 'classified'); ?>:</label> <?php echo $item['s_title']; ?><br/>
      <label style="font-weight: bold;"><?php _e("Premium enhancement price", 'classified'); ?>:</label> <?php echo osc_get_preference('premium_cost','classified'); ?><br/>
  </div>
  
        <input type="hidden" name="itemId" value="<?php echo Params::getParam('itemId');?>"/>
        <div>
        <div style="margin-top:20px;" class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <p class="secure-payment">This is a secure 128-bit SSL Encrypted payment. You're safe.</p>
            </div>
        </div>                          
        <div style="margin-top:20px;" class="row">
            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 col-lg-offset-1">
                <span>Credit Card (Visa, Mastercard)</span></p>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <img class="img-responsive" src="<?php echo osc_base_url().'oc-content/themes/classified/images/visa.png'; ?>" alt="Visa Card">
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 col-lg-offset-2">
                <p class="credit-card">PayPal</p>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12">
              <form name="paypal-payment" action="<?php echo osc_current_web_theme_url( 'process-payment.php' );?>" method="post">
                <input type="hidden" name="itemId" value="<?php echo Params::getParam('itemId');?>"/>
                <input type="hidden" name="premium_cost" value="<?php echo osc_get_preference('premium_cost','classified'); ?>"/>
                <input type="hidden" name="item_title" value="<?php echo $item['s_title']; ?>"/>
                <button type="submit" name="paypal-payment">
                  <img class="img-responsive" src="<?php echo osc_base_url().'oc-content/themes/classified/images/paypal.png'; ?>" alt="Visa Card">
                </button>
              </form>  
            </div>
        </div>
  
        <form name="payment-form" action="<?php echo osc_current_web_theme_url( 'process-payment.php' );?>" method="post">
          <input type="hidden" name="itemId" value="<?php echo Params::getParam('itemId');?>"/>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                    
                <div  style="margin-top:20px;" class="form-group">
                        <label class="credit-card" for="usr">Card Number<sub>The 16 digits on front of your card</sub></label>
                        <input type="text" class="form-control user-field" name="credit-card-number" id="credit-card-number">
                </div>
            </div>
        </div>
        <div class="row">
            <div  style="margin-top:20px;" class="form-group text-left">           
            </div>
            <div class="form-group">
                  <div class="col-sm-12">
                    <label class="text-left credit-card" for="usr">Expiration Date</label>
                    <div class="row">
                      <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12">                   
                       <select class="form-control col-sm-3" name="expiry-month" id="expiry-month">  
                          <option>Month</option>
                          <option value="01">Jan (01)</option>
                          <option value="02">Feb (02)</option>
                          <option value="03">Mar (03)</option>
                          <option value="04">Apr (04)</option>
                          <option value="05">May (05)</option>
                          <option value="06">June (06)</option>
                          <option value="07">July (07)</option>
                          <option value="08">Aug (08)</option>
                          <option value="09">Sep (09)</option>
                          <option value="10">Oct (10)</option>
                          <option value="11">Nov (11)</option>
                          <option value="12">Dec (12)</option>
                        </select>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12">
                        <select class="form-control col-sm-3" name="expiry-year" id="expiry-year">
                          <option value="2013">2013</option>
                          <option value="2014">2014</option>
                          <option value="2015">2015</option>
                          <option value="2016">2016</option>
                          <option value="2017">2017</option>
                          <option value="2018">2018</option>
                          <option value="2019">2019</option>
                          <option value="2020">2020</option>
                          <option value="2021">2021</option>
                          <option value="2022">2022</option>
                          <option value="2023">2023</option>
                        </select>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12">
                        <p style="margin-top:-30px;" class="credit-card">CVV2/CVC2</p>
                        <input type="text" class="form-control" name="cvv" id="cvv" >
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12">
                        <p class="credit-card">The last 3 digits displayed on the back of your card</p>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="form-group">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <label class="credit-card" for="usr">Full Name on a Card</label><br/>
                <input type="text" class="form-control" id="user-fullname" name="user-fullname">
              </div>  
            </div>
        </div><br/> 
        <div class="row"> 
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">                   
                <p class="footer-payment">You will be charged <?php echo osc_get_preference('premium_cost','classified')." "; ?><?php echo osc_get_preference('default_currency','classified'); ?></p>
            </div>
        </div>
        </div><br/>
        <div class="row"> 
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">                   
                    <button type="submit" name="payment-button" class="btn btn-warning btn-lg">Complete Transaction</button>
            </div>
        </div> 
        </form>                     
    </div>
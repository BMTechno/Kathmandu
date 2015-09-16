var paypal_verified=false;
var facebook_verified=false;
$(document).ready(function(e) {
  
  populateHomeSliderItem();
  
  $('#submit-social-url-data').click(function(event) {//user clicks on button
         $("html, body").addClass("loading");
        var site_url=$('input[name=site_url]').val();
        site_url=site_url+"oc-content/themes/classified/admin/jquery-submit.php";   
        var FormData = {
            'submit_type'               :'social_url',
            'sb_facebook'              : $('input[name=sb_facebook]').val(),
            'sb_twitter'             : $('input[name=sb_twitter]').val(),
            'sb_instagram'    : $('input[name=sb_instagram]').val(),
            'sb_linkedin'    : $('input[name=sb_linkedin]').val(),
            'sb_google'    : $('input[name=sb_google]').val(),
            'e_sb_facebook'              : $('input[name=e_sb_facebook]:checked').val(),
            'e_sb_twitter'             : $('input[name=e_sb_twitter]:checked').val(),
            'e_sb_instagram'    : $('input[name=e_sb_instagram]:checked').val(),
            'e_sb_linkedin'    : $('input[name=e_sb_linkedin]:checked').val(),
            'e_sb_google'    : $('input[name=e_sb_google]:checked').val()
          };
          runAjax(FormData,site_url,'social');
    });

  $('#submit-landing-popup-data').click(function(event) {//user clicks on button
         $("html, body").addClass("loading");  
         var site_url=$('input[name=site_url]').val();
        site_url=site_url+"oc-content/themes/classified/admin/jquery-submit.php";   
        var FormData = {
            'submit_type'               :'landing_popup',
            'e_landing_popup'              : $('input[name=e_landing_popup]:checked').val(),
            'popup_head'             : $('input[name=popup_head]').val(),
            'popup_body'    : $('textarea[name=popup_body]').val(),
            'popup_foot'    : $('input[name=popup_foot]').val(),
          };
          runAjax(FormData,site_url,'landing');
    });


  $('#submit-facebook-data').click(function(event) {//user clicks on button
         $("html, body").addClass("loading");  
         var site_url=$('input[name=site_url]').val();
          site_url=site_url+"oc-content/themes/classified/admin/jquery-submit.php";   
         $.when(Verify_Facebook_API()).done(function(event){
          if(window.facebook_verified){
          var FormData = {
            'submit_type'               :'facebook_login',
            'facebook_api_id'              : $('input[name=facebook_api_id]').val(),
            'facebook_api_secret'             : $('input[name=facebook_api_secret]').val(),
            'e_facebook_enable_status'    : $('input[name=e_facebook_enable_status]:checked').val(),
            'connection'    : $('input[name=connection]').val(),
          };
          runAjax(FormData,site_url,'facebook');
        }
      });
    });

    $('#submit-contact-us-data').click(function(event) {//user clicks on button
         $("html, body").addClass("loading");  
         var site_url=$('input[name=site_url]').val();
        site_url=site_url+"oc-content/themes/classified/admin/jquery-submit.php";   
        var FormData = {
            'submit_type'               :'contact_us',
            'email_info'              : $('input[name=email_info]').val(),
            'phone_info'             : $('input[name=phone_info]').val(),
            'address_info'    : $('input[name=address_info]').val()
          };
          runAjax(FormData,site_url,'contact');
    });

    $('#submit-about-us-data').click(function(event) {//user clicks on button
         $("html, body").addClass("loading");  
         var site_url=$('input[name=site_url]').val();
        site_url=site_url+"oc-content/themes/classified/admin/jquery-submit.php";   
        var FormData = {
            'submit_type'               :'about_us',
            'about_us_heading'              : $('input[name=about_us_heading]').val(),
            'e_about_us'    : $('input[name=e_about_us]:checked').val(),
            'about_us'             : $('textarea[name=about_us]').val()
          };
          runAjax(FormData,site_url,'about');
    });

    $('#submit-home-slider-data').click(function(event) {//user clicks on button
         $("html, body").addClass("loading");  
         var site_url=$('input[name=site_url]').val();
        site_url=site_url+"oc-content/themes/classified/admin/jquery-submit.php";   
        var FormData = {
            'submit_type'               :'home_slider',
            'e_home_slider'              : $('input[name=e_home_slider]:checked').val(),
          };
          runAjax(FormData,site_url,'slider');
    });
     $('#add-home-slider-item').click(function(event) {//user clicks on button
         $("html, body").addClass("loading");  
         var site_url=$('input[name=site_url]').val();
         var item_id = $('select[name=HomeSliderSelect]').val();
        site_url=site_url+"oc-content/themes/classified/admin/jquery-submit.php";   
          var FormData = {
            'submit_type'               :'home_slider_item_check',
            'home_slider_item_id'              : item_id
          };

          var msg=checkItemExist(FormData,site_url);
          
          $("html,body").removeClass("loading");
          
    });
     $('#add-paypal-credentials').click(function(event){
        $("html, body").addClass("loading");  
        $.when(Verify_Paypal_API()).done(function(event){
          if(window.paypal_verified){
            var paypal_username=$('input[name=paypal_username]').val();
            var paypal_password=$('input[name=paypal_password]').val();
            var paypal_signature=$('input[name=paypal_signature]').val();
            var paypal_server_rest=$('input[name=paypal_server_rest]').val();
            var paypal_server_classic=$('input[name=paypal_server_classic]').val();
            var paypal_client_id=$('input[name=paypal_client_id]').val();
            var paypal_secret=$('input[name=paypal_secret]').val();
            var paypal_status=$('input[name=paypal_status]:checked').val();
            var site_url=$('input[name=site_url]').val();
            var paypal_server = $('input[name=paypal_server').val();
            site_url=site_url+"oc-content/themes/classified/admin/jquery-submit.php";   
            var FormData ={
                'paypal_username'    : paypal_username,
                'paypal_password'     : paypal_password,
                'paypal_signature': paypal_signature,
                'paypal_server_rest' :paypal_server_rest,
                'paypal_server_classic' :paypal_server_classic,
                'paypal_client_id' :paypal_client_id,
                'paypal_secret' :paypal_secret,
                'paypal_status' :paypal_status,
                'paypal_server' :paypal_server,
                'submit_type': 'paypal_credentials'
                
            };
            runAjax(FormData,site_url,'paypal');
            console.log(FormData);
          }
        });

     });
     $('#send-newsletter').click(function(event){
          $("html, body").addClass("loading");
          var newsletter_subject =$('input[name=newsletter_subject]').val();
          var newsletter_message = tinyMCE.get('newsletter_message').getContent();
          var FormData = {
              'submit_type' :'send_newsletter',
              'newsletter_subject' : newsletter_subject,
              'newsletter_message' : newsletter_message
          };
          console.log(newsletter_message);
          var site_url=$('input[name=site_url]').val();
          site_url=site_url+"oc-content/themes/classified/admin/jquery-submit.php";   
          runAjax(FormData,site_url,'newsletter');
     });
     
     $('#add-payment-imformation').click(function(event){
        $("html, body").addClass("loading");
        var error_msg=null;
        $('#payment_alert').html('');
        $('#payment_alert').removeClass('error');
        $('#payment_alert').removeClass('success');
        publish_fee_check = $('input[name=publish_fee_check]:checked').val();
        publish_cost = $('input[name=publish_cost]').val();
        premium_fee_check =$('input[name=premium_fee_check]:checked').val();
        premium_cost = $('input[name=premium_cost]').val();
        premium_days = $('input[name=premium_days]').val();
        default_currency =$('select[name=default_currency]').val();
        console.log(default_currency);
        if(publish_fee_check == 1){
          if($.isNumeric(publish_cost)== false){
            error_msg ="</br> Pubish Cost is not numeric."
          }
        }
        if(premium_fee_check == 1){
          if($.isNumeric(premium_cost)== false){
            error_msg = error_msg+"</br> Premium Cost is not numeric."
          }
        }
        if($.isNumeric(premium_days) == false){
          error_msg=error_msg+"</br> Premium days is not numeric."
        }
        if(error_msg!=null){
          $('#payment_alert').addClass('error');
          $('#payment_alert').html('<span> ERROR </span>'+error_msg);
          $("html, body").removeClass("loading");
          return;
        }
        var FormData = {
              'submit_type' : 'payment_info',
              'publish_fee_check' : publish_fee_check,
              'publish_cost' : publish_cost,
              'premium_fee_check' : premium_fee_check,
              'premium_cost' : premium_cost,
              'premium_days' : premium_days,
              'default_currency' : default_currency
          };
          var site_url=$('input[name=site_url]').val();
          site_url=site_url+"oc-content/themes/classified/admin/jquery-submit.php";   
          runAjax(FormData,site_url,'payment');
     });

    $('#submit-other-settings-data').click(function(event){
        $("html, body").addClass("loading");
        e_post_ad_to_all = $('input[name=e_post_ad_to_all]:checked').val();
        e_recent_before_popular = $('input[name=e_recent_before_popular]:checked').val();
        e_front_display_with_image = $('input[name=e_front_display_with_image]:checked').val();
        e_front_map_or_slider = $('input[name=e_front_map_or_slider]:checked').val();
        e_custom_css = $('input[name=e_custom_css]:checked').val();
        custom_css_text = $('textarea[name=custom_css_text').val();
        e_custom_javascript = $('input[name=e_custom_javascript]:checked').val();
        custom_javascript_text = $('textarea[name=custom_javascript_text').val();
        var FormData = {
          'submit_type' : 'other_settings',
          'e_post_ad_to_all' : e_post_ad_to_all,
          'e_recent_before_popular' : e_recent_before_popular,
          'e_front_display_with_image' : e_front_display_with_image,
          'e_front_map_or_slider' : e_front_map_or_slider,
          'e_custom_css' : e_custom_css,
          'custom_css_text' : custom_css_text,
          'e_custom_javascript' : e_custom_javascript,
          'custom_javascript_text' : custom_javascript_text
        };
        var site_url=$('input[name=site_url]').val();
        site_url=site_url+"oc-content/themes/classified/admin/jquery-submit.php";   
        runAjax(FormData,site_url,'other_settings');
    });

    $('#submit-premium-ads-settings').click(function(event){
      $("html, body").addClass("loading");
      e_premium_ads_row = $('input[name=e_premium_ads_row]:checked').val();
      select_premium_ads_row = $('#select_premium_ads_row').val();
      select_premium_ads_column = $('#select_premium_ads_column').val();
      var FormData = {
        'submit_type' : 'premium_ads_settings',
        'e_premium_ads_row' : e_premium_ads_row,
        'select_premium_ads_row' : select_premium_ads_row,
        'select_premium_ads_column' : select_premium_ads_column
      };
      var site_url = $('input[name=site_url]').val();
      site_url=site_url+"oc-content/themes/classified/admin/jquery-submit.php";
      runAjax(FormData,site_url,'premium_ads_settings');

    });

    $('#add-adsense-information').click(function(event){
      $("html, body").addClass("loading");
        e_ads_front_page_below_slider=$('input[name=e_ads_front_page_below_slider]:checked').val();
        e_ads_search_result_below_header=$('input[name=e_ads_search_result_below_header]:checked').val();
        e_ads_item_page_top=$('input[name=e_ads_item_page_top]:checked').val();
        e_ads_item_page_bottom=$('input[name=e_ads_item_page_bottom]:checked').val();
        e_ads_footer_top = $('input[name=e_ads_footer_top]:checked').val();
        ads_front_page_below_slider = $('textarea[name=ads_front_page_below_slider]').val();
        ads_search_result_below_header = $('textarea[name=ads_search_result_below_header]').val();
        ads_item_page_top = $('textarea[name=ads_item_page_top]').val();
        ads_item_page_bottom = $('textarea[name=ads_item_page_bottom]').val();
        ads_footer_top = $('textarea[name=ads_footer_top]').val();

        var FormData = {
          'submit_type' : 'ad_sense_information',
          'e_ads_front_page_below_slider' : e_ads_front_page_below_slider,
          'e_ads_search_result_below_header' : e_ads_search_result_below_header,
          'e_ads_item_page_top' : e_ads_item_page_top,
          'e_ads_item_page_bottom' : e_ads_item_page_bottom,
          'e_ads_footer_top' : e_ads_footer_top,
          'ads_front_page_below_slider' : ads_front_page_below_slider,
          'ads_search_result_below_header' : ads_search_result_below_header,
          'ads_item_page_top' : ads_item_page_top,
          'ads_item_page_bottom' : ads_item_page_bottom,
          'ads_footer_top' : ads_footer_top
        };

        var site_url = $('input[name=site_url]').val();
        site_url=site_url+"oc-content/themes/classified/admin/jquery-submit.php";
        runAjax(FormData,site_url,'premium_ads_settings');
    });

});
function Verify_Facebook_API() {
  document.getElementById("loading-msg").innerHTML = '<div id ="check-api">Contacting Facebook API - please wait ...</div>';  
  var sitebase_url = document.getElementById('sitebase_url').value;
  var api_id = document.getElementById('facebook_api_id').value;
  if (api_id == '') {
    document.getElementById('loading-msg').innerHTML = '<div id="api-error">please enter your facebook api key</div>';
    facebook_verified=false;
    return false;
  }
  var api_secret = document.getElementById('facebook_api_secret').value;
  if (api_secret == '') {
  document.getElementById('loading-msg').innerHTML = '<div id="api-error">please enter your facebook api secret</div>';
   facebook_verified=false;
   return false;
  }
  if (document.getElementById('curl').checked) {
  var api_request = 'curl';
  }
  else {
  var api_request = 'fopen';   
  }
  var FormData={
    'api_id' : api_id,
    'api_secret' : api_secret,
    'api_request' : api_request
  };
  return $.ajax({
       
        type: 'GET',
        url: sitebase_url,
        data: FormData,
        success: function(msg){
          $("html,body").removeClass("loading");
           
          if(msg.search("apisuccess")){
            facebook_verified=true;
            $('#loading-msg').html(msg);
            return true;
          }else{
            //$('#verification_msg').html(msg);
            facebook_verified=false;
            $('#loading-msg').html("<b>Verification Failed. Please check your credentials.</b>");
            return false;
          }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(errorThrown);
                  $("html,body").removeClass("loading"); //bring back load more button
                  return false;
          }
      });
 
}
function checkItemExist(FormData,site_url,page){
      var returnVal="FALSE";
      $.ajax({
        type: "POST",
        url: site_url,
        data: FormData,
        success: function(msg){
          callNextFunc(msg);
          
          return msg;
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
          console.log(errorThrown);
          return "FALSE";
        }
      });
     
}

function populateHomeSliderItem(site_url){
  var site_url=$('input[name=site_url]').val();
  site_url=site_url+"oc-content/themes/classified/admin/jquery-submit.php";  
  var FormData = {
            'submit_type'               :'populate_home_slider',
          };
  $.ajax({
        type: "POST",
        url: site_url,
        data: FormData,
        success: function(msg){
          $('#populate-slider').html(msg);
          return msg;
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
          console.log(errorThrown);
          return "FALSE";
        }
      });
}
function callNextFunc(msg,site_url){
  var site_url=$('input[name=site_url]').val();
        site_url=site_url+"oc-content/themes/classified/admin/jquery-submit.php";   
  msg=msg.replace(/\s/g,'');
  if(msg=="TRUE"){
                var FormData = {
                'submit_type'               :'home_slider_insert_item',
                'home_slider_item_id'              : $('select[name=HomeSliderSelect]').val(),
              };
              checkInsertIteminPaidAds(FormData,site_url);
          }else{
            alert("Item ID does not exist");
          }
}
function callNextNextFunc(msg,site_url){
  var site_url=$('input[name=site_url]').val();
        site_url=site_url+"oc-content/themes/classified/admin/jquery-submit.php";   
          msg=msg.replace(/\s/g,'');
          if(msg=="EXIST"){
                  alert("Item ID already exist.");
                }else{
                  $('#add-home-slider-item').before('<div id="success">Item Added!</div>');
                  $('#success').delay(3000).fadeOut();
                }
          populateHomeSliderItem(site_url);      
}
function checkInsertIteminPaidAds(FormData,site_url){
  var site_url=$('input[name=site_url]').val();
        site_url=site_url+"oc-content/themes/classified/admin/jquery-submit.php";   
      $.ajax({
        type: "POST",
        url: site_url,
        data: FormData,
        success: function(msg){
          callNextNextFunc(msg,site_url);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
          console.log(errorThrown);
          return false;
        }
      });
}
function runAjax(FormData,siteurl){
  var site_url=$('input[name=site_url]').val();
  site_url=site_url+"oc-content/themes/classified/admin/jquery-submit.php"; 
  $.ajax({
              
          type: "POST",
          url: site_url,
          data:  FormData,
          success: function(msg){
                 $("html,body").removeClass("loading"); //bring back load more button
                  $("#result_return").html(msg);
                  //$("#"+siteurl+"_alert").html(msg);
                  
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(errorThrown);
                  $("html,body").removeClass("loading"); //bring back load more button
                  //$('.show-animation').hide(); //hide loading image once data is rece
          }
      });
}

function remove_id(item_id,site_url){
  var site_url=$('input[name=site_url]').val();
  site_url=site_url+"oc-content/themes/classified/admin/jquery-submit.php";   
  $("html,body").addClass("loading");
   var FormData = {
      'submit_type'               :'home_slider_remove_item',
      'home_slider_item_id'              : item_id
    };
  $.ajax({
              
          type: "POST",
          url: site_url,
          data:  FormData,  
          success: function(msg){
                 $("html,body").removeClass("loading"); //bring back load more button
                 populateHomeSliderItem(site_url);
                  
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(errorThrown);
                  $("html,body").removeClass("loading"); //bring back load more button
                  //$('.show-animation').hide(); //hide loading image once data is rece
          }
      });
}

function Verify_Paypal_API(){
  $("html,body").addClass("loading");
    var paypal_username=$('input[name=paypal_username]').val();
    var paypal_password=$('input[name=paypal_password]').val();
    var paypal_signature=$('input[name=paypal_signature]').val();
    var paypal_server=$('input[name=paypal_server_classic').val();
     var site_url=$('input[name=site_url]').val();
            site_url=site_url+"oc-content/themes/classified/admin/paypal-api.php";   
    var FormData ={
            'METHOD' : 'GetBalance',
            'USER'    : paypal_username,
            'PWD'     : paypal_password,
            'SIGNATURE': paypal_signature,
            'VERSION' : '74.0',
            'SERVER' :paypal_server,
            'PAYPAL_POST_TYPE': 'VERIFY_API'
            
        };
    if(paypal_username==="" || paypal_password==="" || paypal_signature==="" || paypal_server===""){
      alert('Missing Paypal Information');
      $("html,body").removeClass("loading");
      return;
    }else{
      return $.ajax({
       
        type: 'POST',
        url: site_url,
        data: FormData,
        success: function(msg){
          $("html,body").removeClass("loading");
           msg=msg.replace(/\s/g,'');
          if(msg=="SUCCESS"){
            paypal_verified=true;
            $('#verification_msg').html("<b>API Verified</b>");
            return true;
          }else{
            //$('#verification_msg').html(msg);
            paypal_verified=false;
            $('#verification_msg').html("<b>Verification Failed. Please check your credentials.</b>");
            return false;
          }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(errorThrown);
                  $("html,body").removeClass("loading"); //bring back load more button
                  return false;
          }
      });
    }
}
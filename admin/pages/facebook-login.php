<h1>Facebook Information</h1>
<form name="submit-facebook-data" method="post" action="">
  <input id="sitebase_url" type="hidden" value="<?php echo osc_current_web_theme_url().'admin/facebook-api-check.php';?>" />
  <table>
    <tr>
      <td>Facebook API ID</td>
      <td><input type="text" class="xlarge" id="facebook_api_id" name="facebook_api_id" value="<?php echo osc_esc_html( osc_get_preference('facebook_api_id', 'classified') ); ?>" placeholder="Enter Facebook API ID"></td>
    </tr>  
    <tr>
        <td>Facebook API Secret</td>
        <td><input type="text" class="xlarge" id="facebook_api_secret" name="facebook_api_secret" value="<?php echo osc_esc_html( osc_get_preference('facebook_api_secret', 'classified') ); ?>" placeholder="Enter Facebook API Secret"></td>
    </tr>
   </table>

<?php $curl = "";
               $fopen = "";
               if(osc_get_preference('connection','classified') == "curl") $curl = "checked='checked'";
               elseif(osc_get_preference('connection','classified') == "fopen") $fopen = "checked='checked'";
               else $curl = "checked='checked'";?>
    

  <table>
    <tr>
      <td><input name="connection" id ="curl" type="radio" <?php echo $curl;?>value="curl" /></td>
      <td>Use CURL to communicate with Facebook API</td>
    </tr>
    <tr>
        <td><input name="connection" id ="fopen" type="radio" <?php echo $fopen;?>value="fopen" /></td>
        <td>Use FSOCKOPEN to communicate with Facebook API</td>
     </tr>
     <tr>
        <td><input type="checkbox" name="e_facebook_enable_status" id="e_facebook_enable_status" value="1" <?php echo (osc_get_preference('e_facebook_enable_status', 'classified') ? 'checked' : ''); ?>></td>
        <td>Enable Facebook Login</td>
     </tr>
   </table>     
    <div style="padding:10px;">
    <a href="javascript:void(0);" onclick="MakeApiRequest();"><b style="color:#FFFFFF !important;background-color:#000000;padding:5px;">VERIFY API</b></a>
  </div>
  <div id="loading-msg" >
     
  </div>
 <div class="submit-data" id="submit-facebook-data" type="button" > Submit</div>
</form>
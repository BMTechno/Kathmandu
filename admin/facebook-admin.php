<?php
if(isset($_POST['submit'])){
    $api_id=  Params::getParam("api_id");
    $api_secret=  Params::getParam("api_secret");
    $status=    Params::getParam("status");
    $connection = Params::getParam("connection");

    if($status=="on"){
      $enable=TRUE;
    }else{
      $enable=FALSE;
    }

     $_credentials=FacebookNepcoders::newInstance()->selectFacebookData();
      if($_credentials==null){
        FacebookNepcoders::newInstance()->insertFacebookData($api_id, $api_secret,$connection);
      }else{
        FacebookNepcoders::newInstance()->updateFacebookData($api_id, $api_secret,$enable,$connection ,$_credentials['pk_fb_api_id']);
      }
    
}
$_credentials=FacebookNepcoders::newInstance()->selectFacebookData();
  $api_id=null;
  $api_secret=null;
  $checked=null;
  $connection=null;
  if($_credentials!=null){  
    $api_id=$_credentials['pk_fb_api_id'];
    $api_secret=$_credentials['fb_api_secret'];
    $enable=$_credentials['fb_status'];
    $connection=$_credentials['fb_connection'];
    if($enable==TRUE){
      $checked="checked";
    }else{
      $checked="";
    }
  }
  if($enable==null){
    $status="disabled readonly";
  }else{
    $status="";
  }    
?>
<h1>Facebook Information</h1>
<form name="facebook-form" method="post" action="">
  <input id="sitebase_url" type="hidden" value="<?php echo osc_current_web_theme_url().'includes/facebook-api-check.php';?>" />
  <div class="form-group">
    <label for="api_id">Facebook API ID</label>
    <input class="form-control" id="api_id" name="api_id" value="<?php echo $api_id;?>" placeholder="Enter Facebook API ID">
  </div>
  <div class="form-group">
    <label for="api_secret">Facebook API Secret</label>
    <input class="form-control" id="api_secret" name="api_secret" value="<?php echo $api_secret;?>" placeholder="Enter Facebook API Secret">
  </div>
  <div class="checkbox form-group">
    <?php $curl = "";
               $fopen = "";
               if($connection == "curl") $curl = "checked='checked'";
               elseif($connection == "fopen") $fopen = "checked='checked'";
               else $curl = "checked='checked'";?>
    <input name="connection" id ="curl" type="radio" <?php echo $curl;?>value="curl" />
    Use CURL to communicate with Facebook API  <br />
    <input name="connection" id ="fopen" type="radio" <?php echo $fopen;?>value="fopen" />Use FSOCKOPEN to communicate with Facebook API
   </div> 
<a href="javascript:void(0);" onclick="MakeApiRequest();"><b style="color:#FFFFFF !important;background-color:#000000;padding:5px;">VERIFY API</b></a>
  <div id="loading-msg" >
     
  </div>
  <div class="checkbox form-group">
    <label>
      <input type="checkbox" name="status" id="status" <?php echo $status;echo $checked;?>> Enable Facebook Login
    </label>
  </div>
  <button type="submit" name="submit" class="btn btn-primary pull-right">Submit</button>
</form>
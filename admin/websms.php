<?php
if(isset($_POST['submit'])){
  $token=Params::getParam('token');
  $signature=Params::getParam('signature');
  $server = Params::getParam('server');
  $status = Params::getParam('status');
  if($status=="on"){
      $enable=TRUE;
    }else{
      $enable=FALSE;
  }
  ////Check If EveryThing is OK////

  /////////////////////////////////
  $_credentials=WebSMS::newInstance()->selectWebSMSData();
      if($_credentials==null){
        WebSMS::newInstance()->insertWebSMSData($token,$signature,$server);
      }else{
        WebSMS::newInstance()->updateWebSMSData($token,$signature,$server,$enable,$_credentials['pk_ws_token']);
      }
}
$_credentials=WebSMS::newInstance()->selectWebSMSData();
  $token=null;
  $signature=null;
  $server=null;
  if($_credentials!=null){  
    $token=$_credentials['pk_ws_token'];
    $signature=$_credentials['ws_signature'];
    $server=$_credentials['ws_server'];
    $enable=$_credentials['ws_status'];
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
<h1>Web SMS</h1>
<form name="sms-form" method="post" action="">
  <div class="form-group">
    <label for="token">Web Sms Token</label>
    <input class="form-control" id="token" name="token" value="<?php echo $token;?>" placeholder="Enter Token" required>
  </div>
  <div class="form-group">
    <label for="signature">Signature</label>
    <input class="form-control" id="signature" name="signature" value="<?php echo $signature;?>" placeholder="Enter Signature" required>
  </div>
  <div class="form-group">
    <label for="server">Server URL</label>
    <input class="form-control" id="server" name="server" value="<?php echo $server;?>" placeholder="Enter Server URL" required>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" name="status" id="status" <?php echo $status;echo $checked;?>> Enable Web SMS
    </label>
  </div>
  <button type="submit" name="submit" class="btn btn-primary pull-right">Submit</button>
</form>
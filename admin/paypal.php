
<?php
require_once(osc_themes_path().'nepcoders/includes/paypal-api.php');
if(isset($_POST['submit'])){
    $username=  Params::getParam("username");
    $password=  Params::getParam("password");
    $signature= Params::getParam("signature");
    $url=       Params::getParam("server");
    $status=    Params::getParam("status");
    if($status=="on"){
      $enable=TRUE;
    }else{
      $enable=FALSE;
    }
    $credentials=array('USER'=>$username,
                        'PWD'=>$password,
                        'SIGNATURE' =>$signature);
    $method=array('METHOD'=>'GetBalance',
                  'VERSION' => '74.0');
    $data=PaypalAPI:: execute_post($url,array(),$credentials,$method);
    
    if($data['ACK']=='Failure'){
      echo returnErrorMsgWithHeader($data['L_SHORTMESSAGE0'],$data['L_LONGMESSAGE0']);

    }else if($data['ACK']=='Success'){
      echo returnSuccessMsgWithHeader("Your Available Balance",$data['L_CURRENCYCODE0']." ".$data['L_AMT0']);
      $_credentials=Paypal::newInstance()->selectPaypalData();
      if($_credentials==null){
        Paypal::newInstance()->insertPaypalData($username,$password,$signature,$url);
      }else{
        Paypal::newInstance()->updatePaypalData($username,$password,$signature,$url,$enable,$_credentials['pk_pp_username']);
      }
      
    }
}
$_credentials=Paypal::newInstance()->selectPaypalData();
  $username=null;
  $password=null;
  $signature=null;
  $url=null;
  if($_credentials!=null){  
    $username=$_credentials['pk_pp_username'];
    $password=$_credentials['pp_password'];
    $signature=$_credentials['pp_signature'];
    $url=$_credentials['pp_server'];
    $enable=$_credentials['pp_status'];
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

  

<h1>Paypal Information</h1>
<form name="paypal-form" method="post" action="">
  <div class="form-group">
    <label for="username">Paypal Username</label>
    <input class="form-control" id="username" name="username" value="<?php echo $username;?>" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input class="form-control" id="password" name="password" value="<?php echo $password;?>" placeholder="Enter Password">
  </div>
  <div class="form-group">
    <label for="signature">Signature</label>
    <input class="form-control" id="signature" name="signature" value="<?php echo $signature;?>" placeholder="Enter Signature">
  </div>
  <div class="form-group">
    <label for="server">Paypal API Server</label>
    <input class="form-control" id="server" name="server" value="<?php echo $url;?>" placeholder="Paypal API Server">
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" name="status" id="status" <?php echo $status;echo $checked;?>> Enable Paypal
    </label>
  </div>
  <button type="submit" name="submit" class="btn btn-primary pull-right">Submit</button>
</form>
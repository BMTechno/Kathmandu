<?php
/**
 * Classified Function page for Facebook
 *
 * @package Osclass
 * @subpackage Classified
 */
?>
<?php

function render_facebook_button() {
       $sApiId=  osc_get_preference('facebook_api_id','classified');
        $sApiSecret=  osc_get_preference('facebook_api_secret','classified');
        $sButton = '<div class="fball_ui">
        <div class="btn btn-lg btn-primary btn-block" title="Facebook All">';

          $sButton .= '
        <a href="javascript:void(0);" title="Login with Facebook" onclick="FbAll.facebookLogin();" style="color:#FFF;"><span>Login with Facebook</span></a>
        </div>
          <input type="hidden" name="client_id" value="'.$sApiId.'"/>
          <input type="hidden" name="redirect_uri" value="'.osc_base_url().'"/>
        <input type="hidden" name="fball_login_form_uri" value=""/>
        </div>';
  echo $sButton;
}


function make_userlogin() {
  if(isset($_GET['page'])){
    return;
  }
  $facebookData=FacebookClassified::newInstance()->selectFacebookData();
  $api_id=  osc_get_preference('facebook_api_id','classified');
  $api_secret=  osc_get_preference('facebook_api_secret','classified');
  if (isset($_GET['code']) AND !empty($_GET['code'])) {
    $code = $_GET['code'];
    
    if(!empty($code)){
      $get_access_data = facebookall_get_fb_contents("https://graph.facebook.com/v2.3/oauth/access_token?" . 'client_id=' . $api_id . '&redirect_uri=' . urlencode(osc_base_url()) .'&client_secret=' .  $api_secret . '&code=' . urlencode($code));
      $access_data = json_decode($get_access_data, true);
      
    }
    if(empty($access_data['access_token'])){
        $get_access_data = facebookall_get_fb_contents("https://graph.facebook.com/v2.3/oauth/access_token?" . 'client_id=' . $api_id . '&redirect_uri=' . urlencode(osc_base_url()) .'&client_secret=' .  $api_secret . '&code=' . urlencode($code));
      $access_data = json_decode($get_access_data, true);

    }

    if(!empty($access_data['access_token'])){
      $access_token = $access_data['access_token'];
    }
    else{
      echo 'Error : Could not get access token please check your app settings for more about this error<br> Or Follow our doc setion <a href="http://sourceaddons.com/documentation">Documentation Section</a>.';
      exit;
    }
    ?>
    <script>
      window.opener.FbAll.parentRedirect({'action' : 'fball', 'fball_access_token' : '<?php echo $access_token?>'});
      window.close();
    </script>
    <?php }
    if(!empty($_REQUEST['fball_access_token']) AND isset($_REQUEST['fball_redirect'])) {
      $user_info = json_decode(facebookall_get_fb_contents("https://graph.facebook.com/v2.3/me?access_token=".$_REQUEST['fball_access_token']));
      Session::newInstance()->_set('fb-token',$_REQUEST['fball_access_token']);
      $user_data = get_userprofile_data($user_info);
      if (!empty($user_data['email']) AND !empty($user_data['id'])) {
      // Filter username form data.
        if(!empty($user_data['name'])) {
          $username = $user_data['name'];
        }
        else if (!empty($user_data['first_name']) && !empty($user_data['last_name'])) {
          $username = $user_data['first_name'].$user_data['last_name'];
        }
        else {
          $user_emailname = explode('@', $user_data['email']);
          $username = $user_emailname[0];
        }
        $user_login = $username;
        $new_user = false;
        $user_id = get_userid($user_data['id']);
        if (empty($user_id)) { //Not Registered As Facebook User
          $u_data=User::newInstance()->findByEmail($user_data['email']);
          if (!empty($u_data)) { //Registered As OSClass but not as Facebook User
              $user=User::newInstance()->findByEmail($user_data['email']);
              insert_facebook_user_data($user['pk_i_id'], $user_data['id']);
          }else{//New User Not Registered as Facebook User And OSClass User
            $new_user = true;
            register_user($user_data);
          }
        }
        $manager = User::newInstance();
        $oscUser = $manager->findByEmail( $user_data['email'] );
        $email=$oscUser['pk_i_id'];
        require_once osc_lib_path() . 'osclass/UserActions.php';
        $uActions = new UserActions( false );
        $logged = $uActions->bootstrap_login( $oscUser['pk_i_id'] );

     // Redirect user.
        osc_redirect_to(osc_user_dashboard_url());
        /*
          if (!empty ($_GET['redirect_to'])) {
            $redirect_to = $_GET['redirect_to'];
            wp_safe_redirect ($redirect_to);
          }
          else {
            $redirect_to = facebookall_redirect_loggedin_user();
            wp_redirect ($redirect_to);
          }
          exit();
        }
        */
      }
    }
  }

/**
 * Function that getting api settings.
 */
function facebookall_get_fb_contents($url) {
  $connection = osc_get_preference('connection','classified');
  if ($connection == 'curl') {
    $curl = curl_init();
    curl_setopt( $curl, CURLOPT_URL, $url );
    curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false );
    $response = curl_exec( $curl );

  }
  else {
    $response = @file_get_contents($url);
  }
  return $response;
}

/*
 * Function getting user data from facebook.
 */
function get_userprofile_data($user_info) {
  $user_data['id'] = (!empty($user_info->id) ? $user_info->id : '');
  $user_data['first_name'] = (!empty($user_info->first_name) ? $user_info->first_name : '');
  $user_data['last_name'] = (!empty($user_info->last_name) ? $user_info->last_name : '');
  $user_data['name'] = (!empty($user_info->name) ? $user_info->name : '');
  $user_data['email'] = (!empty($user_info->email) ? $user_info->email : '');
  $user_data['thumbnail'] = "https://graph.facebook.com/v2.3/" . $user_data['id'] . "/picture";
  $user_data['aboutme'] = (!empty($user_info->bio) ? $user_info->bio : "");
  $user_data['website'] = (!empty( $user_info->link) ? $user_info->link : "");
  return $user_data;
}
/**
 * Get the userid.
 */
function get_userid ($id) {
   $facebookData=FacebookUser::newInstance()->selectFacebookUserData($id);
}
function register_user($user)
        {
            $manager = User::newInstance();

            $input['s_name']      = $user['name'];
            $input['s_email']     = $user['email'];
            $input['s_password']  = sha1( osc_genRandomPassword() );
            $input['dt_reg_date'] = date( 'Y-m-d H:i:s' );
            $input['s_secret']    = osc_genRandomPassword();

            $email_taken = $manager->findByEmail( $input['s_email'] );
            if($email_taken == null) {
                $manager->insert( $input );
                $userID = $manager->dao->insertedId();
                
                $result = $manager->dao->replace();

                osc_run_hook( 'user_register_completed', $userID );

                $userDB = $manager->findByPrimaryKey( $userID );

                if( osc_notify_new_user() ) {
                    osc_run_hook( 'hook_email_admin_new_user', $userDB );
                }

                if(osc_version()>=310) {
                    $manager->update( array('b_active' => '1', 's_username' => $userID)
                                    ,array('pk_i_id' => $userID) );
                } else {
                        $manager->update( array('b_active' => '1')
                            ,array('pk_i_id' => $userID) );
                }
                insert_facebook_user_data($userID, $user['id']);

                osc_run_hook('hook_email_user_registration', $userDB);
                osc_run_hook('validate_user', $userDB);

                osc_add_flash_ok_message( sprintf( __('Your account has been created successfully', 'facebook' ), osc_page_title() ) );
            }

        }
function insert_facebook_user_data($userId, $facebookId){
  FacebookUser::newInstance()->insertFacebookUserData($userId, $facebookId);
}        
?>
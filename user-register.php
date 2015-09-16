
 <?php osc_enqueue_script('jquery-validate');?>
<html>
<head>
    <?php osc_current_web_theme_path('head.php'); ?>
    <meta name="robots" content="noindex, nofollow" />
    <meta name="googlebot" content="noindex, nofollow" />
</head>
    <body>
        <?php osc_current_web_theme_path('header.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                  <div class="wrapper">
                      <form class="form-signin" id="form-signin" name="register" action="<?php echo osc_base_url(true); ?>" method="post" >
                        <input type="hidden" name="page" value="register" />
                        <input type="hidden" name="action" value="register_post" />
                        <h2 class="form-signin-heading">Register or 
                            <a id="register_login_button" href="#" role="button" data-toggle="modal" data-target="#login">
                            <span style="color:#FF3300;">Login</span></a></h2>

                        <input type="text" class="form-control" name="s_name" id="s_name" placeholder="User name" required=""/><br/>
                        <input type="hidden" class="form-control" name="s_username" id="s_username" placeholder="User name" />    
                        <div id="available"></div>

                        <input type="text" class="form-control" name="s_email" id="s_email" placeholder="Email" required=""/><br/>

                        <input type="password" class="form-control" name="s_password" id="s_password" placeholder="Password" required=""/><br/>

                        <input type="password" class="form-control" name="s_password2" id="s_password2" placeholder="Re-type Password" required=""/><br/>
                        
                        <?php osc_show_recaptcha('register'); ?>
                        <button class="btn btn-lg btn-danger btn-block" type="submit">Register</button><br/> 
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <hr>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <h4>Join With</h4>
                            </div> 
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <hr>
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <?php render_facebook_button(); ?>
                            </div>                               
                        </div>

                      </form>
                  </div>
            </div>
        </div>
    </div>
    <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>

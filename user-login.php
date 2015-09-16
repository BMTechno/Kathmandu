<!DOCTYPE html>
<html lang="en">
    <head>
        <?php osc_current_web_theme_path('head.php'); ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php'); ?>
        <div class="container" role="document" >
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                  <div class="wrapper">

                      <form class="form-signin" action="<?php echo osc_base_url(true); ?>" method="post">
                        <input type="hidden" name="page" value="login" />
                        <input type="hidden" name="action" value="login_post" />
                        <h2 class="form-signin-heading">Login or 
                            <span id="register_button" style="color:#FF3300;">
                                <?php if(osc_user_registration_enabled()) { ?>
                                    <a href="#" role="button" data-toggle="modal" data-target="#register"><?php _e('Register', 'classified'); ?></a>
                                <?php }; ?>
                            </span></h2>

                        <input type="text" class="form-control" name="email" id="email" placeholder="Email Address" required="" autofocus="" /><br/>

                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required=""/>
                        
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="checkbox">
                                  <input type="checkbox" value="remember" id="remember" name="remember" value="1"> Remember me
                                </label>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <h6><span style="color:#FF3300;" id="recover_button"><a href="#" role="button" data-toggle="modal" data-target="#recover">Forgot a Password?</a></span></h6>
                            </div>    
                        </div>
                        <button class="btn btn-lg btn-danger btn-block" type="submit">Login</button><br/> 
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
<?php
/**
 * Classified Theme User Change Password
 *
 * @package Osclass
 * @subpackage Classified
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('head.php'); ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php'); ?>
        <hr>
        <div class="container-fluid dashboard-page">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="content-section">
                        <h4 class="my-account"><?php _e('Change your password', 'classified'); ?></h4>
                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <?php echo osc_private_user_menu(); ?>                
                            </div>
                            <div class="col-md-9 col-sm-12 col-xs-12" style="width:30%;margin:auto;">
                                <div id="main" class="modify_profile">
                                    <h2><?php _e('Change your password', 'classified'); ?></h2>
                                        <form action="<?php echo osc_base_url(true); ?>" method="post">
                                            <input type="hidden" name="page" value="user" />
                                            <input type="hidden" name="action" value="change_password_post" />
                                            <fieldset>
                                                <p>
                                                    <label for="password"><?php _e('Current password', 'classified'); ?> *</label>
                                                    <input type="password" name="password" class="form-control" id="password" value="" />
                                                </p>
                                                <p>
                                                    <label for="new_password"><?php _e('New password', 'classified'); ?> *</label>
                                                    <input type="password" name="new_password" class="form-control" id="new_password" value="" />
                                                </p>
                                                <p>
                                                    <label for="new_password2"><?php _e('Repeat new password', 'classified'); ?> *</label>
                                                    <input type="password" name="new_password2" class="form-control" id="new_password2" value="" />
                                                </p>
                                                <div style="clear:both;"></div>
                                                <button type="submit" class="btn btn-lg btn-danger btn-block"><?php _e('Update', 'classified'); ?></button>
                                            </fieldset>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                        
            </div>
        </div>
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>
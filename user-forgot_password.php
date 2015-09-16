<?php
    /*
     *      Osclass – software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (C) 2012 OSCLASS
     *
     *       This program is free software: you can redistribute it and/or
     *     modify it under the terms of the GNU Affero General Public License
     *     as published by the Free Software Foundation, either version 3 of
     *            the License, or (at your option) any later version.
     *
     *     This program is distributed in the hope that it will be useful, but
     *         WITHOUT ANY WARRANTY; without even the implied warranty of
     *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *             GNU Affero General Public License for more details.
     *
     *      You should have received a copy of the GNU Affero General Public
     * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
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
        <div class="row dashboard-page">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <h1>Recover your password</h1>
                    <form action="<?php echo osc_base_url(true); ?>" method="post" >
                        <input type="hidden" name="page" value="login" />
                        <input type="hidden" name="action" value="forgot_post" />
                        <input type="hidden" name="userId" value="<?php echo osc_esc_html(Params::getParam('userId')); ?>" />
                        <input type="hidden" name="code" value="<?php echo osc_esc_html(Params::getParam('code')); ?>" />
                        <fieldset>
                            <p>
                                <label for="new_email"><?php _e('New password', 'classified'); ?></label><br />
                                <input type="password" name="new_password" value="" class="form-control"/>
                            </p>
                            <p>
                                <label for="new_email"><?php _e('Repeat new password', 'classified'); ?></label><br />
                                <input type="password" name="new_password2" value="" class="form-control"/>
                            </p>
                            <button class="btn btn-lg btn-danger btn-block" type="submit"><?php _e('Change password', 'classified'); ?></button>
                        </fieldset>
                    </form>
                </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>
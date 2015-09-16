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

    osc_enqueue_script('jquery-validate');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('head.php'); ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />
        <script type="text/javascript">
            $(document).ready(function() {
                $('form#change-email').validate({
                    rules: {
                        new_email: {
                            required: true,
                            email: true
                        }
                    },
                    messages: {
                        new_email: {
                            required: '?php echo osc_esc_js(__("Email: this field is required", "classified")); ?>.',
                            email: '<?php echo osc_esc_js(__("Invalid email address", "classified")); ?>.'
                        }
                    },
                    errorLabelContainer: "#error_list",
                    wrapper: "li",
                    invalidHandler: function(form, validator) {
                        $('html,body').animate({ scrollTop: $('h1').offset().top }, { duration: 250, easing: 'swing'});
                    },
                    submitHandler: function(form){
                        $('button[type=submit], input[type=submit]').attr('disabled', 'disabled');
                        form.submit();
                    }
                });
            });
        </script>
    </head>

    <body>
        <?php osc_current_web_theme_path('header.php'); ?>
        <hr>
        <div class="container-fluid dashboard-page">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="content-section">
                        <h4 class="my-account"><?php _e('Change your e-mail', 'classified'); ?></h4>
                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <?php echo osc_private_user_menu(); ?>                
                            </div>
                            <div class="col-md-9 col-sm-12 col-xs-12" style="width:30%;margin:auto;">
                                <div id="main" class="modify_profile">
                                    <ul id="error_list"></ul>
                                    <form id="change-email" action="<?php echo osc_base_url(true); ?>" method="post">
                                        <input type="hidden" name="page" value="user" />
                                        <input type="hidden" name="action" value="change_email_post" />
                                        <fieldset>
                                            <p>
                                                <label for="email"><?php _e('Current e-mail', 'classified'); ?></label>
                                                <span><?php echo osc_logged_user_email(); ?></span>
                                            </p>
                                            <p>
                                                <label for="new_email"><?php _e('New e-mail', 'classified'); ?> *</label>
                                                <input type="text" class="form-control"  name="new_email" id="new_email" value="" />
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
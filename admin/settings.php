<h2 class="render-title <?php echo (osc_get_preference('footer_link', 'classified') ? '' : 'separate-top'); ?>"><?php _e('Theme settings', 'classified'); ?></h2>
<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/classified/admin/settings.php'); ?>" method="post">
    <input type="hidden" name="action_specific" value="settings" />
    <fieldset>
        <div class="form-horizontal">
            <div class="form-row">
                <div class="form-label"><?php _e('Search Content', 'classified'); ?></div>
                <div class="form-controls"><textarea type="text" class="xlarge" name="search_content"><?php echo osc_esc_html( osc_get_preference('search_content', 'classified') ); ?></textarea></div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Search placeholder', 'classified'); ?></div>
                <div class="form-controls"><input type="text" class="xlarge" name="keyword_placeholder" value="<?php echo osc_esc_html( osc_get_preference('keyword_placeholder', 'classified') ); ?>"></div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Footer link', 'classified'); ?></div>
                <div class="form-controls">
                    <div class="form-label-checkbox"><input type="checkbox" name="footer_link" value="1" <?php echo (osc_get_preference('footer_link', 'classified') ? 'checked' : ''); ?> > <?php _e("I want to help OSClass by linking to <a href=\"http://osclass.org/\" target=\"_blank\">osclass.org</a> from my site with the following text:", 'classified'); ?></div>
                    <span class="help-box"><?php _e('This website is proudly using the <a title="OSClass web" href="http://osclass.org/">classifieds scripts</a> software <strong>OSClass</strong>', 'classified'); ?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Facebook URL', 'classified'); ?></div>
                <div class="form-controls"><input type="text" class="xlarge" name="facebook_url" value="<?php echo osc_esc_html( osc_get_preference('facebook_url', 'classified') ); ?>"></div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Website Email', 'classified'); ?></div>
                <div class="form-controls"><input type="text" class="xlarge" name="email_info" value="<?php echo osc_esc_html( osc_get_preference('email_info', 'classified') ); ?>"></div>
                <div class="form-controls form-label-checkbox"><input type="checkbox" name="enable_email" value="1" <?php echo (osc_get_preference('enable_email', 'classified') ? 'checked' : ''); ?> > <?php _e("Show Email info at top.", 'classified'); ?></div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Phone No.', 'classified'); ?></div>
                <div class="form-controls"><input type="text" class="xlarge" name="phone_info" value="<?php echo osc_esc_html( osc_get_preference('phone_info', 'classified') ); ?>"></div>
                <div class="form-controls form-label-checkbox"><input type="checkbox" name="enable_phone" value="1" <?php echo (osc_get_preference('enable_phone', 'classified') ? 'checked' : ''); ?> > <?php _e("Show phone no at top.", 'classified'); ?></div>
            </div>
            <div class="form-controls">
                <p><?php _e('Social Buttons that stays at top right corner.', 'classified'); ?><br/><?php _e('If you are using an online advertising platform, such as Google Adsense, copy and paste here the provided code for ads.', 'classified'); ?></p>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Facebook.', 'classified'); ?></div>
                <div class="form-controls"><input type="text" class="xlarge" name="sb_facebook" value="<?php echo osc_esc_html( osc_get_preference('sb_facebook', 'classified') ); ?>"></div>
                <div class="form-controls form-label-checkbox"><input type="checkbox" name="e_sb_facebook" value="1" <?php echo (osc_get_preference('e_sb_facebook', 'classified') ? 'checked' : ''); ?> > <?php _e("Show Facebook on top right.", 'classified'); ?></div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Twitter.', 'classified'); ?></div>
                <div class="form-controls"><input type="text" class="xlarge" name="sb_twitter" value="<?php echo osc_esc_html( osc_get_preference('sb_twitter', 'classified') ); ?>"></div>
                <div class="form-controls form-label-checkbox"><input type="checkbox" name="e_sb_twitter" value="1" <?php echo (osc_get_preference('e_sb_twitter', 'classified') ? 'checked' : ''); ?> > <?php _e("Show Twitter on top right.", 'classified'); ?></div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Instagram.', 'classified'); ?></div>
                <div class="form-controls"><input type="text" class="xlarge" name="sb_instagram" value="<?php echo osc_esc_html( osc_get_preference('sb_instagram', 'classified') ); ?>"></div>
                <div class="form-controls form-label-checkbox"><input type="checkbox" name="e_sb_enstagram" value="1" <?php echo (osc_get_preference('e_sb_instagran', 'classified') ? 'checked' : ''); ?> > <?php _e("Show Instagram on top right.", 'classified'); ?></div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Linkedin.', 'classified'); ?></div>
                <div class="form-controls"><input type="text" class="xlarge" name="sb_linkedin" value="<?php echo osc_esc_html( osc_get_preference('sb_linkedin', 'classified') ); ?>"></div>
                <div class="form-controls form-label-checkbox"><input type="checkbox" name="e_sb_linkedin" value="1" <?php echo (osc_get_preference('e_sb_linkedin', 'classified') ? 'checked' : ''); ?> > <?php _e("Show Linkedin on top right.", 'classified'); ?></div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Google Plus.', 'classified'); ?></div>
                <div class="form-controls"><input type="text" class="xlarge" name="sb_google" value="<?php echo osc_esc_html( osc_get_preference('sb_google', 'classified') ); ?>"></div>
                <div class="form-controls form-label-checkbox"><input type="checkbox" name="e_sb_google" value="1" <?php echo (osc_get_preference('e_sb_google', 'classified') ? 'checked' : ''); ?> > <?php _e("Show Google Plus at top right.", 'classified'); ?></div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Facebook Application ID (for comment)', 'classified'); ?></div>
                <div class="form-controls"><input type="text" class="xlarge" name="fb_app_id" value="<?php echo osc_esc_html( osc_get_preference('fb_app_id', 'classified') ); ?>"></div>
                <div class="form-controls form-label-checkbox"><input type="checkbox" name="e_comment_fb" value="1" <?php echo (osc_get_preference('e_comment_fb', 'classified') ? 'checked' : ''); ?> > <?php _e("This will remove default OSClass comment and add Facebook Comment", 'classified'); ?></div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Twitter Share', 'classified'); ?></div>
                <div class="form-controls form-label-checkbox"><input type="checkbox" name="e_twitter_share" value="1" <?php echo (osc_get_preference('e_twitter_share', 'classified') ? 'checked' : ''); ?> > <?php _e("This will enable Twitter share button on item page.", 'classified'); ?></div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Facebook Share', 'classified'); ?></div>
                <div class="form-controls form-label-checkbox"><input type="checkbox" name="e_facebook_share" value="1" <?php echo (osc_get_preference('e_facebook_share', 'classified') ? 'checked' : ''); ?> > <?php _e("This will enable Facebook share button on item page.", 'classified'); ?></div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Google Plus Share', 'classified'); ?></div>
                <div class="form-controls form-label-checkbox"><input type="checkbox" name="e_google_share" value="1" <?php echo (osc_get_preference('e_google_share', 'classified') ? 'checked' : ''); ?> > <?php _e("This will enable Google Plus share button on item page.", 'classified'); ?></div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Pintrest Share', 'classified'); ?></div>
                <div class="form-controls form-label-checkbox"><input type="checkbox" name="e_pintrest_share" value="1" <?php echo (osc_get_preference('e_pintrest_share', 'classified') ? 'checked' : ''); ?> > <?php _e("This will enable Pintrest share button on item page.", 'classified'); ?></div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Hide Categories', 'classified'); ?></div>
                <div class="form-controls form-label-checkbox"><input type="checkbox" name="e_hide_categories" value="1" <?php echo (osc_get_preference('e_hide_categories', 'classified') ? 'checked' : ''); ?> > <?php _e("Hide Categories / Sub Categories when no items in it.", 'classified'); ?></div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Premium Sliders', 'classified'); ?></div>
                <div class="form-controls form-label-checkbox"><input type="checkbox" name="e_show_premium_slider" value="1" <?php echo (osc_get_preference('e_show_premium_slider', 'classified') ? 'checked' : ''); ?> > <?php _e("Display Premium Ads slider at top of the main pages.", 'classified'); ?></div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Google Maps', 'classified'); ?></div>
                <div class="form-controls form-label-checkbox"><input type="checkbox" name="e_show_google_maps" value="1" <?php echo (osc_get_preference('e_show_google_maps', 'classified') ? 'checked' : ''); ?> > <?php _e("Display item location on Google Maps.", 'classified'); ?></div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Shoutbox', 'classified'); ?></div>
                <div class="form-controls form-label-checkbox"><input type="checkbox" name="e_show_shout_box" value="1" <?php echo (osc_get_preference('e_show_shout_box', 'classified') ? 'checked' : ''); ?> > <?php _e("Display shout box in front page.", 'classified'); ?></div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Item View Count', 'classified'); ?></div>
                <div class="form-controls form-label-checkbox"><input type="checkbox" name="e_view_count" value="1" <?php echo (osc_get_preference('e_view_count', 'classified') ? 'checked' : ''); ?> > <?php _e("Display Item View Count.", 'classified'); ?></div>
            </div>
        </div>
        <div class="form-horizontal">
            <p><h3>Place your cool landing popup.</h3></p>
             <div class="form-row">
                <div class="form-label"><?php _e('Enable Landing Popup', 'classified'); ?></div>
                <div class="form-controls form-label-checkbox"><input type="checkbox" name="e_landing_popup" value="1" <?php echo (osc_get_preference('e_landing_popup', 'classified') ? 'checked' : ''); ?> > </div>
            </div>   
            <div class="form-row">
                <div class="form-label"><?php _e('Popup Heading', 'classified'); ?></div>
                 <div class="form-controls"><input type="text" class="xlarge" name="popup_head" value="<?php echo osc_esc_html( osc_get_preference('popup_head', 'classified') ); ?>"></div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Popup Body', 'classified'); ?></div>
                 <div class="form-controls"><textarea class="xlarge" rows="5" name="popup_body" value=""><?php echo osc_esc_html( osc_get_preference('popup_body', 'classified') ); ?></textarea></div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Popup Footer', 'classified'); ?></div>
                 <div class="form-controls"><input type="text" class="xlarge" name="popup_foot" value="<?php echo osc_esc_html( osc_get_preference('popup_foot', 'classified') ); ?>"></div>
            </div>    
        </div>
            <div class="form-actions">
                <input type="submit" value="<?php _e('Save changes', 'classified'); ?>" class="btn btn-submit">
            </div>
        </div>
    </fieldset>
</form>
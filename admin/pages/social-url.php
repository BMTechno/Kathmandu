<form name="social-url" id="social-url" method="post"  action="">
<table>
	<tr>
		<td>
			<?php _e('Facebook.', 'classified'); ?>
		</td>
		<td>
			<input type="text" class="xlarge" name="sb_facebook" value="<?php echo osc_esc_html( osc_get_preference('sb_facebook', 'classified') ); ?>">
		</td>	
		<td>
			<input type="checkbox" name="e_sb_facebook" value="1" <?php echo (osc_get_preference('e_sb_facebook', 'classified') ? 'checked' : ''); ?> > <?php _e("Enable Facebook Link.", 'classified'); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php _e('Twitter.', 'classified'); ?>
		</td>
		<td>
			<input type="text" class="xlarge" name="sb_twitter" value="<?php echo osc_esc_html( osc_get_preference('sb_twitter', 'classified') ); ?>">
		</td>	
		<td>
			<input type="checkbox" name="e_sb_twitter" value="1" <?php echo (osc_get_preference('e_sb_twitter', 'classified') ? 'checked' : ''); ?> > <?php _e("Enable Twitter Link.", 'classified'); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php _e('Instagram.', 'classified'); ?>
		</td>
		<td>
			<input type="text" class="xlarge" name="sb_instagram" value="<?php echo osc_esc_html( osc_get_preference('sb_instagram', 'classified') ); ?>">
		</td>	
		<td>
			<input type="checkbox" name="e_sb_instagram" value="1" <?php echo (osc_get_preference('e_sb_instagram', 'classified') ? 'checked' : ''); ?> > <?php _e("Enable Instagram Link.", 'classified'); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php _e('Linkedin.', 'classified'); ?>
		</td>
		<td>
			<input type="text" class="xlarge" name="sb_linkedin" value="<?php echo osc_esc_html( osc_get_preference('sb_linkedin', 'classified') ); ?>">
		</td>	
		<td>
			<input type="checkbox" name="e_sb_linkedin" value="1" <?php echo (osc_get_preference('e_sb_linkedin', 'classified') ? 'checked' : ''); ?> > <?php _e("Enable LinkedIn Link.", 'classified'); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php _e('Google Plus.', 'classified'); ?>
		</td>
		<td>
			<input type="text" class="xlarge" name="sb_google" value="<?php echo osc_esc_html( osc_get_preference('sb_google', 'classified') ); ?>">
		</td>	
		<td>
			<input type="checkbox" name="e_sb_google" value="1" <?php echo (osc_get_preference('e_sb_google', 'classified') ? 'checked' : ''); ?> > <?php _e("Enable Google Plus Link.", 'classified'); ?>
		</td>
	</tr>	
</table>
<div class="submit-data" id="submit-social-url-data" type="button"> Submit</div>
</form>
<table>
	<tr>
		<td>
			<?php _e('Post Ads', 'classified'); ?>
		</td>
		<td>
			<input type="checkbox" name="e_post_ad_to_all" value="1" <?php echo (osc_get_preference('e_post_ad_to_all', 'classified') ? 'checked' : ''); ?> > <?php _e("Enable Posts to all Logged in User", 'classified'); ?>
		</td>
	</tr>
	<tr>	
		<td>
			<?php _e('Display <b>Recent Ads</b> before <b>Popular Ads</b> ', 'classified'); ?>
		</td>
		<td>
			<input type="checkbox" name="e_recent_before_popular" value="1" <?php echo (osc_get_preference('e_recent_before_popular', 'classified') ? 'checked' : ''); ?> > <?php _e("By default <b>Popular Ads</b> comes before<b>Recent Ads</b>.", 'classified'); ?>
		</td>
	</tr>
	<tr>	
		<td>
			<?php _e('Front page display ', 'classified'); ?>
		</td>
		<td>
			<input type="checkbox" name="e_front_display_with_image" value="1" <?php echo (osc_get_preference('e_front_display_with_image', 'classified') ? 'checked' : ''); ?> > <?php _e("Only display items with image on front page.", 'classified'); ?>
		</td>
	</tr>
	<tr>	
		<td>
			<?php _e('Google Maps / Item Slider ', 'classified'); ?>
		</td>
		<td>
			<input type="checkbox" name="e_front_map_or_slider" value="1" <?php echo (osc_get_preference('e_front_map_or_slider', 'classified') ? 'checked' : ''); ?> > <?php _e("Display Latest Listing Google maps instead of item slider", 'classified'); ?>
		</td>
	</tr>
	<tr>	
		<td>
			<?php _e('Custom CSS', 'classified'); ?>
		</td>
		<td>
			<input type="checkbox" name="e_custom_css" value="1" <?php echo (osc_get_preference('e_custom_css', 'classified') ? 'checked' : ''); ?> > <?php _e("Enable Custom CSS", 'classified'); ?>
		</td>
	</tr>
	<tr>	
		<td colspan="2" >
			<textarea style="width:100%" class="xlarge" rows="5" name="custom_css_text" value=""><?php echo osc_esc_html( osc_get_preference('custom_css_text', 'classified') ); ?></textarea>
		</td>
	</tr>
	<tr>	
		<td>
			<?php _e('Add Custom Javascript', 'classified'); ?>
		</td>
		<td>
			<input type="checkbox" name="e_custom_javascript" value="1" <?php echo (osc_get_preference('e_custom_javascript', 'classified') ? 'checked' : ''); ?> > <?php _e("Enable Javascript for chat or other function. ", 'classified'); ?>
			</br>Example:  Zoopin chat script. <a href="https://account.zopim.com/signup?lang=en-us"> Register</a> 
		</td>
	</tr>
	<tr>	
		<td colspan="2" >
			<textarea style="width:100%" class="xlarge" rows="5" name="custom_javascript_text" value=""><?php echo osc_esc_html( osc_get_preference('custom_javascript_text', 'classified') ); ?></textarea>
		</td>
	</tr>
</table>	
<div class="submit-data" id="submit-other-settings-data" type="button"> Submit</div>
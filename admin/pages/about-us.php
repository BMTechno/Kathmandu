<h2>About Us</h2>
<div class="form-row">
	<input type="checkbox" name="e_about_us" value="1" <?php echo (osc_get_preference('e_about_us', 'classified') ? 'checked' : ''); ?>> Enable About Us (Footer) If enabled Custom page menu will not be shown. 
</div>
<div class="form-row">
    <div class="form-label"><?php _e('About Us Heading', 'classified'); ?></div>
    <div class="form-controls"><input type="text" class="xlarge" name="about_us_heading" value="<?php echo osc_esc_html( osc_get_preference('about_us_heading', 'classified') ); ?>"></div>
</div>
<div class="form-row">
    <div class="form-label"><?php _e('About Us', 'classified'); ?></div>
    <div class="form-controls"><textarea class="xlarge" rows="5" name="about_us" value=""><?php echo osc_esc_html( osc_get_preference('about_us', 'classified') ); ?></textarea></div>
</div>
<div class="form-row">
    <div class="submit-data" id="submit-about-us-data" type="button"> Submit</div>
</div>
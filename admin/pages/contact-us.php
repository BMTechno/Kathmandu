 <p><h3>Footer Contact Us Information</h3></p>
            <div class="form-row">
                <div class="form-label"><?php _e('Email Address', 'classified'); ?></div>
                 <div class="form-controls"><input type="text" class="xlarge" name="email_info" value="<?php echo osc_esc_html( osc_get_preference('email_info', 'classified') ); ?>"></div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Phone Number', 'classified'); ?></div>
                 <div class="form-controls"><input type="text" class="xlarge" rows="5" name="phone_info" value="<?php echo osc_esc_html( osc_get_preference('phone_info', 'classified') ); ?>" /></div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Address', 'classified'); ?></div>
                 <div class="form-controls"><input type="text" class="xlarge" name="address_info" value="<?php echo osc_esc_html( osc_get_preference('address_info', 'classified') ); ?>"></div>
            </div>    
            <div class="form-row">
                <div class="submit-data" id="submit-contact-us-data" type="button"> Submit</div>
            </div>
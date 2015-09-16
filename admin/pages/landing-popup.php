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
            <div class="form-row">
                <div class="submit-data" id="submit-landing-popup-data" type="button"> Submit</div>
            </div>
<div class="form-horizontal">
    <hr>
            <div class="form-row">
                <div class="form-label"><?php _e('Front Page</br>970 X 90', 'classified'); ?></div>
                <div class="form-controls">
                    <input type="checkbox" name="e_ads_front_page_below_slider" value="1" <?php echo (osc_get_preference('e_ads_front_page_below_slider', 'classified') ? 'checked' : ''); ?>> Enable this Section (Front page)
                    <textarea style="height: 115px; width: 800px;" name="ads_front_page_below_slider"><?php echo osc_esc_html( osc_get_preference('ads_front_page_below_slider', 'classified') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown at the main site of your website, just below the slider.', 'classified'); ?></div>
                </div>
            </div>
            <hr>
            <div class="form-row"> 
                <div class="form-label"><?php _e('Search Results</br>970 X 90', 'classified'); ?></div>
                <div class="form-controls">
                    <input type="checkbox" name="e_ads_search_result_below_header" value="1" <?php echo (osc_get_preference('e_ads_search_result_below_header', 'classified') ? 'checked' : ''); ?>> Enable this Section (Search Result)
                    <textarea style="height: 115px; width: 800px;" name="ads_search_result_below_header"><?php echo osc_esc_html( osc_get_preference('ads_search_result_below_header', 'classified') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown on the search result page of your website. It will appear bottom of your site header.', 'classified'); ?></div>
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="form-label"><?php _e('Item page (top)</br>250 X 250', 'classified'); ?></div>
                <div class="form-controls">
                    <input type="checkbox" name="e_ads_item_page_top" value="1" <?php echo (osc_get_preference('e_ads_item_page_top', 'classified') ? 'checked' : ''); ?>> Enable this Section (Item page top)
                    <textarea style="height: 115px; width: 800px;" name="ads_item_page_top"><?php echo osc_esc_html( osc_get_preference('ads_item_page_top', 'classified') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown on top of the item page of your site.', 'classified'); ?></div>
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="form-label"><?php _e('Item page (bottom)</br>970 X 90', 'classified'); ?></div>
                <div class="form-controls">
                    <input type="checkbox" name="e_ads_item_page_bottom" value="1" <?php echo (osc_get_preference('e_ads_item_page_bottom', 'classified') ? 'checked' : ''); ?>> Enable this Section (Item page bottom)
                    <textarea style="height: 115px; width: 800px;" name="ads_item_page_bottom"><?php echo osc_esc_html( osc_get_preference('ads_item_page_bottom', 'classified') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown on bottom of the item page of your site.', 'classified'); ?></div>
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="form-label"><?php _e('Footer </br>970 X 90', 'classified'); ?></div>
                <div class="form-controls">
                    <input type="checkbox" name="e_ads_footer_top" value="1" <?php echo (osc_get_preference('e_ads_footer_top', 'classified') ? 'checked' : ''); ?>> Enable this Section (Top of Footer)
                    <textarea style="height: 115px; width: 800px;" name="ads_footer_top"><?php echo osc_esc_html( osc_get_preference('ads_footer_top', 'classified') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown on bottom of the item page of your site.', 'classified'); ?></div>
                </div>
            </div>
            <hr>
            <div class="form-actions">
                <div class="submit-data" id="add-adsense-information" type="button" > Submit</div>
            </div>
        </div>
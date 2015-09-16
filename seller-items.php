<?php
/**
 * Classified Theme Seller Items Page
 *
 * @package Osclass
 * @subpackage Classified
 */
?>
<?php 

$id = Params::getParam('seller');
$seller = User::newInstance()->findByPrimaryKey($id);
$s_name = $seller['s_name'];
?>

               <div class="seller_items">
                    <h3>Items for sale from <strong><?php _e($s_name, 'classified'); ?></strong></h3>
                    <?php if( osc_count_latest_items(null,array('sUser' => $id)) == 0) { ?>
                        <p class="empty"><?php _e('No Latest Listings', 'classified'); ?></p>
                    <?php } else { ?>
                        <table border="0" cellspacing="0">
                             <tbody>
                                <?php $class = "even"; ?>
                                <?php while ( osc_has_latest_items(null,array('sUser' => $id)) ) { ?>
                                 <tr class="<?php echo $class. (osc_item_is_premium()?" premium":""); ?>">
                                        <?php if( osc_images_enabled_at_items() ) { ?>
                                         <td class="photo">
                                            <?php if( osc_count_item_resources() ) { ?>
                                                <a href="<?php echo osc_item_url(); ?>">
                                                    <img src="<?php echo osc_resource_thumbnail_url(); ?>" width="75" height="56" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>" />
                                                </a>
                                            <?php } else { ?>
                                                <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" alt="" title="" />
                                            <?php } ?>
                                         </td>
                                        <?php } ?>
                                         <td class="text">
                                             <h3><a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title(); ?></a></h3>
                                             <h5><?php echo osc_item_contact_name(); ?> </h5>
                                             <p><strong><?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled() ) { echo osc_item_formated_price(); ?> - <?php } echo osc_item_city(); ?> (<?php echo osc_item_region();?>) - <?php echo osc_format_date(osc_item_pub_date()); ?></strong></p>
                                             <p><?php echo osc_highlight( strip_tags( osc_item_description() ) ); ?></p>
                                         </td>
                                     </tr>
                                    <?php $class = ($class == 'even') ? 'odd' : 'even'; ?>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php if( osc_count_latest_items() == osc_max_latest_items() ) { ?>
                        <p class='pagination'><?php echo osc_search_pagination(); ?></p>
                            <p class="see_more_link"><a href="<?php echo osc_search_show_all_url();?>"><strong><?php _e("See all offers", 'classified'); ?> &raquo;</strong></a></p>
                        <?php } ?>
                    <?php View::newInstance()->_erase('items'); } ?>
                </div>
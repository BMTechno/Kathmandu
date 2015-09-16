<?php
/**
 * Classified Theme Latest Listings Section
 *
 * @package Osclass
 * @subpackage Classified
 */
?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h5 class="most-recent-ads">Most Recent Ads</h5>
        <div class="hrb"></div>
    </div>
 </div>
 <div class="row">
<?php if( osc_count_latest_items() == 0) { ?>
        <p class="empty"><?php _e('No Latest Listings', 'nepcoders'); ?></p>
<?php } else { ?>
        <?php $no = "1"; ?>
        <?php $count = 1 ?>
        <?php $total_premiums=0; ?> 
        <?php $max_latest = osc_max_latest_items(); ?>
        <?php $latest_list = $total_premiums + $max_latest;?>
            <?php while ( osc_has_latest_items($latest_list,array(),true) AND $count!=13) { ?> 
                    <?php if(nc_osc_front_display_with_image() ) { //ONLY DISPLAY ITEM WITH IMAGE?>
                        <?php if( osc_count_item_resources() ) { ?>
                            <?php $count = $count+1; ?>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="add">
                                    <ul class="list-inline">
                                        <li>
                                            <?php if( osc_count_item_resources() ) { ?>
                                                <a href="<?php echo osc_item_url(); ?>">
                                                    <img width="122" height="107" class="img-responsive" src="<?php echo osc_resource_thumbnail_url(); ?>" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>" />
                                                </a>
                                            <?php } else { ?>
                                            <a href="<?php echo osc_item_url(); ?>">
                                                <img width="122" height="107" src="<?php echo osc_current_web_theme_url('images/no-image-available.png'); ?>" alt="<?php echo osc_item_title(); ?>" title="<?php echo osc_item_title();?>" class="img-responsive"/>
                                            </a>
                                            <?php } ?>
                                        </li>
                                        <li>
                                            <div class="add-name"><a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title(); ?></a></div>
                                            <div class="hr" style="width:40%"></div>
                                            <div class="add-date"><?php //echo osc_item_pub_date(); ?></div>
                                            <h6 style="color:#737884;"><?php echo osc_item_category(); ?></h6>
                                            <h5><?php echo (osc_item_price()/1000000)." ".osc_item_currency();?></h5>
                                        </li>
                                    </ul> 
                                    <p class="add-para add-para1"><?php echo osc_item_description(); ?></p> 
                                </div>
                            </div>
                        <?php } ?>     
                    <?php }else { //DISPLAY EVERY THING ?>
                            <?php $count = $count+1; ?>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="add">
                                    <ul class="list-inline">
                                        <li>
                                            <?php if( osc_count_item_resources() ) { ?>
                                                <a href="<?php echo osc_item_url(); ?>">
                                                    <img width="122" height="107" class="img-responsive" src="<?php echo osc_resource_thumbnail_url(); ?>" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>" />
                                                </a>
                                            <?php } else { ?>
                                            <a href="<?php echo osc_item_url(); ?>">
                                                <img width="122" height="107" src="<?php echo osc_current_web_theme_url('images/no-image-available.png'); ?>" alt="<?php echo osc_item_title(); ?>" title="<?php echo osc_item_title();?>" class="img-responsive"/>
                                            </a>
                                            <?php } ?>
                                        </li>
                                        <li>
                                            <div class="add-name"><a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title(); ?></a></div>
                                            <div class="hr" style="width:40%"></div>
                                            <div class="add-date"><?php //echo osc_item_pub_date(); ?></div>
                                            <h6 style="color:#737884;"><?php echo osc_item_category(); ?></h6>
                                            <h6><?php echo (osc_item_price()/1000000)." ".osc_item_currency();?></h6>
                                        </li>
                                    </ul> 
                                    <p class="add-para add-para1"><?php echo osc_item_description(); ?></p> 
                                </div>
                            </div>
                    <?php }  //END ELSE ?>
                    <?php View::newInstance()->_erase('items'); ?>              
                <?php } ?>
<?php } ?> 
  </div>    
<?php if( osc_count_latest_items() == osc_max_latest_items() ) { ?>
<?php } ?>                 
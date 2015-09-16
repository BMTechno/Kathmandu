<?php
/**
 * Classified Theme Search Gallery
 *
 * @package Osclass
 * @subpackage Classified
 */

<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <div class="row" style="padding-left:20px;padding-right:20px;">
        <ul class="list-inline nav navbar-nav">
            <li><h3 class="filter-search" style="color:#484a49;"><?php echo search_title(); ?></h3></li>
            <li></li>
        </ul>  
        <div class="nav navbar-nav navbar-right"> 
            <!--     START sort by       -->
                <span class="see_by">
                    <?php
                        $orders = osc_list_orders();
                        $current = '';
                        foreach ( $orders as $label => $params ) {
                            $orderType = ( $params['iOrderType'] == 'asc' ) ? '0' : '1';
                            if ( osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType ) {
                                $current = $label;
                            }
                        }
                    ?>
                    <style>
                        .btn-dropdown {
                           color: #CCC;
                           background-color: #f6f6f6;
                           border-color: #CCC;
                           border:2px solid #CCC;
                           margin-right: 15px;
                           padding-left:35px;
                           padding-right:35px;
                        }
                    </style>
                  <span class="btn-group">
                    <button type="button" class="btn btn-dropdown dropdown-toggle" data-toggle="dropdown">
                      <?php echo $current; ?> <span class="caret"></span>
                    </button>
                  <?php $i = 0; ?>
                  <ul class="dropdown-menu" role="menu">
                      <?php foreach ( $orders as $label => $params ) {
                            $orderType = ( $params['iOrderType'] == 'asc' ) ? '0' : '1'; ?>
                          <?php if ( osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType ) { ?>
                              <li><a class="current" href="<?php echo osc_esc_html( osc_update_search_url( $params ) ); ?>"><?php echo $label; ?></a></li>
                          <?php } else { ?>
                              <li><a href="<?php echo osc_esc_html( osc_update_search_url( $params ) ); ?>"><?php echo $label; ?></a></li>
                          <?php } ?>
                          <?php $i++; ?>
                      <?php } ?>
                    </ul>
                    </span>
                </span>
                <!--     END sort by       -->
        </div>           
    </div>
    <div class="real-estate">
        
    <?php osc_get_premiums();?>
    <?php if(osc_count_premiums() > 0) { ?>
    <?php while(osc_has_premiums()) { ?>
        <div class="row border-bottom">
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <?php if( osc_images_enabled_at_items() ) { ?>
                <?php if(osc_count_premium_resources()) { ?>
                    <a href="<?php echo osc_premium_url() ; ?>">
                        <img src="<?php echo osc_resource_thumbnail_url() ; ?>" title="<?php echo osc_premium_title(); ?>" alt="<?php echo osc_premium_title(); ?>" class="img-responsive"/>
                    </a>
                <?php } else { ?>
                    <img src="<?php echo osc_current_web_theme_url('images/no-image-available.png'); ?>" title="" alt="" />
                <?php } ?>
                <?php } ?>    
            </div> 
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">   
                <div class="border-line">
                    <!-- <ul class="list-inline">
                        <li><h4 class="cat-title"><a href="<?php echo osc_premium_url(); ?>"><?php echo osc_highlight( strip_tags( osc_premium_title() ) ); ?></a></h4></li>
                        <li style="margin-left:50px;"><span style="color:#7e391a; font-weight:bold;">
                            <?php if( osc_price_enabled_at_items() ) 
                            { 
                            echo "$". osc_premium_formated_price();
                            } ?></span></li>
                    </ul> -->
                    
                    <div class="row">
                                <div class="col-md-6">
                                    <h4 class="cat-title"><a href="<?php echo osc_premium_url(); ?>"><?php echo osc_highlight( strip_tags( osc_premium_title() ) ); ?></a></h4>
                                </div>
                                <div class="col-md-6">
                                    <span style="color:#7e391a; font-weight:bold;">
                                    <?php if( osc_price_enabled_at_items() ) 
                                    { 
                                    echo "$". osc_premium_formated_price();
                                    } ?></span>
                                </div>
                            </div>
                </div>
                <ul class="list-group meta-content">
                    <li>
                        <h5>Location : <?php echo osc_premium_city(); ?></h5>
                    </li>
                    <li>
                        <h5>Posted : <?php echo osc_format_date(osc_premium_pub_date()); ?></h5>
                    </li>
                    <li>
                        <h5>Seller : <?php echo osc_premium_contact_name(); ?></h5>
                    </li>
                </ul>
            </div> 
        </div>
    <?php }
} ?>  

    <?php while(osc_has_items()) { ?>
    ?>
        <div class="row border-bottom">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                <?php if( osc_images_enabled_at_items() ) { ?>
                <?php if(osc_count_item_resources()) { ?>
                    <a href="<?php echo osc_item_url() ; ?>">
                        <img src="<?php echo osc_resource_thumbnail_url() ; ?>" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>" class="img-responsive"/>
                    </a>
                <?php } else { ?>
                    <img src="<?php echo osc_current_web_theme_url('images/no-image-available.png'); ?>" title="" alt="" />
                <?php } ?>
                <?php } ?>    
            </div> 
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">   
                <div class="border-line">
                    <ul class="list-inline">
                        <li><h4 class="cat-title"><a href="<?php echo osc_premium_url(); ?>"><?php echo osc_highlight( strip_tags( osc_premium_title() ) ); ?></a></h4></li>
                        <li style="margin-left:50px;"><span style="color:#7e391a; font-weight:bold;">
                            <?php if( osc_price_enabled_at_items() ) 
                            { 
                            echo "$". osc_item_formated_price();
                            } ?></span></li>
                    </ul>
                </div>
                <ul class="list-group meta-content">
                    <li>
                        <h5>Location : <?php echo osc_premium_city(); ?></h5>
                    </li>
                    <li>
                        <h5>Posted : <?php echo osc_format_date(osc_item_pub_date()); ?></h5>
                    </li>
                    <li>
                        <h5>Seller : <?php echo osc_item_contact_name(); ?></h5>
                    </li>
                </ul>
            </div> 
        </div>
    <?php } ?>                     
    </div>
</div>




<?php
/**
 * Classified Theme Item Search Page
 *
 * @package Osclass
 * @subpackage Classified
 */
?>

        <?php osc_current_web_theme_path('head.php'); ?>
       
          
        <?php osc_current_web_theme_path('header.php'); ?>
        

        
        <div class="container">

                <div class="row">
                <?php if(nc_osc_search_results_ads_enabled()){ ?>
                    <div class="col-md-12 text-center">
                        <?php echo nc_osc_get_search_results_ads(); ?>
                    </div>    
                <?php } ?>
                </div>
                <?php $breadcrumb = osc_breadcrumb('&raquo;', false);?>
                        <?php if( $breadcrumb != '') { ?>
                                <div style="padding-left:10px;padding-bottom:30px;">
                                    <div id="breadcrumb">
                                                <?php echo $breadcrumb; ?>
                                                <div class="clear"></div>
                                    </div>      
                                </div>
                        <?php } ?>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 hidden-xs">
                    
                    <h3 class="filter-search">FILTER SEARCH</h3>
                   <div class="cat-sidebar">                       
                    <script>
                    $(function() {
                        $( "#slider-range" ).slider({
                            range: true,
                            min: 0,
                            max: 10000,
                            values: [ 0, 1000 ],
                            slide: function( event, ui ) {
                                for (var i = 0; i < ui.values.length; ++i) {
                                    $("input.priceRange[data-index=" + i + "]").val(ui.values[i]);
                                }
                            }
                        });
                      
                    });
                    </script>

                    
                    
                    <form action="<?php echo osc_base_url(true); ?>" method="get" onsubmit="return doSearch()" class="nocsrf">
                       
                        <p>
                            <label for="amount">Price range:</label>
                        </p>
                        <div class="form-group">
                            <div id="slider-range"></div> 
                        </div>
                        <form class="form-inline">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input id="priceMin" name="sPriceMin" type="text" class="priceRange form-control" data-index="0" readonly value="75">
                                    </div>
                                    <div class="col-xs-6">
                                        <input id="priceMax" name="sPriceMax" type="text" class="priceRange form-control" data-index="1" readonly value="300">
                                    </div>
                                </div> 

                                    <!-- <input id="priceMin" name="sPriceMin" type="text" class="priceRange form-control" data-index="0" readonly value="75" style="border:1; color:#f6931f; font-weight:bold;">
                              
                                    <input id="priceMax" name="sPriceMax" type="text" class="priceRange form-control" data-index="1" value="300" readonly style="border:1; color:#f6931f; font-weight:bold;"> -->
                               </div> 
                        </form>
                        <div class="form-group">
                            <label for="sCity">City</label>
                            <input id="sCity" name="sCity" type="text" class="form-control">
                            <input type="hidden" id="sRegion" name="sRegion" value="" />
                        </div> 
                         <div class="checkbox">
                            <label><input type="checkbox" name="bPic" id="withPicture" value="1"><span style="font-size:15px;">Only with pictures?</span></label>
                          </div>
                          <div id="show-more-main" class="custom-btn">Search</div>   
                    </form>
                    <div style="margin-top:50px;">
                        <?php osc_alert_form(); ?>
                    </div>
                    </div> 
                </div>
            
            
            <?php if(osc_count_items() == 0) { ?>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="padding-top:40px;text-align:center;">
                <div class="flashmessage-info flashmessage">
                    <p class="empty" ><?php printf(__('There are no results matching "%s"', 'modern'), osc_search_pattern()); ?></p>
                </div>

            </div>
            <?php } else { ?>
            <?php osc_run_hook('search_ads_listing_top'); ?>
            <div class="clear"></div>
            <?php require(osc_search_show_as() == 'list' ? 'search_list.php' : 'search_gallery.php'); ?>
            <?php } ?> 

            
            </div>
        </div>    
            <?php if(osc_count_items() != 0){ ?>
                <div style="text-align: center;">    
                    <div class="pagination" >
                        <?php echo osc_search_pagination(); ?>
                    </div>
                </div>
            <?php } ?>
        <?php osc_current_web_theme_path('footer.php'); ?>
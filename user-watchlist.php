<?php $current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>
<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="content-section">
                        <h4 class="my-account">My Watchlist</h4>
                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="account-sidebar">
                                    <img style="height:111px; margin:0 auto;" class="img-responsive img-circle" src="http://media.cirrusmedia.com.au/LW_Media_Library/LW-603-p28-partner-profile.jpg" alt="#">
                                    <h5 style="color:#ffffff; text-align:center;">John Doe</h5>
                                    <h6 style="color:#ffffff; text-align:center; padding-bottom:20px; border-bottom:1px solid #404040;">Member Since May 2012</h6>
                                    <?php echo osc_private_user_menu(); ?>
                                </div>   
                            </div>
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                <table border="0" cellspacing="0">
                                    <tbody>
                                    	<?php $class = "even"; ?>
                                        	<?php while ( nc_osc_has_watchlist_item() ) { ?>
                                            	<tr class="<?php echo $class. (osc_item_is_premium()?" premium":""); ?>">
                                                	<?php if( osc_images_enabled_at_items() ) { ?>
                                                    	<td class="photo">
                                                        	<?php if( nc_osc_get_item_resources(osc_item_id()) ) { ?>
                                                            	<a href="<?php echo osc_item_url(); ?>">
                                                                    <?echo nc_osc_resource_thumbnail_url(osc_item_id()); ?>
                                                                	<img src="<?php echo nc_osc_resource_thumbnail_url(osc_item_id()); ?>" width="75" height="56" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>" />
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
                                                            <form name="add-to-watchlist" method="post" action="<?php echo osc_route_url('nc-functions');?>">
                                                                <input type="hidden" name="nc_action" value="REMOVE-WATCHLIST"/>
                                                                <input type="hidden" name="item_id" value="<?php echo osc_item_id(); ?>" />
                                                                <input type="hidden" name="return_url" id="return_url" value="<?php echo $current_url;?>">
                                                                <Button class="btn btn-primary">Remove from Watch List</Button>
                                                            </form>
                                                        </td>
                                                </tr>
                                            <?php $class = ($class == 'even') ? 'odd' : 'even'; ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
function nc_osc_resource_thumbnail_url($item_id) {
		$res =       ItemResource::newInstance()->getAllResourcesFromItem( $item_id) ;
       
        return (string) osc_base_url().$res[0]['s_path'].$res[0]['pk_i_id']."_thumbnail.".$res[0]['s_extension'];
    }
function nc_osc_get_item_resources($item_id) {
	$res =       ItemResource::newInstance()->getAllResourcesFromItem( $item_id) ;
	if(!$res){
		return false;
	}

        return true;
    }
function nc_osc_has_watchlist_item(){
	$user_id=osc_logged_user_id();
	$res = WatchList::newInstance()->userList($user_id);
	$Item = array();
	$Resource=array();
	foreach($res as $key){
		$aItem = Item::newInstance()->findByPrimaryKey($key['pk_i_item_id']) ;
		$iResource =ItemResource::newInstance()->getAllResourcesFromItem($key['pk_i_item_id']);
		$Item[$key['pk_i_item_id']]=$aItem;
		$Item[$key['pk_i_item_id']]['resources']=$iResource;
	}
		
	if ( !View::newInstance()->_exists('items') ) {
            View::newInstance()->_exportVariableToView('items', $Item );
        }
        // set itemLoop to latest if it's the first time we enter here
        if(View::newInstance()->_get('itemLoop') !== 'latest') {
            View::newInstance()->_exportVariableToView('oldItem', View::newInstance()->_get('item'));
            View::newInstance()->_exportVariableToView('itemLoop', 'latest');
        }

        // get next item
        $item = View::newInstance()->_next('items');
        if(!$item) {
            View::newInstance()->_exportVariableToView('item', View::newInstance()->_get('oldItem'));
            View::newInstance()->_exportVariableToView('itemLoop', '');
        } else {
            View::newInstance()->_exportVariableToView('item', View::newInstance()->_current('items'));
        }

        // reset the loop once we finish just in case we want to use it again
        if( !$item && View::newInstance()->_count('items') > 0 ) {
            View::newInstance()->_reset('items');
        }
        
        return $item;
}
?>
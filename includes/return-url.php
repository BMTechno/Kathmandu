<?php
$id=Params::getParam('itemId');
$mItems  = new ItemActions( true );
                if ($mItems->premium($id, 1) ) {
                	echo "Item added as premium. ";
                	//Add Expiration Date
                	$premium_days = osc_get_preference('premium_days','classified');
                	if(is_numeric($premium_days)){
                		
                	}
                } else {
                	echo "Item not added as premium. / Item is already an premium item.";
                }

?>
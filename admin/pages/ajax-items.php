<?php
require_once('../../../../../oc-load.php');	
require_once('../../../../../oc-includes/osclass/model/Item.php');	
 	if(isset($_POST['submit_type'])){
 		$settings =$_POST['submit_type']; 
 		switch($settings){
 			case 	'items_populate':
 					$catId=Params::getParam('catId');
 					//$item = Item::newInstance()->findByCategoryID($catId);
 					$item = Item::newInstance();
 					$item->dao->select('l.*, i.*');
            		$item->dao->from($item->getTableName().' i, '.DB_TABLE_PREFIX.'t_item_description l');
            		$item->dao->where('l.fk_i_item_id = i.pk_i_id');
            		$item->dao->where('i.fk_i_category_id='.$catId);
            		$result = $item->dao->get();
            		if($result == false) {
                		return array();
            		}
            		$items  = $result->result();
 					$aItems = array();
 					foreach($items as $i){
 						$aTemp = array('itemId' =>	$i['fk_i_item_id'],
 										'itemTitle' => $i['s_title']);
 						array_push($aItems, $aTemp);
 					}
 					echo json_encode($aItems);
 			break;
 		}
 	}
 ?>
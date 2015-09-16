<?php
/**
 * Classified Theme Popular Categories Loadmore Section
 *
 * @package Osclass
 * @subpackage Classified
 */
?>
<?php require_once('../../../oc-load.php');?>
<?php require_once('functions.php'); ?>
<div class="row">
	<?php $row=1;
	if(isset($_POST['row'])){
		$row=$_POST['row'];
	}
    $start = $row * 5;
    $end = $start+3;
	?>
   
<?php $p_c = popular_category_start();?>
    <?php $sliced_array = array_slice($p_c, $start, $end); ?>
            <?php foreach ($sliced_array as $sa)  { 
                        $top_item=select_top_item($sa['cat_id']); 
                        $category_id = $sa['cat_id'];
                        $subcategory=get_parent_subcategories($category_id); 
                        if($top_item==null || empty($top_item)){
                            $no_item=false;
                            $category_name = get_category_name($sa['cat_id']);
                            if(osc_is_web_user_logged_in()){
                                $item_url = osc_item_post_url();
                                $img_title = "Click to add items.";
                            }else{
                                $item_url = osc_user_login_url();
                                $img_title = "Login to add items";
                            }
                            $img_source = osc_current_web_theme_url('images/no-items.png');
                            $total_listing = get_total_listing_by_parent($sa['cat_id']);
                            $total_item_views = get_total_item_views($sa['cat_id']);
                            if($total_item_views==null || empty($total_item_view)){
                                $total_item_views = '0';
                            }else{
                                $total_item_views = $total_item_views[0]['TotalViews'];
                            }
                            
                        }else{
                            $no_item=true;
                            $primary_id = (int)$top_item[0]['fk_i_item_id'];
                            $item     = Item::newInstance()->findByPrimaryKey($primary_id);
                            View::newInstance()->_exportVariableToView('item', $item);
                            $resource = Item::newInstance()->findResourcesByID($primary_id);
                            $item_url = osc_item_url();
                            $img_title = osc_item_title();


                            if( !empty($resource) || $resource!=""  ) {
                                $resource_path = osc_apply_filter('resource_path', osc_base_url().$resource[0]['s_path']);
                                $img_source = (string) $resource_path.$resource[0]['pk_i_id'].".".$resource[0]['s_extension'];
                            }else{
                                $img_source = osc_current_web_theme_url('images/no-image-available.png');
                            }     
                            $total_listing = get_total_listing_by_parent($sa['cat_id']);
                            $total_item_views = get_total_item_views($sa['cat_id']);

                            if($total_item_views==null || empty($total_item_views)){
                               
                                $total_item_views = '0';
                            }else{
                                $total_item_views = $total_item_views[0]['TotalViews'];
                            }
                            $category_name = get_parent_category_name(osc_item_category_id());
                        }
                    ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="automobile">
                        <h5 class="auto"><?php echo $category_name; ?></h5>
                            <a href="<?php echo $item_url; ?>">
                                <img src="<?php echo $img_source; ?>" width="240" height="200" class="img-responsive"  title="<?php echo $img_title; ?>" alt="<?php echo $img_title; ?>" />
                            </a>
                        <div class="hr"></div>
                        <ul style="margin-top:20px; border-bottom:1px solid #ededed;" class="list-inline button-list-categories">
                            <li><i style="color:#27beaf; font-size:20px;" class="fa fa-map-marker fa-1x"></i></li>
                            <li><h5><?php echo $total_listing; ?> Listings</h5></li>
                        </ul>

                        <ul style="border-bottom:1px solid #ededed;" class="list-inline">
                            <li><i style="color:#27beaf" class="fa fa-tags fa-1x"></i></li>
                            <li><h5><?php echo $total_item_views. " Views";?></h5></li>
                        </ul>   
                        <dl class="dl-horizontal">
                            <dt><i style="color:#27beaf" class="fa fa-comment fa-1x fa-custom"></i></dt>
                            <dd  style="margin-left:10px;" class="hidden_list href_<?php echo $category_id; ?> ">
                               
                                <h6>
                                      <?php ?>
                                        <?php $i=0; ?>
                                        <?php foreach($subcategory as $sb){ ?>
                                                <?php if ($i==0){
                                                    echo "<a href=".$sb['url']." style='color:#3a3b3b;'>".$sb['name']."</a>";
                                                }else{
                                                    echo "&nbsp;&nbsp;|&nbsp;&nbsp; <a href=".$sb['url']." style='color:#3a3b3b;'>".$sb['name']."</a>";
                                                }
                                                $i=$i+1;
                                                ?>
                                        <?php } ?>
                                </h6>
                            </dd>
                        </dl>
                        <a href="javascript:void(0);" class="seeAll_<?php echo $category_id; ?>" onClick="seeAllSubcategories(<?php echo $category_id; ?>)" >
                            <div  style="padding-bottom:4px;text-align:center;color:#000;">
                                <!--<img class="img-responsive" src="<?php echo osc_base_url().'oc-content/themes/classified/images/down.jpg'; ?>">-->
                                <span class="glyphicon glyphicon-chevron-down"></span>
                            </div>
                        </a>
                        <a href="javascript:void(0);" class="hideAll_<?php echo $category_id; ?>" onClick="hideAllSubcategories(<?php echo $category_id; ?>)" style="display:none;">
                            <div  style="padding-bottom:4px;text-align:center;color:#000">
                                <span class="glyphicon glyphicon-chevron-up"></span>
                            </div>
                        </a>
                        
                        
                    </div>
                </div>  
            <?php } ?>    
</div>
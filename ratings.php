<?php
/**
 * Classified Theme Ratings Function
 *
 * @package Osclass
 * @subpackage Classified
 */
?>
<?php

function item_total($item_id){
    $res=Ratings::newInstance()->getItemTotal($item_id);
    return $res;
}
function check_exist($user_id,$item_id){
	return Ratings::newInstance()->checkSameUserOnItem($user_id,$item_id);
}
function insert_rating($item,$user,$rating){
  return Ratings::newInstance()->insertRatingsData($item,$user,$rating);
}
function update_rating($item,$user,$rating){
  return Ratings::newInstance()->updateRatingsData($item,$user,$rating);
}
function calculate_ratings($item_id){
  $arr=item_total($item_id);
  if($arr['count']>0){
    $rate=$arr['sum']/$arr['count'];
  }else{
    $rate=0;
  }  
  return round($rate);
}
?>
<?php 
	if(Params::getParam('item_rating')=="submit_it"){
		if(osc_is_web_user_logged_in()){
			$user=Params::getParam('rating_user');
			$item=Params::getParam('rating_item');
      $rating=Params::getParam('rating_data');
      if(check_exist($user,$item)){
        //UPDATE DATA
        update_rating($item,$user,$rating);
      }else{
        //INSERT DATA
        insert_rating($item,$user,$rating);
      }
		}

	}
?>



<!-- HTML CODE -->


<!-- JS to add -->
<script type="text/javascript">
  $(document).ready(function(){
  	$("#jRate").jRate({
  		startColor: 'cyan',
  		endColor: 'blue',
  		shape: 'STAR',
      precision: 0,
  		onChange: function(rating) {
  			$('#rating-onchange-value').text("Your Rating: "+rating);
  		},
  		onSet: function(rating) {
  			$('#rating_data').val(rating);
  		}
  	});
    var rate=<?php echo calculate_ratings(osc_item_id());?>;
    $("#act-rating").jRate({
    startColor: 'cyan',
    endColor: 'blue',
    shape: 'STAR',
    readOnly: true,
    rating: rate
    });
  });
</script>

<div id="act-rating"></div>
<a href="#rate_this" class="btn btn-lg btn-primary" data-toggle="modal">Rate this Item</a>

<div id="rate_this" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Rate this Item</h4>
      </div>
      <form name="ratings" id="ratings" method="post" action="">
      	<input type="hidden" name="item_rating" value="submit_it" />
        <div class="modal-body" style="background-color:#ccc;">
          <div id="ratings" style="padding:15px;">
        	 <div id="jRate"></div><div id="rating-onchange-value">Your Rating: </div>
        	 <input type="hidden" name="rating_data" id="rating_data"/>
        	 <input type="hidden" name="rating_user" id="rating_user" value="<?php echo osc_logged_user_id(); ?>" />
        	 <input type="hidden" name="rating_item" id="rating_item" value="<?php echo osc_item_id(); ?>" />
   	    </div>
          <button type="submit" class="btn btn-primary" >Submit Ratings</button>
        </div>
  	  </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

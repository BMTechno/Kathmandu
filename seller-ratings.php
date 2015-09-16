<?php
/**
 * Classified Theme Seller Ratings Section
 *
 * @package Osclass
 * @subpackage Classified
 */
?>
<?php

function seller_total($seller_id){
    $res=SellerRatings::newInstance()->getSellerTotal($seller_id);
    return $res;
}
function check_exist($user_id,$seller_id){
    return SellerRatings::newInstance()->checkSameUserOnSeller($user_id,$seller_id);
}
function insert_rating($seller,$user,$rating){
  return SellerRatings::newInstance()->insertRatingsData($seller,$user,$rating);
}
function update_rating($seller,$user,$rating){
  return SellerRatings::newInstance()->updateRatingsData($seller,$user,$rating);
}
function calculate_ratings($seller_id){
  $arr=seller_total($seller_id);
  if($arr['count']>0){
    $rate=$arr['sum']/$arr['count'];
  }else{
    $rate=0;
  }
  return round($rate);
}
?>
<?php 
    if(Params::getParam('seller_rating')=="submit_it"){
        if(osc_is_web_user_logged_in()){
            $user=Params::getParam('rating_user');
            $seller=Params::getParam('rating_seller');
            $rating=Params::getParam('rating_data');
          if(check_exist($user,$seller)){
            //UPDATE DATA
            update_rating($seller,$user,$rating);
          }else{
          //INSERT DATA
          insert_rating($seller,$user,$rating);
          }
        }

    }
?>


<!-- HTML CODE -->


<!-- JS to add -->
<script type="text/javascript">
  $(document).ready(function(){
    $("#jRate").jRate({
        startColor: '#fff86d',
        endColor: '#fff200',
        shape: 'STAR',
      precision: 0,
        onChange: function(rating) {
            $('#rating-onchange-value').text("Your Rating: "+rating);
        },
        onSet: function(rating) {
            $('#rating_data').val(rating);
        }
    });
    var rate=<?php echo calculate_ratings(osc_item_user_id());?>;
    $("#act-rating").jRate({
        startColor: '#fff86d',
        endColor: '#fff200',
        shape: 'STAR',
        readOnly: true,
        rating: rate,
        count: 5
      });
  });
  </script>
<a href="#rate_this" class="" data-toggle="modal"><div id="act-rating"></div></a>
<?php if(osc_logged_user_id()!=osc_user_id()){ ?>
<div id="rate_this" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Rate this Seller</h4>
      </div>
      <form name="ratings" id="ratings" method="post" action="">
        <input type="hidden" name="seller_rating" value="submit_it" />
        <div class="modal-body" style="background-color:#ccc;">
          <div id="ratings" style="padding:15px;">
             <div id="jRate"></div><div id="rating-onchange-value">Your Rating: </div>
             <input type="hidden" name="rating_data" id="rating_data"/>
             <input type="hidden" name="rating_user" id="rating_user" value="<?php echo osc_logged_user_id(); ?>" />
             <input type="hidden" name="rating_seller" id="rating_seller" value="<?php echo osc_item_user_id(); ?>" />
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

<?php } ?>
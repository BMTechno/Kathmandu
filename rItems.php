
<script type="text/javascript">
$(document).ready(function() {
    $('.carousel').carousel({
      interval: 3000
    })
  });
  </script>

<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Recommended Items</h2>
                        
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                <?php $i=0; while(osc_has_items()) { $i++; ?>
                    <?php if($i==4){echo '</div><div class="item">';}?>   
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <?php if( osc_count_item_resources() ) { ?>
                                        <img src="<?php echo osc_resource_thumbnail_url() ; ?>"  alt="<?php echo osc_item_title() ; ?>" />
                                    <?php }else{ ?>
                                        <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" alt="No image available"  />
                                    <?php }?>
                                    <h3><?php 
                                        $price = osc_item_price()/1000000;
                                        if($price==0){
                                            echo '<a href="'.osc_item_url().'">Contact Seller</a>';
                                        } else{
                                            echo $price;
                                        }

                                        ?>
                                    </h3>
                                    <p><a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title(); ?></a></p>
                                    <?php if(nc_osc_paypal_status()){?>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                     <?php if($i==6){break;}}?>
                </div>
            </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>          
    </div>
</div><!--/recommended_items-->

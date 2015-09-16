<?php
/**
 * Classified Theme Premium Ads Section
 *
 * @package Osclass
 * @subpackage Classified
 */
?>

<?php
	osc_get_premiums('8');
?>


<div style="margin-top:10px;" class="carousel-reviews broun-block">
        <div class="row">
            <div id="carousel-reviews" class="carousel slide" data-ride="carousel">
            
                <div class="carousel-inner">
                	<?php if( osc_count_premiums() != 0) { ?>
                		<?php $i=0; ?>
						<?php while(osc_has_premiums()) { ?>
							<?php $i=$i+1; ?>
							<?php 
								if( osc_count_premium_resources() ) { 
		                    		$image = osc_resource_thumbnail_url(); 
		                     	} else { 
	                    			$image = osc_current_web_theme_url('images/no-image-available.png');
	                    		} 
	                    	?>
	                    <?php if($i==1){
	                    	echo '<div class="item active">';
	                    }else if($i!=1 && (($i-1) % 4)==0){
	                    	echo '<div class="item">';
	                    } ?>
	                   
	                    <?php if($i==2 || ($i % 4)==2) {
	                    	$class="hidden-xs";
	                    }else if(($i % 4)==3){
	                    	$class="hidden-sm hidden-xs";	
	                    }else if(($i % 4)==0){
	                    	$class="hidden-sm hidden-xs";
	                    }else{
	                    	$class="";
	                    }
	                    ?>
		                	    <div class="col-md-3 col-sm-6 <?php echo $class; ?>">
		        				    <div class="block-text">
		        				    	<div class="triangle-down"></div>
		        				    	<img class="img-responsive image-height" src="<?php echo $image; ?>" alt="<?php echo osc_premium_title(); ?>">
								        <ul style="border-top:1px solid #55c5b9;" class="list-inline">
								        	<li>
								        		<h4 class="Ctitle"><a href="<?php echo osc_premium_url(); ?>"><?php echo osc_premium_title(); ?></a></h4>
								        	</li>
								        	<li>
								        		<h4 class="Cprice"><?php echo (osc_premium_price()/1000000)." ".osc_premium_currency();?></h4>
								        	</li>
								        </ul>				          	

								        <p class="Cpara"><?php echo osc_premium_description(); ?></p>
							        </div>							
								</div>
						<?php $j=$i; ?>
						<?php if(($j % 4)==0){
	                    	echo '</div>';
	                    } ?>
	                <?php } ?>
	            <?php } ?>    
				</div>				
            </div>                    
        </div>           
</div>
 
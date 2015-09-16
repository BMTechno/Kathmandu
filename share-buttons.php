<?php
/**
 * Classified Theme Item Share Button
 *
 * @package Osclass
 * @subpackage Classified
 */
?>
<ul class="nav nav-tabs nav-justified">
	<?php if(nc_osc_show_twitter_share()){ ?>
		<li>
			<a href="https://twitter.com/share" class="twitter-share-button" data-via="nepcoders">Tweet</a>
		</li>
	<?php } ?>
	<?php if(nc_osc_show_facebook_share()){ ?>
		<li>
			<?php $current_page = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
			<div class="fb-share-button" data-href="<?php echo getUrl(); ?>" data-layout="button_count"></div>
		</li>
	<?php } ?>
	<?php if(nc_osc_show_google_share()){ ?>
		<li>
			<div class="g-plus" data-action="share"></div>			
		</li>
	<?php } ?>
	<?php if(nc_osc_show_pintrest_share()){ ?>
		<li>
			<a href="https://www.pinterest.com/pin/create/button/
        	?url=<?php echo getUrl(); ?>
        	&media=<?php echo getImage(); ?>
        	&description=<?php echo osc_esc_html(meta_title()); ?>t"
        	data-pin-do="buttonPin"
        	data-pin-config="above">
        <img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" />
    	</a>
		</li>
	<?php } ?>
</ul> 

<script>!function(d,s,id){
	var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
	if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';
	fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
</script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>


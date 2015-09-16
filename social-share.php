<?php
/**
 * Classified Theme Item Social Share
 *
 * @package Osclass
 * @subpackage Classified
 */
?>
<?php $resource_url=$GLOBALS['resource_url'];?>
<script>
	function fbs_click() {u=location.href;t=document.title;window.open('http://www.facebook.com/sharer.php?u=<?php echo osc_item_url(); ?>'
		,'sharer','toolbar=0,status=0,width=626,height=436'); return false;}
	function tw_click() {u=location.href;t=document.title;window.open('http://www.twitter.com/intent/tweet?text=<?php echo osc_item_title();?>
		&url=<?php echo osc_item_url(); ?>'
		,'sharer','toolbar=0,status=0,width=626,height=436'); return false;}
	function gplus_click() {u=location.href;t=document.title;window.open('https://plus.google.com/share?url=<?php echo osc_item_url(); ?>'
		,'sharer','toolbar=0,status=0,width=626,height=436'); return false;}
	function linkin_click() {u=location.href;t=document.title;window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo osc_item_url(); ?>'
		,'sharer','toolbar=0,status=0,width=626,height=436'); return false;}
	function pinterest_click() {u=location.href;t=document.title;window.open('http://pinterest.com/pin/create/button/?url=<?php echo osc_item_url(); ?>&media=<?php echo $resource_url;?>&description=<?php echo osc_item_title();?>'
		,'sharer','toolbar=0,status=0,width=626,height=436'); return false;}
	function reddit_click() {u=location.href;t=document.title;window.open('http://reddit.com/submit?url=<?php echo osc_item_url(); ?>'
		,'sharer','toolbar=0,status=0,width=626,height=436'); return false;}
</script>

<ul class="social-share-button list-inline">
	<li>
		<a rel="nofollow" href="#" onclick="return fbs_click()" target="_blank">
			<img src="<?php echo osc_base_url().'oc-content/themes/classified/images/facebook.png';?>"/>
		</a>
	</li>
	<li>
		<a class="twitter-share-button"
  			href="#" onclick="return tw_click()">
			<img src="<?php echo osc_base_url().'oc-content/themes/classified/images/twitter.png';?>"/>
		</a>
	</li>
	<li>
		<a href="#" rel="nofollow" onclick="return gplus_click()"> 
			<img src="<?php echo osc_base_url().'oc-content/themes/classified/images/google-plus.png';?>"/>
		</a>
	</li>
	<li>
		<a href="#" onclick="return linkin_click()">
			<img src="<?php echo osc_base_url().'oc-content/themes/classified/images/linkedin.png';?>"/>
		</a>
	</li>
	<li>
		<a href="#" onclick="return pinterest_click()">
			<img src="<?php echo osc_base_url().'oc-content/themes/classified/images/pinterest.png';?>"/>
		</a>
	</li>
	<li>
		<a href="#" onclick="return reddit_click()">
			<img src="<?php echo osc_base_url().'oc-content/themes/classified/images/reddit.png';?>"/>
		</a>
	</li>
</ul>	

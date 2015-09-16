<?php
/**
 * Classified Theme Home Slider Section
 *
 * @package Osclass
 * @subpackage Classified
 */
?>
    <script>

        jQuery(document).ready(function ($) {
		  var _CaptionTransitions = [];
            _CaptionTransitions["L"] = { $Duration: 800, x: 0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
            _CaptionTransitions["R"] = { $Duration: 800, x: -0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
            _CaptionTransitions["T"] = { $Duration: 800, y: 0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
            _CaptionTransitions["B"] = { $Duration: 800, y: -0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
            _CaptionTransitions["TL"] = { $Duration: 800, x: 0.6, y: 0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine, $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
            _CaptionTransitions["TR"] = { $Duration: 800, x: -0.6, y: 0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine, $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
            _CaptionTransitions["BL"] = { $Duration: 800, x: 0.6, y: -0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine, $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
            _CaptionTransitions["BR"] = { $Duration: 800, x: -0.6, y: -0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine, $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };

            _CaptionTransitions["WAVE|L"] = { $Duration: 1500, x: 0.6, y: 0.3, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseInWave }, $Opacity: 2, $Round: { $Top: 2.5} };
            _CaptionTransitions["MCLIP|B"] = { $Duration: 600, $Clip: 8, $Move: true, $Easing: $JssorEasing$.$EaseOutExpo };

            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1
                $Loop: 0,                                           //[Optional] Enable loop(circular) of carousel or not, 0: stop, 1: loop, 2 rewind, default value is 1
                $FillMode :1,                                    

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                $SlideWidth: 950,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                $SlideHeight: 350,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 5, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 0,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $Loop: 2,                                       //[Optional] Enable loop(circular) of carousel or not, 0: stop, 1: loop, 2 rewind, default value is 1
                    $AutoCenter: 3,                                 //[Optional] Auto center thumbnail items in the thumbnail navigator container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 3
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange thumbnails, default value is 1
                    $SpacingX: 4,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $SpacingY: 4,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                    $DisplayPieces: 3,                              //[Optional] Number of pieces to display, default value is 1
                    $ParkingPosition: 0,                            //[Optional] The offset position to park thumbnail
                    $Orientation: 2,                                //[Optional] Orientation to arrange thumbnails, 1 horizental, 2 vertical, default value is 1
                    $DisableDrag: false                             //[Optional] Disable drag or not, default value is false
                },

                $CaptionSliderOptions: {                            //[Optional] Options which specifies how to animate caption
                    $Class: $JssorCaptionSlider$,                   //[Required] Class to create instance to animate caption
                    $CaptionTransitions: _CaptionTransitions,       //[Required] An array of caption transitions to play caption, see caption transition section at jssor slideshow transition builder
                    $PlayInMode: 1,                                 //[Optional] 0 None (no play), 1 Chain (goes after main slide), 3 Chain Flatten (goes after main slide and flatten all caption animations), default value is 1
                    $PlayOutMode: 3                                 //[Optional] 0 None (no play), 1 Chain (goes before main slide), 3 Chain Flatten (goes before main slide and flatten all caption animations), default value is 1
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

			function ScaleSlider() {
				var bodyWidth = document.body.clientWidth;
				if (bodyWidth)
					jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1280));
				else
					window.setTimeout(ScaleSlider, 30);
			}
			ScaleSlider();

			$(window).bind("load", ScaleSlider);
			$(window).bind("resize", ScaleSlider);
			$(window).bind("orientationchange", ScaleSlider);
						//responsive code end
        
		});
    </script>
    <!-- Jssor Slider Begin -->
    <!-- To move inline styles to css file/block, please specify a class name for each element. --> 
    
    <div id="slider1_container" style=" margin:0 auto; position: relative; top: 0px; left: 0px; height:350px; background: #fff; overflow: hidden; ">

       

        <!-- Slides Container -->
        <div data-u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width:950px; height:350px;
            overflow: hidden;">
            <?php $arr=PaidAds::newInstance()->selectPaidAdsData();?>
            <?php foreach($arr as $ar){ ?>
            <?php $item = Item::newInstance()->findByPrimaryKey($ar['pk_paid_ads_id']); ?>
            <?php $item_price=$item['i_price']; ?> 
            <?php if($item_price==null){$item_price="Check with Seller";}else{$item_price=$item_price/1000000;}?>
            <?php $item_title=$item['s_title'];?>
            <?php $item_image=ItemResource::newInstance()->getResource($ar['pk_paid_ads_id']); ?>
            <?php $img_src=osc_base_url().$item_image['s_path'].$item_image['pk_i_id'].".".$item_image['s_extension'];?>
            <?php $item_description  = $item['s_description']; ?>
            
            
            <div>
                <a href="<?php echo osc_item_url_from_item($item);?>">
                    <img class="img-responsive" data-u="image" src="<?php echo $img_src; ?>" alt="" />
                </a>
                <div data-u="caption" data-t="MCLIP|B" style="position: absolute; bottom:0px; left: 0px;
                    width:950px; height: 100px;top:260px;">
                    <div style="position: absolute; top: 0px; bottom:0px;left: 0px; width:950px; height: 100px;
                        background-color: Black; opacity: 0.5; filter: alpha(opacity=50);">
                    </div>
                    <div style="position: absolute; left: 0px;bottom:0px; width: 950px; height: 100px;
                        color: White; font-size: 20px; font-weight: bold; top:20px;line-height: 10px; text-align: center;">
                        <p><?php echo $item_title;?></p>
                        <p>Price: <?php echo $item_price;?></p>
                    </div>
                </div>         
                <div data-u="thumb">
                    <img class="i" src="<?php echo $img_src; ?>" alt="" /><div class="t"><?php echo $item_title; ?></div><div class="c"><?php echo $item_description; ?></div>
                </div>
            </div>

            
            <?php } ?>
        </div>
       
        
       
       
        <div data-u="thumbnavigator" class="jssort11" style="right:0px; height:350px; width:400px; top:0px; background: #f6f6f6;">
            <!-- Thumbnail Item Skin Begin -->
            <div data-u="slides" style="cursor: default;">
                <div data-u="prototype" class="p" style="top: 0; left: 0;">
                    <div data-u="thumbnailtemplate" class="tp"></div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
     
        <!--#endregion ThumbnailNavigator Skin End -->
    </div>

    <!-- Jssor Slider End -->
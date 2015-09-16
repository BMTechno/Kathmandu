<?php
osc_enqueue_script('jquery-ui');
?>
<script>
         $(function() {
            $( "#main-tab" ).tabs();
         });
      </script>
      <style>
         #main-tab{font-size: 14px;}
         .ui-widget-header {
            background:#b9cd6d;
            border: 1px solid #b9cd6d;
            color: #FFFFFF;
            font-weight: bold;
         }
         .tabs-left { 
    position: relative; 
    padding-left: 6.5em; 
} 
.tabs-left .ui-tabs-nav { 
    position: absolute; 
    left: 0.25em; 
    top: 0.25em; 
    bottom: 0.25em; 
    width: 10em; 
    padding: 0.2em 0 0.2em 0.2em; 
} 
.tabs-left .ui-tabs-nav li { 
    right: 1px; 
    width: 100%; 
    border-right: none; 
    border-bottom-width: 1px !important; 
    -moz-border-radius: 4px 0px 0px 4px; 
    -webkit-border-radius: 4px 0px 0px 4px; 
    border-radius: 4px 0px 0px 4px; 
    overflow: hidden; 
} 
.tabs-left .ui-tabs-nav li.ui-tabs-selected, 
.tabs-left .ui-tabs-nav li.ui-state-active { 
    border-right: 1px solid transparent; 
} 
.tabs-left .ui-tabs-nav li a { 
    float: right; 
    width: 100%; 
    text-align: right; 
} 
      </style>
<input type="hidden" value="<?php echo osc_base_url();?>" name="site_url" id="site_url"/>      
<div id="result_return" >
   
</div>
<div id="main-tab" class="">
         <ul>
            <li><a href="#social-url">Social Links</a></li>
            <li><a href="#landing-popup">Landing Popup</a></li>
            <li><a href="#facebook-login">Facebook Login</a></li>
            <li><a href="#contact-us">Contact Us</a></li>
            <li><a href="#home-slider">Home Slider</a></li>
            <li><a href="#about-us">About Us</a></li>
            <li><a href="#paypal-info">Paypal</a></li>
            <li><a href="#newsletter">Newsletter</a></li>
            <li><a href="#premium-ads">Premium Ads</a></li>
            <li><a href="#ad-sense">Ad-Sense</a></li>
            
            <li><a href="#other-settings">Other Settings</a></li>
         </ul>
         <div id="social-url">
            <?php require_once('pages/social-url.php'); ?>
         </div>
         <div id="landing-popup">
             <?php require_once('pages/landing-popup.php'); ?>
         </div>
         <div id="facebook-login">
            <?php require_once('pages/facebook-login.php'); ?>
         </div>
          <div id="contact-us">
            <?php require_once('pages/contact-us.php'); ?>
         </div>
         <div id="home-slider">
            <?php require_once('pages/home-slider.php'); ?>
         </div>
         <div id="about-us">
            <?php require_once('pages/about-us.php'); ?>
         </div>
         <div id="paypal-info">
            <?php require_once('pages/paypal-info.php'); ?>
         </div>
         <div id="newsletter">
            <?php require_once('pages/newsletter.php'); ?>
        </div>
        <div id="premium-ads">
            <?php require_once('pages/premium-ads.php'); ?>
        </div>
        <div id="ad-sense">
            <?php require_once('pages/ad-sense.php');?>
        </div>
        
        <div id="other-settings">
            <?php require_once('pages/other-settings.php'); ?>
        </div>
</div>
<div class="modal"><!-- Place at bottom of page --></div>      
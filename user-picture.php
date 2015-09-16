
    <div class="container-fluid dashboard-page">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="content-section">
                        <!-- <h4 class="my-account">My Profile Picture</h4> -->
                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="account-sidebar">
                                    <img style="height:111px; margin:0 auto;" class="img-responsive img-circle" src="http://media.cirrusmedia.com.au/LW_Media_Library/LW-603-p28-partner-profile.jpg" alt="#">
                                    <h5 style="color:#ffffff; text-align:center;">John Doe</h5>
                                    <h6 style="color:#ffffff; text-align:center; padding-bottom:20px; border-bottom:1px solid #404040;">Member Since May 2012</h6>
                                    <?php echo osc_private_user_menu(); ?>
                                </div>               
                            </div>
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                <h1>
                                    <strong><?php _e('User profile picture', 'nepcoders'); ?></strong>
                                </h1>
                                <form id="uploadimage" action=""  method="POST" and enctype="multipart/form-data">
                                    <div class='picture_main'>
                                        <img id='ppicture' src='<?php echo nc_osc_get_picture_link();?>' name='ppicture' alt='default'/>
                                    </div>  
                                <div class="row">
                                    <input type="file" name="userfile" id="userfile" accept="image/*"/>
                                </div>
                                <div class="row">
                                    <input type="submit" id="uploadimage" value="Change Image"/>
                                </div>
                                <div class="row">
                                    <div id="message"></div>
                                </div>
                                <div class="row">
                                    <h4 id='loading' style="display:none;position:absolute;top:50px;left:850px;font-size:25px;">loading...</h4>
                                </div>
                                </form>
                            </div>
                        </div> 
                    </div>
                </div>                                          
        </div>
	</div>

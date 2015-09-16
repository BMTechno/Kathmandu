    <?php  osc_register_script('jquery-validate', osc_base_url().'oc-content/themes/classified/js/jquery.validate.min.js','jquery'); ?>
    <?php osc_enqueue_script('jquery-validate');?>

    <script type="text/javascript">
            $(document).ready(function() {
                $('#form-signin').validate({
                     submitHandler : function(form)
                    {
                            $.getJSON(
                                "<?php echo osc_base_url(true); ?>?page=ajax&action=check_username_availability",
                                {"s_username": $("#s_name").val()},
                                function(data){
                                    clearInterval(cInterval);
                                    console.log(data);
                                    if(data.exists==0) {
                                         $('button[type=submit], input[type=submit]').attr('disabled', 'disabled');
                                        form.submit();
                                    } else {
                                        $("#available").text('<?php echo osc_esc_js(__("The username is NOT available", "classified")); ?>');
                                        return false;
                                        
                                    }
                                }
                    );
                    }
                });
                
                var cInterval;
                $("#s_name").keyup(function(event) {
                    $("#s_username").val($("#s_name").val());
                });
                $("#s_name").keyup(function(event) {
                    $("#s_username").val($("#s_name").val());
                    if($("#s_name").attr("value")!='') {
                        clearInterval(cInterval);
                        cInterval = setInterval(function(){
                            $.getJSON(
                                "<?php echo osc_base_url(true); ?>?page=ajax&action=check_username_availability",
                                {"s_username": $("#s_name").val()},
                                function(data){
                                    clearInterval(cInterval);
                                    
                                    if(data.exists==0) {
                                        $("#available").text('<?php echo osc_esc_js(__("The username is available", "classified")); ?>');
                                    } else {
                                        $("#available").text('<?php echo osc_esc_js(__("The username is NOT available", "classified")); ?>');
                                    }
                                }
                            );
                        }, 1000);
                    }
                });

            });
        </script>

    <div class="container modal-dialog">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                  <div class="wrapper">
                    <div class="forcemessages-inline">
                        <?php osc_show_flash_message(); ?>
                    </div>   
                      <form class="form-signin" id="form-signin" name="register" action="<?php echo osc_base_url(true); ?>" method="post" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <input type="hidden" name="page" value="register" />
                        <input type="hidden" name="action" value="register_post" />
                        <h2 class="form-signin-heading">Register or 
                            <a id="register_login_button" href="#" role="button" data-toggle="modal" data-target="#login">
                            <span style="color:#FF3300;">Login</span></a></h2>

                        <input type="text" class="form-control" name="s_name" id="s_name" placeholder="User name" required=""/><br/>
                        <input type="hidden" class="form-control" name="s_username" id="s_username"/>    
                        <div id="available"></div>

                        <input type="text" class="form-control" name="s_email" id="s_email" placeholder="Email" required=""/><br/>

                        <input type="password" class="form-control" name="s_password" id="s_password" placeholder="Password" required=""/><br/>

                        <input type="password" class="form-control" name="s_password2" id="s_password2" placeholder="Re-type Password" required=""/><br/>
                        
                        <?php osc_show_recaptcha('register'); ?>
                        <button class="btn btn-lg btn-danger btn-block" type="submit">Register</button><br/> 
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <hr>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <h4>Join With</h4>
                            </div> 
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <hr>
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <?php render_facebook_button(); ?>
                            </div>                               
                        </div>

                      </form>
                  </div>
            </div>
        </div>
    </div>


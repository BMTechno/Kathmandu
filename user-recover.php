    <div class="container modal-dialog">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                  <div class="wrapper">
                      <form class="form-signin" action="<?php echo osc_base_url(true); ?>" method="post" >
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                        <h2 class="form-signin-heading">Forgot Password?</h2>
                        <input type="hidden" name="page" value="login" />
                    <input type="hidden" name="action" value="recover_post" />
                        <input type="text" class="form-control" name="s_email" id="ss_email" placeholder="Email Address" required=""/><br/>
                        <?php osc_show_recaptcha('recover_password'); ?>
                        <button class="btn btn-lg btn-danger btn-block" type="submit">RESET PASSWORD</button>
                      </form>
                  </div>
            </div>
        </div>
    </div>
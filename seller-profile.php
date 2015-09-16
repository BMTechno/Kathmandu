<?php
/**
 * Classified Theme Seller Profile Section
 *
 * @package Osclass
 * @subpackage Classified
 */
?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Seller Profile</h4>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-lg-12 col-centered">
          <img src="<?php echo nc_osc_get_public_picture_link(osc_user_id());?>" class="img-responsive">
        </div>  
      </div>  
      <div class="row">
  				<div class="col-sm-6">Name</div>
  				<div class="col-sm-6"><?php echo osc_user_name(); ?></div>
			</div>
 			<div class="row">
  				<div class="col-sm-6">Country</div>
  				<div class="col-sm-6"><?php echo osc_user_country(); ?></div>
			</div>
			<div class="row">
  				<div class="col-sm-6">Region</div>
  				<div class="col-sm-6"><?php echo osc_user_region(); ?></div>
			</div>
      		<div class="row">
  				<div class="col-sm-6">City</div>
  				<div class="col-sm-6"><?php echo osc_user_city(); ?></div>
			</div>
			<div class="row">
  				<div class="col-sm-6">Address</div>
  				<div class="col-sm-6"><?php echo osc_user_address(); ?></div>
			</div>
      		<div class="row">
  				<div class="col-sm-6">Website</div>
  				<div class="col-sm-6"><?php echo osc_user_website(); ?></div>
			</div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="send-contact-seller">Contact Seller</button>
      </div>
    </div>
  </div>	
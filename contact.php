<?php
/**
 * Classified Contact Form
 *
 * @package Osclass
 * @subpackage Classified
 */
?>
<script>
$(document).ready(function() {
$("#send-contact-seller").click(function (e) {
    $("html, body").addClass("loading");
    var form = $('#contact_form');
        var formData = $(form).serialize();
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData,
            async: true,
        success: function(response) {
            $("html, body").removeClass("loading");
            // Clear the form.
            $('#yourName').val('');
            $('#yourEmail').val('');
            $('#message').val('');
            $('#subject').val('');
            $('#myModal').modal('hide');
        },
        error: function(data) {
            $("html, body").removeClass("loading");
            $('#myModal').modal('hide');
            // Make sure that the formMessages div has the 'error' class.
            $(formMessages).removeClass('success');
            $(formMessages).addClass('error');

            // Set the message text.
            if (data.responseText !== '') {
                $('#contact_messages').text("Error :"+data.responseText);
            } else {
                $('#contact_messages').text('Oops! An error occured and your message could not be sent.');
            }
        }
      })  
  });
});
</script>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Contact Seller</h4>
      </div>
      <div class="modal-body">
        <div id="contact_messages"></div>
        <form action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" id="contact_form">
            <input type="hidden" name="page" value="item" />
            <input type="hidden" name="action" value="contact_post" />
            <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
            <div class="form-group">
                <label for="subject"><?php _e('Subject', 'classified'); ?> (<?php _e('optional', 'classified'); ?>)</label>
                <input type="text" class="form-control" id="subject" name="subject">
            </div>
            <div class="form-group">
                <label for="message"><?php _e('Message', 'classified'); ?></label>
                <textarea class="form-control" id="message" name="message"></textarea>
            </div>
            <div class="form-group">
                <label for="yourName"><?php _e('Your name', 'classified'); ?> (<?php _e('optional', 'classified'); ?>)</label>
                <input type="text" class="form-control" id="yourName" name="yourName">
            </div>
            <div class="form-group">
                <label for="yourEmail"><?php _e('Your e-mail address', 'classified'); ?></label>
                <input type="text" class="form-control" id="yourEmail" name="yourEmail">
            </div>
            <?php osc_run_hook('item_contact_form', osc_item_id()); ?>
            <?php osc_show_recaptcha(); ?>
            <?php osc_run_hook('admin_contact_form'); ?>
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <?php osc_run_hook('admin_contact_form'); ?>
        <button type="button" class="btn btn-primary" id="send-contact-seller">Send message</button>
      </div>
      </form>
    </div>
  </div>

<div class="modal"><!-- Place at bottom of page --></div>      
       
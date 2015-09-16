<?php
/**
 * Classified Theme Landing Popup Section
 *
 * @package Osclass
 * @subpackage Classified
 */
?>
<?php if(!isset($_COOKIE['nepcoders_pop'])){ ?>
<script type="text/javascript">
 $(window).load(function(){
     if ($.cookie('nepcoders_pop') == null) {
         $('#landing_popup').modal('show');
         $.cookie('nepcoders_pop', '1');
     }
 });
</script>
<div class="clearfix"></div> <!-- Modal -->
<div class="modal fade" id="landing_popup" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <?php if(nc_osc_get_popup_head()!="") { ?>
          <h1><?php echo nc_osc_get_popup_head(); ?></h1>
          <?php } ?>
      </div>
      <div class="modal-body">
          <div class="text-center">
             

              <p><?php echo nc_osc_get_popup_body(); ?></p>
              <br>
              <p><b><?php echo nc_osc_get_popup_foot(); ?></b></p></div>

      </div>
      
    </div>
  </div>
</div>
<?php } ?>
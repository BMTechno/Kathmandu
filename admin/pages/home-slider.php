<script>
$(document).ready(function(){


	$('#catId option[selected="selected"]').each(
    function() {
        $(this).removeAttr('selected');
    }
	);
	$("#catId option:first").attr('selected','selected');
	

	$( "#catId" ).change(function() {
	   catId = $( "#catId" ).val();
	   $("html, body").addClass("loading");
	   var FormData = {
            'submit_type'               :'items_populate',
            'catId'						: catId
        };
       var site_url=$('input[name=site_url]').val();
       site_url=site_url+"oc-content/themes/classified/admin/pages/ajax-items.php";   
	   $.ajax({
        type: "POST",
        url: site_url,
        data: FormData,
        success: function(msg){
        	console.log(msg);
          var iObj = jQuery.parseJSON( msg );
          var options = $("#HomeSliderSelect");
          options.empty();
          options.append($("<option value='null' selected='selected'>Select an item</option>"));
          	$.each(iObj,function() {
      			var title = $(this).attr('itemTitle');
      			var id = $(this).attr('itemId');
      			options.append($("<option />").val(id).text(title));
    		});
          //$("#HomeSliderSelect option:first").attr('selected','selected');
          
          $("html,body").removeClass("loading"); 
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
          console.log(XMLHttpRequest);
          $("html,body").removeClass("loading"); 
          return "FALSE";
        }
      });
	});
});	
</script>
<h2>Home Slider</h2>
<input type="checkbox" name="e_home_slider" value="1" <?php echo (osc_get_preference('e_home_slider', 'classified') ? 'checked' : ''); ?> > <?php _e("Enable Home Slider.", 'classified'); ?>
<div class="submit-data" id="submit-home-slider-data" type="button"> Submit</div>
<div class="relative">
	<div id="populate-slider"></div>
</div>
<table style="padding:20px;">
	<tr>
		<td>
			<?php ItemForm::category_select(null, null, __('Select a category', 'classified')); ?>
		</td>
		<td>
			<select id="HomeSliderSelect" name="HomeSliderSelect"></select>
		</td>
	</tr>
	<tr>
		<td colspan="2" style="text-align:center" >
			<div class="submit-data" id="add-home-slider-item" type="button">Add New</div>
		</td>
	</tr>
</table>



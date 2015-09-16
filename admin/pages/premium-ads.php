
<?php $row = osc_get_preference('select_premium_ads_row', 'classified') ; ?>
<?php $column = osc_get_preference('select_premium_ads_column', 'classified') ; ?>
<h1>Premium Ads Settings</d1>
<table class="table">
  <tr>
    <td>
      <label for="publish-fee-check">Premium Ads</label>
    </td>
    <td>  
      <input type="checkbox" name="e_premium_ads_row" value="1" <?php echo (osc_get_preference('e_premium_ads_row', 'classified') ? 'checked' : ''); ?>> Enable Premium ads row 
    </td>
  </tr>
  <!--
  <tr>
    <td>
      <label>Select no. of rows for premium ads</label>
    </td>
    <td>
      <select name="select_premium_ads_row" id="select_premium_ads_row">
       <option value="1" <?php //echo ($row == "1" ? "selected" : ""); ?> >1</option>
       <option value="2" <?php //echo ($row == "2" ? "selected" : ""); ?> >2</option>
       <option value="3" <?php //echo ($row == "3" ? "selected" : ""); ?> >3</option>
      </select> 
    </td>
  </tr>
  <tr>
    <td>
      <label>Select no. of ads per row</label>
    </td>
    <td>
      <select name="select_premium_ads_column" id="select_premium_ads_column">
       <option value="1" <?php //echo ($column == "1" ? "selected" : ""); ?> >1</option>
       <option value="2" <?php //echo ($column == "2" ? "selected" : ""); ?> >2</option>
       <option value="3" <?php //echo ($column == "3" ? "selected" : ""); ?> >3</option>
       <option value="4" <?php //echo ($column == "4" ? "selected" : ""); ?> >4</option>
      </select> 
    </td>
  </tr>
-->
</table>
<div class="submit-data" id="submit-premium-ads-settings" type="button">Submit</div>
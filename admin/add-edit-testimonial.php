<?php
osc_show_flash_message('admin') ;
if(Params::getParam('classified_action')=='insert_testimonial'){
  $title = Params::getParam('title');
  $message = Params::getParam('message') ;
  $image_url = Params::getParam('image_url');

    if(Testimonial::newInstance()->insertTestimonialData($title,$message,$image_url)){ 
      $ct_url='oc-content/themes/classified/admin/testimonial.php';  
       osc_add_flash_ok_message(__('Testimonial Saved', 'classified'),'admin');
       header('Location:'.osc_admin_render_theme_url($ct_url));
    }
}
if(Params::getParam('nep_action')=='edit_testimonial'){
  $title = Params::getParam('title');
  $message = Params::getParam('message') ;
  $image_url = Params::getParam('image_url');
  $tid = Params::getParam('testimonial_id');
  
  if(Testimonial::newInstance()->updateTestimonial($tid,$title,$message,$image_url)){
    $ct_url='oc-content/themes/classified/admin/testimonial.php';  
       osc_add_flash_ok_message(__('Testimonial Updated', 'classified'),'admin');
       header('Location:'.osc_admin_render_theme_url($ct_url));
  }  
}
?>
<h1>Testimonial Information</h1>
<form name="testimonial-form" method="post" action="">
  <?php if(Params::getParam('classified_action')=='edit'){ ?>
  <input type="hidden" name="nep_action" value="edit_testimonial">
  <input type="hidden" name="testimonial_id" value="<?php echo Params::getParam('tid');?>">
  <?php
    $result=Testimonial::newInstance()->getTestimonial(Params::getParam('tid'));
    $title=$result['testimonial_title'];
    $image_url=$result['testimonial_image'];
    $message=$result['testimonial_message'];
  ?>
  <?php }else{ ?>
  <input type="hidden" name="classified_action" value="insert_testimonial"/>
  <?php } ?>
  <div class="form-group">
    <label for="title">Title</label>
    <input class="form-control" id="title" name="title" value="<?php echo $title;?>" placeholder="Testimonial Title" required>
  </div>
  <div class="form-group">
    <label for="url">Image URL</label>
    <input class="form-control" id="image_url" name="image_url" value="<?php echo $image_url;?>" placeholder="http://example.com/eg.jpg">
  </div>
  <div class="form-group">
    <label for="message">Message</label>
    <textarea class="form-control" id="message" name="message" rows="10" required><?php echo $message;?></textarea>
  </div>
  <button type="submit" name="submit" class="btn btn-primary pull-right">Submit</button>
</form>
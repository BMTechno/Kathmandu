<?php
osc_show_flash_message('admin') ;
if(Params::getParam('nepcoders_action')=='send_email'){
	$subject = Params::getParam('subject');
	$message = stripslashes($_REQUEST['message']) ;
    $message = str_replace('src="../', 'src="' . osc_base_url() . '/' , $message) ;
    $recipients = array();
    $recipients = array_merge ($recipients, User::newInstance()->listAll());
    foreach($recipients as $user) {
		$params = array(
        		'subject' => $subject
    			,'to' => $user['s_email']
    			,'to_name' => osc_page_title()
    			,'body' => $message
    			,'alt_body' => strip_tags($message)
    			,'add_bcc' => ''
    			,'from' => 'donotreply@' . osc_get_domain()
    			) ;

    osc_sendMail($params) ;
    osc_add_flash_ok_message(__('Your email has been sent', 'nepcoders'),'admin');
    }
}
?>
<script>
tinyMCE.init({
        mode : "textareas",
        theme : "advanced",
        plugins : "emotions,spellchecker,advhr,insertdatetime,preview,fullpage,save,table,template",

        // Theme options - button# indicated the row# only
        theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,fontselect,fontsizeselect,formatselect",
        theme_advanced_buttons2 : "cut,copy,paste,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,anchor,image,|,code,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "insertdate,inserttime,|,spellchecker,advhr,,removeformat,|,sub,sup,|,charmap,emotions,|,table,fullpage",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true
    });
</script>
<div id="settings_form" style="border: 1px solid #ccc; background: #eee; ">
    <div style="padding: 20px;">
        <div style="float: left; width: 100%;">
            <fieldset>
                <legend style="font-size: 1.4em; padding-bottom: 15px; clear: both;"><?php _e('OSClass Mail Sender', 'osclassmail'); ?></legend>
                <form name="osclassmail_form"  action="<?php echo osc_admin_render_theme_url('oc-content/themes/nepcoders/admin/newsletter.php');?>" method="POST" enctype="multipart/form-data" >
                    <input type="hidden" name="nepcoders_action" value="send_email" />
                    <div style="float: left;">
                        <label style="float: left; padding-right: 15px;"><?php _e('Subject', 'osclassmail'); ?></label><input type="text" name="subject" id="subject" value="" />
                        <br/>
                        <textarea name="message" id="message" rows="30" cols="" >
                        </textarea>
                        <br/>
                        <span style="float:right;"><button type="submit" style="float: right;"><?php _e('Send Mail', 'osclassmail');?></button></span>
                        <br/>
                    </div>
                    <div style="float: right; width: 10%;">
                        <label><?php _e('Keep your users informed and up to date with a News letter, updates, website status, or even a deal of the day. So add your content, click Send and enjoy.','osclassmail'); ?></label>
                            <br/><br/><br/>
                            <b>Who's to receive mail?</b><br /><br/>
                        <label><input type="checkbox" name="users" value="users" checked>Users<br /></label>
                        <label><input type="checkbox" name="admins" value="admins" checked>Administrator/s</label>
                        <br/><br/><br/>
                        <b>Available keywords:</b><br /><br/>
                        {USER_NAME} Personalized name<br/>
                        {WEB_TITLE} The name of your site<br/>
                        {WEB_URL} The URL of your site


                    </div>
                    <br/>
                    <div style="clear:both;"></div>
                </form>
            </fieldset>
        </div>
        <div style="clear: both;"></div>
    </div>
</div>
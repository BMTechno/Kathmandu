<script>
tinyMCE.init({
        mode : "none",
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
tinyMCE.execCommand('mceAddControl', false, 'newsletter_message');
</script>
<div id="settings_form" style="border: 1px solid #ccc; background: #eee; ">
    <div style="padding: 20px;">
        <div style="float: left; width: 100%;">
            <fieldset>
                <legend style="font-size: 1.4em; padding-bottom: 15px; clear: both;"><?php _e('Classified Mail Sender', 'classified'); ?></legend>
                <form name="osclassmail_form"  action="<?php echo osc_admin_render_theme_url('oc-content/themes/nepcoders/admin/newsletter.php');?>" method="POST" enctype="multipart/form-data" >
                    <input type="hidden" name="nepcoders_action" value="send_email" />
                    <div style="float: left;">
                        <label style="float: left; padding-right: 15px;"><?php _e('Subject', 'classified'); ?></label>
                        <input type="text" name="newsletter_subject" id="newsletter_subject" value="" />
                        <br/>
                        <textarea id="newsletter_message" rows="30" cols="" ></textarea>
                        <br/>
                        <span style="float:right;"><div class="submit-data" id="send-newsletter" type="button" > Send Email</div></span>
                        <br/>
                    </div>
                    <br/>
                    <div style="clear:both;"></div>
                </form>
            </fieldset>
        </div>
        <div style="clear: both;"></div>
    </div>
</div>
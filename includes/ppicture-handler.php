<?php
require('../../../../oc-load.php');
require('../dao-class/ppicture.class.php');
if(isset($_FILES["userfile"]["type"]))  
{
    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $_FILES["userfile"]["name"]); 
    $file_extension = end($temporary);

    if ((($_FILES["userfile"]["type"] == "image/png") || ($_FILES["userfile"]["type"] == "image/jpg") || ($_FILES["userfile"]["type"] == "image/jpeg")
            ) && ($_FILES["userfile"]["size"] < 100000)//Approx. 100kb files can be uploaded.
            && in_array($file_extension, $validextensions)) 
	{

        if ($_FILES["userfile"]["error"] > 0)
		{
            echo "Return Code: " . $_FILES["userfile"]["error"] . "<br/><br/>";
        } 
		else 
		{ 
				if (file_exists("../profile_picture/".osc_logged_user_id().'.'.'jpeg')) {
                	unlink("../profile_picture/".osc_logged_user_id().'.'.'jpeg');
				}
				if (file_exists("../profile_picture/".osc_logged_user_id().'.'.'jpg')) {
                	unlink("../profile_picture/".osc_logged_user_id().'.'.'jpg');
				}
				if (file_exists("../profile_picture/".osc_logged_user_id().'.'.'png')) {
                	unlink("../profile_picture/".osc_logged_user_id().'.'.'png');
				} 
								
					$sourcePath = $_FILES['userfile']['tmp_name'];   // Storing source path of the file in a variable
					$targetPath = "../profile_picture/".osc_logged_user_id().'.'.$file_extension;  // Target path where file is to be stored
					move_uploaded_file($sourcePath,$targetPath) ; //  Moving Uploaded file						
					$result=ProfilePicture::newInstance()->findPictureExist(osc_logged_user_id());
					if($result==true){
						ProfilePicture::newInstance()->updatePictureExt(osc_logged_user_id(),$file_extension);
					}else{
						echo ProfilePicture::newInstance()->insertPictureData(osc_logged_user_id(),$file_extension);
					}
					echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
					echo "<br/><b>File Name:</b> " . $_FILES["userfile"]["name"] . "<br>";
					echo "<b>Type:</b> " . $_FILES["userfile"]["type"] . "<br>";
					echo "<b>Size:</b> " . ($_FILES["userfile"]["size"] / 1024) . " kB<br>";
					echo "<b>Temp file:</b> " . $_FILES["userfile"]["tmp_name"] . "<br>";
						
								       
        }        
    }   
	else 
	{
        echo "<span id='invalid'>***Invalid file Size or Type***<span>";
    }
}
?>
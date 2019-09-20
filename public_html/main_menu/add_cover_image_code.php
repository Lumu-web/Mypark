<?php
 session_start();
 
 


$user_id = $_SESSION['user_id'];

$check = getimagesize($_FILES['userfile']["tmp_name"]);
    if ($check !== false) {
       
    
   $target_dir = '../uploads/images/';
   unlink($target_dir.$_SESSION['prevpic']);
   
  
    $target_file = $target_dir . basename($_FILES ['userfile']['name']);
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    $imageFileName = basename($_FILES ['userfile']['name']);
    $image_time = date('y-m-d H:i:s');
	$image_cover = '_cover_image_';
    
    

    


$saveName = $user_id.$image_time.$image_cover.$imageFileName;
 $_SESSION['prevpic'] = $saveName;


    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $target_dir.$saveName)) {}

echo $saveName;
       
			} else {
        echo 'file is not an image';
    }

    


?>
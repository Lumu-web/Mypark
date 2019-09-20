<?php
$target_dir = 'uploads/music/';
    $target_file = $target_dir.basename($_FILES ['userfilemp3']['name']);
    $musicFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    $musicFileName = basename($_FILES ['userfilemp3']['name']);



    if ($musicFileType == "mp3" or
            $musicFileType == "mp4" or
            $musicFileType == "wave") {

   
        if (move_uploaded_file($_FILES['userfilemp3']['tmp_name'], $target_file)) {
			
            
           
}

			}

?>
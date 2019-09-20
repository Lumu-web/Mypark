<?php

$status_id = $_GET['IN_status_id'];
$user_id = $_GET['IN_user_id'];
$status_type = $_GET['IN_status_type'];
include '../dbconnect.php';









if (mysqli_query($conn,"DELETE FROM status_post WHERE status_id = '$status_id' AND user_id = '$user_id';")) {


    if ($status_type == 'picture status') {
        if (mysqli_query($conn,"DELETE FROM images_files WHERE status_id = '$status_id' AND user_id = '$user_id';")) {
            echo '';
        }
    }
    if ($status_type == 'music status') {
        if (mysqli_query($conn,"DELETE FROM music WHERE status_id = '$status_id' AND user_id = '$user_id';")) {
            echo '';
        }
    }
    if ($status_type == 'video status') {
        if (mysqli_query($conn,"DELETE FROM video_file WHERE status_id = '$status_id' AND user_id = '$user_id';")) {
            echo '';
        }
    }

} else {
    
}



;
?>

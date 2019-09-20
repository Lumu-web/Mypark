<?php

session_start();
include '../dbconnect.php';






$media_id = $_GET['IN_media_id'];
$album_id = $_GET['IN_album_id'];


$_SESSION['$media_id'] = $media_id;
$_SESSION['$album_id'] = $album_id;
$_SESSION['more_gallery_clicked'] = 0;


?>         
<script>
    window.open ('http://www.mypark.co.za/gallery/gallery.php','_self',false)
</script>
<?php
?>

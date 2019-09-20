<?php

session_start();
include '../dbconnect.php';






$media_id = '0';
$album_id = '0';

$_SESSION['$media_id'] = $media_id;
$_SESSION['$album_id'] = $album_id;


?>         
<script>
    window.open ('http://www.mypark.co.za/gallery/gallery.php','_self',false)
</script>
<?php
?>

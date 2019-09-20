<?php

session_start();
include '../dbconnect.php';






$media_id = '0';
 $_SESSION['more_results_clicked_messages'] = 0;


$_SESSION['$media_id'] = $media_id;




?>         
<script>
    window.open ('http://www.mypark.co.za/messages/messages.php','_self',false)
</script>
<?php
?>

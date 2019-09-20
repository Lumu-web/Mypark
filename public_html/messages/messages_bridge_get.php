<?php

session_start();
include '../dbconnect.php';






$media_id = $_GET['IN_media_id'];

$_SESSION['more_results_clicked_messages'] = 0;

$_SESSION['$media_id'] = $media_id;

if ($media_id == 1){
 ?>         
<script>
    window.open ('http://www.mypark.co.za/messages/messages_read.php','_self',false)
</script>
<?php
    
}else{
?>         
<script>
    window.open ('http://www.mypark.co.za/messages/messages.php','_self',false)
</script>
<?php

}
?>

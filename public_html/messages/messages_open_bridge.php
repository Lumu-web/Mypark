<?php
session_start();
include '../dbconnect.php';






$message_id = $_GET['IN_message_id'];


$_SESSION['message_id'] = $message_id;

//mark message as read

if (mysqli_query($conn,"UPDATE messages SET Message_status = 'read' WHERE Message_id = '$message_id';")) {
    
}



?>         
<script>
    window.open ('http://www.mypark.co.za/messages/messages_open_respond.php','_self',false)
</script>
<?php
?>

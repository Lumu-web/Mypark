<?php



$message_id = $_GET['IN_message_id'];


include '../dbconnect.php';









        if (mysqli_query($conn,"DELETE FROM messages WHERE Message_id = '$message_id'")) {
            
  ?>         
        <script>
            window.open ('http://www.mypark.co.za/messages/messages_read.php','_self',false)
        </script>
        <?php
        
}
   
    
    
    
;
?>


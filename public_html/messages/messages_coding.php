<?php

session_start();

$media_id = $_SESSION['$media_id'];

if (isset($_SESSION['user_id']) === false){
     ?>         
        <script>
            window.open ('http://www.mypark.co.za/index.php','_self',false)
        </script>
        <?php
    
}else{
$user_id = $_SESSION['user_id'];
}

$errormessage = "";
$alerttype = '';



$message_id_array = array();
$message_topic_array = array();
$message_text_array = array();
$message_date_array = array();
$message_status_array = array();
$message_receiver_id_array = array();
$message_sender_id_array = array();


 //count unread notifications
    $unread_count = 0;
    $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
    $num_rows = mysqli_query($conn,"SELECT * FROM notifications WHERE  Notified_user_id = '$user_id' AND Notifier_user_id != '$user_id' AND Notification_status = 'unchecked'  ");
    if (mysqli_num_rows($num_rows) > 0) {



        $query = "SELECT * FROM notifications WHERE  Notified_user_id = '$user_id' AND Notifier_user_id != '$user_id' AND Notification_status = 'unchecked' ";

        $response = $db->query($query);
        $unchecked_count = '0';

        while ($row = $response->fetch_assoc()) {
            $unchecked_count = $unchecked_count + 1;
        }
        $show_unchecked_count = '<div class="bdg color" nbr=&nbsp;'.$unchecked_count.'></div>';
    } else {
        $show_unchecked_count = '';
    }



//count unread messages

$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
$num_rows = mysqli_query($conn,"SELECT * FROM messages WHERE Receiver_id = '$user_id' AND Message_status = 'unread' ");
if (mysqli_num_rows($num_rows) > 0) {



    $query = "SELECT * FROM messages WHERE Receiver_id = '$user_id' AND Message_status = 'unread' ";

    $response = $db->query($query);
    $unread_count = '0';

    while ($row = $response->fetch_assoc()) {
        $unread_count = $unread_count + 1;
    }
    $show_Navunread = '<div class="bdg color" nbr=&nbsp;'. $unread_count.'></div>';
} else {
    $show_Navunread = '';
}

//count unread messages

$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
$num_rows = mysqli_query($conn,"SELECT * FROM messages WHERE Receiver_id = '$user_id' AND Message_status = 'unread' ");
if (mysqli_num_rows($num_rows) > 0) {



    $query = "SELECT * FROM messages WHERE Receiver_id = '$user_id' AND Message_status = 'unread' ";

    $response = $db->query($query);
    $unread_count = '0';

    while ($row = $response->fetch_assoc()) {
        $unread_count = $unread_count + 1;
    }
    $show_unread = '<div class="bdg color" nbr=&nbsp;'.$unread_count.'></div>';
} else {
    $show_unread = '';
}


if (isset($_POST['send_message'])) {
    $compose_username = mysqli_real_escape_string($conn, $_POST['uname']);
    $compose_topic = mysqli_real_escape_string($conn, $_POST['topic']);
    $compose_text = mysqli_real_escape_string($conn, $_POST['messageText']);
    $compose_time = date('y-m-d H:i:s');



    //get userid
    $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

    $query = "SELECT * FROM login_user WHERE Login_name = '$compose_username'";

    $response = $db->query($query);
    $num_rows = mysqli_query($conn,"SELECT * FROM login_user WHERE Login_name = '$compose_username'");
    if (mysqli_num_rows($num_rows) > 0) {

        while ($row = $response->fetch_assoc()) {
            $composed_user_id = $row['User_id'];
        }



        if (mysqli_query($conn,"INSERT INTO messages(Message_topic,Message_text,Message_date,Message_status, Receiver_id, Sender_id) VALUES('$compose_topic','$compose_text','$compose_time','unread','$composed_user_id','$user_id')")) {
            $errormessage = " <big>Success</big> Message sent ";
            $alerttype = 'class="alert alert-success"';
        } else {
            echo 'error';
        }
    } else {
        $errormessage = " <big>Error</big> Username does not exist...Go to explore and check spelling ";
        $alerttype = 'class="alert alert-danger"';
    }
};





//select media type
if ($media_id == '0') {
    $show_media = '<li class="active"><a href="#">Compose Message <span class="sr-only">(current)</span></a></li>
                    <li><a href="messages_bridge_get.php?IN_media_id=1">Messages</a></li>
                    ';
    $show_current_messages = "Compose Message";
} elseif ($media_id == '1') {
    $show_media = '<li><a href="messages_bridge_get.php?IN_media_id=0">Compose Message </a></li>
                    <li class="active"><a href="#">Messages<span class="sr-only">(current)</span></a></li>
                  ';
    $show_current_messages = "Messages";
}else
{
$show_media = '<li class="active"><a href="#">Compose Message <span class="sr-only">(current)</span></a></li>
                    <li><a href="messages_bridge_get.php?IN_media_id=1">Messages</a></li>
                    ';
    $show_current_messages = "Compose Message";	
}



//show accounts to messages
$message_count = 0;

$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

$user_list = "SELECT * FROM messages WHERE Sender_id = '$user_id' OR Receiver_id = '$user_id' order by Message_date Desc";

$response = $db->query($user_list);
while ($row = $response->fetch_assoc()) {
    $message_id = $row['Message_id'];
    $message_topic = $row['Message_topic'];
    $message_text = $row['Message_text'];
    $message_date = $row['Message_date'];
    $message_status = $row['Message_status'];
    $message_receiver_id = $row['Receiver_id'];
    $message_sender_id = $row['Sender_id'];


    $message_id_array[$message_count] = $message_id;
    $message_topic_array[$message_count] = $message_topic;
    $message_text_array[$message_count] = $message_text;
    $message_date_array[$message_count] = $message_date;
    $message_status_array[$message_count] = $message_status;
    $message_receiver_id_array[$message_count] = $message_receiver_id;
    $message_sender_id_array[$message_count] = $message_sender_id;

    //show sender
    $user_details_query = "SELECT * FROM login_user,user_details WHERE  login_user.user_id = '$message_sender_id' AND user_details.user_id = '$message_sender_id'  ";

    $response2 = $db->query($user_details_query);

    while ($row = $response2->fetch_assoc()) {

        $sender_username = $row['Login_name'];
        $sender_name = $row['User_name'];
        $sender_surname = $row['User_surname'];

        $sender_username_array[$message_count] = $sender_username;
        $sender_name_array[$message_count] = $sender_name;
        $sender_surname_array[$message_count] = $sender_surname;
    }

   
    //show reciever
    $user_details_query = "SELECT * FROM login_user,user_details WHERE  login_user.user_id = '$message_receiver_id' AND user_details.user_id = '$message_receiver_id'  ";

    $response2 = $db->query($user_details_query);

    while ($row = $response2->fetch_assoc()) {

        $receiver_username = $row['Login_name'];
        $receiver_name = $row['User_name'];
        $receiver_surname = $row['User_surname'];

        $receiver_username_array[$message_count] = $receiver_username;
        $receiver_name_array[$message_count] = $receiver_name;
        $receiver_surname_array[$message_count] = $receiver_surname;
    };


    $message_count = $message_count + 1;
}
;

function show_pro_pic($INuser_id) {

    //show profile pic

    $num_rows = mysqli_query($conn,"SELECT * FROM images_files WHERE Image_Description = 'Uploaded_profile_picture' AND Image_Status = 'Active' AND User_id = '$INuser_id' ");
    if (mysqli_num_rows($num_rows) > 0) {
        $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

        $query = "SELECT * FROM images_files WHERE User_id = '$INuser_id' AND Image_Status = 'Active'";

        $response = $db->query($query);


        while ($row = $response->fetch_assoc()) {
            $image_name_post = $row['Image_Name'];
        }
    } else {

        $image_name_post = '../uploads/images/no_profile_pictre.jpg';
    }
    return $image_name_post;
}

?>

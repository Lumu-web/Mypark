<?php

session_start();

$media_id = $_SESSION['$media_id'];
$album_id = $_SESSION['$album_id'];
if (isset($_SESSION['user_id']) === false){
     ?>         
        <script>
            window.open ('http://www.mypark/index.php','_self',false)
        </script>
        <?php
    
}else{
$user_id = $_SESSION['user_id'];
}

$image_name_array = array();
$image_named_array = array();

$album = '';

$more_gallery_clicked = $_SESSION['more_gallery_clicked'];

if ($more_gallery_clicked > 0) {

    $start = $_SESSION['start'];
    $end = $_SESSION['end'];
} else {

    $start = '0';
    $end = '10';
};

//show older posts
if (isset($_POST['show_older_posts'])) {
    $start = $start + 10;
    $end = $end + 10;

    $_SESSION['start'] = $start;
    $_SESSION['end'] = $end;
    $_SESSION['more_gallery_clicked'] = 1;
};


//select media type
if ($media_id == '0'){
    $show_media = '<li class="active"><a href="#">Pictures <span class="sr-only">(current)</span></a></li>
                    ';
}elseif ($media_id == '1') {
    $show_media = '<li><a href="gallery_bridge_get.php?IN_media_id=1&IN_album_id=0">Pictures </a></li>';
            
}else{
    $show_media = '<li><a href="gallery_bridge_get.php?IN_media_id=0&IN_album_id=0">Pictures </a></li>';
                   
}





  


//count unread messages
$unread_count = 0;
$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
$num_rows = mysqli_query($conn,"SELECT * FROM messages WHERE Message_status = 'unread' AND Receiver_id = '$user_id' ");
if (mysqli_num_rows($num_rows) > 0) {



    $query = "SELECT * FROM messages WHERE Message_status = 'unread' AND Receiver_id = '$user_id' ";

    $response = $db->query($query);
    $unread_count = '0';

    while ($row = $response->fetch_assoc()) {
        $unread_count = $unread_count + 1;
    }
    $show_unread = '<div class="bdg color" nbr='.$unread_count.'></div>';
}else{
    $show_unread = '';
}

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
    $show_unchecked_count = '<div class="bdg color" nbr='.$unchecked_count.'></div>';
}else{
    $show_unchecked_count = '';
}














?>

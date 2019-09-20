<?php
include '../dbconnect.php';
include 'messages_coding.php';
include_once("../analyticstracking.php");
//for all the icons
$logo = '<img src="../Icons/MP Logo.png" height="30px" width="60px">';
$upload_music = '<img src="../buttons/musicbutton.png" height="27px" width="23px">';
$upload_youtube = '<img src="../buttons/youtube.png" height="24px" width="25px">';
$down_icon = '<img src="../buttons/download.png" height="25px" width="25px">';
$upload_pic = '<img src="../buttons/original pic.png"height="28px" width="28px">';
$upload_vid = '<img src="../buttons/original video.png" height="20px" width="20px">';
$comment_btn = '<img src="../buttons/Comment.png" height="22px" width="22px">';
$trash = '<img src="../buttons/delete.png" height="15px" width="15px">';
$download_btn = '<img src="../buttons/download_btn.png" height="18px" width="18px">';
$journey = '<img src="../buttons/journey.png" height="23px" width="23px">';
$explore = '<img src="../buttons/explore.png" height="23px" width="23px">';
$home = '<img src="../buttons/home-xxl.png" height="20px" width="20px">';
$notify = '<img src="../buttons/notification.png" height="23px" width="23px">';
$gallery = '<img src="../buttons/gallery.png" height="23px" width="23px">';
$message = '<img  src="../buttons/message.png" height="25px" width="25px">';
$logout = '<img src="../buttons/Logout-128.png" height="20px" width="20px">';
$settings = '<img src="../buttons/tool.png"
height="20px" class="editpic" width="20px">';
$download_icon = '<img src="../buttons/download.png"
height="20px" class="editpic" width="20px">';





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
}else{
    $show_unchecked_count = '';
}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">


        <title>MyPark</title>


        <link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/mypark_main.css" rel="stylesheet">

        <link href="../css/blog.css" rel="stylesheet">

<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
   <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
<link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">


        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>












    </head>

    <body>

<nav class="navbar navbar-default navbar-fixed-top ">
    
                <div class="navbar-header ">
                   
                    <a class="navbar-brand" href="../main_menu/Home.php" alt="Logo"><?php echo $logo; ?></a>
                    <a class="navbar-brand" href="../my_journey/journey.php" alt="Logo"><?php echo $journey; ?></a>
                            <a class="navbar-brand" href="../explore/explore.php" alt="Logo"><?php echo $explore; ?></a>
                      
                        <a class="navbar-brand" href="../messages/messages.php" alt="Logo"><?php echo $show_unread; ?><?php echo $message; ?></a>
                        <a class="navbar-brand active" href="../notifications/notifications.php" alt="Logo"><?php echo $show_unchecked_count ?><?php echo $notify; ?></a>
                </div>
               
        </nav>
<p>&nbsp;</p>
<p>&nbsp;</p>

        
        <form action="messages.php" method="POST" class="form-signin">

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        
                        <?php echo $show_media; ?>
                    </ul>
                    

                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <div id="alertbox1"  <?php echo $alerttype ?>><?php echo $errormessage; ?></div> 
                   
                    
        
                     <div class="col-md-4">
                   
                     <label for="inputUsername" class="sr-only">Username</label>
                         <input type="text" name="uname" id="inputText" class="form-control" placeholder="Username" required autofocase />
                     </div>
                    
                    <div class="col-md-4">
                        
                     
                     <label for="inputTopic" class="sr-only">Topic</label>
                         <input type="text" name="topic" id="inputText" class="form-control" placeholder="Message Topic" autofocase />
                     </div>
                     
                     
                     <div class="col-md-10">
                         <h6>Type in message</h6>
                         <textarea name="messageText" id="inputText" class="form-control"  autofocase /></textarea>
                     </div>
                    
                    <div class="col-md-3">
                        <br>
                          <button name="send_message" class="btn btn-md btn-info btn-block" type="submit">Send message</button>
                     </div>
                    
    
    
    


                </div>
            </div>
        </div>


      





        </form>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../js/bootstrap.min.js"></script>

        <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>

<?php
session_start();
include '../dbconnect.php';
if (isset($_SESSION['user_id']) === false){
     ?>         
        <script>
            window.open ('http://www.mypark.co.za/index.php','_self',false)
        </script>
        <?php
    
}else{
$user_id = $_SESSION['user_id'];
}
//for all the icons
$logo = '<img src="../Icons/MyPark Logo.png" height="30px" width="60px">';
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


?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

        <title>MyPark</title>


  

<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/mypark_main.css" rel="stylesheet">
<link href="../css/blog.css" rel="stylesheet">


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
<p>&nbsp;</p>

<form action="notifications.php" method="POST">

                          
 <div class="container">
                   
                       <div class="col-md-6 col-md-push-3  col-sm-6 col-sm-push-3 col-xs-12 blog-post table-border ">
                                <div class="row">
                        <h4 class="page-header">Notifications</h4><a href="clear.php?IN_user_id=<?php echo $user_id; ?>" >Clear Notifications</a>
                        
                        

<?php
$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
$num_rows = mysqli_query($conn,"SELECT * FROM notifications WHERE Notified_user_id = '$user_id' AND Notifier_user_id != '$user_id' ");
if (mysqli_num_rows($num_rows) > 0) {



    $query = "SELECT * FROM notifications WHERE Notified_user_id = '$user_id' AND Notification_status = 'unchecked' AND Notifier_user_id != '$user_id' ORDER BY Notification_time DESC ";

    $response = $db->query($query);
    $notif_count = '0';

    while ($row = $response->fetch_assoc()) {


        $notif_id = $row['Notification_id'];
        $notifier_user_id = $row['Notifier_user_id'];
        $notified_user_id = $row['Notified_user_id'];
        $notif_desc = $row['Notification_desc'];
        $notif_status = $row['Notification_status'];
        $notif_time = $row['Notification_time'];
        $notif_status_id = $row['Status_id'];

    $time = floor(time() - strtotime($notif_time));

                                    $days = 0;
   if ($time < 60) {
                                if ($time == 1 OR $time == 0) {
                                    $show_date = "just now";
                                } else {
                                    $show_date = "";
                                }
                                    } elseif ($time < 3600) {

                                        $min = floor($time / 60);
                                        $sec = $time - ($min * 60);
                                        if ($min == 1) {
                                            $show_date = $min . "m";
                                        } else {
                                            $show_date = $min . "m";
                                        }
                                    } elseif ($time < 86400) {
                                        $hours = floor($time / 3600);

                                        if ($hours == 1) {
                                            $show_date = $hours . "h";
                                        } else {
                                            $show_date = $hours . "h";
                                        }
                                    } elseif ($time < 604800) {

                                        $days = floor($time / 86400);

                                        if ($days == 1) {
                                            $show_date = $days . "d";
                                        } else {
                                            $show_date = $days . "d";
                                        }
                                    } else {

                                       $postdate = date_create($notif_time);
										
                                        $show_date = date_format($postdate,"d M y");
                                    }




        if ($notif_desc == 'like status') {
            $show_notif_type = 'liked your status ';
        } elseif($notif_desc == 'like comment') {
            $show_notif_type = 'commented on your status ';
        } elseif($notif_desc == 'follow') {
            $show_notif_type = 'followed your account ';
        } elseif($notif_desc == 'tagged you') {
            $show_notif_type = 'tagged you';
        } elseif($notif_desc == 'like comment reply') {
            $show_notif_type = 'commented on a status you commented on';
        }
		
		

        $db2 = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

        $query2 = "SELECT * FROM login_user, user_details WHERE user_details.user_id = '$notifier_user_id' AND login_user.user_id = '$notifier_user_id'";

        $response2 = $db2->query($query2);

        while ($row = $response2->fetch_assoc()) {
            $user_name = $row['User_name'];
            $user_surname = $row['User_surname'];
            $user_specialty = $row['User_specialty'];
            $user_username = $row['Login_name'];
			$query_for_pro_pc = "SELECT Image_Name FROM images_files WHERE Image_Status = 'Active' AND Image_Description = 'Uploaded_profile_picture' AND User_id = '$notifier_user_id'";
			$response3 = $db2->query($query_for_pro_pc);
			
			while($row = $response3->fetch_assoc())
			{
				$user_pro_pic = '../uploads/images/'.$row['Image_Name'];
			}
        }


if ($notif_desc == 'follow'){
    
            echo '<p> </p><div class="notifcation-block"><img class="notification-pro-pic" src="' . $user_pro_pic . '">
            <a href="../explore/notification_journey_bridge.php?IN_user_id='.$notifier_user_id.'&IN_notification_id='.$notif_id.'" ><big>' . $user_username . ' </big> <div class="row" style="margin-left:40px">' . $show_notif_type .'<div style="color:#999; float:right;">'. $show_date.'</div></div></a></div>
           

</p><hr>';
    
    
}else{


        echo '<p> </p> <div class="notifcation-block"><img class="notification-pro-pic" src="' . $user_pro_pic . '">
            <a href="comments.php?IN_status_id=' . $notif_status_id . '&IN_user_id=' . $user_id . '&IN_notification_id=' . $notif_id . '" ><big>' . $user_username . ' </big>  <div class="row" style="margin-left:40px">' . $show_notif_type .'<div style="color:#999; float:right;">'. $show_date.'</div></div></a>
           

</p></div> <hr>';

}



        $notif_count = $notif_count + 1;
    }
}
?>







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
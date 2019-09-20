<?php
include '../dbconnect.php';
include 'Home_coding.php';

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


        <title>My Park | Settings</title>


        <link href="../css/bootstrap.css" rel="stylesheet">


        <link href="../css/blog.css" rel="stylesheet">
        
 <link href="../css/lightbox.css" rel="stylesheet">




        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>










    </head>

    <body>


      
                <nav class="navbar navbar-default navbar-fixed-top">

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
<div class="container col-md-10 col-md-push-2">

                <div class="blog-header">
                    <div class="row">

                        <div class="col-md-9">
                           

                        </div>

                    </div>
                </div>
                 

                <div class="row">
                    <div class="container">
                        <div class="col-md-8 col-md-push-1 blog-main ">

                            <div class="col-md-8 col-md-push-3 blog-post table-border">
                                <div class="row">
                                    
                                    <a  class="btn btn-md btn-default btn-block" href="Change_profile_pic.php"><font size="1px">Change Profile Picture</font></a>
                                    <a  class="btn btn-md btn-default btn-block" href="Change_cover_pic.php"><font size="1px">Change Cover Picture</font></a>
                                   
                                     <a class="btn btn-md btn-default btn-block"  href= "<?php echo $profile_type ?>"><font size="1px">Edit Profile</font></a>
                                
                                    <a  class="btn btn-md btn-default btn-block"  href="../terms_of_service.php"><font size="1px">Terms of Service</font></a>
                                    
                                    <a class="btn btn-md btn-default btn-block" href="../privacy_policy.php"><font size="1px">Privacy Policy</font></a>
                                    <a  class="btn btn-md btn-default btn-block"  href="../index.php" type="submit"><font size="1px">Logout</font>&nbsp;<?php echo $logout; ?></a>




        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../js/bootstrap.min.js"></script>
<script src="../css/lightbox.min.js"></script>
        <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
    
    <footer class="panel-footer"></footer>
</html>

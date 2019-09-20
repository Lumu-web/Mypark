<?php
include '../dbconnect.php';
include 'gallery_coding.php';
//for all the icons
$logo = '<img src="../Icons/MyPark Logo.png" height="40px" width="60px">';
$upload_music = '<img src="../buttons/musicbutton.png" height="20px" width="20px">';
$upload_pic = '<img src="../buttons/original pic.png"height="20px" width="20px">';
$upload_vid = '<img src="../buttons/original video.png" height="20px" width="20px">';
$comment_btn = '<img src="../buttons/Comment.png" height="19px" width="17px">';
$trash = '<img src="../buttons/delete.png" height="20px" width="20px">';
$journey = '<img src="../buttons/journey.png" height="20px" width="20px">';
$explore = '<img src="../buttons/explore.png" height="20px" width="20px">';
$home = '<img src="../buttons/home-xxl.png" height="20px" width="20px">';
$notify = '<img src="../buttons/notification.png" height="20px" width="20px">';
$gallery = '<img src="../buttons/gallery.png" height="20px" width="20px">';
$message = '<img  src="../buttons/message.png" height="20px" width="20px">';
$logout = '<img src="../buttons/Logout-128.png" height="20px" width="20px">';
$settings = '<img src="../buttons/tool.png"
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


        <link href="../css/blog.css" rel="stylesheet">

 <link href="../css/lightbox.css" rel="stylesheet">



        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>












    </head>

    <body>


      
         <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
                        <span class="sr-only"><a href="../notifications/notifications.php"><?php echo $show_unchecked_count; ?></a></span>
                        <span class="sr-only">><a href="../notifications/notifications.php"><?php echo $show_unchecked_count; ?></a></span>
                        <span class="sr-only">><a href="../notifications/notifications.php"><?php echo $show_unchecked_count; ?></a></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                   <a class="navbar-brand" href="Home.php" alt="Logo"><?php echo $logo; ?></a>
               
        </nav>
     
        <form action="gallery.php" method="POST" class="form-signin">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3 col-md-2 sidebar">
                        
                        <ul class="nav nav-sidebar">
                                 <p>&nbsp;</p>
  
 <p>&nbsp;</p>
  
                            <li><a href="terms_of_service.php"><h6>Terms of Service</h6></a></li>
                            <li><a href="general.php"><h6>General</h6></a></li>
                            <li class="active"><a href="legal.php"><h6>Legal</h6></a></li>
                            <li><a href="safety.php"><h6>Safety</h6></a></li>
                         
                           
                        </ul>

                    </div>
                    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                     


                                                     <h3> Legal </h3>
<p>
MyPark is owned and controlled by MyPark and we are protected by copyright, trademark, patent and other trade secrets and many other laws. You will edit, remove or altar any copyright trademark, service mark or other proprietary rights notices incorporated in or accompanying the MyPark content and you will not reproduce modify, adapt prepare derivative works based on, perform, display, publish, distribute, transmit, broadcast, sell, license or otherwise exploit the MyPark Content. The MyPark logo and name are trademarks of MyPark, and may not be copied used nor imitated anywhere else. Unless in a case where permission has been granted. All page contents such as graphics borders, icons, button icons and scripts are service marks; trademark and trade dress of MyPark and may also not be copied or imitated or used without permission from MyPark. 
</p>

                          
                           
<li>We respect others people’s rights and expect you to do so as well.</li>
<li>We provide tools that help you protect your intellectual property rights.</li>
<li>Your account will be disabled if you infringe other users’ intellectual property rights should an incident occur more than once</li>







                        <div class="col-xs-12 col-sm-12 col-md-12">
                              

                    </div>
                </div>
            </div>








        </form>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../css/lightbox.min.js"></script>

        <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>

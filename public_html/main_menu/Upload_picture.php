<?php
session_start();
include '../dbconnect.php';

$logo = '<img src="../Icons/MP Logo.png" height="30px" width="60px">';
$upload_music = '<img src="../buttons/musicbutton.png" height="27px" width="23px">';
$upload_youtube = '<img src="../buttons/youtube.png" height="24px" width="25px">';
$down_icon = '<img src="../buttons/download.png" height="25px" width="25px">';
$upload_pic = '<img src="../buttons/original pic.png" height="28px" width="28px">';
$upload_vid = '<img src="../buttons/original video.png" height="20px" width="20px">';
$comment_btn = '<img src="../buttons/Comment.png" height="15px" width="15px">';
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


 function gethashtags($text)
{
  //Match the hashtags
  preg_match_all('/(^|[^a-z0-9_])#([a-z0-9_]+)/i', $text, $matchedHashtags);
  $hashtag = '';
  // For each hashtag, strip all characters but alpha numeric
  if(!empty($matchedHashtags[0])) {
	  foreach($matchedHashtags[0] as $match) {
		  $hashtag .= preg_replace("/[^a-z0-9]+/i", "", $match).',';
	  }
  }
    //to remove last comma in a string
return rtrim($hashtag, ',');
}
//usage
$text = "#mypark is the best, #mypark wall script";

 
       
function convert_clickable_links($message)
{
	$parsedMessage = preg_replace(array('/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:\'".,<>?«»“”‘’]))/', '/(^|[^a-z0-9_])@([a-z0-9_]+)/i', '/(^|[^a-z0-9_])#([a-z0-9_]+)/i'), array('<a href="$1" target="_blank">$1</a>', '$1<a href="">@$2</a>', '$1<a href="hashtag_bridge.php?hashtag=$2">#$2</a>'), $message);
	return $parsedMessage;
}


$user_id = $_SESSION['user_id'];
$target_dir = '../uploads/images/';


$errormessage = '';
            $alerttype = '';


$show_pic = '';



if (isset($_POST['post_picture'])) {
	
	$check = getimagesize($_FILES['userfile']["tmp_name"]);
	
	if ($check !== false) {
		$target_dir = '../uploads/images/';
    $target_file = $target_dir . basename($_FILES ['userfile']['name']);
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
     
	$imageFileName = basename($_FILES ['userfile']['name']);
	 $image_time = date('y-m-d H:i:s');
	
	

   

    $_SESSION['imageFileName'] = $image_time.$imageFileName;
    $_SESSION['pro_pic'] = $imageFileName;
    $_SESSION['$image_time'] = $image_time;
	
	$saveName = $user_id.$image_time.$imageFileName;
  $saveName = str_replace(" ","_",$saveName);

    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $target_dir.$saveName)) {}
        
		
		$status_post_text = str_replace("'","\'",strip_tags(trim($_POST['status_text'])));
		$status_post_text =  nl2br($status_post_text);
$hashtag = gethashtags($status_post_text);
    $status_post_type = 'picture status';
    $status_post_time = date('y-m-d H:i:s');
    
    $Iname = mysqli_real_escape_string($_POST['Iname']);
    $Ialbum = mysqli_real_escape_string($_POST['Ialbum']);
    $Idesc = mysqli_real_escape_string($_POST['Idesc']);
    
    If ($Ialbum == ''){
        $Ialbum = 'unsorted album';
    }
    
if (mysqli_query($conn,"INSERT INTO status_post(Status_text,Status_type,Status_time,User_id,hashtag) VALUES('$status_post_text','$status_post_type','$status_post_time','$user_id','$hashtag')")) {
        
$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
$query = "SELECT * FROM status_post WHERE User_id = '$user_id' AND Status_time = '$status_post_time'";

$response = $db->query($query);

while ($row = $response->fetch_assoc()) {
  $status_post_id = $row['Status_id'];}
   $imageFileName = $user_id.$_SESSION['imageFileName'];
   $imageFileName = str_replace(" ","_",$imageFileName);
   $image_time =  $_SESSION['$image_time'];
   if (mysqli_query($conn,"INSERT INTO images_files (Image_Name,Image_date, Image_named, Image_Album, Image_Description, Image_Status, User_id,Status_id) VALUES ('$imageFileName','$image_time','$Iname', '$Ialbum', '$Idesc', 'Deactivated', '$user_id',$status_post_id);")) {
                    
       ?>         
        <script>
            window.open ('http://www.mypark.co.za/main_menu/Home_bridge.php','_self',false)
        </script>
        <?php
            
            
            };
    }
        
    } else {
         $errormessage = " <big>Error</big> File selected not an image) ";
            $alerttype = 'class="alert alert-danger"';
    }

}


if (isset($_POST['view_file'])) {


    
    $target_dir = '../uploads/images/';
    $target_file = $target_dir . basename($_FILES ['userfile']['name']);
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
     
	$imageFileName = basename($_FILES ['userfile']['name']);
	 $image_time = date('y-m-d H:i:s');
	
	

    $check = getimagesize($_FILES['userfile']["tmp_name"]);

    $_SESSION['imageFileName'] = $image_time.$imageFileName;
    $_SESSION['pro_pic'] = $imageFileName;
    $_SESSION['$image_time'] = $image_time;
        



    if ($check !== false) {
        
    } else {
         $errormessage = " <big>Error</big> File selected not an image) ";
            $alerttype = 'class="alert alert-danger"';
    }

$saveName = $user_id.$image_time.$imageFileName;


    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $target_dir.$saveName)) {
        
        $show_pic_part1 = '<img class="img-thumbnail-responsive col-md-12 col-sm-12 col-xs-12" src=" ';
    $show_pic_part2 = '    "alt="Loading...';
    
    $show_pic = $show_pic_part1.$target_dir.$saveName.$show_pic_part2;
   
    } else {
        
    }
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
    $show_unread = '<div class="bdg color" nbr=&nbsp;'.$unread_count.'></div>';
}else{
    $show_unread = '';
}
//count unread notifications

$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
$num_rows = mysqli_query($conn,"SELECT * FROM notifications WHERE  Notified_user_id = '$user_id' AND Notifier_user_id != '$user_id' AND Notification_status = 'unchecked'  ");
if (mysqli_num_rows($num_rows) > 0) {



    $query = "SELECT * FROM notifications WHERE  Notified_user_id = '$user_id' AND Notifier_user_id != '$user_id' AND Notification_status = 'unchecked' ";

    $response = $db->query($query);
    $unchecked_count = '0';

    while ($row = $response->fetch_assoc()) {
        $unchecked_count = $unchecked_count + 1;
    }
    $show_unchecked_count = '<div class="bdg color" nbr=&nbsp;'. $unchecked_count.'></div>';
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
<form enctype ="multipart/form-data" action="Upload_picture.php" method="POST" class="form-signin" >
         

              
 <div class="container">
                   
                       <div class="col-md-6 col-md-push-3  col-sm-6 col-sm-push-3 col-xs-10 col-xs-push-1 blog-post ">
                                <div class="row">
                                    <div id="alertbox1"  <?php echo $alerttype ?>><?php echo $errormessage; ?></div>
                                    
     
 <input name="userfile" class="btn btn-xs btn-block" type="file"/>
                                    <hr>
                             	     <label for="inputIalbum" class="sr-only"><font size="1px">Image Album</font></label>
                                    <input type="text" name="Ialbum" id="inputIalbum" class="form-control" placeholder="Image album" autofocase />


                                    <hr>


                                    <p align="center"><font size="1px">Caption</font></p>
                                    <label for="inputStatus" class="sr-only"></label>
                                    <textarea name="status_text" id="inputStatus" class="form-control" maxlength="350"  autofocase /></textarea>
                                    <hr>


                                    <button name="post_picture" class="btn btn-sm btn-info btn-block" type="submit"><font size="1px">Post Picture</font></button>

                                </div>
                            </div>
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
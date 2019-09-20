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

$user_id = $_SESSION['user_id'];
$target_dir = '../uploads/music/';

$errormessage = '';
$alerttype = '';
         





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
    $show_unchecked_count = '<div class="bdg color" nbr=&nbsp;'.$unchecked_count.'></div>';
}else{
    $show_unchecked_count = '';
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
} else {
    $show_unread = '';
}

if (isset($_POST['post_track'])) {
	echo '<script> uploadFile();</script>';
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

        <link href="../css/bootstrap3_player.css" rel="stylesheet">


        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>












    </head>

    <body>
<script>
/* Script written by Adam Khoury @ DevelopPHP.com */
/* Video Tutorial: http://www.youtube.com/watch?v=EraNFJiY0Eg */
function _(el){
	return document.getElementById(el);
}
function uploadFile(){
	
	
	var file = _("userfilemp3").files[0];
	
	var albumname = _("inputTalbum").value;
	var statustext = _("inputStatus").value;
	var trackname = _("inputTname").value;
	var trackartist = _("inputTartist").value;
	var albumcover = _("inputalbumart").files[0];
	var allowdownload = _("allowdownload").value;
	
	
	
			
			
	if(file.type == 'audio/mp3' | file.type == 'audio/mpeg' | file==null){
	
	var formdata = new FormData();
	formdata.append("userfilemp3", file);
	formdata.append("Talbum", albumname)
	formdata.append("status_text", statustext);
	formdata.append("Tname", trackname);
	formdata.append("Tartist", trackartist);
	formdata.append("inputalbumart", albumcover);
	formdata.append("allowdownload", allowdownload);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "file_upload_parser.php");
	ajax.send(formdata);
	
	
}else{ wrongfile() }
}

function wrongfile()
{
	document.getElementById('alertbox1').className += 'alert'; document.getElementById('alertbox1').className += ' alert-danger';  _("alertbox1").innerHTML = "Select valid audio file"; window.scrollTo(0, 50);
}
function progressHandler(event){
	_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	_("status").innerHTML = percent+"% uploaded... please wait";
	
}
function completeHandler(event){
	_("status").innerHTML = event.target.responseText;
	_("progressBar").value = 0;
	_("loaded_n_total").innerHTML = "..finalizing..please wait";
	setTimeout(function(){ window.open ('http://www.mypark.co.za/main_menu/Home_bridge.php','_self',false); }, 4000);
		
}
function errorHandler(event){
	_("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
	_("status").innerHTML = "Upload Aborted";
}
</script>
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
 <form enctype ="multipart/form-data" id="upload_form"  method="post" class="form-signin"  id="myupload">
 
 <div class="container">
                   
                       <div class="col-md-6 col-md-push-3  col-sm-6 col-sm-push-3 col-xs-10 col-xs-push-1 blog-post ">
                                <div class="row">
                                    <div id="alertbox1"  <?php echo $alerttype ?>><?php echo $errormessage; ?></div> 
                                 
                                    <p>Choose track to upload <input type="file" name="userfilemp3" id="userfilemp3" class="btn-xs"></p>
  
  
<p>&nbsp;</p>
<p>Choose Album Art (optional)   <input name="inputalbumart" id="inputalbumart" class="btn-xs" type="file" accept="*" multiple /></p>
                                    
                                    
                                    <label for="inputTartist" c>Artist</label>
                                    <input type="text" name="Tartist" id="inputTartist" class="form-control" placeholder="Track Artist" autofocase />


                                    <label for="inputTname" class="blog-text">Title</label>
                                    <input type="text" name="Tname" id="inputTname" class="form-control" placeholder="Track Title" autofocase />

                                    <label for="inputTalbum"  class="blog-text">Album</label>
                                    <input type="text" name="Talbum" id="inputTalbum" class="form-control" placeholder="Track Album" autofocase />
                                    <br>
                                    <p  class="blog-text">Allow users to download?</p>
                                    <select name="allowdownload" id="allowdownload" class="form-control" >
                                    <option value="yes" selected>
                                    yes
                                    </option>
                                    <option value="no">
                                    no
                                    </option>
                                    </select>
<hr>
                                    
                                    <label for="inputCaption" class="blog-text">Caption</label>
                                    <label for="inputStatus" class="sr-only"></label>
                                    <textarea name="status_text" id="inputStatus" class="form-control"  autofocase /></textarea>
                                    <hr>
  <input type="button" onClick="uploadFile()" value="Upload File" name="post_track" class="btn btn-md btn-info btn-block">
  <div id="bar_blank">
   <div id="bar_color"></div>
  </div>
  <div id="status"></div>
                        
  <progress id="progressBar" value="0" max="100" ></progress>
  <p id="status"></p>
  <p id="loaded_n_total"></p>
</form>
        
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrap3_player.js"></script>

        <script src="../assets/js/ie10-viewport-bug-workaround.js">  </script>
    </body>
</html>
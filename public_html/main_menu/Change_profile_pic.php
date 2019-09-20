<?php
session_start();
include '../dbconnect.php';

//for all the icons
$logo = '<img src="../Icons/MyPark Logo.png" height="30px" width="60px">';
$upload_music = '<img src="../buttons/musicbutton.png" height="20px" width="20px">';
$upload_pic = '<img src="../buttons/original pic.png"height="20px" width="20px">';
$upload_vid = '<img src="../buttons/original video.png" height="20px" width="20px">';
$comment_btn = '<img src="../buttons/Comment.png" height="19px" width="17px">';
$trash = '<img src="../buttons/delete.png" height="15px" width="15px">';
$journey = '<img src="../buttons/journey.png" height="20px" width="20px">';
$explore = '<img src="../buttons/explore.png" height="20px" width="20px">';
$home = '<img src="../buttons/home-xxl.png" height="20px" width="20px">';
$notify = '<img src="../buttons/notification.png" height="20px" width="20px">';
$gallery = '<img src="../buttons/gallery.png" height="20px" width="20px">';
$message = '<img  src="../buttons/message.png" height="20px" width="20px">';
$logout = '<img src="../buttons/Logout-128.png" height="20px" width="20px">';
$settings = '<img src="../buttons/tool.png"
height="20px" class="editpic" width="20px">';



$user_id = $_SESSION['user_id'];
$show_pic = '';

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

if (isset($_POST['upload_pro_pic'])) {
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



    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $target_dir.$saveName)) {}

        $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

        $query = "SELECT * FROM images_files WHERE User_id = '$user_id' AND Image_Status = 'Active'";

        $response = $db->query($query);

        while ($row = $response->fetch_assoc()) {
            $image_id = $row['Image_id'];
           	$image_file_name = $row['Image_Name'];

            if (mysqli_query($conn,"DELETE FROM images_files WHERE Image_id = '$image_id';")) {
                
				unlink(	'../uploads/images/'.$image_file_name);
            }         
        }
        
         $status_post_time = date('y-m-d H:i:s');
        
        if (mysqli_query($conn,"INSERT INTO status_post(Status_text,Status_type,Status_time,User_id) VALUES('Changed profile picture...','picture status','$status_post_time','$user_id')")) {
        
$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
$query = "SELECT * FROM status_post WHERE User_id = '$user_id' AND Status_time = '$status_post_time'";

$response = $db->query($query);

while ($row = $response->fetch_assoc()) {
   $status_post_id = $row['Status_id'];}
         $imageFileName = $user_id.$_SESSION['imageFileName'];
   $image_time =  $_SESSION['$image_time'];
        }
        
        $INimageFileName = $_SESSION['pro_pic'] ;
		
	
		
        if (mysqli_query($conn,"INSERT INTO images_files (Image_Name, Image_Album, Image_Description, Image_Status, User_id, Status_id) VALUES ('$imageFileName', 'Profile_Pictures', 'Uploaded_profile_picture', 'Active', '$user_id', '$status_post_id');")) {
              
            
             ?>         
        <script>
            window.open ('http://www.mypark.co.za/main_menu/Home.php','_self',false)
        </script>
        <?php
            
            
            }
			} else {
        echo 'file is not an image';
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
        echo 'file is not an image';
    }


$saveName = $user_id.$image_time.$imageFileName;



    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $target_dir.$saveName)) {
        
        $show_pic_part1 = '<img class="img-thumbnail" src=" ';
    $show_pic_part2 = '    "alt="Generic placeholder image" width="140" height="140">';
    
    $show_pic = $show_pic_part1.$target_dir.$saveName.$show_pic_part2;
    } else {
        $show_pic = 'file not uploaded';
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
    $show_unread = '<div class="bdg color" nbr=&nbsp;'.$unchecked_count.'></div>';
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


        <title>My Park | Upload Profile Picture</title>


        <link href="../css/bootstrap.css" rel="stylesheet">


        <link href="../css/blog.css" rel="stylesheet">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

     









    <link rel="stylesheet" href="../css/cropper.min.css">
  <link rel="stylesheet" href="../css/main.css">
    </head>

    <body>

<script>
function _(el){
	return document.getElementById(el);
}

var original_img_name;

function uploadpic(input)
{
	  if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
				
				enablepic1();
            }
}
function crop()
{
	var formdata = new FormData();
	
	var x1 = _('x1').value;
 var y1 = _('y1').value;
 var x2 = _('x2').value;
var y2 = _('y2').value;
var imgwidth = _('width').value;
var imgheight = _('height').value; 

formdata.append('x1',x1);
formdata.append('y1',y1);
formdata.append('x2',x2);
formdata.append('y2',y2);
formdata.append('width',imgwidth);
formdata.append('height',imgheight);
formdata.append('image_to_crop',original_img_name);


	var ajax = new XMLHttpRequest();
/*	ajax.upload.addEventListener("progress", progressHandler, false);*/
	ajax.addEventListener("load", completeCrop, false);
	/*ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);*/
	ajax.open("POST", "cropping_coding.php");
	ajax.send(formdata);
}

function uploadFile(){
	
	
	var file = _("userfile").files[0];
	
	var fileType = file["type"];
	
	
	
	var ValidImageTypes = ["image/gif", "image/jpeg", "image/jpg", "image/png"];
if ($.inArray(fileType, ValidImageTypes) < 0) {
    document.getElementById('pictureerror').style.display = 'block';
}else
{
	 document.getElementById('pictureerror').style.display = 'none';
	var formdata = new FormData();
	formdata.append("userfile", file);
	var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false)
	ajax.addEventListener("load", completeHandler, false);
	/*ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);*/
	ajax.open("POST", "add_pro_pic.php");
	ajax.send(formdata)
	
}
			var thi = true;
			
	if(thi==true){
	
	;
	
	
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
	
	enablepic(event.target.responseText);	
	//setTimeout(function(){ window.open ('http://www.mypark.co.za/main_menu/Home_bridge.php','_self',false); }, 4000);
		
}

function completeCrop(event){
	/*document.getElementById('photo').src = event.target.responseText;
	original_img_name = event.target.responseText;
	selectedpic();*/
	
	//setTimeout(function(){ window.open ('http://www.mypark.co.za/main_menu/Home_bridge.php','_self',false); }, 4000);
		
}
/*function errorHandler(event){
	_("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
	_("status").innerHTML = "Upload Aborted";
}*/
</script>
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
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="../main_menu/Home.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('home','','../buttons/home-xxl.png',1)"><img src="../buttons/home-xxl_2.png" alt="Home" width="20" height="20"></a>
                        <li><a href="../my_journey/journey.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('journey','','../buttons/journey_2.png',1)"><img src="../buttons/journey.png" alt="Journey" width="20" height="20"></a>
                        <li><a href="../explore/explore.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('explore','','../buttons/explore_2.png',1)"><img src="../buttons/explore.png" alt="Explore" width="20" height="20" ></a>
                        <li><a href="../gallery/gallery_bridge.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('gallery','','../buttons/gallery_2.png',0)"><img src="../buttons/gallery.png" alt="Gallery" width="25" height="25"></a>
                        <li><a href="../messages/messages_bridge.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image8','','../buttons/message_2.png',1)"><?php echo $show_unread; ?><img src="../buttons/message.png" alt="Message" width="25" height="25"></a>
                        <li><a href="../notifications/notifications.php"><?php echo $show_unchecked_count; ?><?php echo $notify; ?></a>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../index.php"onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('logout','','../buttons/logout.png',1)"><img src="../buttons/logout.png" width="25" height="25"></a>
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>




        <form enctype ="multipart/form-data" method="POST" class="form-signin" >
            <div class="container col-md-10 col-md-push-2">

                <div class="blog-header">
                    <div class="row">

                        <div class="col-md-9">
                            <p class="blog-title " ><font size="3px">Upload Profile Picture</font></p>

                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="container">
                        <div class="col-md-8 blog-main ">

                            <div class="col-md-7 col-md-push-3 blog-post ">
                                <div class="row table-border">
                                    <hr>
                                    <input name="userfile" id="userfile" class="btn-xs btn-xs btn btn-sm btn-block" type="file"/> 
                                   
                                    <?php echo $show_pic ?>
                                    <hr>





                                    <input type="button" onClick="uploadFile()" name="upload_cover_pic" class="btn btn-sm btn-primary btn-block" value="Select Profile Pic">
                                    
                                    
                                    <input type='file' onchange="uploadpic(this);" />
<progress id="progressBar" value="0" max="100" ></progress>
  <p id="status"></p>
  <p id="loaded_n_total"></p>
                                </div>
                                <div id="pictureerror" class="alert alert-danger" style="display:none">
                                Please Select Picture File
                                </div>
                                <div class="container-crop">
  <p class="blog-title " ><font size="3px"> Drag on image and select an area to crop </p>
    <div>
    <div class="row">

    
    
      
        <div class="img-container">
          <img id="image" src="" alt="Picture">
        </div>
     
    </div>
    <div class="row">
      <div class="col-md-9 docs-buttons">
        <!-- <h3 class="page-header">Toolbar:</h3> -->
     

        
       

        <div class="btn-group btn-group-crop">
          <button type="button" class="btn btn-primary" data-method="getCroppedCanvas">
            <span class="docs-tooltip">
              Crop
            </span>
          </button>
          
        </div>

        <!-- Show the cropped image in modal -->
        <div class="modal fade docs-cropped" id="getCroppedCanvasModal" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" role="dialog" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="getCroppedCanvasTitle">New Profile Picture</h4>
              </div>
              <div class="modal-body"></div>
              <div class="modal-footer">
                <a class="btn btn-primary" hidden="true" id="download" href="javascript:void(0);" download="cropped.jpg"></a>
                Returning to main page.<br>Please Wait
              </div>
            </div>
          </div>
        </div><!-- /.modal -->

        
      </div><!-- /.docs-buttons -->

    </div>
  </div>
</div>

                            </div>
                        </div>                        
                    </div>          
                </div>
            </div>

        </form>


        
        
        <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="../js/cropper.min.js"></script>
  <script src="../js/main.js"></script>
  
<script>
	function enablepic(pictoenable)
	{
	document.getElementById('image').src = '../uploads/images/' + pictoenable;
	document.getElementsByClassName('container-crop')[0].style.display = "block";
	loadcropper(1);
	}
	
	function enablepic1()
	{
	
	document.getElementsByClassName('container-crop')[0].style.display = "block";
	loadcropper(1);
	}

	</script>
    </body>
</html>

<?php
session_start();
include '../dbconnect.php';

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

        $image_name_post = 'no_profile_picture.jpg';
    }
    return $image_name_post;
}


$user_id = $_SESSION['user_id'];

$errormessage = "";
$alerttype = '';

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

$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

$query = "SELECT * FROM login_user, user_details WHERE login_user.User_id = '$user_id' AND user_details.User_id = '$user_id'";

$response = $db->query($query);

while ($row = $response->fetch_assoc()) {
    $user_name = $row['User_name'];
    $user_surname = $row['User_surname'];
    $user_specialty = $row['User_specialty'];
    $user_gender = $row['User_gender'];
    $user_email = $row['User_email'];
    $user_slogan = $row['User_slogan'];
    $user_username = $row['Login_name'];
    $user_pass = $row['Login_password'];
};

if (isset($_POST['save_changes'])) {

    $user_name = mysqli_real_escape_string($conn, $_POST['uname']);
    $user_surname = mysqli_real_escape_string($conn, $_POST['usurname']);
    $user_gender = mysqli_real_escape_string($conn, $_POST['ugender']);
    $user_username = mysqli_real_escape_string($conn, $_POST['uusername']);
    $user_specialty = mysqli_real_escape_string($conn, $_POST['uspecialty']);
    $user_email = mysqli_real_escape_string($conn, $_POST['uemail']);
    $user_slogan = mysqli_real_escape_string($conn, $_POST['uslogan']);
        $upassword = mysqli_real_escape_string($conn, $_POST['upass']);
    $urepass = mysqli_real_escape_string($conn, $_POST['urepass']);
    
    if ($upassword == $urepass) {

        
        if (mysqli_query($conn,"UPDATE user_details SET User_name = '$user_name', User_surname = '$user_surname', User_specialty = '$user_specialty', 
                User_gender = '$user_gender', User_email = '$user_email', User_slogan = '$user_slogan' WHERE User_id = '$user_id';")) {
            if (mysqli_query($conn,"UPDATE login_user SET Login_name = '$user_username', Login_password = '$upassword' WHERE User_id = '$user_id';")) {
                  
                ?>         
    <script>
        window.open ('http://www.mypark.co.za/main_menu/Edit_Profile.php','_self',false)
    </script>
    <?php
                
            }
        } else {
            
        }
    }else{
        
        $errormessage = " <big>Warning</big> Passwords don't match...'";
        $alerttype = 'class="alert alert-danger"';
        
       
    }
}

if (isset($_POST['change_profile_picture'])) {
    ?>         
    <script>
        window.open ('http://www.mypark.co.za/main_menu/Change_profile_pic.php','_self',false)
    </script>
    <?php
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


        <title>My Park | Edit Profile</title>


        <link href="../css/bootstrap.css" rel="stylesheet">


        <link href="../css/blog.css" rel="stylesheet">


        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>



<script type="text/javascript">

function AvoidSpace(event) {
    var k = event ? event.which : window.event.keyCode;
    if (k == 32) return false;
    
    }
function makeLowercase() {
document.form1.outstring.value = document.form1.instring.value.toLowerCase();
 }
$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(1500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);
 
});





</script>








    </head>

    <body>


        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid ">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
                        <span class="sr-only"><a href="../notifications/notifications.php"><?php echo $show_unchecked_count; ?></a></span>
                        <span class="sr-only">><a href="../notifications/notifications.php"><?php echo $show_unchecked_count; ?></a></span>
                        <span class="sr-only">><a href="../notifications/notifications.php"><?php echo $show_unchecked_count; ?></a></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="my_journey/journey.php" alt="Logo"><?php echo $logo; ?></a>
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

<p>&nbsp;</p>
<p>&nbsp;</p>
        <form action="Edit_Profile.php" method="POST" class="form-signin">
            <div class="container col-md-10 col-md-push-1">

                <div class="blog-header">
                    <div class="row">

                        

                    </div>
                </div>
                <div id="alertbox1"  <?php echo $alerttype ?>><?php echo $errormessage; ?></div> 

                <div class="row">
                    <div class="container">
                        <div class="col-md-6 col-md-push-3 blog-main  ">
                       


                            <div class="col-md-6  col-md-push-2 blog-post">
                          
                                <div class="row">
                                    <hr>
                                    <button name="change_profile_picture" class="btn btn-md btn-default btn-block" type="submit" >Change Profile Picture</button>
                                    <hr>
                                    <h6>Type in your Slogan</h4>
                                    <label for="inputSlogan" class="sr-only">Slogan</label>
                                    <textarea name="uslogan" id="inputUsername" class="form-control"  autofocase /><?php echo $user_slogan ?></textarea>
                                    <hr>
                                    

                      

                                    <label for="inputLoginName" class="sr-only">Username</label>
                                    <input type="text" name="uusername" id="inputUsername" class="form-control"  onkeypress="return AvoidSpace(event);" value="<?php echo  $user_username; ?>" autofocase />

                                   
                             
                        <select name="uspecialty" class="form-control" id="inputSpecialty" value="<?php echo $user_specialty; ?>" autofocase />
                        <option value="<?php echo $user_specialty; ?>"><?php echo $user_specialty; ?></option>
                        <option value="Animation">Animation</option>
                        <option value="Enterprise">Enterprise</option>
                      	<option value="Music">Music</option>
                        <option value="Photography">Photography</option>
                        <option value="Modeling">Modeling</option>
                        <option value="Sport">Sport</option>
                        <option value="Dance">Dance</option>
                        <option value="Blogger">Blogger</option>
                        <option value="Culinary Arts">Culinary Arts</option>
                        <option value="Videography">Videography</option>
                        <option value="Events">Events</option>
                        <option value="Architecture">Architecture</option>
			<option value="Interior Design">Interior Design</option>
                        <option value="Entertainment">Entertainment</option>
                        <option value="Radio">Radio</option>
                 	<option value="Web design">Web Design</option>
                       	<option value="Fashion">Fashion</option>
                        <option value="Visual Art">Visual Art</option>
                        <option value="Skateboarding">Skateboarding</option>
                        <option value="Sneaker head">Sneaker head</option>
                        <option value="Performance Art">Performance Art</option>
                        <option value="Technology">Technology</option>
                        <option value="Make-up Artist">Make-up Artist</option>
                     
                        <option value="Tattooist">Tattooist</option>
                        <option value="Poetry">Poetry</option
                       
                      
                        ><option value="Fan">Fan</option>
                                    

                                    <label for="inputEmail" class="sr-only">Email</label>
                                    <input type="email" name="uemail" id="inputEmail" class="form-control" onkeypress="return AvoidSpace(event);" value="<?php echo  $user_email; ?>"  />

                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="upass" id="password" class="form-control" placeholder="Enter a login Password" value="<?php echo $user_pass; ?>" />
                                    <label for="repass" class="sr-only">Re-password</label>
                                    <input type="password" name="urepass" id="repassword" class="form-control" placeholder="Re-enter Password" value="<?php  echo $user_pass; ?>" />




                                    <button name="save_changes" class="btn btn-md btn-warning btn-block" type="submit">Save changes</button>

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
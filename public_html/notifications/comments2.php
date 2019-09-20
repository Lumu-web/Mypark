2<?php
session_start();
include '../dbconnect.php';
//for all the icons
$logo = '<img src="../Icons/MP Logo.png" height="30px" width="60px">';
$upload_music = '<img src="../buttons/musicbutton.png" height="24px" width="23px">';
$down_icon = '<img src="../buttons/download.png" height="25px" width="25px">';
$upload_pic = '<img src="../buttons/original pic.png"height="28px" width="30px">';
$upload_vid = '<img src="../buttons/original video.png" height="20px" width="20px">';
$comment_btn = '<img src="../buttons/Comment.png" height="20px" width="20px">';
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






$status_id = $_SESSION['status_id'];
if (isset($_SESSION['user_id']) === false){
     ?>         
        <script>
            window.open ('http://www.mypark.co.za/index.php','_self',false)
        </script>
        <?php
    
}else{
$user_id = $_SESSION['user_id'];
}





$comments_count = '0';
$start = '0';




//show status post

$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

$status_posts = "SELECT * FROM status_post WHERE status_post.status_id = '$status_id'";

$response = $db->query($status_posts);

while ($row = $response->fetch_assoc()) {
    $posted_status_id = $row['Status_id'];
    $posted_status_text = $row['Status_text'];
    $posted_status_type = $row['Status_type'];
    $posted_status_time = $row['Status_time'];
    $posted_status_user_id = $row['User_id'];

 $posted_status_youtube = $row['Youtube_embed'];

	  if($posted_status_youtube != 'null' || $posted_status_youtube != '')

	  {

		  $posted_status_youtube = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtu.be\/([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe style=\"margin:auto\" width=\"98%\" height=\"315\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$posted_status_youtube);

		  $posted_status_youtube = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe style=\"margin:auto\" width=\"98%\" height=\"315\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$posted_status_youtube);

	  }


    $user_details_query = "SELECT * FROM user_details, login_user WHERE user_details.user_id = $posted_status_user_id AND  login_user.user_id = $posted_status_user_id  ";

    $response2 = $db->query($user_details_query);

    while ($row = $response2->fetch_assoc()) {
 $posted_user_id = $row['User_id'];
            $posted_username = $row['Login_name'];
            $posted_name = $row['User_name'];
            $posted_surname = $row['User_surname'];

            $post_user_id_array[$post_count] = $posted_user_id;
            $post_username_array[$post_count] = $posted_username;
            $post_name_array[$post_count] = $posted_name;
            $post_surname_array[$post_count] = $posted_surname;
    }
}
;


$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

$query = "SELECT * FROM comments_posts WHERE Status_id = $status_id ORDER BY Comment_time DESC";

$response = $db->query($query);

while ($row = $response->fetch_assoc()) {

    $Comment_id = $row['Comment_id'];
    $Comment_text = $row['Comment_text'];
    $Comment_time = $row['Comment_time'];
    $Comment_User_id = $row['User_id'];

    $posted_comments_id[$comments_count] = $Comment_id;
    $posted_comments_text[$comments_count] = $Comment_text;
    $posted_comments_time[$comments_count] = $Comment_time;
    $posted_comments_User_id[$comments_count] = $Comment_User_id;


    $db2 = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

    $query2 = "SELECT * FROM login_user, user_details WHERE user_details.user_id = '$Comment_User_id'AND login_user.user_id = '$Comment_User_id'";

    $response2 = $db2->query($query2);

    while ($row = $response2->fetch_assoc()) {
        $user_name = $row['User_name'];
        $user_surname = $row['User_surname'];
        $user_specialty = $row['User_specialty'];
        $user_username = $row['Login_name'];

        $posted_comments_name[$comments_count] = $user_name;
        $posted_comments_surname[$comments_count] = $user_surname;
        $posted_comments_specialty[$comments_count] = $user_specialty;
        $posted_comments_username[$comments_count] = $user_username;
    };


    $comments_count = $comments_count + 1;
}

$end = $comments_count;



//comment button
//comment button

if (isset($_POST['comment_post'])) {
    $status_comment_text = mysqli_real_escape_string($_POST['comment_text']);
    $status_comment_time = date('y-m-d H:i:s');

    $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

    $query = "SELECT * FROM status_post WHERE Status_id = '$status_id'";

    $response = $db->query($query);


    while ($row = $response->fetch_assoc()) {
        $notified_id = $row['User_id'];
    }




    if (mysqli_query($conn,"INSERT INTO comments_posts(Comment_text,Comment_time, User_id, Status_id) VALUES('$status_comment_text','$status_comment_time','$user_id','$status_id')")) {
        if (mysqli_query($conn,"INSERT INTO notifications(Notifier_user_id,Notified_user_id,Notification_desc,Status_id,Notification_status) VALUES('$user_id','$notified_id','like comment','$status_id','unchecked')")) {
			
            ?>         
            <script>
                window.open ('http://www.mypark.co.za/main_menu/comments2.php','_self',false)
            </script>
            <?php
            exit();
        }
    } else {
        echo 'error';
    }
};

function notify_all_people_have_commented($statusid_tocheck)
{
	$result_of_query = mysqli_query($conn,"SELECT *
FROM `comments_posts`
WHERE `Status_id` = '$statusid_tocheck'");

 while ($row = $$result_of_query->fetch_assoc()) {
            $userswhocommented = $row['User_id'];
			
			
			if (mysqli_query($conn,"INSERT INTO notifications(Notifier_user_id,Notified_user_id,Notification_desc,Status_id,Notification_status) VALUES('$user_id','$userswhocommented','like comment reply','$statusid_tocheck','unchecked')"));
			
        }
		
	
}
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

function show_pic_status($INstatus_id) {

    //show post pic name

    $num_rows = mysqli_query($conn,"SELECT * FROM images_files WHERE Status_id = '$INstatus_id' ");
    if (mysqli_num_rows($num_rows) > 0) {
        $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

        $query = "SELECT * FROM images_files WHERE Status_id = '$INstatus_id'";

        $response = $db->query($query);


        while ($row = $response->fetch_assoc()) {
            $image_name_post = $row['Image_Name'];
        }
    } else {

        echo 'error';
        ;
    }
    return $image_name_post;
}

function show_music_status($INstatus_id) {

    //show post track name

    $num_rows = mysqli_query($conn,"SELECT * FROM music WHERE Status_id = '$INstatus_id' ");
    if (mysqli_num_rows($num_rows) > 0) {
        $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

        $query = "SELECT * FROM music WHERE Status_id = '$INstatus_id'";

        $response = $db->query($query);


        while ($row = $response->fetch_assoc()) {
            $music_name_post = $row['Music_File_Name'];
        }
    } else {

        echo 'error';
        ;
    }
    return $music_name_post;
}

function convert_clickable_links($message)
{
	$parsedMessage = preg_replace(array('/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:\'".,<>?«»“”‘’]))/', '/(^|[^a-z0-9_])@([a-z0-9_]+)/i', '/(^|[^a-z0-9_])#([a-z0-9_]+)/i'), array('<a href="../../../$1" target="_blank">$1</a>', '$1<a href="at_bridge.php?username=$2">@$2</a>', '$1<a href="hashtag_bridge.php?hashtag=$2">#$2</a>'), $message);
	return $parsedMessage;
}
function show_album_status($INstatus_id) {

    //show post album name

    $num_rows = mysqli_query($conn,"SELECT * FROM music WHERE Status_id = '$INstatus_id' ");
    if (mysqli_num_rows($num_rows) > 0) {
        $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

        $query = "SELECT * FROM music WHERE Status_id = '$INstatus_id'";

        $response = $db->query($query);


        while ($row = $response->fetch_assoc()) {
            $music_cover_post = $row['Music_cover'];
        }
    } else {

        echo 'error';
        ;
    }
    return $music_cover_post;
}

function show_track_status($INstatus_id) {

    //show post track name

    $num_rows = mysqli_query($conn,"SELECT * FROM music WHERE Status_id = '$INstatus_id' ");
    if (mysqli_num_rows($num_rows) > 0) {
        $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

        $query = "SELECT * FROM music WHERE Status_id = '$INstatus_id'";

        $response = $db->query($query);


        while ($row = $response->fetch_assoc()) {
            $music_name_post = $row['Music_File_Name'];
        }
    } else {

        echo 'error';
        ;
    }
    return $music_name_post;
}

function show_track_type_status($INstatus_id) {

    //show post track name

    $num_rows = mysqli_query($conn,"SELECT * FROM music WHERE Status_id = '$INstatus_id' ");
    if (mysqli_num_rows($num_rows) > 0) {
        $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

        $query = "SELECT * FROM music WHERE Status_id = '$INstatus_id'";

        $response = $db->query($query);


        while ($row = $response->fetch_assoc()) {
            $music_type_post = $row['Music_File_Type'];
        }
    } else {

        echo 'error';
        ;
    }
    return $music_type_post;
}

function show_track_details_status($INstatus_id) {

    //show post track name

    $num_rows = mysqli_query($conn,"SELECT * FROM music WHERE Status_id = '$INstatus_id' ");
    if (mysqli_num_rows($num_rows) > 0) {
        $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

        $query = "SELECT * FROM music WHERE Status_id = '$INstatus_id'";

        $response = $db->query($query);


        while ($row = $response->fetch_assoc()) {
            $music_file_name = $row['Music_File_Type'];
            $music_file_track = $row['Music_track'];
            $music_file_album = $row['Music_album'];
            $music_file_artist = $row['Music_artist'];
            $music_file_release = $row['Music_Release'];
        }

        $music_details = '<div class="container col-md-10 ">
            </br>
        <p><big>TRACK:</big>' . $music_file_track . ' </p>      
               
</div>
';
    } else {

        echo 'error';
        ;
    }
    return $music_details;
}

function show_video_status($INstatus_id) {

    //show post track name

    $num_rows = mysqli_query($conn,"SELECT * FROM video_file WHERE Status_id = '$INstatus_id' ");
    if (mysqli_num_rows($num_rows) > 0) {
        $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

        $query = "SELECT * FROM video_file WHERE Status_id = '$INstatus_id'";

        $response = $db->query($query);


        while ($row = $response->fetch_assoc()) {
            $video_name_post = $row['Video_file_name'];
        }
    } else {

        echo 'error';
        ;
    }
    return $video_name_post;
}

function send_tag_notification($entertag)
{
    $string = $entertag;

    if (preg_match_all('/(?<!\w)@(\w+)/', $string, $matches))
    {
       
		

        // $users should now contain array: ['SantaClaus', 'Jesus']
        foreach ($matches[0] as $user)
        {
	$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");	 	
$user = trim(substr($user,1));

$query_string = 'Select * from login_user where Login_name = "'.$user.'"';
$response4 = $db->query($query_string);

$user_notifying = $_SESSION['user_id'];
while ($row4 = $response4->fetch_assoc()) {

$statusids = getstatusid($user_notifying);
	       $notification_desc = 'mentioned you';
                $al_user = $row4['User_id'];     
                    if (mysqli_query($conn,"INSERT INTO notifications(Notifier_user_id,Notified_user_id,Notification_desc,Notification_status,Status_id) VALUES('$user_notifying','$al_user ','$notification_desc','unchecked','$statusids')"))
					{
						
					}
}
		}
    }
}

function show_video_type_status($INstatus_id) {

    //show post video type name

    $num_rows = mysqli_query($conn,"SELECT * FROM video_file WHERE Status_id = '$INstatus_id' ");
    if (mysqli_num_rows($num_rows) > 0) {
        $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

        $query = "SELECT * FROM video_file WHERE Status_id = '$INstatus_id'";

        $response = $db->query($query);


        while ($row = $response->fetch_assoc()) {
            $video_type_post = $row['Video_file_type'];
        }
    } else {

        echo 'error';
        ;
    }
    return $video_type_post;
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

function show_video_details_status($INstatus_id) {

    //show post track name

    $num_rows = mysqli_query($conn,"SELECT * FROM video_file WHERE Status_id = '$INstatus_id' ");
    if (mysqli_num_rows($num_rows) > 0) {
        $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

        $query = "SELECT * FROM video_file WHERE Status_id = '$INstatus_id'";

        $response = $db->query($query);


        while ($row = $response->fetch_assoc()) {
            $video_name = $row['Video_name'];
            $video_by = $row['Video_by'];
            $video_description = $row['Video_description'];
            $video_album = $row['Video_album'];
            $video_uploaded = $row['Uploaded_date'];
        }

        $video_details = '<div class="container col-md-10 ">
            </br>
        <p><big>VIDEO NAME:</big>' . $video_name . ' </p>      
      <p><big>VIDEO BY:</big>' . $video_by . ' </p>      
          <p><big>VIDEO ALBUM:</big>' . $video_album . ' </p>
              
    <p><big>VIDEO DESCRIPTION:</big>' . $video_description . ' </p>         
</div>
';
    } else {

        echo 'error';
        ;
    }
    return $video_details;
}

$show_type = $posted_status_type;

if ($show_type == 'picture status') {

    $image_post_name = show_pic_status($status_id);
    $show_image_post = '<img class="img-thumbnail col-md-12" src="../uploads/images/';
    $show_image_post2 = '" alt="Generic placeholder image" width="540" height="540">';

    $post_image = $show_image_post . $image_post_name . $show_image_post2;
} else {
    $post_image = '';
}

if ($show_type == 'music status') {

    $cover_post_name = show_album_status($status_id);
    $show_image_post = '<img class="img-thumbnail col-md-12" src="../uploads/images/';
    $show_image_post2 = '" alt="" width="140" height="140">';
    $cover_image = $show_image_post . $cover_post_name . $show_image_post2;

    $music_post_name = show_track_status($status_id);
    $music_post_type = show_track_type_status($status_id);
    $show_track_post = '  <audio controls <source src="../uploads/music/' . $music_post_name . '" type="audio' . $music_post_type . '" /></audio>';
    $show_music_details = show_track_details_status($status_id);
} else {
    $show_track_post = '';
    $cover_image = '';
    $show_music_details = '';
}


if ($show_type == 'video status') {



    $video_post_name = show_video_status($status_id);
    $video_post_type = show_video_type_status($status_id);
    $show_video_post = '  <video controls <source src="../uploads/video/' . $video_post_name . '" type="video' . $video_post_type . '" /></video>';
    $show_video_details = show_video_details_status($status_id);
} else {
    $show_video_post = '';
    $show_video_details = '';
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
} else {
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

<link href="../css/mypark_main.css" rel="stylesheet">
        <link href="../css/bootstrap.css" rel="stylesheet">

<link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
<link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">
        <link href="../css/blog.css" rel="stylesheet">


        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>








<script src="../media_player/APlayer.min.js"></script>
<script src="../media_player/demo.js"></script>






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


    <form action="comments2.php" method="POST" class="form-signin">
      <div class="container ">
                   
                       <div class="col-md-7 col-md-push-2  col-sm-6 col-sm-push-3 col-xs-12 blog-post table-border ">
                                <div class="row">
                         <?php echo '<img class="img-circle pull-left" src="../uploads/images/' . show_pro_pic($post_user_id_array[$post_count]) . '" alt="" width="40" height="40">' ?>
                        
                            <div class="blog-post-title"  style="font-weight:600;"><?php echo $posted_username; ?> </div>
                            

                            
                           
                            <div class="youtube">
                            <?php echo $post_image; ?> 
                             <?php echo $show_music_details; ?>
                            <?php echo$show_track_post; ?>
                            <?php echo$show_video_details; ?>
                            <?php echo $show_video_post; ?>

                   </div>
                            <p> <div  class="blog-text-post"  style="max-width:900px; font-weight:300; word-wrap:break-word;"><font  size="4px" weight="150px"> <?php echo convert_clickable_links($posted_status_text);?> </div> </p>
                            <p class="blog-post-meta"><?php
                            $time = floor(time() - strtotime($posted_status_time));


                            $days = 0;

                            if ($time < 60) {
                                if ($time == 1 OR $time == 0) {
                                    $show_date = "just now";
                                } else {
                                    $show_date = $time . " seconds ago";
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
                            } elseif ($time < 2419200) {

                                $weeks = floor($time / 604800);

                                if ($weeks == 1) {
                                    $show_date = $weeks . "w";
                                } else {
                                    $show_date = $weeks . "w";
                                }
                            } else {
 $postdate = date_create($display_comments_time);
										
                                        $show_date = date_format($postdate,"d M y");
                            }



                            echo $show_date;
                            ?><div class="col-md-9 col-sm-9 col-xs-9">

                                        <textarea class="form-control"  name="comment_text" required ></textarea></div>
                                        <div class="col-md-3 col-sm-3 col-xs-3 ">
                                        <button name="comment_post" class="btn  btn-md btn-info btn-block" type="submit"><font size="1px">Comment</font></button>
</div></p>


<p>&nbsp;</p></p>

                            <hr>


                            <?php
                            while ($start < $end) {

                                $display_comments_id = $posted_comments_id[$start];
                                $display_comments_text = $posted_comments_text[$start];
                                $display_comments_time = $posted_comments_time[$start];
                                $display_comments_user_id = $posted_comments_User_id[$start];
                                $display_comments_name = $posted_comments_name[$start];
                                $display_comments_surname = $posted_comments_surname[$start];
                                $diplay_comments_specialty = $posted_comments_specialty[$start];
                                $display_comments_username = $posted_comments_username[$start];
                                $time = floor(time() - strtotime($display_comments_time));

                                if ($time < 60) {
                                    if ($time == 1 OR $time == 0) {
                                        $show_date = "just now";
                                    } else {
                                        $show_date = $time . " seconds ago";
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
                                } elseif ($time < 2419200) {

                                    $weeks = floor($time / 604800);

                                    if ($days == 1) {
                                        $show_date = $weeks . "w";
                                    } else {
                                        $show_date = $weeks . "w";
                                    }
                                } else {
   
    $postdate = date_create($display_comments_time);
										
                                        $show_date = date_format($postdate,"d M y");
                                    
                                }

if ($display_comments_user_id == $user_id){
                                        $display_link = '<a href="../my_journey/journey.php" ><div class="blog-post-title"  style="font-weight:600;">' . $display_comments_username . '</div></a>';
                                    }else{
                                        $display_link = '<a href="../explore/journey_bridge.php?IN_user_id='.$display_comments_user_id.'" ><div class="blog-post-title"  style="font-weight:600;">' . $display_comments_username . '</div></a>';
                                    }



                                echo '<div class="row">          
                                    <img class="img-circle pull-left" src="../uploads/images/' . show_pro_pic($display_comments_user_id) . '" alt="" width="40" height="40">
                                    <div class="col-md-8">
                                       <div class="blog-post-title"  style="font-weight:600;">' . $display_link . '</div>

                    
                                        <p>' . convert_clickable_links($display_comments_text) . '</p>
                                        <p class="blog-post-meta">' . $show_date . '</p>
<hr>


                                    </div>
                                </div>
                                    
                                     ';
                                $start = $start + 1;
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
                            ?>

                     
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







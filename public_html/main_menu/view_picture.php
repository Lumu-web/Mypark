<?php
session_start();
include '../dbconnect.php';






$status_id = $_SESSION['status_id'];
$user_id = $_SESSION['user_id'];
$posted_status_type = $_SESSION['Status_type'];




$comments_count = '0';
$start = '0';



function download($filefolder,$filename){
    $filepath = '../uploads/'.$filefolder.'/'.$filename;
    
    header('Content-Disponition: attachment: filename="'.basename($filepath).'"');
    
    header("Content-Type:application/x-download");
    header("Content-Length: ".filesize($filepath));
    readfile($filepath);
    exit;
    
   
    
    
    
}




//show status post

$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

$status_posts = "SELECT * FROM status_post WHERE status_post.status_id = '$status_id'";

$response = $db->query($status_posts);

while ($row = $response->fetch_assoc()) {
    $posted_status_id = $row['Status_id'];
    $posted_status_text = $row['Status_text'];
    
    $posted_status_time = $row['Status_time'];
    $posted_status_user_id = $row['User_id'];



    $user_details_query = "SELECT * FROM user_details, login_user WHERE user_details.user_id = $posted_status_user_id AND  login_user.user_id = $posted_status_user_id  ";

    $response2 = $db->query($user_details_query);

    while ($row = $response2->fetch_assoc()) {

        $posted_username = $row['Login_name'];
        $posted_name = $row['User_name'];
        $posted_surname = $row['User_surname'];
    }
}
;


$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

$query = "SELECT * FROM comments_posts WHERE Status_id = $status_id ORDER BY Comment_time";

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

    $num_rows = mysqli_query($conn,"SELECT * FROM Images_files WHERE Status_id = '$INstatus_id' ");
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
      <p><big>ARTIST:</big>' . $music_file_artist . ' </p>      
    <p><big>ALBUM:</big>' . $music_file_album . ' </p>         
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
    $show_unread = 'Messages(' . $unread_count . ')';
} else {
    $show_unread = 'Messages';
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
    $show_image_post2 = '" alt="Generic placeholder image" width="140" height="140">';
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
    $show_unchecked_count = 'Notifications(' . $unchecked_count . ')';
} else {
    $show_unchecked_count = 'Notifications';
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


        <title>My Park | Comments</title>


        <link href="../css/bootstrap.css" rel="stylesheet">


        <link href="../css/blog.css" rel="stylesheet">


        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>












    </head>

    <body>


        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">MY PARK</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="../notifications/notifications.php"><?php echo $show_unchecked_count; ?></a></li>
                        <li class="active"><a href="Home_bridge.php">Home</a></li>
                        <li><a href="../my_journey/journey.php">My Journey</a></li>
                        <li><a href="../explore/explore.php">Explorer</a></li>
                        <li><a href="../gallery/gallery_bridge.php">Gallery</a></li>
                        <li><a href="#"><?php echo $show_unread; ?></a></li>



                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="Edit_Profile.php">Edit Profile</a></li>
                        <li class="active"><a href="../index.php">Log out</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>




        <form action="view_picture.php" method="POST" class="form-signin">
            <div class="container col-md-10 col-md-push-2">
                
                <?php
                
                if ($status_id == 0){
                    $posted_username = '';
                    $posted_name = '';
                    $posted_surname = '';
                    $posted_status_text = '';
                    $posted_status_time = '';
                    $show_time = '';
                    
                    
                    
                }
                
                
                ?>
                
                

                            <?php echo $post_image; ?> 
                            <?php echo $show_music_details; ?>
                            <?php echo $cover_image; ?>
                            <?php echo$show_track_post; ?>
                            <?php echo$show_video_details; ?>
                            <?php echo $show_video_post; ?>

                            
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
                                    $show_date = $min . " minute ago...";
                                } else {
                                    $show_date = $min . " minutes ago...";
                                }
                            } elseif ($time < 86400) {
                                $hours = floor($time / 3600);

                                if ($hours == 1) {
                                    $show_date = $hours . " hour ago...";
                                } else {
                                    $show_date = $hours . " hours ago...";
                                }
                            } elseif ($time < 604800) {

                                $days = floor($time / 86400);

                                if ($days == 1) {
                                    $show_date = $days . " day ago...";
                                } else {
                                    $show_date = $days . " days ago...";
                                }
                            } elseif ($time < 2419200) {

                                $weeks = floor($time / 604800);

                                if ($weeks == 1) {
                                    $show_date = $weeks . " week ago...";
                                } else {
                                    $show_date = $weeks . " weeks ago...";
                                }
                            } else {

                                $show_date = $show_time;
                            }



                            ?></p>

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
                                        $show_date = $min . " minute ago...";
                                    } else {
                                        $show_date = $min . " minutes ago...";
                                    }
                                } elseif ($time < 86400) {
                                    $hours = floor($time / 3600);

                                    if ($hours == 1) {
                                        $show_date = $hours . " hour ago...";
                                    } else {
                                        $show_date = $hours . " hours ago...";
                                    }
                                } elseif ($time < 604800) {

                                    $days = floor($time / 86400);

                                    if ($days == 1) {
                                        $show_date = $days . " day ago...";
                                    } else {
                                        $show_date = $days . " days ago...";
                                    }
                                } elseif ($time < 2419200) {

                                    $weeks = floor($time / 604800);

                                    if ($days == 1) {
                                        $show_date = $weeks . " week ago...";
                                    } else {
                                        $show_date = $weeks . " weeks ago...";
                                    }
                                } else {

                                    $show_date = $display_comments_time;
                                }

if ($display_comments_user_id == $user_id){
                                        $display_link = '<a href="../my_journey/journey.php" ><h2 class="blog-post-title">' . $display_comments_username . '</h2></a>';
                                    }else{
                                        $display_link = '<a href="../explore/journey.php?IN_user_id='.$display_comments_user_id.'" ><h2 class="blog-post-title">' . $display_comments_username . '</h2></a>';
                                    }


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
                                $show_unread = 'Messages(' . $unread_count . ')';
                            } else {
                                $show_unread = 'Messages';
                            }
                            
                            
                            
                          
                            
                            ?>

                           
                                 
                          
                            <hr>

            



            </div>

        </form>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../js/bootstrap.min.js"></script>

        <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>







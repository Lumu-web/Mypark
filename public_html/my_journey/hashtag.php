<?php
include '../dbconnect.php';
include 'hashtag_coding.php';

//for all the icons
$logo = '<img src="../Icons/MyPark Logo.png" height="30px" width="60px">';
$upload_music = '<img src="../buttons/musicbutton.png" height="20px" width="20px">';
$upload_pic = '<img src="../buttons/original pic.png"height="28px" width="30px">';
$upload_vid = '<img src="../buttons/original video.png" height="20px" width="20px">';
$comment_btn = '<img src="../buttons/Comment.png" height="22px" width="20px">';
$trash = '<img src="../buttons/delete.png" height="15px" width="15px">';
$download_btn = '<img src="../buttons/download_btn.png" height="18px" width="18px">';
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



        <title>My Park | Home</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <link href="../css/bootstrap.css" rel="stylesheet">


        <link href="../css/blog.css" rel="stylesheet">

        <link href="../css/lightbox.css" rel="stylesheet">




        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
        
        
       

    </head>

    <body>


        <nav class="navbar navbar-default navbar-fixed-top">
    
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar"><?php echo $show_unchecked_count ?>
                        
                    </button>
                    <a class="navbar-brand" href="/" alt="Logo"><?php echo $logo; ?></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="../main_menu/Home.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('home','','../buttons/home-xxl.png',1)"><img src="../buttons/home-xxl_2.png" alt="Home" width="20" height="20"></a>
                        <li><a href="../my_journey/journey.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('journey','','../buttons/journey_2.png',1)"><img src="../buttons/journey.png" alt="Journey" width="20" height="20"></a>
                        <li><a href="../explore/explore.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('explore','','../buttons/explore_2.png',1)"><img src="../buttons/explore.png" alt="Explore" width="20" height="20" ></a>
                        <li><a href="../gallery/gallery_bridge.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('gallery','','../buttons/gallery_2.png',0)"><img src="../buttons/gallery.png" alt="Gallery" width="25" height="25"></a>
                        <li><a href="../messages/messages_bridge.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image8','','../buttons/message_2.png',1)"><?php echo $show_unread; ?><img src="../buttons/message.png" alt="Message" width="25" height="25"></a>
                       <li><a href="../notifications/notifications.php"><?php echo $show_unchecked_count ?><?php echo $notify; ?></a> 
                    </ul>
                    <ul class="nav navbar-nav navbar-right"><li><a href="../main_menu/Edit_Profile.php"><?php echo $settings; ?></a>
                        <li><a href="../index.php"onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('logout','','../buttons/logout.png',1)"><img src="../buttons/logout.png" width="25" height="25"></a>
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>



        <form action="hashtag.php" method="POST" class="form-signin">

<p>&nbsp;</p>
            <div class="container col-md-10 col-sm-10  col-sm-push-1 col-xs-12 col-md-push-2 ">


                <div class="row">
                   
                        <div class="col-md-8 col-sm-12 col-xs-12 blog-main">

                            <div class="col-md-10 col-md-push-2 col-sm-10 col-xs-12 blog-post">
                                <div class="row">
                                    
                                    <div class="col-md-10 col-md-push-2 col-sm-12  col-sm-push-2 col-xs-12  ">
//check 



                                    echo $_SESSION['newer_posts'];
                                    ?> </div><div class="col-md-12 col-md-push-2 col-sm-12  col-sm-push-2 col-xs-12  ">
                                   

                                        <p>&nbsp;</p>
<div class="col-md-10 col-sm-10 col-xs-12 ">

                                        <textarea name="status_text" class="form-control blog-post-meta " placeholder=""  maxlength="350" required></textarea>
                                    </div><div class="col-md-2 col-sm-2 col-xs-12 ">
                                        <button class="btn btn-sm btn-xs btn-primary btn-block" name="status_post" type="submit" >Post</button>
                                    </div>
                                    <div class="col-md-5 col-md-push-5 col-sm-10  col-xs-5 col-xs-push-5 col-xs-push-1-left">
                                    <a class=" control-label" href="Upload_picture.php" ><?php echo $upload_pic ?></a>
                                  </div>
                                   </div>
 
                                </div>
                            </div>
                        </div>

   <hr>
   <div class="col-md-10 col-md-push-1 col-sm-12 col-xs-12 blog-main">
                            <div class="col-md-10 col-sm-12 col-xs-12 col-xs-push-1-left" id="post">
                                <?php
//check if status if below 10
                                if ($post_count < 10) {
                                    $end = $post_count;
                                    $more_posts = '<p></p>';
                                } else {
                                    $post_count_divided = floor($post_count / 10);
                                    $post_count_rounded_off = $post_count_divided * 10;
                                    $post_count_last_page = $post_count - $post_count_rounded_off;

                                    $more_posts = '<button name="show_older_posts" class="btn btn-xs-4 btn-default btn-block" type="submit">SHOW OLDER POSTS</button>';

                                    if ($end > $post_count_rounded_off) {

                                        $end = $post_count_last_page + $post_count_rounded_off;
                                        $more_posts = '<p>No more posts</p>';
                                    };
                                };


//display posts

                                while ($start < $end) {


                                    $show_id = $posted_status_user_id_array[$start];
                                    $show_text = $post_status_text_array[$start];
                                    $show_time = $post_status_time_array[$start];
                                    $show_username = $post_username_array[$start];
                                    $show_name = $post_name_array[$start];
                                    $show_surname = $post_surname_array[$start];
                                    $show_type = $post_status_type_array[$start];
                                    $show_likes = $post_likes_array[$start];
                                    $show_dislikes = $post_dislikes_array[$start];


                                    $check_liked = mysqli_query($conn,"SELECT * FROM likes WHERE likes.status_id = '$post_status_id_array[$start]' AND likes.User_id = '$user_id' AND likes.Likes_type = 'like'");
                                    if (mysqli_num_rows($check_liked) > 0) {
                                        $like_link = "dislike";
                                    } else {
                                        $like_link = "like";
                                    }

                                    if (mysqli_num_rows($check_liked) > 0) {
                                        $like_button = '<img src="../buttons/like_button(red).png" height="20px" width="20px" alt="Generic placeholder image" width="10%" height="10%">';
                                    } else {
                                        $like_button =
                                                '<img src="../buttons/like_button.png" height="20px" width="20px" "alt="Generic placeholder image" width="10%" height="10%">';
                                    }

                                    $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

                                    $comments_sql = "SELECT * FROM comments_posts WHERE  comments_posts.status_id = '$post_status_id_array[$start]'";
                                    $sql = mysqli_query($conn,"SELECT * FROM comments_posts WHERE  comments_posts.status_id = '$post_status_id_array[$start]'");
                                    $response2 = $db->query($comments_sql);


                                    if (mysqli_num_rows($sql) > 0) {
                                        $comments_count = '0';
                                        while ($row2 = $response2->fetch_assoc()) {
                                            $comments_count = $comments_count + 1;
                                        }
                                    } else {
                                        $comments_count = '0';
                                    };


                                    $time = floor(time() - strtotime($show_time));
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

                                        if ($days == 1) {
                                            $show_date = $weeks . " week ago...";
                                        } else {
                                            $show_date = $weeks . " weeks ago...";
                                        }
                                    } else {

                                        $show_date = $show_time;
                                    }

                                    if ($show_type == 'picture status'){
                                        $download_link = ' <a href="download_file_bridge.php?IN_status_id='.$post_status_id_array[$start].'&IN_post_type='.$show_type.'">' . $download_btn . '</a>';
                                    }elseif ($show_type == 'music status'){
                                        $download_link = ' <a href="download_file_bridge.php?IN_status_id='.$post_status_id_array[$start].'&IN_post_type='.$show_type.'">' . $download_btn . '</a>';
                                    }elseif ($show_type == 'video status'){
                                        $download_link = ' <a href="download_file_bridge.php?IN_status_id='.$post_status_id_array[$start].'&IN_post_type='.$show_type.'">' . $download_btn . '</a>';
                                    }else{
                                      $download_link = '';  
                                    }
                                    
                                    
                                    


                                    if ($show_type == 'picture status') {

                                        $image_post_name = show_pic_status($post_status_id_array[$start]);
                                        $show_image_post ='<a href="../uploads/images/'. show_pic_status($post_status_id_array[$start]) .'" rel="lightbox" ><img width="30%" height="30%" class="img-thumbnail col-md-12   col-sm-12  col-xs-12 "  src="../uploads/images/' ;
                                        $show_image_post2 = '" alt="Generic placeholder image" ></a>';

                                        $post_image = $show_image_post . $image_post_name . $show_image_post2;
                                         
                                    } else {
                                        $post_image = '';
                                        
                                    }

                                    if ($show_type == 'music status') {

                                        $cover_post_name = show_album_status($post_status_id_array[$start]);
                                        $show_image_post = '<img class="img-thumbnail col-md-10  col-sm-12 col-xs-12" src="../uploads/images/';
                                        $show_image_post2 = '" alt="Generic placeholder image" width="140" height="140">';
                                        $cover_image = $show_image_post . $cover_post_name . $show_image_post2;

                                        $music_post_name = show_track_status($post_status_id_array[$start]);
                                        $music_post_type = show_track_type_status($post_status_id_array[$start]);
                                        $show_track_post = '<audio preload="auto" controls> 
                                        			<source src="../uploads/music/' . $music_post_name . '" type="audio/mpeg' . $music_post_type . '" />
                                        			
                                        			<p>Your browser does not support the <code>audio</code> element </p>
                                        			</audio>';
                                        $show_music_details = show_track_details_status($post_status_id_array[$start]);
                                        
                                        
                                    } else {
                                        $show_track_post = '';
                                        $cover_image = '';
                                        $show_music_details = '';
                                        
                                    }



                                    if ($show_type == 'video status') {



                                        $video_post_name = show_video_status($post_status_id_array[$start]);
                                        $video_post_type = show_video_type_status($post_status_id_array[$start]);
                                        $show_video_post = '  <video controls  width="100%" height="100%" > <source src="../uploads/video/' . $video_post_name . '" type="video/' . $video_post_type . '" /></video>';
                                        $show_video_details = show_video_details_status($post_status_id_array[$start]);
                                        
                                        
                                    } else {
                                        $show_video_post = '';
                                        $show_video_details = '';
                                        
                                    }


                                    if ($post_user_id_array[$start] == $user_id) {
                                        $show_delete = '<a href="delete.php?IN_status_id=' . $post_status_id_array[$start] . '&IN_user_id=' . $user_id . '&IN_status_type=' . $show_type . '" type="submit"> | delete</a>';
                                    } else {
                                        $show_delete = '';
                                    }


                                    if ($post_user_id_array[$start] == $user_id) {
                                        $show_delete = '<a href="delete.php?IN_status_id=' . $post_status_id_array[$start] . '&IN_user_id=' . $user_id . '&IN_status_type=' . $show_type . '" type="submit" class="pull-right">' . $trash . '</a>';
                                    } else {
                                        $show_delete = '';
                                    }

                                    if ($show_id == $user_id) {
                                        $display_link = '<a href="../my_journey/journey_bridge.php" ><h5 class="blog-post-title">' . $show_username . '</h6></a>';
                                    } else {
                                        $display_link = '<a href="../explore/journey_bridge.php?IN_user_id=' . $show_id . '" ><h5 class="blog-post-title">' . $show_username . '</h6></a>';
                                    }


                                    echo         
                                    ' <div class="row table-border"><img class="img-circle pull-left" src="../uploads/images/' . show_pro_pic($post_user_id_array[$start]) . '"  alt="Generic placeholder image" width="40" height="40">
                                    ' . $display_link . '
<div class="col-md-12 col-sm-12 col-xs-12">

' . $post_image . ' 
    ' . $show_music_details . ' 
	
     ' . $show_track_post . '
 
' . $show_video_details . '
         ' . $show_video_post . '
         
                </span></p>           
         
                                      
                                        <p><div  class="blog-text" style="max-width:900px; word-wrap:break-word;">' . convert_clickable_links($show_text) . '</div></p>
                                        <p class="blog-post-meta ">' . $show_date . '</p>
                                            <p><a href=' . $like_link . '.php?IN_status_id=' . $post_status_id_array[$start] . '&IN_user_id=' . $user_id . ' >' . $like_button . '</a><span class="blog-post-meta"> ' . $show_likes . '</span>
                              <a href="comments.php?IN_status_id=' . $post_status_id_array[$start] . '&IN_user_id=' . $user_id . '" type="submit">' . $comment_btn . '</a><span class="blog-post-meta"> ' . $comments_count . ' </span> ' . $show_delete. '                       </p>                                                                       


                                    </div>
                                </div>';
                                    ++$start;
                                };

                                //display show more button if results larger than 10
                                echo $more_posts;
                                ?>
                            </div>
                        </div>
                    </div>          
                </div>
            </div>

        </form>



        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../css/lightbox.min.js"></script>
        <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>
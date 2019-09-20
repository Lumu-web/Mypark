<?php

session_start();
$_SESSION['more_results_clicked_journey'] = 0;
$_SESSION['more_results_clicked_explore'] = 0;
$_SESSION['comments_page_clicked'] = 0;
$_SESSION['more_gallery_clicked'] = 0;
$_SESSION['user_id_alternative'] = 0;
if (isset($_SESSION['user_id']) === false){
     ?>         
        <script>
            window.open ('http://www.mypark.co.za/index.php','_self',false)
        </script>
        <?php
    
}else{
$user_id = $_SESSION['user_id'];
}

$user_name = "";
$user_surname = "";
$user_specialty = "";
$user_email = "";
$post_count = '0';
$likes_count = '0';
$dislikes_count = '0';
$comments_count = '0';


$_SESSION['IN_user_id'] = $user_id;






$more_results_clicked = $_SESSION['more_results_clicked'];

if ($more_results_clicked > 0) {

    $start = $_SESSION['start'];
    $end = $_SESSION['end'];
} else {

    $start = '0';
    $end = '20';
};




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
	$parsedMessage = preg_replace(array('/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:\'".,<>?«»“”‘’]))/', '/(^|[^a-z0-9_])@([a-z0-9_]+)/i', '/(^|[^a-z0-9_])#([a-z0-9_]+)/i'), array('<a href="../../../$1" target="_blank">$1</a>', '$1<a href="../main_menu/at_bridge.php?username=$2">@$2</a>', '$1<a href="hashtag_bridge.php?hashtag=$2">#$2</a>'), $message);
	return $parsedMessage;
}





$post_status_id_array = array();
$post_status_text_array = array();
$post_status_type_array = array();
$post_status_time_array = array();
$posted_status_user_id_array = array();
$posted_status_youtube_array = array();
$post_username_array = array();
$post_name_array = array();
$post_surname_array = array();

$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

$query = "SELECT * FROM user_details WHERE User_id = '$user_id'";

$response = $db->query($query);

while ($row = $response->fetch_assoc()) {
    $user_name = $row['User_name'];
    $user_surname = $row['User_surname'];
    $user_specialty = $row['User_specialty'];
    $user_email = $row['User_email'];
	$account_type = $row['Account_type'];
	if(!$account_type == '')
	{
		$profile_type = 'Edit_Profile_special.php';
	}
	else
	{
		$profile_type = 'Edit_Profile.php';
	}
};


$_SESSION['specialty'] = $user_specialty;

//show profile pic

$num_rows = mysqli_query($conn,"SELECT * FROM images_files WHERE Image_Description = 'Uploaded_profile_picture' AND Image_Status = 'Active' AND User_id = '$user_id' ");
if (mysqli_num_rows($num_rows) > 0) {
    $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

    $query = "SELECT * FROM images_files WHERE User_id = '$user_id' AND Image_Status = 'Active'";

    $response = $db->query($query);

    while ($row = $response->fetch_assoc()) {
        $image_name = $row['Image_Name'];
    }
}


//show followers status posts

$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

$status_posts = "SELECT Status_id,Status_text,Status_type,Status_time,User_id,hashtag, Youtube_embed FROM following,status_post WHERE following.following_flg_user_id = '$user_id' AND following.following_fld_user_id = status_post.User_id UNION SELECT Status_id,Status_text,Status_type,Status_time,User_id,hashtag, Youtube_embed FROM status_post WHERE User_id = '$user_id' order by Status_time DESC";

$response = $db->query($status_posts);

$total_records =  mysqli_num_rows($response);
$records_on_page = 20;

$last_page = ceil($total_records/$records_on_page);
$pagenumber = 0;

if ($last_page > 1)
{
	$pagenumber = 2;
}
while ($row = $response->fetch_assoc()) {
    $posted_status_id = $row['Status_id'];
	

    $posted_status_text = $row['Status_text'];
    $posted_status_type = $row['Status_type'];
    $posted_status_time = $row['Status_time'];
    $posted_status_user_id = $row['User_id'];
      $posted_status_hashtag = $row['hashtag'];
	  $posted_status_youtube = $row['Youtube_embed'];
	  if($posted_status_youtube != 'null' || $posted_status_youtube != '')
	  {
		  $posted_status_youtube = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtu.be\/([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe style=\"margin:auto\" width=\"100%\" height=\"300\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$posted_status_youtube);
		  $posted_status_youtube = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe style=\"margin:auto\" width=\"100%\" height=\"300\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$posted_status_youtube);
	  }
$post_status_id_array[-1] = '0';
    if ($posted_status_id == $post_status_id_array[$post_count - 1]) {
        
    } else {
        $post_status_id_array[$post_count] = $posted_status_id;
        $post_status_text_array[$post_count] = $posted_status_text;
        $post_status_type_array[$post_count] = $posted_status_type;
        $post_status_time_array[$post_count] = $posted_status_time;
        $posted_status_user_id_array[$post_count] = $posted_status_user_id;
        $posted_hashtag_array[$post_count] = $posted_status_hashtag;
		$posted_status_youtube_array[$post_count] = $posted_status_youtube;

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
        ;



//show likes and dislikes

        $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

        $likes = "SELECT * FROM likes WHERE likes.status_id = $post_status_id_array[$post_count] AND likes.Likes_type = 'like'";
        $sql = mysqli_query($conn,"SELECT * FROM likes WHERE likes.status_id = $post_status_id_array[$post_count] AND likes.Likes_type = 'like'");
        $response2 = $db->query($likes);


        if (mysqli_num_rows($sql) > 0) {
            while ($row2 = $response2->fetch_assoc()) {
                $likes_count = $likes_count + 1;
                $post_likes_array[$post_count] = $likes_count; 
            }
        } else {
            $likes_count = '0';
            $post_likes_array[$post_count] = $likes_count; 
        }
        $likes_count = '0';

        $dislikes = "SELECT * FROM likes WHERE likes.status_id = $post_status_id_array[$post_count] AND likes.Likes_type = 'dislike'";
        $sql2 = mysqli_query($conn,"SELECT * FROM likes WHERE likes.status_id = $post_status_id_array[$post_count] AND likes.Likes_type = 'dislike'");
        $response3 = $db->query($dislikes);



        if (mysqli_num_rows($sql2) > 0) {
            while ($row3 = $response3->fetch_assoc()) {
                $dislikes_count = $dislikes_count + 1;
                $post_dislikes_array[$post_count] = $dislikes_count;
                
  
            }
          
        } else {
            $dislikes_count = '0';
            $post_dislikes_array[$post_count] = $dislikes_count;
        }
        $dislikes_count = '0';



        $post_count = $post_count + 1;
    }
};






//post button

	
if (isset($_POST['status_post'])) {

	 
    $status_post_text = str_replace("'","\'",htmlspecialchars(trim($_POST['status_text'])));
    $hashtag = gethashtags($status_post_text);
	
	$status_post_text =  nl2br($status_post_text);
    $status_post_type = 'normal message';
    $status_post_time = date('y-m-d H:i:s');

	$_SESSION['post_time'] = $status_post_time;
	
	$youtube_embed = htmlspecialchars(trim($_POST['youtubelink']));
	if(strpos($youtube_embed,'youtube.com') === false && strpos($youtube_embed,'youtu.be') === false)
	{
		$youtube_embed = '';
	}
	

    if (mysqli_query($conn,"INSERT INTO status_post(Status_text,Status_type,Status_time,User_id,hashtag,Youtube_embed) VALUES('$status_post_text','$status_post_type','$status_post_time','$user_id','$hashtag','$youtube_embed')")) {
		
		send_tag_notification($status_post_text);
        ?>         
        <script>
            window.open ('http://www.mypark.co.za/main_menu/Home.php','_self',false)
        </script>
        <?php

        exit();
    } else {
        echo 'error';
    }
};

//show older posts
if (isset($_POST['show_older_posts'])) {
    $start = $start + 20;
    $end = $end + 20;

    $_SESSION['start'] = $start;
    $_SESSION['end'] = $end;
    $_SESSION['more_results_clicked'] = 1;
    
    
    $_SESSION['newer_posts'] = '<hr><button name="show_newer_posts" class="btn btn-xs btn-default btn-block" type="submit">BACK TO NEWER POSTS</button>';;
    
};

//show newer posts
if (isset($_POST['show_newer_posts'])) {
    $start = $start - 20;
    $end = $end - 20;

    $_SESSION['start'] = $start;
    $_SESSION['end'] = $end;
    if ($end < 21){
     $_SESSION['more_results_clicked'] = 0;
    
    
    $_SESSION['newer_posts'] = '';
    }else{
        $_SESSION['more_results_clicked'] = 1;
    
    
    $_SESSION['newer_posts'] = '<hr><button name="show_newer_posts" class="btn btn-xs btn-default btn-block" type="submit">BACK TO NEWER POSTS</button>';
    }
    
};

//comments
function commentsFuntion($status_id) {
    $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

    $query = "SELECT * FROM comments_posts WHERE Status_id = $status_id ORDER BY Comment_time";

    $response = $db->query($query);


    echo '<div class="col-md-10 col-md-push-2 blog-post">
                <div class="row">';


    while ($row = $response->fetch_assoc()) {

        $Comment_id = $row['Comment_id'];
        $Comment_text = $row['Comment_text'];
        $Comment_time = $row['Comment_time'];
        $Comment_User_id = $row['User_id'];


        $db2 = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

        $query2 = "SELECT * FROM login_user, user_details WHERE user_details.user_id = '$Comment_User_id'AND login_user.user_id = '$Comment_User_id'";

        $response2 = $db2->query($query2);

        while ($row = $response2->fetch_assoc()) {
            $user_name = $row['User_name'];
            $user_surname = $row['User_surname'];
            $user_specialty = $row['User_specialty'];
            $user_username = $row['Login_name'];
        };







        echo '<p><big>' . $user_username . '  </big> <p class="blog-post-meta"> ' . $user_name . ' ' . $user_surname . '</p> </p>
                    <p>' . $Comment_text . '</p>
                    <p class="blog-post-meta">' . $Comment_time . '</p>
                    <hr>';
    }
    echo '</div></div>';
}

function show_pro_pic($INuser_id) {

    //show profile pic
$conn = mysqli_connect("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
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
$conn = mysqli_connect("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
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
$conn = mysqli_connect("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
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
$conn = mysqli_connect("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
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
$conn = mysqli_connect("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
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
$conn = mysqli_connect("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
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
$conn = mysqli_connect("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
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
			$music_file_Name = $row['Music_File_Name'];
			$music_file_Cover = $row['Music_cover'];
			$music_file_download = $row['Music_download'];
			$music_file_id = $row['Music_id'];
        }

$music_details = array($music_file_track, $music_file_artist,$music_file_Name, $music_file_Cover, $music_file_album,$music_file_download, $music_file_id);
    } else {

        $music_details = '';
    }
    return $music_details;
}

function get_music_download_count($music_id)
{$conn = mysqli_connect("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
	 $results = mysqli_query($conn,"SELECT * FROM music_downloads WHERE Music_id = '$music_id' ");
	 $num_rowss = mysqli_num_rows($results);
	 return $num_rowss;
}

function get_music_listen_count($music_id)
{$conn = mysqli_connect("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
	 $results = mysqli_query($conn,"SELECT * FROM music_listens WHERE Music_id = '$music_id' ");
	 $num_rowss = mysqli_num_rows($results);
	 return $num_rowss;
}

function add_music_download_count($music_id)
{$conn = mysqli_connect("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
	 $results = mysqli_query($conn,"SELECT * FROM music_downloads WHERE Music_id = '$music_id' and User_id = '$Current_user_id' ");
	 $num_rowss = mysqli_num_rows($results);
	 if($num_rowss > 0)
	 {
		 
	 }else{
		if( mysqli_query($conn,"INSERT INTO music_downloads(Music_id,User_id) Values ('$music_id','$Current_user_id')"))
		{}
	 }
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
    <p>' . $video_description . ' </p>         
</div>
';
    } else {

        echo 'error';
        ;
    }
    return $video_details;
}

//count unread messages

$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
$num_rows = mysqli_query($conn,"SELECT * FROM messages WHERE Receiver_id = '$user_id' AND Message_status = 'unread' ");
if (mysqli_num_rows($num_rows) > 0) {



    $query = "SELECT * FROM messages WHERE Receiver_id = '$user_id' AND Message_status = 'unread' ";

    $response = $db->query($query);
    $unread_count = '0';

    while ($row = $response->fetch_assoc()) {
        $unread_count = $unread_count + 1;
    }
    $show_unread = '<div class="bdg color" nbr='.$unread_count.'></div>';
}else{
    $show_unread ="";
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
    $show_unchecked_count = '<div class="bdg color" nbr='.$unchecked_count.'></div>';
}else{
    $show_unchecked_count = '';
}

//count followers
$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
$num_rows = mysqli_query($conn,"SELECT * FROM followed WHERE followed_fld_user_id = '$user_id'");
if (mysqli_num_rows($num_rows) > 0) {



    $query = "SELECT * FROM followed WHERE followed_fld_user_id = '$user_id'";

    $response = $db->query($query);
    $followed_count = '0';

    while ($row = $response->fetch_assoc()) {
        $followed_count = $followed_count + 1;
    }
} else {
    $followed_count = 0;
    ;
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



function getstatusid($uuser_notifying)
{
	$db2 = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

$querystring = 'SELECT * FROM status_post WHERE Status_time = "'.$_SESSION['post_time'].'" and User_id ='.$uuser_notifying;

$textresponse = $db2->query($querystring);
while ($row5 = $textresponse->fetch_assoc()) {
	
	$statid = $row5['Status_id'];
	
}
return $statid;
}


?>

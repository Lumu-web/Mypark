<?php
include '../dbconnect.php';
include 'journey_coding.php';
//for all the icons
$logo = '<img src="../Icons/MP Logo.png" height="30px" width="60px">';
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
$search_user = '<img src="../buttons/explore.png" height="15px" width="15px">';
?>





<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
          <title>MyPark</title>


        <link href="../css/bootstrap.css" rel="stylesheet">


        <link href="../css/blog.css" rel="stylesheet">
         <link href="../css/lightbox.css" rel="stylesheet">
         <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
<link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">
<link href="../css/mypark_main.css" rel="stylesheet">
        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>









<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<link rel="stylesheet" href="../media_player/APlayer.min.css">
    </head>

    <body>
<script src="../media_player/APlayer.min.js"></script>
<script src="../media_player/demo.js"></script>
      
<script type="text/javascript">
function follow_unfollow(objthis, followunfollow, user_id, user_to_follow)
{
	var xmlhttp;  // The variable that makes Ajax possible!
   try{
   
      // Opera 8.0+, Firefox, Safari
      xmlhttp = new XMLHttpRequest();
   }catch (e){
      
      // Internet Explorer Browsers
      try{
         xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
      }catch (e) {
         
         try{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
         }catch (e){
         
            // Something went wrong
            alert("Your browser broke!");
            return false;
         }
      }
   }
   var following = '';
   if (followunfollow == 'Follow')
   {
	   following = 'Unfollow';
   }else if (followunfollow == 'Unfollow')
   {
	   following = 'Follow';
   }
   
   xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				
					
			
			
				//objthis.children('img').attr('src','../buttons/like_button(red).png');
				objthis.innerHTML = following ;
				objthis.onclick = function(){follow_unfollow(objthis,following, user_id, user_to_follow)};
			
			
            }
        };
	
		var page_and_query = followunfollow + ".php";
		
		

        xmlhttp.open("POST", page_and_query, true);
		var params = "IN_follower_id=" + user_id + "&IN_followed_id=" + user_to_follow;
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.setRequestHeader("Content-length", params.length);
xmlhttp.setRequestHeader("Connection", "close");

        xmlhttp.send(params);
   
   
}

function add_download(num , objthis){
	
	setTimeout(function(){ 
	var xmlhttp;  // The variable that makes Ajax possible!
   try{
   
      // Opera 8.0+, Firefox, Safari
      xmlhttp = new XMLHttpRequest();
   }catch (e){
      
      // Internet Explorer Browsers
      try{
         xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
      }catch (e) {
         
         try{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
         }catch (e){
         
            // Something went wrong
            alert("Your browser broke!");
            return false;
         }
      }
   }
   
  


        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4) {
				
  				  var parentid = objthis.parent();
				parentid.children('.amount_downloaded').html(xmlhttp.responseText);
				
				  
            }
        };
        xmlhttp.open("GET", "add_download.php?song_id=" + num, true);
        xmlhttp.send();
		}, 1000);
}

function add_listen(objthis, num){
	
	setTimeout(function(){ 
	var xmlhttp;  // The variable that makes Ajax possible!
   try{
   
      // Opera 8.0+, Firefox, Safari
      xmlhttp = new XMLHttpRequest();
   }catch (e){
      
      // Internet Explorer Browsers
      try{
         xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
      }catch (e) {
         
         try{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
         }catch (e){
         
            // Something went wrong
            alert("Your browser broke!");
            return false;
         }
      }
   }
   
  


        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4) {
				
  				  var parentid = objthis.parent().parent().parent();
				parentid.children('.amount_listened').html(xmlhttp.responseText);
				
				  
            }
        };
        xmlhttp.open("GET", "add_listen.php?song_id=" + num, true);
        xmlhttp.send();
		}, 1000);
}

function like_or_dislike(objthis, like_dislike, post_id, user_id){
	
	
	var xmlhttp;  // The variable that makes Ajax possible!
   try{
   
      // Opera 8.0+, Firefox, Safari
      xmlhttp = new XMLHttpRequest();
   }catch (e){
      
      // Internet Explorer Browsers
      try{
         xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
      }catch (e) {
         
         try{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
         }catch (e){
         
            // Something went wrong
            alert("Your browser broke!");
            return false;
         }
      }
	  
   }
   
  
var likedislike = '';

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4) {
				
			
			if (like_dislike == 'like')
			{
				likedislike = 'dislike';
				//objthis.children('img').attr('src','../buttons/like_button(red).png');
				objthis.getElementsByTagName('img')[0].src = '../buttons/like_button(red).png' ;
				objthis.onclick = function(){like_or_dislike(objthis,likedislike, post_id, user_id)};
			}else if (like_dislike == 'dislike')
			{
				likedislike = 'like';
				objthis.getElementsByTagName('img')[0].src = '../buttons/like_button.png' 
				objthis.onclick = function(){like_or_dislike(objthis,likedislike, post_id, user_id)};
				//objthis.children('img').attr('src','../buttons/like_button.png');
			};
			
			
			objthis.parentElement.getElementsByTagName('span')[0].innerHTML=xmlhttp.responseText;
			
            }
        };
	
		var page_and_query = like_dislike + ".php";
		
       
		
		xmlhttp.open("POST", page_and_query, true);
		var params = "IN_status_id=" + post_id + "&IN_user_id=" + user_id;
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.setRequestHeader("Content-length", params.length);
xmlhttp.setRequestHeader("Connection", "close");

        xmlhttp.send(params);
		
}

function load_more_posts(page, musicplayers)
{
	var xmlhttp;  // The variable that makes Ajax possible!
   try{
   
      // Opera 8.0+, Firefox, Safari
      xmlhttp = new XMLHttpRequest();
   }catch (e){
      
      // Internet Explorer Browsers
      try{
         xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
      }catch (e) {
         
         try{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
         }catch (e){
         
            // Something went wrong
            alert("Your browser broke!");
            return false;
         }
      }
   }
   
   xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				
					
			
		
			document.getElementById('loading-posts').innerHTML = '';
			$('#post').append(xmlhttp.responseText);
            addscroll();}
			
        };
	
		var page_and_query = "load_posts.php";
		
        xmlhttp.open("POST", page_and_query, true);
		var params = "recordpage=" + page + "&musicplayer=" + musicplayers;
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.setRequestHeader("Content-length", params.length);
xmlhttp.setRequestHeader("Connection", "close");

        xmlhttp.send(params);;
   
   
}
var pagenum = <?php echo $pagenumber ?>;
 var lastpage = <?php echo $last_page ?>;
var timer;
$(document).ready(function(){
	addscroll();
    $(this).scrollTop(0);
});

$(window).scroll(function () {
    clearTimeout(timer);
    timer = setTimeout(function() {
  
   if (lastpage >= pagenum && pagenum > 1)
   {
   if ($(document).height() <= $(window).scrollTop() + $(window).height()) {
	   loadgif();
      setTimeout( function(){ load_more_posts(pagenum,document.querySelectorAll('.aplayer').length);
	   pagenum++;} , 2000);
   }
   }
}, 50);
});

function loadgif()
{
	document.getElementById('loading-posts').innerHTML ='<img  width="50px" height="50px" src="../Icons/load_post.gif" style=" margin:auto; margin-top:20px; margin-bottom:50px; left:0; right:0; width:50px"></img>'
	window.scrollTo(0,document.body.scrollHeight);
}

function addscroll()
{
	
	if(pagenum <= lastpage && pagenum > 1)
	{
		
	document.getElementById('loading-posts').innerHTML ='<img  width="40px" height="10px" src="../Icons/scroll-down.png" style=" margin:auto; margin-top:20px; margin-bottom:50px; left:0; right:0; width:150px"></img>'	
	}
}
</script>


        
        <nav class="navbar navbar-default navbar-fixed-top ">
    
                <div class="navbar-header ">
                   
                    <a class="navbar-brand" href="../main_menu/Home.php" alt="Logo"><?php echo $logo; ?></a>
                    <a class="navbar-brand" href="../my_journey/journey.php" alt="Logo"><?php echo $journey; ?></a>
                            <a class="navbar-brand" href="explore.php" alt="Logo"><?php echo $explore; ?></a>
                      
                        <a class="navbar-brand" href="../messages/messages.php" alt="Logo"><?php echo $show_unread; ?><?php echo $message; ?></a>
                        <a class="navbar-brand active" href="../notifications/notifications.php" alt="Logo"><?php echo $show_unchecked_count ?><?php echo $notify; ?></a>
                </div>
               
        </nav>
        <p>&nbsp;</p>
<div class="main-header">
<div class="cover-image">
<img class="cov-img" <?php $my_cover_pic = show_cover_pic($user_id)?> src="<?php echo '../uploads/images/'.$my_cover_pic ?>" />
</div>

                            
                      
                            
 
<a href="../uploads/images/<?php $image_name = show_pro_pic($user_id);
echo $image_name; ?>"  rel="lightbox">
         
                        <img style="border:6px solid white" class="img img-rounded" src="../uploads/images/<?php $image_name = show_pro_pic($user_id);
echo $image_name; ?>" alt=""></a>



                        
                           
                           <div class="row">
                           <h4><div  class="blog-text font-weight:100; word-wrap:break-word;"><font size="5px"><?php echo $posted_username; ?></font></div></h4>
                            <a href="view_following.php?distinct_user= <?php echo $user_id ; ?>"><span class="blog-text"><font size="1px">FOLLOWING: </span><span class="blog-text"><?php echo  count_following($user_id) ?></font></span></a> | <a href="view_followers.php?distinct_user= <?php echo $user_id ; ?>"><span class="blog-text"><font size="1px">FOLLOWERS: </span><span class="blog-text"><?php echo count_followed($user_id) ?></font></span></a>
                            <p class=""><div class="blog-text" style="font-weight:400;"><font size="1px"><?php echo $user_specialty; ?></font></div></p>
                            </div></div>

        
      
      <div class="main-post-outer-container">

                
                   
                         


        <form action="journey.php" method="POST" class="form-signin">
          <?php

   function count_following($In_user) {
//count following
                                $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
                                $num_rows = mysql_query("SELECT * FROM following WHERE following_flg_user_id = '$In_user' AND following_fld_user_id != '$In_user'");
                                if (mysql_num_rows($num_rows) > 0) {



                                    $query = "SELECT * FROM following WHERE following_flg_user_id = '$In_user' AND following_fld_user_id != '$In_user'";

                                    $response = $db->query($query);
                                    $followed_count = '0';

                                    while ($row = $response->fetch_assoc()) {
                                        $followed_count = $followed_count + 1;
                                    }
                                } else {
                                    $followed_count = 0;
                                    ;
                                }
                                return $followed_count;
                            }

                            function count_followed($In_user) {
//count followers
                                $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
                                $num_rows = mysql_query("SELECT * FROM followed WHERE followed_fld_user_id = '$In_user' AND followed_flg_user_id != '$In_user'");
                                if (mysql_num_rows($num_rows) > 0) {



                                    $query = "SELECT * FROM followed WHERE followed_fld_user_id = '$In_user' AND followed_flg_user_id != '$In_user'";

                                    $response = $db->query($query);
                                    $followed_count = '0';

                                    while ($row = $response->fetch_assoc()) {
                                        $followed_count = $followed_count + 1;
                                    }
                                } else {
                                    $followed_count = 0;
                                    ;
                                }
                                return $followed_count;
                            }
;
?>

                            <?php
                            $check_follow = mysql_query("SELECT * FROM following WHERE following.following_fld_user_id = $user_id AND following.following_flg_user_id = $Current_user_id");
                            if (mysql_num_rows($check_follow) > 0) {
                                $account_follow = "Unfollow";
                            } else {
                                $account_follow = "Follow";
                            }

                            echo '<div class="row"><a onClick="follow_unfollow(this,\''.$account_follow.'\','.$Current_user_id.','.$user_id.')"href="javascript:void(0)" class="btn btn-xs btn-info btn-block" name="btn-follow"><font size="1px">' . $account_follow . '</font></a></div> '
                            ?>
                            <div class="row"><a href="gallery/gallery_bridge.php" class="btn btn-xs btn-info btn-block" name="btn-view_gallery" ><font size="1px">View Gallery</font></a></div> 
                           
                      
                        
                      
                        

                 
               

   
         <div class="main-post-inner-container" id="post">
                                                               <?php
//check if status if below 10
                                if ($post_count < 10) {
                                    $end = $post_count;
                                    $more_posts = '';
                                } else {
                                    $post_count_divided = floor($post_count / 10);
                                    $post_count_rounded_off = $post_count_divided * 10;
                                    $post_count_last_page = $post_count - $post_count_rounded_off;

                                    $more_posts = '';

                                    if ($end > $post_count_rounded_off) {

                                        $end = $post_count_last_page + $post_count_rounded_off;
                                        $more_posts = '';
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
									$show_youtube = $posted_status_youtube_array[$start];

                                    $check_liked = mysql_query("SELECT * FROM likes WHERE likes.status_id = '$post_status_id_array[$start]' AND likes.User_id = '$Current_user_id' AND likes.Likes_type = 'like'");
                                    if (mysql_num_rows($check_liked) > 0) {
                                        $like_link = "dislike";
                                    } else {
                                        $like_link = "like";
                                    }
									
if (mysql_num_rows($check_liked) > 0) {
                                          $like_button = '<img src="../buttons/like_button(red).png" height="22px" width="22px" alt="Generic placeholder image">';
                                    } else {
                                        $like_button =
                                                '<img src="../buttons/like_button.png" height="20px" width="20px" "alt="Generic placeholder image" >';
									

									 }

                                    $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

                                    $comments_sql = "SELECT * FROM comments_posts WHERE  comments_posts.status_id = '$post_status_id_array[$start]'";
                                    $sql = mysql_query("SELECT * FROM comments_posts WHERE  comments_posts.status_id = '$post_status_id_array[$start]'");
                                    $response2 = $db->query($comments_sql);


                                    if (mysql_num_rows($sql) > 0) {
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
                                    }  else {

                                       $postdate = date_create($show_time);
										
                                        $show_date = date_format($postdate,"d M y");
                                    }




                                    if ($show_type == 'picture status') {

                                        $image_post_name = show_pic_status($post_status_id_array[$start]);
                                        $show_image_post = '<a href="../uploads/images/' . show_pic_status($post_status_id_array[$start]) . '" rel="lightbox"><img class="img-thumbnail col-md-12 col-sm-12 col-xs-12" src="../uploads/images/';
                                        $show_image_post2 = '" alt="Generic placeholder image" width="140" height="140"></a>';

                                        $post_image = $show_image_post . $image_post_name . $show_image_post2;
                                    } else {
                                        $post_image = '';
                                    }

                                    if ($show_type == 'music status') {
$music_posts = $music_posts + 1;
                                       /* $cover_post_name = show_album_status($post_status_id_array[$start]);
                                        $show_image_post = '<img class="img-thumbnail col-md-12" src="../uploads/images/';
                                        $show_image_post2 = '" alt="Generic placeholder image" width="140" height="140">';
                                        $cover_image = $show_image_post . $cover_post_name . $show_image_post2;

                                        $music_post_name = show_track_status($post_status_id_array[$start]);
                                        $music_post_type = show_track_type_status($post_status_id_array[$start]);
                                        $show_track_post = '  <audio controls <source src="../uploads/music/' . $music_post_name . '" type="audio' . $music_post_type . '" /></audio>';*/
                                        $get_music_details_array = show_track_details_status($post_status_id_array[$start]);
										$show_music_details = '<div id="player'.$music_posts.'" class="aplayer"></div><script>create_track_player("player'.$music_posts.'","'.$get_music_details_array[0].'","'.$get_music_details_array[1].'", "../uploads/music/'.$get_music_details_array[2].'", "../uploads/images/'.$get_music_details_array[3].'","'.$get_music_details_array[4].'","'.$get_music_details_array[6].'")</script>' ;		
										$music_download = $get_music_details_array[5];
										$listens_for_tracks = get_music_listen_count($get_music_details_array[6]);
										$downloads_for_track = get_music_download_count($get_music_details_array[6]);
										if($music_download == 'yes')
										{$music_download = "<a href='../uploads/music/".$get_music_details_array[2]."' onClick='add_download(".$get_music_details_array[6].",$(this))'>$down_icon</a><span class='amount_downloaded'>downloaded ".$downloads_for_track." times</span><span class='amount_listened'>listened ".$listens_for_tracks." times</span>";}else {$music_download = "<span class='amount_listened'>listened ".$listens_for_tracks." times</span>";}								;
                                    } else {
                                        $show_track_post = '';
                                        $cover_image = '';
                                        $show_music_details = '';
										$music_download = '';
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



                      
                                    if ($show_id == $user_id) {
                                        $display_link = '<a href="../my_journey/journey.php"><div style="font-weight:400;"><font color="#000">' . $show_username . '</font></div></a>';
                                    } else {
                                        $display_link = '<a href="../explore/journey.php?IN_user_id=' . $show_id . '" ><div style="font-weight:400;"><font color="#000">' . $show_username . '</font></div></a>';
                                    }


                                     echo '<div class="row table-border">          
                                    <img class="img-rounded pull-left" src="../uploads/images/' . show_pro_pic($post_user_id_array[$start]) . '" alt="" class="img-thumbnail" width="35" height="35"><div class="pull-left blog-text" style="font-weight:800;"><font color="#ccc">' . $display_link . '</font></div><div class="pull-right"><font size="2px" color="#ccc">' . $show_date . '&nbsp;&nbsp;&nbsp;&nbsp;</font></div>
                                   
' . $post_image . ' 
    ' . $show_music_details . ' 
     ' . $show_track_post . '
 '.$music_download.'
' . $show_video_details . '
         ' . $show_video_post . '
         <div class="post-content">
		 '. $show_youtube .'
         </div>
<div class="col-md-12 col-md-push- col-sm-7 col-xs-12">

                                      
                                        <p><font size="3.5px" weight="150px">' . convert_clickable_links($show_text) . '</p>
                                        <p class="blog-post-meta "></p>
                                             <p><a href="javascript:void(0)" onClick="like_or_dislike(this,\''.$like_link.'\','.$post_status_id_array[$start].','.$Current_user_id.')" >' . $like_button . '</a><span class="blog-post-meta"> ' . $show_likes . '</span>
                              <a href="comments.php?IN_status_id=' . $post_status_id_array[$start] . '&IN_user_id=' . $Current_user_id . '" type="submit">' .$comment_btn. '</a><span class="blog-post-meta">' . $comments_count . ' </span></p>
                                    </div>
                                </div>';
                                    ++$start;
                                };

                                //display show more button if results larger than 10
                                echo $more_posts; 
                                ?>
<div id="loading-posts" style="text-align:center; padding:0; margin:0; display:block">
</div>
                            </div>
                                
                </div>
           

        </form>


        
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../css/lightbox.min.js"></script>

        <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
        <div id="done"></div>
    </body>
</html>

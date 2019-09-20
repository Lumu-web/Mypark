<?php
include '../dbconnect.php';
include 'Home_coding.php';


//for all the icons
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
        <link href="../css/mypark_main.css" rel="stylesheet">

        <link href="../css/lightbox.css" rel="stylesheet">
        <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
<link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>





        <script src="../assets/js/ie-emulation-modes-warning.js"></script>
       
   


    <link rel="stylesheet" href="../media_player/APlayer.min.css">
    </head>

    <body>
    <style>

.loading
{
	background-image:url(../Icons/make%20a%20Post);

	background-repeat:no-repeat;
	background-position:center;
	background-size:80%;
	

}
</style>
     <script>	
	 
	 var scroll_loaded =  true;
$(document).ready(function(e) {
    

(function(){
$('img').each(function(index, element) {
	
    $(this).addClass('loading');
	$(this).on('load',$(this).removeClass('loading'));
});

})()
});
    

var page = 1;

function uploadyoutube()
{
	var  youtube = document.getElementById('youtubelink');
	if (youtube.getAttribute('type') == 'hidden')
	{
		youtube.setAttribute('type','text');
	}
	else
	{
		youtube.setAttribute('type','hidden');
	}
}
function next_page()
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
            if (xmlhttp.readyState == 4) {
				
					
			
			objthis.parentElement.parentElement.parentElement.parentElement.innerHTML= xmlhttp.responseText;
			
            }
        };
	
		var page_and_query = "load_posts.php?IN_status_id=" + post_id + "&IN_user_id=" + user_id + "&IN_status_type=" + post_type;
		
		
        xmlhttp.open("GET", page_and_query, true);
        xmlhttp.send();
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


function delete_comment(objthis, post_id, user_id, post_type)
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
            if (xmlhttp.readyState == 4) {
				
					
			
			objthis.parentElement.parentElement.parentElement.innerHTML= xmlhttp.responseText;
			
            }
        };
	
		var page_and_query = "delete.php?IN_status_id=" + post_id + "&IN_user_id=" + user_id + "&IN_status_type=" + post_type;
		
		
        xmlhttp.open("GET", page_and_query, true);
        xmlhttp.send();
   
   
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
            addscroll();
			scroll_loaded = true;}
			
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
   if ($(document).height() <= $(window).scrollTop() + $(window).height() && scroll_loaded == true) {
	   loadgif();
	   scroll_loaded=false
      setTimeout( function(){load_more_posts(pagenum,document.querySelectorAll('.aplayer').length);
	   pagenum++;} , 2000);
   }
  
   }
}, 50);
});

function loadgif()
{
	document.getElementById('loading-posts').innerHTML ='<img  width="25px" height="30px" src="../Icons/load_post.gif" style=" margin:auto; margin-top:auto; margin-bottom:auto; left:0; right:0; width:auto;"></img>'
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
<script src="../media_player/APlayer.min.js"></script>
<script src="../media_player/demo.js"></script>

             

        <nav class="navbar navbar-default navbar-fixed-top ">
    
                <div class="navbar-header ">
                   
                    <a class="navbar-brand" href="Home.php" alt="Logo"><?php echo $logo; ?></a>
                    <a class="navbar-brand" href="../my_journey/journey.php" alt="Logo"><?php echo $journey; ?></a>
                            <a class="navbar-brand" href="../explore/explore.php" alt="Logo"><?php echo $explore; ?></a>
                      
                        <a class="navbar-brand" href="../messages/messages.php" alt="Logo"><?php echo $show_unread; ?><?php echo $message; ?></a>
                        <a class="navbar-brand active" href="../notifications/notifications.php" alt="Logo"><?php echo $show_unchecked_count ?><?php echo $notify; ?></a>
                </div>
               
        </nav>

        <form action="Home.php" method="POST" class="form-signin">
<div class="main-post-outer-container">
                         <div class="main-post-inner-container">

            <p>&nbsp;</p>
                                        <p>&nbsp;</p>

                                  
                                  <div>
<div class="col-md-10 col-sm-10 col-xs-12 ">

<textarea name="status_text" class="form-control textarea-blog-post" placeholder=""  maxlength="350"></textarea>
<input class="form-control blog-post-meta " type="hidden" id="youtubelink" name="youtubelink" placeholder="paste youtube link">
                                    </div><div class="col-md-2 col-sm-2 col-xs-12 ">
                                        <button class="btn btn-sm btn-md btn-info btn-block" name="status_post" type="submit"><font size="1px">Post</font></button>
                                    </div>
                                    <div class="col-md-5 col-md-push-5 col-sm-10  col-xs-5 col-xs-push-4">
                                    <a class=" control-label" href="javascript:void(0)" onClick="uploadyoutube()" ><?php echo $upload_youtube ?></a>
                                    <a class=" control-label" href="Upload_picture.php" ><?php echo $upload_pic ?></a>
                                     <a class=" control-label" href="Upload_music.php" ><?php echo $upload_music ?></a>
                                  </div>
                                
 
                          </div>     
                      

   <hr>
    <p>&nbsp;</p>
     <p>&nbsp;</p>
  <p>&nbsp;</p>
  <hr>
  
                         
                            <div style="margin:0; padding:0; width:100%" id="post">
                                <?php
//check if status if below 20
$music_posts = 0;
                                if ($post_count < 20) {
                                    $end = $post_count;
                                    $more_posts = '';
                                } else {
                                    $post_count_divided = floor($post_count / 20);
                                    $post_count_rounded_off = $post_count_divided * 20;
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
                                    $show_text = convert_clickable_links($post_status_text_array[$start]);
                                    $show_time = $post_status_time_array[$start];
                                    $show_username = $post_username_array[$start];
                                    $show_name = $post_name_array[$start];
                                    $show_surname = $post_surname_array[$start];
                                    $show_type = $post_status_type_array[$start];
                                    $show_likes = $post_likes_array[$start];
                                    $show_dislikes = $post_dislikes_array[$start];
									$show_youtube = $posted_status_youtube_array[$start];
			

                                    $check_liked = mysqli_query($conn,"SELECT * FROM likes WHERE likes.status_id = '$post_status_id_array[$start]' AND likes.User_id = '$user_id' AND likes.Likes_type = 'like'");
                                    if (mysqli_num_rows($check_liked) > 0) {
                                        $like_link = "dislike";
                                    } else {
                                        $like_link = "like";
                                    }

                                    if (mysqli_num_rows($check_liked) > 0) {
                                      $like_button = '<img src="../buttons/like_button(red).png" height="16px" width="16px" alt="">';
                                    } else {
                                        $like_button =
                                                '<img src="../buttons/like_button.png" height="14px" width="14px" "alt="" >';
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

                                       $postdate = date_create($show_time);
										
                                        $show_date = date_format($postdate,"d M y");
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
                                        $show_image_post ='<a href="../uploads/images/'. show_pic_status($post_status_id_array[$start]) .'"   rel="lightbox" ><img width="30%" height="30%"  class="img-thumbnail col-md-9   col-sm-12  col-xs-12 "  src="../uploads/images/' ;
                                        $show_image_post2 = '" alt=""  ></a>';

                                        $post_image = $show_image_post . $image_post_name . $show_image_post2;
                                         
                                    } else {
                                        $post_image = '';
                                        
                                    }

                                    if ($show_type == 'music status') {
$music_posts = $music_posts + 1;
/*
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
                                      */
										
										$get_music_details_array = show_track_details_status($post_status_id_array[$start]);
										$music_download = $get_music_details_array[5];
										$downloads_for_track = get_music_download_count($get_music_details_array[6]);
										$listens_for_tracks = get_music_listen_count($get_music_details_array[6]);
										if($music_download == 'yes')
										{$music_download = "<a href='../uploads/music/".$get_music_details_array[2]."' onClick='add_download(".$get_music_details_array[6].",$(this))'>$down_icon</a><span class='amount_downloaded'>downloaded ".$downloads_for_track." times</span><span class='amount_listened'>listened ".$listens_for_tracks." times</span>";}else {$music_download = "<span class='amount_listened'>listened ".$listens_for_tracks." times</span>";}	
										
										$show_music_details = '<div id="player'.$music_posts.'" class="aplayer"></div><script>create_track_player("player'.$music_posts.'","'.$get_music_details_array[0].'","'.$get_music_details_array[1].'", "../uploads/music/'.$get_music_details_array[2].'", "../uploads/images/'.$get_music_details_array[3].'","'.$get_music_details_array[4].'","'.$get_music_details_array[6].'")</script>'.$music_download ;
                                        
                                        
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
                                        $show_delete = '<a  href="javascript:void(0)" onclick="javascript:delete_comment(this,'.$post_status_id_array[$start].',' . $user_id . ',\'' . $show_type . '\')" class="pull-right">' . $trash . '</a>';
                                    } else {
                                        $show_delete = '';
                                    }

                                     if ($show_id == $user_id) {
                                        $display_link = '<a href="../my_journey/journey.php"><div class="blog-text" style="font-weight:400;"><font color="#262626" size="3px"  weight="150px">' . $show_username . '</font></div></a>';
                                    } else {
                                        $display_link = '<a href="../explore/journey.php?IN_user_id=' . $show_id . '" ><div class="blog-text" style="font-weight:400;"><font color="#262626" size="3px"  weight="150px">' . $show_username . '</font></div></a>';
                                    }

                                    echo         
                                    ' <div class="row table-border outside-border  blankspace"><img class="img-rounded pull-left  blankspace  " src="../uploads/images/' . show_pro_pic($post_user_id_array[$start]) . '"  alt="" width="40" height="40"><div class="pull-right"><font size="1px" color="#ccc">' . $show_date . '&nbsp;&nbsp;&nbsp;&nbsp;</font></div>
                    <div class="unameposition">
                                  ' . $display_link . ' 
                                  </div>
                                     <div class="youtube">  
      <div  class="blog-text" style="max-width:900px; font-weight:300; word-wrap:break-word;"><font  size="3px" weight="150px">'.$show_text.'</div></font>                             
                                    
' . $post_image . '


'.$show_youtube.'


  ' . $show_track_post . '
 
' . $show_video_details . '
         ' . $show_video_post . '
<div class="col-md-12 col-sm-12 col-xs-12">
    ' . $show_music_details . ' 
	 
    
  
 

  
         
                </span></p>      
                                        
                                       
                                            <p><a href="javascript:void(0)" onClick="like_or_dislike(this,\''.$like_link.'\','.$post_status_id_array[$start].','.$user_id.')" >' . $like_button . '</a><span class="blog-post-meta"><font size="1px"> ' . $show_likes . '</font></span>
                              <a href="../main_menu/comments.php?IN_status_id=' . $post_status_id_array[$start] . '&IN_user_id=' . $user_id . '" type="submit">' . $comment_btn . '</a><span class="blog-post-meta"> <font size="1px"> ' . $comments_count . ' </font></span> ' . $show_delete. '                       </p>                                                                       
</div>

                   </div>                
                                </div>';
                                    ++$start;
                                };

                                //display show more button if results larger than 20
                                echo $more_posts;
                                ?>
                               
                            </div>
                      <div id="loading-posts" style="text-align:center; padding:0; margin:0; display:block; width:100%;">

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
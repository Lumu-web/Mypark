<?php 

include '../dbconnect.php';
include 'hashtag_coding.php';

//for all the icons
$logo = '<img src="../Icons/MP Logo.png" height="30px" width="60px">';
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



        <title>MyPark</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <link href="../css/bootstrap.css" rel="stylesheet">


        <link href="../css/blog.css" rel="stylesheet">

        <link href="../css/lightbox.css" rel="stylesheet">

<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />


        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
        
              <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
<link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">
       
<link rel="stylesheet" href="../media_player/APlayer.min.css">
    </head>

    <body>
<script src="../media_player/APlayer.min.js"></script>
<script src="../media_player/demo.js"></script>
<script>
var currentpage;

$(document).ready(function(){
	currentpage = 1;
	load_more_posts(currentpage,document.querySelectorAll('.aplayer').length);
	$(this).scrollTop(0);
});


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
				
					
			
			
			$('#post').append(xmlhttp.responseText);}
			
        };
	
		var page_and_query = "load_next_10.php";
		
        xmlhttp.open("POST", page_and_query, true);
		var params = "recordpage=" + page + "&musicplayer=" + musicplayers;
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.setRequestHeader("Content-length", params.length);
xmlhttp.setRequestHeader("Connection", "close");

        xmlhttp.send(params);;
   
   
}
var timer;

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
				
					
			
			objthis.parentElement.parentElement.parentElement.parentElement.innerHTML= xmlhttp.responseText;
			
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

        xmlhttp.send(params);;
		
		
}

$(window).scroll(function () {
    clearTimeout(timer);
    timer = setTimeout(function() {
  
  
   if ($(document).height() <= $(window).scrollTop() + $(window).height()) 
   {
	   
      setTimeout( function(){ currentpage++; load_more_posts(currentpage,document.querySelectorAll('.aplayer').length);} , 50);
  
   }
}, 50);
});
		
	
	</script>
        
        <nav class="navbar navbar-default navbar-fixed-top ">
    
                <div class="navbar-header ">
                   
                    <a class="navbar-brand" href="Home.php" alt="Logo"><?php echo $logo; ?></a>
                    <a class="navbar-brand" href="../my_journey/journey.php" alt="Logo"><?php echo $journey; ?></a>
                            <a class="navbar-brand" href="../explore/explore.php" alt="Logo"><?php echo $explore; ?></a>
                      
                        <a class="navbar-brand" href="../messages/messages.php" alt="Logo"><?php echo $show_unread; ?><?php echo $message; ?></a>
                        <a class="navbar-brand active" href="../notifications/notifications.php" alt="Logo"><?php echo $show_unchecked_count ?><?php echo $notify; ?></a>
                </div>
               
        </nav>



        <form action="hashtag.php" method="POST" class="form-signin">

   <p>&nbsp;</p>
            <div class="container col-md-10 col-sm-10  col-sm-push-1 col-xs-12 col-md-push-2 ">


                <div class="row">
                   
                        <div class="col-md-8 col-sm-12 col-xs-12 blog-main">

                            <div class="col-md-12 col-md-push-2 col-sm-10 col-xs-12 blog-post">
                                <div class="row">
                                    
                                    <div class="col-md-12 col-md-push-2 col-sm-12  col-sm-push-2 col-xs-12  ">
<p>&nbsp;</p>



   <div class="col-md-12  col-sm-12 col-xs-12 blog-main">
                            <div class="col-md-10 col-sm-12 col-xs-12 col-xs-push-1-left" id="post">
                               
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
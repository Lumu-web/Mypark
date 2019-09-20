<?php
include '../dbconnect.php';
include 'view_followers_coding.php';

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


?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">


        <title>My Park | Follwers</title>


        <link href="../css/bootstrap.css" rel="stylesheet">


        <link href="../css/blog.css" rel="stylesheet">
        


        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>












    </head>

    <body>
    <script>
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
                    <a class="navbar-brand" href="journey.php" alt="Logo"><?php echo $logo; ?></a>
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




        <form action="view_followers.php" method="POST" class="form-signin">
<div class="container col-md-10 col-sm-10   col-sm-push-2 col-xs-12 ">



                <div class="row">
                    <div class="container ">
                        <div class="col-md-10 col-sm-10  col-xs-12 blog-main ">

                            <div class="col-md-10 col-md-push-2  col-sm-10 col-sm-push-2 col-xs-12   blog-post">
                                <div class="row">
                                    <hr>
                                    <div class="col-md-12 ">
                                    <h3 align="center">Followers</h3>
                                    </div>
                                    
                                    </div>
                            </div>
                        </div>

    <div class=" col-md-10 col-sm-10 blog-main  col-xs-12 ">
                            <div class="col-md-10 col-md-push-2 col-sm-10 col-sm-push-2  col-xs-12 blog-post">
                                <?php
//check if status if below 10
                                
                                if ($explore_count < 10) {
                                    $end = $explore_count;
                                    $more_posts = '<p></p>';
                                } else {
                                    $post_count_divided = floor($explore_count / 10);
                                    $post_count_rounded_off = $post_count_divided * 10;
                                    $post_count_last_page = $explore_count - $post_count_rounded_off;

                                    $more_posts = '<button name="show_older_posts" class="btn btn-xs-4 btn-default btn-block" type="submit">SHOW MORE ACCOUNTS</button>';

                                    if ($end > $post_count_rounded_off) {

                                        $end = $post_count_last_page + $post_count_rounded_off;
                                        $more_posts = '<p></p>';
                                    };
                                };



//display posts

                                while ($start < $end) {



                                    $show_user_id = $explore_User_id_array[$start];
                                    $show_user_name = $explore_User_name_array[$start];
                                    $show_user_surname = $explore_User_surname_array[$start];
                                    $show_user_slogan = $explore_User_slogan_array[$start];
                                    $show_user_specialty = $explore_User_specialty_array[$start];
                                    $show_user_username = $explore_username_array[$start];

               
                                    $check_follow = mysql_query("SELECT * FROM following WHERE following.following_fld_user_id = $show_user_id AND following.following_flg_user_id = $user_id");
                                     if (mysql_num_rows($check_follow) > 0) {
                                         $account_follow = "Unfollow";
                                     }else{
                                         $account_follow = "Follow";
                                     }
                                    
                                    


                                 

    
            echo '<div class="row col-md-11  col-sm-10 col-xs-12 table-border">       
                                    <img class="img-circle pull-left" src="../uploads/images/' . show_pro_pic($show_user_id) . '" alt="Generic placeholder image" width="40" height="40">
                                    <div class="col-md-8">
                                        <a href="journey_bridge.php?IN_user_id='.$show_user_id.'" ><h4 class="blog-post-title"><font color="#000">' . $show_user_username . '</font></h4></a>
                                            

                                        <p class="blog-post-meta">' . $show_user_name . '  ' . $show_user_surname . '</p>
                                        ';
                            
                            if ($user_id == $show_user_id )
                            {}else
                            {
                            echo '      <div class="pull-right col-md-3 col-md-push-5 col-sm-3 col-sm-push-3 col-xs-4 col-xs-push-2">      
<a onClick="follow_unfollow(this,\''.$account_follow.'\','.$user_id.','.$show_user_id.')"href="javascript:void(0)" class="btn btn-xs btn-primary btn-block" name="btn-follow" ><font size="1px">'.$account_follow.'</font></a></div>';}
                                 echo'
                                      
                                        <p class="blog-post-meta"><font size="1px"> ' . $show_user_specialty . '</font></p>
                                            <p class="blog-post-meta"><font size="1px">' . $show_user_slogan . '</font></p>
                                                
                                        

';
                   

            echo ' <hr>
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


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../js/bootstrap.min.js"></script>

        <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>

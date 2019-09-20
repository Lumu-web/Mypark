<?php
include '../dbconnect.php';
include 'search.php';
$logo = '<img src="../Icons/MyPark Logo.png" height="30px" width="60px">';
$upload_music = '<img src="../buttons/musicbutton.png" height="20px" width="20px">';
$upload_pic = '<img src="../buttons/original pic.png"height="20px" width="20px">';
$upload_vid = '<img src="../buttons/original video.png" height="20px" width="20px">';
$comment_btn = '<img src="../buttons/Comment.png" height="19px" width="17px">';
$trash = '<img src="../buttons/delete.png" height="15px" width="15px">';
$journey = '<img src="../buttons/journey.png" height="20px" width="20px">';
$explore = '<img src="../buttons/explore.png" height="20px" width="20px">';
$search_user = '<img src="../buttons/explore.png" height="15px" width="15px">';
$home = '<img src="../buttons/home-xxl.png" height="20px" width="20px">';
$notify = '<img src="../buttons/notification.png" height="20px" width="20px">';
$gallery = '<img src="../buttons/gallery.png" height="20px" width="20px">';
$message = '<img  src="../buttons/message.png" height="20px" width="20px">';
$logout = '<img src="../buttons/Logout-128.png" height="20px" width="20px">';
$settings = '<img src="../buttons/tool.png" height="20px" class="editpic" width="20px">';
$explore_page = '<img src="../buttons/globe.png" height="60px" class="editpic" width="60px">';

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">


        <title>My Park | Search Results</title>


        <link href="../css/bootstrap.css" rel="stylesheet">


        <link href="../css/blog.css" rel="stylesheet">



        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>












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
<p>&nbsp;</p>


        <form action="explore_search_results.php" method="POST" class="form-signin">
            <div class="container col-md-10 col-md-push-1">



                <div class="row">
                    <div class="container">
                        <div class="col-md-10 blog-main">

                            <div class="col-md-8 col-md-push-4 blog-post">
                                <div class="row ">
                                    <hr>
                                    
                                    <div class="col-md-5 col-md-push-2">
                                        <input type="text" name="search_name" class="form-control" placeholder="" autofocus>
                                    </div>
                                    <div class="col-md-2 col-md-push-2">
                                        <button class="btn btn-sm  btn-block" name="btn-search" type="submit" ><?php echo $search_user ?></button>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-sm-8 col-md-10 blog-main">
                            <div class="col-md-10 col-md-push-3 blog-post">
                            <?php echo $_SESSION['previous_page']; ?>
                               
                                <?php
//check if status is below 10

                                if ($search_results_count < 10) {
                                    $end = $search_results_count;
                                    $more_posts = '<p></p>';
                                } else {
                                    $post_count_divided = floor($search_results_count / 10);
                                    $post_count_rounded_off = $post_count_divided * 10;
                                    $post_count_last_page = $search_results_count - $post_count_rounded_off;

                                    $more_posts = '<button name="show_older_posts" class="btn btn-xs-4 btn-default btn-block" type="submit"><font size="1px">Show more accounts</font></button>';

                                    if ($end > $post_count_rounded_off) {

                                        $end = $post_count_last_page + $post_count_rounded_off;
                                        $more_posts = '<p></p>';
                                    };
                                };



                             


//display posts

                                while ($start < $end) {



                                    $show_user_id = $search_results_user_id[$start];
                                    $show_user_name = $search_results_name[$start];
                                    $show_user_surname = $search_results_surname[$start];
                                    $show_user_username = $search_results_username[$start];
                                    $show_user_specialty = $search_results_specialty[$start];


                                    $check_follow = mysql_query("SELECT * FROM following WHERE following.following_fld_user_id = $show_user_id AND following.following_flg_user_id = $user_id");
                                    if (mysql_num_rows($check_follow) > 0) {
                                        $account_follow = "Unfollow";
                                    } else {
                                        $account_follow = "Follow";
                                    }





                                    if ($show_user_id == $user_id) {
                                        
                                    } else {

                                        echo '<div class="row col-md-10 col-md-push-1  col-sm-10 col-xs-12 table-border ">           
                                    <img class="img-circle pull-left" src="../uploads/images/' . show_pro_pic($show_user_id) . '" alt="Generic placeholder image" width="40" height="40">
                                    <div class="col-md-8">
                                        <a href="journey_bridge.php?IN_user_id='.$show_user_id.'" ><h4 class="blog-post-title"><font color="#000">' . $show_user_username . '</font></h4></a>
                                         <div class="col-md-3 col-md-push-3 col-sm-2 col-sm-push-4 col-xs-3 col-xs-push-1 pull-right"> 
<a  onClick="follow_unfollow(this,\''.$account_follow.'\','.$user_id.','.$show_user_id.')"href="javascript:void(0)" class="btn btn-sm btn-info btn-block"  name="btn-follow" ><font size="1px">'.$account_follow.'</font></a></div>
                                        <p><font size="1px" color="#ccc">' . $show_user_name . '  ' . $show_user_surname . '</font></p>
                                        <p><font size="1px" color="#ccc">' . $show_user_specialty . '</font></p>
                                        


                                    </div>
                                </div>';
                                    };



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
				objthis.getElementsByTagName('font')[0].innerHTML = following ;
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
    </body>
</html>

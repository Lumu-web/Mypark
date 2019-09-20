<?php
include '../dbconnect.php';
include 'explore_coding.php';

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
$explore = '<img src="../buttons/explore_2.png" height="23px" width="23px">';
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
        <meta name="description" content="">
        <meta name="author" content="">
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

        <title>MyPark</title>


        <link href="../css/bootstrap.css" rel="stylesheet">


        <link href="../css/blog.css" rel="stylesheet">
        <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
<link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">


        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>










    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
        <script type="text/javascript">
        
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
        </script>
    </head>

    <body onLoad="MM_preloadImages('../buttons/logout.png','../buttons/home-xxl.png','../buttons/journey_2.png','../buttons/explore_2.png','../buttons/message_2.png')">









    </head>

    <body>


           

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

<p>&nbsp;</p>



        <form action="explore.php" method="POST" class="form-signin">
            <div class="container col-md-10 col-sm-push-1   col-sm-10 col-xs-12 col-md-push-2">



                <div class="row">
                    <div class="container">
                        <div class="col-md-10 col-sm-10 col-xs-12  blog-main">

                            <div class="col-md-10 col-md-push-2 col-xs-12 blog-post">
                                <div class="row">
                                    
                                   <div class="col-md-5 col-md-push-2">
                                        <input type="text" name="search_name" class="form-control lower"  placeholder="" autofocus>
                                    </div>
                                    <div class="col-md-2 col-md-push-2">
                                        <button class="btn btn-md btn-block" name="btn-search" type="submit" ><font color="#fff" size="1px"><?php echo $search_user; ?></font></button>
                                        
                                    </div>
                                    </div>
                            </div>
                            <div class="col-md-10 col-md-push-2 col-xs-12  blog-post">
                            <div class="col-md-4 col-md-push-3">
                                        <button class="btn btn-sm btn-info btn-block" name="btn-show_specialty" type="submit" ><font color="#fff" size="1px"><?php echo $message_specialty;?> </font></button>
                                        
                                    </div>
                            
                             </div>
                        </div>
</div>

                        <div class="col-sm-9 blog-main col-xs-12  col-md-10 ">
                            <div class="col-md-9 col-xs-12 col-md-push-2 blog-post  ">
                                                     
    <div class="col-md-8 col-md-push-2">
<?php echo $_SESSION['previous_page']; ?></div>
                           <?php
//check if status if below 10
                              
                                if ($explore_count < 10) {
                                    $end = $explore_count;
                                    $more_accounts = '<p></p>';
                                } else {
                                    $post_count_divided = floor($explore_count / 10);
                                    $post_count_rounded_off = $post_count_divided * 10;
                                    $post_count_last_page = $explore_count - $post_count_rounded_off;

                                    $more_accounts =  '<button name="show_older_accounts" class="btn btn-xs btn-default btn-block" type="submit">Show More Accounts</button>';

                                    if ($end > $post_count_rounded_off) {

                                        $end = $post_count_last_page + $post_count_rounded_off;
                                        $more_accounts = '<p></p>';
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

                
                                    $check_follow = mysqli_query($conn,"SELECT * FROM following WHERE following.following_fld_user_id = $show_user_id AND following.following_flg_user_id = $user_id");
                                     if (mysqli_num_rows($check_follow) > 0) {
                                         $account_follow = "Unfollow";
                                     }else{
                                         $account_follow = "Follow";
                                     }
                                    
                                    


                                 
if($show_user_id == $user_id){
    
}else{
    
            echo '<div class="row col-md-10 col-md-push-1  col-sm-10 col-xs-12 table-border ">          
                                    <img class="img-rounded pull-left" src="../uploads/images/' . show_pro_pic($show_user_id) . '" alt="" width="40" height="40">
                                    <div class="col-md-8">
                                        <a href="journey_bridge.php?IN_user_id='.$show_user_id.'" ><h5 class="content-heading"><font color="#000">' . $show_user_username . '</font></h5></a>
                                               

                                        <p class="blog-post-meta"><font  size="1px">' . $show_user_name . '  ' . $show_user_surname . '</font></p>
                                        <div class="col-md-4 col-md-push-5 col-sm-2 col-xs-3 pull-right">                     
  <button formaction="messages_open_respond.php" class="btn  btn-md btn-info btn-block" type="submit"><font size="1px">Message</font></button></div>
                                         <p class="blog-post-meta col-xs-push-2"><font size="1px">' . $show_user_specialty . '</font></p>
                                         
                                                
          
                                  

                                    </div>
                                </div>';
    
};


                         
                                    ++$start;
                                };

                                //display show more button if results larger than 10
                                echo $more_accounts 
                                ?>

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
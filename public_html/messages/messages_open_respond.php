<?php
session_start();
include '../dbconnect.php';
$user_id = $_SESSION['user_id'];
$IN_message_id = $_SESSION['message_id'];
//show accounts to messages
$message_count = 0;

//for all the icons
$logo = '<img src="../Icons/MP Logo.png" height="30px" width="60px">';
$upload_music = '<img src="../buttons/musicbutton.png" height="24px" width="23px">';
$down_icon = '<img src="../buttons/download.png" height="25px" width="25px">';
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



///
$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

$user_list = "SELECT * FROM messages WHERE Message_id = '$IN_message_id'";

$response = $db->query($user_list);
while ($row = $response->fetch_assoc()) {
    $message_id = $row['Message_id'];
    $message_topic = $row['Message_topic'];
    $message_text = $row['Message_text'];
    $message_date = $row['Message_date'];
    $message_status = $row['Message_status'];
    $message_receiver_id = $row['Receiver_id'];
    $message_sender_id = $row['Sender_id'];


    $message_id_array[$message_count] = $message_id;
    $message_topic_array[$message_count] = $message_topic;
    $message_text_array[$message_count] = $message_text;
    $message_date_array[$message_count] = $message_date;
    $message_status_array[$message_count] = $message_status;
    $message_receiver_id_array[$message_count] = $message_receiver_id;
    $message_sender_id_array[$message_count] = $message_sender_id;

    //show sender
    $user_details_query = "SELECT * FROM login_user,user_details WHERE  login_user.user_id = '$message_sender_id' AND user_details.user_id = '$message_sender_id'  ";

    $response2 = $db->query($user_details_query);

    while ($row = $response2->fetch_assoc()) {

        $sender_username = $row['Login_name'];
        $sender_name = $row['User_name'];
        $sender_surname = $row['User_surname'];

        $sender_username_array[$message_count] = $sender_username;
        $sender_name_array[$message_count] = $sender_name;
        $sender_surname_array[$message_count] = $sender_surname;
    }


    //show reciever
    $user_details_query = "SELECT * FROM login_user,user_details WHERE  login_user.user_id = '$message_receiver_id' AND user_details.user_id = '$message_receiver_id'  ";

    $response2 = $db->query($user_details_query);

    while ($row = $response2->fetch_assoc()) {

        $receiver_username = $row['Login_name'];
        $receiver_name = $row['User_name'];
        $receiver_surname = $row['User_surname'];

        $receiver_username_array[$message_count] = $receiver_username;
        $receiver_name_array[$message_count] = $receiver_name;
        $receiver_surname_array[$message_count] = $receiver_surname;
    }


    $message_count = $message_count + 1;
}

if ($message_receiver_id == $user_id) {

    $show_message_title = '<font color="#ccc" size="1px" ></font>  ' . $sender_username;
    $show_id_message = $message_sender_id;
} else {
    $show_message_title = '<font color="#ccc" size="1px" ></font> ' . $receiver_username;
    $show_id_message = $message_receiver_id;
}




$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

$query = "SELECT * FROM messages_reply WHERE Message_id = $IN_message_id ORDER BY Reply_time DESC";

$response = $db->query($query);
$reply_count = 0;

while ($row = $response->fetch_assoc()) {

    $Reply_id = $row['Reply_id'];
    $Reply_text = $row['Reply_text'];
    $Reply_time = $row['Reply_time'];
    $Reply_User_id = $row['User_id'];

    $Reply_comments_id[$reply_count] = $Reply_id;
    $Reply_comments_text[$reply_count] = $Reply_text;
    $Reply_comments_time[$reply_count] = $Reply_time;
    $Reply_comments_User_id[$reply_count] = $Reply_User_id;


    $db2 = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

    $query2 = "SELECT * FROM login_user, user_details WHERE user_details.user_id = '$Reply_User_id'AND login_user.user_id = '$Reply_User_id'";

    $response2 = $db2->query($query2);

    while ($row = $response2->fetch_assoc()) {
        $user_name = $row['User_name'];
        $user_surname = $row['User_surname'];
        $user_specialty = $row['User_specialty'];
        $user_username = $row['Login_name'];

        $posted_Reply_name[$reply_count] = $user_name;
        $posted_Reply_surname[$reply_count] = $user_surname;
        $posted_Reply_specialty[$reply_count] = $user_specialty;
        $posted_Reply_username[$reply_count] = $user_username;
    };


    $reply_count = $reply_count + 1;
}

$end = $reply_count ;

    
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
    $show_unchecked_count = '<div class="bdg color" nbr='.$unchecked_count.'></div>';
}else{
    $show_unchecked_count = '';
}


//comment button

if (isset($_POST['reply_post'])) {
    $status_comment_text = mysqli_real_escape_string($conn, $_POST['reply_text']);
    $status_comment_time = date('y-m-d H:i:s');

    
   
    
    
    
    
    if (mysqli_query($conn,"UPDATE messages SET Sender_id = '$message_receiver_id', Receiver_id = '$message_sender_id',  Message_date = '$status_comment_time', Message_status = 'unread' WHERE Message_id = '$IN_message_id';")) {
    
    if (mysqli_query($conn,"INSERT INTO messages_reply(Reply_text, Reply_time,User_id,Message_id ) VALUES('$status_comment_text','$status_comment_time','$user_id','$IN_message_id')")) {
  
        ?>         
        <script>
            window.open ('http://www.mypark.co.za/messages/messages_open_respond.php','_self',false)
        </script>
        <?php

        exit();
    } else {
        echo 'error';
    }
    
    
}};

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


<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<link href="../css/nanoscroller.css" rel="stylesheet">
  <link href="../css/emoji.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/mypark_main.css" rel="stylesheet">
<link href="../css/blog.css" rel="stylesheet">


<link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
<link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">


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


<form action="messages_open_respond.php" method="POST" class="form-signin">
<div class="container">

                   
<div class="col-md-6 col-md-push-3  col-sm-6 col-sm-push-3 col-xs-12 blog-post table-border ">
 <div class="row">
           
       
<?php echo '<div class="row">
 
'. $show_message_title. '
                                <img class="img-circle pull-left " src="../uploads/images/' . show_pro_pic($show_id_message) . '" alt="" width="60" height="60">' ; ?></div>
                                <p>&nbsp</p>
                                  <p>&nbsp</p>
                        <div class="col-md-8 col-sm-9 col-xs-12">
<div class="col-md-12">
                            <h5 align="center"> </h5>
</div>
<p>&nbsp</p><div class="col-md-12 col-sm-12 col-xs-12 ">
                            <h6 ><?php echo $message_text; ?></h6>
</div>
                            <p class="blog-post-meta"><font color="#ccc" size="1px"><?php $time = floor(time() - strtotime($message_date));

                                    if ($time < 60) {
                                        if ($time == 1 OR $time == 0) {
                                            $show_date = "just now";
                                        } else {
                                            $show_date = $time . "s";
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
                                            $show_date = $weeks . " w";
                                        } else {
                                            $show_date = $weeks . " w";
                                        }
                                    } else {

                                       $postdate = date_create($message_id);
										
                                        $show_date = date_format($postdate,"d M y H:i");
                                    }
                            
                            
                            
                            echo $show_date; ?></font></p>
                            </div>
                            </div>
                            <hr>
                             <div class="col-md-8 col-md-push-2">
                                         <textarea class="form-control" name="reply_text" data-emojiable="true" ></textarea>
                                    </div>
                                    <div class="col-md-2 col-md-push-2">
                                        <button class="btn btn-sm btn-info btn-block" name="reply_post"  type="submit" ><font size="1px">Reply</font></button>
                                        
                                    </div>

                     <?php 
                     $start = 0;
                    while ($start < $end) {

    $display_id = $Reply_comments_id[$start];
    $display_text = $Reply_comments_text[$start];
    $display_time = $Reply_comments_time[$start];
    $display_user_id = $Reply_comments_User_id[$start];
    $display_name = $posted_Reply_name[$start];
    $display_surname = $posted_Reply_surname[$start];
    $display__specialty = $posted_Reply_specialty[$start];
    $display_username = $posted_Reply_username[$start];
    
    
    $time = floor(time() - strtotime($display_time));

                                    if ($time < 60) {
                                        if ($time == 1 OR $time == 0) {
                                            $show_date = "just now";
                                        } else {
                                            $show_date = $time . " s";
                                        }
                                    } elseif ($time < 3600) {

                                        $min = floor($time / 60);
                                        $sec = $time - ($min * 60);
                                        if ($min == 1) {
                                            $show_date = $min . " m";
                                        } else {
                                            $show_date = $min . " m";
                                        }
                                    } elseif ($time < 86400) {
                                        $hours = floor($time / 3600);

                                        if ($hours == 1) {
                                            $show_date = $hours . " h";
                                        } else {
                                            $show_date = $hours . " h";
                                        }
                                    } elseif ($time < 604800) {

                                        $days = floor($time / 86400);

                                        if ($days == 1) {
                                            $show_date = $days . " d";
                                        } else {
                                            $show_date = $days . " d";
                                        }
                                    } elseif ($time < 2419200) {

                                        $weeks = floor($time / 604800);

                                        if ($weeks == 1) {
                                            $show_date = $weeks . " w";
                                        } else {
                                            $show_date = $weeks . " w";
                                        }
                                    } else {
$postdate = date_create($display_time);
										
                                        $show_date = date_format($postdate,"d M y H:i");
                                    }
 
    

               echo '
               <div class="row"><div class="col-md-12 col-sm-9 col-xs-12 table-border">
               <div class="col-xs-1 col-md-1">
               <img class="img-circle pull-left" src="../uploads/images/' . show_pro_pic($display_user_id) . '" alt="" width="35" height="35">    </div>      
                                    
                          <div class="col-sm-11 col-md-11 col-xs-push-1">       
<span class="blog-text" ><font size="2px">' . $display_text . '</font></span>
<p>&nbsp;</p></div>

<p class="blog-post-meta pull-left"><font color="#ccc" size="1px">' . $show_date . '</font></p>


                             </div>      
                                 
                                   </div> 
                                 
                                     ';
    $start = $start + 1;
}
                     ?>       
                            
                            
                            
                         
                                        
 
                                      
                            
                            
                            
                   
                            
                        </div>
                    
                </div>
            </div>


        </form>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        


        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../js/bootstrap.min.js"></script>
 <script src="../js/nanoscroller.min.js"></script>
  <script src="../js/tether.min.js"></script>
  <script src="../js/config.js"></script>
  <script src="../js/util.js"></script>
  <script src="../js/jquery.emojiarea.js"></script>
  <script src="../js/emoji-picker.js"></script>

        <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
        <script>
    $(function() {
      // Initializes and creates emoji set from sprite sheet
      window.emojiPicker = new EmojiPicker({
        emojiable_selector: '[data-emojiable=true]',
        assetsPath: '../css/images/',
        popupButtonClasses: 'fa fa-smile-o'
      });
      // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
      // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
      // It can be called as many times as necessary; previously converted input fields will not be converted again
      window.emojiPicker.discover();
    });
  </script>


<script>
// Google Analytics
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-49610253-3', 'auto');
  ga('send', 'pageview');

</script>
    </body>
</html>
<?php

session_start();




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
$explore_count = '0';
$likes_count = '0';
$dislikes_count = '0';






//show older posts









if (isset($_POST['btn-message'])) {
      ?>         
        <script>
            window.open ('http://www.mypark.co.za/messages/messages.php','_self',false)
        </script>
        <?php

        exit();
 
    
};



if (isset($_POST['btn-show_specialty'])) {


?>         
        <script>
            window.open ('http://www.mypark.co.za/explore/explore.php','_self',false)
        </script>
        <?php
}

//post button








//show search 

if (isset($_POST['btn-search'])) {
    $IN_search_text = mysql_real_escape_string($_POST['search_name']);

    if ($IN_search_text == '') {
       
    } else {
        $_SESSION['IN_search_text'] = $IN_search_text;
        ?>         
        <script>
            window.open ('http://www.mypark.co.za/explore/explore_search_results.php','_self',false)
        </script>
        <?php

    }
}

function show_pro_pic($INuser_id) {

    //show profile pic

    $num_rows = mysql_query("SELECT * FROM images_files WHERE Image_Description = 'Uploaded_profile_picture' AND Image_Status = 'Active' AND User_id = '$INuser_id' ");
    if (mysql_num_rows($num_rows) > 0) {
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

//count unread messages
$unread_count = 0;
$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
$num_rows = mysql_query("SELECT * FROM messages WHERE Message_status = 'unread' AND Receiver_id = '$user_id' ");
if (mysql_num_rows($num_rows) > 0) {



    $query = "SELECT * FROM messages WHERE Message_status = 'unread' AND Receiver_id = '$user_id' ";

    $response = $db->query($query);
    $unread_count = '0';

    while ($row = $response->fetch_assoc()) {
        $unread_count = $unread_count + 1;
    }
    $show_unread = '<div class="bdg color" nbr=&nbsp;'.$unread_count.'></div>';
}else{
    $show_unread = '';
}

//count unread notifications
$unread_count = 0;
$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
$num_rows = mysql_query("SELECT * FROM notifications WHERE  Notified_user_id = '$user_id' AND Notifier_user_id != '$user_id' AND Notification_status = 'unchecked'  ");
if (mysql_num_rows($num_rows) > 0) {



    $query = "SELECT * FROM notifications WHERE  Notified_user_id = '$user_id' AND Notifier_user_id != '$user_id' AND Notification_status = 'unchecked' ";

    $response = $db->query($query);
    $unchecked_count = '0';

    while ($row = $response->fetch_assoc()) {
        $unchecked_count = $unchecked_count + 1;
    }
    $show_unchecked_count = '<div class="bdg color" nbr=&nbsp;'.$unchecked_count.'></div>';
}else{
    $show_unchecked_count = '';
}

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

?>

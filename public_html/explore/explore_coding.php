<?php

session_start();

$_SESSION['more_results_clicked'] = 0;
$_SESSION['more_results_clicked_journey'] = 0;


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


$more_results_clicked = $_SESSION['more_results_clicked_explore'];

if ($more_results_clicked > 0) {

    $start = $_SESSION['start'];
    $end = $_SESSION['end'];
} else {

    $start = '0';
    $end = '10';
};








$post_status_id_array = array();
$post_status_text_array = array();
$post_status_type_array = array();
$post_status_time_array = array();
$posted_status_user_id_array = array();

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
};






//show accounts to follow

$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

$user_list = "SELECT * FROM user_details";

$response = $db->query($user_list);
while ($row = $response->fetch_assoc()) {
    $explore_User_id = $row['User_id'];
    $explore_User_name = $row['User_name'];
    $explore_User_surname = $row['User_surname'];
    $explore_User_slogan = $row['User_slogan'];
    $explore_User_specialty = $row['User_specialty'];
   

    $explore_User_id_array[$explore_count] = $explore_User_id;
    $explore_User_name_array[$explore_count] = $explore_User_name;
    $explore_User_surname_array[$explore_count] = $explore_User_surname;
    $explore_User_slogan_array[$explore_count] = $explore_User_slogan;
   $explore_User_specialty_array[$explore_count] = $explore_User_specialty;


    $user_details_query = "SELECT * FROM login_user WHERE  login_user.user_id = '$explore_User_id'  ";

    $response2 = $db->query($user_details_query);

    while ($row = $response2->fetch_assoc()) {

        $explore_username = $row['Login_name'];
        

        $explore_username_array[$explore_count] = $explore_username;
       
    }
    
    $explore_count = $explore_count + 1;
    }
    ;






if (isset($_POST['btn-message'])) {
      ?>         
        <script>
            window.open ('http://www.mypark.co.za/messages/messages.php','_self',false)
        </script>
        <?php

        exit();
 
    
};

//post button

if (isset($_POST['status_post'])) {
    $status_post_text = mysql_real_escape_string($_POST['status_text']);
    $status_post_type = 'normal message';
    $status_post_time = date('y-m-d H:i:s');

    if (mysql_query("INSERT INTO status_post(Status_text,Status_type,Status_time,User_id) VALUES('$status_post_text','$status_post_type','$status_post_time','$user_id')")) {
        ?>         
        <script>
            window.open ('http://www.mypark.co.za/my_journey.php','_self',false)
        </script>
        <?php

        exit();
    } else {
        echo 'error';
    }
};

//check page
if($_SESSION['more_results_clicked_explore'] == 0){
 $_SESSION['previous_page'] = '';}


//show older posts
if (isset($_POST['show_older_accounts'])) {
    $start = $start + 10;
    $end = $end + 10;

    $_SESSION['start'] = $start;
    $_SESSION['end'] = $end;
    $_SESSION['more_results_clicked_explore'] = 1;
    
     $_SESSION['previous_page'] = '<hr><button name="show_newer_accounts" class="btn btn-xs btn-default btn-block" type="submit">Back to previous accounts</button>';;
    
    
};

//show newer posts
if (isset($_POST['show_newer_accounts'])) {
    $start = $start - 10;
    $end = $end - 10;

    $_SESSION['start'] = $start;
    $_SESSION['end'] = $end;
    if ($end < 11){
     $_SESSION['more_results_clicked_explore'] = 0;
    
    
    $_SESSION['previous_page'] = '';
    }else{
        $_SESSION['more_results_clicked_explore'] = 1;
    
    
    $_SESSION['previous_page'] = '<hr><button name="show_newer_accounts" class="btn btn-xs btn-default btn-block" type="submit">Back to the previous accounts</button>';
    }
    
};


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

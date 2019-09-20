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

$search_text = $_SESSION['IN_search_text'];

$search_keywords = preg_split("/[\s,]+/", $search_text);

$list_count = 0;
$search_results_count = 0;
$empty = 0;





if (isset($_POST['btn-message'])) {
      ?>         
        <script>
            window.open ('http://www.mypark.co.za/messages/messages.php','_self',false)
        </script>
        <?php

        exit();
 
    
};

//count unread notifications
$unread_count = 0;
$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
$num_rows = mysql_query("SELECT * FROM notifications WHERE Notification_status = 'unchecked' AND Notified_user_id = '$user_id' AND Notifier_user_id != '$user_id' ");
if (mysql_num_rows($num_rows) > 0) {



    $query = "SELECT * FROM notifications WHERE Notification_status = 'unchecked' AND Notified_user_id = '$user_id' AND Notifier_user_id != '$user_id' ";

    $response = $db->query($query);
    $unchecked_count = '0';

    while ($row = $response->fetch_assoc()) {
        $unchecked_count = $unchecked_count + 1;
    }
    $show_unchecked_count = '<div class="bdg color" nbr=&nbsp;'.$unchecked_count.'></div>';
}else{
    $show_unchecked_count = '';
}

//save all user details for search
$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

$user_list = "SELECT * FROM user_details,login_user WHERE user_details.user_id = login_user.user_id";

$response_search = $db->query($user_list);
while ($row = $response_search->fetch_assoc()) {

    $list_User_id = $row['User_id'];
    $list_User_name = $row['User_name'];
    $list_User_surname = $row['User_surname'];
    $list_User_specialty = $row['User_specialty'];
    $list_username = $row['Login_name'];


        
    $list_username_array[$list_count] = $list_username;
    $list_User_id_array[$list_count] = $list_User_id;
    $list_User_name_array[$list_count] = $list_User_name;
    $list_User_surname_array[$list_count] = $list_User_surname;
    $list_User_specialty_array[$list_count] = $list_User_specialty;
    
    $list_name_surname_array = $empty.$list_username.$list_User_name.$list_User_surname.$list_User_specialty;;

  

            
            
    $list_nameALL_array[$list_count] = $list_name_surname_array;
    
    
    $list_count = $list_count + 1;
}
;


foreach ($list_nameALL_array as $key2 => $list_count) {
    if (stripos($list_count, $search_text)) {
        $search_results_user_id[] = $list_User_id_array[$key2];
        $search_results_name[] = $list_User_name_array[$key2];
        $search_results_surname[] = $list_User_surname_array[$key2];
        $search_results_username[] = $list_username_array[$key2];
        $search_results_specialty[] = $list_User_specialty_array[$key2];
        
        $search_results_count = $search_results_count + 1;
    }
}






if (isset($_POST['btn-search'])) {
    $IN_search_text = mysql_real_escape_string($_POST['search_name']);

    if ($IN_search_text == '') {
        echo 'Error';
    } else {
        $_SESSION['IN_search_text'] = $IN_search_text;
        ?>         
        <script>
            window.open ('http://www.mypark.co.za/explore/explore_search_results.php','_self',false)
        </script>
        <?php

    }
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


function count_following($In_user){
//count following
$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
$num_rows = mysql_query("SELECT * FROM following WHERE following_flg_user_id = '$In_user' AND following_fld_user_id != '$In_user'");
if (mysql_num_rows($num_rows) > 0) {



    $query = "SELECT DISTINCT following_flg_user_id FROM following WHERE following_flg_user_id = '$In_user' AND following_fld_user_id != '$In_user'";

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


function count_followed($In_user){
//count followers
$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
$num_rows = mysql_query("SELECT * FROM followed WHERE followed_fld_user_id = '$In_user' AND followed_flg_user_id != '$In_user'");
if (mysql_num_rows($num_rows) > 0) {



    $query = "SELECT DISTINCT followed_fld_user_id FROM followed WHERE followed_fld_user_id = '$In_user' AND followed_flg_user_id != '$In_user'";

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
?>

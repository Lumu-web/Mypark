<?php

include '../dbconnect.php';
session_start();

$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

$search_str = $_POST['q'];


if (isset($_SESSION['user_id']) === false){
    
    
}else{
$user_id = $_SESSION['user_id'];
}

$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
$user_list = 'SELECT *
FROM login_user JOIN user_details ON login_user.User_id = user_details.User_id WHERE LOWER( login_user.Login_name ) LIKE LOWER(%$search_str%) OR LOWER( user_details.User_name ) LIKE LOWER( %$search_str% ) OR LOWER( user_details.User_surname ) LIKE LOWER( %$search_str% ) ORDER BY(CASE WHEN login_user.Login_name = $search_str THEN 1 WHEN  login_user.Login_name LIKE $search_str% THEN 2 ELSE 3 END) ASC, login_user.Login_name ASC';
$response = $db->query($user_list);

$total_records = mysqli_num_rows($response) ;

$records_on_page = 10;

$last_page = ceil($total_records/$records_on_page);
$currentpage = $_POST['recordpage'];;

if ($currentpage == 0 || $currentpage = '')
{
	$currentpage  =1;
}
else
{
	$currentpage = $_POST['recordpage'];
}






$limit = 'LIMIT ' .($currentpage - 1) * $records_on_page .',' . $records_on_page;

$user_list = "SELECT * FROM login_user join user_details on login_user.User_id = user_details.User_id where login_user.Login_name like '%$search_str%' or user_details.User_name like '%$search_str%'";





//show accounts to follow

;





$response = $db->query($user_list);





while ($row = $response->fetch_assoc()) {
    $explore_User_id = $row['User_id'];
    $explore_User_name = $row['User_name'];
    $explore_User_surname = $row['User_surname'];
    $explore_User_slogan = $row['User_slogan'];
    $explore_User_specialty = $row['User_specialty'];
	$explore_username = $row['Login_name'];
    
	$followquery ="SELECT * FROM following WHERE following.following_fld_user_id = $explore_User_id AND following.following_flg_user_id = $user_id";
	$check_follow = $db->query($followquery);
	
                                     if (mysqli_num_rows($check_follow) > 0) {
                                         $account_follow = "Unfollow";
                                     }else{
                                         $account_follow = "Follow";
                                     }
									
		                                 
if($explore_User_id == $user_id){
    
}else{
    
            echo '<div class="row col-md-10 col-md-push-1  col-sm-10 col-xs-12 table-border ">          
                                    <img class="img-circle pull-left" src="../uploads/images/' . show_pro_pic($explore_User_id) . '" alt="" width="40" height="40">
                                    <div class="col-md-8">
                                        <a href="journey_bridge.php?IN_user_id='.$explore_User_id.'" ><h5 class="blog-post-title"><font  size="3px" color="#000">' . $explore_username . '</font>  <font size="1px" color="#999">' . $explore_User_name. '  ' . $explore_User_surname . '</font></h5></a>
<div class="col-md-3 col-md-push-5 col-sm-2 col-sm-push-4 col-xs-3 pull-right">                     
<a  onClick="follow_unfollow(this,\''.$account_follow.'\','.$user_id.','.$explore_User_id.')"href="javascript:void(0)" class="btn btn-sm btn-info btn-block"  name="btn-follow" ><font size="1px">'.$account_follow.'</font></a></div>
                                         <p class="blog-post-meta col-xs-push-2"><font size="1px">' . $explore_User_specialty . '</font></p>
                                         
                                                
          
                                  

                                    </div>
                                </div>';
    
};

									 
									 
}

    ;
	
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
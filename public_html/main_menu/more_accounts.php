<?php
include '../dbconnect.php';
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

$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
$user_list = "SELECT * FROM user_details,login_user WHERE user_details.user_id = login_user.user_id and NOT login_user.user_id = $user_id ORDER BY login_name";
$response = $db->query($user_list);

$total_records = mysqli_num_rows($response) ;

$records_on_page = 20;

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

$user_list = "SELECT * FROM user_details,login_user WHERE user_details.user_id = login_user.user_id and NOT login_user.user_id = $user_id ORDER BY login_name $limit";





//show accounts to follow

;





$response = $db->query($user_list);





while ($row = $response->fetch_assoc()) {
    $explore_User_id = $row['User_id'];
    $explore_User_name = $row['User_name'];
    $explore_User_surname = $row['User_surname'];
    $explore_User_slogan = $row['User_slogan'];
    $explore_User_specialty = $row['User_specialty'];
   


    $user_details_query = "SELECT * FROM login_user WHERE  login_user.user_id = '$explore_User_id'  ";

    $response2 = $db->query($user_details_query);

    while ($row = $response2->fetch_assoc()) {

        $explore_username = $row['Login_name'];		
       
    }
    
	$check_follow = mysqli_query($conn,"SELECT * FROM following WHERE following.following_fld_user_id = $explore_User_id AND following.following_flg_user_id = $user_id");
                                     if (mysqli_num_rows($check_follow) > 0) {
                                         $account_follow = "Unfollow";
                                     }else{
                                         $account_follow = "Follow";
                                     }
									 
		                                 
if($explore_User_id == $user_id){
    
}else{
    
            echo '<div class="row col-md-10 col-sm-10 col-xs-12">          
                                    <img class="img-rounded pull-left" src="../uploads/images/' . show_pro_pic($explore_User_id) . '" alt="" width="40" height="40">
                                    <div class="col-md-8">
                                        <a href="journey_bridge.php?IN_user_id='.$explore_User_id.'" ><font color="#000"><font size="3px">' . $explore_username . '</font> <font size="1px" color="#999">' . $explore_User_name. '  ' . $explore_User_surname . '</font></h5></a>
                                               

                                      
                                        <div class="col-md-4 col-md-push-6 col-sm-2 col-sm-push-4 col-xs-3 pull-right">                     
<a  onClick="follow_unfollow(this,\''.$account_follow.'\','.$user_id.','.$explore_User_id.')"href="javascript:void(0)" class="btn btn-sm btn-info btn-block"  name="btn-follow" ><font size="1px">'.$account_follow.'</font></a></div>
                                         <p class="blog-post-meta col-xs-push-2"><font size="1px">' . $explore_User_specialty . '</font></p>
                                         
                                                
          <hr>
                                  

                                    </div>
                                    
                                </div>';
    
};

									 
									 
}

    ;
	
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
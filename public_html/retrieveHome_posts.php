<?php

$user_id = 23;

include "application_php/dbinclude.php";
 
$sql = "SELECT status_post.Status_id, status_post.Status_text, status_post.Status_type, status_post.Status_time, status_post.User_id, status_post.hashtag, status_post.Youtube_embed, images_files.Image_Name, music.Music_File_Name,login_user.Login_name, user_details.User_specialty, user_details.User_id
FROM following, status_post
LEFT JOIN images_files ON status_post.Status_id = images_files.Status_id
LEFT JOIN music ON  status_post.Status_id = music.Status_id
LEFT JOIN login_user ON status_post.User_id = login_user.User_id
LEFT JOIN user_details ON status_post.User_id = user_details.User_id
WHERE following.following_flg_user_id ='$user_id'
AND following.following_fld_user_id = status_post.User_id
UNION 
SELECT status_post.Status_id, status_post.Status_text, status_post.Status_type, status_post.Status_time, status_post.User_id, status_post.hashtag, status_post.Youtube_embed, images_files.Image_Name, music.Music_File_Name, login_user.Login_name, user_details.User_specialty, user_details.User_id
FROM status_post
LEFT JOIN images_files ON status_post.Status_id = images_files.Status_id
LEFT JOIN music ON  status_post.Status_id = music.Status_id
LEFT JOIN login_user ON status_post.User_id = login_user.User_id
LEFT JOIN user_details ON status_post.User_id = user_details.User_id
WHERE status_post.User_id ='$user_id' order by Status_time DESC";
 $logi="lumu";
 $password="helloworld";
$res = mysqli_query($con,"SELECT * FROM login_user inner join user_details on login_user.User_id = user_details.User_id WHERE (login_user.Login_name = '$logi' OR user_details.User_email = '$logi' ) AND login_user.Login_password = '$password'");



 $response = $con->query($sql);


	

$result = array();
 
while ($row = $res->fetch_assoc()) {
	$posted_status_id = $row['Status_id'];
    $posted_status_type = $row['Status_type'];
	$posted_status_text = $row['Status_text'];
	$posted_status_time = $row['Status_time'];
	$posted_Youtube_embed = $row['Youtube_embed'];
	$posted_Image = $row['Image_Name'];
	$posted_Music = $row['Music_File_Name'];
	$posted_Username = $row['Login_name'];
	$posted_user_Speciality = $row['User_specialty'];
	$posted_user_id = $row['User_id'];
	
array_push($result,
array('StatusID'=>$posted_status_id,'StatusType'=>$posted_status_type,'StatusText'=>$posted_status_text,'StatusTime'=>$posted_status_time,'StatusYoutube'=>$posted_Youtube_embed,'StatusImage'=>$posted_Image,'StatusMusic'=>$posted_Music,'StatusUsername'=>$posted_Username,'StatusUserSpeciality'=>$posted_user_Speciality,'StatusUserID'=>$posted_user_id
));
}
 
echo mysqli_num_rows($res);
 
mysqli_close($con);
 
?>
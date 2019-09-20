<?php

session_start();
include '../dbconnect.php';
$Current_user_id = $_SESSION['user_id'];
$music_id = $_GET['song_id'];

	 $results = mysqli_query($conn,"SELECT * FROM music_downloads WHERE Music_id = '$music_id' and User_id = '$Current_user_id' ");
	 $num_rowss = mysqli_num_rows($results);
	 if($num_rowss > 0)
	 {
		 
	 }else{
		if( mysqli_query($conn,"INSERT INTO music_downloads(Music_id,User_id) Values ('$music_id','$Current_user_id')"))
		{
			 $results = mysqli_query($conn,"SELECT * FROM music_downloads WHERE Music_id = '$music_id'");
			$num_rowss = mysqli_num_rows($results);
			
			}
	 }

echo ("downloaded ".$num_rowss." times");
?>
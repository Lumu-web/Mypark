<?php

session_start();
include '../dbconnect.php';
$Current_user_id = $_SESSION['user_id'];
$music_id = $_GET['song_id'];

	 $results = mysql_query("SELECT * FROM music_listens WHERE Music_id = '$music_id' and User_id = '$Current_user_id' ");
	 $num_rowss = mysql_num_rows($results);
	 if($num_rowss > 0)
	 {
		 
	 }else{
		if( mysql_query("INSERT INTO music_listens(Music_id,User_id) Values ('$music_id','$Current_user_id')"))
		{
			 $results = mysql_query("SELECT * FROM music_listens WHERE Music_id = '$music_id'");
			$num_rowss = mysql_num_rows($results);
			
			}
	 }

echo ("listened ".$num_rowss." times");
?>
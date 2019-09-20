<?php



session_start();

$user_id = $_SESSION['user_id'];



$comment_btn = '<img src="../buttons/Comment.png" height="15px" width="15px">';

$trash = '<img src="../buttons/delete.png" height="15px" width="15px">';

include '../dbconnect.php';



$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");



$status_posts = "SELECT Status_id,Status_text,Status_type,Status_time,User_id,hashtag,Youtube_embed FROM following,status_post WHERE following.following_flg_user_id = '$user_id' AND following.following_fld_user_id = status_post.User_id UNION SELECT Status_id,Status_text,Status_type,Status_time,User_id,hashtag,Youtube_embed FROM status_post WHERE User_id = '$user_id' order by Status_time DESC";



$response = $db->query($status_posts);



$total_records =  mysqli_num_rows($response);

$records_on_page = 20;



$last_page = ceil($total_records/$records_on_page);



$page_num = $_POST['recordpage'];

$music_posts = $_POST['musicplayer'];

$limit = 'LIMIT ' .($page_num - 1) * $records_on_page .',' . $records_on_page;





$status_posts = "SELECT Status_id,Status_text,Status_type,Status_time,User_id,hashtag,Youtube_embed FROM following,status_post WHERE following.following_flg_user_id = '$user_id' AND following.following_fld_user_id = status_post.User_id UNION SELECT Status_id,Status_text,Status_type,Status_time,User_id,hashtag,Youtube_embed FROM status_post WHERE User_id = '$user_id' order by Status_time DESC $limit";



$response = $db->query($status_posts);



if($last_page < 1){

	$last_page = 1;

}



while ($row = $response->fetch_assoc()) {

    $posted_status_id = $row['Status_id'];

    $posted_status_text = $row['Status_text'];

    $posted_status_type = $row['Status_type'];

    $posted_status_time = $row['Status_time'];

    $posted_status_user_id = $row['User_id'];

      $posted_status_hashtag = $row['hashtag'];

	  $posted_status_youtube = $row['Youtube_embed'];

	  if($posted_status_youtube != 'null' || $posted_status_youtube != '')

	  {

		  $posted_status_youtube = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtu.be\/([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe style=\"margin:auto\" width=\"98%\" height=\"315\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$posted_status_youtube);

		  $posted_status_youtube = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe style=\"margin:auto\" width=\"98%\" height=\"315\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$posted_status_youtube);

	  }

	  

	  

	   $user_details_query = "SELECT * FROM user_details, login_user WHERE user_details.user_id = $posted_status_user_id AND  login_user.user_id = $posted_status_user_id  ";

	   

	    $response2 = $db->query($user_details_query);



        while ($row = $response2->fetch_assoc()) {

            $posted_user_id = $row['User_id'];

            $posted_username = $row['Login_name'];

            $posted_name = $row['User_name'];

            $posted_surname = $row['User_surname'];

		//end of fisrt while	

		}

	

	

	//show likes



        $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");



        $likes = "SELECT * FROM likes WHERE likes.status_id = $posted_status_id AND likes.Likes_type = 'like'";

        $sql = mysqli_query($conn,"SELECT * FROM likes WHERE likes.status_id = $posted_status_id AND likes.Likes_type = 'like'");

        $response2 = $db->query($likes);

		

		

		if (mysqli_num_rows($sql) > 0) {

           

                $likes_count = mysqli_num_rows($sql);

                

            

        } else {

            $likes_count = '0';

         

        }

      

		

                        



//display posts



                                



		

                                    $show_id = $posted_status_user_id;

                                    $show_text = convert_clickable_links($posted_status_text);

                                    $show_time = $posted_status_time;

                                    $show_username = $posted_username;

                                    $show_name = $posted_name;

                                    $show_surname = $posted_surname;

                                    $show_type = $posted_status_type;

                                    $show_likes = $likes_count;

                                  	$show_youtube = $posted_status_youtube;





                                    $check_liked = mysqli_query($conn,"SELECT * FROM likes WHERE likes.status_id = '$posted_status_id' AND likes.User_id = '$user_id' AND likes.Likes_type = 'like'");

                                    if (mysqli_num_rows($check_liked) > 0) {

                                        $like_link = "dislike";

                                    } else {

                                        $like_link = "like";

                                    }



                                    if (mysqli_num_rows($check_liked) > 0) {

                                        $like_button = '<img src="../buttons/like_button(red).png" height="16px" width="16px" alt="Generic placeholder " width="10%" height="10%">';

                                    } else {

                                        $like_button =

                                                '<img src="../buttons/like_button.png" height="14px" width="14px" "alt="Generic placeholder " width="10%" height="10%">';

                                    }



                                    $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");



                                    $comments_sql = "SELECT * FROM comments_posts WHERE  comments_posts.status_id = '$posted_status_id'";

                                    $sql = mysqli_query($conn,"SELECT * FROM comments_posts WHERE  comments_posts.status_id = '$posted_status_id'");

                                    $response2 = $db->query($comments_sql);



 

                                    if (mysqli_num_rows($sql) > 0) {

                                        $comments_count = '0';

                                        while ($row2 = $response2->fetch_assoc()) {

                                            $comments_count = $comments_count + 1;

                                        }

                                    } else {

                                        $comments_count = '0';

                                    };





                                    $time = floor(time() - strtotime($show_time));

                                    $days = 0;

									
									
									

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

                                    }else {


										$postdate = date_create($show_time);
										
                                        $show_date = date_format($postdate,"d M y");

                                    }



                                    if ($show_type == 'picture status'){

                                        $download_link = ' <a href="download_file_bridge.php?IN_status_id='.$post_status_id_array[$start].'&IN_post_type='.$show_type.'">' . $download_btn . '</a>';

                                    }elseif ($show_type == 'music status'){

                                        $download_link = ' <a href="download_file_bridge.php?IN_status_id='.$post_status_id_array[$start].'&IN_post_type='.$show_type.'">' . $download_btn . '</a>';

                                    }elseif ($show_type == 'video status'){

                                        $download_link = ' <a href="download_file_bridge.php?IN_status_id='.$post_status_id_array[$start].'&IN_post_type='.$show_type.'">' . $download_btn . '</a>';

                                    }else{

                                      $download_link = '';  

                                    }

                                    

                                    

                                    





                                    if ($show_type == 'picture status') {



                                        $_post_name = show_pic_status($posted_status_id);

                                        $show__post ='<a href="../uploads/images/'. show_pic_status($posted_status_id) .'" rel="lightbox" ><img width="30%" height="30%" class="img-thumbnail col-md-12   col-sm-12  col-xs-12 "  src="../uploads/images/' ;

                                        $show__post2 = '"" ></a>';



                                        $post_ = $show__post . $_post_name . $show__post2;

                                         

                                    } else {

                                        $post_ = '';

                                        

                                    }



                                    if ($show_type == 'music status') {

$music_posts = $music_posts + 1;



/*

                                        $cover_post_name = show_album_status($post_status_id_array[$start]);

                                        $show__post = '<img class="img-thumbnail col-md-10  col-sm-12 col-xs-12" src="../uploads/s/';

                                        $show__post2 = '" alt="Generic placeholder " width="140" height="140">';

                                        $cover_ = $show__post . $cover_post_name . $show__post2;



                                        $music_post_name = show_track_status($post_status_id_array[$start]);

                                        $music_post_type = show_track_type_status($post_status_id_array[$start]);

                                        $show_track_post = '<audio preload="auto" controls> 

                                        			<source src="../uploads/music/' . $music_post_name . '" type="audio/mpeg' . $music_post_type . '" />

                                        			

                                        			<p>Your browser does not support the <code>audio</code> element </p>

                                        			</audio>';

                                      */

										

										$get_music_details_array = show_track_details_status($posted_status_id);

										$music_download = $get_music_details_array[5];

										$downloads_for_track = get_music_download_count($get_music_details_array[6]);

										$listens_for_tracks = get_music_listen_count($get_music_details_array[6]);

										if($music_download == 'yes')

										{$music_download = "<a href='../uploads/music/".$get_music_details_array[2]."' onClick='add_download(".$get_music_details_array[6].",$(this))'><div class='download-music-button'></div></a><span class='amount_downloaded'>downloaded ".$downloads_for_track." times</span><span class='amount_listened'>listened ".$listens_for_tracks." times</span>";}else {$music_download = "<span class='amount_listened'>listened ".$listens_for_tracks." times</span>";}	

										

				
										
										$show_music_details = '<div id="player'.$music_posts.'" class="aplayer"></div><script>create_track_player("player'.$music_posts.'","'.$get_music_details_array[0].'","'.$get_music_details_array[1].'", "../uploads/music/'.$get_music_details_array[2].'", "../uploads/images/'.$get_music_details_array[3].'","'.$get_music_details_array[4].'","'.$get_music_details_array[6].'")</script>'.$music_download ;

                                        

                                        

                                    } else {

                                        $show_track_post = '';

                                        $cover_ = '';

                                        $show_music_details = '';

                                        

                                    }







                                    if ($show_type == 'video status') {







                                        $video_post_name = show_video_status($posted_status_id);

                                        $video_post_type = show_video_type_status($posted_status_id);

                                        $show_video_post = '  <video controls  width="100%" height="100%" > <source src="../uploads/video/' . $video_post_name . '" type="video/' . $video_post_type . '" /></video>';

                                        $show_video_details = show_video_details_status($posted_status_id);

                                        

                                        

                                    } else {

                                        $show_video_post = '';

                                        $show_video_details = '';

                                        

                                    }





                                  





                                    if ($posted_user_id == $user_id) {

                                        $show_delete = '<a  href="javascript:void(0)" onclick="javascript:delete_comment(this,'.$posted_status_id.',' . $user_id . ',\'' . $show_type . '\')" class="pull-right">' . $trash . '</a>';

                                    } else {

                                        $show_delete = '';

                                    }


  				 if ($show_id == $user_id) {
                                        $display_link = '<a href="../my_journey/journey.php"><div class="blog-text" style="font-weight:400;"><font color="#262626" size="3px"  weight="150px">' . $show_username . '</font></div></a>';
                                    } else {
                                        $display_link = '<a href="../explore/journey.php?IN_user_id=' . $show_id . '" ><div class="blog-text" style="font-weight:400;"><font color="#262626" size="3px"  weight="150px">' . $show_username . '</font></div></a>';
                                    }



                                    echo' <div class="row table-border"><img class=" blankspace img-rounded pull-left" src="../uploads/images/' . show_pro_pic($posted_user_id) . '"  alt="" width="40" height="40">
<div class="pull-right"><font size="1px" color="#ccc">' . $show_date . '&nbsp;&nbsp;&nbsp;&nbsp;</font></div>
                                  <div class="unameposition">
                                  ' . $display_link . ' 
                                  </div>
                                  <div class="youtube">     
                                        <div  class="blog-text"  style="max-width:900px; font-weight:300; word-wrap:break-word;"><font  size="3px" weight="150px">' . $show_text . '</font></div>

' . $post_ . ' 

    ' . $show_music_details . ' 

	

     ' . $show_track_post . '

 

' . $show_video_details . '

         ' . $show_video_post . '

		 '. $show_youtube . '

  <div class="col-md-12 col-sm-12 col-xs-12">       

                </p>           

         

                                      

                                                                            

                                            <p><a href="javascript:void(0)" onClick="like_or_dislike(this,\''.$like_link.'\','.$posted_status_id.','.$user_id.')" >' . $like_button . '</a><span class="blog-post-meta"><font size="1px"> ' . $show_likes . '</font></span>

                              <a href="comments.php?IN_status_id=' . $posted_status_id. '&IN_user_id=' . $user_id . '" type="submit">' . $comment_btn . '</a><span class="blog-post-meta"> <font size="1px"> ' . $comments_count . ' </font></span> ' . $show_delete. '                       </p>                                                                       


</div>
                                    </div>

                                </div>';

                                   

								   

		

//end of fisrt while	











};



?>





<?php

function convert_clickable_links($message)

{

	$parsedMessage = preg_replace(array('/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:\'".,<>?«»“”‘’]))/', '/(^|[^a-z0-9_])@([a-z0-9_]+)/i', '/(^|[^a-z0-9_])#([a-z0-9_]+)/i'), array('<a href="../../../$1" target="_blank">$1</a>', '$1<a href="at_bridge.php?username=$2">@$2</a>', '$1<a href="hashtag_bridge.php?hashtag=$2">#$2</a>'), $message);

	return $parsedMessage;

}



    function commentsFuntion($status_id) {

    $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");



    $query = "SELECT * FROM comments_posts WHERE Status_id = $status_id ORDER BY Comment_time";



    $response = $db->query($query);





    echo '<div class="col-md-10 col-md-push-2 blog-post">

                <div class="row">';





    while ($row = $response->fetch_assoc()) {



        $Comment_id = $row['Comment_id'];

        $Comment_text = $row['Comment_text'];

        $Comment_time = $row['Comment_time'];

        $Comment_User_id = $row['User_id'];





        $db2 = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");



        $query2 = "SELECT * FROM login_user, user_details WHERE user_details.user_id = '$Comment_User_id'AND login_user.user_id = '$Comment_User_id'";



        $response2 = $db2->query($query2);



        while ($row = $response2->fetch_assoc()) {

            $user_name = $row['User_name'];

            $user_surname = $row['User_surname'];

            $user_specialty = $row['User_specialty'];

            $user_username = $row['Login_name'];

        };















        echo '<p><big>' . $user_username . '  </big> <p class="blog-post-meta"> ' . $user_name . ' ' . $user_surname . '</p> </p>

                    <p>' . $Comment_text . '</p>

                    <p class="blog-post-meta">' . $Comment_time . '</p>

                    <hr>';

    }

    echo '</div></div>';

}



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



function show_pic_status($INstatus_id) {



    //show post pic name



    $num_rows = mysqli_query($conn,"SELECT * FROM images_files WHERE Status_id = '$INstatus_id'");

    if (mysqli_num_rows($num_rows) > 0) {

        $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");



        $query = "SELECT * FROM images_files WHERE Status_id = '$INstatus_id'";



        $response = $db->query($query);





        while ($row = $response->fetch_assoc()) {

            $image_name_post = $row['Image_Name'];

        }

    } else {



        echo ' error';

        ;

    }

    return $image_name_post;

}



function show_track_details_status($INstatus_id) {



    //show post track name



    $num_rows = mysqli_query($conn,"SELECT * FROM music WHERE Status_id = '$INstatus_id' ");

    if (mysqli_num_rows($num_rows) > 0) {

        $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");



        $query = "SELECT * FROM music WHERE Status_id = '$INstatus_id'";



        $response = $db->query($query);





         while ($row = $response->fetch_assoc()) {

            $music_file_name = $row['Music_File_Type'];

            $music_file_track = $row['Music_track'];

            $music_file_album = $row['Music_album'];

            $music_file_artist = $row['Music_artist'];

            $music_file_release = $row['Music_Release'];

			$music_file_Name = $row['Music_File_Name'];

			$music_file_Cover = $row['Music_cover'];

			$music_file_download = $row['Music_download'];

			$music_file_id = $row['Music_id'];

        }



$music_details = array($music_file_track, $music_file_artist,$music_file_Name, $music_file_Cover, $music_file_album,$music_file_download,$music_file_id);

    } else {



        $music_details = '';

    }

    return $music_details;

}



function show_video_status($INstatus_id) {



    //show post track name



    $num_rows = mysqli_query($conn,"SELECT * FROM video_file WHERE Status_id = '$INstatus_id' ");

    if (mysqli_num_rows($num_rows) > 0) {

        $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");



        $query = "SELECT * FROM video_file WHERE Status_id = '$INstatus_id'";



        $response = $db->query($query);





        while ($row = $response->fetch_assoc()) {

            $video_name_post = $row['Video_file_name'];

        }

    } else {



        echo 'error';

        ;

    }

    return $video_name_post;

}



function show_video_type_status($INstatus_id) {



    //show post video type name



    $num_rows = mysqli_query($conn,"SELECT * FROM video_file WHERE Status_id = '$INstatus_id' ");

    if (mysqli_num_rows($num_rows) > 0) {

        $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");



        $query = "SELECT * FROM video_file WHERE Status_id = '$INstatus_id'";



        $response = $db->query($query);





        while ($row = $response->fetch_assoc()) {

            $video_type_post = $row['Video_file_type'];

        }

    } else {



        echo 'error';

        ;

    }

    return $video_type_post;

}



function show_video_details_status($INstatus_id) {



    //show post track name



    $num_rows = mysqli_query($conn,"SELECT * FROM video_file WHERE Status_id = '$INstatus_id' ");

    if (mysqli_num_rows($num_rows) > 0) {

        $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");



        $query = "SELECT * FROM video_file WHERE Status_id = '$INstatus_id'";



        $response = $db->query($query);





        while ($row = $response->fetch_assoc()) {

            $video_name = $row['Video_name'];

            $video_by = $row['Video_by'];

            $video_description = $row['Video_description'];

            $video_album = $row['Video_album'];

            $video_uploaded = $row['Uploaded_date'];

        }



        $video_details = '<div class="container col-md-10 ">

            </br>

    <p>' . $video_description . ' </p>         

</div>

';

    } else {



        echo 'error';

        ;

    }

    return $video_details;

}                           





function get_music_listen_count($music_id)

{

	 $results = mysqli_query($conn,"SELECT * FROM music_listens WHERE Music_id = '$music_id' ");

	 $num_rowss = mysqli_num_rows($results);

	 return $num_rowss;

}



function get_music_download_count($music_id)

{

	 $results = mysqli_query($conn,"SELECT * FROM music_downloads WHERE Music_id = '$music_id' ");

	 $num_rowss = mysqli_num_rows($results);

	 return $num_rowss;

}

?>



<?php

session_start();

include '../dbconnect.php';











 $_SESSION['more_results_clicked'] = 0;

 $_SESSION['newer_posts'] = '';

 $_SESSION['newer_posts_journey'] = '';

   



 ?>         

        <script>

            window.open ('http://www.mypark.co.za/my_journey/journey.php','_self',false)

        </script>

        <?php

   

   

   

?>














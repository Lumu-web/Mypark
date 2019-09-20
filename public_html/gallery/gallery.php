<?php
include '../dbconnect.php';
include 'gallery_coding.php';
//for all the icons
$logo = '<img src="../Icons/MyPark Logo.png" height="40px" width="60px">';
$upload_music = '<img src="../buttons/musicbutton.png" height="20px" width="20px">';
$upload_pic = '<img src="../buttons/original pic.png"height="20px" width="20px">';
$upload_vid = '<img src="../buttons/original video.png" height="20px" width="20px">';
$comment_btn = '<img src="../buttons/Comment.png" height="19px" width="17px">';
$trash = '<img src="../buttons/delete.png" height="20px" width="20px">';
$journey = '<img src="../buttons/journey.png" height="20px" width="20px">';
$explore = '<img src="../buttons/explore.png" height="20px" width="20px">';
$home = '<img src="../buttons/home-xxl.png" height="20px" width="20px">';
$notify = '<img src="../buttons/notification.png" height="20px" width="20px">';
$gallery = '<img src="../buttons/gallery.png" height="20px" width="20px">';
$message = '<img  src="../buttons/message.png" height="20px" width="20px">';
$logout = '<img src="../buttons/Logout-128.png" height="20px" width="20px">';
$settings = '<img src="../buttons/tool.png"
height="20px" class="editpic" width="20px">';

if(($tempsession = $_GET['currentsess']) == "" | ($tempsession = $_GET['currentsess']) == null)
{
	
}else
{
	$_SESSION['$media_id'] = $_GET['currentsess'];
};




if($_SESSION['$media_id'] == 0)
{
	$albumtype = '<a href="gallery.php?currentsess=1">goto Music Album</a>';
}
elseif($_SESSION['$media_id']==1)
{
	$albumtype = '<a href="gallery.php?currentsess=0">goto Photo Album</a>';
}

$media_id = $_SESSION['$media_id'];
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">


        <title>My Park | Gallery</title>


        <link href="../css/bootstrap.css" rel="stylesheet">


        <link href="../css/blog.css" rel="stylesheet">

 <link href="../css/lightbox.css" rel="stylesheet">



        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>












   <link rel="stylesheet" href="../media_player/APlayer.min.css">
    </head>

    <body>
<script src="../media_player/APlayer.min.js"></script>
<script src="../media_player/demo.js"></script>


      
         <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
                        <span class="sr-only"><a href="../notifications/notifications.php"><?php echo $show_unchecked_count; ?></a></span>
                        <span class="sr-only">><a href="../notifications/notifications.php"><?php echo $show_unchecked_count; ?></a></span>
                        <span class="sr-only">><a href="../notifications/notifications.php"><?php echo $show_unchecked_count; ?></a></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                   <a class="navbar-brand" href="/" alt="Logo"><?php echo $logo; ?></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="../main_menu/Home.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('home','','../buttons/home-xxl.png',1)"><img src="../buttons/home-xxl_2.png" alt="Home" width="20" height="20"></a>
                        <li><a href="../my_journey/journey.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('journey','','../buttons/journey_2.png',1)"><img src="../buttons/journey.png" alt="Journey" width="20" height="20"></a>
                        <li><a href="../explore/explore.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('explore','','../buttons/explore_2.png',1)"><img src="../buttons/explore.png" alt="Explore" width="20" height="20" ></a>
                        <li  class="active"><a href="../gallery/gallery_bridge.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('gallery','','../buttons/gallery_2.png',0)"><img src="../buttons/gallery.png" alt="Gallery" width="25" height="25"></a>
                        <li><a href="../messages/messages_bridge.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image8','','../buttons/message_2.png',1)"><?php echo $show_unread; ?><img src="../buttons/message.png" alt="Message" width="25" height="25"></a>
                         <li><a href="../notifications/notifications.php"><?php echo $show_unchecked_count; ?><?php echo $notify; ?></a>
</ul>
                  <ul class="nav navbar-nav navbar-right">
                  <li><a href="../index.php"onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('logout','','../buttons/logout.png',1)"><img src="../buttons/logout.png" width="25" height="25"></a>
                </ul>
              </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

        <form action="gallery.php" method="POST" class="form-signin">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3 col-md-2 sidebar">
                        
                        <ul class="nav nav-sidebar">
                            <li><h6>Albums</h6></li>
<?php echo $albumtype ?>

                            <?php
                            if ($media_id == '0') {
                                //Show pictures album
                                $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

                                $query1 = "SELECT DISTINCT Image_Album FROM images_files WHERE User_id = '$user_id'";

                                $response1 = $db->query($query1);
                                $num_rows = mysqli_query($conn,"SELECT DISTINCT Image_Album FROM images_files WHERE User_id = '$user_id'");
                                if (mysqli_num_rows($num_rows) > 0) {
                                    $album_count = 0;
                                    while ($row = $response1->fetch_assoc()) {

                                        $album = $row['Image_Album'];

                                        if ($album_count == $album_id) {
                                            $current_album = $album;
                                            echo '<li class="active"><a href="">' . $album . '<span class="sr-only">(current)</span></a></li>';
                                        } else {
                                            echo '<li><a href="gallery_bridge_get.php?IN_media_id=' . $media_id . '&IN_album_id=' . $album_count . '">' . $album . '</a></li>';
                                        }
                                        $album_count = $album_count + 1;
                                    };
                                } else {
                                    $current_album = 'No pictures uploaded';
                                }
                            } elseif ($media_id == '1') {

                                //Show music album
                                $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

                                $query1 = "SELECT DISTINCT Music_album FROM music WHERE User_id = '$user_id'";

                                $response1 = $db->query($query1);
                                $num_rows = mysqli_query($conn,"SELECT DISTINCT Music_album FROM music WHERE User_id = '$user_id'");
                                if (mysqli_num_rows($num_rows) > 0) {
                                    $album_count = 0;
                                    while ($row = $response1->fetch_assoc()) {

                                        $album = $row['Music_album'];

                                        if ($album_count == $album_id) {
                                            $current_album = $album;
                                            echo '<li class="active"><a href="">' . $album . '<span class="sr-only">(current)</span></a></li>';
                                        } else {
                                            echo '<li><a href="gallery_bridge_get.php?IN_media_id=' . $media_id . '&IN_album_id=' . $album_count . '">' . $album . '</a></li>';
                                        }
                                        $album_count = $album_count + 1;
                                    };
                                } else {
                                    $current_album = 'No music uploaded';
                                }
                            } else {
                                //Show pictures album
                                $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

                                $query1 = "SELECT DISTINCT Video_album FROM video_file WHERE User_id = '$user_id'";

                                $response1 = $db->query($query1);
                                $num_rows = mysqli_query($conn,"SELECT DISTINCT Video_album FROM video_file WHERE User_id = '$user_id'");
                                if (mysqli_num_rows($num_rows) > 0) {
                                    $album_count = 0;
                                    while ($row = $response1->fetch_assoc()) {

                                        $album = $row['Video_album'];

                                        if ($album_count == $album_id) {
                                            $current_album = $album;
                                            echo '<li class="active"><a href="">' . $album . '<span class="sr-only">(current)</span></a></li>';
                                        } else {
                                            echo '<li><a href="gallery_bridge_get.php?IN_media_id=' . $media_id . '&IN_album_id=' . $album_count . '">' . $album . '</a></li>';
                                        }
                                        $album_count = $album_count + 1;
                                    };
                                } else {
                                    $current_album = 'No videos uploaded';
                                }
                            }
                            ?>

                        </ul>

                    </div>
                    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                     


                        <?php
                        if ($media_id == '0') {

                            echo '<div class="row">';

                            //collect pictures from database
                            $image_array_count = 0;
                            $num_rows = mysqli_query($conn,"SELECT * FROM images_files WHERE Image_Album = '$current_album' AND User_id = '$user_id' ");
                            if (mysqli_num_rows($num_rows) > 0) {
                                $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

                                $query = "SELECT * FROM images_files WHERE Image_Album = '$current_album' AND User_id = '$user_id' ";

                                $response = $db->query($query);
                                $image_array_count = '0';

                                while ($row = $response->fetch_assoc()) {
                                    $image_name = $row['Image_Name'];
                                    $image_named = $row['Image_named'];
                                    $image_status_id = $row['Status_id'];



                                    $image_name_array[$image_array_count] = $image_name;
                                    $image_named_array[$image_array_count] = $image_named;
                                    $image_status_id_array[$image_array_count] = $image_status_id;
                                    $image_array_count = $image_array_count + 1;
                                }
                            }
                            $start = '0';

                            //check if PICTURE below 10
                            if ($image_array_count < 10) {
                                $end = $image_array_count;
                                $more_posts = '<p>No more pictures</p>';
                            } else {
                                $post_count_divided = floor($image_array_count / 10);
                                $post_count_rounded_off = $post_count_divided * 10;
                                $post_count_last_page = $image_array_count - $post_count_rounded_off;

                                $more_posts = '<button name="show_older_posts" class="btn btn-xs-4 btn-default btn-block" type="submit">SHOW MORE PICTURES</button>';

                                if ($end > $post_count_rounded_off) {

                                    $end = $post_count_last_page + $post_count_rounded_off;
                                    $more_posts = '<p>No more pictures</p>';
                                };
                            };




                            while ($start < $end) {


                                echo '
                        <div class="col-xs-4 col-sm-3 col-md-4">
						
                            <a href="../uploads/images/' . $image_name_array[$start] . '"  rel="lightbox" ><img src="../uploads/images/' . $image_name_array[$start] . '" width="500" height="200" class="img-thumbnail" alt="Generic placeholder thumbnail"></a>
                            <h4>' . $image_named_array[$start] . ' </h4>
                           
                            
                        </div> ';

                                $start = $start + 1;
                            }
                            echo '</div>
                    <hr>';
                            echo $more_posts;
                        } elseif ($media_id == '1') {


                            //collect music from database
                            $music_array_count = 0;
                            $num_rows = mysqli_query($conn,"SELECT * FROM music WHERE Music_album = '$current_album' AND User_id = '$user_id' ");
                            if (mysqli_num_rows($num_rows) > 0) {
                                $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

                                $query = "SELECT * FROM music WHERE Music_album = '$current_album' AND User_id = '$user_id' ";

                                $response = $db->query($query);
                                $music_array_count = '0';

                                while ($row = $response->fetch_assoc()) {
                                    $music_file_name = $row['Music_File_Name'];
                                    $music_file_type = $row['Music_File_Type'];
                                    $music_track = $row['Music_track'];
                                    $music_album = $row['Music_album'];
                                    $music_artist = $row['Music_artist'];
                                    $music_release = $row['Uploaded_date'];
									$music_art = $row['Music_cover'];




                                    $music_file_name_array[$music_array_count] = $music_file_name;
                                    $music_file_type_array[$music_array_count] = $music_file_type;
                                    $music_track_array[$music_array_count] = $music_track;
                                    $music_album_array[$music_array_count] = $music_album;
                                    $music_artist_array[$music_array_count] = $music_artist;
                                    $music_release_array[$music_array_count] = $music_release;
									$music_art_array[$music_array_count] = $music_art;
                                    $music_array_count = $music_array_count + 1;
                                }
                            }
                            $start = '0';
                            $end = $music_array_count;



                            echo '<ul class="gallery-vid">';

                            while ($start < $end) {
$music_post_name = $music_file_name_array[$start];
$album_art_cover = $music_art_array[$start];

if($album_art_cover == '' | $album_art_cover == null)
{
	$album_art_cover = 'No_Image_Available.png';
}
                                echo '
                                                <li class="gallery-vid"><div id="player'.$start.'" class="aplayer"></div><script>create_track_player("player'.$start.'","'.$music_track_array[$start].'","'.$music_artist_array[$start].'", "../uploads/music/'.$music_post_name.'", "../uploads/images/'.$album_art_cover.'","'.$music_album_array[$start].'")</script>
												<div>'."<a href='../uploads/music/direct_download.php?file=\"".$music_post_name."\"'><span class='gallery-music-download'>".'</span></a></div></li>';





                                $start = $start + 1;
                            }
							echo '</ul>';
                        } else {

                            echo '<div class="row">';



                            //collect video from database
                            $video_array_count = 0;
                            $num_rows = mysqli_query($conn,"SELECT * FROM video_file WHERE Video_album = '$current_album' AND User_id = '$user_id' ");
                            if (mysqli_num_rows($num_rows) > 0) {
                                $video_array_count = '0';
                                $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

                                $query = "SELECT * FROM video_file WHERE Video_album = '$current_album' AND User_id = '$user_id' ";

                                $response = $db->query($query);


                                while ($row = $response->fetch_assoc()) {
                                    $video_file_name = $row['Video_file_name'];
                                    $video_file_type = $row['Video_file_type'];
                                    $video_name = $row['Video_name'];
                                    $video_album = $row['Video_album'];




                                    $video_file_name_array[$video_array_count] = $video_file_name;
                                    $video_file_type_array[$video_array_count] = $video_file_type;
                                    $video_name_array[$video_array_count] = $video_name;
                                    $video_album_array[$video_array_count] = $video_album;

                                    $video_array_count = $video_array_count + 1;
                                }
                            }
                            $start = '0';

                            //check if video below 10
                            if ($video_array_count < 10) {
                                $end = $video_array_count;
                                $more_posts = '<p>No more videos</p>';
                            } else {
                                $post_count_divided = floor($video_array_count / 10);
                                $post_count_rounded_off = $post_count_divided * 10;
                                $post_count_last_page = $video_array_count - $post_count_rounded_off;

                                $more_posts = '<button name="show_older_posts" class="btn btn-xs-4 btn-default btn-block" type="submit">SHOW MORE VIDEO</button>';

                                if ($end > $post_count_rounded_off) {

                                    $end = $post_count_last_page + $post_count_rounded_off;
                                    $more_posts = '<p>No more videos</p>';
                                };
                            };




                            while ($start < $end) {


                                echo '
                        <div class="col-xs-12 col-sm-12 col-md-12">
                              <video width="600" class="glyphicon-object-align-top" rel="lightbox" controls> <source src="../uploads/video/' . $video_file_name_array[$start] . '" type="video/' . $video_file_type_array[$start] . '" /></video>
                            <h4>' . $video_name_array[$start] . '</h4>
                            <span class="text-muted">' . $video_file_name_array[$start] . '</span>
                            
                        </div> ';

                                $start = $start + 1;
                            }
                            echo '</div>
                    <hr>';
                            echo $more_posts;
                        };
                        ?>

                    </div>
                </div>
            </div>








        </form>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../css/lightbox.min.js"></script>

        <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>

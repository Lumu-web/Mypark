<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {








//mp3 download

$status_post_time = date('y-m-d H:i:s');


    $target_dir = 'uploads/music/';
    $target_file = $target_dir .$user_id.$status_post_time.basename($_FILES ['userfilemp3']['name']);
    $musicFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    $musicFileName = basename($_FILES ['userfilemp3']['name']);



    if ($musicFileType == "mp3" or
            $musicFileType == "mp4" or
            $musicFileType == "wave") {

   
        if (move_uploaded_file($_FILES['userfilemp3']['tmp_name'], $target_file)) {
            
           
}
			}
}
?>
<html>
 <head>
  <title>File Upload Progress Bar</title>
 </head>
 <body>
 <style>
 
 #bar_blank {
  border: solid 1px #000;
  height: 20px;
  width: 300px;
}

#bar_color {
  background-color: #006666;
  height: 20px;
  width: 0px;
}

#bar_blank, #hidden_iframe {
  display: none;
}
</style>
  <div id="bar_blank">
   <div id="bar_color"></div>
  </div>
  <div id="status"></div>
  <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" 
   id="myupload" name="myupload" enctype="multipart/form-data" target="hidden_iframe">
   <input type="hidden" value="myupload"
    name="<?php echo ini_get("session.upload_progress.name"); ?>">
   <input type="file" name="userfilemp3"><br>
   <input type="submit" value="Start Upload">
  </form>
  <iframe id="hidden_iframe" name="hidden_iframe" src="about:blank"></iframe>
  <script type="text/javascript" src="progressbar.js"></script>
  <div>
  <?php echo(ini_get("session.upload_progress.prefix")."myupload"); ?>
  </div>
 </body>
</html>
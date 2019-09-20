<?php
session_start();
include '../dbconnect.php';

//for all the icons
$logo = '<img src="../Icons/MP Logo.png" height="30px" width="60px">';
$upload_music = '<img src="../buttons/musicbutton.png" height="27px" width="23px">';
$upload_youtube = '<img src="../buttons/youtube.png" height="24px" width="25px">';
$down_icon = '<img src="../buttons/download.png" height="25px" width="25px">';
$upload_pic = '<img src="../buttons/original pic.png" height="28px" width="28px">';
$upload_vid = '<img src="../buttons/original video.png" height="20px" width="20px">';
$comment_btn = '<img src="../buttons/Comment.png" height="22px" width="20px">';
$trash = '<img src="../buttons/delete.png" height="15px" width="15px">';
$download_btn = '<img src="../buttons/download_btn.png" height="18px" width="18px">';
$journey = '<img src="../buttons/journey.png" height="23px" width="23px">';
$explore = '<img src="../buttons/explore.png" height="23px" width="23px">';
$home = '<img src="../buttons/home-xxl.png" height="20px" width="20px">';
$notify = '<img src="../buttons/notification.png" height="23px" width="23px">';
$gallery = '<img src="../buttons/gallery.png" height="23px" width="23px">';
$message = '<img  src="../buttons/message.png" height="25px" width="25px">';
$logout = '<img src="../buttons/Logout-128.png" height="20px" width="20px">';
$settings = '<img src="../buttons/tool.png"
height="20px" class="editpic" width="20px">';
$download_icon = '<img src="../buttons/download.png"
height="20px" class="editpic" width="20px">';

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


$user_id = $_SESSION['user_id'];

$errormessage = "";
$alerttype = '';

//count unread notifications
$unread_count = 0;
$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
$num_rows = mysqli_query($conn,"SELECT * FROM notifications WHERE  Notified_user_id = '$user_id' AND Notifier_user_id != '$user_id' AND Notification_status = 'unchecked'  ");
if (mysqli_num_rows($num_rows) > 0) {



    $query = "SELECT * FROM notifications WHERE  Notified_user_id = '$user_id' AND Notifier_user_id != '$user_id' AND Notification_status = 'unchecked' ";

    $response = $db->query($query);
    $unchecked_count = '0';

    while ($row = $response->fetch_assoc()) {
        $unchecked_count = $unchecked_count + 1;
    }
    $show_unchecked_count = '<div class="bdg color" nbr=&nbsp;'.$unchecked_count.'></div>';
} else {
    $show_unchecked_count = '';
}
//count unread messages
$unread_count = 0;
$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
$num_rows = mysqli_query($conn,"SELECT * FROM messages WHERE Message_status = 'unread' AND Receiver_id = '$user_id' ");
if (mysqli_num_rows($num_rows) > 0) {



    $query = "SELECT * FROM messages WHERE Message_status = 'unread' AND Receiver_id = '$user_id' ";

    $response = $db->query($query);
    $unread_count = '0';

    while ($row = $response->fetch_assoc()) {
        $unread_count = $unread_count + 1;
    }
    $show_unread = '<div class="bdg color" nbr=&nbsp;'.$unread_count.'></div>';
} else {
    $show_unread = '';
}

$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

$query = "SELECT * FROM login_user, user_details WHERE login_user.User_id = '$user_id' AND user_details.User_id = '$user_id'";

$response = $db->query($query);

while ($row = $response->fetch_assoc()) {
    $user_name = $row['User_name'];
    $user_surname = $row['User_surname'];
    $user_specialty = $row['User_specialty'];
      $location = $row['Location'];
    $user_gender = $row['User_gender'];
    $user_email = $row['User_email'];
    $user_slogan = $row['User_slogan'];
    $user_username = $row['Login_name'];
    $user_pass = $row['Login_password'];
};

if (isset($_POST['save_changes'])) {

    $user_name = mysqli_real_escape_string($conn, $_POST['uname']);
    $user_surname = mysqli_real_escape_string($conn, $_POST['usurname']);
        $location = mysqli_real_escape_string($conn, $_POST['location']);
    $user_gender = mysqli_real_escape_string($conn, $_POST['ugender']);
    $user_username = mysqli_real_escape_string($conn, $_POST['uusername']);
     $user_username = strtolower( $user_username);
    $user_specialty = mysqli_real_escape_string($conn, $_POST['uspecialty']);
    $user_email = mysqli_real_escape_string($conn, $_POST['uemail']);
    $user_slogan = mysqli_real_escape_string($conn, $_POST['uslogan']);
        $upassword = mysqli_real_escape_string($conn, $_POST['upass']);
    $urepass = mysqli_real_escape_string($conn, $_POST['urepass']);
    
    if ($upassword == $urepass) {

        
        if (mysqli_query($conn,"UPDATE user_details SET User_name = '$user_name', User_surname = '$user_surname', User_specialty = '$user_specialty', Location = '$location',
                User_gender = '$user_gender', User_email = '$user_email', User_slogan = '$user_slogan' WHERE User_id = '$user_id';")) {
            if (mysqli_query($conn,"UPDATE login_user SET Login_name = '$user_username' WHERE User_id = '$user_id';")) {
                  
                ?>         
    <script>
        window.open ('http://www.mypark.co.za/main_menu/Edit_Profile.php','_self',false)
    </script>
    <?php
                
            }
        } else {
            
        }
    }else{
        
        $errormessage = " <big>Warning</big> Passwords don't match...'";
        $alerttype = 'class="alert alert-danger"';
        
       
    }
}

if (isset($_POST['change_profile_picture'])) {
    ?>         
    <script>
        window.open ('http://www.mypark.co.za/main_menu/Change_profile_pic.php','_self',false)
       
    </script>
    
    if (isset($_POST['change_password'])) {
    ?>         
    <script>
        window.open ('http://www.mypark.co.za/main_menu/Change_password.php','_self',false)
    </script>
    <?php
}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

        <title>MyPark</title>


        <link href="../css/bootstrap.css" rel="stylesheet">

<link href="../css/mypark_main.css" rel="stylesheet">
        <link href="../css/blog.css" rel="stylesheet">


        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
      <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
<link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">


<script type="text/javascript">

function AvoidSpace(event) {
    var k = event ? event.which : window.event.keyCode;
    if (k == 32) return false;
    
    }
function makeLowercase() {
document.form1.outstring.value = document.form1.instring.value.toLowerCase();
 }
$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(1500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);
 
});





</script>








    </head>

    <body>


           <nav class="navbar navbar-default navbar-fixed-top ">
    
                <div class="navbar-header ">
                   
                    <a class="navbar-brand" href="../main_menu/Home.php" alt="Logo"><?php echo $logo; ?></a>
                    <a class="navbar-brand" href="../my_journey/journey.php" alt="Logo"><?php echo $journey; ?></a>
                            <a class="navbar-brand" href="../explore/explore.php" alt="Logo"><?php echo $explore; ?></a>
                      
                        <a class="navbar-brand" href="../messages/messages.php" alt="Logo"><?php echo $show_unread; ?><?php echo $message; ?></a>
                        <a class="navbar-brand active" href="../notifications/notifications.php" alt="Logo"><?php echo $show_unchecked_count ?><?php echo $notify; ?></a>
                </div>
               
        </nav>


<p>&nbsp;</p>
<p>&nbsp;</p>
        <form action="Edit_Profile.php" method="POST" class="form-signin">
            <div class="container col-md-10 col-md-push-1">

                <div class="blog-header">
                    <div class="row">

                        

                    </div>
                </div>
                <div id="alertbox1"  <?php echo $alerttype ?>><?php echo $errormessage; ?></div> 

                <div class="row">
                    <div class="container">
                        <div class="col-md-6 col-md-push-3 blog-main  ">
                       


                            <div class="col-md-6  col-md-push-2 blog-post">
                          
                                <div class="row">
                                    <hr>
                                    <button name="change_profile_picture" class="btn btn-md btn-default btn-block" type="submit" >Change Profile Picture</button>
                                     <button name="change_password" formaction="Change_password.php" class="btn btn-md btn-default btn-block" type="submit" >Change Password</button>
                                    <hr>
                                    <h6>Type in your Slogan</h4>
                                    <label for="inputSlogan" class="sr-only">Slogan</label>
                                    <textarea name="uslogan" id="inputUsername" class="form-control"  /><?php echo $user_slogan ?></textarea>
                                    <hr>
                                    





<input type="text" id="location" list="locationlist" placeholder="Location" class="form-control" name="location" value="<?php echo $location; ?>" />
<datalist id="locationlist">
<option value="Johannesburg,Gauteng">
<option value="Soweto,Gauteng">
<option value="Sebokeng,Gauteng">
<option value="Johannesburg,Gauteng">
<option value="Pretoria,Gauteng">
<option value="Soweto,Gauteng">
<option value="Benoni,Gauteng"
<option value="Carletonville,Gauteng">
<option value="Centurion,Gauteng">
<option value="Edenvale,Gauteng">
<option value="Kempton Park,Gauteng">
<option value="Boksburg,Gauteng">
<option value="Alexandra,Gauteng">
<option value="Springs,Gauteng">
<option value="Krugersdorp,Gauteng">
<option value="Vereeniging,Gauteng">
<option value="Vanderbijlpark,Gauteng">
<option value="Germiston,Gauteng">
<option value="Alberton,Gauteng">
<option value="Ga-Rankuwa,Gauteng">
<option value="Midrand,Gauteng">
<option value="Braamfontein,Gauteng">
<option value="Heidelberg,Gauteng">
<option value="Magaliesburg,Gauteng">
<option value="Sandton,Gauteng">
<option value="Parkhurst,Gauteng">
<option value="Rosebank,Gauteng">
<option value="Randburg,Gauteng">
<option value="Houghton,Gauteng">
<option value="Bedfordview,Gauteng">


<option value="Afguns,Limpopo">				
<option value="Alldays,Limpopo"> 	 			
<option value="Bandelierkop,Limpopo"> 				
<option value="Ba-Phalaborwa,Limpopo"> 	
<option value="Bela-Bela,Limpopo"> 	
<option value="Bochum,Limpopo">				
<option value="Bosbokrand,Limpopo"> 	 			
<option value="Dendron,Limpopo"> 				
<option value="Duiwelskloof,Limpopo"> 	
<option value="Ellisras,Limpopo"> 	
<option value="Gravelotte,Limpopo"> 	 			
<option value="Haenertsburg,Limpopo"> 				
<option value="Hoedspruit,Limpopo"> 			
<option value="Klaserie,Limpopo"> 	 			
<option value="Lephalale,Limpopo"> 	
<option value="Letsitele,Limpopo"> 	 			
<option value="Leydsdorp,Limpopo"> 	 			
<option value="Louis Trichardt,Limpopo">	 			
<option value="Modimolle,Limpopo"> 	
<option value="Modjadjiskloof,Limpopo"> 				
<option value="Mogwadi,Limpopo"> 				
<option value="Mokopane,Limpopo"> 	
<option value="Mookgophong,Limpopo"> 	
<option value="Messina,Limpopo"> 				
<option value="Musina,Limpopo"> 	
<option value="Naboomspruit,Limpopo"> 	
<option value="Nylstroom,Limpopo"> 				
<option value="Ofcolaco,Limpopo"> 	 			
<option value="Phalaborwa,Limpopo"> 	
<option value="Polokwane,Limpopo"> 	
<option value="Potgietersrus,Limpopo"> 				
<option value="Roedtan,Limpopo"> 	 			
<option value="Senwabarwana,Limpopo"> 				
<option value="Seshego,Limpopo"> 			
<option value="Thabazimbi,Limpopo"> 				
<option value="Thohoyandou,Limpopo"> 			
<option value="Tzaneen,Limpopo"> 	 			
<option value="Vaalwater,Limpopo"> 	 			
<option value="Vivo,Limpopo"> 				
<option value="Zebedeila,Limpopo"> 	
<option value="Zion City Moria,Limpopo">



<option value="Atlantis,Western Cape">
<option value="Bellville,Western Cape">
<option value="Blue Downs,Western Cape">
<option value="Brackenfell,Western Cape">
<option value="Cape Town,Western Cape"
<option value="Crossroads,Western Cape">
<option value="Durbanville,Western Cape">
<option value="Eerste River,Western Cape">
<option value="Elsie's River,Western Cape">
<option value="Fish Hoek,Western Cape">
<option value="Goodwood,Western Cape">
<option value="Gordon's Bay,Western Cape">
<option value="Guguletu,Western Cape">
<option value="Hout Bay,Western Cape">
<option value="Khayelitsha,Western Cape">
<option value="Kraaifontein,Western Cape">
<option value="Kuils River,Western Cape">
<option value="Langa,Western Cape">
<option value="Macassar,Western Cape">
<option value="Melkbosstrand,Western Cape">
<option value="Mfuleni,Western Cape">
<option value="Milnerton,Western Cape">
<option value="Mitchell's Plain,Western Cape">
<option value="Noordhoek,Western Cape">
<option value="Nyanga,Western Cape">
<option value="Observatory,Western Cape">
<option value="Parow,Western Cape">
<option value="Simon's Town,Western Cape">
<option value="Somerset West,Western Cape">
<option value="Southern Suburbs,Western Cape">
<option value="Strand,Western Cape">
<option value="Aurora,Western Cape">
<option value="Bitterfontein,Western Cape">
<option value="Chatsworth,Western Cape">
<option value="Citrusdal,Western Cape">
<option value="Clanwilliam,Western Cape">
<option value="Darling,Western Cape">
<option value="Doringbaai,Western Cape">
<option value="Dwarskersbos,Western Cape">
<option value="Ebenhaeser,Western Cape">
<option value="Eendekuil,Western Cape">
<option value="Elands Bay,Western Cape">
<option value="Goedverwacht,Western Cape">
<option value="Graafwater,Western Cape">
<option value="Grotto Bay,Western Cape">
<option value="Hopefield,Western Cape">
<option value="Jacobsbaai,Western Cape">
<option value="Jakkalsfontein,Western Cape">
<option value="Kalbaskraal,Western Cape">
<option value="Klawer,Western Cape">
<option value="Koekenaap,Western Cape">
<option value="Koringberg,Western Cape">
<option value="Lamberts Bay,Western Cape">
<option value="Langebaan,Western Cape">
<option value="Langebaanweg,Western Cape">
<option value="Lutzville,Western Cape">
<option value="Malmesbury,Western Cape">
<option value="Moorreesburg,Western Cape">
<option value="Paternoster,Western Cape">
<option value="Piketberg,Western Cape">
<option value="Porterville,Western Cape">
<option value="Redelinghuys,Western Cape">
<option value="Riebeek-Kasteel,Western Cape">
<option value="Riebeek West,Western Cape">
<option value="Saldanha,Western Cape">
<option value="St Helena Bay,Western Cape">
<option value="Strandfontein,Western Cape">
<option value="Vanrhynsdorp,Western Cape">
<option value="Velddrif,Western Cape">
<option value="Vredenburg,Western Cape">
<option value="Vredendal,Western Cape">
<option value="Wupperthal,Western Cape">
<option value="Yzerfontein,Western Cape">
<option value="Ashton,Western Cape">
<option value="Bonnievale,Western Cape">
<option value="Ceres,Western Cape">
<option value="De Doorns,Western Cape">
<option value="Denneburg,Western Cape">
<option value="Franschhoek,Western Cape">
<option value="Gouda,Western Cape">
<option value="Kayamandi,Western Cape">
<option value="Klapmuts,Western Cape">
<option value="Kylemore,Western Cape">
<option value="Languedoc,Western Cape">
<option value="McGregor,Western Cape">
<option value="Montagu,Western Cape">
<option value="Op-die-Berg,Western Cape">
<option value="Paarl,Western Cape">
<option value="Pniel,Western Cape">
<option value="Prince Alfred Hamlet,Western Cape">
<option value="Rawsonville,Western Cape">
<option value="Robertson,Western Cape">
<option value="Robertsvlei,Western Cape">
<option value="Rozendal,Western Cape">
<option value="Saron,Western Cape">
<option value="Stellenbosch,Western Cape">
<option value="Touws River,Western Cape">
<option value="Tulbagh,Western Cape">
<option value="Wellington,Western Cape">
<option value="Wemmershoek,Western Cape">
<option value="Wolseley,Western Cape">
<option value="Worcester,Western Cape">
<option value="Arniston,Western Cape">
<option value="Baardskeerdersbos,Western Cape">
<option value="Barrydale,Western Cape">
<option value="Betty's Bay,Western Cape">
<option value="Birkenhead,Western Cape">
<option value="Botrivier,Western Cape">
<option value="Bredasdorp,Western Cape">
<option value="Caledon,Western Cape">
<option value="Dennehof,Western Cape">
<option value="De Kelders,Western Cape">
<option value="Elgin,Western Cape">
<option value="Elim,Western Cape">
<option value="Fisherhaven,Western Cape">
<option value="Franskraalstrand,Western Cape">
<option value="Gansbaai,Western Cape">
<option value="Genadendal,Western Cape">
<option value="Grabouw,Western Cape">
<option value="Greyton,Western Cape">
<option value="Hawston,Western Cape">
<option value="Hermanus,Western Cape">
<option value="Hotagterklip,Western Cape">
<option value="Infanta,Western Cape">
<option value="Kleinbaai,Western Cape">
<option value="Kleinmond,Western Cape">
<option value="L'Agulhas,Western Cape">
<option value="Napier,Western Cape">
<option value="Onrusrivier,Western Cape">
<option value="Pearly Beach,Western Cape">
<option value="Pringle Bay,Western Cape">
<option value="Riviersonderend,Western Cape">
<option value="Rooi Els,Western Cape">
<option value="Stanford,Western Cape">
<option value="Struisbaai,Western Cape">
<option value="Suiderstrand,Western Cape">
<option value="Suurbraak,Western Cape">
<option value="Swellendam,Western Cape">
<option value="Van Dyksbaai,Western Cape">
<option value="Vermont,Western Cape">
<option value="Villiersdorp,Western Cape">
<option value="Albertinia,Western Cape">
<option value="Boggomsbaai,Western Cape">
<option value="Brenton-on-Sea,Western Cape">
<option value="Buffelsbaai,Western Cape">
<option value="Calitzdorp,Western Cape">
<option value="Dana Baai,Western Cape">
<option value="De Rust,Western Cape">
<option value="Dysselsdorp,Western Cape">
<option value="Friemersheim,Western Cape">
<option value="George,Western Cape">
<option value="Glentana,Western Cape">
<option value="Gouritsmond,Western Cape">
<option value="Great Brak River,Western Cape">
<option value="Groot-Jongensfontein,Western Cape">
<option value="Haarlem,Western Cape">
<option value="Hartenbos,Western Cape">
<option value="Heidelberg,Western Cape">
<option value="Herbertsdale,Western Cape">
<option value="Herolds Bay,Western Cape">
<option value="Keurboomsrivier,Western Cape">
<option value="Keurboomstrand,Western Cape">
<option value="Knysna,Western Cape">
<option value="Kranshoek,Western Cape">
<option value="Kurland Estate,Western Cape">
<option value="Ladismith,Western Cape">
<option value="Little Brak River,Western Cape">
<option value="Mossel Bay,Western Cape">
<option value="Nature's Valley,Western Cape">
<option value="Noetzie,Western Cape">
<option value="Oudtshoorn,Western Cape">
<option value="Pacaltsdorp,Western Cape">
<option value="Plettenberg Bay,Western Cape">
<option value="Port Beaufort,Western Cape">
<option value="Rheenendal,Western Cape">
<option value="Riversdale,Western Cape">
<option value="Sedgefield,Western Cape">
<option value="Slangrivier,Western Cape">
<option value="Stilbaai,Western Cape">
<option value="Uniondale,Western Cape">
<option value="Volmoed,Western Cape">
<option value="Victoria Bay,Western Cape">
<option value="Wilderness,Western Cape">
<option value="Wittedrift,Western Cape">
<option value="Zoar,Western Cape">
<option value="Beaufort West,Western Cape">
<option value="Laingsburg,Western Cape">
<option value="Leeu-Gamka,Western Cape">
<option value="Matjiesfontein,Western Cape">
<option value="Merweville,Western Cape">
<option value="Murraysburg,Western Cape">
<option value="Nelspoort,Western Cape">
<option value="Prince Albert,Western Cape">








<option value="Rustenburg,North West">
<option value="Mahikeng,North West">
<option value="Potchefstroom,North West">
<option value="Klerksdorp,North West">
<option value="Lichtenburg,North West">
<option value="Brits,North West">
<option value="Mmabatho,North West">
<option value="Stilfontein,North West North West">
<option value="Bloemhof,North West">
<option value="Vryburg,North West">
<option value="Groot Marico,North West">
<option value="Orkney,North West">
<option value="Taung,North West">
<option value="Ga-Rankuwa,North West">
<option value="Coligny,North West">
<option value="Mooinooi,North West">
<option value="Swartruggens,North West">
<option value="Broedersteroom,North West">
<option value="Ganyesa,North West">
<option value="Coster,North West">
<option value="Kosmos,North West">
<option value="Seheeizer-Reneke,North West">
<option value="Ventesdorp,North West">
<option value="Delareyville,North West">
<option value="Hartebeesfontein,North West">
<option value="Stella,North West">
<option value="Wolmaransstad,North West">
<option value="Christianan,North West">
<option value="Ottosdal,North West">
<option value="Zeerust,North West">
<option value="Fochville,North West">
<option value="Pokeng,North West">
<option value="Zinniaville,North West">
<option value="Ottosdel,North West">
<option value="Durby,North West">
<option value="Crooldal,North West">
<option value="Bakerville,North West">
<option value="Boskop,North West">
<option value="Mankwe,North West">
<option value="Rooigrond,North West">
<option value="Tladistad,North West">
<option value="Piet Plessis,North West">
<option value="Lesetlheng,North West">
<option value="Moedwil,North West">
<option value="Skeerpoort,North West">
<option value="Sannieshof,North West">

<option value="Aankoms,Mpumalanga"> 		
<option value="Acornhoek,Mpumalanga"> 				
<option value="Amersfoort,Mpumalanga">				
<option value="Amsterdam,Mpumalanga"> 	 			
<option value="Anysspruit,Mpumalanga"> 				
<option value="Argent,Mpumalanga"> 				
<option value="Avoca,Mpumalanga">				
<option value="Avontuur,Mpumalanga"> 	 	
<option value="Badplaas,Mpumalanga"> 				
<option value="Balfour,Mpumalanga"> 	 			
<option value="Balmoral,Mpumalanga"> 				
<option value="Bankkop,Mpumalanga"> 				
<option value="Barberton,Mpumalanga"> 	 			
<option value="Belfast,Mpumalanga"> 				
<option value="Berbice,Mpumalanga"> 				
<option value="Bethal,Mpumalanga"> 			
<option value="Bettiesdam,Mpumalanga"> 				
<option value="Branddraai,Mpumalanga"> 				
<option value="Braunschweig,Mpumalanga"> 			
<option value="Breyten,Mpumalanga"> 				
<option value="Brondal,Mpumalanga"> 			
<option value="Bushbuckridge,Mpumalanga"> 			
<option value="Carolina,Mpumalanga"> 				
<option value="Chrissiesmeer,Mpumalanga"> 	 			
<option value="Davale,Mpumalanga"> 		
<option value="Delmas,Mpumalanga">	 			
<option value="Diepdale,Mpumalanga"> 	 	
<option value="Diepgezet,Mpumalanga"> 		
<option value="Dullstroom,Mpumalanga"> 				
<option value="Dundonald,Mpumalanga"> 	 	
<option value="Eerstehoek,Mpumalanga"> 		
<option value="Ekulindeni,Mpumalanga"> 		
<option value="Elukwatini,Mpumalanga">		
<option value="Embhuleni,Mpumalanga"> 		
<option value="Emphuluzi,Mpumalanga"> 		
<option value="Enkhaba,Mpumalanga"> 	 	
<option value="Ermelo,Mpumalanga"> 	 			
<option value="Fernie,Mpumalanga"> 		
<option value="Glenmore,Mpumalanga"> 	 	
<option value="Graskop,Mpumalanga"> 				
<option value="Greylingstad,Mpumalanga"> 			
<option value="Hartebeeskop,Mpumalanga"> 	
<option value="Hazyview,Mpumalanga">			
<option value="Hectorspruit,Mpumalanga">			
<option value="Kaapmuiden,Mpumalanga"> 			
<option value="Kinross,Mpumalanga"> 			
<option value="Komatipoort,Mpumalanga">			
<option value="KwaMhlanga,Mpumalanga">			
<option value="Lochiel,Mpumalanga">
<option value="Loopspruit,Mpumalanga">			
<option value="Lydenburg,Mpumalanga">			
<option value="Machadodorp,Mpumalanga">
<option value="Malelane,Mpumalanga">
<option value="Marble Hall,Mpumalanga">			
<option value="Mbhejeka,Mpumalanga"> 	
<option value="Middelburg,Mpumalanga"> 			
<option value="Moddergat,Mpumalanga">	
<option value="Nelspruit,Mpumalanga">
<option value="Ngodwana,Mpumalanga">			
<option value="Ohrigstad,Mpumalanga"> 			
<option value="Perdekop,Mpumalanga"> 			
<option value="Piet Retief,Mpumalanga">			
<option value="Pilgrim's Rest,Mpumalanga"> 			
<option value="Sabie,Mpumalanga"> 			
<option value="Secunda,Mpumalanga">			
<option value="Siyabuswa,Mpumalanga"> 			
<option value="Skukuza,Mpumalanga">  			
<option value="Standerton,Mpumalanga">  			
<option value="Trichardt,Mpumalanga"> 			
<option value="Vaalbank,Mpumalanga">			
<option value="Volksrust,Mpumalanga">			
<option value="Wakkerstroom,Mpumalanga"> 			
<option value="Waterval Boven,Mpumalanga">			
<option value="Waterval Onder,Mpumalanga"> 			
<option value="White River,Mpumalanga"> 				
<option value="Witbank,Mpumalanga">


<option value="Matatiele,Eastern Cape">
<option value="Mbizana,Eastern Cape">
<option value="Ntabankulu,Eastern Cape">
<option value="Umzimvubu,Eastern Cape">
<option value="Amahlathi,Eastern Cape">
<option value="Great Kei,Eastern Cape">
<option value="Mbhashe,Eastern Cape">
<option value="Mnquma,Eastern Cape">
<option value="Ngqushwa,Eastern Cape">
<option value="Nkonkobe,Eastern Cape">
<option value="Nxuba,Eastern Cape">
<option value="Emalahleni,Eastern Cape">
<option value="Ngcobo,Eastern Cape">
<option value="Inkwanca,Eastern Cape">
<option value="Intsika,Eastern Cape">
<option value="Inxuba Yethemba,Eastern Cape">
<option value="Lukhanji,Eastern Cape">
<option value="Sakhisizwe,Eastern Cape">
<option value="Tsolwana,Eastern Cape">
<option value="Elundini,Eastern Cape">
<option value="Gariep,Eastern Cape">
<option value="Maletswai,Eastern Cape">
<option value="Senqu,Eastern Cape">
<option value="Ingquza Hill,Eastern Cape">
<option value="King Sabata Dalindyebo,Eastern Cape">
<option value="Mhlontlo,Eastern Cape">
<option value="Nyandeni,Eastern Cape">
<option value="Port St. Johns,Eastern Cape">
<option value="Baviaans,Eastern Cape">
<option value="Blue Crane Route,Eastern Cape">
<option value="Camdeboo,Eastern Cape">
<option value="Ikwezi,Eastern Cape">
<option value="Kou-Kamma,Eastern Cape">
<option value="Kouga,Eastern Cape">
<option value="Makana,Eastern Cape">
<option value="Ndlambe,Eastern Cape">
<option value="Sunday's River Valley,Eastern Cape">


<option value="Charlestown,KwaZulu-Natal">
<option value="Dannhauser,KwaZulu-Natal">
<option value="Hattingspruit,KwaZulu-Natal">
<option value="Madadeni,KwaZulu-Natal">
<option value="Newcastle,KwaZulu-Natal">
<option value="Utrecht,KwaZulu-Natal">
<option value="Amanzimtoti,KwaZulu-Natal">
<option value="Cato Ridge,KwaZulu-Natal">
<option value="Doonside,KwaZulu-Natal">
<option value="Drummond,KwaZulu-Natal">
<option value="Durban,KwaZulu-Natal">
<option value="ekuPhakameni,KwaZulu-Natal">
<option value="Hillcrest,KwaZulu-Natal">
<option value="Illovo Beach,KwaZulu-Natal">
<option value="Inanda,KwaZulu-Natal">
<option value="Isipingo,KwaZulu-Natal">
<option value="Karridene,KwaZulu-Natal">
<option value="Kingsburgh,KwaZulu-Natal">
<option value="Kloof,KwaZulu-Natal">
<option value="KwaMashu,KwaZulu-Natal">
<option value="La Lucia,KwaZulu-Natal">
<option value="La Mercy,KwaZulu-Natal">
<option value="Mount Edgecombe,KwaZulu-Natal">
<option value="New Germany,KwaZulu-Natal"
<option value="Pinetown,KwaZulu-Natal">
<option value="Queensburgh,KwaZulu-Natal">
<option value="Tongaat,KwaZulu-Natal">
<option value="Umbogintwini,KwaZulu-Natal">
<option value="Umdloti,KwaZulu-Natal">
<option value="Umgababa,KwaZulu-Natal">
<option value="Umhlanga, KwaZulu-Natal">
<option value="Umlazi,KwaZulu-Natal">
<option value="Verulam,KwaZulu-Natal">
<option value="Warner Beach,KwaZulu-Natal">
<option value="Westville,KwaZulu-Natal">
<option value="Winkelspruit,KwaZulu-Natal">
<option value="Chatsworth,KwaZulu-Natal">
<option value="Wentworth,KwaZulu-Natal">
<option value="Umkomaas,KwaZulu-Natal">
<option value="Magabeni,KwaZulu-Natal">
<option value="Ballito,KwaZulu-Natal">
<option value="KwaDukuza,KwaZulu-Natal">
<option value="Salt Rock,KwaZulu-Natal">
<option value="Bulwer,KwaZulu-Natal">
<option value="Franklin,KwaZulu-Natal">
<option value="Himeville,KwaZulu-Natal">
<option value="Ixopo,KwaZulu-Natal">
<option value="Kokstad,KwaZulu-Natal">
<option value="Matatiele,KwaZulu-Natal">
<option value="Swartberg,KwaZulu-Natal">
<option value="Umzimkulu,KwaZulu-Natal">
<option value="Underberg,KwaZulu-Natal">
<option value="Harding,KwaZulu-Natal">
<option value="Hibberdene,KwaZulu-Natal">
<option value="Ifafa Beach,KwaZulu-Natal">
<option value="Kelso,KwaZulu-Natal">
<option value="Margate,KwaZulu-Natal">
<option value="Palm Beach,KwaZulu-Natal">
<option value="Park Rynie,KwaZulu-Natal">
<option value="Pennington,KwaZulu-Natal">
<option value="Port Edward,KwaZulu-Natal">
<option value="Port Shepstone,KwaZulu-Natal">
<option value="Ramsgate,KwaZulu-Natal">
<option value="Scottburgh,KwaZulu-Natal">
<option value="Sezela,KwaZulu-Natal">
<option value="Shelly Beach,KwaZulu-Natal">
<option value="Southbroom,KwaZulu-Natal">
<option value="Umtentweni,KwaZulu-Natal">
<option value="Umzinto,KwaZulu-Natal">
<option value="Umzumbe,KwaZulu-Natal">
<option value="Uvongo,KwaZulu-Natal">
<option value="Balgowan,KwaZulu-Natal">
<option value="Boston,KwaZulu-Natal">
<option value="Byrne,KwaZulu-Natal">
<option value="Hilton,KwaZulu-Natal">
<option value="Howick,KwaZulu-Natal">
<option value="Merrivale,KwaZulu-Natal">
<option value="Mooi River,KwaZulu-Natal">
<option value="New Hanover,KwaZulu-Natal">
<option value="Pietermaritzburg,KwaZulu-Natal">
<option value="Richmond,KwaZulu-Natal">
<option value="Wartburg,KwaZulu-Natal">
<option value="Dalton,KwaZulu-Natal">
<option value="Hluhluwe,KwaZulu-Natal">
<option value="Ingwavuma,KwaZulu-Natal">
<option value="Mkuze,KwaZulu-Natal">
<option value="Mtubatuba,KwaZulu-Natal">
<option value="Ubombo,KwaZulu-Natal">
<option value="Dundee,KwaZulu-Natal">
<option value="Glencoe,KwaZulu-Natal">
<option value="Greytown,KwaZulu-Natal">
<option value="Kranskop,KwaZulu-Natal">
<option value="Muden,KwaZulu-Natal">
<option value="Pomeroy,KwaZulu-Natal">
<option value="Wasbank,KwaZulu-Natal">
<option value="Nquthu,KwaZulu-Natal">
<option value="Bergville,KwaZulu-Natal">
<option value="Colenso,KwaZulu-Natal">
<option value="Elandslaagte,KwaZulu-Natal">
<option value="Estcourt,KwaZulu-Natal">
<option value="Ladysmith,KwaZulu-Natal">
<option value="Weenen,KwaZulu-Natal">
<option value="Winterton,KwaZulu-Natal">
<option value="Babanango,KwaZulu-Natal">
<option value="Empangeni,KwaZulu-Natal">
<option value="Eshowe,KwaZulu-Natal">
<option value="Mandeni,KwaZulu-Natal">
<option value="Melmoth,KwaZulu-Natal">
<option value="Mtunzini,KwaZulu-Natal">
<option value="Richards Bay,KwaZulu-Natal">
<option value="Louwsburg,KwaZulu-Natal">
<option value="Mahlabatini,KwaZulu-Natal">
<option value="Nongoma,KwaZulu-Natal">
<option value="Paulpietersburg,KwaZulu-Natal">
<option value="Pongola,KwaZulu-Natal">
<option value="Ulundi,KwaZulu-Natal">
<option value="Vryheid,KwaZulu-Natal">


<option value="Arlington,Free State">
<option value="Bethlehem,Free State">
<option value="Clarens,Free State">
<option value="Clocolan,Free State">
<option value="Cornelia,Free State">
<option value="Excelsior,Free State">
<option value="Ficksburg,Free State">
<option value="Fouriesburg,Free State">
<option value="Harrismith,Free State">
<option value="Hobhouse,Free State">
<option value="Kestell,Free State">
<option value="Ladybrand,Free State">
<option value="Lindley,Free State">
<option value="Marquard,Free State">
<option value="Memel,Free State">
<option value="Paul Roux,Free State">
<option value="Petrus Steyn,Free State">
<option value="Phuthaditjhaba,Free State">
<option value="Reitz,Free State">
<option value="Rosendal,Free State">
<option value="Senekal,Free State">
<option value="Steynsrus,Free State">
<option value="Swinburne,Free State">
<option value="Tweespruit,Free State">
<option value="Van Reenen,Free State">
<option value="Vrede,Free State">
<option value="Warden,Free State">
<option value="Winburg,Free State">
<option value="Allanridge,Free State">
<option value="Boshof,Free State">
<option value="Bothaville,Free State">
<option value="Brandfort,Free State">
<option value="Bultfontein,Free State">
<option value="Dealesville,Free State">
<option value="Hennenman,Free State">
<option value="Hertzogville,Free State">
<option value="Hoopstad,Free State">
<option value="Kgotsong,Free State">
<option value="Kutlwanong,Free State">
<option value="Makeleketla,Free State">
<option value="Odendaalsrus,Free State">
<option value="Theunissen,Free State">
<option value="Ventersburg,Free State">
<option value="Verkeerdevlei,Free State">
<option value="Virginia,Free State">
<option value="Welkom,Free State">
<option value="Wesselsbron,Free State">
<option value="Winburg,Free State">
<option value="Deneysville,Free State">
<option value="Edenville,Free State">
<option value="Frankfort,Free State">
<option value="Heilbron,Free State">
<option value="Koppies,Free State">
<option value="Kroonstad,Free State">
<option value="Oranjeville,Free State">
<option value="Parys,Free State">
<option value="Sasolburg,Free State">
<option value="Tweeling,Free State">
<option value="Viljoenskroon,Free State">
<option value="Villiers,Free State">
<option value="Vredefort,Free State">
<option value="Bethulie,Free State">
<option value="Bloemfontein,Free State">
<option value="Botshabelo,Free State">
<option value="Dewetsdorp,Free State">
<option value="Edenburg,Free State">
<option value="Fauresmith,Free State">
<option value="Itumeleng,Free State">
<option value="Jacobsdal,Free State">
<option value="Jagersfontein,Free State">
<option value="Koffiefontein,Free State">
<option value="Luckhoff,Free State">
<option value="Mangaung,Free State">
<option value="Petrusburg,Free State">
<option value="Philippolis,Free State">
<option value="Reddersburg,Free State">
<option value="Rouxville,Free State">
<option value="Smithfield,Free State">
<option value="Springfontein,Free State">
<option value="Thaba 'Nchu,Free State">
<option value="Trompsburg,Free State">
<option value="Van Stadensrus,Free State">
<option value="Wepener,Free State">
<option value="Zastron,Free State">


<option value="Barkly West,Northern Cape">
<option value="Campbell,Northern Cape">
<option value="Delportshoop,Northern Cape">
<option value="Douglas,Northern Cape">
<option value="Griquatown,Northern Cape">
<option value="Hartswater,Northern Cape">
<option value="Jan Kempdorp,Northern Cape">
<option value="Kimberley,Northern Cape">
<option value="Modder River,Northern Cape">
<option value="Warrenton,Northern Cape">
<option value="Windsorton,Northern Cape">
<option value="Andriesvale,Northern Cape">
<option value="Askham,Northern Cape">
<option value="Augrabies,Northern Cape">
<option value="Danielskuil,Northern Cape">
<option value="Groblershoop,Northern Cape">
<option value="Kakamas,Northern Cape">
<option value="Kanoneiland,Northern Cape">
<option value="Keimoes,Northern Cape">
<option value="Kenhardt,Northern Cape">
<option value="Lime Acres,Northern Cape">
<option value="Louisvale,Northern Cape">
<option value="Mier,Northern Cape">
<option value="Olifantshoek,Northern Cape">
<option value="Onseepkans,Northern Cape">
<option value="Postmasburg,Northern Cape">
<option value="Putsonderwater,Northern Cape">
<option value="Riemvasmaak,Northern Cape">
<option value="Upington,Northern Cape">
<option value="Brandvlei,Northern Cape">
<option value="Calvinia,Northern Cape">
<option value="Carnarvon,Northern Cape">
<option value="Fraserburg,Northern Cape">
<option value="Loeriesfontein,Northern Cape">
<option value="Nieuwoudtville,Northern Cape">
<option value="Sutherland,Northern Cape">
<option value="Van Wyksvlei,Northern Cape">
<option value="Williston,Northern Cape">
<option value="Beeshoek,Northern Cape">
<option value="Black Rock,Northern Cape">
<option value="Dibeng,Northern Cape">
<option value="Dingleton,Northern Cape">
<option value="Hotazel,Northern Cape">
<option value="Kathu,Northern Cape">
<option value="Kuruman,Northern Cape">
<option value="Van Zylsrus,Northern Cape">
<option value="Aggeneys,Northern Cape">
<option value="Alexander Bay,Northern Cape">
<option value="Carolusberg,Northern Cape">
<option value="Concordia,Northern Cape">
<option value="Garies,Northern Cape">
<option value="Hondeklip,Northern Cape">
<option value="Kamieskroon,Northern Cape">
<option value="Kleinzee,Northern Cape">
<option value="Nababeep,Northern Cape">
<option value="Okiep,Northern Cape">
<option value="Pella,Northern Cape">
<option value="Pofadder,Northern Cape">
<option value="Port Nolloth,Northern Cape">
<option value="Soebatsfontein,Northern Cape">
<option value="Springbok,Northern Cape">
<option value="Steinkopf,Northern Cape">
<option value="Britstown,Northern Cape">
<option value="Colesberg,Northern Cape">
<option value="Copperton,Northern Cape">
<option value="De Aar,Northern Cape">
<option value="Hanover,Northern Cape">
<option value="Hopetown,Northern Cape">
<option value="Hutchinson,Northern Cape">
<option value="Loxton,Northern Cape">
<option value="Marydale,Northern Cape">
<option value="Norvalspont,Northern Cape">
<option value="Noupoort,Northern Cape">
<option value="Orania,Northern Cape">
<option value="Petrusville,Northern Cape">
<option value="Philipstown,Northern Cape">
<option value="Prieska,Northern Cape">
<option value="Richmond,Northern Cape">
<option value="Strydenburg,Northern Cape">
<option value="Vanderkloof,Northern Cape">
<option value="Victoria West,Northern Cape">
<option value="Vosburg,Northern Cape">


</datalist>

</p>





                                    <label for="inputUsername" class="sr-only">Name</label>
                                    <input type="text" name="uname" id="inputUsername" class="form-control" placeholder="First name" value="<?php echo $user_name; ?>"  /></p>

                                    <label for="inputUsersurname" class="sr-only">Surname</label>
                                    <input type="text" name="usurname" id="inputUsersurname" class="form-control" placeholder="Surname" value="<?php echo $user_surname; ?>" /></p>

                                    <label for="inputLoginName" class="sr-only">Username</label>
                                    <input type="text" name="uusername" id="inputUsername" class="form-control lower"  onkeypress="return AvoidSpace(event);" value="<?php echo  $user_username; ?>"  />

                                   </p>
                             
                        <select name="uspecialty" class="form-control" id="inputSpecialty" value="<?php echo $user_specialty; ?>"  />
                        <option value="<?php echo $user_specialty; ?>"><?php echo $user_specialty; ?></option>
                         
                            option value="Animation">Animation</option>
                        <option value="Architecture">Architecture</option>
                        <option value="Beautician">Beautician</option>
                        <option value="Blogger">Blogger</option>
                         <option value="Dance">Dance</option>
                        <option value="Culinary Arts">Culinary Arts</option>
                         <option value="Enterprise">Enterprise</option>
                         <option value="Entertainment">Entertainment</option>
                         <option value="Events">Events</option>
                         <option value="Extreme Sports">Extreme Sports</option>
                          <option value="Fan">Fan</option>
                       	<option value="Fashion">Fashion</option>
                    
                       	 <option value="Modeling">Modeling</option>
                       <option value="Music">Music</option>
                        <option value="Photography">Photography</option>
                        <option value="Poetry">Poetry</option>
                        <option value="Sport">Sport</Sport>
                         <option value="Theatre">Theatre</option>
                
                       
                    
                       <option value="Tattooist">Tattooist</option>
                       <option value="Technology">Technology</option>
                         <option value="Visual Art">Visual Art</option>
                        <option value="Videography">Videography</option>
                        <option value="Web design">Web Design</option>
                              

                                    <label for="inputEmail" class="sr-only">Email</label>
                                    <input type="email" name="uemail" id="inputEmail" class="form-control" onkeypress="return AvoidSpace(event);" value="<?php echo  $user_email; ?>"  />
</select></p>
                   




                                    <button name="save_changes" class="btn btn-md btn-warning btn-block" type="submit">Save changes</button>

                                </div>
                            </div>
                        </div>                        
                    </div>          
                </div>
            </div>

        </form>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../js/bootstrap.min.js"></script>

        <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>
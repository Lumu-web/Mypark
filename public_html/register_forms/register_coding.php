<?php
session_start();


include_once '../dbconnect.php';

$errormessage = "";
$alerttype = '';

if (isset($_POST['sign_up'])) {

    $uname = "";
    $usurname = "";
    $udob = "";
    $ugender = "";
    $uemail = "";
    $uspecialty = "";
    $username = "";
    $userrights = "";
    $upassword = "";
    $urepass = "";

    $uname = mysqli_real_escape_string($_POST['uname']);
    $usurname = mysqli_real_escape_string($_POST['usurname']);
    $udob = mysqli_real_escape_string($_POST['udob']);
    $ugender = mysqli_real_escape_string($_POST['ugender']);
    $uemail = mysqli_real_escape_string($_POST['uemail']);
    $uspecialty = mysqli_real_escape_string($_POST['uspecialty']);
    $username = mysqli_real_escape_string($_POST['username']);
    $userrights = "Normal User";
    $upassword = mysqli_real_escape_string($_POST['upass']);
    $urepass = mysqli_real_escape_string($_POST['urepass']);
$username = strtolower($username);
$uemail = strtolower($uemail);
    $_age = floor((time() - strtotime($udob)) / 31556926);


      $num_rows = mysqli_query($conn,"SELECT * FROM login_user WHERE Login_name = '$username'");
      
      $test_email = $uemail;
      $num_rows2 = mysqli_query($conn,"SELECT * FROM user_details WHERE User_email = '$test_email'");



if ($username == "" or $udob == "" or $uemail == ""  ){
    $errormessage = " <big>Error</big> enter all field...'";
            $alerttype = 'class="alert alert-danger"';
}else{
    
	
	if (mysqli_num_rows($num_rows2) > 0) {

            $errormessage = " <big>Error</big> E-mail address already exists...'";
            $alerttype = 'class="alert alert-danger"';
            }
            
            else {
        

    if ($upassword == $urepass) {
        if (mysqli_num_rows($num_rows) > 0) {

            $errormessage = " <big>Error</big> Username already exists...'";
            $alerttype = 'class="alert alert-danger"';
            ;
        } else {
            if ($_age > 12) {
                if (mysqli_query($conn,"INSERT INTO user_details(User_name,User_surname,User_dob,User_gender,User_email,User_specialty) VALUES('$uname','$usurname','$udob','$ugender','$uemail','$uspecialty')")) {


                    $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
                    $query = "SELECT * FROM user_details WHERE User_email = '$uemail'";
                    $response = $db->query($query);

                    while ($row = $response->fetch_assoc()) {
                        $user_id = $row['User_id'];
                        $_SESSION['user_id'] = $user_id;
                    };

                    
                    if (mysqli_query($conn,"INSERT INTO login_user(Login_name,Login_rights,Login_password,User_id) VALUES('$username','$userrights','$upassword','$user_id')")) {
               
                             if (mysqli_query($conn,"INSERT INTO following(following_flg_user_id,following_fld_user_id) VALUES('$user_id','$user_id')")) {
					?>         
        <script>
            window.open ('http://www.mypark.co.za/my_journey/journey.php','_self',false)
        </script>
        <?php
    



}
                        
                    }
                    
                    
                    
               else {
                    $errormessage = " <big>Error</big> Could not sign you up...'";
                    $alerttype = 'class="alert alert-danger"';
                    ;
                };
            } else {
                $errormessage = " <big>Warning</big> You should be over the age of 12...'";
                $alerttype = 'class="alert alert-danger"';
            };
        };}
        }
     else {
        $errormessage = " <big>Warning</big> Passwords don't match...'";
        $alerttype = 'class="alert alert-danger"';
    }
    }
	
	
			
}






    };



?>


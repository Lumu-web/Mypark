<?php
session_start();
include_once 'dbconnect.php';


$errormessage = "";
$alerttype = '';

if (isset($_POST['btn-login'])) {
    $logi = mysqli_real_escape_string($conn,$_POST['login_name']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
$login = strtolower($logi) ;
    $database = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
  $sql = mysqli_query($conn,"SELECT * FROM login_user inner join user_details on login_user.User_id = user_details.User_id WHERE (login_user.Login_name = '$login' OR user_details.User_email = '$login' ) AND login_user.Login_password = '$password'");
    $sql_string = "SELECT * FROM login_user inner join user_details on login_user.User_id = user_details.User_id WHERE (login_user.login_name = '$login' OR user_details.User_email = '$login' ) AND login_user.login_password = '$password'";
    $response = $database->query($sql_string);
    while ($row1 = $sql->fetch_assoc()) {


            $_SESSION['user_id'] = $row1['User_id'];
            $_SESSION['more_results_clicked'] = 0;
            $_SESSION['newer_posts'] = '';
        };

//check user exists
    if (mysqli_num_rows($sql) > 0) {

   
        ?>         
        <script>
            window.open ('http://www.mypark.co.za/my_journey/journey.php','_self',false)
        </script>
        <?php

        exit();
    } else {
        $errormessage = " <big>Warning</big>: Username and Password combination incorrect";
        $alerttype = 'class="alert alert-danger"';

        ;
    }
}

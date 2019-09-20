<?php
session_start();
$user_id = $_SESSION['user_id'];
$conn = mysqli_connect("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

mysqli_select_db("phppot_examples",$conn);

if(count($_POST)>0) {
$result = mysqli_query($conn,"SELECT * from login_user WHERE User_id = '" . $user_id . "'");
$row = mysqli_fetch_array($result);
if($_POST["currentPassword"] == $row["password"]) {
mysqli_query($conn,"UPDATE login_user set Login_password='" . $_POST["newPassword"] . "' WHERE User_id='" . $user_id . "'");
$message = "Password Changed";
} else $messages = "Current Password is not correct";
}
?>
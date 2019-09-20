<?php

if(!mysqli_connect("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6","myparkco_mypark"))
{
	die('oops connection problem ! --> '.mysql_error());
}

$conn = mysqli_connect("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");
/*if(!mysql_select_db("myparkco_mypark"))
{
	die('oops database selection problem ! --> '.mysql_error());
}*/

$key = md5('mypark');
//encryt
function encrypt($string, $key){
	$string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key,$string, MCRYPT_MODE_ECB)));
	return $string;
	}
	
	//decryt
function decrypt($string, $key){
	$string = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($string), MCRYPT_MODE_ECB));
	return $string;
	}


?>
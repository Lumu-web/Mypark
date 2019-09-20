<?php
include 'login_institute.php';


?>

<!DOCTYPE html>
<html 
    lang="eng"
    xmlns="http://www.w3.org/1999/xhtml">
    <body>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <title>MyPark</title>
        
        <link href="css/bootstrap.css" rel="stylesheet">
 <link href="css/3-col-portfolio.css" rel="stylesheet">

            <link href="css/signin.css" rel="stylesheet">
             <link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon/favicon.ico" type="image/x-icon">


                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " align="center">
                   <img src="css/mypark_wordmark.png"  width="160px" height="150px">
                </div>

                <div class="col-md-5 col-sm-5  col-sm-5 col-xs-5 col-lg-push-2 ">
                    
                </div>
                </head>



                <div class=" container col-md-12 col-sm-12 col-xs-12 " align="center">

                    <form action="Login.php" method="POST" class="form-signin">


                   
                        <label for="inputEmail" class="sr-only"></label>
                        <input type="text" id="inputLogin" name="login_name" class="form-control lower" onkeypress="return AvoidSpace(event);" placeholder="username or email" required autofocus>
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input type="password" id="inputPassword" name="login_password" class="form-control" placeholder="password" required >

                                <button type="submit" class="btn btn-sm btn-primary btn-block" name="btn-login">Sign in</button>
                                <a type="link" href="register_forms/register.php"><span class="text-meta">Create a new account</span></a>
                             &nbsp; 
                             |
                             &nbsp;
 <a type="link" href="forgotpassword/index.php"><span class="text-meta">Forgot your password?</span></a>
                                <div id="alertbox"  <?php echo $alerttype ?>><?php echo $errormessage; ?></div>
                             
                          
                             

                                </form>
                                </div>


                                </center>
                        
                                </body>
                                </html>


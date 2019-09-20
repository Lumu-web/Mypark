<!DOCTYPE html>

<?php
include 'register_coding.php';
?>


<html 
    lang="eng"
    xmlns="http://www.w3.org/1999/xhtml">
    <body>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


        <title>MyPark</title>

        <link href="../css/bootstrap.css" rel="stylesheet">
            <link href="../css/signin.css" rel="stylesheet">
            
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

               
                    <div class=" col-lg-12 col-md-12 col-sm-12  col-xs-12" align="center">
                      <img src="../css/mypark_wordmark.png"  width="160px" height="150px">
                    </div>
                </div>
                <div class="col-md-4" >
                    
                </div>
                </head>

                <div class="col-md-4">

                      <form action="register.php" method="POST" onSubmit="return check_lower_case_email()" class="form-signin" name="register">

                        <div id="alertbox1"  <?php echo $alerttype ?>><?php echo $errormessage; ?></div> 
                       
<a type="link" href="../signin.php" alignment="center"><span class="text-meta">Return to Login</span></a>
<label for="inputEmail"  class="sr-only">Username</label>

                        <input name="username" type="text" class="form-control lower" onkeypress="return AvoidSpace(event);" required class="form-control lower" id="inputUsername" placeholder="Username" maxlength="20"  autofocase  autofocase/>    
                   
                        <label for="password" class="sr-only">Password</label>
                        <input name="upass" type="password" class="form-control" id="password" placeholder="enter a login password" maxlength="20" required />
                        <label for="repass" class="sr-only">Re-password</label>
                        <input type="password" name="urepass" id="repassword" class="form-control" placeholder="re-enter password" required maxlength="20" required />
                     
                        
                        <select name="ugender" class="form-control" id="staff_position"/>
                        <option value="Male"><div class="blog-post-meta">male </div></option>
                        <option value="Female"><divclass="blog-post-meta">female </div></option>
                        <label for="inputEmail"  class="sr-only lower" onkeypress="return AvoidSpace(event);">Email</label>

                        <input type="email" name="uemail" id="inputEmail" class="form-control lower" placeholder="e-mail address" required />
                        <select name="uspecialty" class="form-control" id="staff_position"/>
                        <option value="Unkown specialty">select specialty </option>
                        
                           <option value="Animation">Animation</option>
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
                         <option value="Science">Science</option>
                        <option value="Sport">Sport</option>
                         <option value="Theatre">Theatre</option>
                
                       
                    
                       <option value="Tattooist">Tattooist</option>
                       <option value="Technology">Technology</option>
                         <option value="Visual Art">Visual Art</option>
                        <option value="Videography">Videography</option>
                        <option value="Web design">Web Design</option>
                              
                        </select>

                        <button name="sign_up" class="btn btn-md btn-primary btn-block" type="submit">Sign up</button>
                         <span class="text-meta"><font color="#ccc">By signing up, you agree to the </font><a type="link" href="../terms_of_service2.php" alignment="center">Terms of Service</a><font color="#ccc"> and </font><a href="../privacy_policy.php">Privacy Policy</a></span>
                         
                         
<span class="text-meta"><a href="register_2.php" class="table-border" alignment="center">Sign Up</a><font color="#ccc"> a Page</font></span>
                    </form>
                </div>
   

                </div>
                </center>
                
                <script>
				

function check_lower_case_email()
				{
					var valid = true;
					
					var useremail = document.forms["register"]["uemail"].value;
					var upperCase= new RegExp('[A-Z]');
					if(upperCase.test(useremail))
					{
						alert('Please use lowercase letters in your Email');
						valid=false;
					}
					return valid;
					
				}
				</script>
                </body>
                </html>

<html 
    lang="eng"
    xmlns="http://www.w3.org/1999/xhtml">
    <body>
 <?php   include_once("analyticstracking.php"); ?>


 <?php
$location = '<img src="Icons/location.png" height="23px" width="20px">';
$website = '<img src="Icons/websitevector.png" height="15px" width="15px">';
$pointer = '<img src="Icons/location.png" height="15px" width="15px">';
$telephone = '<img src="Icons/telephonevector.png" height="15px" width="15px">';
$http = "http://";
?>


    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <title>MyPark</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script src="assets/js/ie-emulation-modes-warning.js"></script>
<script src="js/modernizr.js"></script> <!-- Modernizr -->
<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
<link rel="stylesheet" href="css/addbusiness.css"> <!-- CSS reset -->
<link href="css/bootstrap.css" rel="stylesheet">

         <link href="css/index.css" rel="stylesheet">
        
	
  	
   
 
  <link href="../css/lightbox.css" rel="stylesheet">
             <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
<link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">




  


       </head>
   <p>&nbsp;</p>
<p>&nbsp;</p>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " align="center">
                   <img src="../css/mypark_wordmark.png"  width="160px" height="150px">
                </div>

              <div class="col-md-12 text-center">
                <p class="blog-text"><h4><font weight:800 color="#666666">Dashoboard</font></h4></p>
                </div>
                </div>
                
<div class="cd-tabs">
<div class=" col-lg-12 col-md-12 col-sm-12  col-xs-12" align="" >
	
  <form action="addbusiness.php" method="POST" class="" name="" enctype="multipart/form-data">
   <div class="col-md-3 col-sm-6 portfolio-item" align="#">
              
                   <img class="img-thumbnail" src="CNPlaceholder.png" width="280px" height="280px" alt="">
                </a>
                <h3>
                   <p><a href="#"><font size="3px">Black Canvas | Architectural Interiors</font></a><a href=""> edit</a></p> 
                    <p class="blog-text">Address<font size="2px">AdressShop 16, Greenlyn Village Centre, Thomas Edison Street, Pretoria, 0081<a href=""> edit</a></font></p>
                  <p class="blog-text">Telephone<font size="2px">+27 83 500 5609</font><a href=""> edit</a></p>
                    <p class="blog-text">Website<font size="2px"><a href="http://www.blackcanvas.co.za"> www.company.co.za</font></a><a href=""> edit</a></p>
                </h3>
       </div>
       
                       <div class="col-md-1 col-sm-6 portfolio-item" align="#">
              
                   
                </a>
                <h3>
                   <p>Architect</p>
                    <p>Clicks: </p>
                    <p>Amount: </p>
                    <p><a href="">View Page</a> </p>
                </h3>
                
       </div> 
            <div class="col-md-1 col-sm-6 portfolio-item" align="#">
              
                   
                </a>
                <h3>
                   <p>Culinary Arts</p>
                    <p>Clicks: </p>
                     <p>Amount: </p>
                    <p><a href="">View Page</a></p>
                </h3>
                
       </div>     
       </div>  
        <div class="col-md-12 col-sm-6 portfolio-item" align="center">       
       Total Amount:    
</main>



    </form>
    </div>
    <?php
session_start();
  

include_once("dbconnect.php"); 



if (isset($_POST['add_business'])) {
$conn = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");	 	

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO CNdetails (name, phone, website, address, email, province)
VALUES ('".$_POST["reg_name"]."','".$_POST["phonenumbers"]."','".$_POST["url"]."','".$_POST["address"]."','".$_POST["email"]."','".$_POST["province"]."')";


if ($conn->query($sql) === TRUE) {
echo "<script type= 'text/javascript'>alert('Business successfully added');</script>";
} else {
echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
}

$conn->close();
}
?>


        <!-- Footer -->
        <footer>
           
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

                                </form>
                                </div>


                                </center>
                         <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>

        <script src="js/bootstrap.min.js"></script>
       
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
       
                                </body>
                                </html>


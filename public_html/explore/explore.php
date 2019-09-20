<?php
include '../dbconnect.php';
include 'explore_coding_all_specialty.php';

//for all the icons
$logo = '<img src="../Icons/MyPark Logo.png" height="30px" width="60px">';
$upload_music = '<img src="../buttons/musicbutton.png" height="20px" width="20px">';
$upload_pic = '<img src="../buttons/original pic.png"height="20px" width="20px">';
$upload_vid = '<img src="../buttons/original video.png" height="20px" width="20px">';
$comment_btn = '<img src="../buttons/Comment.png" height="19px" width="17px">';
$trash = '<img src="../buttons/delete.png" height="15px" width="15px">';
$journey = '<img src="../buttons/journey.png" height="20px" width="20px">';
$explore = '<img src="../buttons/explore.png" height="20px" width="20px">';
$search_user = '<img src="../buttons/explore.png" height="15px" width="15px">';

$home = '<img src="../buttons/home-xxl.png" height="20px" width="20px">';
$notify = '<img src="../buttons/notification.png" height="20px" width="20px">';
$gallery = '<img src="../buttons/gallery.png" height="20px" width="20px">';
$message = '<img  src="../buttons/message.png" height="20px" width="20px">';
$logout = '<img src="../buttons/Logout-128.png" height="20px" width="20px">';
$settings = '<img src="../buttons/tool.png" height="20px" class="editpic" width="20px">';
$explore_page = '<img src="../buttons/globe.png" height="60px" class="editpic" width="60px">';
$arrow = '<img src="../buttons/arrow.png" height="40px width="40px">';
$message_specialty = 'Show My Speciality Only';

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
          <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
<link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">



        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>










    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
        <script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
        </script>
    </head>

    <body onLoad="MM_preloadImages('../buttons/logout.png','../buttons/home-xxl.png','../buttons/journey_2.png','../buttons/explore_2.png','../buttons/message_2.png')">









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


        <form action="explore_all_specialty.php" method="POST" class="form-signin">
       <div class="container">

                   
<div class="col-md-6 col-md-push-3  col-sm-6 col-sm-push-3 col-xs-12 blog-post table-border ">
 <div class="row">
                                   <div class="col-md-10 col-sm-10 col-xs-10 ">
                                        <input type="text" name="search_name" class="form-control" onkeyup="showResult(this.value)" placeholder="search for people or specialties " autofocus>
                                    </div>
<div id="livesearch"></div><div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <button class="btn btn-md btn-block btn-info" name="btn-search" type="submit" ><font color="#fff" size="1px"><?php echo $search_user; ?></font></button>
                                        
                                    </div>
                                    </div>
                            
                       
                           <hr>          
                              
                        


                            <div id="main-content">
                                                     
    

                            </div>
                    </div>          
                </div>
          
        </form>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../js/bootstrap.min.js"></script>

        <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
        
        <script>
		var stop_scroll = false;
		var currentpage;
		function showResult(str) {
  if (str.length==0 ) {
	  document.getElementById("main-content").innerHTML='';
    currentpage = 1;
	stop_scroll = false;
	load_more_accounts();
    return;
  }
  if(str.length > 0)
  {
	  stop_scroll = true;
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("main-content").innerHTML=xmlhttp.responseText;
    }
  }
  
  
  
  var page_and_query = "searchresults.php";
		
		
		
		xmlhttp.open("POST", page_and_query, true);
		var params = "q=" + str ;
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.setRequestHeader("Content-length", params.length);
xmlhttp.setRequestHeader("Connection", "close");

        xmlhttp.send(params);
		
  }
}


		

$(document).ready(function(){
	currentpage = 1;
	$(this).scrollTop(0);
	load_more_accounts();
	
});

var timer;

$(window).scroll(function () {
    clearTimeout(timer);
    timer = setTimeout(function() {
  
  if (stop_scroll == false)
  {
   if ($(document).height() <= $(window).scrollTop() + $(window).height()) 
   {
	   
      setTimeout( function(){ currentpage++; load_more_accounts();} , 50);
  
   }
}}, 50);
});


		function load_more_accounts()
{
	
	var xmlhttp;  // The variable that makes Ajax possible!
   try{
   
      // Opera 8.0+, Firefox, Safari
      xmlhttp = new XMLHttpRequest();
   }catch (e){
      
      // Internet Explorer Browsers
      try{
         xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
      }catch (e) {
         
         try{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
         }catch (e){
         
            // Something went wrong
            alert("Your browser broke!");
            return false;
         }
      }
   }

   
   xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4) {
				
			
				$('#main-content').append(xmlhttp.responseText);
				
            }
        };
	
		var page_and_query = "more_accounts.php";
		
		
		
		xmlhttp.open("POST", page_and_query, true);
		var params = "recordpage=" + currentpage ;
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.setRequestHeader("Content-length", params.length);
xmlhttp.setRequestHeader("Connection", "close");

        xmlhttp.send(params);
   
}

function load_less_accounts()
{
	
	var xmlhttp;  // The variable that makes Ajax possible!
   try{
   
      // Opera 8.0+, Firefox, Safari
      xmlhttp = new XMLHttpRequest();
   }catch (e){
      
      // Internet Explorer Browsers
      try{
         xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
      }catch (e) {
         
         try{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
         }catch (e){
         
            // Something went wrong
            alert("Your browser broke!");
            return false;
         }
      }
   }
  currentpage--;
   
   xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4) {
				
				document.getElementById('main-content').innerHTML =  '';
				$('#main-content').append(xmlhttp.responseText);
				
            }
        };
	
		var page_and_query = "more_accounts.php";
		
		
		
		xmlhttp.open("POST", page_and_query, true);
		var params = "recordpage=" + currentpage ;
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.setRequestHeader("Content-length", params.length);
xmlhttp.setRequestHeader("Connection", "close");

        xmlhttp.send(params);
   
}
		function follow_unfollow(objthis, followunfollow, user_id, user_to_follow)
{
	var xmlhttp;  // The variable that makes Ajax possible!
   try{
   
      // Opera 8.0+, Firefox, Safari
      xmlhttp = new XMLHttpRequest();
   }catch (e){
      
      // Internet Explorer Browsers
      try{
         xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
      }catch (e) {
         
         try{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
         }catch (e){
         
            // Something went wrong
            alert("Your browser broke!");
            return false;
         }
      }
   }
   var following = '';
   if (followunfollow == 'Follow')
   {
	   following = 'Unfollow';
   }else if (followunfollow == 'Unfollow')
   {
	   following = 'Follow';
   }
   
   xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				
					
			
			
				//objthis.children('img').attr('src','../buttons/like_button(red).png');
				objthis.getElementsByTagName('font')[0].innerHTML = following ;
				objthis.onclick = function(){follow_unfollow(objthis,following, user_id, user_to_follow)};
			
			
            }
        };
	
		var page_and_query = followunfollow + ".php";
			xmlhttp.open("POST", page_and_query, true);
		var params = "IN_follower_id=" + user_id + "&IN_followed_id=" + user_to_follow;
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.setRequestHeader("Content-length", params.length);
xmlhttp.setRequestHeader("Connection", "close");

        xmlhttp.send(params);
		
        
		
		
   
   
}

		</script>
    </body>
</html>
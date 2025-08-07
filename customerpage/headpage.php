<?php
session_start();
ob_start();
include('dbcon.php');


 if(isset($_POST['register']))
 {
  
       $username =$_POST['username'];
      $password = $_POST['password'];
      $email = $_POST['email'];
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $address =$_POST['address'];
      $repassword=$_POST['repassword'];
      $gender = $_POST['gender'];
      $flag = 0;

$sql = "select * from register;";
      $res = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_assoc($res))
      {  if($row['username'] == $username)
          $flag = 1;
        }



         if($password != $repassword){ 
            echo "<script> 
            alert('Password not mached!');
          </script>";
         }
         elseif($flag == 1){
           
            echo "<script> 
            alert('this username is already used!');
          </script>";
        }
        else
        {
            $sql = "INSERT INTO `register`(`username`,`email`,`phonenumber`,`address`,`password`,`gender`,`name`) VALUES ('$username','$email','$phone','$address','$password','$gender','$name')";
                 $conn->query($sql);
      
             header("Location: headpage.php"); 
            
        }


        
        
       exit();
     }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FauGet - Sports Mart</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: MyResume
  * Template URL: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>



  <!-- ======= Mobile nav toggle button ======= -->
  <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
  <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex flex-column justify-content-center">
  
           
    <video class="img-div"  autoplay="" muted="muted"  loop="" width="60%"  ><source src="assets\vedio\foot.mp4" type="video/mp4" /></video>             
   
    
    <div class="inputbox-container">
         <input class="inputbox" type="search" name="name" placeholder="Search..."/>
    </div>
          
    <div class="p-container">
      <p style="width:30vh; color:white; font-style:italic;">Sports are not just a game.</p>
      <p style="width:27vh; color:white;font-style:italic;">Sports teach us to handle success and failure with the same attittude.</p>
      
   </div>
   <div class="nav-container">
    <nav class="nav-btns col-form-label-lg">
      <a href="#"class="home">Home</a>
      <a class="Shoping-Page" onclick="shopbox()">Shoping</a>
      <a href="#" class="contact">Contact</a>
      <a href="#" class="about">About</a>
    </nav>
  </div>         
  <div class="social-icons">
    <div class="icons">
    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
      <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
      <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
      <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
      <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    
    </div>
   <div class="profile">
    <div class="p1-container">
      <p class="profile-txt-p"></p>
      <p class="profile-txt-p1"></p>
      <p class="profile-txt-p2"></p>
   </div>
   </div>
   
   <div class="btn-container">
    <a href="#" onclick="loginpage()" class="btn-login">Login</a>   
         
  </div>

   <div id="shoping-ground" style="display: none; justify-content:center; align-items:center; position:fixed; margin-left:-10vh; width:200vh; height:95vh; background:transparent;">
    <div  class="items-box gzoomIn bg-dark" style="display: flex; justify-content:center; margin-left:46vh; align-items:center; position:fixed;  background:rgb(185, 185, 185);  width:160vh; height:95vh; border-radius:9px; overflow:hidden;overflow-y:scroll;">  
    <div class="m-auto row">
     <div class="col-4 carousel-fade p-5" > 
 
       <a href="#" class="links"><img id="card-ground"  src="assets/img/barza.jpg"   class="shade  form-check-input object-fit-md-cover" >
        <div class="item-details gzoomIn "><br>
         <h4 class="hide-head">Barzalona's Jersy</h4>
         <h5 class="hide-head5">-/150 rs</h5>
         <button type="submit" class="hide-btn carousel-indicators" onclick="Gologin()">Buy</button>
       </div>
     </a>
      
       </div>
       <div class="col-4 carousel-fade p-5" > 
 
         <a href="#"  class="links" ><img id="card-ground" class="shade form-check-input object-fit-md-cover " src="assets/img/football.jpg"/ >
           <div class="item-details gzoomIn "><br>
             <h4 class="hide-head">Grozza</h4>
             <h5 class="hide-head5">-/400 rs</h5>
             <button type="submit" class="hide-btn carousel-indicators " onclick="Gologin()">Buy</button>
           </div>
         </a>
        
         </div>
         <div class="col-4 carousel-fade p-5" > 
 
           <a href="#"  class="links"><img id="card-ground" class="shade form-check-input object-fit-md-cover" src="assets/img/addidas.jpg"/ >
             <div class="item-details gzoomIn "><br>
               <h4 class="hide-head">Addidas Jersy</h4>
               <h5 class="hide-head5">-/150 rs</h5>
               <button type="submit" class="hide-btn carousel-indicators" onclick="Gologin()">Buy</button>
             </div>
           </a>
          
           </div>
           <div class="col-4 carousel-fade p-5" > 
 
             <a href="#" class="links" ><img id="card-ground" src="assets/img/lining.jpg" class="shade form-check-input object-fit-md-cover"/ >
               <div class="item-details gzoomIn "><br>
                 <h4 class="hide-head">Lining 6X</h4>
                 <h5 class="hide-head5">-/1500 rs</h5>
                 <button type="submit" class="carousel-indicators hide-btn" onclick="Gologin()">Buy</button>
               </div>
             </a>
            
             </div>
         <div class="col-4 carousel-fade p-5" > 
 
           <a href="#"  class="links" ><img id="card-ground" src="assets/img/emirates.jpg"  class="shade form-check-input object-fit-md-cover" />
             <div class="item-details gzoomIn "><br>
               <h4 class="hide-head">Nike's<br>Jersy</h4>
               <h5 class="hide-head5">-/150rs</h5>
               <button type="submit" class="carousel-indicators hide-btn" onclick="Gologin()">Buy</button>
             </div>
           </a>
          
           </div>
           <div class="col-4 carousel-fade p-5" > 
 
             <a href="#"  class="links" ><img id="card-ground" src="assets/img/mrf.jpg"  class="shade  form-check-input object-fit-md-cover" >
               <div class="item-details gzoomIn "><br>
                 <h4 class="hide-head">MRF Bats</h4>
                 <h5 class="hide-head5">-/120rs</h5>
                 <button type="submit" class="carousel-indicators hide-btn" onclick="Gologin()">Buy</button>
               </div>
             </a>
            
             </div>
 
             <div class="col-4 carousel-fade p-5" > 
 
               <a href="#"  class="links"><img id="card-ground" src="assets/img/addidasball.jpg" class="shade  form-check-input object-fit-md-cover"/ >
                 <div class="item-details gzoomIn "><br>
                   <h4 class="hide-head">Telstar football</h4>
                   <h5 class="hide-head5">-/200rs</h5>
                   <button type="submit" class="carousel-indicators hide-btn" onclick="Gologin()">Buy</button>
                 </div>
               </a>
              
               </div>
           <div class="col-4 carousel-fade p-5" > 
   
             <a href="#"  class="links"><img id="card-ground" src="assets/img/jersy.jpg"  class="shade  form-check-input object-fit-md-cover" />
               <div class="item-details gzoomIn "><br>
                 <h4 class="hide-head">Maratone's Jersy</h4>
                 <h5 class="hide-head5">-/150rs</h5>
                 <button type="submit" class="hide-btn carousel-indicators" onclick="Gologin()">Buy</button>
               </div>
             </a>
            
             </div>
             <div class="col-4 carousel-fade p-5" > 
   
               <a href="#"  class="links"><img id="card-ground" src="assets/img/yonexy1.jpg"  class="shade  form-check-input object-fit-md-cover" >
                 <div class="item-details gzoomIn "><br>
                   <h4 class="hide-head">Yonex Badminton</h4>
                   <h5 class="hide-head5">-/150rs</h5>
                   <button type="submit" class="hide-btn carousel-indicators" onclick="Gologin()">Buy</button>
                 </div>
               </a>
              
               </div>
         
      </div>
     
     
 
      
 
 
 
      <div  style=" display:flex;  justify-content:center;  color:rgb(0, 0, 0); background:rgb(235, 4, 4); position:fixed; margin-left:159vh; margin-top:-93vh; height: 3vh;padding-bottom:5vh; padding-right:8px; padding-left:8px; border-radius:50px; font-size:25px; height:1px; width: 35px;" onclick="Closebar()">&times;</div>
     </div>
   </div>

   <div class="main-txt"><img  class="img"  src="assets\img\logo (2).png"/></div>
  
  
<div class="login-page"  id="pop-loginpage"><center>
  <div class="div-protecter" id="move-div" >
  <div class="login-bar">
    <form action="" method="post">
  <h1 class="head">Login</h1>
  <div class="text-box">
    <input type="text" name="username" required="required">
    <span>Username</span>
   <div class="text-box">
   <input type="password" name="password"required="required">
   <span>Password</span><br><br>

</div>
</div>

</div>
  <input class="login-btn" type="submit" name="submit">
    </form> 
    <?php
    if(isset($_POST['submit']))
{
  $username =$_POST['username'];
  $password = $_POST['password'];
     if( $username == "admin" && $password == "admin" )
     {
        header('Location: /SportsMart/admin14/index.php');
     }
     else
     {
        $q = "SELECT * FROM `register` where `username` = '$username'";
     $sql = mysqli_query($conn,$q);
     while($row = mysqli_fetch_assoc($sql))
     {
        if($password != $row['password'])
        {
         echo" <h7 style='color:white; position:fixed; margin-top:-48px; margin-left:-19vh;'>Password:</h7><label style='color:red; position:fixed; margin-top:-48px; margin-left:-8vh;'>wrong</label>";
      }
      elseif($row['status'] != 2){
          echo" <h7 style='color:white; position:fixed; margin-top:-48px; margin-left:-19vh;'>Note:</h7><label style='color:yellow; position:fixed; margin-top:-54px; margin-left:-12vh;'>Wait for<br> conform</label>";
      }
      else
      {
          
        $_SESSION['user'] = $username;
          header('Location:mainpage.php');
          
      }
     }
     ?>
    
     <?php
    
     }
    }

    ?>
  <hr id="horizon" style="width: 2px; height:7vh; background:#939598; position:fixed;margin-left:30vh; border-radius:50px; margin-top:-9vh; ">
  <a href="#" id="changebutton" onclick="registerpage()"><h6 style="position: fixed; color:white; margin-left:38vh; margin-top:-6vh">Register</h6></a>
  
  <div style="color:black; background:rgb(255, 255, 255); position:fixed; margin-left:51vh; margin-top:-58vh; height: 1vh;padding-bottom:35px; padding-right:8px; padding-left:8px; border-radius:100px; font-size:25px; " onclick="CloseBar()">&times;</div>

  </div>
 
  
  </center></div>
  
  <div class="register-page"  id="pop-registerpage"><center>
    <div class="div-protecter" id="move-div" >
    <div class="register-bar">
      <form action="" method="post">
    <h1 class="head" style="margin-left:-60vh;">Sign Up</h1>
    <div class="register-text-box">
      <input type="text" name="username" required="required">
      <span>Username</span>
      <div class="register-text-box">
        <input type="text" name="email" required="required">
        <span>&nbsp;&nbsp;&nbsp;Email Id</span>
     <div class="register-text-box">
     <input type="password" name="password"required="required">
     <span>Password</span><br><br>
  </div>

  
  </div>
  
  </div>
    <input class="register-btn" type="submit" name="register" value="register">
    <hr id="horizon" style="width: 2px; height:50vh; background:#939598; position:fixed;margin-left:50vh; border-radius:50px; margin-top:-40vh; ">
    <a href="#" id="changebutton" onclick="loginpage()"><h6 style="position: fixed; color:white; margin-left:38vh; margin-top:10vh">Login</h6></a>
    
    <div style="color:black; background:white; position:fixed; margin-left:96vh; margin-top:-56vh; height: 1vh;padding-bottom:35px; padding-right:8px; padding-left:8px; border-radius:100px; font-size:25px; " onclick="CloseBar_Register()">&times;</div>


  
    <div style="background-color: rgba(255, 0, 0, 0);margin-left:92vh; margin-top:-48vh;">

         <div class="register-text-box">
      <input type="text" name="name" required="required">
      <span>Name:&nbsp;&nbsp;&nbsp;&nbsp;</span>
      <div class="register-text-box">
        <input type="text" name="address" required="required">
        <span>&nbsp;&nbsp;&nbsp;Address</span>
     <div class="register-text-box">
     <input type="password" name="repassword"required="required">
     <span>RePassword</span><br><br>
      <div class="register-text-box" style="margin-top:-10vh;">
      <input type="text" name="phone" required="required">
      <span>Phone no</span><br><br>
      
     <div style="margin-top:-20px; margin-left:-10vh;"><label style="margin-left:-410px;">male</label><input type="radio" name="gender" value="male" id="male" style="color:white;margin-top:-17px; margin-right:14vh;" required="required"></div>    
    <div style="margin-top:-20px;"><label style="margin-left:-230px;  margin-top:-30px;"> female </label><input type="radio" name="gender" value="female"  id= "female" style="color:white;margin-top:-17px; margin-right:-9vh;" required="required"></div>
  
  </div>
</form>
  
  </div>
  
  </div>

    </div>

    </div>
    </div>
    </center>
  </div>
  
  <script>

    
function Gologin() {
  const popdownBar = document.getElementById("pop-loginpage");
  const hideBar = document.getElementById("shoping-ground");
  if (popdownBar.style.display === "none") {
    popdownBar.style.display = "block"; // Show the b+
    hideBar.style.display = "none";
    
  } else {
    popdownBar.style.display = "none"; // Hide the bar
   
  } 
}
    
    function shopbox() {
      const shopboxbar = document.getElementById("shoping-ground");
      if (shopboxbar.style.display === "none") {
        shopboxbar.style.display = "flex"; // Show the bar
    
        
      } else {
        shopboxbar.style.display = "none"; // Hide the bar
      }
    }

    function Closebar(){

      const closeid = document.getElementById("shoping-ground");                                                                      
    
      if(closeid.style.display==="flex")
      {
        closeid.style.display = "none";

       
      } 
    }

function loginpage() {
  const popdownBar = document.getElementById("pop-loginpage");
  const popdownRegisterBar = document.getElementById("pop-registerpage");
  if (popdownBar.style.display === "none") {
    popdownBar.style.display = "block"; // Show the b+
    popdownRegisterBar.style.display = "none";
    localStorage.setItem('divisable','true');
    
  } 
}

window.onload = function(){
  const isvisable = localStorage.getItem('divisable');
  const  popdownBar = document.getElementById("pop-loginpage");
  if(isvisable === 'true')
  popdownBar.style.display = 'block';
else
 popdownBar.style.display = 'none';
};

function registerpage() {
  const popdownBar = document.getElementById("pop-registerpage");
  const popdownloginBar = document.getElementById("pop-loginpage");
  if (popdownBar.style.display === "none") {
    popdownBar.style.display = "block"; // Show the b+
    popdownloginBar.style.display = "none"; 
    
  } else {
    popdownBar.style.display = "none"; // Hide the bar
   
  }
}


function CloseBar_Register(){

  const popbarid = document.getElementById("pop-registerpage");
  
  if(popbarid.style.display==="block")
  {
    popbarid.style.display = "none";
  } 


}


function CloseBar(){

  const popbarid = document.getElementById("pop-loginpage");
   const login = document.querySelector(".login-bar");                                                                       

  if(popbarid.style.display==="block")
  {
    popbarid.style.display = "none"; // Hide the bar
   localStorage.setItem('divisable','false');
   
   
  } 


}
  </script>
   <style>

    .item-details{
      background: -webkit-gradient(linear,left top, left bottom,from(rgba(79, 77, 77, 0.908)),to(rgba(101, 97, 97, 0.263)))  ;
      position: relative;
      display: none;
      width: 29vh; height:37vh;  border-radius:5px; margin-left:10vh;
      margin-top: -37vh;
    }
    .hide-btn{
      width:20vh;
      
      height: 4vh;
      margin-top:8vh;
      margin-left: 4vh;
      background-color: transparent;
      color: yellow;
      border: 2px solid yellow;
      border-radius: 6px;
      transition: 1s;
      font: bold;
    }
    .hide-btn:hover{
      background-color: greenyellow;
      color: black;
    }
   .link:hover .shade{
    filter: brightness(50%);
   }
    .links:hover .item-details{
      display:block;
     
    }
    .hide-head{
      color:whitesmoke;
      font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
      margin-left:6vh;
      letter-spacing: 1px;
    }
    .hide-head5{
      color:whitesmoke;
      font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
      margin-left:3vh;
      margin-top: 12vh;
      
    }
   
    .shade{ position: relative;  width: 29vh; height:37vh;  border-radius:5px; margin-left:10vh; transition: 1s;}
   
    
    .row {
      --bs-gutter-x: 1.5rem;
      --bs-gutter-y: 0;
      display: flex;
      flex-wrap: wrap;
      margin-top:calc(-10 * var(--bs-gutter-y));;
      margin-right: calc(-0.5 * var(--bs-gutter-x));
      margin-left: calc(-25 * var(--bs-gutter-x));
    }
    .row > * {
      flex-shrink: 0;
      width: 100%;
      max-width: 100%;
      padding-right: calc(var(--bs-gutter-x) * 0.5);
      padding-left: calc(var(--bs-gutter-x) * 0.5);
      margin-top: var(--bs-gutter-y);
    }
   .p-5 {
  padding: 3rem !important;
}
    .carousel-fade .carousel-item {
      opacity: 0;
      transition-property: opacity;
      transform: none;
    }
    .carousel-fade .carousel-item.active,
    .carousel-fade .carousel-item-next.carousel-item-start,
    .carousel-fade .carousel-item-prev.carousel-item-end {
      z-index: 1;
      opacity: 1;
    }
    .carousel-fade .active.carousel-item-start,
    .carousel-fade .active.carousel-item-end {
      z-index: 0;
      opacity: 0;
      transition: opacity 0s 0.6s;
    }
    @media (prefers-reduced-motion: reduce) {
      .carousel-fade .active.carousel-item-start,
      .carousel-fade .active.carousel-item-end {
        transition: none;
      }
    }
    .col-4 {
      flex: 0 0 auto;
      width: 33.33333333%;
    }

    ::-webkit-scrollbar{
      width: 13px;
    }
    ::-webkit-scrollbar-track{
      background-color: #d1e5ff00;
    }
    ::-webkit-scrollbar-thumb{
      border-radius: 10px;
       background: -webkit-gradient(linear,left top, left bottom,from(rgb(219, 94, 36)),to(rgb(127, 17, 223)))  }
    .login-bar{
      color: aliceblue;
      background-color: rgb(15, 14, 23);
      width: 35vh;
      height: 18vh;
      margin-top: 30vh;
      border-radius: 20px;
      border: 2px solid cadetblue;
      transition: 1s;
    }
   

    .login-page{
      
      width: 182vh;
      height: 90vh;
      background-color: rgba(10, 25, 40, 0);
      margin-left: 5vh;
      margin-top: -6vh;
      border-radius: 10px;
      position:absolute ;
      display: none;
    }
    .notifi-bar{
      color: aliceblue;
      background-color: rgb(15, 14, 23);
      width: 35vh;
      height: 18vh;
      margin-top: 30vh;
      border-radius: 20px;
      border: 2px solid cadetblue;
      transition: 1s;
    }
    .notifi-page{
      
      width: 182vh;
      height: 90vh;
      background-color: rgba(10, 25, 40, 0);
      margin-left: 5vh;
      margin-top: -6vh;
      border-radius: 10px;
      position:absolute ;
      display: none;
    }
    body{
      background-color: rgb(14, 15, 14);

    }
      .img-div{
       
        width:148vh;
        border-radius:10vh;
        border-bottom-left-radius: 100px;
        border-top-right-radius: 90px;
        height: 90vh;
        margin-left: 37vh;
        
        display: block;
  
      }
      .p-container{
       
        width: 21vh;
        margin-left: 44vh;
        margin-top: -30vh;
      position: fixed;
      display: block;

      }
     
      .social-icons{
      
        width: 32vh;
        border-radius: 13px;
        margin-left: 1vh;
        margin-bottom: -90vh;
        height: 7vh;
        position: fixed;
        display: block;
        
      }
    
      .icons{
        margin-top: 1.5vh;
        font-size: 0.1vh;
      }
      .twitter{
        margin-left: 20px;
        font-size: 3vh;
        color: rgb(138, 184, 46); 
      }
      .twitter:hover{
       font-size: 4vh;
      }
      .facebook{
        margin-left: 20px;
        font-size: 3vh;
        color: rgb(138, 184, 46); 
      }
      .facebook:hover{
        font-size: 4vh;;
       }
      .instagram{margin-left: 20px;
        font-size: 3vh;
        color: rgb(138, 184, 46); 
      }
      .instagram:hover{
        font-size: 4vh;;
       }
        .google-plus{
          margin-left: 20px;
          font-size: 3vh;
          color: rgb(138, 184, 46); 
        }
        .google-plus:hover{
          font-size: 4vh;;
         }
        .linkedin{
          margin-left: 20px;
          font-size: 3vh;
          color: rgb(138, 184, 46); 
        }
        .linkedin:hover{
          font-size: 4vh;;
         }
      .profile{
        
        width:30vh;
        height: 30vh;
        margin-bottom: -380px;
        margin-left: 20px;
        border-radius: 10px;
        position: fixed;
        display: block;
      }
      .inputbox-container{
        background:  rgb(14, 15, 14);
       
        width: 50vh;
        margin-top:78vh;
        margin-left: 32vh;
        height: 10vh;
        border-radius:10px ;
        border-top-right-radius: 90px;
        border-top-left-radius: 90px;
        border-bottom-right-radius: 90px;
        border-bottom-left-radius: 90px;
        position: fixed;
        display: block;
 
      }
     .inputbox{
      margin-top: 3vh;
      width: 37vh;
      margin-left: 7vh;
      border: none;
      border-bottom: 2px solid rgb(138, 184, 46);
      border-radius: 4px; 
      background-color: transparent;
      outline: none;
      color: white;
      
     }
      .main-txt{
        width:20vh;
      
        height: 40vh;
        border-radius: 10px;
        margin-top: -50vh;
        position: fixed;
        display: block;
      }
      .img{
        margin-left: -10vh;
        margin-top:-9vh;
        width: 40vh;
        
      }
      .btn-container{
        background-color:  rgb(14, 15, 14);
        width: 30vh;
        margin-top:-77vh;
        margin-left: 160vh;
        height: 10vh;
        border-radius:15px ;
        position: fixed;
        
      }
      .btn-login{
        border: 1px solid rgb(138, 184, 46);
        border-radius: 5px;
        color:  rgb(138, 184, 46);
        font-family: monospace;
        background-color: transparent;
        font-size: 30px;
        padding: 1vh;
        padding-left: 2vh;
        padding-right: 2vh;
        margin-left: 5vh;
        position: fixed;
        margin-top: 2px ;
       }
       .btn-login:hover{
        background-color: rgb(138, 184, 46);
        color:black;
        transition: 2s;
       }
      .nav-container{  
        width: 70vh;
        margin-top:60vh;
        margin-left: 110vh;
        height: 10vh;
        border-radius:10px ;
        position: fixed;
        display: block;
       
      }
      .nav-btns{  
        
        backdrop-filter: blur(20px); 
        background: rgba(0, 0, 0, 0.3);
        width: 473px;
        height: 7vh;
        margin-left: 1vh;
        margin-top: 12px;
        border-radius: 5px;
        border-radius: 50px;
        position: relative;
        display: block;
       
       
      }
      .home{
        color: aliceblue;
        margin-left:4vh;
        
      } 
      .home:hover{
        transition: 1s;
        background-color: rgb(87, 156, 87);
        border: 1px solid;
        width: 15vh;
        padding-top: 15px; 
        padding: 10px;
        padding-bottom: 15px;
        padding-left: 36px;
        padding-right: 36px;
        margin-left: 0vh;
        color: white;
        border-radius: 50px;
      }
      .Shoping-Page{
        color: aliceblue;
        margin-left:5vh;
        
      }
      .Shoping-Page:hover{
        transition: 1s;
        background-color: rgb(87, 156, 87);
        border: 1px solid;
        width: 15vh;
        padding-top: 15px; 
        padding: 10px;
        padding-bottom: 15px;
        padding-left: 36px;
        padding-right: 36px;
        margin-left: 2vh;
        color: white;
        border-radius: 50px;
      }
      
      .contact{
        color: aliceblue;
        margin-left:5vh;
      }
      .contact:hover{
        transition: 1s;
        background-color: rgb(87, 156, 87);
        border: 1px solid;
        width: 15vh;
        padding-top: 15px; 
        padding: 10px;
        padding-bottom: 15px;
        padding-left: 36px;
        padding-right: 36px;
        margin-left: 2vh;
        color: white;
        border-radius: 50px;
      }
      .about{
        color:aliceblue;
        margin-left: 5vh;
      }
      .about:hover{
        transition: 1s;
        background-color: rgb(87, 156, 87);
        border: 1px solid;
        width: 15vh;
        padding-top: 15px; 
        padding: 10px;
        padding-bottom: 15px;
        padding-left: 36px;
        padding-right: 36px;
        margin-left: 2vh;
        color: white;
        border-radius: 50px;
      }
      .p1-container{
        
        width: 20vh;
        height: 20vh;
        margin-left: 5vh;
        margin-top: 8vh;
        position:fixed;
      }
      .profile-txt-p{
      
        width:13vh;
        border-radius: 10px;
        height: 1vh;
      }
      .profile-txt-p1{
  
        width:13vh;
        border-radius: 10px;
        height: 1vh;
      }
      .profile-txt-p2{
     
        width:9vh;
        border-radius: 10px;
        height: 1vh;
      }
      .account{border: none; background:rgba(61, 61, 61, 0.426);width:12vh; color:aliceblue; border-radius:8px; margin-left:3vh; margin-top:-8vh; height:5vh; text-align:center; position:fixed;display:block; cursor: pointer;}
      .account:active{
        transform: scale(0.9);
      }
      .cart{width: 9vh; padding-right:2vh; border:1px solid  rgb(138, 184, 46) ; background:none; position:fixed; display:block; margin-top:5vh; text-align:center; margin-left:20vh; font-size:22px ;color: rgb(138, 184, 46);}
   .cart:hover{
   background-color:rgb(138, 184, 46);
   color:black;
   }



    
    .text-box span{
      margin-top: -35px;
      margin-left: -15vh;
      position: absolute;
      padding: 10px;
      padding-left: 10vh;
      padding-right: 11vh;
      border-radius: 5px;
     font-size: 1em;
     font-style: bolder;   
      pointer-events: none;
      color: rgb(58, 56, 56);
      background-color: rgb(255, 255, 255);
      align-items: center;
      transition: 0.5s;
  }
  .text-box input:valid ~ span,
.text-box input:focus ~ span{
  font-size: 1em;
  font-style: bolder;   
    color: #cbcbcb;
    transform: translateX(0vh) translateY(-5vh) ;
    width:30vh;
    padding: 3px;
    height: 4vh;
    border-radius: 4px;
    background: #19191bfc;
    border-radius: 6px;
}
    
    .text-box input{
    width:30vh;
    border-radius: 4px;
    display: grid;
    justify-content: center;
    margin-top: 10vh;
    padding: 1px;
    
    }
    

    .register-text-box span{
      margin-top: -35px;
      margin-left: -40vh;
      position: absolute;
      padding: 10px;
      padding-left: 10vh;
      padding-right: 11vh;
      border-radius: 5px;
     font-size: 1em;
     font-style: bolder;   
      pointer-events: none;
      color: rgb(58, 56, 56);
      background-color: rgb(255, 255, 255);
      align-items: center;
      transition: 0.5s;
  }

    .register-text-box input:valid ~ span,
.register-text-box input:focus ~ span{
  font-size: 1em;
  font-style: bolder;   
    color: #cbcbcb;
    transform: translateX(0vh) translateY(-5vh) ;
    width:30vh;
    padding: 3px;
    height: 4vh;
    border-radius: 4px;
    background: #19191bfc;
    border-radius: 6px;
    margin-left: -40vh;
}

    .register-text-box input{
      width:30vh;
      border-radius: 4px;
      display: grid;
      justify-content: center;
      margin-top: 10vh;
      margin-left: -50vh;
      padding: 1px;
      }
    .login-bar{ 
      
      color: aliceblue;
      background-color: rgb(15, 14, 23);
      width: 50vh;
      height: 58vh;
      margin-top: 4vh;
      border-radius: 20px;
       border: 2px solid cadetblue;
       transition: transform 1s ease-in-out;
    }

    .login-btn{
      position: fixed;
      width: 25vh;
      border-radius: 50px;
      background-color: greenyellow;
    margin-top: -17vh;
    margin-left: -13vh;
      border: none;
      cursor: pointer;
    }
    .login-btn:active{
      transform: scale(0.9);
    }

    .register-bar{ 
      
      color: aliceblue;
      background-color: rgb(15, 14, 23);
      width: 100vh;
      height: 75vh;
      margin-top: 4vh;
      border-radius: 20px;
       border: 2px solid cadetblue;
       transition: transform 1s ease-in-out;
    }

    .register-btn{
      position: fixed;
      width: 25vh;
      border-radius: 50px;
      background-color: greenyellow;
    margin-top: 2vh;
    margin-left: -37vh;
      border: none;
    }

    .register-page{
      width: 195vh;
      height: 105vh;
      background-color: rgba(10, 25, 40, 0);
      margin-left: -10vh;
      margin-top: -16vh;
      border-radius: 10px;
      position:absolute ;
      display: none;
    }
    .div-protecter{
      background-color: rgba(24, 234, 234, 0);
      width: 60vh;
      height: 66vh;
      margin-left: 67vh;
      margin-top: 12vh;
      border-radius: 10px;
      position:absolute;
      
      transition: transform 1s ease-in-out;
    }
    
    body{
      background-color: rgb(14, 15, 14);
    }
      .img-div{
       
        width:148vh;
        border-radius:10vh;
        border-bottom-left-radius: 100px;
        border-top-right-radius: 90px;
        height: 90vh;
        margin-left: 37vh;
      
        display: block;
  
      }
      .p-container{
       
        width: 21vh;
        margin-left: 44vh;
        margin-top: -30vh;
      position: fixed;
      display: block;
      }
      .img-txt-p{
        background-color: rgb(166, 164, 164);
        width:20vh;
        border-radius: 10px;
        height: 2vh;
      }
      .img-txt-p1{
        background-color: rgb(166, 164, 164);
        width:17vh;
        border-radius: 10px;
        height: 2vh;
      }
      .img-txt-p2{
        background-color: rgb(166, 164, 164);
        width:17vh;
        border-radius: 10px;
        height: 2vh;
      }
      .social-icons{
      
        width: 32vh;
        border-radius: 13px;
        margin-left: 1vh;
        margin-bottom: -65vh;
        height: 7vh;
        position: fixed;
        display: block;
      }
    
      .icons{
        margin-top: 1.5vh;
        font-size: 0.1vh;
      }
      .twitter{
        margin-left: 20px;
        font-size: 3vh;
        color: rgb(138, 184, 46); 
      }
      .twitter:hover{
       font-size: 4vh;
      }
      .facebook{
        margin-left: 20px;
        font-size: 3vh;
        color: rgb(138, 184, 46); 
      }
      .facebook:hover{
        font-size: 4vh;;
       }
      .instagram{margin-left: 20px;
        font-size: 3vh;
        color: rgb(138, 184, 46); 
      }
      .instagram:hover{
        font-size: 4vh;;
       }
        .google-plus{
          margin-left: 20px;
          font-size: 3vh;
          color: rgb(138, 184, 46); 
        }
        .google-plus:hover{
          font-size: 4vh;;
         }
        .linkedin{
          margin-left: 20px;
          font-size: 3vh;
          color: rgb(138, 184, 46); 
        }
        .linkedin:hover{
          font-size: 4vh;;
         }
      .profile{
        
        width:30vh;
        height: 30vh;
        margin-bottom: -380px;
        margin-left: 20px;
        border-radius: 10px;
        position: fixed;
        display: block;
      }
      .inputbox-container{
        background:  rgb(14, 15, 14);
       
        width: 50vh;
        margin-top:78vh;
        margin-left: 32vh;
        height: 10vh;
        border-radius:10px ;
        border-top-right-radius: 90px;
        border-top-left-radius: 90px;
        border-bottom-right-radius: 90px;
        border-bottom-left-radius: 90px;
        position: fixed;
        display: block;
      }
     .inputbox{
      margin-top: 3vh;
      width: 37vh;
      margin-left: 7vh;
      border: none;
      border-bottom: 2px solid rgb(138, 184, 46);
      border-radius: 4px; 
      background-color: transparent;
      outline: none;
      color: white;
      
     }
      .main-txt{
        width:20vh;
      
        height: 40vh;
        border-radius: 10px;
        margin-top: -50vh;
        position: fixed;
        display: block;
      }
      .img{
        margin-left: -10vh;
        margin-top:-9vh;
        width: 40vh;
        
      }
      .btn-container{
        background-color:  rgb(14, 15, 14);
        width: 30vh;
        margin-top:-77vh;
        margin-left: 160vh;
        height: 10vh;
        border-radius:20px ;
        position:fixed;
        
      }
      .btn-login{
        border: 1px solid rgb(138, 184, 46);
        border-radius: 5px;
        color:  rgb(138, 184, 46);
        font-family: monospace;
        background-color: transparent;
        font-size: 30px;
        padding: 1vh;
        padding-left: 2vh;
        padding-right: 2vh;
        margin-left: 5vh;
        position: fixed;
        margin-top: 6px ;
       }
       .btn-login:hover{
        background-color: rgb(138, 184, 46);
        color:black;
        transition: 2s;
       }
      .nav-container{  
        width: 70vh;
        margin-top:60vh;
        margin-left: 110vh;
        height: 10vh;
        border-radius:10px ;
        position: fixed;
        display: block;
      }
      .nav-btns{  
        
        backdrop-filter: blur(20px); 
        background: rgba(0, 0, 0, 0.3);
        width: 473px;
        height: 7vh;
        margin-left: 1vh;
        margin-top: 12px;
        border-radius: 5px;
        border-radius: 50px;
        position: relative;
        display: block;
        
       
      }
      .home{
        color: aliceblue;
        margin-left:4vh;
        
      } 
      .home:hover{
        transition: 1s;
        background-color: rgb(87, 156, 87);
        border: 1px solid;
        width: 15vh;
        padding-top: 15px; 
        padding: 10px;
        padding-bottom: 15px;
        padding-left: 36px;
        padding-right: 36px;
        margin-left: 0vh;
        color: white;
        border-radius: 50px;
      }
      .Shoping-Page{
        color: aliceblue;
        margin-left:5vh;
        
      }
      .Shoping-Page:hover{
        transition: 1s;
        background-color: rgb(87, 156, 87);
        border: 1px solid;
        width: 15vh;
        padding-top: 15px; 
        padding: 10px;
        padding-bottom: 15px;
        padding-left: 36px;
        padding-right: 36px;
        margin-left: 2vh;
        color: white;
        border-radius: 50px;
      }
      
      .contact{
        color: aliceblue;
        margin-left:5vh;
      }
      .contact:hover{
        transition: 1s;
        background-color: rgb(87, 156, 87);
        border: 1px solid;
        width: 15vh;
        padding-top: 15px; 
        padding: 10px;
        padding-bottom: 15px;
        padding-left: 36px;
        padding-right: 36px;
        margin-left: 2vh;
        color: white;
        border-radius: 50px;
      }
      .about{
        color:aliceblue;
        margin-left: 5vh;
      }
      .about:hover{
        transition: 1s;
        background-color: rgb(87, 156, 87);
        border: 1px solid;
        width: 15vh;
        padding-top: 15px; 
        padding: 10px;
        padding-bottom: 15px;
        padding-left: 36px;
        padding-right: 36px;
        margin-left: 2vh;
        color: white;
        border-radius: 50px;
      }
      .p1-container{
        
        width: 20vh;
        height: 20vh;
        margin-left: 5vh;
        margin-top: 8vh;
        position:fixed;
      }
      .profile-txt-p{
      
        width:13vh;
        border-radius: 10px;
        height: 1vh;
      }
      .profile-txt-p1{
  
        width:13vh;
        border-radius: 10px;
        height: 1vh;
      }
      .profile-txt-p2{
     
        width:9vh;
        border-radius: 10px;
        height: 1vh;
      }

   </style>
  </section><!-- End Hero -->

 
  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
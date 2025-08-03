<?php  include('dbcon.php');
      session_start();
      $user = $_SESSION['user'];
       
    $sql = "select * from register where username = '$user';";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);

   
   ?>



    <?php
    $order_id = htmlspecialchars($_GET['order_id']); 
 
    $order_sql = "SELECT * FROM `additems` where `id` = $order_id;";
    $order_result =  mysqli_query($conn,$order_sql);
    $order_row=mysqli_fetch_assoc($order_result);

?>


<?php
  $sql = "select * from category where cid = '$order_row[category]';";
    $category = mysqli_query($conn,$sql);  
     $row = mysqli_fetch_assoc($category);
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MyResume Bootstrap Template - Index</title>
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
      <p class="img-txt-p"></p>
      <p class="img-txt-p1"></p>
      <p class="img-txt-p2"></p>
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
  
   
   <button onclick="account()"  class="account bi-person   d-xl-inline-flex column-gap-sm-2"  ><p style="margin-top: 7px; "><?php echo $user; ?></p></button>
  


   <div class="main-txt"><img  class="img"  src="assets\img\logo (2).png"/></div>
   <div class="btn-container">
    <a href="#" onclick="loginpage()" class="btn-login">Logout</a>        
  </div>


  <div id="shoping-ground" style="display: block; justify-content:center; align-items:center; position:fixed; margin-left:-10vh; width:200vh; height:95vh; background:transparent;">
   <div  class="items-box  bg-dark" style="display: flex; justify-content:center; margin-left:46vh; align-items:center; position:fixed;  background:rgb(185, 185, 185);  width:160vh; height:95vh; border-radius:9px; overflow:hidden;overflow-y:scroll;">  
   <div class="m-auto row">
        
     </div>
     <div  style=" display:flex;  justify-content:center;  color:rgb(0, 0, 0); background:rgb(235, 4, 4); position:fixed; margin-left:159vh; margin-top:-93vh; height: 3vh;padding-bottom:5vh; padding-right:8px; padding-left:8px; border-radius:50px; font-size:25px; height:1px; width: 35px;" onclick="Closebar()">&times;</div>
    </div>
  </div>



  



  <div id="order-ground" style="display: block; justify-content:center; margin-left:32vh; align-items:center; position:fixed;  background:rgba(255, 0, 0, 0);  width:163vh; height:100vh; border-radius:9px;">
  <div  style=" justify-content:center; margin-left:13vh; align-items:center; position:fixed;  background:rgb(62, 68, 63); margin-top:5vh;  width:140vh; height:92vh; border-radius:9px;">
       
 <h1 style="color: cornsilk; text-align:center; font-family:cursive">Order Details</h1>
      <img src='/SportsMart/upload/<?php echo $order_row['image'];?>' style='width: 40vh; height:50vh; border-radius:6px; margin-left:calc(4%); margin-top:calc(7%)'/>
       <div class="product" style="position:related;"> 
      <div style='width:70vh; height:58vh; background:rgba(39, 38, 41, 0.605) ; margin-left:calc(44%); margin-top:-56vh; border-radius:15px;  overflow:hidden;overflow-y:scroll;'>
       
        <div class='card-group column-gap-md-2 p-lg-5' style='margin-left: 3vh; color:antiquewhite;font-family:monospace;'>
          <h5>Item Name:</h5> <label style='font-size:18px;'><?php echo $order_row['name'];?></label>
        </div>

        <div class='card-group column-gap-md-2 p-lg-5' style='margin-left: 3vh; margin-top:-7vh; color:antiquewhite;font-family:monospace;'>
          <h5>Technology:</h5> <label style='font-size:18px;'><?php echo$order_row['tech'];?></label>
        </div>

         <div class='card-group column-gap-md-2 p-lg-5' style='margin-left: 3vh; margin-top:-7vh; color:antiquewhite;font-family:monospace;'>
          <h5>Category:</h5> <label style='font-size:18px;'><?php echo$row['categoryname'];?></label>
        </div>

        <div class='card-group column-gap-md-2 p-lg-5' style='margin-left: 3vh; margin-top:-7vh; color:antiquewhite;font-family:monospace;'>
          <h5>Price:</h5> <label style='font-size:18px;'  class="price"><?php echo $order_row['price'];?>/-</label>
        </div>

        <div class='card-group column-gap-md-2 p-lg-5' style='margin-left: 3vh; margin-top:-7vh; color:antiquewhite;font-family:monospace;'>
          <h5>Item color:</h5> <label style='font-size:18px;'><?php echo $order_row['color'];?></label>
        </div>


        
        <div class='card-group column-gap-md-2 p-lg-5' style='margin-left: 3vh; margin-top:-7vh; color:antiquewhite;font-family:monospace;'>
          <h5>Size:</h5> <label style='font-size:18px;'><?php echo $order_row['size'];?></label>
        </div>

        
        <div class='card-group column-gap-md-2 p-lg-5' style='margin-left: 3vh; margin-top:-7vh; color:antiquewhite;font-family:monospace;'>
          <h5>Quality:</h5> <label style='font-size:18px;'><?php echo $order_row['quality'];?></label>
        </div>


      <div class='card-group column-gap-md-2 p-lg-5' style='margin-left: 3vh; margin-top:-7vh; color:antiquewhite;font-family:monospace;'>
          <h5>Player Level:</h5> <label style='font-size:18px;'><?php echo $order_row['playlevel'];?></label>
        </div>
  
        
      </div>
      
       <div class='card-group column-gap-md-2 p-lg-5' style='margin-left: 63vh; margin-top:-5vh; color:antiquewhite;font-family:monospace;'>
      
   
   
     <form action='booking.php?book_id=<?php echo $order_row['id'];?>' method="post" stlye="position:fixed;">
     <label class ="alert-link" style=" margin-left:30px; margin-top:15px;" >Quantity:</label> 
       <div class="quantity-box" style="margin-top:-25px; margin-left:16vh;">
    <a class="minus" style="margin-left:8px; color:black; font-size:25px; color:white;">-</a>
   <input type="text" name="quandity" value="1"  readonly class="quantity" style="width:6vh; text-align:center;outline:none;border:none;">
    <a class="plus" style="margin-right:6px; color:black; font-size:25px; color:white;">+</a>
  </div><br>
     <label class ="alert-link" style=" margin-left:15px;" >Total:</label> 
     <input type="text" name="total" class="total" value="<?php echo $order_row['price'];?>"  style="width:10vh; margin-left:10px; margin-top:2vh; font-size:17px;"  readonly>
   <input type="submit" name="order" value="submit"  style="width:10vh; margin-left:170px; margin-top:2vh;"  readonly>
 
     </div>
     </form>

    <div class='card-group column-gap-lg-5' style='margin-top: -17vh; margin-left:5vh; background:rgba(39, 38, 41, 0.605) ;width:45vh;  height:40px; border-radius:45px;  text-align:center;'><h4 class='bi-check-circle' style=' margin-top:10px;margin-left:4vh;font-size:smaller;color:rgb(62, 235, 18)'>&nbsp;Order</h4><h4 style=' margin-top:10px; font-size:smaller;color:white' class='bi-x-circle-fill'>&nbsp;Booking</h4><h4 style='  margin-top:10px; font-size:smaller;color:white' class='bi-x-circle-fill'>&nbsp;Payment</h4></div>
   <div class='cross' onclick='Closebar_Order()'>&times;</div>
  </div> 
  
     
  
  </div>
    
  </div>


  <script>
      window.onload = function(){
        const msg = localStorage.getItem("showAlert");
        if(msg){
          alert(msg);
          localStorage.removeItem("showAlert");
        }
      };

     document.querySelectorAll('.product').forEach(product => {
    const minusBtn = product.querySelector('.minus');
    const plusBtn = product.querySelector('.plus');
    const quantitySpan = product.querySelector('.quantity');
    const totalInput = product.querySelector('.total');
    const price = parseInt(product.querySelector('.price').innerText);

    plusBtn.addEventListener('click', () => {
      let quantity = parseInt(quantitySpan.value);
      quantity++;
      quantitySpan.value = quantity;
      totalInput.value = price * quantity;
    });

    minusBtn.addEventListener('click', () => {
      let quantity = parseInt(quantitySpan.value);
      if (quantity > 1) {
        quantity--;
        quantitySpan.value = quantity;
        totalInput.value = price * quantity;
      }
    });
  });

    function Closebar_Order(){

      const closeid = document.getElementById("order-ground");                                                                      
    
     // if(closeid.style.display==="block")
    //  {
   ///     closeid.style.display = "none";
  window.history.back();
       
  //    } 
  }

    
    function shopbox() {
      const shopboxbar = document.getElementById("shoping-ground");
      if (shopboxbar.style.display === "none") {
        shopboxbar.style.display = "flex"; // Show the bar
    
        
      } else {
        shopboxbar.style.display = "none"; // Hide the bar
      }
    }

  </script>
   <style>
    @font-face {
      font-family: 'ROG';
      src: url('assets/rogfont.ttf')
      format('truetype');
    }

    .dropbtn {
      border-radius: 5px;
  background-color: #04AA6D;
  color: white;
  padding: 5px;
  width:50vh;
  font-size: 16px;
  border: none;
      margin-left: 50vh;
      margin-top: 3vh;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  padding: 5px;
    width:50vh;
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  margin-left: 50vh;
  text-align: center;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}





    .editprofileground{width: 190vh; height: 100vh; background: transparent; display: none; position: fixed;}
      .editaccount{margin-top: 200px; margin-left:-13vh; font-family:monospace; color:white;}
      .editaccount:hover{color :rgb(138, 184, 46); }
      .cross{ display:flex;  justify-content:center;  color:rgb(0, 0, 0); background:rgb(235, 4, 4); position:fixed; margin-left:136vh; margin-top:-85vh; height: 3vh;padding-bottom:5vh; padding-right:8px; padding-left:8px; border-radius:50px; font-size:25px; height:1px; width: 35px;}
      .cross:active{transform: scale(0.8);}
    .links{ position: relative  ;  width: 29vh; height:37vh;  border-radius:5px; margin-left:-5vh;transition: 7s;}

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
  
   </style>
  </header>
 

 
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
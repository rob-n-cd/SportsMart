<?php  include('dbcon.php');
      session_start();
      $user = $_SESSION['user'];
       
    $sql = "select * from register where username = '$user';";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
?>




    <?php
    if(isset($_POST['order']))
    {
      $_SESSION['quandity'] = $_POST['quandity'];
      $_SESSION['total'] = $_POST['total'];
    }
    
   $_SESSION['id']  =  $book_id = $_GET['book_id'];
          $book_sql = "SELECT * FROM `additems` where `id` = $book_id;";
          $book_result =  mysqli_query($conn,$book_sql);
          $book_row=mysqli_fetch_assoc($book_result);
           
          if( $_SESSION['quandity'] <= $book_row['stocks'] ){
            $update_stock = $book_row['stocks'] - $_SESSION['quandity'];
          $update = "update additems set stocks = '$update_stock' where  id=$book_id";
          $update_stock_status =  mysqli_query($conn,$update);
          }
          else
          {
           // $_SESSION['alert'] = "Limited";
            ?><script>
              localStorage.setItem("showAlert","Only <?php echo htmlspecialchars($book_row['stocks']);?> Items are There");
              const previous = document.referrer;
              var value = "<?php echo urlencode($book_id); ?>";
              if(previous){
                   window.location.href= "order.php?order_id=" + value;
              }
               
            </script>
         
         <?php }?>


        


 <?php
    
        if(isset($_POST['booking'])){
          $name = $_POST['name'];
          $location = $_POST['loc'];
          $address = $row['address'];
          $pincode = $_POST['pin'];
          $selectItem =$_POST['itemname'];
          $book_price = $_SESSION['total'];
          $book_date = $_POST['date'];
          $booking_sql = "INSERT INTO  `booking` (`bname`,`address`,`location`,`pincode`,`itemname`,`price`,`date`) values('$name','$address','$location','$pincode','$selectItem','$book_price','$book_date');";
          if(mysqli_query($conn,$booking_sql))
          {
             header('Location: payment.php?pay_id='.$book_id.'');
          }
          else
          echo"alert('Booking failed try again!');";
          
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
<div class="dropdown">
  <button class="dropbtn" onclick="options()">Categorys</button>
  <div id = "optionsground" class="dropdown-content">
    <?php   $sqlcategory = "select * from category;";
    $category = mysqli_query($conn,$sqlcategory);  
     while($rowcategory = mysqli_fetch_assoc($category))
     { ?>

    <a href="#"><?php echo $rowcategory['categoryname'] ?></a>
   <?php }?>
    
  </div>
</div>
 <?php $dis="SELECT * FROM `additems` where `status` = 1;";
              $result=mysqli_query($conn,$dis);
              if($result->num_rows > 0){
            while($item_row=mysqli_fetch_assoc($result))
                        {
                            $image = $item_row['image'];
                            ?>

    <div class="col-4 carousel-fade p-5" > 
    
    <?php echo" <div  class='links'><img id='card-ground'   src='/SportsMart/upload/".$image."'   class='shade  form-check-input object-fit-md-cover' />";?>
       <div class="item-details gzoomIn "><br>
        <h4 class="hide-head"><?php echo $item_row['name'];?></h4>
        <h5 class="hide-head5"><?php echo $item_row['price'];?> rs</h5>
        <a href='order.php?order_id=<?php echo $item_row['id'];?>' class="hide-btn carousel-indicators">Buy</a>

      </div>
    
                        </div>
      
     
      </div>
      <?php }
        }
      else
         echo "<label style='color:white; text-align:center; margin-top:15vh; font-size:6vh; font-family:ROG; word-spacing:10px; '>No products found!</label>"; 
?>         
     </div>
     <div  style=" display:flex;  justify-content:center;  color:rgb(0, 0, 0); background:rgb(235, 4, 4); position:fixed; margin-left:159vh; margin-top:-93vh; height: 3vh;padding-bottom:5vh; padding-right:8px; padding-left:8px; border-radius:50px; font-size:25px; height:1px; width: 35px;" onclick="Closebar()">&times;</div>
    </div>
  </div>



  


  <div id="bill-ground" style="display:none; justify-content:center; align-items:center; position:fixed; margin-left:-10vh; width:200vh; height:95vh; background:transparent;">
    <div  class="items-box gzoomIn bg-dark" style="display: flex; justify-content:center; margin-left:44vh; align-items:center; position:fixed;  background:rgb(185, 185, 185);  width:160vh; height:95vh; border-radius:9px; overflow:hidden;overflow-y:scroll;">  
    <div class="m-auto row">
     <div class="col-4 carousel-fade p-5" > 
      <div style="width:120vh;height:100vh; background:transparant;position:relative"><h3 class="p-3 card" style="display: block; text-align:center; font-family:'Times New Roman', Times, serif;">Bill</h3>
   
        <div style="width:120vh;height:55vh; background:rgb(255, 255, 255);position:relative">
     <div style="width:120vh; height:55vh; background-color:transparent; border:4px solid rgba(44, 43, 43, 0.745);border-left:none;border-right:none;border-top:none;">
      <img src="assets/img/barza.jpg" style="width: 26vh; height:36vh; border-radius:6px; margin-left:calc(4%); margin-top:calc(7%)"/>
      <button onclick="cancel_from_cart()" type="submit" style="background:red;border-radius:2px;width:20px;height:9px;  display:block;margin-top:-43vh; margin-left:113vh;"></button>
       <div style="width:80vh; height:46vh; background-color:rgb(43, 91, 91);;  margin-top:2vh; margin-left:39vh; border-top-left-radius: 80px;border-bottom-left-radius:80px;">
        <div style="background-color: rgba(255, 0, 0, 0); width:75vh; margin-left:3vh; height:45vh;">
          <div class="card-group column-gap-md-2 p-lg-5" style="margin-left: 3vh; color:antiquewhite;font-family:monospace;">
            <h5>Item Name:</h5> <label style="margin-left:6vh;font-size:18px;">Telstar Football</label>
          </div>
  
          <div class="card-group column-gap-md-2 p-lg-5" style="margin-left: 3vh; margin-top:-7vh; color:antiquewhite;font-family:monospace;">
            <h5>Item Price:</h5> <label style="margin-left:72px; font-size:18px;">150/-</label>
          </div>
  
          <div class="card-group column-gap-md-2 p-lg-5" style="margin-left: 3vh; margin-top:-7vh; color:antiquewhite;font-family:monospace;">
            <h5>Your Name:</h5> <label style="margin-left:7vh;font-size:18px;">Robin Davis</label>
          </div>
  
          <div class="card-group column-gap-md-2 p-lg-5" style="margin-left: 3vh; margin-top:-7vh; color:antiquewhite;font-family:monospace;">
            <h5>date of Purchased:</h5> <label style="margin-left:3vh;font-size:18px;">15-05-2024</label>
          </div>
        </div>
    </div>
     
     
    </div>

  
      </div>


   
     
        

        
     </div>
     </div>
     
     </div>
     <div  style=" display:flex;  justify-content:center;  color:rgb(0, 0, 0); background:rgb(235, 4, 4); position:fixed; margin-left:159vh; margin-top:-93vh; height: 3vh;padding-bottom:5vh; padding-right:8px; padding-left:8px; border-radius:50px; font-size:25px; height:1px; width: 35px;" onclick="Closebar_bill()">&times;</div>
     
   </div>
</div>





  <div id="booking-ground" style="display: block; justify-content:center;  margin-left:32vh; align-items:center; position:fixed;  background:rgba(255, 0, 0, 0);  width:163vh; height:100vh; border-radius:9px;">
    <div id="booking-contents" style=" justify-content:center; margin-left:13vh; align-items:center; position:fixed;  background:rgb(62, 68, 63); margin-top:5vh;  width:140vh; height:92vh;padding-bottom:40px; border-radius:9px;">
        <h1 style='color: cornsilk; text-align:center; font-family:cursive'>Booking Page</h1>
      <img src='/SportsMart/upload/<?php echo$book_row['image'];?>' style='width: 40vh; height:50vh; border-radius:6px; margin-left:calc(4%); margin-top:calc(7%)'/>
      
      <div style='width:70vh; height:75vh; background:rgba(39, 38, 41, 0.605) ; margin-left:calc(44%); margin-top:-54vh; border-radius:15px;'>
       <form action="" method="post">
        <div class='card-group column-gap-md-2 p-lg-5' style='margin-left: 3vh; color:antiquewhite;font-family:monospace;'>
          <h5>Your Name:</h5> <label style='margin-left:6vh;font-size:18px;'><input type='text' name='name' value="<?php echo$row['name'];?>" readonly  style=' border-radius:5px; border:none; outline:none; background:rgba(177, 177, 177, 0.84); height:5vh;' ></label>
        </div>

        <div class='card-group column-gap-md-2 p-lg-5' style='margin-left: 3vh; margin-top:-7vh; color:antiquewhite;font-family:monospace;'>
          <h5>Location:</h5> <label style='margin-left:72px; font-size:18px;'><input type='text' name='loc'placeholder="text.."  required style='height:5vh; border-radius:5px; border:none'></label>
        </div>

        <div class='card-group column-gap-md-2 p-lg-5' style='margin-left: 3vh; margin-top:-7vh; color:antiquewhite;font-family:monospace;'>
          <h5>Pin-code:</h5> <label style='margin-left:9vh;font-size:18px;'><input type='number' name='pin'placeholder="text.."  required style='height:5vh; border-radius:5px; border:none'></label>
        </div>

        <div class='card-group column-gap-md-2 p-lg-5' style='margin-left: 3vh; margin-top:-7vh; color:antiquewhite;font-family:monospace;'>
          <h5>Selected Item:</h5> <label style='margin-left:3vh;font-size:18px;'><input type='text' name='itemname'value="<?php echo$book_row['name'];?>" readonly style='outline:none;background:rgba(177, 177, 177, 0.84);height:5vh; border-radius:5px; border:none'></label>
        </div>

        <div class='card-group column-gap-md-2 p-lg-5' style='margin-left: 3vh; margin-top:-7vh; color:antiquewhite;font-family:monospace;'>
          <h5>Price:</h5> <label style='margin-left:13vh;font-size:18px;'><input type='text' name='price' value="<?php echo $_SESSION['total'];?>" readonly  style='outline:none;background:rgba(177, 177, 177, 0.84);height:5vh; border-radius:5px; border:none'></label>
        </div>
        
        <div class='card-group column-gap-md-2 p-lg-5' style='margin-left: 3vh; margin-top:-7vh; color:antiquewhite;font-family:monospace;'>
          <h5>Enter Date:</h5> <label style='margin-left:6vh;font-size:18px;'><input type='date' name='date' required style=' border-radius:5px; border:none'></label>
        </div>
        
        <div class='card-group column-gap-md-2 p-lg-5' style='margin-left: 45vh; margin-top:-11vh; color:antiquewhite;font-family:monospace;'>
          <input type='submit' name='booking' value='submit'  style='border: none; border-radius:7px;color:black;background:white;height:5vh;width:10vh'> 
        </div>
      </div>
    <div class='card-group column-gap-lg-5' style='margin-top: -11vh; margin-left:5vh; background:rgba(39, 38, 41, 0.605) ;width:45vh;  height:40px; border-radius:45px;  text-align:center;'><h4 class='bi-check-circle' style=' margin-top:10px;margin-left:4vh;font-size:smaller;color:rgb(62, 235, 18)'>&nbsp;Order</h4><h4 style=' margin-top:10px; font-size:smaller;color:rgb(62, 235, 18);' class='bi-check-circle'>&nbsp;Booking</h4><h4 style='  margin-top:10px; font-size:smaller;color:white' class='bi-x-circle-fill'>&nbsp;Payment</h4></div>
        </form>
    <div class='cross' onclick="Closebar_Booking(<?php echo htmlspecialchars(json_encode($book_row)); ?>)">&times;</div>
  </div> 

  </div>
  </div> 
  </div>
  

  <script>



    function Closebar_Booking(product){
      const data = `stocks=${encodeURIComponent(product.stocks)}&item_id=${encodeURIComponent(product.id)}`;

    fetch("up_stocks.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded"
      },
      body: data
    });
   window.history.back();
    
    }

    
    function shopbox() {
      const shopboxbar = document.getElementById("shoping-ground");
      if (shopboxbar.style.display === "none") {
        shopboxbar.style.display = "flex"; // Show the bar
    
        
      } else {
        shopboxbar.style.display = "none"; // Hide the bar
      }
    }





   
    function paymentpage() {
      const bookid = document.getElementById("booking-ground");
      const payid = document.getElementById("payment-ground");
      if (payid.style.display === "none") {
          bookid.style.display ="none";
          payid.style.display = "flex"; // Show the bar
    
        
      } else {
        payid.style.display = "none"; // Hide the bar
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
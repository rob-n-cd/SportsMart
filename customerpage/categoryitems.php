<?php  include('dbcon.php');
      session_start();
      $user = $_SESSION['user'];
       
    $sql = "select * from register where username = '$user';";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);

   
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
     <span class="notification-dot" id="msgDot"></span>
   <div id="accountid"  style="border: none; background:rgba(61, 61, 61, 0.52);width:35vh; color:aliceblue; border-radius:8px; margin-left:1px; margin-top:39vh; height:38vh; text-align:center; position:fixed;display:none;">
    <h6 style="margin-top: 40px; margin-left:1vh; font-family:monospace; font-size:18px;">Buy History:</h6> 
     <button  onclick="bill()"  class="rounded bi-cart-check-fill cart"style="height:5vh;" ></button> 
     <h5 style="margin-top: 120px; margin-left:-16vh; font-family:monospace;" >Cart box:</h5>
     <button  id="myButton" onclick="cartbox()"  class="rounded bi-cart-check-fill cart" style="height:5vh; margin-top:16vh;" ></button> 
     <a href="#" class="editaccount"  onclick="editprofile()"><u>Edit Account</u></a> 
    </div>

   <div class="main-txt"><img  class="img"  src="assets\img\logo (2).png"/></div>
   <div class="btn-container">
    <a href="#" onclick="loginpage()" class="btn-login">Logout</a>        
  </div>


  <div id="shoping-ground" style="display: block; justify-content:center; align-items:center; position:fixed; margin-left:-10vh; width:200vh; height:95vh; background:transparent;">
   <div  class="items-box gzoomIn bg-dark" style="display: flex; justify-content:center; margin-left:46vh; align-items:center; position:fixed;  background:rgb(185, 185, 185); 
    width:160vh; height:95vh; border-radius:9px; overflow:hidden;overflow-y:scroll;">  
   <div class="m-auto row">
<div class="dropdown">
  <button class="dropbtn" onclick="options()">Categorys</button>
  <div id = "optionsground" class="dropdown-content">
    <?php   $sqlcategory = "select * from category where status=1;";
    $category = mysqli_query($conn,$sqlcategory);  
     while($rowcategory = mysqli_fetch_assoc($category))
     { ?>

    <a href="categoryitems.php?cat_id=<?php echo $rowcategory['cid']; ?>"><?php echo $rowcategory['categoryname'] ?></a>
   <?php }?>
    
  </div>
</div>
 <?php 
            $cat_id = $_GET['cat_id'];
 
        $dis="SELECT * FROM `additems` where `category` = '$cat_id' and `status` = 1 and `stocks` != 0;";
              $result=mysqli_query($conn,$dis);
              if($result->num_rows > 0){
            while($item_row=mysqli_fetch_assoc($result))
                        {
                            $image = $item_row['image'];
                            ?>

    <div class="col-4 carousel-fade p-5" > 
    
   <?php  echo "<div  class='links'><img id='card-ground'   src='/SportsMart/upload/".$image."'   class='shade  form-check-input object-fit-md-cover' />";?>
       <div class="item-details gzoomIn "><br>
        <h4 class="hide-head"><?php echo $item_row['name'];?></h4>
        <h5 class="hide-head5"><?php echo $item_row['price'];?> rs</h5>
        <?php
         $sqlcart = "select * from cart;";
           $cart = mysqli_query($conn,$sqlcart);  
            $flag =0; 
             while($rowcart = mysqli_fetch_assoc($cart))
              { 
                if($rowcart['item_id'] == $item_row['id'])
                   {
                     $flag = 1; break;
                   }

              }
               if($flag == 0){
        ?>
         <button onclick="SubmitCart(<?php echo htmlspecialchars(json_encode($item_row)); ?>)" class="float-xl-end me-md-3 bi-suit-heart-fill lead breadcrumb" style="color:red; font-size:30px; backgorund:transparent; border:none;"></button> 
         <?php } ?>
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

 



   
  </div>
   
     
        

        
    
   </div>
</div>


    <?php?>


  <div id="order-ground" style="display: none; justify-content:center; margin-left:32vh; align-items:center; position:fixed;  background:rgba(255, 0, 0, 0);  width:163vh; height:100vh; border-radius:9px;">
    <div id="order-contents" style=" justify-content:center; margin-left:-3vh; align-items:center; position:fixed;  background:rgb(62, 68, 63); margin-top:-1vh;  width:140vh; height:90vh; border-radius:9px;">
     
  </div>
    
  </div>
   



  <div id="booking-ground" style="display: none; justify-content:center; margin-left:32vh; align-items:center; position:fixed;  background:rgba(255, 0, 0, 0);  width:163vh; height:100vh; border-radius:9px;">
    <div id="booking-contents" style=" justify-content:center; margin-left:-3vh; align-items:center; position:fixed;  background:rgb(62, 68, 63); margin-top:-1vh;  width:140vh; height:95vh;padding-bottom:40px; border-radius:9px;">
      

  </div> 
  
  </div>
    
 


  <div id="payment-ground" style="display: none; justify-content:center; margin-left:32vh; align-items:center; position:fixed;  background:rgba(255, 0, 0, 0);  width:163vh; height:100vh; border-radius:9px;">
    <div style=" justify-content:center; margin-left:-3vh; align-items:center; position:fixed;  background:rgb(62, 68, 63); margin-top:-1vh;  width:140vh; height:90vh; border-radius:9px;">
      <h1 style="color: cornsilk; text-align:center; font-family:cursive">Payment Page</h1>
      <img src="assets/img/barza.jpg" style="width: 40vh; height:50vh; border-radius:6px; margin-left:calc(4%); margin-top:calc(7%)"/>
      
      <div style="width:70vh; height:70vh; background:rgba(39, 38, 41, 0.605) ; margin-left:calc(44%); margin-top:-54vh; border-radius:15px;">
       
        <img src="assets/img/scaner/Untitled (1).png" style="width: 35vh; height:45vh; border-radius:6px; margin-left:calc(23%); margin-top:calc(15%)"/>
      
      </div>
    <div class="card-group column-gap-lg-5" style="margin-top: -5vh; margin-left:7vh; background:rgba(39, 38, 41, 0.605) ;width:45vh;  height:40px; border-radius:45px;  text-align:center;"><h4 class="bi-check-circle" style=" margin-top:10px;margin-left:4vh;font-size:smaller;color:rgb(62, 235, 18)">&nbsp;Order</h4><h4 style=" margin-top:10px; font-size:smaller;color:rgb(62, 235, 18);" class="bi-check-circle">&nbsp;Booking</h4><h4 style="  margin-top:10px; font-size:smaller;color:rgb(62, 235, 18);" class="bi-check-circle">&nbsp;Payment</h4></div>
   

  </div> 
  </div>
    




  
   <div class="login-page" id="pop-loginpage"><center>
    <div class="login-bar"><br>
     <p>Do you want to logout<br> from the web site</p>
     <form action="headpage.php">
     <input type="submit" name="name" value="Yes" style=" margin-left:66px; background:greenyellow;border-radius:5px; border:none">
     </form>
     <input type="submit"  value="No" onclick="CloseBar()" style=" margin-left:-50px; margin-top:-28px;position:fixed; background:rgb(61, 62, 58);border-radius:5px; border:none">

    </div>
  </center></div>

  <div class="notifi-page" id="cancel_cart"><center>
    <div class="notifi-bar"><br>
     <p>Do you want to Cancel<br>this Product</p>
     <input type="submit" name="name" value="Yes" style=" margin-left:1px; background:greenyellow;border-radius:5px; border:none">
     <input type="submit"  value="No" onclick="CloseBar_from_cart()" style=" margin-left:-110px; background:rgb(61, 62, 58);border-radius:5px; border:none">
    </div>
  </center></div>


    <div class="editprofileground" id="editprofile">
      <div style=" position:fixed; background: rgb(146, 146, 146); width:148vh; height:86vh;  border-radius:6vh;  margin:auto; margin-left:37vh; margin-top:6vh;">

  

        <div style=" position:related; width:77vh; height:73vh; background:rgba(39, 38, 41, 0.479) ; margin-left:calc(44%); margin-top:10vh; border-radius:15px; ">
         <form method="post">
        <div class="card-group column-gap-md-2 p-lg-5" style="margin-left: 3vh; color:antiquewhite;font-family:monospace;">
          <h5>Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h5> <label style="margin-left:6vh;font-size:18px;"><input type="text" name="name" value="<?php echo $row['name'];?>" required style=" border-radius:5px; border:none"></label>
        </div>

        <div class="card-group column-gap-md-2 p-lg-5" style="margin-left: 3vh; margin-top:-7vh; color:antiquewhite;font-family:monospace;">
          <h5>Address:</h5> <label style="margin-left:72px; font-size:18px;"><input type="text" name="address" value="<?php echo $row['address'];?>" required style=" border-radius:5px; border:none"></label>
        </div>

        <div class="card-group column-gap-md-2 p-lg-5" style="margin-left: 3vh; margin-top:-7vh; color:antiquewhite;font-family:monospace;">
          <h5>Email:</h5> <label style="margin-left:94px;font-size:18px;"><input type="text" name="email"  value="<?php echo $row['email'];?>" required style=" border-radius:5px; border:none"></label>
        </div>

        <div class="card-group column-gap-md-2 p-lg-5" style="margin-left: 3vh; margin-top:-7vh; color:antiquewhite;font-family:monospace;">
          <h5>Phone Number:</h5> <label style="margin-left:1vh;font-size:18px;"><input type="text" name="phone" value="<?php echo $row['phonenumber'];?>" required style=" border-radius:5px; border:none"></label>
        </div>

    
        <div class="card-group column-gap-md-2 p-lg-5" style="margin-left: 45vh; margin-top:-2vh; color:antiquewhite;font-family:monospace;">
          <input type="submit" name="register" value="submit" onclick="" style="border: none; border-radius:7px;color:black;background:white;height:4vh;width:10vh"> 
        </div>
         <div class="card-group column-gap-md-2 p-lg-5" style="margin-left: 4vh; margin-top:-17vh; color:antiquewhite;font-family:monospace;">
          <input type="submit" name="change" value="change password" onclick="" style="border: none; border-radius:7px;color:black;background:white;height:4vh;width:19vh"> 
        </div>
      </div>
      
   </form>

        <div  style=" display:block;  color:rgb(0, 0, 0); background:rgb(235, 4, 4); position:fixed; margin-left:143vh; margin-top:-83vh; height: 3vh;padding-bottom:5vh; padding-right:8px; padding-left:8px; border-radius:50px; font-size:25px; height:1px; width: 33px; text-align:center;" onclick="Closebar_profile()">&times;</div>
      
      </div>
           <div class="carousel-indicators nav-tabs" style="margin-bottom:85vh; margin-left:60vh;">
              <h2 class="link-light bi-pencil-square"> Edit Profile </h2>
            </div>
            <div>
              <img src="assets\img\bad.png" style=" position:fixed; width: 40vh; height:50vh; margin-top:22vh; margin-left:45vh;  filter: drop-shadow(0.35rem 0.35rem 0.4rem rgba(0,0,0,0.5));"/>
            </div>
    </div>


 

<div id="cartbox" style="display: none; justify-content:center; align-items:center; position:fixed; margin-left:-10vh; width:200vh; height:95vh; background:transparent;">
<div  class=" gslideInLeft my-xl-4" style="margin-left:10vh;display:block; width:50vh;height:75vh; background: rgba(194, 194, 194, 1); border-radius:10px; position:fixed; overflow:hidden;overflow-y:scroll; ">

  <div style="margin-left:2px;position:fixed;  width:349px;height:13vh; background:  rgba(194, 194, 194, 1); border-top-left-radius:10px; border-bottom:1px  solid;">
  <span class="bi-bag-heart-fill" style="position:fixed; margin-top:40px;margin-left:15vh; color: rgba(109, 175, 23, 0.92);  font-size:20px;">  <u>Cart Kit</u></span>
  <div  style=" display:flex;  justify-content:center;  color:rgb(0, 0, 0); background:transparent; position:fixed; margin-left:39vh; padding-bottom:5vh; padding-right:8px; padding-left:8px; border-radius:50px; font-size:40px; height:3px; width: 40px;" onclick="Closebar_Cart()"><p class="ms-5">&times;</p></div>
</div>
  <?php
   $sqlcart = "select * from cart;";
    $cart = mysqli_query($conn,$sqlcart);  
     while($rowcart = mysqli_fetch_assoc($cart))
     {  
  ?>
  
   <div class="" style="width:45vh;height:43vh; background:transpaent;position:related; margin-top:16vh;"> 
   
     <img src='/SportsMart/upload/<?php echo $rowcart['image'];?>' style="width: 15vh; height:20vh; border-radius:6px; margin-left:10px;margin-top:50px;"/>
     <div class="" style="width:22vh;height:14vh; background:rgba(100, 122, 148, 0.79);;position:related; margin-left:20vh;margin-top:-18vh; align-items:center; border-radius:10px;">
      <span  class ="alert-link" style="margin-left:10px;margin-top:-20px; position:related"><label class="col-5">Item Name:</label><label><?php echo $rowcart['name'];?></label><span><br><br>
        <span   class ="alert-link"  style="margin-left:10px;margin-top:-2px;"><label class="col-5">Price:</label><label><?php echo $rowcart['price'];?></label></span>
     </div>
     
     <div style="position:related;width:36vh;height:14vh;background:rgba(100, 122, 148, 0.79); margin-top:40px;margin-left:35px;border-radius:10px;">
      <label class ="alert-link" style=" margin-left:30px; margin-top:15px;" >Quantity:</label> 
     </div>
     <br> <a href="delete_cart.php" class="delete_cart px-xl-5 ms-md-5 m-3 bg-danger progress-bar" style="">Delete</a> 
      <div style=" margin-left:20px; margin-top:40px; height:2px;width:40vh;background:black;"></div>
   </div>
 
   <?php }?>
   
  </div>
  
</div>



  <script>
     document.addEventListener("DOMContentLoaded", function() {
      var actionBox = document.getElementById("cartbox");
      var myButton = document.getElementById("myButton");
      var action2Box = document.getElementById("accountid");
      // If button was clicked earlier in this session, hide the action box
      if (sessionStorage.getItem("buttonClicked")) {
        actionBox.style.display = "none";
      
      }
     
       
      // Add click handler to button (if it’s visible)
      myButton.addEventListener("click", function() {
       
        // Set a flag in sessionStorage so we know the button was clicked
        sessionStorage.setItem("buttonClicked", "true");
        // Navigate to Page B
        window.location.href = "cart_box.php";
      });
    });


 function SubmitCart(product) {
   document.getElementById("msgDot").style.display = "block";
  localStorage.setItem("shownotify","true");
  
  
    const data = `name=${encodeURIComponent(product.name)}&image=${encodeURIComponent(product.image)}&price=${encodeURIComponent(product.price)}&item_id=${encodeURIComponent(product.id)}`;

    fetch("insertcart.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded"
      },
      body: data
    })
    .then(response => response.text())
    .then(result => {
    alert(result);
    })
    .catch(error => {
      document.getElementById("response").innerText = "Error: " + error;
    });
  }


   function bookpage(id) {
      const orderid = document.getElementById("order-ground");
      const bookid = document.getElementById("booking-ground");
      if (bookid.style.display === "none") {
          orderid.style.display ="none";
          bookid.style.display = "flex"; // Show the bar
           var xhr = new XMLHttpRequest();
          xhr.open("POST",'booking.php' ,true);
          xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

         xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('booking-contents').innerHTML = xhr.responseText;
        }
    };

    xhr.send("book_id="+ id);
        
      } 
    }


    
    function orderpage(id) {
      const orderid = document.getElementById("order-ground");
      if (orderid.style.display === "none") {
        
          orderid.style.display = "flex"; // Show the bar

          var xhr = new XMLHttpRequest();
          xhr.open("POST",'',true);
          xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
           
         xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('order-contents').innerHTML = xhr.responseText;
        }
    };

    xhr.send("fetch_id=" + id);
    
        
      }
      }
  


function cartbox(){
   const cartbox = document.getElementById("cartbox");                                                                      
      if(cartbox.style.display==="none"){
        cartbox.style.display = "block";
        } else {
          cartbox.style.display = "none"; 
        }
}

    function editprofile(){

      const profileid = document.getElementById("editprofile");                                                                      
      if(profileid.style.display==="none"){
        profileid.style.display = "block";
        } else {
          profileid.style.display = "none"; 
        }
    }

     function options(){

      const optionid = document.getElementById("optionsground");                                                                      
      if( optionid.style.display==="none"){
         optionid.style.display = "block";
        } else {
           optionid.style.display = "none"; 
        }
    }


    function Closebar_profile(){
      const closeid = document.getElementById("editprofile");                                                                      
    
      if(closeid.style.display==="block")
      {
        closeid.style.display = "none";
       
      } 
    }

    function Closebar(){

      const closeid = document.getElementById("shoping-ground");                                                                      
    
      window.location.href = "frontpage.php";
    }

    function Closebar_bill(){

      const closeid = document.getElementById("bill-ground");                                                                      
    
      if(closeid.style.display==="flex")
      {
        closeid.style.display = "none";

       
      } 
    }

    function Closebar_Cart(){
        const closeid = document.getElementById("cartbox");                                                                      
    
      if(closeid.style.display==="block")
      {
        closeid.style.display = "none";
      } 
    }

    function Closebar_Order(){

      const closeid = document.getElementById("order-ground");                                                                      
    
      if(closeid.style.display==="flex")
      {
        closeid.style.display = "none";

       
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


    function bill() {
      const shopboxbar = document.getElementById("bill-ground");
      if (shopboxbar.style.display === "none") {
        shopboxbar.style.display = "flex"; // Show the bar
    
        
      } else {
        shopboxbar.style.display = "none"; // Hide the bar
      }
    }

    function account() {
      const ac_id = document.getElementById("accountid");
       document.getElementById("msgDot").style.display = "none";  
      if (ac_id.style.display === "none") {
        ac_id.style.display = "flex"; // Show the bar
    
        
      } else {
        ac_id.style.display = "none"; // Hide the bar
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

function loginpage() {
  const popdownBar = document.getElementById("pop-loginpage");
  if (popdownBar.style.display === "none") {
    popdownBar.style.display = "block"; // Show the bar

    
  } else {
    popdownBar.style.display = "none"; // Hide the bar
  }
}
 
function cancel_from_cart(){
  const popdownBar = document.getElementById("cancel_cart");
  if (popdownBar.style.display === "none") {
    popdownBar.style.display = "block"; // Show the bar

    
  } else {
    popdownBar.style.display = "none"; // Hide the bar
  }
}

function CloseBar_from_cart(){
  const popbarid = document.getElementById("cancel_cart");
  if(popbarid.style.display==="block")
    popbarid.style.display = "none";

}

function CloseBar(){
  const popbarid = document.getElementById("pop-loginpage");
  if(popbarid.style.display==="block")
    popbarid.style.display = "none";

}
  </script>
   <style>



 .notification-dot {
      position: fixed;
      margin-left:14vh;
      margin-top:-12vh;
      width: 12px;
      height: 12px;
      background-color: rgba(165, 89, 13, 1);
      border-radius: 50%;
      border: 2px solid white;
      display: none; /* Hidden by default */
    }

    
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




    .delete_cart{border-radius:4px;margin-top:-10vh;margin-left:3vh; position:related; color:black;}
    .delete_cart:hover{ color:black;}
    .editprofileground{width: 190vh; height: 100vh; background: transparent; display: none; position: fixed;}
      .editaccount{margin-top: 226px; margin-left:-13vh; font-family:monospace; color:white;}
      .editaccount:hover{color :rgb(138, 184, 46); }
      .cross{ display:flex;  justify-content:center;  color:rgb(0, 0, 0); background:rgb(235, 4, 4); position:fixed; margin-left:135vh; margin-top:-80vh; height: 3vh;padding-bottom:5vh; padding-right:8px; padding-left:8px; border-radius:50px; font-size:25px; height:1px; width: 35px;}
      .cross:active{transform: scale(0.8);}
    .links{ position: relative  ;  width: 20vh; height:37vh;  border-radius:5px; margin-left:5vh;transition: 7s;}
      .shade{ position: relative;  width: 29vh; height:37vh;  border-radius:5px; margin-left:-2vh; transition: 1s;}
        
    .link:hover .shade{
    filter: brightness(50%);
   }
   
    .item-details{
      background: -webkit-gradient(linear,left top, left bottom,from(rgba(79, 77, 77, 0.908)),to(rgba(101, 97, 97, 0.19)))  ;
      position: relative;
      display: none;
      width: 29vh; height:37vh;  border-radius:5px; margin-left:-2vh;
      margin-top: -37vh;
    }
        .links:hover .item-details{
      display:block;
     
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
       
        height: 35vh;
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
 <?php 
include('dbcon.php');
 require('../config/autoload.php'); 
 ob_start();
$file=new FileUpload();
$elements=array( "name"=>"","tech"=>"","msoft"=>"","color"=>"","playlevel"=>"","size"=>"","quality"=>"","price"=>"","image"=>"","cid"=>"","Total items");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('name'=>"Manufactuer/importer",'tech'=>"Material",'color'=>"Color","playlevel"=>"Player Level","size"=>"Item - Size","quality"=>"Quality","price"=>"Price","image"=>"Image","cid"=>"Category");

$rules=array(
    "name"=>array("required"=>true),
    "tech"=>array("required"=>true),
    "color"=>array("required"=>true),
    "playlevel"=>array("required"=>true),
    "size"=>array("required"=>true),
    "quality"=> array("required"=>true),
    "price"=>array("required"=>true),
    "image"=>array("filerequired"=>true),
    "cid"=>array("required"=>true),
  
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	
    if($fileName=$file->doUploadRandom($_FILES['image'],array('.jpg','.png','.JPEG','.jfif','.JFIF'),100000,1,'../upload'))	
    {

$data=array(

       
        'name'=>$_POST['name'],
        'tech'=>$_POST['tech'],
        'color'=>$_POST['color'],
        'playlevel'=>$_POST['playlevel'],
        'size'=>$_POST['size'],
         'quality'=>$_POST['quality'],
         'price'=>$_POST['price'],
          'image'=>$fileName,
          'category'=>$_POST['cid']

    );

   
    if($dao->insert($data,"additems"))
    {
        echo "<script> alert('New record created successfully');</script> ";

    }
    else
        {$msg="Registration failed";} ?>


<?php
    
}
else
echo $file->errors();
}

}


?>













<!DOCTYPE html>
<html lang="en">
  <script>
            function openpage() {
      const bookid = document.getElementById("addsports");
      if (bookid.style.display === "none") {
          bookid.style.display ="block"; 
        
      } else {
        bookid.style.display = "none"; // Hide the bar
      }
    }
          </script>
<head>
  <!-- Required meta tags --> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Regal Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css"/>
  <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="vendors/jquery-bar-rating/fontawesome-stars-o.css">
  <link rel="stylesheet" href="vendors/jquery-bar-rating/fontawesome-stars.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
    
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.php"><img src="images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
             <h1>Add Sports Items</h1>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-lg-flex d-none">
                <button type="button" class="btn btn-info font-weight-bold" onclick="openpage()">+ Create New</button>
            </li>
          <li class="nav-item dropdown d-flex">
            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
              <i class="icon-air-play mx-0"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    New product launch
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown d-flex mr-4 ">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-cog"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
              <a class="dropdown-item preview-item">               
                  <i class="icon-head"></i> Profile
              </a>
              <a class="dropdown-item preview-item">
                  <i class="icon-inbox"></i> Logout
              </a>
            </div>
          </li>
          <li class="nav-item dropdown mr-4 d-lg-flex d-none">
            <a class="nav-link count-indicatord-flex align-item s-center justify-content-center" href="#">
              <i class="icon-grid"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile">
          <div class="user-image">
            <img src="images/faces/face28.png">
          </div>
          <div class="user-name">
              Edward Spencer
          </div>
          <div class="user-designation">
              Developer
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="addsports.php" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-disc menu-icon"></i>
              <span class="menu-title">Add sports Items</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="categorys.php">
              <i class="icon-file menu-icon"></i>
              <span class="menu-title">Add Category</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="userdetails.php">
              <i class="icon-pie-graph menu-icon"></i>
              <span class="menu-title">User Details</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="viewbooking.php">
              <i class="icon-command menu-icon"></i>
              <span class="menu-title">View Booking</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="viewoutofstocks.php">
              <i class="icon-help menu-icon"></i>
              <span class="menu-title">Out of Stock Items</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="Order_History.php" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">View Order History</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="docs/documentation.html">
              <i class="icon-book menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
        </ul>
      </nav>

        
  
        
      
      
          
    </div>
    
 <form method="POST" class="card-img-overlay m-4" style="margin-left:">
        <span style="margin-left:50vh; position:fixed; margin-top:30px; "></span><input type="text" name="search" class="p-xl-1 pl-xl-5" style="font-size:20px;margin-left:55vh; margin-top:34px; border:1px solid;"/>
        <input type="submit" name="filterorder" value="search"/>
      </form>

    <div class="container_gray_bg navbar-brand text-center" style=" margin-left:-100vh; margin-top:9vh;" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="card-img-overlay table badge-light thead-dark" style=" margin-left:140vh;margin-top:-90vh; border:1px solid black;">
                <tbody class="thead-dark">  
                <tr >
                        
       <th>Id</th>
        <th> Customer Name</th>
        <th> Place </th>
         <th> Product Name</th>
          <th>Quantity</th>
          <th> Total Price</th>
           <th> Date</th>
            <th>Image</th>
      
      </tr>
      <tr>
        <?php
 if(isset($_POST['filterorder']))
 {
     $search = $_POST['search'];
    $sql_full_records = "select * from buyhistory;";
    $result_full_result = mysqli_query($conn,$sql_full_records);
    while($row1 = mysqli_fetch_assoc($result_full_result))
    {
        if($search == $row1['date'])
            $flag = 1;
        
    }
    if($flag != 1)
        header('Location: Order_History.php');
    
   
 }
?>
      
</tr>
<tr>
    <?php
      $sql = "select * from buyhistory where date = '$search';";
    $result = mysqli_query($conn,$sql);
 
   while( $filter_row = mysqli_fetch_assoc($result)){
    ?>
    <td> <?php echo $filter_row['id'];?> </td>
    <td> <?php echo $filter_row['cust_name'];?> </td>
    <td> <?php echo $filter_row['location'];?> </td>
    <td> <?php echo $filter_row['item_name'];?> </td>
    <td> <?php echo $filter_row['quantity'];?> </td>
    <td> <?php echo $filter_row['total_price'];?> </td>
    <td> <?php echo $filter_row['date'];?> </td>
     <td  style=" font-size:20px;"> <img src='/SportsMart/upload/<?php echo $filter_row['item_image'];?>' style="width: 15vh; height:20vh; border-radius:6px; margin-left:10px;margin-top:20px;"/> </td>
    <?php }?>
</tr>
    </table>
  </div>
  
   
      <!-- partial -->
          </div>
          </body>
          </html>
          

        
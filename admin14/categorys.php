 <?php 
 require('../config/autoload.php'); 
$file=new FileUpload();
$elements=array("name"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('name'=>"Category name");

$rules=array("name"=>array("required"=>true),);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	
   

$data=array('categoryname'=>$_POST['name'],);

   
    if($dao->insert($data,"category"))
    {
        echo "<script> alert('New record created successfully');</script> ";

    }
    else
        {$msg="Registration failed";} ?>


<?php
    
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
             <h1>Add Categorys</h1>
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

        
   <div  style="display:none; " id="addsports">
      <div class="carousel-indicators nav-tabs" style=" position:fixed; background:white; width:178vh; height:85vh; padding-bottom:100vh; margin:auto; margin-left:33vh; margin-bottom:1vh; overflow:hidden;overflow-y:scroll;  ">
          
   
       <form action="" method="POST" enctype="multipart/form-data">
        <div style=" position:related; width:88vh; height:136vh; background:rgba(39, 38, 41, 0.798) ; margin-left:calc(-10%); margin-top:15vh; border-radius:15px; ">
       
        <div class="card-group column-gap-md-2 p-lg-5" style="margin-left: 3vh; color:antiquewhite;font-family:monospace;">
          <h5>Manufactuer/importer:</h5> <label style="margin-left:6vh;font-size:18px;">

                 <?= $form->textBox('name',array('class'=>'form-control','style'=>'height:3vh')); ?>
                <?= $validator->error('name '); ?>

          </label>
        </div>

       
        <div class="card-group column-gap-md-2 p-lg-5" style="margin-left: 60vh; margin-top:-5vh; color:antiquewhite;font-family:monospace;">
          <input type="submit" name="insert" value="submit"  style="border: none; border-radius:7px;color:black;background:white;height:6vh;width:10vh"> 
        </div>
      </div>
  </form>
        
      </div>
          
          
    </div>
    <div class="container_gray_bg navbar-brand text-center"  id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table badge-light thead-dark" style="margin-top:100px;">
                    <tbody class="thead-dark">  
                    <tr>
                        
        <th>Id</th>
        <th> Category Name</th>
           <th>Action</th>
      
      </tr>
      <?php
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'editcategory.php','params'=>array('cid'=>'cid'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'deletecategory.php','params'=>array('cid'=>'cid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('cid'),
        'actions_td'=>false,
       
        
    );

   
   $join=array(
        
    );
     $fields=array('cid','categoryname');

    $users=$dao->selectAsTable($fields,'category',"status=1",null,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>

    </table>
  </div>
  
   
      <!-- partial -->
          </div>
          </body>
          </html>

        
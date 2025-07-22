<?php require('../config/autoload.php'); ?>
<?php
	

include("head.php");
$dao=new DataAccess();
$info=$dao->getData('*','category','cid='.$_GET['cid']);
$file=new FileUpload();
$elements=array("name"=>$info[0]['categoryname']);

	$form = new FormAssist($elements,$_POST);

$labels=array('name'=>"Category Name");

$rules=array(
    "name"=>array("required"=>true),
);

    
$validator = new FormValidator($rules,$labels);
$flag = false;
if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{

$data=array(

       
        'categoryname'=>$_POST['name'],
       
    );

  $condition='cid='.$_GET['cid'];


if($dao->update($data,'category',$condition))
    {
        $msg="Successfully Updated";
       

    }
    else
        {$msg="Failed";} ?>

<span style="color:red;"><?php echo $msg;

  ?></span>


<?php
    
}


}


	
	
	
	
?>

<html>
<head>
	<style>
		.form{
		border:3px solid blue;
		}
	</style>
</head>
<body>


	<form action="" method="POST" enctype="multipart/form-data" style="margin-left: 5vh;" >
 
<div class="row card-body">
                    <div class="col-md-6 d-md-inline-flex h5 m-5">
Category Name:

<?= $form->textBox('name',array('class'=>'form-control flex-lg-shrink-0')    ); ?>
<?= $validator->error('name'); ?>

</div>
</div>




<button type="submit" name="btn_update"  >UPDATE</button>
</form>

</body>
</html>
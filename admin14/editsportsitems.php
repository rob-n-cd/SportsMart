<?php require('../config/autoload.php'); ?>
<?php
	

include("head.php");
$dao=new DataAccess();
$info=$dao->getData('*','additems','id='.$_GET['id']);
$file=new FileUpload();
$elements=array("name"=>$info[0]['name'],"tech"=>$info[0]['tech'],"color"=>$info[0]['color'],"playlevel"=>$info[0]['playlevel'],"size"=>$info[0]['size'],"quality"=>$info[0]['quality'],"price"=>$info[0]['price'],"image"=>$info[0]['image'],"cid"=>$info[0]['category']);

	$form = new FormAssist($elements,$_POST);

$labels=array('name'=>"Manufactuer/importer",'tech'=>"Technology",'color'=>"Color","playlevel"=>"Player Level","size"=>"Item - Size","quality"=>"Quality","price"=>"Price","image"=>"Image","cid"=>"Category");

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
$flag = false;
if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{

if(isset($_FILES['image']['name'])){
			if($fileName=$file->doUploadRandom($_FILES['image'],array('.jpg','.png','.jpeg','jfif'),100000,1,'../upload'))
			{
				$flag=true;
					
			}
}$data=array(

       
        'name'=>$_POST['name'],
        'tech'=>$_POST['tech'],
        'color'=>$_POST['color'],
        'playlevel'=>$_POST['playlevel'],
        'size'=>$_POST['size'],
         'quality'=>$_POST['quality'],
         'price'=>$_POST['price'],
          'image'=>$fileName,
          'category'=>$_POST['cid'],

    );

  $condition='id='.$_GET['id'];
if($flag === true)
			{	
                $data['image']=$fileName;
			}
    

if($dao->update($data,'additems',$condition))
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
 
<div class="row">
                    <div class="col-md-6">
Item Name:

<?= $form->textBox('name',array('class'=>'form-control')); ?>
<?= $validator->error('name'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
Technology:

<?= $form->textBox('tech',array('class'=>'form-control')); ?>
<?= $validator->error('tech'); ?>

</div>
</div>


<div class="row">
                    <div class="col-md-6">
Color:

<?= $form->textBox('color',array('class'=>'form-control')); ?>
<?= $validator->error('color'); ?>

</div>
</div>


<div class="row">
                    <div class="col-md-6">

Player Level:

<?= $form->textBox('playlevel',array('class'=>'form-control')); ?>
<?= $validator->error('playlevel'); ?>

</div>
</div>


<div class="row">
                    <div class="col-md-6">

Size:

<?= $form->textBox('size',array('class'=>'form-control')); ?>
<?= $validator->error('size'); ?>

</div>
</div>


<div class="row">
                    <div class="col-md-6">

                    

Quality:


<?= $form->textBox('quality',array('class'=>'form-control')); ?>
<?= $validator->error('quality'); ?>
</div>
</div>

<div class="row">
                    <div class="col-md-6">


Price :
<?= $form->textBox('price',array('class'=>'form-control')); ?>
<?= $validator->error('price'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
Item Image :
<?= $form->fileField('image',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('image'); ?></span>
</div>
</div>


<div class="row">
                    <div class="col-md-6"> <br> 
Category :<br><br>
                 
<?php
     $options = $dao->createOptions('categoryname','cid',"category");
     echo $form->dropDownList('cid',array('class'=>'form-control'),$options); ?>
<?= $validator->error('cid'); ?>
</div>
</div><br>


<button type="submit" name="btn_update"  >UPDATE</button>
</form>

</body>
</html>
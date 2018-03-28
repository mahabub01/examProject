<?php
$db = new DBContext();
$input = new Validation();
$tablename= "course";

if(isset($_POST['btn'])){
	$input->post("name")->isEmpty();
	$input->post("coursecode");
	$input->post("subcourse");

	$name = $input->values['name'];
	$coursecode = $input->values['coursecode'];
	$subcourse = $input->values['subcourse'];

	if($input->submit()){	
			
			if($coursecode != "" && $subcourse != ""){
				$data = array('name'=>$name,'coursecode'=>$coursecode,'subcourse'=>$subcourse);
			}else{
				$data = array('name'=>$name);
			}



			if($db->addData($tablename,$data)){

				echo '<div class="alert alert-success" role="alert">Success ! Data added Successfully</div>';
		
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">Error ! Data added Fail</div>';

			}

		
	}
	else{
		print_r($input->errors);
	}
}


?>


<?php Csrf::csrf();?>



<div class="admin-form">
<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Course name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="enter here.......">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Course Code</label>
    <input type="text" name="coursecode" class="form-control" id="exampleInputEmail1" placeholder="enter here.......">
  </div>


   <div class="form-group">
    <label for="exampleInputEmail1">SubCourse</label>
    <select class="form-control" name="subcourse">
    	<option value="0">Select</option>
    	<?php
    	$db = new DBContext();
    	foreach ($db->getData('course',['id','name']) as $value) {
    		echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
    	}

    	?>
    </select>
  </div>


  <input type="hidden" name="_token" value="<?php echo Csrf::_token();?>">


  <button type="submit" name="btn" class="btn btn-default">Add Course List</button>

  
</form>



<hr>
<a href="<?php echo appsConfig::URL('panel.php?url=course')?>">Back to List</a>

</div>


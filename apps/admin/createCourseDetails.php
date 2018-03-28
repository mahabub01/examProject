<?php
$db = new DBContext();
$input = new Validation();
$tablename= "coursedetails";

if(isset($_POST['btn'])){
	$input->post("name")->isEmpty();
	$input->post("coursecode")->isEmpty();
	$input->post("details")->isEmpty();

	$name = $input->values['name'];
	$coursecode = $input->values['coursecode'];
	$details = $input->values['details'];

	if($input->submit()){	
			

			$data = array('fullname'=>$name,'coursecode'=>$coursecode,'details'=>$details);


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
    <label for="exampleInputEmail1">Course Full name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="enter here.......">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Course Code</label>
    <input type="text" name="coursecode" class="form-control" id="exampleInputEmail1" placeholder="enter here.......">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Here is what people say about us</label>
    <textarea class="form-control" name="details">
    	
    </textarea>
  </div>



  <input type="hidden" name="_token" value="<?php echo Csrf::_token();?>">


  <button type="submit" name="btn" class="btn btn-default">Add Course Details List</button>

  
</form>



<hr>
<a href="<?php echo appsConfig::URL('panel.php?url=courseDetails')?>">Back to List</a>

</div>


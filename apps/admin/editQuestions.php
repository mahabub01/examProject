<?php

if(isset($_POST['btn_edit'])){
	$_SESSION['eid'] = $_POST['edit_id'];
}


$question_title = "";
$questions = "";
$answer = "";
$coursecode = "";



$db = new DBContext();
$input = new Validation();
$tablename= "questions";

if(isset($_POST['btn'])){
	$input->postQuestions("questions")->isEmpty();
	$input->postQuestions("question_title")->isEmpty();
	$input->postQuestions("answer")->isEmpty();
	$input->postQuestions("coursecode")->isEmpty();

	$questions = $input->values['questions'];
	$question_title = $input->values['question_title'];
	$answer = $input->values['answer'];
	$coursecode = $input->values['coursecode'];

	if($input->submit()){	
			

			$data = array('question_title'=>$question_title,'questions'=>$questions,'answer'=>$answer,'coursecode'=>$coursecode);


			if($db->editData($tablename,$data,['id'=>$_SESSION['eid']])){

				echo '<div class="alert alert-success" role="alert">Success ! Data added Successfully</div>';
		
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">Error ! Data added Fail</div>';
				print_r($db->Error);

			}

		
	}
	else{
		print_r($input->errors);
	}
}else{
	foreach ($db->detailsData("questions",['id','question_title','questions','answer'],['id'=>$_SESSION['eid']]) as $key => $value) {
		$question_title = $value['question_title'];
		$questions = $value['questions'];
		$answer = $value['answer'];
	}
}


?>


<?php Csrf::csrf();?>



<div class="admin-form">
<form action="" method="post">
	<div class="form-group">
    <label for="exampleInputEmail1">Exam Code</label>
    <input type="text" name="coursecode" class="form-control"  placeholder="Exam code" value="<?php echo $coursecode;?>">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Question Title</label>
    <input type="text" name="question_title" class="form-control"  placeholder="Question title here...." value="<?php echo $question_title;?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Questions</label>
    <textarea class="form-control" name="questions">
    	<?php echo $questions;?>
    </textarea>
  </div>
  <script type="text/javascript">
	CKEDITOR.replace('questions');
</script>

  <div class="form-group">
    <label for="exampleInputEmail1">Answers</label>
    <textarea class="form-control" name="answer">
    	<?php echo $answer;?>
    </textarea>
  </div>
    <script type="text/javascript">
	CKEDITOR.replace('answer');
</script>



  <input type="hidden" name="_token" value="<?php echo Csrf::_token();?>">


  <button type="submit" name="btn" class="btn btn-primary">Update Questions</button>

  
</form>



<hr>
<a href="<?php echo appsConfig::URL('panel.php?url=questions')?>">Back to List</a>

</div>


<?php
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
    <label for="exampleInputEmail1">Exam Code</label>
    <input type="text" name="coursecode" class="form-control"  placeholder="Exam code">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Question Title</label>
    <input type="text" name="question_title" class="form-control"  placeholder="Question title here....">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Questions</label>
    <textarea class="form-control" name="questions">
    	
    </textarea>
  </div>
  <script type="text/javascript">
	CKEDITOR.replace('questions');
</script>

  <div class="form-group">
    <label for="exampleInputEmail1">Answers</label>
    <textarea class="form-control" name="answer">
    	
    </textarea>
  </div>
    <script type="text/javascript">
	CKEDITOR.replace('answer');
</script>



  <input type="hidden" name="_token" value="<?php echo Csrf::_token();?>">


  <button type="submit" name="btn" class="btn btn-default">Add Questions</button>

  
</form>



<hr>
<a href="<?php echo appsConfig::URL('panel.php?url=questions')?>">Back to List</a>

</div>


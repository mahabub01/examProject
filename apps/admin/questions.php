

<script type="text/javascript">
	$(document).ready(function(){
    $('#myTable').DataTable();
});
</script>

<?php
include_once 'config/mgs.php';
if(isset($_POST['btn_delete'])){
	$db = new DBContext();
	$id = $_POST['delete_id'];
	if($db->deleteData("questions",array('id'=>$id))){
		echo '<div class="alert alert-success">
  <strong>Success!</strong> Data Delete Successfully....
</div>';
	}
	else
	{
		echo '<div class="error-mgs">Data Deleted Fails....</div>';
	}

}


?>


<a href="panel.php?url=createQustions">Create</a>
<hr>
<table class="display" id="myTable">
	<thead>
		<th>Sl</th>
		<th>Question title</th>
		<th>Questions</th>
		<th>Answer</th>
		<th></th>
		<th></th>

	</thead>

	<tbody>
		

		<?php
		$db = new DBContext();
		$i = 1;
		foreach ($db->getData("questions",array("id","questions","question_title","answer")) as  $value) {
			echo '<tr>
			<td>'.$i++.'</td>
			<td>'.$value['question_title'].'</td>
			<td>';
			if(strlen($value['questions']) > 100){

				echo htmlentities(substr($value['questions'], 0,100).'...');
			}else{
				echo htmlentities($value['questions']);
			}

			echo '</td>
			<td>';
			if(strlen($value['answer']) > 100){

				echo htmlentities(substr($value['answer'], 0,100).'...');
			}else{
				echo htmlentities($value['answer']);
			}

			echo '</td>

			<td>
				<form action="'.appsConfig::Link('/panel.php?url=qustionDetails').'" method="post">
					<input type="hidden" name="details_id" value="'.$value['id'].'">
					<input type="submit" name="btn_details" value="Details" class="btn btn-warning adminbtn">
				</form>
			</td>


			

			<td>
				<form action="" method="post">
					<input type="hidden" name="delete_id" value="'.$value['id'].'">
					<input type="submit" name="btn_delete" value="Delete" class="btn btn-danger adminbtn">
				</form>
			</td>


			';

	



				
		echo '</tr>';
		}



		?>




	</tbody>
</table>



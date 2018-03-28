

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
	if($db->deleteData("course",array('id'=>$id))){
		echo '<div class="success-mgs">Data Delete Successfully...</div>';
	}
	else
	{
		echo '<div class="error-mgs">Data Deleted Fails....</div>';
	}

}


?>


<a href="panel.php?url=createCourse">Create</a>
<hr>
<table class="display" id="myTable">
	<thead>
		<th>Sl</th>
		<th>Course name</th>
		<th>Course Code</th>
		<th>Sub Course</th>
		<th></th>
		<th></th>
	</thead>

	<tbody>
		

		<?php
		$db = new DBContext();
		$i = 1;
		foreach ($db->getData("course",array("id","name","coursecode","subcourse")) as  $value) {
			echo '<tr>
			<td>'.$i++.'</td>
			<td>'.$value['name'].'</td>
			<td>'.$value['coursecode'].'</td>
			<td>'.$value['subcourse'].'</td>
			
			<td>
				<form action="'.appsConfig::Link('/panel.php?url=editCourse').'" method="post">
					<input type="hidden" name="edit_id" value="'.$value['id'].'">
					<input type="submit" name="btn_edit" value="Edit" class="btn btn-primary adminbtn">
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



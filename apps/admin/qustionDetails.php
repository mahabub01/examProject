
<?php
if(!isset($_POST['btn_details'])){
	die("Don't try again");
}

$id = $_POST['details_id'];
$db = new DBContext();

foreach ($db->detailsData('questions',['id','question_title','questions','answer'],['id'=>$id]) as $key => $value) {

?>

		
				<form action="<?php echo appsConfig::Link('/panel.php?url=editQuestions')?>" method="post" style="float: right;">
					<input type="hidden" name="edit_id" value="<?php echo $id;?>">
					<input type="submit" name="btn_edit" value="Edit" class="btn btn-primary" style="padding: 6px 30px">
				</form>
			
<table>
	<tr>
		<td width="100%"><h1><?php
		echo $value['question_title']
		?></h1></td>
	</tr>

	<tr>

		<td>
		<div style="border:1px solid silver;padding: 10px">
			<h4>Question:</h4>
		<?php
		echo $value['questions'];
		?>
		</div>	
		</td>
	</tr>
	
	<tr>
		<td>
			<div style="border:1px solid green;padding: 10px">
			<h4>Answer:</h4>
			<?php echo $value['answer']?>
		    </div>
		</td>
	</tr>








</table>

<?php } ?>


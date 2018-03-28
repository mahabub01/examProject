

<?php
if(!isset($_POST['btnSearch'])){
	die("Don't Try Again");		
  }

$search = $_POST['search'];

?>
<?php include_once 'apps/public/header.php';?>


<div class="custom-container all-exams">


<h2 class="text-left display-4">Search For "<?php echo $search;?>"</h2>
<hr>
<div class="all-exams-content">
	<div class="row">

	<div class="col-sm-2 col-md-2 col-lg-2 all-exams-left">
		<ul class="list-unstyled">
			<?php
			$db = new DBContext();
			$sql = "select * from course where subcourse is null";
			foreach ($db->customGet($sql) as $key => $value) {
				echo '<li><a href="'.appsConfig::link('exams-details/'.$value['id']).'">'.$value['name'].'</a></li>';
			}

			?>

		</ul>
	
	</div>




	<div class="col-sm-10 col-md-10 col-lg-10 all-exams-right">

		<!--start list-->
		<?php
		$db = new DBContext();
		
		$sql = "select * from course where (name like '%".$search."%') || coursecode like '%".$search."%'";

		foreach ($db->customGet($sql) as  $value) {
			echo '<div class="list-group" style="margin-bottom: 30px;">';
		echo '<a href="'.appsConfig::link('info/'.$value['coursecode']).'" class="list-group-item list-group-item-action"> <span style="margin-right: 50px;color:#51C3F3">'.$value['coursecode'].'</span> '.$value['name'].'</a>';
		  
		echo '</div>';
		}


		?>

		<!--end list-->




		
	</div>
	</div>
</div>













</div>



















<?php include_once 'apps/public/footer.php';?>
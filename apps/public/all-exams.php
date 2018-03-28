
<?php include_once 'apps/public/header.php';?>


<div class="custom-container all-exams">

<h2 class="text-center display-4">All Vendors and Exams</h2>
<p class="text-center lead">viewing total of <?php
$db = new DBContext();
echo $db->dataCount("select * from course");
?> exams</p>
<form action="<?php appsConfig::url('search')?>" method="post">
	<input type="search" name="search" placeholder="Enter Your Exam Code">
	<button type="submit" class="button" name="btnSearch"><i class="material-icons">&#xE8B6;</i></button>
</form>


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
		$sql = "select * from course where subcourse is null";
		foreach ($db->customGet($sql) as  $value) {
			echo '<div class="list-group" style="margin-bottom: 30px;">
	
		  <a href="'.appsConfig::link('exams-details/'.$value['id']).'" class="list-group-item list-group-item-action lead all-exam-right-ling">'.$value['name'].'<small style="font-size: 12px;"> click here for details</small></a>';

		 
		  $cmd = "select * from course where subcourse =".$value['id'];
		  if($db->customGet($cmd)){
		  	foreach ($db->customGet($cmd) as  $v) {
		  	echo '<a href="'.appsConfig::link('info/'.$v['coursecode']).'" class="list-group-item list-group-item-action"> <span style="margin-right: 50px;color:#51C3F3">'.$v['coursecode'].'</span> '.$v['name'].'</a>';
		  }

		  }else{
		  	echo '<a href="#" class="list-group-item list-group-item-action"> <span style="margin-right: 50px;color:#51C3F3"></span> No Course Available</a>';
		  }


		echo '</div>';
		}


		?>

		<!--end list-->




		
	</div>
	</div>
</div>













</div>



















<?php include_once 'apps/public/footer.php';?>
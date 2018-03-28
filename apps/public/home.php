
<?php include_once 'apps/public/header.php';?>


<div class="search-section clearfix">
<div class="container">
	<h1>Which IT Certification exam Q&A are you looking for?</h1>
	<a href="<?php appsConfig::url('all-exams')?>"><button class="custom-btn viewExambtn">View Exam</button></a>
	<form action="<?php appsConfig::url('search')?>" method="post">
		<input type="text" name="search" placeholder="Find your Exam">
		<button type="submit" name="btnSearch"><i class="material-icons">&#xE8B6;</i></button>
	</form>
	<h2>The only actual free exams website</h2>

</div>
</div>




<!--start course heading-->
<div class="course-heading-section">
<div class="custom-container">

<h2 class="display-4 text-center" style="color:#4AC8E7;    padding-bottom: 36px;">Popular Certifications</h2>



<div class="row">

<!--start box-->
<?php
$db = new DBContext();
$sql = "select * from course";
foreach ($db->customGet($sql) as  $value) {

	if($value['subcourse'] == ""){

	echo '<div class="col-md-3" style="margin-top:20px;">		
	<div class="course-heading-box">
	<a href="" style="margin: 0px;padding: 0px">
	<figure>
		<img src="'.appsConfig::link('apps/images/mcsa.png').'">
	</figure>
	<figcaption class="lead">'.$value['name'].' <span><i class="material-icons">&#xE8BE;</i></span> </figcaption>
	</a>

	<a href="'.appsConfig::link('exams-details/'.$value['id']).'">View Details</a>

	</div>

</div>';


	}else{

echo '<div class="col-md-3" style="margin-top:20px;">		
	<div class="course-heading-box">
	<a href="" style="margin: 0px;padding: 0px">
	<figure>
		<img src="'.appsConfig::link('apps/images/mcsa.png').'">
	</figure>
	<figcaption class="lead">'.$value['coursecode'].' <span><i class="material-icons">&#xE8BE;</i></span> </figcaption>
	</a>

	<a href="'.appsConfig::link('info/'.$value['coursecode']).'">Go To Exam</a>

	</div>

</div>';

	}



}

?>



<!--end box-->


<!--start box
<div class="col">		
	<div class="course-heading-box">
	<a href="" style="margin: 0px;padding: 0px">
	<figure>
		<img src="<?php appsConfig::url('apps/images/mcsa.png');?>">
	</figure>
	<figcaption class="lead">MCSA <span><i class="material-icons">&#xE8BE;</i></span> </figcaption>
	</a>

	<a href="">View Details</a>

	</div>

</div>
end box-->










</div>










</div>
</div>
<!--end course heading-->






<div class="custom-container home-text">

<h2 class="display-5">Pass Your Exam Easily On The 1st Try With Our Free practice exam questions and answers</h2>

<p>Whether you are a student attempting to pass an exam to be eligible for a post-graduate job, or a working professional hoping to improve your work credentials and earn that dream promotion Exam-Labs is here to help. Exam-Labs is the premier destination for certification preparation – and its free! We have exam dumps and brain dumps for PMP certification, CompTIA certification, CCNA certification, CCIE certification, MCSA certification and many more. Passing an exam or certification is not an easy feat.</p>

<p>Your focus should be determining the certification that best fits your educational and professional goals, and getting the best materials to prepare. That is where Exam-Labs comes in. We have collected an extensive library of exam materials from Microsoft, Cisco, CompTIA, Oracle, Citrix, VMWare, Isaca, ISC, Apics, Checkpoint, PMI, HP, IBM and many other individual certifications.</p>

<p>Our materials have been reviewed and approved by industry experts and individuals who have taken and passed these exams. Exam-Labs will have you prepared to take your test with high confidence and pass easily. Whether you are looking for a CompTIA A+ study guide, PMP exam questions, CEH exam dump or a CCNA test, Exam-Labs.com has you covered. For a full list of the vendors available on Exam-Labs head over to our Vendors page. You will be able to preview questions for any number of exams and certification tests within minutes of logging on. Each question is multiple choice, and offers the ability to see the answer right then and validate your understanding. Sign-Up for Exam-Labs today and start your journey towards certification.</p>


</div>



<!--start popular exam pactice-->
<div class="popular-exam-pactice">
<div class="custom-container">
<table class="popular-exam-pactice_table">
	<tr>
		<th width="70%">Most Popular Practice Exams</th>
		<th width="30%">Exam</th>
	</tr>

	<?php
	$cmd = " select * from course where subcourse is not null";
	foreach ($db->customGet($cmd) as $value) {
		echo '<tr>
		<td><a href="'.appsConfig::link('info/'.$value['coursecode']).'" style="display:block;">'.$value['name'].'</a></td>
		<td><a href="'.appsConfig::link('info/'.$value['coursecode']).'" style="display:block;">'.$value['coursecode'].'</a></td>
		</tr>';
	}

	?>


	

</table>

</div>

</div>
<!--end popular exam pactice-->



<?php include_once 'apps/public/footer.php';?>










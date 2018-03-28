<?php include_once 'apps/public/header.php';?>

<?php
if(!isset($url[1])){
	die();
}

$courseCode = $url[1];
$db = new DBContext();
$sql = "select * from coursedetails where coursecode = '".$courseCode."'";
foreach ($db->customGet($sql) as $value) {

?>


<div class="custom-container" style="padding-top: 100px;">	
	
		<h5 style="text-align: center;"><?php echo $value['fullname'];?></h5>

		<a href="<?php appsConfig::url('exams/'.$value['coursecode'])?>"><button class="info-btn">Start Exam</button></a>

</div>
<div class="info-section">
<div class="container">

		<div class="row">
			<div class="col">
				<div></div>
				<img src="<?php appsConfig::url('apps/images/200-125_practice_exam1.png')?>" class="img-thumbnail custom-thumbnail">
			</div>

			<div class="col">

				<img src="<?php appsConfig::url('apps/images/200-125_practice_exam1.png')?>" class="img-thumbnail custom-thumbnail">
			</div>

			<div class="col">
				<img src="<?php appsConfig::url('apps/images/200-125_practice_exam1.png')?>" class="img-thumbnail custom-thumbnail">

			</div>

		</div>
</div>
<div class="custom-container">

		<p style="font-weight: bold;color:blue;margin-top: 20px;">The <?php echo $value['coursecode'];?> exam was last updated at : <?php echo date("F j, Y g:i a", strtotime($value['dates']))?></p>



		<h5 style="font-weight: bolder;margin-top: 30px">Here is what people say about us</h5>

		
		<blockquote class="blockquote custom-blockquote">
		  <p class="mb-0">
			<?php echo $value['details']?>
		  </p>
		</blockquote>


		<a href="<?php appsConfig::url('exams/'.$value['coursecode'])?>"><button class="info-btn">Start Exam</button></a>
		<p>Isaca certifications are highly demanded across large and small IT organizations across the world. Hiring managers prefer candidates who not only have an understanding of the topic and experience, but having completed certification in the subject. All the Isaca certifications listed on Exam-Labs are accepted worldwide and are a part of the industry standards.</p>

		<p>Are you looking for practice questions and answers for the Isaca Isaca Certified in Risk and Information Systems Control exam?  Exam-Labs is here to help! We have compiled a database of questions from actual exams in order to help you prepare for and pass your exam on the first attempt. All training materials on the site are up to date and verified by industry experts.</p>
		

		<h5>Why Exam-Labs is the best choice for certification exam preparation ?</h5>



		<h5>1. Access Exam Questions & Answers Without Cost (100% FREE):</h5>
		<p>Unlike other websites, Exam-Labs.com is dedicated to provide practice exam questions and answers, FREE of cost. To view the full database FREE material, sign up for a free account with Exam-Labs. A non-registered user can view up to 10 questions & answers FREE of cost. In order to access the full database of hundreds of questions, sign-up for a FREE and quick account to get instant access for the full set of materials for the Isaca CRISC exam.</p>

		<h5>2. A Central Tool to Help You Prepare for Your Exam:</h5>
		<p>Exam-Labs.com is the ultimate preparation source for passing the Isaca CRISC exam. We have carefully complied realistic exam questions and answers, which are updated frequently, and reviewed by industry experts. Our Isaca experts from multiple organizations are talented and qualified individuals who have reviewed each question and answer explanation section in order to help you understand the concept and pass the certification exam. The best way to prepare for an exam is not reading a text book, but taking practice questions and understanding the correct answers.</p>

		<h5>3. User Friendly & Easily Accessible on Mobile Devices:</h5>
		<p>Exam-Labs is extremely user friendly. The focus of the website is to provide accurate, updated, and clear material to help you study and pass you’re the Certified in Risk and Information Systems Control. Users can quickly get to the questions and answer database, which is free of ads or distracting information. The site is mobile friendly to allow testers the ability to study anywhere, as long as you have internet connection or a data plan on your mobile device.</p>

		<h5>4. Get Access to the Most Accurate & Recent Certified in Risk and Information Systems Control Questions & Answers:</h5>
		<p>Exam databases are regularly updated throughout the year to include the latest questions and answers from the Isaca CRISC exam. On each exam page you will find a date located at the top of the page indicating the most recent update to the list of test questions and answers. Having authentic and current exam questions, will you pass your test on the first try!</p>

		<h5>5. All Materials Are Verified by Industry Experts:</h5>
		<p>We are dedicated to providing you with accurate Certified in Risk and Information Systems Control exam questions & answers, along with descriptive explanations. We understand the value of your time and money, which is why every question and answer on Exam-Labs has been verified by Isaca experts. They are highly qualified individuals, who have many years of professional experience related to the subject of the exam.</p>

		<h5>6. All Exam Questions Include Detailed Answers with Explanations:</h5>
		<p>Unlike many other exam prep websites, Exam-Labs.com provides not only actual Isaca CRISC exam questions, but also detailed answers, explanations and diagrams even in the free access mode. This is important to help the individual not only understand the correct answer, but also why the additional options were incorrect. Application to best practices life examples helps translate questions from pure academic situations into practical life.</p>


		<h5>What Benefits Does Premium Access to Exam Materials Offer?</h5>
		<p>The Exam-Labs team has worked directly with industry experts to provide you with the actual questions and answers from the latest versions of the Isaca CRISC exam. Practice questions are proven to be the most effectively way of preparing for certification exams. Premium access to exams offers several additional benefits, such as:</p>


		<h5>1. Ability to Print Exam Materials</h5>
		<p>The Exam-Labs.com team understands that many people studying for a new certification will not have access to a computer or internet all the time. Additionally, some may prefer to prepare for their exam(s) from physical notes. Our system is configured to allow testers access to instantly print a copy of the Isaca CRISC questions and answers. Simply log into your premium account and click the printer icon in left corner.</p>


		<h5>2. Customize Exam Appearance</h5>
		<p>You will unlock the ability to customize exactly how many questions and answers each on each page. This allows you to progress through the exam in the format that works best you for.</p>


		<h5>3. No Captcha</h5>
		<p>With premium access, the captcha which appears at the end of each page will no longer be a stop-check before progressing on to the next page.</p>

		<h5>4. No subscriptions</h5>
		<p>Premium access is a one-time payment, there are no subscriptions involved in the process. For $9.99 you get premium access for one month, or for $15.99 you can receive lifetime premium access for that exam. Lifetime premium access includes updated to the test database, as well as future enhancements to the site (i.e. printing).</p>


		<h5>5. Preview Before You Buy</h5>
		<p>Unlike many other test prep websites, Exam-Labs lets you see exactly how the questions and answers are structured, prior to any purchase. This allows the tester the ability to practice and get our test prop for the Certified in Risk and Information Systems Control.</p>

		<h5>6. Improving the test preparation process</h5>
		<p>By purchasing premium access, you are also supporting and contributing to the improvement and development of future enhancements to the website and test preparation process.</p>


		<h5>How to Get Premium Access:</h5>
		<blockquote class="blockquote custom-blockquote">
		  <p class="mb-0">After you have previewed the first 10 exam questions for free, you will first be asked to sign-up for a free account on Exam-Labs.</p>
		</blockquote>


		<blockquote class="blockquote custom-blockquote">
		  <p class="mb-0">
		  	Once you have logged into your new account, select the exam you wish to access via the search box or on the ‘All Exam’s tab.
		 </p>
		</blockquote>

		<blockquote class="blockquote custom-blockquote">
		  <p class="mb-0">
You will then be redirected to the information page for you selected.
		 </p>
		</blockquote>

				<blockquote class="blockquote custom-blockquote">
		  <p class="mb-0">
Click the ‘Start Exam’ button on the info page to be directed to the question database.
		 </p>
		</blockquote>


				<blockquote class="blockquote custom-blockquote">
		  <p class="mb-0">
Select one of the premium access buttons, and then the upgrade option.
		 </p>
		</blockquote>

				<blockquote class="blockquote custom-blockquote">
		  <p class="mb-0">
Choose a plan that best fits your objective – (1) 1 month for $9.99 (which includes updates for one month) or (2) lifetime access for $15.99 (which includes lifetime updates).
		 </p>
		</blockquote>

	   <blockquote class="blockquote custom-blockquote">
		  <p class="mb-0">
Complete the payment process and then redirect back to the exam page.
		 </p>
		</blockquote>


		<blockquote class="blockquote custom-blockquote">
		  <p class="mb-0">
All premium access features will be available instantly after purchase.
		 </p>
		</blockquote>



		<h5>Money Back Guarantee:</h5>
		<p>
			Exam-labs is a dedicated to providing quality exam preparation materials to help you succeed in passing your exam and earning certification. The site compiles realistic exam questions from recent tests to bring you the best method of preparing for the Isaca CRISC exam. The test questions database is continuously updated in order to deliver the most accurate resource, free of charge. However, premium access for the Isaca CRISC exam offers additional benefits that may be preferable in your studies. If you are unable pass the Isaca CRISC exam, and have purchases the premium access, Exam-labs will provide you with another exam of your choosing, absolutely FREE. In order to use this offer, simply contact our support team and request the new exam that you would like to claim. You will need to provide the scanned copy of your exam result card. After verifying the results, Exam-labs will deliver the new exam of your choice absolutely Free
		</p>




		<a href="<?php appsConfig::url('exams/'.$value['coursecode'])?>"><button class="info-btn">Start Exam</button></a>


	</div>
</div>

<?php
}

?>
<?php include_once 'apps/public/footer.php';?>
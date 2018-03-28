<?php
if(!isset($url[1]))
	die("Don't Try again");

?>
<?php include_once 'apps/public/header.php';?>
<div class="exams-section">
<div class="exams-header">

<?php
$db = new DBContext();
foreach ($db->detailsData('coursedetails',['fullname','coursecode','	dates'],['coursecode'=>$url[1]]) as  $vData) {
?>

<h3><?php echo $vData['fullname'];?></h3>
<p>
Get 100% Free <?php echo $url[1];?> Question ,Answers<br/>
Frequently Updated Exams<br/>
Fast and Reliable<br/>
<?php echo $url[1];?> was last updated at : <?php echo date("F j, Y g:i a", strtotime($vData['dates']))?></p>

</div>


<div class="exam-nav" style="">
<h3><?php echo $vData['fullname'];?></h3>
</div>

<?php } ?>


<div class="exams-heading-section">

<div class="row">
<div class="col-md-3 col-sm-3">


</div>

<div class="col-md-6 col-sm-6" style="margin-top: 30px;">
<?php
$limit = 15;
if(isset($url[2])){
	$QuePages = $url[2];
}else{
   $QuePages = 0;	
}
?>
<?php
$cmd = "select * from questions where coursecode = '".$url[1]."'";
$rowCount = $db->dataCount($cmd);

if(isset($_SESSION['premium']) && $_SESSION['premium'] == "YES"){

if($QuePages ==0){
echo '<a href="#"><button class="btn btn-primary" style="padding: 2px 20px"><i class="fas fa-fast-backward"></i> BACK </button></a>';
}else{
echo '<a href="'.($QuePages-$limit).'"><button class="btn btn-primary" style="padding: 2px 20px"><i class="fas fa-fast-backward"></i> BACK </button></a>';
}


if(($QuePages+$limit) <= $rowCount - ($rowCount % $limit)){
	echo '<a href="'.appsConfig::url('exams/'.$url[1].'/'.($QuePages+$limit)).'" style="margin-left:5px;"><button class="btn btn-primary" style="padding: 2px 20px">NEXT <i class="fas fa-fast-forward"></i></button></a>';
}else{
	echo '<a href="#" style="margin-left:5px;"><button class="btn btn-primary" style="padding: 2px 20px">NEXT <i class="fas fa-fast-forward"></i></button></a>';
}

}else{

echo '<button class="btn btn-primary" style="padding: 2px 20px" onclick="showPremium()"><i class="fas fa-fast-backward"></i> BACK </button>';

echo '<button class="btn btn-primary" style="padding: 2px 20px;margin-left:5px" onclick="showPremium()">NEXT <i class="fas fa-fast-forward"></i></button>';

}

?>








(Page <?php echo $QuePages > 0 ?($QuePages/$limit)+1:1 ?> out of 
	<?php 
	$cmd = "select * from questions where coursecode = '".$url[1]."'";
	
	echo ceil($rowCount/$limit);

?>)

<style type="text/css">
	.showpreminum{
		display: none;
	}
</style>
<script type="text/javascript">
	function showPremium(){
		$("#premium").show();
	}
</script>

<p style="color:#CE2E9F;font-weight: bold;" id="premium" class="showpreminum"><i class="fas fa-star"></i> You have premium VIP access to this exam   <i class="fas fa-star"></i></p>


</div>

<div class="col-md-3 col-sm-3">
<p style="margin-top: 10px;padding: 0px;">Showing 10 of 401 Questions 
</p>
<select class="exam-select">
	<option>10 questions per page</option>
	<option>30 questions per page</option>
	<option>50 questions per page</option>
	<option>100 questions per page</option>
</select>

</div>
</div>
	
</div>







<div class="custom-container">


<?php
$db = new DBContext();
$i = 1;









foreach ($db->detailsData("questions",['id','question_title','questions','answer','coursecode'],['coursecode'=>$url[1]]) as $key => $value) {
	
?>

<!--start qustion box-->
<div class="qustion-box">
	<h1 class="qustion-heading"><?php echo $value['question_title'].'test';?></h1>
	<?php
	echo $value['questions'];
	?>

<div class="btnGroup">
<span class="cmt-count" style="text-align: center;">
	<?php
	$cmd ="select * from comments where questionid =".$value['id'];
	echo $db->dataCount($cmd);

	?>

</span>
<button type="button" class="viewbtn" id="qusBTN<?php echo $i;?>">View Answer <i class="material-icons" style="font-size: 16px;">&#xE0C9;</i></button>

<button type="button" class="commentbtn" id="cmtBTN<?php echo $i;?>">Show comment <i class="far fa-comments"></i></button>

<button type="button" class="commentbtn hidebtn" id="hidecmtBTN<?php echo $i;?>" style="padding: 5px 26px;">Hide comment <i class="far fa-comments"></i></button>

</div>


<div class="ans-container" id="ansBTN<?php echo $i;?>">
	<?php echo $value['answer']?>
</div>

<!--comment box start-->
<div class="cmt-container" id="anscmtBTN<?php echo $i;?>">


	<?php
	$i++;
	if(isset($_SESSION['username'])){

		echo '<p><b>Question discussion</b></p>
	<form method="post" action="" id="commentForm">
		<textarea name="comment" id="comment'.$value['id'].'">
			
		</textarea>
		<input type="hidden" name="username" value="'.$_SESSION['username'].'" id="username'.$value['id'].'"/>
		<input type="hidden" name="questionsid" value="'.$value['id'].'" id="questionsid'.$value['id'].'"/>
		<button type="button" class="commentSubmitbtn" onclick="addComment('.$value['id'].')">Submit</button>
	</form>';
	}else{
		echo '<p><b>Question discussion</b></p>';
		echo '<p>You need to <a href="'.appsConfig::link('sign-up').'">signup</a> or <a href="'.appsConfig::link('sign-in').'">login</a> to add a comment</p>';
	}

	?>

	<div id="commentResult">

	<?php
	$d = new DBContext();
	$sql = "select * from comments where questionid =".$value['id']." and reply is null order by id desc";
    		foreach ($d->customGet($sql) as $key => $v) {
    			echo '<div class="cmt-box">
	<p style="color:black"><b>'.$v['username'].'</b></p>
	<p>'.$v['comment'].'</p>';

	if(isset($_SESSION['username'])){
		echo '<p><a href="javascript:void(0)" onclick="like('.$value['id'].','.$v['id'].')">Like</a> 
	<a href="javascript:void(0)" onclick="Reply('.$v['id'].')">Reply</a> ';
	}else{
		echo '<p><a href="javascript:void(0)">Like</a> 
	<a href="javascript:void(0)" onclick="Reply('.$v['id'].')">Reply</a> ';
	}



	echo '<a href=""><i class="far fa-thumbs-up"></i> <span id="likeResult'.$v['id'].'">';
	//like here
	$cmd = "select * from likes where questionsid =".$value['id']." and commentid =".$v['id'];
    echo $d->dataCount($cmd);

	echo'</span></a>
	<a href="" style="font-size: 12px;color:gray;text-decoration: none;">'.date("F j, Y g:i a", strtotime($v['dates'])).'</a>
	</p>';

$ccc = "select * from comments where questionid =".$value['id']." and reply = ".$v['id']." order by id desc";



	echo '<div class="reply-box">';
	//start reply

	  //reply form 
  	if(isset($_SESSION['username'])){

		echo '
	<form method="post" action="" class="form-display" id="replyForm'.$v['id'].'">
	<p><b>Write your commnet here...</b></p>
		<textarea name="comment" id="commentReply'.$v['id'].'">
			
		</textarea>
		<input type="hidden" name="username" value="'.$_SESSION['username'].'" id="usernameReply'.$v['id'].'"/>
		<input type="hidden" name="questionsid" value="'.$value['id'].'" id="questionsidReply'.$v['id'].'"/>
		<button type="button" class="commentSubmitbtn" onclick="addReply('.$v['id'].')">Submit</button>
	</form>';
	}else{
		//echo '<p><b>Question discussion</b></p>';
		//echo '<p>You need to <a href="'.appsConfig::link('sign-up').'">signup</a> or <a href="'.appsConfig::link('sign-in').'">login</a> to add a comment</p>';
	}//end reply form 


 if($d->dataCount($ccc)){

    foreach ($d->customGet($ccc) as $key => $item) {
    			echo '<div class="cmt-box" style="border-bottom:1px solid #FFFFFF;margin-bottom:10px;padding-top:0px">
	<p style="color:black"><b>'.$item['username'].'</b></p>
	<p>'.$item['comment'].'</p>';

	if(isset($_SESSION['username'])){
		echo '<p><a href="javascript:void(0)" onclick="like('.$value['id'].','.$item['id'].')">Like</a> 
	<a href="">Reply</a> ';
	}else{
		echo '<p><a href="javascript:void(0)">Like</a> 
	<a href="javascript:void(0)">Reply</a> ';
	}

	


	echo '<a href="#"><i class="far fa-thumbs-up"></i> <span id="likeResult'.$item['id'].'">';
	//like here
	$cmd = "select * from likes where questionsid =".$value['id']." and commentid =".$item['id'];
    echo $d->dataCount($cmd);

	echo'</span></a>
	<a href="" style="font-size: 12px;color:gray;text-decoration: none;">'.date("F j, Y g:i a", strtotime($item['dates'])).'</a>
	</p>
	</div>';
  }

}//end if



	//end reply
	echo '</div>';


	echo '</div>';
   }

	?>


    </div>

	
</div>
<!--comment box end-->

<hr/>
</div>
<!--end qustion box-->

<?php
}
?>





<?php
//show qustion answer
$d = new DBContext();

$cmmdd = "select * from questions where coursecode = '".$url[1]."'";

for ($i=1; $i <= $d->dataCount($cmmdd) ; $i++) { 
	echo '<script type="text/javascript">
	$(document).ready(
	$("#qusBTN'.$i.'").on("click",function(){
		$("#ansBTN'.$i.'").slideDown();
	}),

	$("#cmtBTN'.$i.'").on("click",function(){
	$(this).hide();
	$("#hidecmtBTN'.$i.'").show();
	$("#anscmtBTN'.$i.'").slideDown();
	}),

	$("#hidecmtBTN'.$i.'").on("click",function(){
		$(this).hide();
		$("#cmtBTN'.$i.'").show();
		$("#anscmtBTN'.$i.'").slideUp();
	})

	);
</script>';
}
//end show qustion answer
?>


</div>
</div>

<?php include_once 'apps/public/footer.php';?>
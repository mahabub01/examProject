<?php
session_start();
header("Access-Control-Allow-Origin: *");
require_once 'config/appsConfig.php';
require_once 'middleware/Xss.php';
require_once 'middleware/Csrf.php';
$apps = new appsConfig();
appsConfig::loadLibaryClass();

	   $d = new DBContext();



	    $comment = $_GET['comment'];
    	$username = $_GET['username'];
        $questionsid = $_GET['questionsid'];
    	$reply = $_GET['reply'];
    	$data = ['comment'=>$comment,'username'=>$username,'questionid'=>$questionsid,'reply'=>$reply,'dates'=>date('y-m-d')];

        $sql = "insert into comments(comment,username,questionid,reply,dates) values('".$comment."','".$username."',".$questionsid.",".$reply.",".date('y-m-d').")";
    	
    	if($d->customAdd($sql)){

            $sql = "select * from comments where questionid =".$questionsid." order by id desc";
            foreach ($d->customGet($sql) as $key => $value) {
                ?>

    <?php
    $d = new DBContext();
    $sql = "select * from comments where questionid =".$value['id']." and reply is null order by id desc";
            foreach ($d->customGet($sql) as $key => $v) {
                echo '<div class="cmt-box">
    <p style="color:black"><b>'.$v['username'].'</b></p>
    <p>'.$v['comment'].'</p>';


    echo '<p><a href="javascript:void(0)" onclick="like('.$value['id'].','.$v['id'].')">Like</a> 
    <a href="javascript:void(0)" onclick="Reply('.$v['id'].')">Reply</a> ';



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
    }//end reply form 


 if($d->dataCount($ccc)){

    foreach ($d->customGet($ccc) as $key => $item) {
                echo '<div class="cmt-box" style="border-bottom:1px solid #FFFFFF;margin-bottom:10px;padding-top:0px">
    <p style="color:black"><b>'.$item['username'].'</b></p>
    <p>'.$item['comment'].'</p>';

    if(isset($_SESSION['username'])){
        echo '<p><a href="javascript:void(0)" onclick="like('.$value['id'].','.$item['id'].')">Like</a> 
    <a href="javascript:void(0)">Reply</a> ';
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


          

            <?php }

    	}else{
    		
    		print_r($d->Error);
            echo 'reply not added';
    	}







?>
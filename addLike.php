<?php
header("Access-Control-Allow-Origin: *");
require_once 'config/appsConfig.php';
require_once 'middleware/Xss.php';
require_once 'middleware/Csrf.php';
$apps = new appsConfig();
appsConfig::loadLibaryClass();

	   $d = new DBContext();

	    $comment = $_GET['commentid'];
    	$questionsid = $_GET['qusid'];
    	$data = ['commentid'=>$comment,'questionsid'=>$questionsid,'dates'=>date('y-m-d')];

    	
    	if($d->addData('likes',$data)){
        
            $questionsid = rtrim($questionsid,",");
    		$sql = "select * from likes where questionsid =".$questionsid." and commentid =".$comment;
            echo $d->dataCount($sql);
    		
    	}else{
    		
    		print_r($d->Error);
    	}








?>
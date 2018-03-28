




function addComment(qusid) {
	//alert(qusid);

	var comment = $("#comment"+qusid).val();
	var username = $("#username"+qusid).val();
	var questionsid = $("#questionsid"+qusid).val();
	//var data = document.getElementById("comment"+qusid).val;

	if(window.XMLHttpRequest)
		{
			xmlhttp = new XMLHttpRequest();
		}
		else
		{
			xmlhttp = new ActiveObject(Microsoft.XMLHTTP);
		}
		
		xmlhttp.onreadystatechange = function()
		{
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
				document.getElementById("commentResult").innerHTML = xmlhttp.responseText;
			}
		
		}
		
		xmlhttp.open("GET","http://localhost:8012/examFinal/addComment.php?comment="+comment+",&username= "+username+"&questionsid="+questionsid,true);
		xmlhttp.send();



}



function Reply(commentid) {
	$('#replyForm'+commentid).css('display','block');
	//$('#replyForm'+commentid).show();	
}








function addReply(qusid) {
	//alert(qusid);

	var comment = $("#commentReply"+qusid).val();
	var username = $("#usernameReply"+qusid).val();
	var questionsid = $("#questionsidReply"+qusid).val();

	comments = document.getElementById("commentReply"+qusid).value;

	//alert(qusid);
	//var data = document.getElementById("comment"+qusid).val;

	//alert(comment);
	//alert('your comment '+comment+"your id is:"+qusid+"username"+username+"questionsid :"+questionsid);

	if(window.XMLHttpRequest)
		{
			xmlhttp = new XMLHttpRequest();
		}
		else
		{
			xmlhttp = new ActiveObject(Microsoft.XMLHTTP);
		}
		
		xmlhttp.onreadystatechange = function()
		{
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
				document.getElementById("commentResult").innerHTML = xmlhttp.responseText;
			}
		
		}
		
		xmlhttp.open("GET","http://localhost:8012/examFinal/addReply.php?comment="+comment+",&username= "+username+"&questionsid="+questionsid+"&reply="+qusid,true);
		xmlhttp.send();



}









function like(qustionid,commentid) {
		if(window.XMLHttpRequest)
		{
			xmlhttp = new XMLHttpRequest();
		}
		else
		{
			xmlhttp = new ActiveObject(Microsoft.XMLHTTP);
		}
		
		xmlhttp.onreadystatechange = function()
		{
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
				document.getElementById("likeResult"+commentid).innerHTML = xmlhttp.responseText;
			}
		
		}
		
		xmlhttp.open("GET","http://localhost:8012/examFinal/addLike.php?qusid="+qustionid+",&commentid= "+commentid,true);
		xmlhttp.send();
}










/*
$(document).ready(
$(".viewbtn").on("click",function(){
	$(".ans-container").slideDown();
})


);


$(document).ready(
$("#cmtBTN1").on("click",function(){
	$(this).hide();
	$("#hidecmtBTN1").show();
	$("#anscmtBTN1").slideDown();
}),

$("#hidecmtBTN1").on("click",function(){
	$(this).hide();
	$("#cmtBTN1").show();
	$("#anscmtBTN1").slideUp();
})


);*/
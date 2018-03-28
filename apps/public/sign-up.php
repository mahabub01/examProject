
<?php include_once 'apps/public/header.php';?>


<div class="sign-up">
<div class="custom-container">

	<?php
	$name = "";
	$username = "";
	$password = "";
	$email = "";
	$mgs = "";
	
$db = new DBContext();
$input = new Validation();
if(isset($_POST['btn'])){
	$input->post('name')->isEmpty();
	$input->post('username')->isEmpty();
	$input->post('email')->isEmpty();
	$input->post('password')->isEmpty();

	$name = $input->values['name'];
	$email = $input->values['email'];
	$password = $input->values['password'];

	$savepass = password_hash($password, PASSWORD_BCRYPT, ['cost'=>12]);

	$username = $input->values['username'];

	$data = array('name'=>$name,'password'=>$savepass,'email'=>$email,'username'=>$username);

	if($input->submit()){
		if($db->addData("users",$data)){
			$mgs = '<div class="alert alert-success" role="alert">Wel done! your Registration completely successfully</div>';
				$name = "";
				$username = "";
				$password = "";
				$email = "";
		
		}else{
			$mgs ='<div class="alert alert-danger" role="alert">Error ! Username is not avaliable.</div>';
		}

	}else{
		print_r($input->errors);
	}


}

?>

<?php Csrf::csrf();?>

<form action=" " method="post">
	<div class="font-logo">
		<img src="<?php appsConfig::url('apps/images/finallogo.png')?>">
	</div>

<p class="lead" style="text-align: center;border-bottom:0.5px solid #D6DDEF;padding-bottom: 10px;padding-top: 20px;">Create your Account</p>


	<?php echo $mgs;?>

	<input type="text" name="name" placeholder="Enter Your Name" class="custom-form" value="<?php echo $name;?>">

	
	<input type="text" name="username" placeholder="Enter Your username" class="custom-form" value="<?php echo $username;?>">

	
	<input type="email" name="email" value="<?php echo $email;?>" placeholder="Enter Your email" class="custom-form">


	
	<input type="password" name="password" placeholder="Enter Your password" class="custom-form">
	<br>

	<input type="hidden" name="_token" value="<?php echo Csrf::_token();?>">

	<button type="submit" class="custom-btn btn-block" name="btn">SIGN UP</button><br>
	<p> Already hava a Account. <a href="<?php appsConfig::url('sign-in')?>">Login</a> your account.</p>


</form>



</div>

</div>




<?php include_once 'apps/public/footer.php';?>
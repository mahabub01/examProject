<div class="sign-up">
<div class="custom-container">

  <?php
  $username = "";
  $password = "";
  $mgs = "";
  
$db = new DBContext();
$input = new Validation();
if(isset($_POST['btn'])){

  $input->post('username')->isEmpty();
  $input->post('password')->isEmpty();


  $password = $input->values['password'];


  $username = $input->values['username'];



  if($input->submit()){
    if($db->Auth("admins",$username)){
      foreach ($db->Auth("admins",$username) as $value) {
        $userPassFromDB = $value['password'];
        if(password_verify ($password ,$userPassFromDB)){
          $_SESSION['username'] = $username;
          appsConfig::Redirect('panel.php');

        }else{
          $mgs ='<div class="alert alert-danger" role="alert">Error ! Password is not valid.</div>';
        }
      }
      

    }else{
      $mgs ='<div class="alert alert-danger" role="alert">Error ! Username is not valid.</div>';
    }


    /*if($db->addData("users",$data)){
      $mgs = '<div class="alert alert-success" role="alert">Wel done! your Registration completely successfully</div>';
        $name = "";
        $username = "";
        $password = "";
        $email = "";
    
    }else{
      $mgs ='<div class="alert alert-danger" role="alert">Error ! Username is not avaliable.</div>';
    }*/

  }else{
    print_r($input->errors);
  }


}

?>

<?php Csrf::csrf();?>


<form action="" method="post">
  <div class="font-logo">
    <img src="<?php appsConfig::url('apps/images/finallogo.png')?>">
  </div>
  <h3 style="text-align: center;border-bottom:0.5px solid #D6DDEF;padding-bottom: 10px;">Login your Account</h3>
    <hr>

    <?php echo $mgs;?>


  
  <input type="text" name="username" placeholder="Enter Your username" class="custom-form">




  
  <input type="password" name="password" placeholder="Enter Your password" class="custom-form">
  <br>
  <input type="hidden" name="_token" value="<?php echo Csrf::_token();?>">
  <button type="submit" name="btn" class="custom-btn btn-block">SIGN IN</button><br>
  <p> Do you have no account? Create your account. <a href="<?php appsConfig::url('sign-up')?>">Register</a></p>


</form>



</div>

</div>
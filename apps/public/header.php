<!--<nav>
 
  <div class="row">
    <div class="col-md-4 col-sm-4">
      <a href="<?php appsConfig::url('home')?>"><img src="<?php appsConfig::url('apps/images/logo (1).png')?>"></a>
    </div>

    <div class="col-md-4 col-sm-4">
      <ul>
        <li><a href="">All Exams</a></li>
        <li><a href="">Furom</a></li>
        <li><a href="">Blog</a></li>
        <li><a href="">Logout</a></li>
      </ul>
      
    </div>

    <div class="col-md-4 col-sm-4">
      <button class="custom-btn">SIGN UP</button>
    </div>


  </div>

</nav>-->
<div class="top-nav sticky-top">
  
<div class="custom-container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">

 <a href="<?php appsConfig::url('home')?>"><img src="<?php appsConfig::url('apps/images/logo (1).png')?>"></a>


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav" style="right:0px;position: relative;">
      <li class="nav-item">
        <a class="nav-link" href="<?php appsConfig::url('all-exams')?>">All Exams</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Forum</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Blog</a>
      </li>
      <li class="nav-item">
      <?php
      if(isset($_SESSION['Uname'])){
        echo '<a class="nav-link" href="'.appsConfig::link('logout').'">Logout</a>';
      }else{
        echo '<a class="nav-link" href="'.appsConfig::link('sign-in').'">Login</a>';
      }

      ?>
        
      </li>      
    </ul>  
  </div>
  <?php
  if(isset($_SESSION['Uname'])){
    echo '<a href="#"><button class="custom-btn">'.$_SESSION['Uname'].'</button></a>';
  }else{
    echo '<a href="'.appsConfig::link('sign-up').'"><button class="custom-btn">SIGN UP</button></a>';
  }

  ?>



</nav>

</div>

</div>
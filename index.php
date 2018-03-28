<?php
ob_start();
session_start();
require_once 'config/appsConfig.php';
require_once 'middleware/Xss.php';
require_once 'middleware/Csrf.php';
$apps = new appsConfig();
appsConfig::loadLibaryClass();
appsConfig::loadPageTitle();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo appsConfig::$pagetitle;?></title>
	<?php appsConfig::css('apps/css/bootstrap.css')?>
	<?php appsConfig::css('apps/css/style.css')?>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	<!--<script src="https://use.fontawesome.com/6c0b2c8d9a.js"></script>-->

	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<?php appsConfig::js('apps/js/myjsFile.js')?>
	<?php appsConfig::js('apps/js/jquery.js')?>
</head>
<body>




<?php
//include_once 'apps/public/header.php';
appsConfig::renderBody();
//include_once 'apps/public/footer.php';
?>







<?php appsConfig::js('apps/js/bootstrap.js')?>
<?php appsConfig::js('apps/js/proper.js')?>

</body>
</html>

<?php ob_end_flush();?>







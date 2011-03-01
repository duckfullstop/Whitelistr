<?php
include("../includes/config.php");

session_start();

if (isset($_POST['submit_pwd'])){
   $pass = md5(isset($_POST['passwd']) ? $_POST['passwd'] : '');
   if ($pass != $apw) {
      showForm("Wrong password");
      exit();     
   } else {
   		$_SESSION['is_admin'] = true;
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = 'admin.php';
		header("Location: http://$host$uri/$extra");
		exit();
	}
} else {
   showForm();
   exit();
}

function showForm($error="Whitelistr ACP"){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
                      "DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Whitelistr ACP: login</title>
<link type="text/css" rel="stylesheet" href="../includes/style.css" />
<link rel="shortcut icon" href="../favicon.ico" />
<script type="text/javascript" src="../includes/jquery.js"></script> <!-- Init jquery -->
<script type="text/javascript" src="../includes/scripting.js"></script>
</head>

<body>
  <?php echo $error; ?>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="pwd">
		<p>Password</p>
		<p><input name="passwd" type="password"/></p>
		<p><input type="submit" name="submit_pwd" value="Let me in!"/></p>
   </form>
</body>       
<?php   
}
?>

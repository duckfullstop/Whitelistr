<?php 
function newkey($max = 10){
      $chars = "abcdefghijklmnopqrstuvwxwz0123456789_";
      for($i = 0; $i < $max; $i++)
      {
         $rand_key = mt_rand(0, strlen($chars));
         $string  .= substr($chars, $rand_key, 1);
      }
      return str_shuffle($string);
}
function keyadd ($k) {
	$keyfile = fopen("../secure/keys.txt", 'a') or die("Error a01: failed to open keyfile for writing");
	fwrite($keyfile, $k."\n") or die("Error a02: failed to write keyfile");
	fclose($keyfile) or die("Error a03: failed to close keyfile");
	return 1;
}

include("../includes/config.php");
// error level (debug)
if ($errorlevel) { error_reporting(E_ALL); } else { error_reporting(0); }
error_reporting(E_ALL);
// look mommy, I can do sessions!
session_start();

if (!$_SESSION['is_admin']) {die("Not authenticated.");}
	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>KEYGEN: Whitelistr BETA</title>
<link type="text/css" rel="stylesheet" href="../includes/style.css" />
<link rel="shortcut icon" href="../favicon.ico" />
<script type="text/javascript" src="../includes/jquery.js"></script> <!-- Init jquery -->
<script type="text/javascript" src="../includes/scripting.js"></script>
</head>

<body>

<?php 
	$key = NewKey();
	if (keyadd($key)) {
		echo("Key sucessfully generated: ".$key);
	}
?>
</body>

</html>

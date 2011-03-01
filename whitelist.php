<!-- whitelistrBETA - whitelist.php - by luaduck 2011 - for closed distribution only -->
<?php
// timer
$mtime = microtime(); 
$mtime = explode(" ",$mtime); 
$mtime = $mtime[1] + $mtime[0]; 
$starttime = $mtime; 

// global functions
include_once 'includes/include.php';
require 'includes/config.php';
register_shutdown_function('emergendfile'); # don't try this at home, it's a horribly hacky way of doing it.

// error level (debug)
if ($errorlevel) { error_reporting(E_ALL); } else { error_reporting(0); }

// register variables we just got from index.php
$key = htmlspecialchars($_POST['key']);
$email = htmlspecialchars($_POST['email']);
$username = htmlspecialchars($_POST['username']);

// function registration
function sanitycheck ($sk, $su) {
	global $pulltab;
	if (!$pulltab) { die("<p>Error 09: read the readme!</p>"); } elseif (!$su or !$sk) { die("<p>Error 00: direct access not allowed / form not completed</p>"); } elseif (preg_match('/ /',$su)) { die("<p>Error 01: invalid username - no spaces allowed.</p>"); } else { return 1; }
}
function emailadd ($e) {
	if ($e) {
		global $securedir;
		$file = fopen($securedir."/emails.txt", 'a') or die("<p>Error 02: failed to open emails for writing</p>");
		fwrite($file, $e."\n") or die("<p>Error 03: failed to write email</p>");
		fclose($file) or die("<p>Error 04: failed to close emails</p>");
		return 1;
	} else { return 0; }
}
function useradd ($u) {
	global $securedir;
	$filewhite = fopen($securedir."/whitelist.txt", 'a') or die("<p>Error 05: failed to open whitelist for writing");
	fwrite($filewhite, $u."\n") or die("<p>Error 06: failed to write whitelist");
	fclose($filewhite) or die("<p>Error 07: failed to close whitelist");
	return 1;
}
function usekey ($k) {
	global $securedir;
	if(strpos(file_get_contents($securedir."/keys.txt"), $k) === false) { 
		die("<p>Error 08: invalid key</p>"); 
	} else { del_line_in_file($securedir."/keys.txt", $k); return 1; }
}

// end of initial PHP declaration, starting HTML render
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Whitelister: Whitelistr BETA</title>
<link type="text/css" rel="stylesheet" href="includes/style.css" />
<link rel="shortcut icon" href="favicon.ico" />
<script type="text/javascript" src="includes/jquery.js"></script> <!-- Init jquery -->
<script type="text/javascript" src="includes/scripting.js"></script>
</head>
<body>
<h1 id="logo"></h1>
<?php
if (sanitycheck($key, $username)) {
	echo("<p>Sanity check passed, beginning whitelist.</p>\n");
}
if (usekey($key)) {
	echo("<p>Key sucessfully redeemed, whitelisting.</p>\n");
}
if (useradd($username)) {
	echo("<p>Added \"".$username."\" to the whitelist successfully.</p>\n");
}
if (emailadd($email)) {
	echo("<p>Also added \"".$email."\" to the newsletter successfully.</p>\n");
	} else {
	echo("<p>No e-mail address provided, skipping newsletter registration.</p>\n");
}
$mtime = microtime(); 
$mtime = explode(" ",$mtime); 
$mtime = $mtime[1] + $mtime[0]; 
$endtime = $mtime; 
$totaltime = ($endtime - $starttime); 
echo("<p>Whitelisting completed sucessfully in ".$totaltime." seconds.</p>\n"); 
echo($whitestr);
$scriptcomplete = true
?>
<form><input type="button" value="Done: Go Back" onClick="history.go(-1);return true;"></form>
</body>
</html>
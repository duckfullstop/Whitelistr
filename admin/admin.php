<?php
	session_start();
	if (!$_SESSION['is_admin']) {
		die("Not authenticated.");
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>ADMIN: Whitelistr BETA</title>
<link type="text/css" rel="stylesheet" href="../includes/style.css" />
<link rel="shortcut icon" href="../favicon.ico" />
<script type="text/javascript" src="../includes/jquery.js"></script> <!-- Init jquery -->
<script type="text/javascript" src="../includes/scripting.js"></script>
</head>
<body>

Current whitelist:
<table cellpadding="0" cellspacing="0" style="width:500px;">
<tr>
<td><div style="overflow:auto; height:100px; width:500px">
<?php include("../secure/whitelist.txt"); ?>
</div></td>
</tr>
</table>

Current list of unredeemed keys:
<table cellpadding="0" cellspacing="0" style="width:500px;">
<tr>
<td><div style="overflow:auto; height:100px; width:500px">
<?php include("../secure/keys.txt"); ?>
</div></td>
</tr>
</table>

Current list of email addresses:
<table cellpadding="0" cellspacing="0" style="width:500px;">
<tr>
<td><div style="overflow:auto; height:100px; width:500px">
<?php include("../secure/emails.txt"); ?>
</div></td>
</tr>
</table>


<form action="keygen.php" method="post">
<p><input type="submit" value="Generate new key"/></p>
</form>
<form action="logout.php" method="post">
<p><input type="submit" value="Log me out"/></p>
</form>
</body>

</html>

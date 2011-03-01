<?php
# whitelistrBETA configuration file (config.php)
# by luaduck 2011 - for closed distribution only

# Directory configuration: if you change the directory names, change them here.
# includes is unmodifiable right now for a very good reason.
# DO NOT ADD A TRAILING FORWARDSLASH.
$securedir = "secure";
$admindir = "admin";

# Admin backend password (MD5 hash)
# PLEASE NOTE: This will not be the final password hashing schema
$apw = "5f4dcc3b5aa765d61d8327deb882cf99";

# Uncomment this line to confirm that you've read the readme regarding blocking access to certain files.
# If you haven't already done this, go and do it now!
# $pulltab = true;

# DEBUG: Enables PHP's inbuilt error reporting as well as some other debug information. Don't enable this in a public environment!
# Valid arguments: true, false
$errorreport = true;

# Insert a little description containing server IP(s), rules, and other stuff you want to show a user once they've been sucessfully added to the whitelist.
# HTML is fine. Keep it between the two EOD's.
$whitestr = <<<EOD
Server IP: <b>xx.xx.xx.xx</b><br/>
Rules: Hug creepers. Be merry. Have fun.<br/>
EOD;
?>
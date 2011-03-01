<?php
// this function will delete a line in a file
// if it equals the $text_to_delete parameter
// created by Rodger Benham from </dream.in.code>
function del_line_in_file($filename, $text_to_delete)
{
  // split the string up into an array
  $file_array = array();
	
  $file = fopen($filename, 'rt');
  if($file)
  {
    while(!feof($file))
    {
      $val = fgets($file);
      if(is_string($val))
        array_push($file_array, $val);
    }	
    fclose($file);
  }
	
  // delete from file
  for($i = 0; $i < count($file_array); $i++)
  {
    if(strstr($file_array[$i], $text_to_delete))
    {
      if($file_array[$i] == $text_to_delete . "\n") $file_array[$i] = '';
    }
  }
	
  // write it back to the file
  $file_write = fopen($filename, 'wt');	
  if($file_write)
  {
    fwrite($file_write, implode("", $file_array));
    fclose($file_write);
  }
}

// luaduck - this is horribly hacky and I should put a proper error catching system in later
function emergendfile() {
	global $scriptcomplete;
	if (!$scriptcomplete) {
		echo ("\n<form><input type=\"button\" value=\"Errors: Try Again\" onClick=\"history.go(-1);return true;\"> </form>\n</body>\n</html>");
	}
}

?>
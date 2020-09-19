<?php

	if(isset($_GET['file']))
	{
	    // Get parameters
	    $file = urldecode($_REQUEST["file"]); // Decode URL-encoded string
		
		header('Content-Description: File Transfer');
	    header('Content-Type: application/octet-stream');
	    header("Content-Transfer-Encoding: Binary");
	    header('Content-Disposition: attachment; filename="'.basename($file).'"');
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate');
	    header('Pragma: public');
	    flush(); // Flush system output buffer
	    readfile($file);
	    die();
	        
	}


?>
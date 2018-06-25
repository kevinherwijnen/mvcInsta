<h1>Index</h1>

<?php
	session_start();

	try {
		
	$aboutUs = new Userclass();
	$aboutUs->index_check();

	} catch (Exception $e) {
	    echo 'Caught exception: ',  $e->getMessage(), "\n";
	}

?>

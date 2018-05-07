<h1>Index</h1>

<!-- <?php
//$aboutUs=new Index();
//$totalArray=$aboutUs->userInfo();
//$data= $aboutUs->data();

//$teller=0;

//foreach ($totalArray as $key) {
	//echo $key[0]."<br>";
	//echo $key[1]."<br>";
	//echo $key[2]."<br><br>";
//}
?> -->

<?php
	session_start();

	try {
		
	$aboutUs = new Userclass();
	$aboutUs->index_check();

	} catch (Exception $e) {
	    echo 'Caught exception: ',  $e->getMessage(), "\n";
	}

?>

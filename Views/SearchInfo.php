<br>
<?php
	session_start();

	try {
		
		$aboutUs=new Userclass();
		//$totalArray=$aboutUs->get_fullname();
		//echo $session."<br>";
		$aboutUs->session_check($_SESSION['email']);
		// echo $_SESSION['email']."<br>";
		
		//echo $totalArray;

	} catch (Exception $e) {
	    echo 'Caught exception: ',  $e->getMessage(), "\n";
	}

	$searchInfo = new SearchInfo();

	$result = $searchInfo->sInfo();

	$result2 = $searchInfo->sInfoPhoto();
?>

<div class="container-fluid">
		<div class="col-md-2 " style="margin-bottom: 10px; padding-left: 0px;">
			<img id='myImg' class="img-home" src='<?php echo $result[3]; ?>' alt='<?php echo $result[4]; ?>' style=' width: 100%;' height='209' />
		</div>
		<div class="col-md-10 bio-view" style="background-color:#5f4c4c">
			<b style="color:#7D6E6E;"><?php echo $result[4]; ?></b>

		</div>
		
</div>

 <hr> 
	
<div class="container-fluid">
		<?php echo $searchInfo->sPhoto(); ?>
</div>


<div id='myModal' class='modal'>
	<a href="" style="color: black">
		<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
		Go back
	</a>
<div class='col-md-12'> 
	<div class='col-md-12'> </div>
	<div class='col-md-8'><img class='modal-content' id='img01'></div>
	<div class='col-md-4'><div id='caption'></div> </div>

</div>
</div>


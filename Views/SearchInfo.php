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
		<div class="col-md-3 " style="margin-bottom: 10px; padding-left: 0px;">
			<img id='myImg' class="img-home borders" src='<?php echo $result[3]; ?>' alt='<?php echo $result[4]; ?>' style=' width: 100%;' height='250' />
		</div>
		<div class="col-md-9 bio-view borders" style="margin-top: 5px;">
			<b  style="color:#7D6E6E;"><?php echo $result[4]; ?></b>

		</div>
		
</div>

 <hr> 

<div class="container-fluid">
	<div class='col-md-12'>

	<?php echo $searchInfo->sPhoto(); ?>
		
	</div>
</div>



<div class=" modal" id="my_modal">
	<div class="modal-dialog" style="width:80%;">

		<div class="container-fluid modal-content model-background borders">
			<div class="modal-header">
				<button class="close" type="hidden"></button>
				<button type="button" class="btn btn-default" data-dismiss="modal" style="float:right">
					<span aria-hidden="true" style="color:black;">&times;</span>
				</button>
				<h4 class="modal-title">Modal header</h4>
			</div>
				<div class="col-md-12 "><div class=' col-md-6  div-home-model padding-t-b-1'>
						<img id="myImage" class ="img-responsive img-home-model borders padding-t-b-1" src="" alt="Smiley face">
					</div>
					<div class="col-md-6 padding-t-b-1" id="Description">
				       <span></span>
					</div>
				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>



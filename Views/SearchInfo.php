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

<nav class="main-nav navbar-default navbar-fixed-top navbar-inverse" role="navigation" >
  <div class="container-fluid">
  <ul class="nav navbar-nav col-md-12">
 <li class="nav-item col-md-2 col-md-offset-10" style="float:right;"><a class="page-scroll" style="text-align: center" href=""><span class="glyphicon " aria-hidden="true"></span></a></li>
    </li>
   
  </ul>
  </div>
</nav>

<div class="container-fluid">
		<div class="col-md-3 " style="height:251px; margin-bottom: 10px; ">
			<img id='myImg'  href="#myModal1" 
					 data-toggle="modal" class="img-responsive img-home img-style borders" 
					  src='<?php echo $result[3]; ?>' alt='<?php echo $result[4]; ?>' style=' width: 100%;' height='250'  data-route-id="<?php echo $result[3];?>"/>
		</div>
		<div class="col-md-9 bio-view borders mobile_margin " style="margin-top: 5px;background-color: #993e3d;">
			<div class="" style="width:100%;height:100%;">
			<b  style="color:white; "><?php echo $result[4]; ?></b>
			</div>
		</div>
		
</div>








 <hr> 

<div class="container-fluid">
	

	<?php echo $searchInfo->sPhoto(); ?>
		
	
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



<!-- model for profile img'es -->
<div class=" modal" id="myModal1">
	<div class="modal-dialog" style="width:80%;">

		<div class="container-fluid modal-content model-background borders">
			<div class="modal-header">
				<button class="close" type="hidden"></button>
				<button type="button" class="btn btn-default" data-dismiss="modal" style="float:right">
					<span aria-hidden="true" style="color:black;">&times;</span>
				</button>
				<h4 class="modal-title">Modal header</h4>
			</div>
				<div class="col-md-12 "><div class=' col-md-12  div-home-model padding-t-b-1'>
						<img id="myProfileImage" class ="img-responsive img-home-model borders padding-t-b-1" src="" alt="Smiley face">
					</div>
					

				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<?php
session_start();

try {

	$aboutUs=new Userclass();
	
	$aboutUs->session_check($_SESSION['email']);
	

} catch (Exception $e) {
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}



	//als je deze functie doet dan voer je de upload_Image uit in Upload.php in de classes directory 
if (isset($_POST['submit'])) {
	$temp = new Upload();
	$location = "profile-image";// location where to image goes (map structure) if empty goes to first/ standard location
	$locationdb = "_profile";// location where to image goes (database) if empty goes to first/ standard location
	$description ="";
		// $fileToUpload = trim($_POST['fileToUpload']);
		//echo $_FILES['fileToUpload'];
	$temp->upload_Image($_FILES['fileToUpload'], $_POST['description'], $location, $locationdb);
	header("Location: persoon");
}


$display = new Display();
$profile = $display->indexProfile($_SESSION['user_id']);

?>

<nav class="main-nav navbar-default navbar-fixed-top navbar-inverse" role="navigation" >
	<div class="container-fluid">
		<ul class="nav navbar-nav col-md-12">
			<li class="nav-item col-md-2 col-md-offset-right-10 " style="float:left;">
				<p class="page-scroll" style="color: white;padding-top: 10px;">
					Herrie
				</p>
			</li>
		</ul>
	</div>
</nav>

<div class="container-fluid">
	<div class="col-md-12">
		<form action="" method="POST"	enctype="multipart/form-data">
			<div class="col-md-3 " style="height:251px; margin-bottom: 10px; ">
				<img id='myImg'  href="#myModal1" 
				data-toggle="modal" class="img-responsive img-home img-style borders" 
				data-route-id="<?php echo $profile[3];?>" src='<?php echo $profile[3]; ?>' alt='<?php echo $profile[4]; ?>' style=' width: 100%;height: 100%' height='250' />
			</div>
			<div class="col-md-9  ">
				<textarea class="bio-view borders " name="description" style="height:100%; padding:15px; background-color:#993e3d;margin-top: 5px; color:white;" ><?php echo htmlspecialchars(strip_tags($profile[4])); ?></textarea>
			</div>
			<div class="col-md-12 " style="width: 146px;margin: 5px 10px 5px 10px">
				<input type="submit" class="btn btn-block btn-success" value="upload" name="submit" >
			</div>
			<div class="col-md-4 " style="margin:  5px 10px 5px 10px">
				<input type="file" class="filestyle" data-input="false" data-classIcon="icon-plus"  name="fileToUpload" id="fileToUpload" onchange="readURL(this);" >
			</div>
			
		</form>
	</div>

	<div class="col-md-12">
		<div class="col-md-4">
			<!-- hier komt jouw profile image -->
		</div>
		<div class="col-md-8">
			<!-- hier komt je bio-->
		</div>
		<div class="col-md-12">
			<!-- een knop om je bio te updaten recht onderin-->
		</div>
	</div>

	<div class="col-md-12">
		<div class="col-md-4">
			<!-- hier komen al je images in drie rijen en als je er op klikt zie je de image met description en de functie om die te verwijderen -->
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


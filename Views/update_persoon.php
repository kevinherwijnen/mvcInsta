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

<div class="container">
	<div class="col-md-12">
		<form action="" method="POST"	enctype="multipart/form-data">
		<div class="col-md-4">
			<img id="myImg" src="<?php echo $profile[3]; ?>" alt="your image" style="width: 100%;" height="209" />
		</div>
		<div class="col-md-8" style="height: 209px; background-color: purple">
			<textarea name="description" style="height:100%" ><?php echo $profile[4]; ?></textarea>
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



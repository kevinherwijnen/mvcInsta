


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
		// $fileToUpload = trim($_POST['fileToUpload']);
		//echo $_FILES['fileToUpload'];
	$location = "";// extra location where to image goes (map structure) if empty goes to first/ standard location
	$locationdb = "";// extra location where to image goes (database)if empty goes to first/ standard location

	$temp->upload_Image($_FILES['fileToUpload'], $_POST['description'], $location,$locationdb);
}

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

<div class="container-fluid main" style="margin-top: 10%; margin-bottom: 15%;">
	<?php
$test=new Upload();
$test->random_num();
	?>
	<div class="col-md-10 col-md-offset-1 ">
		<form action="" method="POST"	enctype="multipart/form-data">
			<div class="col-md-3" >
				<img id="myImg" src="uploads\upload-empty.png" alt="your image" style="width: 100%;" height="209" />

			</div>
			<div class="col-md-9 ">
				<textarea name="description" rows="9" cols="100" class="form-control"></textarea>
			</div>

			<div class="col-md-4" style="float: right;">
				<div class="col-md-4 " style="margin:  5px 10px 5px 10px">
					<input type="file" class="filestyle" data-input="false" data-classIcon="icon-plus"  name="fileToUpload" id="fileToUpload" onchange="readURL(this);" required>
				</div>
				<div class="col-md-12 " style="width: 146px;margin: 5px 10px 5px 10px">
					<input type="submit" class="btn btn-block btn-success" value="upload" name="submit" >
				</div>
				
				
				
			</div>
			<!-- <div class="col-md-3">
				<input type="submit" value="upload" name="submit"> 
			</div> -->
		</form>
	</div>

</div>


<!-- The Modal -->
<div id="myModal" class="modal"><span class="close">&times;</span>
	<div class="col-md-12"> 
		<div class="col-md-12"> </div>
		<div class="col-md-8"><img class="modal-content" id="img01"> </div>
		<div class="col-md-4"><div id="caption"></div> </div>
	</div>
  
  
  
</div>

<script type="text/javascript">
    // zorgt er voor dat je de naam kan veranderen van upload image
    $(":file").filestyle();
</script>
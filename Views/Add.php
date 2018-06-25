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

		if($_POST['description'] >= 311) {
			echo "<h4 style='color: white;'>jij hebt je letter limiet van 100 letters overschreden</h4>";
		} else {
			$temp->upload_Image($_FILES['fileToUpload'], $_POST['description'], $location,$locationdb);
		}
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
				<div class="col-md-3" style="height:248px; margin-bottom: 10px; ">
					<img id="myImg"  href="#myModal" class="img-responsive img-home img-style borders" data-toggle="modal" src="uploads\upload-empty.png" alt="your image" style="width: 100%;" height="237" />

				</div>
				<div class="col-md-9 ">
					<textarea name="description" id="getLetterCount" rows="9" cols="100" class="form-control" style="height: 210px;margin-top: 5px;background-color: #993e3d; color:white;"></textarea>
				</div>

				<div class="col-md-6" style="float: right;">
					<div class="col-md-4" style="color: white; margin: 5px 10px 5px 10px;">
						<div id="letterCount">311</div>/ 311
					</div>
					<div class="col-md-3" style="margin: 5px 10px 5px 10px">
						<input type="file" class="filestyle" data-input="false" data-classIcon="icon-plus"  name="fileToUpload" id="fileToUpload" onchange="readURL(this);" required>
					</div>
					<div class="col-md-3" style="width: 146px;margin: 5px 10px 5px 10px">
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
<div class=" modal" id="myModal">
	<div class="modal-dialog" style="width:80%;">
		<div class="container-fluid modal-content model-background borders">
			<div class="modal-header">
				<button class="close" type="hidden"></button>
				<button type="button" class="btn btn-default" data-dismiss="modal" style="float:right">
					<span aria-hidden="true" style="color:black;">&times;</span>
				</button>
				<h4 class="modal-title">Modal header</h4>
			</div>
			<div class="col-md-12 ">
				<div class=' col-md-10  div-home-model padding-t-b-1'>
					<img class="modal-content img-responsive" id="img01" style="max-height: 500px;margin-left: auto;margin-right: auto;display: block;"> 
				</div>
			</div>
			<div class="modal-footer" >
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	    // zorgt er voor dat je de naam kan veranderen van upload image
	    $(":file").filestyle();
</script>
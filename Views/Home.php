
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

	// $likeCounter = new LikeCounter();

	// if (isset($_POST['insertLike'])) {
	// 	$insertLike = trim($_POST['insertLike']);
	// 	$getPhoto_id = trim($_POST['getPhoto_id']);

	// 	$likeCounter->insertLike($getPhoto_id, $insertLike);
	// }

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
	<div class="col-md-12 ">
		<?php
			$get_p = new Upload();
			$fotos = $get_p->show_foto();
			$id= 0;
			while($row = $fotos->fetch_assoc()) {
 			 $id++;
?>        
			<div class=' col-md-3  div-home '>
				<img class ="img-responsive img-home img-style" id="myImg<?php echo $id;?>"  alt="<?php echo $row['photo_description']; ?>"  src="<?php echo $row['photo_d'];?>">
						<input type="hidden" id="hiddenLike" value="<?php echo $row['like_counter']; ?>">
						<input type="hidden" name="getPhoto_id" id="getPhoto_id">
						<button id="myLike" type="submit" class="btn-success" name="insertLike" data-value="<?php echo $row['id']; ?>" onclick="setGetLike(this);" style="padding: 10px; border-radius: 5px;" value="<?php echo $row['like_counter']; ?>"><?php echo $row['like_counter']; ?></button>
			</div>
			<?php } ?>
		
	</div>
</div>

<input type="hidden" id="hiddenInput" value="<?php echo $_SESSION['user_id']; ?>">

<!-- <?php //echo $row['like_counter']; ?> -->

<p id="getAllp"></p>
<p id="getAllp2"></p>

<!-- 

onclick="GetInput(this);"
<img id="myImg" src="uploads\upload-empty.png" alt="your image" style="width: 100%;" height="209" /> -->
<!-- The Modal -->
  <div id="myModal" class="modal">
  	<a href="" style="color: black">
		<span class="glyphicon glyphicon-remove-circle close" aria-hidden="true"></span>
		Go back
	</a>
	<div class="col-md-12" style="height: 80%;"> 
		<div class="col-md-12"> </div>
		<div class="col-md-7" style="height: 100%;"><img class="modal-content" id="img01"> </div>
		<div class="col-md-4 col-md-offset1" style="height: 100%;">
			<p id="caption" style="background-color: black; width:100%; text-align:left;  height: 85%;padding-left: 12px;padding-right: 12px;">
			</p>
		</div>
	</div> 
</div>

<!-- <?php
	// header("Content-Type: application/json; charset=UTF-8");
	// $obj = json_decode($_POST["x"], false);

	// $conn = new mysqli("localhost", "root", "Lollig1", "mvc");
	// $result = $conn->query("UPDATE ".$obj->table."
							// SET 	like_counter = ".$obj->row." + 1
							// LIMIT ".$obj->limit);
	// $outp = array();
	// $outp = $result->fetch_all(MYSQLI_ASSOC);

	// echo json_encode($outp);
	// WHERE   id = ".$obj->row2."
?>

<?php
	//header("Content-Type: application/json; charset=UTF-8");
	//$obj = json_decode($_GET["x"], false);

	//$conn = new mysqli("localhost", "root", "Lollig1", "mvc");
	//$result = $conn->query("SELECT like_counter FROM ".$obj->table." LIMIT ".$obj->limit);
	//$outp = array();
	//$outp = $result->fetch_all(MYSQLI_ASSOC);

	//echo json_encode($outp);
?>

-->

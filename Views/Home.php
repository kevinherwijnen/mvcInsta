<!-- <h1>Home</h1> -->


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

	$LikeCounter = new LikeCounter();


	$test20 = $LikeCounter->getLikeAmount($_SESSION['user_id']);

	


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

 			 $LikeCounter2 = $LikeCounter->getLikeAmount($row['id']);

 			 // while($rrow = $LikeCounter2->fetch_assoc()) {
 			 // 	if ($rrow['user_id'] == $_SESSION['user_id']) {
 			 // 		echo "hallo";
 			 // 	} else {
 			 // 		echo "not hallo";
 			 // 	}
 			 // }

 			 // $test20 = $LikeCounter->getLikeAmount($_SESSION['user_id'], $row['id']);
?>        
			<div class=' col-md-2  div-home '>
				
				<img class ="img-responsive img-home img-style borders"    
					 alt="<?php echo $row['photo_description'] ?>"  
					 src="<?php echo $row['photo_d'];?>" 
					 href="#my_modal" 
					 data-toggle="modal" 
					 data-route-id="<?php echo $row['photo_d'];?>" 
					 data-description-id="<?php echo $row['photo_description'];?>"
				>		

				<input type="hidden" id="hiddenLike" value="<?php echo $row['like_counter']; ?>">
				<input type="hidden" name="getPhoto_id" id="getPhoto_id">
				<button id="myLike" type="submit" class="btn-success" name="insertLike" data-value="<?php echo $row['id']; ?>" onclick="setGetLike(this);" style="padding: 10px; border-radius: 5px;" value="<?php echo $row['like_counter']; ?>"><?php echo $row['like_counter']; ?></button>

				<input type="hidden" id="hiddenLike2" value="<?php echo $row['like_counter']; ?>">
				<input type="hidden" name="getPhoto_id2" id="getPhoto_id2">
				<button id="myLike2" type="submit" class="btn-danger" name="insertLike2" data-value="<?php echo $row['id']; ?>" onclick="setGetLike(this);" style="padding: 10px; border-radius: 5px;" value="<?php echo $row['like_counter']; ?>"><?php echo $row['like_counter']; ?></button> 

				<!-- <?php

						//while ($rrow = $test20->fetch_assoc()) {
						//	if ($rrow['user_id'] == $_SESSION['user_id']) {
						//		?>
								<input type="hidden" id="hiddenLike2" value="<?php //echo $row['like_counter']; ?>">
								<input type="hidden" name="getPhoto_id2" id="getPhoto_id2">
								<button id="myLike2" type="submit" class="btn-danger" name="insertLike2" data-value="<?php //echo $row['id']; ?>" onclick="setGetLike(this);" style="padding: 10px; border-radius: 5px;" value="<?php// echo $row['like_counter']; ?>"><?php// echo $row['like_counter']; ?></button>
								<?php
						//	} else if($rrow['user_id'] != $_SESSION['user_id']) {
								?>
								<input type="hidden" id="hiddenLike" value="<?php //echo $row['like_counter']; ?>">
								<input type="hidden" name="getPhoto_id" id="getPhoto_id">
								<button id="myLike" type="submit" class="btn-success" name="insertLike" data-value="<?php //echo $row['id']; ?>" onclick="setGetLike(this);" style="padding: 10px; border-radius: 5px;" value="<?php //echo $row['like_counter']; ?>"><?php// echo $row['like_counter']; ?></button>
								<?php
							//}
						//}

				?> -->

			</div>
			<?php } ?>
		
	</div>
</div>

<input type="hidden" id="hiddenInput" value="<?php echo $_SESSION['user_id']; ?>">

<!-- <?php //echo $row['like_counter']; ?> -->

<p id="getAllp"></p>
<p id="getAllp2"></p> 

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


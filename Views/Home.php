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
			<div class=' col-md-2  div-home '>
				
				<img class ="img-responsive img-home img-style borders"    
					 alt="<?php echo $row['photo_description'] ?>"  
					 src="<?php echo $row['photo_d'];?>" 
					 href="#my_modal" 
					 data-toggle="modal" 
					 data-route-id="<?php echo $row['photo_d'];?>" 
					 data-description-id="<?php echo $row['photo_description'];?>"
				>		

				<button id="myLike" type="submit" class="btn-success" name="insertLike" data-value="<?php echo $row['id']; ?>" data-id="<?php echo $_SESSION['user_id']; ?>" onclick="setGetLike(this);" style="padding: 10px; border-radius: 5px;" value="<?php echo $row['like_counter']; ?>"><?php echo $row['like_counter']; ?></button>

				<button id="myLike2" type="submit" class="btn-danger" name="insertLike2" data-value="<?php echo $row['id']; ?>" data-id="<?php echo $_SESSION['user_id']; ?>" onclick="setGetDislike(this);" style="padding: 10px; border-radius: 5px;" value="<?php echo $row['like_counter']; ?>"><?php echo $row['like_counter']; ?></button>  

			</div>
			<?php } ?>
		
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


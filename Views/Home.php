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

$LikeSession = new likeSession();
$ReactCheck = new ReactCheck();
$SearchInfo = new SearchInfo();

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
		$fotos2 = $get_p->show_foto();
			// $id= 0;
		while($row = $fotos->fetch_assoc()) {

			$LikeSession2 = $LikeSession->ActiveCheck($row['id']);
			echo "<input type='hidden' id='uP' value='".$row['id']."'>";
 			// $id++;
			$ReactCheck2 = $ReactCheck->UserReactCheck($row['id']);
			$SearchInfo2 = $SearchInfo->sLink($row['id']);

			
			?>        

			<div class=' col-md-2  div-home '>
				
				<img class ="img-responsive img-home img-style borders"   style="border-bottom: 0px solid #980000; border-bottom-right-radius: 0px;

				border-bottom-left-radius: 0px;" 
				alt="<?php echo $row['photo_description'] ?>"  
				src="<?php echo $row['photo_d'];?>" 
				href="#my_modal" 
				data-toggle="modal" 
				data-route-id="<?php echo $row['photo_d'];?>" 
				data-description-id="<?php echo $row['photo_description'];?>"
				data-photo-id="<?php echo $row['id'];?>"
				data-id="<?php echo $_SESSION['user_id']; ?>"
				<?php while($row3000 = $ReactCheck2->fetch_assoc()) { ?>
					data-reaction="<?php echo $row3000['comment']; 
					?>"
				<?php }	?>
				<?php while($row4000 = $SearchInfo2->fetch_assoc()) {?>
					data-user-post="<?php echo $row4000['username']; ?>"
					data-user-post-id="<?php echo $row4000['user_id']; ?>"
				<?php } ?>

				>

				<div class="col-md-12" style="padding-right: 0px;padding-left: 0px;border: 7px solid #980000;border-top: 0px solid #980000; border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;"> 

					<?php 
					$my_count = mysqli_num_rows($LikeSession2);
					if ($my_count >= 1) {
						while ($row2 = $LikeSession2->fetch_assoc()) {

							if ($row2['Active'] == 0) {

								?>
								<button 
								id="myLike" 
								type="submit" 
								class="btn-success btn-block" 
								name="insertLike" 
								data-value="<?php echo $row['id']; ?>" 
								data-id="<?php echo $_SESSION['user_id']; ?>" 
								onclick="setGetLike(this);" 
								style="padding: 10px; border-radius: 5px;" 
								value="<?php echo $row['like_counter']; ?>"
								>
								<?php echo $row['like_counter']; ?> like(s)
							</button>

							<?php
						} else if ($row2['Active'] == 1) {				
							?>

							<button 
							id="myLike2" 
							type="submit" 
							class="btn-danger btn-block" 
							name="insertLike2" 
							data-value="<?php echo $row['id']; ?>" 
							data-id="<?php echo $_SESSION['user_id']; ?>" 
							onclick="setGetDislike(this);" 
							style="padding: 10px; border-radius: 5px;" 
							value="<?php echo $row['like_counter']; ?>"
							>
							<?php echo $row['like_counter']; ?> like(s)
						</button>  

						<?php
					}
				}
			} else {
				?>
				<button 
				id="myLike" 
				type="submit" 
				class="btn-success btn-block" 
				name="insertLike" 
				data-value="<?php echo $row['id']; ?>" 
				data-id="<?php echo $_SESSION['user_id']; ?>" 
				onclick="setGetLike(this);" 
				style="padding: 10px; border-radius: 5px;" 
				value="<?php echo $row['like_counter']; ?>"> 
				<?php echo $row['like_counter']; ?> like(s)
			</button>
			<?php
		}
		?></div>



	</div>
	<?php 
} 
?>

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
				<h4 class="modal-title"><a style="cursor: pointer" id="userPost"></a></h4>
			</div>
			<div class="çontainer-fluid">
			<div class="col-md-12 ">
				<div class=' col-md-6  div-home-model padding-t-b-1'>
					<img id="myImage" class ="img-responsive img-home-model borders padding-t-b-1" src="" alt="Smiley face">
				</div>
				<div class="col-md-6 padding-t-b-1" id="Description" style="height: 210px;">
					<span></span>
				</div>
				<div class="col-md-6 padding-t-b-1" id="Description" style="height:100%;">
					<input type="hidden" id="getMyPhotoId">
					<input type="text" name="Reactions" style="padding: 5px; border-radius: 5px;" id="Reactions">
					<button type="submit" class="btn-primary" id="myReaction" style="padding: 5px; border-radius: 5px;" onclick="addReaction();"/>		Voeg reactie toe
					</button>
				<div style="">
					<p style="color: white;margin-top: 15px;border-bottom: 2.3px solid #ca1616;width: 96.5%;padding-bottom: 12px;margin-bottom:20px" id="demo2"></p>
					<p style="color: white;color: white;height: 190px;overflow: auto;" id="demo" ></p>
				</div>
			</div>
			</div>
			</div>
		</div>
		
	</div>
</div>


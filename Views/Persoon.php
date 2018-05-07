<br>
<?php
session_start();

try {

	$upload= new Upload();
	$aboutUs=new Userclass();
	$aboutUs->session_check($_SESSION['email']);

	$upload = new Upload();
	$aboutUs = new Userclass();
	$aboutUs->session_check($_SESSION['email']);
	$display = new Display();


} catch (Exception $e) {
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

 $profile = $display->indexProfile($_SESSION['user_id']);

 $test = $display->indexProfileAll($_SESSION['user_id']);

?>
<nav class="main-nav navbar-default navbar-fixed-top navbar-inverse" role="navigation" >
  <div class="container-fluid">
  <ul class="nav navbar-nav col-md-12">
 <li class="nav-item col-md-2 col-md-offset-10" style="float:right;"><a class="page-scroll" style="text-align: center" href="update_persoon"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></li>
    </li>
   
  </ul>
  </div>
</nav>

<!-- <div class="container-fluid" style="margin-top: -10px;">
<nav class="navbar navbar-default">
  <div class="container-fluid soft-edge" style="">
    <div class="navbar-header" style="float: right;">
      <a href="update_persoon" class="btn btn-block navbar-btn btn-success" style="width: 146px;"> Update</a>
    </div>
  </div>
</nav>
</div> -->



<div class="container-fluid">
		<div class="col-md-3 " style="margin-bottom: 10px; padding-left: 0px;">
			<img id='myImg' class="img-home borders" src='<?php echo $profile[3]; ?>' alt='<?php echo $profile[4]; ?>' style=' width: 100%;' height='250' />
		</div>
		<div class="col-md-9 bio-view borders" style="margin-top: 5px;background-color: #d4b6b6;">
			<b  style="color:#7D6E6E; "><?php echo $profile[4]; ?></b>

		</div>
		
</div>

 <hr> 

<div class="container-fluid">
	<div class="col-md-12 ">
		<?php
			$get_p = new Upload();
			$fotos = $get_p->show_foto();
			$id= 0;
			while($row = $test->fetch_assoc()) {
 			 $id++;
		?>        
			<div class=' col-md-3  div-home '>
				<img class ="img-responsive img-home img-style borders"    
					 alt="<?php echo $row['photo_description'] ?>"  
					 src="<?php echo $row['photo_d'];?>" 
					 href="#my_modal" 
					 data-toggle="modal" 
					 data-route-id="<?php echo $row['photo_d'];?>" 
					 data-description-id="<?php echo $row['photo_description'];?>"
				>		
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



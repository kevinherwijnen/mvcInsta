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
	$upload->delAllImg();


} catch (Exception $e) {
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

 $profile = $display->indexProfile($_SESSION['user_id']);

 $test = $display->indexProfileAll($_SESSION['user_id']);

if (isset($_POST['submitdel'])) {
		$temp = new Upload();
		
		$temp->delImg($_POST['route']);
	}

?>


<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.min.js"></script>



<nav class="main-nav navbar-default navbar-fixed-top navbar-inverse" role="navigation" >
  <div class="container-fluid">
  <ul class="nav navbar-nav col-md-12">
<li class="nav-item col-md-2 col-md-offset-9">
	<div id="dependent-box">
	<span >
		<input  form="deleteForm" type="submit" name="submit" class="form-control" value="delete selected" style="margin-top: 8px;width: 111px;padding: 0px;float: right;"> 
	</span></div>
</li>



 <li class="nav-item col-md-1 " style="float:right;"><a class="page-scroll" style="text-align: center" href="update_persoon"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></li>
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

<?php if($profile[3] != "") { ?>

<div class="container-fluid">
		<div class="col-md-3 " style="height:251px; margin-bottom: 10px; ">
			<img id='myImg'  href="#myModal1" 
			 data-toggle="modal" class="img-responsive img-home img-style borders" 
			 data-route-id="<?php echo $profile[3];?>" src='<?php echo $profile[3]; ?>' alt='<?php echo $profile[4]; ?>' style=' width: 100%;height:100%;' height='250' />
		</div>
		<div class="col-md-9 bio-view borders mobile_margin " style="margin-top: 5px;background-color: #993e3d;">
			<div class="" style="width:100%;height:100%;">
			<b style="color:white; "><?php echo $profile[4]; ?></b>
			</div>
		</div>
</div>

<?php } else { ?>

<div class="container-fluid">
		<div class="col-md-3 " style="height:251px; margin-bottom: 10px; ">
			<img id='myImg' href="#myModal1" 
			 data-toggle="modal" class="img-responsive img-home img-style borders" 
			 data-route-id="uploads/upload-empty.png" src='uploads/upload-empty.png' alt='je hebt nog geen profiel foto toegevoegd' style='width: 100%;height:100%;' height='250' />
		</div>
		<div class="col-md-9 bio-view borders mobile_margin " style="margin-top: 5px;background-color: #993e3d;">
			<div class="" style="width:100%;height:100%;">
			<b style="color:white; ">je hebt nog geen profiel descriptie toegevoegd</b>
			</div>
		</div>
</div>

<?php } ?>

 <hr> 

<div class="container-fluid">
	<div class="col-md-12 ">
		<form id="deleteForm" method='post' id='userform' action=''> 
		<?php
			$get_p = new Upload();
			$ReactCheck = new ReactCheck();
			$fotos = $get_p->show_foto();
			$id= 0;
			while($row = $test->fetch_assoc()) {
				$ReactCheck2 = $ReactCheck->UserReactCheck($row['id']);
 			 $id++;
		?>        
			<div class=' col-md-3 <?php echo $id ?> div-home ' style="height: 300px;margin-bottom: -10px;margin-top: -10px;">

				<input class="checker" type="checkbox" value="<?php echo $row['photo_d'];?>" name="checkbox[]" style="position: relative;margin-left: 10px;top: 30px;" />
				<img class ="img-responsive img-home img-style borders"    
					 alt="<?php echo $row['photo_description'] ?>"  
					 src="<?php echo $row['photo_d'];?>" 
					 href="#my_modal" 
					 data-toggle="modal" 
					 data-id ="<?php echo $id ?>" 
					 data-route-id="<?php echo $row['photo_d'];?>" 
					 data-description-id="<?php echo $row['photo_description'];?>"
					 data-photo-id="<?php echo $row['id'];?>"
				     data-id="<?php echo $_SESSION['user_id']; ?>"
					 <?php while($row3000 = $ReactCheck2->fetch_assoc()) { ?>
						data-reaction="<?php echo $row3000['comment']; 
						?>"
					 <?php 
				} 
				?>
				>		
			</div>
			<?php } ?>
		</form>
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
				<div class="col-md-12 ">
					<div class=' col-md-6  div-home-model padding-t-b-1'>
						<img id="myImage" class ="img-responsive img-home-model borders padding-t-b-1" src="" alt="Smiley face">
					</div>
					<div class="col-md-6 padding-t-b-1" id="Description">
				       <span></span>
					</div>
					<input type="hidden" id="getMyPhotoId">
				</div>
			<div class="modal-footer">
				<div class="col-md-12 ">
					<div class="col-md-6 " style="text-align: middle">
						<!-- hier komt het like systeem -->
					</div>
					<div class="col-md-6 ">
				<div style="float: right;">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>

				<div style="float: right;margin-right: 8px;">
				<form action="" method="POST"	enctype="multipart/form-data">
						<input type="hidden" data-input="false" data-classIcon="icon-plus"  name="route" id="routeLoc" value="">
						<input id="" type="submit" class="btn btn-success" value="Delete the post" name="submitdel" >
					</form>
				</div>
				</div>
			</div>
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


    

<script>
    window.onload = function() {
        var checkbox = $('.checker'); 
        var dependent = $('#dependent-box');
	    dependent.hide();
        checkbox.on('click', function(){
	        if ($('.checker:checked').length !== 0){
	           dependent.show();
	           
	        } else {
	            dependent.hide();
	           
	        }
        });
 
    }; 
</script>

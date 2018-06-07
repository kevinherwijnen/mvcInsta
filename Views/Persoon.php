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

<!-- Preloader -->
<script type="text/javascript">
    //<![CDATA[
        $(window).on('load', function() { // makes sure the whole site is loaded 
            $('#status').fadeOut(); // will first fade out the loading animation 
            $('#preloader').delay(70).fadeOut('slow'); // will fade out the white DIV that covers the website. 
            $('body').delay(70).css({'overflow':'visible'});
          })
    //]]>
</script>


<div id="preloader">
	<div id="status">&nbsp;</div>
</div>

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



<div class="container-fluid">
		<div class="col-md-3 " style="height:251px; margin-bottom: 10px; ">
			<img id='myImg'  href="#myModal1" 
					 data-toggle="modal" class="img-responsive img-home img-style borders" 
					 data-route-id="<?php echo $profile[3];?>" src='<?php echo $profile[3]; ?>' alt='<?php echo $profile[4]; ?>' style=' width: 100%;height:100%;' height='250' />
		</div>
		<div class="col-md-9 bio-view borders mobile_margin " style="margin-top: 5px;background-color: #993e3d;">
			<div class="" style="width:100%;height:100%;">
			<b  style="color:white; "><?php echo $profile[4]; ?></b>
			</div>
		</div>
		
</div>

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
			<div class=' col-md-3 <?php echo $id ?> div-home ' style="margin-bottom: -11px;margin-top: -11px;">
				

				<label style="position: relative;margin-left: 9px;top: 43px;background-color: #6f0104; color: white; padding: 0px 5px 0px 5px;border: 2.5px solid brown;" >
	<input class="checker" type="checkbox" value="<?php echo $row['photo_d'];?>" name="checkbox[]" style="padding"  />
				 <p style="float: right;padding-bottom: -5px;margin-bottom: -5px;margin-top: 2px;"> 
				 	<?php echo $upload->showLikes($row['photo_d']) ?> 
				 </p>
				</label>
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
	<div class="modal-dialog" style="width:90%;">
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
				<span>Voeg reactie toe:</span><br>
			
			<input type="hidden" id="getMyPhotoId">
			<input type="text" name="Reactions" style="padding: 5px; border-radius: 5px;" id="Reactions">
			<button type="submit" class="btn-primary" id="myReaction" style="padding: 5px; border-radius: 5px;" onclick="addReaction();"/>Comment</button>
			<div style="height: 50%;">
			<p style="color: white;" id="demo2"></p>
			<p style="color: white;color: white;height: 310px;overflow: auto;padding-top: 20px;" id="demo" ></p>
			</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

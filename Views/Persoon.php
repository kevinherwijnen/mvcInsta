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
		<div class="col-md-2 " style="margin-bottom: 10px; padding-left: 0px;">
			<img id='myImg' class="img-home" src='<?php echo $profile[3]; ?>' alt='<?php echo $profile[4]; ?>' style=' width: 100%;' height='209' />
		</div>
		<div class="col-md-10 bio-view" style="background-color:#5f4c4c">
			<b style="color:#7D6E6E;"><?php echo $profile[4]; ?></b>

		</div>
		
</div>

 <hr> 

<div class="container-fluid">
		<?php while ($row = $test->fetch_assoc()) { ?>
			<div class=' col-md-2  div-home '>
				<img class ="img-responsive img-home img-style" id="myImg"  alt="<?php echo $row['photo_description'] ?>"  src="<?php echo $row['photo_d'];?>">		
			</div>
		<?php } ?>
</div>

 <div id="myModal" class="modal"><span class="close">&times;</span><a href="" style="color: black">
		<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
		Go back
	</a>
	<div class="col-md-12" style="height: 80%;"> 
		<div class="col-md-12"> </div>
		<div class="col-md-7" style="height: 100%;"><img class="modal-content" id="img01"> </div>
		<div class="col-md-4 col-md-offset1" style="height: 100%;"><p id="caption" style="background-color: black; width:100%; text-align:left;  height: 85%;padding-left: 12px;padding-right: 12px;"></p> </div>
	</div> 
</div>




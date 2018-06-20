<br>
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

$searchInfo = new SearchInfo();

$result = $searchInfo->sInfo(); 

// $result2 = $searchInfo->sInfoPhoto();
?>

<nav class="main-nav navbar-default navbar-fixed-top navbar-inverse" role="navigation" >
    <div class="container-fluid">
        <ul class="nav navbar-nav col-md-12">
            <li class="nav-item col-md-2 col-md-offset-10" style="float:right;"><a class="page-scroll" style="text-align: center" href=""><span class="glyphicon " aria-hidden="true"></span></a></li>
        </li>

    </ul>
</div>
</nav>

<?php if ($result[3] != "") { ?>

<div class="container-fluid">
    <div class="col-md-3 " style="height:251px; margin-bottom: 10px; ">
        <img id='myImg'  href="#myModal1" 
        data-toggle="modal" class="img-responsive img-home img-style borders" 
        src='<?php echo $result[3]; ?>' alt='<?php echo $result[4]; ?>' style=' width: 100%; height:100%;' height='250'  data-route-id="<?php echo $result[3];?>"/>
    </div>
    <div class="col-md-9 bio-view borders mobile_margin " style="margin-top: 5px;background-color: #993e3d;">
        <div class="" style="width:100%;height:100%;">
            <b  style="color:white; "><?php echo $result[4]; ?></b>
        </div>
    </div>

</div>

<?php } else { ?>

<div class="container-fluid">
    <div class="col-md-3 " style="height:251px; margin-bottom: 10px; ">
        <img id='myImg'  href="#myModal1" 
        data-toggle="modal" class="img-responsive img-home img-style borders" 
        src='uploads/upload-empty.png' alt='deze gebruiker heeft geen profiel foto' style=' width: 100%; height:100%;' height='250'  data-route-id="uploads/upload-empty.png"/>
    </div>
    <div class="col-md-9 bio-view borders mobile_margin " style="margin-top: 5px;background-color: #993e3d;">
        <div class="" style="width:100%;height:100%;">
            <b style="color:white; ">deze gebruiker heeft geen profiel descriptie</b>
        </div>
    </div>

</div>

<?php } ?>


<hr style="margin-bottom: 20px;"> 

<div class="container-fluid">
    <div class="col-md-12 ">

        <!-- <?php //echo $searchInfo->sPhoto(); ?> -->

        <?php
        $ReactCheck = new ReactCheck();
        $get_p = new Upload();
        $fotos = $get_p->show_foto();
        $result3 = $searchInfo->sPhoto();
        ?>

        <?php
        $id = 0;
        while($row2 = $result3->fetch_assoc()) {
            while($row3 = $fotos->fetch_assoc()) {
                $ReactCheck2 = $ReactCheck->UserReactCheck($row3['id']);
                
;            }
            $id++;
            ?>

            <div class=' col-md-2  div-home '>


                <img class='img-responsive img-home img-style borders'  
                id='myImg'  
                style="border-bottom: 0px solid #980000;  border-bottom-right-radius: 0px;
                border-bottom-left-radius: 0px;"
                alt='<?php echo $row2['photo_description']; ?>'
                src='<?php echo $row2['photo_d']; ?>' 
                href='#my_modal'
                data-toggle='modal' 
                data-route-id='<?php echo $row2['photo_d']; ?>' 
                data-description-id='<?php echo $row2['photo_description']; ?>'
                data-photo-id='<?php echo $row2['id']; ?>'
                data-id='<?php echo $_SESSION['user_id']; ?>'
                />                    
                
                <div class="col-md-12" style="padding-right: 0px;padding-left: 0px;border: 7px solid #980000;border-top: 0px solid #980000; border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;"> 

                                <button 
                                <?php
									if($get_p->checkActive($row2['id']) == 1) {
								?>
									class="btn-block btn-danger"
								<?php
									} else {
								?>
									class="btn-block btn-success"
								<?php
									}
								?>
                                id= "image-<?php echo $row2['id']; ?>"
                                type="submit" 
                                name="insertLike"  
                                data-id="<?php echo $_SESSION['user_id']; ?>" 
                                data-value="<?php echo $row2['id']; ?>" 
                                onclick="setGetLike(this);" 
                                style="padding: 10px; border-radius: 5px; border-top-right-radius: 0px; border-top-left-radius: 0px;" 
                                value=""
                                >
                            <?php  $get_p->showUserLikes($row2['id']) ;?> like(s)
                            </button>
                    </div>
        
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
		</div>
		<div class="col-md-12 ">
			<div class=' col-md-6  div-home-model padding-t-b-1'>
				<img id="myImage" class ="img-responsive img-home-model borders padding-t-b-1" src="" alt="Smiley face">
			</div>
			<div class="col-md-6 ">
				<div class="col-md-12 padding-t-b-1" id="Description" style="height: 180px;">
					<span></span>
				</div>
				<div class="col-md-12 padding-t-b-1">
					<span>Voeg reactie toe:</span><br>

					<input type="hidden" id="getMyPhotoId">
					<input type="text" name="Reactions" style="padding: 5px; border-radius: 5px;" id="Reactions">
					<button type="submit" class="btn-primary" id="myReaction" style="padding: 5px; border-radius: 5px;" onclick="addReaction();"/>
						Comment
					</button>
				<div style="height: 50%; margin-top: : 24px;">
					<p style="color: white;" id="demo2">
						<hr style='width:100%; border-top: 2.3px solid #ca1616;float: unset;'></p>
						<p style="color: white;color: white;height: 200px;overflow: scroll;overflow-x: hidden;" id="demo" ></p>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
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


<?php

	session_start();

	try {
		
	$aboutUs = new Userclass();
	$aboutUs->session_check($_SESSION['email']);
	
	} catch (Exception $e) {
	    echo 'Caught exception: ',  $e->getMessage(), "\n";
	}

  	echo Engine::getSearch();

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

<?php if( $_GET["url"] == "login" || $_GET["url"] == "index.php" || $_GET["url"] == "register") { ?>

<?php } else { ?>

<nav class="main-nav navbar-default navbar-fixed-bottom navbar-inverse" role="navigation" >
  <div class="container-fluid">
  <ul class="nav navbar-nav col-md-12">
    <li class="nav-item col-md-2"><a class="page-scroll" style="text-align: center" href="home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
    <li class="nav-item col-md-2"><a class="page-scroll" style="text-align: center" href="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a></li>
    <li class="nav-item col-md-2"><a class="page-scroll" style="text-align: center" href="add"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></li>
    <li class="nav-item col-md-2"><a class="page-scroll" style="text-align: center" href="persoon"><span class=" glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
    <li class="nav-item col-md-1"><a class="page-scroll" style="text-align: center" href="logout?q=logout"><span class=" glyphicon glyphicon-off" aria-hidden="true"></span></a></li>

  </ul>
  </div>
</nav>

<?php } ?>
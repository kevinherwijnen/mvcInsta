<?php

Route::set('index.php', function(){
	//echo "about us";
	Index::CreateView('Index');
});

Route::set('home', function(){
	//echo "about us";
	Home::CreateView('Home');
});

Route::set('search', function(){
	//echo "contact us";
	Search::CreateView('Search');
});

Route::set('login', function(){
	//echo "contact us";
	Login::CreateView('Login');
});

Route::set('register', function(){
	//echo "contact us";
	Register::CreateView('Register');
});

Route::set('logout', function(){
	//echo "contact us";
	session_start();
	$_SESSION['login'] = FALSE;
	session_destroy();
	header("location:login");
});


Route::set('add', function() {
	Add::CreateView('Add');
});


Route::set('persoon', function() {
	Persoon::CreateView('Persoon');
});

Route::set('update_persoon', function() {
	Persoon::CreateView('update_persoon');
});

Route::set('search-info', function() {
	Add::CreateView('SearchInfo');
});

Route::set('foto-view', function() {
	FotoView::CreateView('FotoView');
});

?>



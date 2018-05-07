<?php
class Controller extends Database{



	public static function CreateView($viewName){
		//echo "view Created";
		require_once("./Views/$viewName.php");
		//static::doSomething();

	}
}

?>
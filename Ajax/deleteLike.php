<?php
	header("Content-Type: application/json; charset=UTF-8");
	$obj = json_decode($_POST["x"], false);

	$conn = new mysqli("localhost", "root", "Lollig1", "mvc");
	$result = $conn->query("DELETE FROM ".$obj->table." WHERE user_id = ". $obj->row ." AND photo_id = ". $obj->row2 ."");
	$outp = array();
	$outp = $result->fetch_all(MYSQLI_ASSOC);

	echo json_encode($outp);
?>
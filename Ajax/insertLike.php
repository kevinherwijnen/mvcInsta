<?php
	header("Content-Type: application/json; charset=UTF-8");
	$obj = json_decode($_POST["x"], false);

	$conn = new mysqli("localhost", "root", "Lollig1", "mvc");
	$result = $conn->query("INSERT INTO ".$obj->table." ( user_id, photo_id ) VALUES (". $obj->row .", ". $obj->row2 ." )");
	$outp = array();
	$outp = $result->fetch_all(MYSQLI_ASSOC);

	echo json_encode($outp);
?>
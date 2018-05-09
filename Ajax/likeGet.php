<?php
	header("Content-Type: application/json; charset=UTF-8");
	$obj = json_decode($_POST["x"], false);

	$conn = new mysqli("localhost", "root", "Lollig1", "mvc");
	$result = $conn->query("UPDATE ".$obj->table." 
							SET 	like_counter = ".$obj->row."
							WHERE id = ".$obj->row2."
							LIMIT ".$obj->limit);
	$outp = array();
	$outp = $result->fetch_all(MYSQLI_ASSOC);

	echo json_encode($outp);
?>

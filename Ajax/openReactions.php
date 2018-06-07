<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);

$conn = new mysqli("localhost", "root", "Lollig1", "mvc");

$result = $conn->query("SELECT comment
						FROM ".$obj->myTable."
						WHERE photo_id = ".$obj->myRow." ORDER BY id DESC
					   ");

$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>
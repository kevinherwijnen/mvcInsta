<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

$conn = new mysqli("localhost", "root", "Lollig1", "mvc");
$result = $conn->query("SELECT user_id
						FROM photo_liked
						WHERE user_id = ".$obj->table."
						AND photo_id = ".$obj->table2."
					    LIMIT ".$obj->limit);
$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>
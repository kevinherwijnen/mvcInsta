<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

$conn = new mysqli("localhost", "root", "Lollig1", "mvc");
$result = $conn->query("UPDATE upload_images SET like_counter = ".$obj->table." + 1
						WHERE id = ".$obj->photo_id."
						LIMIT ".$obj->limit);
$result2 = $conn->query("INSERT INTO photo_liked (user_id, photo_id) VALUES (".$obj->user_id.", ".$obj->photo_id.")");
$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);
$outp = $result2->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>
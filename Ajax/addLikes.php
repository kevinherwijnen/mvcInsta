<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

$conn = new mysqli("localhost", "root", "Lollig1", "mvc");
$result = $conn->query("UPDATE upload_images SET like_counter = ".$obj->table." + 1
						WHERE id = ".$obj->photo_id."
						LIMIT ".$obj->limit);
$sql = "SELECT Active
		FROM photo_liked 
		WHERE user_id = ".$obj->user_id."
		AND photo_id = ".$obj->photo_id."
	   ";

$result2 = $conn->query($sql);

$count_row = mysqli_num_rows($result2);

if ($count_row >= 1) {
	$result3 = $conn->query("UPDATE photo_liked SET Active = 1 WHERE user_id = ".$obj->user_id." AND photo_id = ".$obj->photo_id." ");
} else {
	$result3 = $conn->query("INSERT INTO photo_liked (user_id, photo_id, Active) VALUES (".$obj->user_id.", ".$obj->photo_id.", 1)");
}

$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);
$outp = $result3->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>
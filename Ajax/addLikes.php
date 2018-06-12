<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);


$conn = new mysqli("localhost", "root", "Lollig1", "mvc");


// checken of hij al geliked is en dan - 1 anders + 1
// delete like moet weg. ga je nu een endpoint van maken


$sql = "SELECT Active
		FROM photo_liked 
		WHERE user_id = ".$_SESSION['user_id']."
		AND photo_id = ".$obj->photo_id."
	   ";

$result2 = $conn->query($sql);



$count_row = mysqli_num_rows($result2);


if ($count_row >= 1) {

	$result3 = $conn->query("DELETE FROM `photo_liked` WHERE user_id = ".$_SESSION['user_id']." AND photo_id = ".$obj->photo_id);
} else {

	$result3 = $conn->query("INSERT INTO photo_liked (user_id, photo_id, Active) VALUES (".$_SESSION['user_id'].", ".$obj->photo_id.", 1)");
}





// returnen hoeveel likes er op deze foto zijn.
// echo json_encode('');

?>


<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

$conn = new mysqli("localhost", "root", "Lollig1", "mvc");
$result = $conn->query("INSERT INTO ".$obj->table." ( user_id, photo_id, comment )
						VALUES ( ".$_SESSION['user_id'].", ".$obj->row2.", '".$obj->row3."' )");

$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>
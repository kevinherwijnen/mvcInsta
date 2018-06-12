
<?php
header("Content-Type: application/json; charset=UTF-8");	

$conn = new mysqli("localhost", "root", "Lollig1", "mvc");



$images_ids = $conn->query("SELECT `id` FROM `upload_images` ");

$likes = array();
$photo_liked = array();


foreach($images_ids as $images_id){

	$result = $conn->query("SELECT COUNT(*) FROM photo_liked WHERE 	`photo_id` = " . $images_id['id'] . " AND `Active` = 1");
	$likes = $result->fetch_all(MYSQLI_ASSOC);

	$photo_liked[$images_id['id']] = $likes[0]['COUNT(*)'];
	
} 

echo json_encode($photo_liked);
?>

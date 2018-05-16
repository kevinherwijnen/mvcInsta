	<?php 
	class Upload extends Database {

		public function upload_Image($fileToUpload, $description, $extra_map, $locationdb) {
			$randomnummer= $this->random_num();
			$target_dir = "uploads/$extra_map/$randomnummer"  ;
			$target_file = $target_dir . basename($fileToUpload["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(empty($fileToUpload["tmp_name"])){} else{
				// Check if image file is a actual image or fake image
			if (isset($_POST["submit"])) {
				$check = getimagesize($fileToUpload["tmp_name"]);
				if ($check !== false) {
					//echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					echo '<div class="alert alert-danger" role="alert">File is not an image.
					</div>';


					$uploadOk = 0;
				}
			}

				// Check file size
			if ($fileToUpload["size"] > 50000000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}

				// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
				echo '<div class="alert alert-danger" role="alert">Sorry, only JPG, JPEG, PNG & GIF files are allowed.
			</div>';
			$uploadOk = 0;
		}
}
				// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
		} else {if(empty($fileToUpload["tmp_name"])){} else{
			if($extra_map == "profile-image") {
				$this->unlink($_SESSION['user_id']);
			};}
		}

if(empty($fileToUpload["tmp_name"])){
	$intodb= "upload_images".$locationdb ;
	$sql2 = "UPDATE `$intodb` SET photo_description ='".$description."' WHERE user_id = '".$_SESSION['user_id']."' ";
	$this->mysqli->query($sql2);
			echo '<div class="alert alert-success" role="alert">
			The file '. basename( $fileToUpload["name"]). ' has been uploaded.
			</div>' ;
			//echo $randomnummer."jp";

		} 
 else{
			if (move_uploaded_file($fileToUpload["tmp_name"], $target_file )) {

				$sql = "SELECT user_id FROM users
				WHERE email = '".$this->mysqli->real_escape_string($_SESSION['email'])."'";

				$result = $this->mysqli->query($sql);
				$row = $result->fetch_row();

				$intodb= "upload_images".$locationdb ;
				$sql2 = "INSERT INTO `$intodb` (user_id, photo_name, photo_d, photo_description, randomnum, like_counter)
				VALUES (
				'".$this->mysqli->real_escape_string($row[0])."',
				'".$this->mysqli->real_escape_string($fileToUpload['name'])."',
				'".$this->mysqli->real_escape_string($target_file)."',
				'".$this->mysqli->real_escape_string($description)."',
				'".$this->mysqli->real_escape_string($randomnummer)."',
				'".$this->mysqli->real_escape_string(0)."'
			)
			";

			$this->mysqli->query($sql2);
			echo '<div class="alert alert-success" role="alert">
			The file '. basename( $fileToUpload["name"]). ' has been uploaded.
			</div>' ;
			//echo $randomnummer."jp";

		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
	}


public function show_foto() {

	$sql = "SELECT photo_d, like_counter, id, photo_description FROM upload_images";

	$result = $this->mysqli->query($sql);

	return $result;

} 


public function random_num() {

	$sql="

	SELECT randomnum
	FROM (
	SELECT FLOOR(RAND() * 99999) AS randomnum 
	UNION
	SELECT FLOOR(RAND() * 99999) AS randomnum
	) AS randomnum
	WHERE `randomnum` NOT IN (SELECT randomnum FROM upload_images)
	LIMIT 1
	";

	$randomnum= mysqli_fetch_row($this->mysqli->query($sql));
	return $randomnum[0];
//echo $randomnum[0];
}

public function unlink($user_id) {

	$sql="SELECT photo_d FROM `upload_images_profile` WHERE `user_id` = $user_id ";

	$path= mysqli_fetch_row($this->mysqli->query($sql));
// return $path[0];
	unlink($path[0]);
//echo $this->mysqli->query($randomnum);

	$sql2 = "DELETE FROM upload_images_profile WHERE `user_id` = $user_id ";
	$this->mysqli->query($sql2);
}

public function delImg($route) {

	
//echo $this->mysqli->query($randomnum);

	$sql2 = "DELETE FROM upload_images WHERE `photo_d` = '$route'";
	unlink($route);
	$this->mysqli->query($sql2);

	//header("location:persoon");
}


}
?>


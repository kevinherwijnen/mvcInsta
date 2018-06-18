<?php

	class SearchInfo extends Database {

		public function sInfo() {

			$user_id = $_GET['id'];

			$sql = "SELECT *
					FROM upload_images_profile
					WHERE user_id = '". $this->mysqli->real_escape_string($user_id) ."' 
				   ";

			$result = $this->mysqli->query($sql);

			$result2 = mysqli_fetch_row($result);

			return $result2;

		}

		public function sInfoPhoto() {

			$user_id = $_GET['id'];

			$sql = "SELECT *
					FROM upload_images_profile
					WHERE user_id = '". $this->mysqli->real_escape_string($user_id) ."' 
				   ";

			$result = $this->mysqli->query($sql);

			$result2 = mysqli_fetch_row($result);

			return $result2;
		}

		public function sPhoto() {

			$user_id = $_GET['id'];

			$sql2 = "SELECT *
					 FROM upload_images
					 WHERE user_id = '". $this->mysqli->real_escape_string($user_id) ."'
					";

			$result2 = $this->mysqli->query($sql2);

			return $result2;
			 
		}

		public function sLink($photo_id) {

			$sql = "SELECT users.username username,
						   upload_images.user_id user_id
					FROM   upload_images
					INNER JOIN users
					ON upload_images.user_id = users.user_id
					WHERE upload_images.id = ".$this->mysqli->real_escape_string($photo_id)."
				   ";

			$result = $this->mysqli->query($sql);

			return $result;		

		}

	}
	
?>
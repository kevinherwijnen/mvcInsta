<?php

	class Display extends Database {

		public function indexProfile($user_id) {

			$sql = "SELECT *
					FROM upload_images_profile   
					WHERE user_id = '". $this->mysqli->real_escape_string($user_id) ."'
				   ";

			$result = $this->mysqli->query($sql);

			$profile = mysqli_fetch_row($result);

			return $profile;

		}

		public function indexProfileAll($user_id) {
			
			$sql = "SELECT *
					FROM upload_images
					WHERE user_id = '". $this->mysqli->real_escape_string($user_id) ."'
				   ";

			$result = $this->mysqli->query($sql);

			return $result;
		}

	}

?>
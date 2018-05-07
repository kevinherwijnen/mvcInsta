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

			$id = 0;
			while($row2 = $result2->fetch_assoc()) {
				$id++;
				echo "
					<div class=' col-md-2  div-home '>
				<img class ='img-responsive img-home img-style' id='myImg'  alt=". $row2['photo_description']. "  src=". $row2['photo_d'] .">		
			</div>
				";
			}
			 
		}

	}
	
?>
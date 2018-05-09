<?php

	class LikeCounter extends Database {

		// public function getLikeAmount($user_id, $photo_id) {

		// 	$sql = "SELECT user_id, photo_id
		// 			FROM photo_liked
		// 			WHERE photo_id = '".$this->mysqli->real_escape_string($photo_id)."' 
		// 			GROUP BY user_id
		// 		   ";

		// 	$result = $this->mysqli->query($sql);			

		// 	return $result;
		// }

		public function getLikeAmount($photo_id) {

			$sql = "SELECT user_id
					FROM photo_liked
					WHERE photo_id = '". $this->mysqli->real_escape_string($photo_id) ."'
				   ";

			$result = $this->mysqli->query($sql);

			return $result;

		}

	}

?>
<?php

	class LikeCounter extends Database {

		public function getLikeAmount($user_id) {

			$sql = "SELECT photo_id
					FROM photo_liked
					WHERE user_id = '".$this->mysqli->real_escape_string($user_id)."'
				   ";

			$result = $this->mysqli->query($sql);			

			return $result;
		}

	}

?>
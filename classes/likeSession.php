<?php
	class likeSession extends Database {
		public function ActiveCheck($photo_id) {
			$sql = "SELECT Active, user_id
					FROM photo_liked
					WHERE user_id = ".$_SESSION['user_id']."
					AND photo_id = ".$photo_id." 
				   ";
								  
			$result = $this->mysqli->query($sql);

			return $result;
		}
	}
?>
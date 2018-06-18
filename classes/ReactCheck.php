<?php

	class ReactCheck extends Database {

		public function UserReactCheck($photo_id) {

			$sql = "SELECT comment
					FROM addreaction
					WHERE photo_id = ".$this->mysqli->real_escape_string($photo_id)."
				   ";

			$result = $this->mysqli->query($sql);

			return $result;

		}

	}

?>
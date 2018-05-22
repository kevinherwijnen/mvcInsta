<?php
class Users extends Database{
        	public function select(){
                        $myQuery = "SELECT * FROM users";
                        $results = mysqli_query($this->mysqli, $myQuery);
                        return $results;
                }

                public static function count_row(){
                        $myQuery = "SELECT COUNT(*) FROM users";
                        $results = mysqli_query($this->mysqli, $myQuery);
                        return $results;
                }
	}
?>
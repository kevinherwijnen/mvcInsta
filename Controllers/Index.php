<?php
class Index extends Controller{
	
	public $data;
	 public $totalArray;
	 public $test;



//dit moet nog verplaatst worden

			public function userInfo(){
					$db = new Users();
					$this->data = $db->select();
					//$this->datas=$data;
					
					$totalArray = array();
					$teller=0;

				    while($rows = mysqli_fetch_assoc($this->data)){
				    	$temparray = array($rows['user_id'], $rows['username'],$rows['email']);
						array_push($totalArray,$temparray);
						$teller+=1;
			    }
			     return $totalArray;

			}





			public function data(){
					return $this->data;

				}

	}

?>
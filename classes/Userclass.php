<?php



	class Userclass extends Database{

		

		/*** for registration process ***/
		public function reg_user($name,$username,$password,$email){

			$password = md5($password);
			$sql="SELECT * FROM users WHERE username='$username' OR email='$email'";

			//checking if the username or email is available in db
			$check =  $this->mysqli->query($sql) ;
			$count_row = $check->num_rows;
			$bio=" ";
			
			//if the username is not in db then insert to the table
			if ($count_row == 0){
				$sql1="INSERT INTO users SET username='$username', password='$password', name='$name', email='$email', bio='$bio'";
				$result = mysqli_query($this->mysqli,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result;
			}
			else { return false;}
		}

		/*** for login process ***/
		public function check_login($emailusername, $password){

        	$password = $password;
        	$password = md5($password);

			$sql2="SELECT * from users WHERE email='$emailusername' or username='$emailusername' and password='$password'";

			//checking if the username is available in the table
        	$result = mysqli_query($this->mysqli,$sql2);
        	$user_data = mysqli_fetch_assoc($result);
        	$count_row = $result->num_rows;

	        if ($count_row == 1) {
	            // this login var will use for the session thing
	            $_SESSION['login'] = true;
	            $_SESSION['user_id'] = $user_data['user_id'];
	            $_SESSION['email'] = $user_data['email'];

	      		//$_SESSION['user_name'] = $result->firstName;  //you have change the field name 
   				// header('Location: '. $location . '');        //dit is opzich niet nodig link al in de html
	           
	            return true;
	        }
	        else{
			    return false;
			}
    	}

    	/*** for showing the username or fullname ***/
    	public function get_fullname($uid){
    		$sql3="SELECT * FROM users WHERE uid = $uid";
	        $result = mysqli_query($this->mysqli,$sql3);
	        $user_data = mysqli_fetch_array($result);
	        echo $user_data['fullname'];
    	}

    	public function session_check($ses) {
	   		if (isset($_SESSION['login']) == 1) {
	   			//echo "<h4>".$ses ."</h4><br>";
	   		} else if (isset($_SESSION['login']) != 1) {
	   			header("location: login");
	   		}
	   	}

	   	public function index_check() {
	   		if (isset($_SESSION['login']) == 1) {
				header("location: home");
			} else if (isset($_SESSION['login']) != 1) {
				header("location: login");
			}
	   	}


    	/*** starting the session ***/
	    public function get_session(){
	        return $_SESSION['login'];
	    }


	    

	}

?>
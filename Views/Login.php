<?php
session_start();
$user=new Userclass();

if (isset($_REQUEST['submit'])) {
	extract($_REQUEST);
	$login = $user->check_login($emailusername, $password);
	if ($login) {
		        // Registration Success
		header("location:home");
	} else {
		        // Registration Failed
		echo 'Wrong username or password';
	}
}
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style><!--
#container{width:400px; margin: 0 auto;}

.wrapper {
    position: relative;
    height: 100vh;
}

.jumbotron {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

@media screen and (min-width: 0px) and (max-width: 724px) {
  #my-col { display: block; }  /* show it on small screens */
  #my-jumbo { display: none; }
}

@media screen and (min-width: 724px) and (max-width: 4000px) {
  #my-col { display: none; }   /* hide it elsewhere */
  #my-jumbo { display: block; }
}

--></style>

<script type="text/javascript" language="javascript">
	function submitlogin() {
		var form = document.login;
		if(form.emailusername.value == ""){
			alert( "Enter email or username." );
			return false;
		}
		else if(form.password.value == ""){
			alert( "Enter password." );
			return false;
		}
	}
</script>
<div class="wrapper">

<div id="my-jumbo">
<div class="jumbotron" >
	
		<span style="font-family: 'Verdana', Courier, monospace; font-size: 13px; font-style: normal; line-height: 1.5;">
			<div id="container-fluid">
				<div id="col-md-12">


			<h1>Login Here</h1>

			<form action="" method="post" name="login">
				<table>
					<tbody>
						<tr>
							<th><p>UserName or Email:  &nbsp</p></th>
							<td><input type="text" name="emailusername" required="" /></td>
						</tr>
						<tr>
							<th>Password:</th>
							<td><input type="password" name="password" required="" /></td>
						</tr>
						<tr>
							<td></td>
							<td><input onclick="return(submitlogin());" type="submit" name="submit" value="Login" /></td>
						</tr>
						<tr>
							<td></td>
							<td><a href="register">Register new user</a></td>
						</tr>
					</tbody>
				</table>
			</form>
		</div></div>
	</span>

</div>
</div>



<!-- mobile version -->
<div id="my-col" style="margin-top: 20%;">
	
		<span style="font-family: 'Verdana', Courier, monospace; font-size: 13px; font-style: normal; line-height: 1.5;">
			
				<div id="col-md-12" >


			<h1>Login Here</h1>

			<form action="" method="post" name="login">
				<table>
					<tbody>
						<tr>
							<th><p>UserName or Email:  &nbsp</p></th>
							<td><input type="text" name="emailusername" required="" /></td>
						</tr>
						<tr>
							<th>Password:</th><br>
							<td><input type="password" name="password" required="" /></td>
						</tr>
						<tr>
							<td></td>
							<td><input onclick="return(submitlogin());" type="submit" name="submit" value="Login" /></td><br>
						</tr>
						<tr>
							<td></td>
							<td><a href="register">Register new user</a></td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</span>

</div>
</div>
</div>
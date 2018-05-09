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
<body style="padding: 0px">


<div class="wrapper">

<div id="my-jumbo">
<div class="jumbotron " >
	
		<span style="font-family: 'Verdana', Courier, monospace; font-size: 13px; font-style: normal; line-height: 1.5;">
			<div id="container-fluid">
				<div id="col-md-12">


			<h1 class="jumbotronHeadText">Login Here</h1>

			<form id="black" action="" method="post" name="login">
				<table>
					<tbody>
						<tr>
							<th><p class="jumbotronText">UserName or Email:  &nbsp<br></p></th>
							<td class="inputstyle"><input type="text" name="emailusername" required="" /></td>
						</tr>
						<tr>
							<th><p class="jumbotronText">Password:</p></th>
							<td class="inputstyle"><input type="password" name="password" required="" /></td>
						</tr>
						<tr>
							<td></td>
							<td class="inputstyle"><input onclick="return(submitlogin());" type="submit" name="submit" value="Login" /></td>
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

</div>
</div>

</body>

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
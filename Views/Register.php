<?php
session_start();
$user=new Userclass();



if (isset($_REQUEST['submit'])){

	extract($_REQUEST);

	$register = $user->reg_user($fullname, $uname,$upass, $uemail);

	if ($register) {

	 // Registration Success

		echo 'Registration successful <a href="login">Click here</a> to login';

	} else {

	 // Registration Failed

		echo 'Registration failed. Email or Username already exists please try again';

	}

}

?>





<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />



Register

<style><!--

#container{width:400px; margin: 0 auto;}

--></style>



<script type="text/javascript" language="javascript">

	function submitreg() {

		var form = document.reg;

		if(form.name.value == ""){

			alert( "Enter name." );

			return false;

		}

		else if(form.uname.value == ""){

			alert( "Enter username." );

			return false;

		}

		else if(form.upass.value == ""){

			alert( "Enter password." );

			return false;

		}

		else if(form.uemail.value == ""){

			alert( "Enter email." );

			return false;

		}

	}

</script>

<body style="padding: 0px">

	<div class="wrapper">

		<div id="my-jumbo">
			<div class="jumbotron " >

				<span style="font-family: 'Verdana', Courier, monospace; font-size: 13px; font-style: normal; line-height: 1.5;">
					<div id="container-fluid">
						<div id="col-md-12">

							<h1 class="jumbotronHeadText">Registration Here</h1>

							<form action="" method="post" name="reg">
								<table>
									<tbody>
										<tr>
											<th><p class="jumbotronText">Full Name:<br></p></th>
											<td class="inputstyle"><input type="text" name="fullname" required="" /></td>
										</tr>
										<tr>
											<th><p class="jumbotronText">User Name:</p></th>
											<td class="inputstyle"><input type="text" name="uname" required="" /></td>
										</tr>
										<tr>
											<th><p class="jumbotronText">Email:</p></th>
											<td class="inputstyle"><input type="text" name="uemail" required="" /></td>
										</tr>
										<tr>
											<th><p class="jumbotronText">Password:</p></th>
											<td class="inputstyle"><input type="password" name="upass" required="" /></td>
										</tr>
										<tr>
											<td></td>
											<td class="inputstyle"><input onclick="return(submitreg());" type="submit" name="submit" value="Register" /></td>
										</tr>
										<tr>
											<td></td>
											<td><a href="login">Already registered! Click Here!</a></td>
										</tr>
									</tbody>
								</table>
							</form>
						</div>
					</div>
				</span>
			</div>
		</div>
	</div>
</body>
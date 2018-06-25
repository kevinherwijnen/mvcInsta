<?php
session_start();
$user=new Userclass();


if (isset($_REQUEST['submit'])){

	extract($_REQUEST);

	$register = $user->reg_user($fullname, $uname,$upass, $uemail);

	if ($register) {

	 // Registration Success

		?>
		<div class="row" style="margin-bottom: -81.6px;">
			<div class="alert alert-success " style=" margin: 15px auto;width: 44%;" role="alert">
				Registration successful <a href="login">Click here</a> to login
			</div></div>
			<?php 

		} else {

	 // Registration Failed

			?> 
			<div class="row" style="margin-bottom: -81.6px;"><div class="alert alert-danger " style=" margin: 15px auto;width: 44%;" role="alert">
				Registration failed. Email or Username already exists please try again 
			</div></div>
			<?php 

		}

	}

	?>

	<style type="text/css">
	body{ padding:0px; }
</style>

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

		header("Location: login");

	}

</script>
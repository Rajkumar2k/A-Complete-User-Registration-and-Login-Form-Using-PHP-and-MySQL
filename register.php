<?php 
ob_start();
include('header.php');
include_once("db_connect.php");
session_start();
if(isset($_SESSION['user_id'])) {
	header("Location: index.php");
}
$error = false;
if (isset($_POST['signup'])) {
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);	
	
	if (!preg_match("/^[a-zA-Z ]+$/",$fname)) {
		$error = true;
		$fname_error = "Name must contain only alphabets and space";
	}
	
	if (!preg_match("/^[a-zA-Z ]+$/",$lname)) {
		$error = true;
		$lname_error = "Name must contain only alphabets and space";
	}
	
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$uname_error = "Name must contain only alphabets and space";
	}
	
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please Enter Valid Email ID";
	}
	
	if(!preg_match("/^[0-9]+$/",$phonenumber)) {
		$error = true;
		$phonenumber = "Only on Numbers";
	}
	
	if(strlen($password) < 6) {
		$error = true;
		$password_error = "Password must be minimum of 6 characters";
	}
	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "Password and Confirm Password doesn't match";
	}
	if (!$error) {
		if(mysqli_query($conn, "INSERT INTO users(fname,lname,user, email,phonenumber, pass) VALUES('" . $fname . "', '" . $lname . "', '" . $name . "', '" . $email . "', '" . $phonenumber. "', '" . $password . "')")) {
			$success_message = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
		} else {
			$error_message = "Error in registering...Please try again later!";
		}
	}
}
?>
<title> Login and Registration </title>
<div class="container">
<h2><center>Login and Registration  with PHP, MySQL</center></h2>	<br>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					<legend><center>Sign Up</center></legend>

					<div class="form-group">
						<label for="name">First Name</label>
						<input type="text" name="fname" placeholder="Enter First Name" required value="<?php if($error) echo $fname; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($fname_error)) echo $uname_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name">Last Name</label>
						<input type="text" name="lname" placeholder="Enter Last Name" required value="<?php if($error) echo $lname; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($lname_error)) echo $uname_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name">User Name</label>
						<input type="text" name="name" placeholder="Enter  UserName" required value="<?php if($error) echo $name; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($uname_error)) echo $uname_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" placeholder="Email" required value="<?php if($error) echo $email; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name">Phone Number</label>
						<input type="number" name="phonenumber" placeholder="Enter Phone Number" required value="<?php if($error) echo $phonenumber; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($phonenumber_error)) echo $phonenumber_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Confirm Password</label>
						<input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
					</div>

					<div class="form-group">
						<input type="submit" name="signup" value="Sign Up" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-success"><?php if (isset($success_message)) { echo $success_message; } ?></span>
			<span class="text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		Already Registered? <a href="login.php">Login Here</a>
		</div>
	</div>	
</div>
</div>
</body></html>



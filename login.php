<?php 
ob_start();
include('header.php');
include_once("db_connect.php");
session_start();
if(isset($_SESSION['user_id'])!="") {
	header("Location: dashboard.php");
}
if (isset($_POST['login'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$result = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . $email. "' and pass = '" . $password. "'");
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['uid'];
		$_SESSION['user_name'] = $row['user'];		
		header("Location: index.php");
	} else {
		$error_message = "Incorrect Email or Password!!!";
	}
}
?>

<title>Login and Registration with PHP, MySQL</title>

<div class="container">
	<h2><center>Login and Registration  with PHP, MySQL</center></h2><br>		
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<fieldset>
					<legend><center>Login</center></legend>						
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" placeholder="Your Email" required class="form-control" />
					</div>	
					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Your Password" required class="form-control" />
					  <br><label>
						<input type="checkbox" name="rememberme" id="rememberme"> Remember me </label>
					</div>	
					<div class="form-group">
						<input type="submit" name="login" value="Login" class="btn btn-primary" onClick="IsRemember" />
					</div>
				</fieldset>
			</form>
			<span class="text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		New User? <a href="register.php">Sign Up Here</a>
		</div><br>
		<p align="center"><a href="reset_password.php" >Forget Password? </a></center></p>
	</div>	
</div>
</div>
<script>
const rmCheck = document.getElementById("rememberMe"),
    emailInput = document.getElementById("email");

if (localStorage.checkbox && localStorage.checkbox !== "") {
  rmCheck.setAttribute("checked", "checked");
  emailInput.value = localStorage.username;
} else {
  rmCheck.removeAttribute("checked");
  emailInput.value = "";
}

function lsRememberMe() {
  if (rmCheck.checked && emailInput.value !== "") {
    localStorage.username = emailInput.value;
    localStorage.checkbox = rmCheck.value;
  } else {
    localStorage.username = "";
    localStorage.checkbox = "";
  }
}</script>
</body></html>



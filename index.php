<?php 
session_start();
include('header.php');
include_once("db_connect.php");
?>
<title>Login and Registration with PHP, MySQL</title>
<head>
<style>
.container{
  max-width: 700px;
  width: 100%;
  background-color:#FFFFFF;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
}
.container .title{
  font-size: 25px;
  font-weight: 500;
  align: center;
  
}
.login  {
  background-color: #3176B2;
  border: none;
  color: white;
  padding: 10px 62px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 12px;
  border: 0px solid grey;
}


</style>
</head>


<div class="container">
	<h2>Login and Registration with PHP, MySQL</h2>	
	<br>
		<br>		
			<ul class="nav navbar-nav navbar-left">
				<?php if (isset($_SESSION['user_id'])) { ?>
				<li><p class="navbar-text"><strong>Welcome!</strong> You're signed in as <strong><?php echo $_SESSION['user_name']; ?></strong></p></li>
				<p>Id :<?php echo $_SESSION['user_id']; ?></p>
				<p>Firstname :<?php echo $_SESSION['fname']; ?></p>
				<p>Last Name :<?php echo $_SESSION['lname']; ?></p>
				<p>User Name :<?php echo $_SESSION['user_name']; ?></p>
				<p>Email Address :<?php echo $_SESSION['email']; ?></p>
				<p>Phone NUmber :<?php echo $_SESSION['phonenumber']; ?></p>
			    <p>Password :<?php echo $_SESSION['password']; ?></p>
				
				<br><center><a class="login" href="logout.php">Log Out</center></a>
				<?php } else { ?>
				<li><center><a class="login" href="login.php">Login</a><center></li>
				<li><center><a class="login" href="register.php">Sign Up</a><center></li>
				<?php } ?>
			</ul>
		</div>
	
		
</div>	
</div>
</body></html>

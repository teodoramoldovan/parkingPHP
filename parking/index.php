<?php 
	$connect = mysqli_connect("localhost", "root", "password", "parkingphp"); 
	session_start(); 
	if(isset($_POST["login"]))  {

	
		if(empty($_POST["username"]) && empty($_POST["password"]))  
		{  
			echo '<script>alert("You must enter username and password")</script>';  
		}  
		else
		{
	
			$username = mysqli_real_escape_string($connect, $_POST["username"]);  
			$password = mysqli_real_escape_string($connect, $_POST["password"]); 
			$password=md5($password);
	

	 
			$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
			$query2 = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";  
			
			$result=mysqli_query($connect,$query);
			$result2=mysqli_query($connect,$query2);
			if(mysqli_num_rows($result) > 0)  
			{ 
				$_SESSION['username'] = $username;  
                header("location:userHome.php"); 
			}
			else if(mysqli_num_rows($result2)>0){
				$_SESSION['username'] = $username;  
                header("location:adminHome.php");
			}
			else  
           {  
                echo '<script>alert("Wrong Username or Password")</script>';  
           }  
		}
	}
	 
 
 ?>  

<html>
<head>
	<title>ClujParking</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>


.form-signin {
    max-width: 420px;
    padding: 30px 38px 66px;
    margin: 0 auto;
    background-color: rgba(0,0,0,0.6);
    border: none;
}

.form-signin-heading {
    text-align:center;
	font-size: 25px;
    margin-bottom: 5px;
    color:rgb(142,167,248);
}

.form-control {
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    
}

input[type="text"] {
    margin-bottom: 0px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
    
}

input[type="password"] {
    margin-bottom: 30px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    
}
body {
    background-image: url("images/cluj.jpg");
    background-repeat: no-repeat;
    background-size:auto;
}
</style>
</head>
<body>
	<form action='registration.php' method="get">
		<button class="btn btn-md btn-warning btn-block" type="Submit">Go To Registration Page</button>
	</form>

<div class="container">

	
    <form method="post" class="form-signin">
		<img src="images/logoCPblue.png" class="img-responsive center-block" style="width:268px;height:179px" alt="Logo"/>
        <h3 class="form-signin-heading">Welcome!</h3>
        <br/>
		<label class="form-signin-heading">Username</label>
        <input type="text" name="username" class="form-control"/> <br/>
		<label class="form-signin-heading">Password</label>
        <input type="password" name="password" class="form-control"/> <br/>
		<input type="submit" name="login" value="Login" class="btn btn-lg btn-primary btn-block" style="background-color:rgb(142,167,248);color:black"/> <br/>

    </form>

</div>

</body>
</html>
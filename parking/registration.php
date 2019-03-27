 <?php  	
	if(isset($_POST["register"]))  {
		$connect = mysqli_connect("localhost", "root", "password", "parkingphp"); 
		session_start(); 
	
		if(empty($_POST["username"]) && empty($_POST["password"]))  
		{  
			echo '<script>alert("You must enter username and password")</script>';  
		}  
		else
		{
	
			$username = mysqli_real_escape_string($connect, $_POST["username"]);  
			$password = mysqli_real_escape_string($connect, $_POST["password"]); 
			$password=md5($password);
	

	 
			$query = "INSERT INTO users (username, password) VALUES('$username', '$password')";  
	 
			if(mysqli_query($connect, $query))  
			{ 
				echo '<script>alert("Registration Done")</script>';  
			}  
		}
	}
	 
 
 ?>  

<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body {
    background-image: url("images/cluj.jpg");
    background-repeat: no-repeat;
    background-size:auto;
}
</style>
</head>
<body>
<form action='index.php' method="post">
    <button class="btn btn-md btn-warning btn-block" type="Submit">Go To Login Page</button>

</form>

<div class="container">
	<img src="images/logoCPblue.png" class="img-responsive center-block" width="268" height="179" alt="Logo"/>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
                <h2 style="color:rgb(142,167,248)" align="center">Registration Form</h2>
   
                <div class="form-group">
                    
                        <input type="text" name="username" placeholder="Username"
                               class="form-control"/>
                  
                </div>
                <div class="form-group">
                    
                        <input type="password" name="password"
                               placeholder="Password" class="form-control"/> 
                    
                </div>

                <div class="form-group">
              
                        <button type="submit" name="register" class="btn btn-primary btn-block" style="background-color:rgb(142,167,248);color:black">Register User</button>

                </div>



            </form>
        </div>
    </div>
</div>

</body>
</html>
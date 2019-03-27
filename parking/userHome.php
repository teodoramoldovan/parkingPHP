<?php    
 session_start();  
 if(!isset($_SESSION["username"]))  
 {  
      header("location:index.php?action=login");  
 }  
 ?>  
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<title>ClujParking User</title>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: rgba(0,0,0,0.7);
}

li {
    float: center;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111111;
}
body {
    background-image: url("images/cluj.jpg");
    background-repeat: no-repeat;
    background-size:auto;
}

</style>
</head>
<body>

<h2 align="center"><img src="images/logoCPblue.png" width="268" height="179"></h2>
<?php  
                echo '<h1 style="color:rgb(142,167,248)">Welcome - '.$_SESSION["username"].'</h1>';   
?>  
<form action='logout.php' method="get">
        <button class="btn btn-md btn-danger btn-block" name="registration"
                type="Submit" style="background-color:rgb(142,167,248);color:black;border:none">Logout
        </button>
</form>



<br><br><br><br>
<ul >

   <li ><font size="5"><a href="myCar.php">Park My Car</font></a></li>
  
</ul>

</body>
</html>
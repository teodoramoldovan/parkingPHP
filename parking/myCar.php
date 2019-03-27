<?php  	
	
		$connect = mysqli_connect("localhost", "root", "password", "parkingphp"); 
		session_start(); 
		 

		if(isset ($_POST["add"])){
			if(empty($_POST["carName"]) || empty($_POST["parkingName"]|| empty($_POST["carTime"])))  
			{  
				echo '<script>alert("Please enter information in all fields")</script>';  
			}  
			else
			{
				
				$parkingName = mysqli_real_escape_string($connect, $_POST["parkingName"]); 
						echo '<script>alert($parkingN)</script>';
				$query2="SELECT * from parkings where name='$parkingName'";
				$result2=mysqli_query($connect,$query2);
				if (!$result2) {
					printf("Error: %s\n", mysqli_error($connect));
					exit();
				}	
				$row2 = mysqli_fetch_array($result2);
				$freePlaces=$row2["freePlaces"];
				$newFreePlaces=--$freePlaces;
				$query3 = "UPDATE parkings SET freePlaces='$newFreePlaces' where name='$parkingName'";  
				
				$carName = mysqli_real_escape_string($connect, $_POST["carName"]);
				$carTime=mysqli_real_escape_string($connect,$_POST["carTime"]);
				$username=$_SESSION["username"];
				$query4="INSERT INTO parkedCars(carName,carTime,parkingName) VALUES
					('$carName','$carTime','$parkingName')";
				$result3=mysqli_query($connect,$query3);
				$result4=mysqli_query($connect,$query4);
				
				if (!$result3 || !$result4) {
					printf("Error: %s\n", mysqli_error($connect));
					exit();
				}
				
				
			}
		}
		
		$query = "SELECT * FROM parkings";  
		$result=mysqli_query($connect,$query);

	 
 
 ?> 
<html >
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<title>ClujParking</title>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
   background-color: rgba(221,221,221,0.7);
}

table tr:not(:first-child){
    cursor: pointer;transition: all .25s ease-in-out;
}
table tr:not(:first-child):hover{background-color: rgba(0,0,0,0.4);}

body {
    background-image: url("images/clujtransp.png");
    background-repeat: no-repeat;
    background-size:cover;
}
input {
    
    border-color: rgb(0,0,0);
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: rgba(0,0,0,0.7);
}

li {
    float: left;
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
</style>
</head>
<body>

<h2 align="center"><img src="images/logoCP1.png" width="268" height="179"></h2>

<ul >
  <li><font size="4"><a href="userHome">Home</font></a></li>
  
</ul>
<br><br><br>

<table id= "table" align="center" width="400">

<tr>
<th>Id</th>
<th>Name</th>
<th>Address</th>
<th>Number of places</th>
<th>Free places</th>
</tr>
   <?php
	while($row=mysqli_fetch_array($result)){
	?>
      <tr>
        <td><?php echo $row["id"];?></td>
		<td><?php echo $row["name"]?></td>
		<td><?php echo $row["address"]?></td>
		<td><?php echo $row["numberOfPlaces"]?></td>
		<td><?php echo $row["freePlaces"]?></td>
      </tr>
	<?php
	}
	?>
</table>
<script>
    
                var table = document.getElementById('table');
                
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         
                        
                         document.getElementById("parkingName").value = this.cells[1].innerHTML;
                       
                    };
                }
    
         </script>
<br><br><br>
<h2 align="center"><font size="6">Park My Car</font></h2>

<form method="POST" action="myCar" modelAttribute="newCar">
   <h2 align="center">
   Car number:<br>
  <input type="text" name="carName" id="carName"  style="background-color: rgba(0,0,0,0.6); color: rgb(255,255,255);">
  <br>
  Parking name:<br>
  <input type="text" name="parkingName" id="parkingName" readonly="readonly" style="background-color: rgba(0,0,0,0.6); color: rgb(255,255,255);">
  <br>
  Time:<br>
  <input type="text" name="carTime" id="carTime"  style="background-color: rgba(0,0,0,0.6); color: rgb(255,255,255);">
  <br><br>
  <input type="submit" name="add" value="Add" style="background-color: rgba(0,0,0,0.6); color: rgb(255,255,255);">
  </h2>
</form>


</body>
</html>
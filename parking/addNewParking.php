<?php  	
	
		$connect = mysqli_connect("localhost", "root", "password", "parkingphp"); 
		session_start(); 
		 

		if(isset ($_POST["add"])){
			if(empty($_POST["parkingName"]) || empty($_POST["parkingAddress"]||
				empty($_POST["numberOfPlaces"])))  
			{  
				echo '<script>alert("Please enter information in all fields")</script>';  
			}  
			else
			{
				
				$parkingName = mysqli_real_escape_string($connect, $_POST["parkingName"]);
				$parkingAddress = mysqli_real_escape_string($connect, $_POST["parkingName"]);
				$numberOfPlaces= mysqli_real_escape_string($connect, $_POST["noOfPlaces"]);
				
				$query2="INSERT INTO parkings(name,address,numberOfPlaces,freePlaces) VALUES
					('$parkingName','$parkingAddress','$numberOfPlaces','$numberOfPlaces')";
			
				if(mysqli_query($connect, $query2))  
				{ 
					echo '<script>alert("New parking added")</script>';  
				}  
			}
		}
		
		$query = "SELECT * FROM parkings";  
		$result=mysqli_query($connect,$query);

	 
 
 ?> 
<html>
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
div {
    resize: both;
    overflow: auto;
}
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
  <li><font size="4"><a href="adminHome.php">Home</font></a></li>
  <li><font size="4"><a href="addNewParking.php">Add new parking</font></a></li>
  <li><font size="4"><a href="updateParking.php">Update parking</font></a></li>
  <li ><font size="4"><a href="deleteParking.php">Delete parking</font></a></li>
  <li ><font size="4"><a href="listCars.php">List Cars</font></a></li>
  
</ul>

<br><br><br>

<table align="center" width="400">

<tr>
<th>Id</th>
<th>Name</th>
<th>Address</th>
<th>Number of places</th>
<th>Free places </th>
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
<br><br><br>
<h2 align="center"><font size="6">Add new parking</font></h2>

<form method="POST" action="addNewParking" modelAttribute="newParking">
   <h2 align="center">
  Parking name:<br>
  <input type="text" name="parkingName" style="background-color: rgba(0,0,0,0.6); color: rgb(255,255,255);">
  <br>
  Parking address:<br>
  <input type="text" name="parkingAddress" style="background-color: rgba(0,0,0,0.6); color: rgb(255,255,255);">
  <br>
  Number of places:<br>
  <input type="text" name="noOfPlaces" style="background-color: rgba(0,0,0,0.6); color: rgb(255,255,255);">
  <br><br>
  <input type="submit" name="add" value="Add" style="background-color: rgba(0,0,0,0.6); color: rgb(255,255,255);">
  </h2>
</form>


</body>
</html>
	
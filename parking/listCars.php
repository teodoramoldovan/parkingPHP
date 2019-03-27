<?php  	
	
		$connect = mysqli_connect("localhost", "root", "password", "parkingphp"); 
		session_start(); 
		
		$query = "SELECT * FROM parkedCars";  
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
<th>Car Number</th>
<th>Parked For</th>
<th>Owner</th>
</tr>
   <?php
	while($row=mysqli_fetch_array($result)){
	?>
      <tr>
        <td><?php echo $row["id"];?></td>
		<td><?php echo $row["carName"]?></td>
		<td><?php echo $row["carTime"]?></td>
		<td><?php echo $row["parkingName"]?></td>
      </tr>
	<?php
	}
	?>
</table>
<br><br><br>

</body>
</html>
	
<html>
<head>
    <title>RVR Library Management</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
</head>
<body bgcolor="#fcf4e8">

<?php include 'header.php';

   include 'connection.php';

	$query="SELECT * FROM magazines;";
	
	$result=mysqli_query($connection, $query);
	
     // output data of each row
	 //Fetch the result into an array
	 echo "<html><center>
          <table border=1 style=\"width:75%\">
           <tr>
           <th>Magazine Number</th>
           <th>Magazine Name</th>
           <th>Genre</th>
		   <th>Publisher</th>
           </tr>";
    while ($row = $result->fetch_assoc()) {

	echo "<tr>
          <td align='center'>{$row['magazineId']}</td>
          <td align='center'>{$row['magazineName']}</td>
		  <td align='center'>{$row['genre']}</td>
		  <td align='center'>{$row['publisher']}</td>
	      </tr>";
	} 
	echo "</tr></center></table></html>";
?>

</div>
</body>
</html>
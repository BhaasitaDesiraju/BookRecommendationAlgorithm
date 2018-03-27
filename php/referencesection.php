<html>
<head>
    <title>RVR Library Management</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
</head>
<body bgcolor="#fcf4e8">

<?php include 'header.php';

   include 'connection.php';

	$query="SELECT * FROM referencesection;";
	
	$result=mysqli_query($connection, $query);
	
     // output data of each row
	 //Fetch the result into an array
	 echo "<html><center>
          <table border=1 style=\"width:75%\">
           <tr>
           <th>Book Number</th>
		   <th>Department</th>
           <th>Book Name</th>
           <th>Author</th>
		   <th>Publisher</th>
           </tr>";
    while ($row = $result->fetch_assoc()) {

	echo "<tr>
          <td align='center'>{$row['rsbId']}</td>
		  <td align='center'>{$row['department']}</td>
          <td align='center'>{$row['rsBookName']}</td>
		  <td align='center'>{$row['rsBookAuthor']}</td>
		  <td align='center'>{$row['rsBookPublisher']}</td>
	      </tr>";
	} 
	echo "</tr></center></table></html>";
?>

</div>
</body>
</html>
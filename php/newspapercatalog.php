<html>
<head>
    <title>RVR Library Management</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
</head>
<body bgcolor="#fcf4e8">
<?php include 'header.php';

   //include 'connection.php';	
   
   //connect to the database
   $connection=mysqli_connect("localhost","root","");
 
 //select database
 $database=mysqli_select_db($connection, "librvry");

	$query="SELECT * FROM newspapers;";
	
	$result=mysqli_query($connection, $query);
	
     // output data of each row
	 //Fetch the result into an array
	 echo "<html><center>
          <table border=1 style='width:75%'>
           <tr>
           <th>Newspaper Number</th>
           <th>Newspaper Name</th>
           <th>Language</th>
		   <th>Link</th>
           </tr>";
    while ($row = $result->fetch_assoc()) {

	echo "<tr>
          <td align='center'>{$row['newspaperId']}</td>
          <td align='center'>{$row['newspaperName']}</td>
		  <td align='center'>{$row['language']}</td>
		  <td align='center'><a href=\'{$row['link']}\' target=\'_blank\'>Read it here</a></td>
	      </tr>";
	} 
	echo "</tr></center></table></html>";
?>

</div>
</body>
</html>
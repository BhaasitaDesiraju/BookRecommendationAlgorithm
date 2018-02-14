<html>
<head>
    <title>RVR Library Management</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
</head>
<body>
<?php include 'header.php';

   //include 'connection.php';	

   //connect to the database
   $connection=mysqli_connect("localhost","root","");
 
 //select database
 $database=mysqli_select_db($connection, "librvry");

	$query="SELECT * FROM booksdb where department='EC/EE' order by bid;";
	
	$result=mysqli_query($connection, $query);
	
     // output data of each row
	 //Fetch the result into an array
	 echo "<html><center>
          <table border=1 style='width:75%'>
           <tr>
           <th>Book Number</th>
           <th>Department</th>
           <th>Book Name</th>
		   <th>Author</th>
		   <th>Publisher</th>
		   <th>Books Available</th>
		   <th>Add to Wishlist</th>
		   </tr>";
    while ($row = $result->fetch_assoc()) {

	echo "<tr>
          <td align='center'>{$row['bid']}</td>
          <td align='center'>{$row['department']}</td>
		  <td align='center'>{$row['bookname']}</td>
		  <td align='center'>{$row['author']}</td>
		  <td align='center'>{$row['publisher']}</td>
		  <td align='center'>{$row['bookcount']}</td>
		  <td><center><button type='button' onclick='location.href=\'wishlist.php\''> + </button></center></td>
	      </tr>";
	} 
	echo "</tr></center></table></html>";

?>

</div>
</body>
</html>
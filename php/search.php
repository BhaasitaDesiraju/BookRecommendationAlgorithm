<html>
<head>
    <title>RVR Library Management</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
</head>
<body>
<?php include 'header.php';

	if(isset($_POST['submit']))
	{ 
		if(preg_match("/^[a-zA-Z]+/", $_POST['search']))
		{ 
			$name= $_POST['search']; 
			//include 'connection.php';	
				//connect to the database
			$connection=mysqli_connect("localhost","root","");
			$name = mysqli_real_escape_string($connection, $_POST['search']);
			
			//select database
			$database=mysqli_select_db($connection, "librvry");
			$query="SELECT * FROM booksdb where (bookname LIKE '% ".$name." %' OR bookname LIKE '% ".$name."') OR 
			(author LIKE '% ".$name." %' OR author LIKE '% ".$name."') OR 
			(publisher LIKE '% ".$name." %' OR publisher LIKE '% ".$name."') order by bid;";
			
			//(bid LIKE '%".$name."%') OR (department LIKE '%".$name."%') OR
			
			$result=mysqli_query($connection, $query);
			
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
			//-create  while loop and loop through result set 
			while($row=mysqli_fetch_array($result))
			{ 
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
		}
		else
		{ 
			echo  "<p>Please enter a search query</p>"; 
		}  
	} 
?> 
</body>
</html>
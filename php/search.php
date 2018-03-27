<html>
<head>
    <title>RVR Library Management</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
</head>
<body bgcolor="#fcf4e8">
<?php include 'header.php';?>
<form  method="post" action="search.php"  id="searchform">
<center>
<pre>
<b>Search:</b> <input type="text" style="width:500px" name="search" />

<input type="submit" name="submit" value="Submit" />

</pre>
</center>
</form>
<?php

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
			(publisher LIKE '% ".$name." %' OR publisher LIKE '% ".$name."')";
			
			$result=mysqli_query($connection, $query);
			
			
			 echo "<div style=\"padding:80px;\">";
	         while($row = $result->fetch_assoc()) {
				 $bid=$row['bookId'];
		         $bkname=$row['bookname'];
		         $author=$row['author'];
				 $publisher=$row['publisher'];
				 
		     echo "<div>
		<div style='border-top:1px solid;'></div>
		<h2>Book Name:\t<a href=\"display.php?bid=$bid & bkname=$bkname & author=$author & publisher=$publisher\" onMouseOver=\"this.style.color='#ffb500'\" onMouseOut=\"this.style.color='blue'\" <span style='color:blue';> {$row['bookname']}</a></span></h2>
		<p><b>Author name:</b>\t{$row['author']}</p>
		<p><b>Publisher:</b>\t{$row['publisher']}</p>
		<div style='border-bottom:1px solid;'></div></div>";
	}
	echo "</div>";

	//#ff9900 - on hover colour
    }	
	else
	{ 
		echo  "<p>Please enter a search query</p>"; 
	}  
  } 
  
?> 
</body>
</html>
<html>
<head>
    <title>RVR Library Management</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
</head>
<body>
<center>

<?php include 'header.php';

   //include 'connection.php';
	//connect to the database
	$connection=mysqli_connect("localhost","root","");
 
	//select database
	$database=mysqli_select_db($connection, "librvry");
	
	if(isset($_POST['save']))
	{
		$link = mysqli_real_escape_string($connection, urlencode($_POST['link']));
		$insert = "INSERT INTO newspapers (newspaperId, newspaperName, language, link)
		VALUES ('".$_POST["newspaperId"]."','".$_POST["newspaperName"]."','".$_POST["language"]."','".$link."')";

		$result = mysqli_query($connection,$insert);
	}

?>

<form  method="post"> 
<pre>
<label>Newspaper Id:</label>   <input type="text" name="newspaperId">

<label>Newspaper Name:</label> <input type="text" name="newspaperName">

<label>Language:</label>       <input type="text" name="language">

<label>Link:</label>           <input type="text" name="link">

<button type="submit" name="save">save</button>
</pre>
</form>

</center>
</div>
</body>
</html>
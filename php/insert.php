<html>
<head>
    <title>RVR Library Management</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
</head>
<body>
<?php 
include 'adminheader.php';
?>
<center>
<?php
	//connect to the database
	$connection=mysqli_connect("localhost","root","");
 
	//select database
	$database=mysqli_select_db($connection, "librvry");

	if(isset($_POST['save']))
	{
		$insert = "INSERT INTO magazines (magazineId, magazineName, genre, publisher)
		VALUES ('".$_POST["magazineId"]."','".$_POST["magazineName"]."','".$_POST["genre"]."','".$_POST["publisher"]."')";

		$result = mysqli_query($connection,$insert);
	}

?>

<form  method="post"> 
<pre>
<label> Magazine Id:</label>  <input type="text" name="magazineId">

<label>Magazine Name:</label> <input type="text" name="magazineName">

<label>Genre:</label>         <input type="text" name="genre">

<label>Publisher:</label>     <input type="text" name="publisher">

<button type="submit" name="save">save</button>
</pre>
</form>

</center>
</div>
</body>
</html>
<html>
<head>
    <title>RVR Library Management</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
</head>
<body>
<div class="vbox vbox-center">
     
	 <div class="hbox header">
	
    <div class="hbox-left left-header">
        <img style="width:50%;" src="../images/logoLibrvry.svg" alt="Home" onclick="location.href='../php/dashboard.php'">
    </div>

    <div class="hbox-right right-header">
        <div style="float:right;"><?php include 'session.php'?> |
            <form method="post" class="signout" action="logout.php">
                <button>Sign Out</button>
            </form>
        </div>
    </div>
</div> 

<?php	
   //connect to the database
   $connection=mysqli_connect("localhost","root","");
 
 //select database
 $database=mysqli_select_db($connection, "librvry");

	$query="SELECT * FROM magazines;";
	
	$result=mysqli_query($connection, $query);
	
     // output data of each row
	 //Fetch the result into an array
	 echo "<html><center>
          <table border=1>
           <tr>
           <th>Magazine Number</th>
           <th>Magazine Name</th>
           <th>Genre</th>
		   <th>Publisher</th>
           </tr>";
    while ($row = $result->fetch_assoc()) {

	echo "<tr>
                <td>{$row['magazineId']}</td>
                <td>{$row['magazineName']}</td>
		<td>{$row['genre']}</td>
		<td>{$row['publisher']}</td>
	    </tr>";
	} 
	echo "</tr></center></table></html>";
?>

</div>
</body>
</html>
<?php
include("connection.php");
 
$magazineId=$_POST["magazineId"];
$magazineName=$_POST["magazineName"];
$genre=$_POST["genre"];
$publisher=$_POST["publisher"];

//Insert query to add magazine details into the magazines table
$query = "insert into magazines(magazineId, magazineName, genre, publisher) values('$magazineId','$magazineName','$genre','$publisher')";

$result = mysqli_query($connection, $query);

if($result) {
	$query = "select * from magazines";
	
	$result = mysqli_query($connection, $query);
}
else {
	echo "Unable to insert the new magazine";
}
 
?>
 
<?php
session_start();

if(isset($_POST['username']) and isset($_POST['password']))  {
 $username=$_POST['username'];
 $password=$_POST['password'];
 
 //store session data
 $_SESSION['username']=$username;
 
 //connect to the database
 $connection=mysqli_connect("localhost","root","");
 
 //select database
 $database=mysqli_select_db($connection, "librvry");
 
 $query="select * from users where username='$username' and password='$password'";
 
 //checking if the user exists
 $result=mysqli_query($connection, $query);
 
 //Fetch the result into an array
 $row=mysqli_fetch_array($result);
 
 $role=$row['role'];
 
 if($result) {
	 if($role == "student" || $role == "staff" || $role=="admin") {
	   header("Location: dashboard.php");
	 }
	 else if($role=="admin") {
	     header("Location: admindashboard.php");
	 }
 }
 else {
	 header("Location: login.html");
	 }
}	 
?>
<?php
     session_start();
	 if(isset($_SESSION['username'])) {
	  $username = $_SESSION['username']; 
	  echo "Welcome ${username}"; 
	 }
	  if(isset($_SESSION['role'])) {
		 $role = $_SESSION['role'];
		 /*if($role == "student" || $role == "staff") {
	         header("Location: ../pages/userTiles.html");
	      }
	     else if($role == "admin") {
		    header("Location: ../pages/adminTiles.html");
	    }*/
     }	
?>
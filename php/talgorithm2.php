<?php
//book recommendation algorithm

//connect to the database
 $connection=mysqli_connect("localhost","root","");
 
 //select database
 $database=mysqli_select_db($connection, "librvry");

//generate a list of users who borrowed a book b3
$query1="SELECT * FROM booktransactions where `bookId`='452'";
$borrowedUsersSet=mysqli_query($connection, $query1);


//Fetch the result into an array
//List of users who borrowed 403	 
    
		 echo "<html><center>
          <table border=1 style=\"width:75%\">
		  <tr><th>Book Id</th>
		  <th>Borrow Time</th>
		  <th>User Id</th></tr>";  
    while ($row = $borrowedUsersSet->fetch_assoc()) 
   {	
//Get borrowed time of book with id 403
		$bookBorrowedTime=$row['borrowedTime'];
		
		$userId=$row['userId'];
		
		//select books borrowed after b3
		$query2 = "SELECT * FROM booktransactions where `userId`={$row['userId']} and `borrowedTime`>'$bookBorrowedTime'";
		$eachUserSet=mysqli_query($connection, $query2);
		while ($row2 = $eachUserSet->fetch_assoc())
		{
		  echo "<tr>
          <td align='center'>{$row2['bookId']}</td>
          <td align='center'>{$row2['borrowedTime']}</td>
		  <td align='center'>{$row2['userId']}</td>
	      </tr>";
		}
		 
	} 
	 echo "</tr></center></table></html>";

	?>
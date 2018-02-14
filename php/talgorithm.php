<?php
//book recommendation algorithm

//connect to the database
 $connection=mysqli_connect("localhost","root","");
 
 //select database
 $database=mysqli_select_db($connection, "librvry");

//generate a list of users who borrowed a book b3
$query1="SELECT * FROM booktransactions where `bookId`='403'";
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
	echo "<tr>
          <td align='center'>{$row['bookId']}</td>
          <td align='center'>{$row['borrowedTime']}</td>
		  <td align='center'>{$row['userId']}</td>
	      </tr>";
		  
	} 
	echo "</tr></center></table></html>";

	?>
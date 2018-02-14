<?php
//book recommendation algorithm

//connect to the database
 $connection=mysqli_connect("localhost","root","");
 
 //select database
 $database=mysqli_select_db($connection, "librvry");

//generate a list of users who borrowed a book b3
$query1="SELECT * FROM booktransactions where `bookId`='403'";
$borrowedUsersSet=mysqli_query($connection, $query1);


while ($row = $borrowedUsersSet->fetch_assoc()) 
	{	
         $borrowedUsersArray[] = $row;
		 
		//Get borrowed time of book with id 403
		$bookBorrowedTime=$row['borrowedTime'];
		
		//select books borrowed after b3
		$query2 = "SELECT * FROM booktransactions where `userId`='{$row['userId']}' and `borrowedTime`>'$bookBorrowedTime'";
		$eachUserSet=mysqli_query($connection, $query2);
	
	//each book borrowed after b3
    while ($row2 = $eachUserSet->fetch_assoc()) 
	{
	  //adding elements to the array
	  $eachUserArray[] = $row2;
	}
   }
    /*print_r($borrowedUsersArray);
	echo "<br><br>";
	
	print_r($eachUserArray);
	echo "<br><br>";*/
	
	//counting the no.of times each book is repeated
	$counterValues = array('bookId' => array_count_values(array_column($eachUserArray, 'bookId')));
	
	//Maximum no. of times a book circulated (across all books)
    $maxN = max($counterValues['bookId']);
	print_r($counterValues);
	echo "<br><br>";
	echo "Maximum no. of times circulated accross all books: ";
	echo $maxN;
	
	//print_r($borrowedUsersArray);
	//print_r($eachUserArray);
 
	
	/*echo "<table><tr><th>Count</th></tr>";
	foreach($counterValues as $row) 
	{ 
	  echo('<tr>');
	  foreach($row as $cell) 
	  { 
	    echo('<td>' . $cell . '</td>'); 
	  } 
	  echo('</tr>'); 
	} 
	echo "</table>";*/

	?>
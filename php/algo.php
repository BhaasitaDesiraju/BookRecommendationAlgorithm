<?php
//connect to the database
 $connection=mysqli_connect("localhost","root","");
 
 //select database
 $database=mysqli_select_db($connection, "librvry");

//generate a list of users who borrowed a book b3
$query1="SELECT * FROM booktransactions where `bookId`='403'";
$borrowedUsersSet=mysqli_query($connection, $query1);

 while ($row = $borrowedUsersSet->fetch_assoc()) 
	{	
		//Get borrowed time of book with id 403
		$bookBorrowedTime=$row['borrowedTime'];
		
		//select books borrowed after b3
		$query2 = "SELECT * FROM booktransactions where `userId`='{$row['userId']}' and `borrowedTime`>'$bookBorrowedTime'";
		$eachUserSet=mysqli_query($connection, $query2);
		
		$eachUserArray = [];
        while($row2 = mysqli_fetch_array($eachUserSet))
        {
          /*$eachUserArray[] = $row2;*/
        }

		print_r($eachUserArray);
		
		/*$counts = array();
        foreach ($eachUserArray as $key=>$subarr) {
            $counts[$subarr['bookId']] = isset($counts[$subarr['bookId']]) ? $counts[$subarr['bookId']]++ : 1;
        }
		
        print_r($counts);*/
	}
	
	
//calculate time distance between b3 and other books borrowed after b3 for each user
?>
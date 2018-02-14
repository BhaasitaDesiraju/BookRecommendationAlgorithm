<?php
//book recommendation algorithm

//connect to the database
 $connection=mysqli_connect("localhost","root","");
 
 //select database
 $database=mysqli_select_db($connection, "librvry");

//generate a list of users who borrowed a book b3
$query1="SELECT * FROM booktransactions where `bookId`='403'";
$borrowedUsersSet=mysqli_query($connection, $query1);
$borrowedUsersArray=[];
$eachUserArray = [];
$bookBorrowedTime;

//Fetch the result into an array
//List of users who borrowed 403	 
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
    print_r($borrowedUsersArray);
	echo "<br><br>";
	
	print_r($eachUserArray);
	echo "<br><br>";
	
	//counting the no.of times each book is repeated
	$counterValues = array('bookId' => array_count_values(array_column($eachUserArray, 'bookId')));
	
	//Maximum no. of times a book circulated (across all books)
    $maxN = max($counterValues['bookId']);
	print_r($counterValues);
	echo "<br><br>";
	echo $maxN;
	echo "<br><br>";

	  /*foreach($eachUserArray as $value)
	  {
		$bid=$value['bookId'];
		$baseBt=$value['borrowedTime'];
		$uid=$value['userId'];
		if(in_array($uid, array_column($borrowedUsersArray, 'userId'))) 
		{
			$targetBt=array_search($uid, array_column($borrowedUsersArray, 'userId'));
			//echo $targetBt;
			//$sumBt=$sumbt+($targetbt-$baseBt);
			//find if the bookid is present anywhere in the eachUserArray
			
			//find it's corresponding userId 
			
			//get it's borrowing time 
			
			//add that difference to sum
		}
	  }	*/	
	
	//Retrieving all the unique book ids
	$bookIds = array();
    foreach ($eachUserArray as $h) {
      $bookIds[] = $h['bookId'];
    }
    $uniqueBookIds = array_unique($bookIds);
	print_r($uniqueBookIds);
	echo "<br><br>";  
	
	//using each unique book id as a key, checking all the arrays to calculate time difference
	foreach($uniqueBookIds as $uqBid)
	{
		$avgT=0;
		 foreach($eachUserArray as $keys => $val) {
          if ($val['bookId'] == $uqBid){
			  $uid=$val['userId'];
			  $time=$val['borrowedTime'];
			  //print_r($time);
			  //echo "<br>";
			  
			  //if user is present in borrowed list, calculate average time difference between b3 and other books
			  if(in_array($uid, array_column($borrowedUsersArray, 'userId')))
			  {
				  //echo "<br>";
				  $bid = array_search($uid, array_column($borrowedUsersArray, 'userId'));
				  echo $bid;
				  echo "<br>";
			      $btarray=array_column($borrowedUsersArray, 'borrowedTime');
				  $baseTime=$btarray[$bid];
				  
				  //calculating avg time sequence info and no.of times that book got circulated
				 
				  //$diffT=date_sub(strtotime($time),strtotime($baseTime));
				  $avgT=strtotime($avgT)+(strtotime($time) - strtotime($baseTime));
				  //print_r($avgT);
				  //echo "<br>";
			  }
          }
        }
	}

//calculate the distance

//recommend in the order of least distance to greatest

?>
<?php
//book recommendation algorithm

//connect to the database
 $connection=mysqli_connect("localhost","root","");
 
 //select database
 $database=mysqli_select_db($connection, "librvry");

//generate a list of users who borrowed a book b3
$ibkid=452;
$query1="SELECT * FROM booktransactions where `bookId`=$ibkid";
$borrowedUsersSet=mysqli_query($connection, $query1);
$borrowedUsersArray=[];
$eachUserArray = [];
$bookBorrowedTime; 
$mergedArray=array();
$mergedArray1=array();
$standardisedArray=array();
$standardisedArray1=array();
$finalArray=array();
$finalArray1=array();
//Fetch the result into an array

/*echo "<center><br><br><br>List of users and books borrowed after $ibkid</center><br>";
    echo "<html><center>
          <table border=1 style=\"width:75%\">
		  <tr><th>Book Id</th>
		  <th>Borrow Time</th>
		  <th>User Id</th></tr>";*/
		  	 
    while ($row = $borrowedUsersSet->fetch_assoc()) 
	{	
       /*echo "<tr>
          <td align='center'>{$row['bookId']}</td>
          <td align='center'>{$row['borrowedTime']}</td>
		  <td align='center'>{$row['userId']}</td>
	      </tr>";*/

   	   $borrowedUsersArray[] = $row;
		 
		//Get borrowed time of book with id bk
		$bookBorrowedTime=$row['borrowedTime'];
		
		//select books borrowed after bk
		$query2 = "SELECT * FROM booktransactions where `userId`='{$row['userId']}' and `borrowedTime`>'$bookBorrowedTime'";
		$eachUserSet=mysqli_query($connection, $query2);
	
	    //each book borrowed after bk
        while ($row2 = $eachUserSet->fetch_assoc()) 
	    {
          $eachUserArray[] = $row2;
		  /*echo "<tr>
          <td align='center'>{$row2['bookId']}</td>
          <td align='center'>{$row2['borrowedTime']}</td>
		  <td align='center'>{$row2['userId']}</td>
	      </tr>";
		  //adding elements to the array*/
	      
	    }
		//echo "</tr></center></table></html>";
    }
	
	
	echo "Users who borrowed $ibkid<br>";
    print_r($borrowedUsersArray);
	echo "<br><br>";
	
	echo "List of all books borrowed by users after borrowing $ibkid<br>";
	print_r($eachUserArray);
	echo "<br><br>";
	
	//counting the no.of times each book is repeated
	$counterValues = array('bookId' => array_count_values(array_column($eachUserArray, 'bookId')));
	
	//Maximum no. of times a book circulated (across all books)
    $maxN = max($counterValues['bookId']);
	echo "Book circulation times of each book after borrowing $ibkid, across all users<br>";
	print_r($counterValues);
	echo "<br><br>";
    echo "Maximum no. of times a book is circulated is ";
	echo $maxN;
	echo "<br><br>";

	//Retrieving all the unique book ids
	echo "Retrieving all the unique book ids";
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
		$avgT1=0;
		 foreach($eachUserArray as $keys => $val) {
          if ($val['bookId'] == $uqBid){
			  $uid=$val['userId'];
			  $time=$val['borrowedTime'];
			  echo "Book time:";
			  print_r($time);
			  //echo " - ";
			  //echo gettype($time);
			  echo " - ";
			  
			  //if user is present in borrowed list, calculate average time difference between bk and other books
			  if(in_array($uid, array_column($borrowedUsersArray, 'userId')))
			  {
				  //echo "<br>";
				  $bid = array_search($uid, array_column($borrowedUsersArray, 'userId'));
				  //echo $bid;
				  //echo "<br>";
				  //echo " ";
			      $btarray=array_column($borrowedUsersArray, 'borrowedTime');
				  $baseTime=$btarray[$bid];
				  echo "Base book time:";
				  echo $baseTime;
				  echo "   ";
				  //echo gettype($baseTime);
				  echo "<br>";
			
                  //calculating avg time sequence info and no.of times that book got circulated 
				  $days = (strtotime($time) - strtotime($baseTime));
				  //echo gettype($days);
				  //echo "  ";
				  /*echo $days;
				  echo "<br>";*/
				  $avgT1 = $avgT1 + $days;
				  echo "Average time:";
				  echo $avgT1;
				  echo "<br>";
			  }
			  
          }
		  
        }
		echo "Avg values:<br>";
		echo $uqBid;
		echo " ";
	   //getting no. of times book with id $uqBid is borrowed
	   $an=array_column($counterValues, $uqBid);
	   $n=$an[0];
	   echo $n;
	   echo "<br>";
	   //calculating the average time
	   $avgT=$avgT1/$n;
	   
	   //merging $avgT and unique book id's in to a single array $mergedArray
        $mergedArray= array('bookId' => $uqBid, 'avgT' => $avgT, 'cTime' => $n);
	    array_push($mergedArray1,$mergedArray);
	    echo $avgT;
	    echo "<br><br>";
	  //normalizing avgT
	}
	//finding min avgT
	   $minAvgT=min(array_column($mergedArray1, 'avgT'));
		
	  //finding max avgT
	  $maxAvgT=max(array_column($mergedArray1, 'avgT'));
	  
	  //finding min circulation time
	   $mincTime=min(array_column($mergedArray1, 'cTime'));
		
	  //finding max circulation time
	  $maxcTime=max(array_column($mergedArray1, 'cTime'));
		
	 if($maxAvgT-$minAvgT > 0 && $maxcTime-$mincTime > 0) 
	 {	 
	 //standardize t & n values
	 foreach($mergedArray1 as $x) 
	 {
		 $standardisedT; 
		 $standardisedN;
		 //print_r($x);
		 echo "<br>";
		 $t=$x['avgT'];
		 $nc=$x['cTime'];
		 $uBookId = $x['bookId'];
		 echo "Average Time: $t, Count: $nc";
		 echo "<br>";
		 $standardisedT = (($t-$minAvgT)/($maxAvgT-$minAvgT))*100;
		 $standardisedN = (($nc-$mincTime)/($maxcTime-$mincTime))*100;
		 echo "Standardised T value: $standardisedT<br>";
		 echo "Standardised N value: $standardisedN";
		 echo "<br><br>";
		 //merging unique book ids, $standardisedT and standardisedN in to a single array $standardisedArray
        $standardisedArray1= array('bookId' => $uBookId, 'standardisedT' => $standardisedT, 'standardisedN' => $standardisedN);
	    array_push($standardisedArray,$standardisedArray1);
		 
	 }
	
	echo "<br>Minimum avgT: ";
	//echo gettype($minAvgT);
	print_r($minAvgT);
	echo "<br>";
	echo"Maximim avgT: ";
	print_r($maxAvgT);
	echo "<br>";
	echo "Minimum circulation time: ";
	echo $mincTime;
	echo "<br>";
	echo "Maximum circulation time: ";
	echo $maxcTime;
	echo "<br><br>";
	
	echo "Average T values array:<br>";
	print_r($mergedArray1);
	echo "<br><br>Standardised array:<br>";
	print_r($standardisedArray);
	echo "<br>";

	//finding min standardised circulation time
	   $minscTime=min(array_column($standardisedArray, 'standardisedN'));
		
	  //finding max standardised circulation time
	  $maxscTime=max(array_column($standardisedArray, 'standardisedN'));
		
//calculate the distance
foreach($standardisedArray as $s)
{
	//get bookId, standardized T and N
	$st=$s['standardisedT'];
    $snc=$s['standardisedN'];
	$suBookId = $s['bookId'];
	$diff = $maxscTime - $snc;
    $distance = sqrt(($st * $st) + ($diff * $diff));
	//merging unique book ids and distance in to a single array $finalArray
    $finalArray1= array('bookId' => $suBookId,'distance' => $distance);
	array_push($finalArray,$finalArray1);
}

}
	  else {
	  //calculate the distance
      foreach($mergedArray1 as $s)
     {
	  //get bookId, standardized T and N
	$suBookId = $s['bookId'];
    $distance = $s['avgT'];;
	//merging unique book ids and distance in to a single array $finalArray
    $finalArray1= array('bookId' => $suBookId,'distance' => $distance);
	array_push($finalArray, $finalArray1);	 
  }
	  }
echo "<br>Final Array: <br>";
print_r($finalArray);

//recommend in the order of least distance to greatest 
function sortByDistance($a, $b)
{
    $a = $a['distance'];
    $b = $b['distance'];

    if ($a == $b) return 0;
    return ($a < $b) ? -1 : 1;
}


usort($finalArray, 'sortByDistance');
echo "<br><br>";
echo "Sorted Array:<br>";
print_r($finalArray);

echo "<br><br>";
//echo "<br><br><center><b>Recommendations: </b></center>";
/*echo "<html><center>
          <table border=1 style='width:80%'>
           <tr>
           <th>Book Name</th>
		   <th>Author</th>
		   <th>Publisher</th>
		   </tr>";*/
$finalArrayX = array_slice($finalArray,0, 5);
echo "Recommendations: <br>";
print_r($finalArrayX);		   
/*foreach($finalArrayX as $dispVal)
{
	$dispValBid=$dispVal['bookId'];
	$retrieveBookQuery = "SELECT bookname,author,publisher FROM booksdb where `bookId`='$dispValBid'";
	$retrieveQueryResult=mysqli_query($connection, $retrieveBookQuery);
	
	while ($row = $retrieveQueryResult->fetch_assoc()) {
		
		echo "<tr>
		  <td align='center'>{$row['bookname']}</td>
		  <td align='center'>{$row['author']}</td>
		  <td align='center'>{$row['publisher']}</td>
	      </tr>";
	}	
}
echo "</tr></center></table></html>";*/
?>
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
$mergedArray=array();
$mergedArray1=array();
$standardisedArray=array();
$standardisedArray1=array();
$finalArray=array();
$finalArray1=array();

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
	
	//counting the no.of times each book is repeated
	$counterValues = array('bookId' => array_count_values(array_column($eachUserArray, 'bookId')));

	//Retrieving all the unique book ids
	$bookIds = array();
    foreach ($eachUserArray as $h) {
      $bookIds[] = $h['bookId'];
    }
    $uniqueBookIds = array_unique($bookIds);
	
	//using each unique book id as a key, checking all the arrays to calculate time difference
	foreach($uniqueBookIds as $uqBid)
	{
		$avgT=0;
		$avgT1=0;
		 foreach($eachUserArray as $keys => $val) {
          if ($val['bookId'] == $uqBid){
			  $uid=$val['userId'];
			  $time=$val['borrowedTime'];
			  
			  //if user is present in borrowed list, calculate average time difference between b3 and other books
			  if(in_array($uid, array_column($borrowedUsersArray, 'userId')))
			  {
				  echo $avgT1;
				  echo "<br>";
				  $bid = array_search($uid, array_column($borrowedUsersArray, 'userId'));
			      $btarray=array_column($borrowedUsersArray, 'borrowedTime');
				  $baseTime=$btarray[$bid];

                  //calculating avg time sequence info and no.of times that book got circulated 
				  $days = (strtotime($time) - strtotime($baseTime))/(60*60);
				  echo $days;
				  echo "<br>";
				  $avgT1 = $avgT1 + $days;
				  echo $avgT1;
				  echo "<br>";
			  }
			  
          }
		  
        }
		
	   //getting no. of times book with id $uqBid is borrowed
	   $an=array_column($counterValues, $uqBid);
	   $n=$an[0];

	   //calculating the average time
	   $avgT=$avgT1/$n;
	   
	   //merging $avgT and unique book id's in to a single array $mergedArray
        $mergedArray= array('bookId' => $uqBid, 'avgT' => $avgT, 'cTime' => $n);
	    array_push($mergedArray1,$mergedArray);
	}
	//finding min avgT
	   $minAvgT=min(array_column($mergedArray1, 'avgT'));
		
	  //finding max avgT
	  $maxAvgT=max(array_column($mergedArray1, 'avgT'));
	  
	  //finding min circulation time
	   $mincTime=min(array_column($mergedArray1, 'cTime'));
		
	  //finding max circulation time
	  $maxcTime=max(array_column($mergedArray1, 'cTime'));
		
	 //standardize t & n values
	 foreach($mergedArray1 as $x) 
	 {
		 $t=$x['avgT'];
		 $nc=$x['cTime'];
		 $uBookId = $x['bookId'];
		 $standardisedT = (($t-$minAvgT)/($maxAvgT-$minAvgT))*100;
		 $standardisedN = (($nc-$mincTime)/($maxcTime-$mincTime))*100;
		 
		 //merging unique book ids, $standardisedT and standardisedN in to a single array $standardisedArray
        $standardisedArray1= array('bookId' => $uBookId, 'standardisedT' => $standardisedT, 'standardisedN' => $standardisedN);
	    array_push($standardisedArray,$standardisedArray1);
		 
	 }

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

//recommend in the order of least distance to greatest 
function sortByDistance($a, $b)
{
    $a = $a['distance'];
    $b = $b['distance'];

    if ($a == $b) 
		return 0;
    return ($a < $b) ? -1 : 1;
}

usort($finalArray, 'sortByDistance');
//echo "Sorted Array: ";
//print_r($finalArray);

?>
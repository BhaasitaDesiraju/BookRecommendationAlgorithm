<?php 
    $date1 = "13-06-2015 23:45:52";
    echo Datetime::createFromFormat('d-m-Y H:i:s', $date1)->format('Y-m-d h:i:s');
    echo "<br>";	

    $date2 = "10.06.2015 09:25:52";
    echo Datetime::createFromFormat('d.m.Y H:i:s', $date2)->format('Y-m-d h:i:s');
	echo "<br>";
	
	$diff=date_diff($date1,$date2);
	echo gettype($diff);
	echo $diff;
	
?>
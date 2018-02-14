<?php

$info = array();

$info[0] = array(
    'car' => 'Audi',
    'previous_car' => 'BMW'
    );

$info[1] = array(
    'car' => 'Audi',
    'previous_car' => 'Seat'
    );

$info[2] = array(
    'car' => 'Audi',
    'previous_carg' => 'BMW'
    );

$info[3] = array(
    'car' => 'BMW',
    'previous_car' => 'BMW'
    );

$info[4] = array(
    'car' => 'Ford',
    'previous_car' => 'Seat'
    );
	
	$key=0;
	$newArray = array('cars' => array_count_values(array_column($info, 'car')));
	$top_car = array_search(max($newArray['cars']),$newArray['cars']);
	$test=array_column($info[$key],'car');
print_r($test);
echo $top_car;
?>
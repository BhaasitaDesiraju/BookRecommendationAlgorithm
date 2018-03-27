<?php
 $a=array(1,2,3,4,5);
 $l = count($a);
 if($l < 5) {
 for($i = 0; $i < $l; ++$i) {
  echo $a[$i];
}
 }
 else {
	 for($i = 0; $i < 5; ++$i) {
  echo $a[$i];
}
 }
 
?>
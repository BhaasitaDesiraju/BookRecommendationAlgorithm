<?php 
date_default_timezone_set('America/Los_Angeles');
echo date_default_timezone_get();
date_default_timezone_set('Europe/Berlin');
echo "<br>";
echo date_default_timezone_get();
?>
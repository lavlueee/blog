<?php 

$con = new mysqli("localhost","root","","blog");

// Check connection
if ($con -> connect_error) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
}else{
	//return true;
}



?>
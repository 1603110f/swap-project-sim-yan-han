
<?php

$db = mysqli_connect("localhost","root","","employee"); //connect to database
if (!$db){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}
?>
 

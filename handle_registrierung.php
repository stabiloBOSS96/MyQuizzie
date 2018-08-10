<?php
require_once("dbutil.class.php");

if(    isset($_POST['pwd1']) && !empty($_POST['pwd1']) 
		&& isset($_POST['pwd2']) && !empty($_POST['pwd2'])
		&& isset($_POST['name']) && !empty($_POST['name'])
		&& isset($_POST['pwd1']) == $_POST['pwd2']
){
	if($_POST['pwd1'] == $_POST['pwd2']){

		DBUtil::register($_POST['name'], $_POST['pwd1']);
		
		echo 1;
	
	} else {
		
		echo 0;
	}
	
} else {
	echo 0;
}

?>


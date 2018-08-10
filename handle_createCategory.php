<?php

	session_start();

	require_once("dbutil.class.php");
	
	
	if(   isset($_POST['category']) && !empty($_POST['category'])
	&&isset($_POST['description']) && !empty($_POST['description'])){
		
			
		$ld = DBUtil::createCategory($_POST['category'],$_POST['description']);
		echo 1;

	} else {
		echo 0;
	}

?>
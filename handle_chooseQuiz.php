<?php

	session_start();

	require_once("dbutil.class.php");
  
	if(   isset($_POST['id']) && !empty($_POST['id'])){
			$_SESSION['playQuiz'] = $_POST['id'];
			echo 1;	
	} else {
		echo 0;
	}

?>
<?php

	session_start();

	require_once("dbutil.class.php");

	$owner = $_SESSION['name'];
	
	
	if(   isset($_POST['quizname']) && !empty($_POST['quizname'])
	&& isset($_POST['quizdescription']) && !empty($_POST['quizdescription'])
	&& isset($owner) && !empty($owner)){
		
			
		$ld = DBUtil::createQuiz($_POST['quizname'], $_POST['quizdescription'], $_POST['category_id'], $owner);
		echo 1;

		

	} else {
		echo 0;
	}

?>
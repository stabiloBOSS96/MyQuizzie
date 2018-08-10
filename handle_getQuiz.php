<?php 
	session_start();

	require_once("dbutil.class.php");

	$quizid = $_SESSION['playQuiz'];
	
	$ld = DBUtil::getQuestionsById($quizid);
		
	echo json_encode($ld);
	
?>


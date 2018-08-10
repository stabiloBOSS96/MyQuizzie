<?php

	session_start();

	require_once("dbutil.class.php");

	$counter = 1;
	$owner = $_SESSION['name'];

	if (isset($_POST['quizname']) && !empty($_POST['quizname'])){
		while(isset($_POST['question_'.$counter])){

			if(isset($_POST['question_'.$counter]) && !empty($_POST['question_'.$counter])
			&& isset($_POST['answer_a_'.$counter]) && !empty($_POST['answer_a_'.$counter])
			&& isset($_POST['answer_b_'.$counter]) && !empty($_POST['answer_b_'.$counter])
			&& isset($_POST['answer_c_'.$counter]) && !empty($_POST['answer_c_'.$counter])
			&& isset($_POST['answer_d_'.$counter]) && !empty($_POST['answer_d_'.$counter])
			&& isset($_POST['answer_correct_'.$counter]) && !empty($_POST['answer_correct_'.$counter])){
			
				$ld = DBUtil::buildQuestion($_POST['question_'.$counter], $_POST['answer_a_'.$counter], $_POST['answer_b_'.$counter], $_POST['answer_c_'.$counter], $_POST['answer_d_'.$counter], $_POST['answer_correct_'.$counter], $_POST['quizname'], $owner);
				
				$counter = $counter+1;
				
			} else {
				echo 0;
				break;
			}
		
		}
		echo 1;
	}else{
		echo 0;
	}

	

?>
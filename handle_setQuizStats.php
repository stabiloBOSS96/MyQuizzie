<?php

    session_start();

	require_once("dbutil.class.php");

    
    $points = $_POST['points'];
$maxPoints = $_POST['maxPoints'];
$quizId = $_SESSION['playQuiz'];

$_SESSION['achievedPoints'] = $points;
$_SESSION['ofPoints'] = $maxPoints;

    if(   isset($_SESSION['name']) && !empty($_SESSION['name'])){
       
        $owner = $_SESSION['name'];

    $ld = DBUtil::setStats($points,$maxPoints,$quizId,$owner);
    
    
    }
    echo 1;

    
?>

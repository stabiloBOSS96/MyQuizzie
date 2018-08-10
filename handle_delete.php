<?php
require_once("dbutil.class.php");

if(isset($_POST['id']) && !empty($_POST['id'])){

		DBUtil::deleteQuiz($_POST['id']);
}

?>

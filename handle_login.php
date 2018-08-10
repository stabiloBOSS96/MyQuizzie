<?php

	session_start();

	require_once("dbutil.class.php");

	if(   isset($_POST['anmeldename']) && !empty($_POST['anmeldename'])
		&& isset($_POST['pass']) && !empty($_POST['pass'])){
		
		$ld = DBUtil::checkLogin($_POST['anmeldename'], $_POST['pass']);
		
		if($ld != null && $ld->id > 0){
			$_SESSION['login'] = 1;
			$_SESSION['name'] = $_POST['anmeldename'];
			echo 1;
		} else {
			echo 0;
			$_SESSION['login'] = 0;
			$_SESSION['name'] = '';
		}
		
	} else {
		echo 0;
	}

?>
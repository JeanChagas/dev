<?php
	if(!isset($_SESSION)){
		session_start();
	}

	$complemento = $_SERVER['REDIRECT_URL'];

	if(empty($_SESSION['array'])){
		session_destroy();

		require_once(VIEWS.'login.php');
	}
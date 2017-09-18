<?php
	$sala = new Sala();
    $salas = array();

    $salas = $sala->read();

    $falhou = true;

    require(VIEWS."home.php");
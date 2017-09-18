<?php

	$where = array(
		'id' => '5'
	);


	$dados = array(
		'numero'   => '101',
		'apelido'  => '"Segundo"',
		'projetor' => '1'
	);

    $sala = new Sala();
    $sala->update($dados, $where);
<?php

	$dados = array(
        'numero'   => '101',
        'apelido'  => '"Segundo"'
    );
    $sala = new Sala();
    print_r($sala->read($dados));
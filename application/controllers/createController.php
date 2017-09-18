<?php
	$dados = array(
    					'numero'   => '001',
    					'apelido'  => '"primeiro"',
    					'projetor' => '0'
    				);

                    $sala = new Sala();
                    $sala->create($dados);
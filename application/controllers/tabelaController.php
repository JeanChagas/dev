<?php

$reserva = new Reserva();
$reservas = array();
$atual = date("Y-m-d H:i:s");
list($dataAtual, $horaAtual) = explode(" ", $atual);
$dados = array(
    'id_sala' => $request[1]
);
$reservas = $reserva->read($dados);
$usuario = new Usuario();
$usuarios = $usuario->read();



require(VIEWS."tabela.php");
                    
<?php
	$where = array(
		'id' => '3'
	);

    $sala = new Sala();
    print_r($sala->delete($where));
   
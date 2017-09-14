<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">	
        <title>Home</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="assets/css/estilo.css" rel="stylesheet">
        <link rel="shortcut icon" href="assets/img/favicon.ico">
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700" rel="stylesheet" type="text/css">
       <style>
            div.main{
				margin: 100px 0px 0px 0px;
				text-align: center;

			}
			
        </style>
		
    </head>
    <body>
        <?php
			require_once(VIEWS."cabecario.php");		
        ?>
		
     	<div class="main">
			<div class="container">	
			<h1>Reservas</h1>

			<?php
				$sala = array();
                $usuario = array();
                $cont = 0;
                if(empty($reservas)){
                    $cont++;
                    echo 'Não há reservas';
                }else{
                    foreach ($reservas as $key => $value) {
                        $atual = date("Y-m-d H:i:s");
                        if($atual < $value['data'].' '.$value['hora']){
                            $cont++;

                            $id_sala = array(
                                'id' => $value['id_sala']
                            );

                            $id_usuario = array(
                                'id' => $value['id_usuario']
                            );

                            $salas = new Sala();
                            $check = $salas->read($id_sala);


                            $sala[$key] = new Sala();
                            $sala[$key]->setId($check[0]['id']);
                            $sala[$key]->setNumero($check[0]['numero']);
                            $sala[$key]->setApelido($check[0]['apelido']);
                            $sala[$key]->setProjetor($check[0]['projetor']);

                            $usuarios = new Usuario();
                            $check = $usuarios->read($id_usuario);

                            $usuario[$key] = new Usuario();
                            $usuario[$key]->setId($check[0]['id']);
                            $usuario[$key]->setNome($check[0]['nome']);
                            $usuario[$key]->setSetor($check[0]['setor']);
                            $usuario[$key]->setEmail($check[0]['email']);
                            $usuario[$key]->setUsername($check[0]['username']);
                            $usuario[$key]->setPassword($check[0]['password']);

                            list($nome) = explode(" ",  $usuario[$key]->getNome());
                            list($hora, $min, $seg) = explode(":",  $value['hora']);
                            list($ano, $mes, $dia) = explode("-",  $value['data']);

                        
                        
                            echo '<div class="row">';
                            echo    '<div class="col-md-1 col-xs-1">';
                            echo    '</div>';                  
                            echo    '<div class="col-md-11 col-xs-11 salas">';
                            echo        '<h1><i class="fa fa-eercast" aria-hidden="true"></i> Auditorio '. $sala[$key]->getNumero() .'</h1>';
                            echo        '<small>• '. $sala[$key]->getApelido() .' •</small>';  
                            echo        '<br>';       
                            echo        '<small>Reserva de '. $nome .' no dia '. $dia .'/'. $mes .'/'.$ano.' as '. $hora .':'. $min .'</small>';

                            if($_SESSION['array'][0]['id'] == $usuario[$key]->getId()){
                                echo '<form class="register-form" action="reservas" method="post">';
                                echo '<button style="color:rgb(58,26,90);" name="remover" value="'. $value['id'] .'" type="submit">Remover reservar</button>';
                                echo '</form>';  
                            }

                            echo    '</div>';
                            echo    '<div class="col-md-1 col-xs-1">';
                            echo    '</div>';
                            echo '</div>';

                        }
                        
                    }
            
                }

                if($cont == 0){
                    echo 'Não há reservas';
                }
				
            ?>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                $('[data-toggle="popover"]').popover();   
            });

            $(document).ready(function() {
                $('.navbar a.dropdown-toggle').on('click', function(e) {
                    var $el = $(this);
                    var $parent = $(this).offsetParent(".dropdown-menu");
                    $(this).parent("li").toggleClass('open');

                    if(!$parent.parent().hasClass('nav')) {
                        $el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
                    }

                    $('.nav li.open').not($(this).parents("li")).removeClass("open");

                    return false;
                });
            });

        </script>
    </body>
</html>                   
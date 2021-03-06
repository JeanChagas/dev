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
			<h1>Auditórios</h1>

			<?php
				
                if(isset($falhou)){
                    if($falhou){                       

                         echo '<div class="row">
                                     <div class="col-md-4 col-xs-4 "></div>
                                     <div class="col-md-4 col-xs-4 alert alert-danger ">
                                        <span>Falha da reserva!</span>
                                     </div>
                              </div>';     
                    }                    
                }



				$auditorio = array();
				if(empty($salas)){
					echo 'Não há salas';
				}else{



				foreach ($salas as $key => $value) {

					$auditorio[$key] = new Sala();

					$auditorio[$key]->setId($value['id']);
					$auditorio[$key]->setNumero($value['numero']);
					$auditorio[$key]->setApelido($value['apelido']);
					$auditorio[$key]->setProjetor($value['projetor']);

					echo '<div class="row">';
					echo '<div class="col-md-1 col-xs-1">';
					echo '</div>';					
					echo '<div class="col-md-11 col-xs-11 salas">';
					echo '<h1><i class="fa fa-eercast" aria-hidden="true"></i> Auditorio '. $auditorio[$key]->getNumero() .'</h1>';
					echo '<small>• '. $auditorio[$key]->getApelido() .' •</small>';
					echo '<form class="register-form" action="reservas/'.$auditorio[$key]->getId().'" method="post">';
					echo '<label><input style="color:rgb(58,26,90);" type="text" required="" value="" name="data" placeholder="dia/mês/ano"/></label>';
					echo ' - ';
				    echo '	<label><select class="form-control" id="exampleSelect1" name="hora">
                                    <option>00:00</option>
                                    <option>01:00</option>
                                    <option>02:00</option>
                                    <option>03:00</option>   
                                    <option>04:00</option> 
                                    <option>05:00</option>
                                    <option>06:00</option>
                                    <option>07:00</option>
                                    <option>08:00</option>   
                                    <option>09:00</option> 
                                    <option>10:00</option>
                                    <option>11:00</option>
                                    <option>12:00</option>
                                    <option>13:00</option>   
                                    <option>14:00</option> 
                                    <option>15:00</option>
                                    <option>16:00</option>
                                    <option>17:00</option>
                                    <option>18:00</option>   
                                    <option>19:00</option>  
                                    <option>20:00</option>
                                    <option>21:00</option>
                                    <option>22:00</option>   
                                    <option>23:00</option> 
                                </select></label>';
					echo '<br><br>';
				    echo '<button style="color:rgb(58,26,90);" type="submit">Reservar</button>';
				    echo '</form>'; 
				    echo '<br>';
				    echo '<p class="message">Tabela do dia <a href="tabela/'.$auditorio[$key]->getId().'"><b>aqui</b></a></p>';            	     
					echo '</div>';
					echo '<div class="col-md-1 col-xs-1">';
					echo '</div>';
					echo '</div>';
				}
				


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
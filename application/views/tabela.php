<!DOCTYPE html>
<?php
  /**/

?>
<html>
    <head>
        <meta charset="utf-8">
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">	
        <title>Home</title>
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="/assets/css/estilo.css" rel="stylesheet">
        <link rel="shortcut icon" href="/assets/img/favicon.ico">
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700" rel="stylesheet" type="text/css">
       <style>
            div.main{
				margin: 100px;
                                
				text-align: center;
                                
			}
			
        </style>
		
    </head>
    <body>
        <?php
		    	require_once(VIEWS."cabecario.php");		
        ?>
		
     	<div class="main">
            <div class="container" > 
            <h1>Reservas do dia</h1>
            
            
                <div class="col-md-4 col-xs-4">
                </div>
                <div class="col-md-4 col-xs-4">
                    <table>
                        <tr>
                          <th>Horarios</th><th>Reservas</th>
                        </tr>
                        
                        <?php
                             
                            $reservador = ' ';
                            
                            for($i = 0; $i < 10; $i++){
                                $cont = 0;
                                if(!empty($reservas)){
                                    foreach ($reservas as $key => $value) {
                                        if($value['data'] == $dataAtual){
                                            $timestampAtual = strtotime('0'.$i.':00:00');
                                            $timestampReserva = strtotime($value['hora']);
                                        
                                            
                                            if($timestampReserva <= $timestampAtual && $timestampReserva + 3600 > $timestampAtual){
                                                
                                                foreach ($usuarios as $key => $usuario) {
                                                    
                                                    if($usuario['id'] == $value['id_usuario']){
                                                        $reservador = $usuario['username'];
                                                        echo '  <tr>
                                                                  <td>0'.$i.':00</td><td>'. $reservador .'</td>
                                                                </tr>';
                                                    }
                                                    
                                                }      
                                            }

                                            

                                        }
                                    }
                                }
                                


                                if($cont == 0){
                                        echo '  <tr>
                                                  <td>0'.$i.':00</td><td> </td>
                                                </tr>';
                                        
                                    }
                            }
                            
                            for($i = 10; $i < 24; $i++){
                                $cont = 0;
                                if(!empty($reservas)){
                                    foreach ($reservas as $key => $value) {
                                        if($value['data'] == $dataAtual){
                                            $timestampAtual = strtotime($i.':00:00');
                                            $timestampReserva = strtotime($value['hora']);

                                            
                                                                                      
                                            if($timestampReserva <= $timestampAtual && $timestampReserva + 3600> $timestampAtual){
                                                  
                                                foreach ($usuarios as $key => $usuario) {
                                                    if($usuario['id'] == $value['id_usuario']){
                                                        $reservador = $usuario['username'];
                                                        echo '  <tr>
                                                                  <td>'.$i.':00</td><td>'.$reservador.'</td>
                                                                </tr>';
                                                        $cont++;
                                                    }
                                                    
                                                }  
                                            }


                                            

                                        }
                                    }

                                } 
                                if($cont == 0){
                                       echo '  <tr>
                                                  <td>'.$i.':00</td><td> </td>
                                                </tr>';
                                       
                                    }
                                
                                
                            }                         
                        ?>

                    </table>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
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
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
            <h1>Registro de salas</h1>
                    

                <div class="login-page">
                  <div class="form">
                   
                    <form class="login-form" action="registro" method="post">
                      <input type="text" required="" value="" name="numero" placeholder="Numero"/>
                      <input type="text" required="" value="" name="apelido" placeholder="Apelido"/>                      
                        <div class="checkbox">
                          <input type="checkbox" name="projetor" value="">Tem Projetor?
                        </div>
                      <button type="submit">Cadastrar</button>
                     
                    </form>
                  </div>
                </div>


                  
                  </br></br> 
                  <?php
                  
                    if(isset($tem)){
                        if($tem){
                            echo '<div class="row">
                                         <div class="col-md-4 col-xs-4 "></div>
                                         <div class="col-md-4 col-xs-4 alert alert-success ">
                                            <span>Registrado com sucesso!</span>
                                         </div>
                                  </div>';
                        }else{
                           
                            echo '<div class="row">
                                         <div class="col-md-4 col-xs-4 "></div>
                                         <div class="col-md-4 col-xs-4 alert alert-danger ">
                                            <span>Ocorreu um erro no registro!</span>
                                         </div>
                                  </div>';
                        }
                        
                    }
                ?>
                </div>                
            </div>
           
	


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
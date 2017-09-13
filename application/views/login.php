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

			
				<div class="login-page">
				  <div class="form">
				    <form class="register-form" action="index" method="post">
				      <input type="text" required="" value="" name="nome" placeholder="name"/>
				      <input type="password" required="" value="" name="password" placeholder="password"/>
				      <input type="email" required="" value="" name="email" placeholder="email address"/>
				      <button type="submit">create</button>
				      <p class="message">Already registered? <a href="#">Sign In</a></p>
				    </form>
				    <form class="login-form" action="index" method="post">
				      <input type="text" required="" value="" name="username" placeholder="username"/>
				      <input type="password" required="" value="" name="password" placeholder="password"/>
				      <button type="submit">login</button>
				      <p class="message">Not registered? <a href="#">Create an account</a></p>
				    </form>
				  </div>
				</div>
				<?php
					if(isset($_POST['falha'])){
	                    if($_POST['falha']){
	                       

	                         echo '<div class="row">
	                                     <div class="col-md-4 col-xs-4 "></div>
	                                     <div class="col-md-4 col-xs-4 alert alert-danger ">
	                                        <span>Falha no registro!</span>
	                                     </div>
	                              </div>';     
	                    }else{
	                       
	                        echo '<div class="row">
	                                     <div class="col-md-4 col-xs-4 "></div>
	                                     <div class="col-md-4 col-xs-4 alert alert-success ">
	                                        <span>Registrado com sucesso!</span>
	                                     </div>
	                              </div>';
	                    }
	                    
	                }
	                if(isset($_POST['falhou'])){
	                    if($_POST['falhou']){
	                       

	                         echo '<div class="row">
	                                     <div class="col-md-4 col-xs-4 "></div>
	                                     <div class="col-md-4 col-xs-4 alert alert-danger ">
	                                        <span>Senha invalida!</span>
	                                     </div>
	                              </div>';     
	                    }
	                    
	                }
                ?>
			</div>	

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

			$('.message a').click(function(){
			   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
			});

		</script>
    </body>
</html>					  
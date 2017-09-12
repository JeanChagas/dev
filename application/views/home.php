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


			<?php
				foreach ($salas as $key => $value) {
					echo '<div class="row">';
					echo '<div class="col-md-1 col-xs-1">';
					echo '</div>';
					echo '<a href="#"><div class="col-md-10 col-xs-10 salas">';
					echo '<h1><i class="fa fa-eercast" aria-hidden="true"></i> Auditorio '. $value['numero'] .'</h1>';
					echo '<small>• '. $value['apelido'] .' •</small>';
					echo '</div></a>';
					echo '<div class="col-md-1 col-xs-1">';
					echo '</div>';
					echo '</div>';
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
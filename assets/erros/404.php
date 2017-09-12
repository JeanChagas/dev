<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">	
        <title>Ops!</title>
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
			<div class="container">		
				<h2>ERRO 404</h2>
				<BR>		
				
				<BR>
				<img src="/assets/img/404-bg-line-one.png">
			</div>
		</div>
	


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
		<script>
			 $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();   
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
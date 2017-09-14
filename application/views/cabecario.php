<?php
 
    
	echo '<div class="navbar navbar-default navbar-fixed-top cab" role="navigation">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-xs-4" ><a id="icon3" href="'._DOMAIN.'"><img src="/assets/img/logo-logo-a.png" style="margin:15px;"></a></div>
					<div class="col-md-4 col-xs-0"></div>
                    <div class="col-md-3 col-xs-0"></div> 
					<div class="col-md-1 col-xs-2 " id="icon" >	';
        if(isset($_SESSION['array'])){
            list($nomesession) = explode(" ", $_SESSION['array'][0]['nome']);
          //  unset($restante);

            echo        '<div class="collapse navbar-collapse">

                            <ul class="nav navbar-nav" >
                                <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> '. $nomesession .' <b class="caret"></b></a>

                                    <ul class="dropdown-menu">
                                        <li><a href="'._DOMAIN.'/registro">Registrar</a></li>  
                                        <li><a href="'._DOMAIN.'/reservas">Reservas</a></li>  
                                        <li class="divider"></li>
                                        <li><a href="'._DOMAIN.'/editar">Editar</a></li>
                                        <li class="divider"></li>
                                        <li><a href="'._DOMAIN.'/logout">Logout</a></li>
                                        
                                    </ul>
                                </li>
                            </ul>
                        </div>';
        }          
			
			echo 	'</div>
				</div>
			</div>		
		</div>';

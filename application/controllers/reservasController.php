<?php

	 if(isset($_POST['remover'])){
	        $reserva = new Reserva();
	        $dados = array(
	            'id_usuario' => $_SESSION['array'][0]['id'],
	            'id'    => $_POST['remover']
	        );
	        if($reserva->delete($dados)){

	            $reservas = $reserva->read();
	            require_once(VIEWS."reservas.php");
	            exit();
	        }else{
	            $falhou = true;
	            header("location: "._DOMAIN."/falhou");
	            exit();
	        }
	    }

	    if(isset($_POST['hora']) && isset($_POST['data'])){

	        if(preg_match("/(2[0-3]|[01][0-9]):([0-5][0-9])/", $_POST['hora'])){
	            $_POST['hora'] .= ':00' ;
	        }else{
	            $falhou = true;
	            header("location: "._DOMAIN."/falhou");
	            exit();
	        }

	        list($dia, $mes, $ano) = explode('/', $_POST['data']);
	        $pattern = $ano.'-'.$mes.'-'.$dia;

	        $sala = new Sala();
	        $user = new Usuario();
	        $reserva = new Reserva();

	        $id_sala = array(
	            'id' => $request[1]
	        );

	        $id_usuario = array(
	            'id' => $_SESSION['array'][0]['id']
	        );

	        $auditorio = $sala->read($id_sala);
	        $usuario = $user->read($id_usuario);
	        $reservas = $reserva->read();

	        $dadosReserva = array(
	            'data'       => '"'.$pattern.'"',
	            'hora'       => '"'.$_POST['hora'].'"',
	            'id_usuario' => $_SESSION['array'][0]['id'],
	            'id_sala'    => $request[1]
	        );
	        $atual = date("Y-m-d H:i:s");
	        if($dadosReserva['data'].' '.$dadosReserva['hora'] > $atual){
	            $falhou = true;
	            header("location: "._DOMAIN."/falhou");
	            exit();
	        }


	        if(empty($reservas)){
	            
	            if($reserva->create($dadosReserva)){
	                header("location: "._DOMAIN."/reservas");
	            }else{
	                $falhou = true;
	                header("location: "._DOMAIN."/falhou");
	                exit();
	            }                            
	            
	        }else{
	            $sucesso = true;

	            foreach ($reservas as $key => $value) {

	                if(($value['data'] == $pattern && $value['id_sala'] == $request[1])){

	                    $timestampReserva = strtotime($value['hora']);
	                    $timestampPost = strtotime($_POST['hora']);
	                 

	                  
	                    if(($timestampReserva-3600) < $timestampPost && ($timestampReserva + 3600) > $timestampPost){
	                     
	                            $sucesso = false;
	                        
	                    }                          
	                }


	            }
	            if($sucesso){
	                if($reserva->create($dadosReserva)){
	                    header("location: "._DOMAIN."/reservas");
	                    exit();
	                }else{
	                    $falhou = true;
	                    header("location: "._DOMAIN."/falhou");
	                    exit();
	                }
	            }else{
	                 
	                $falhou = true;
	                header("location: "._DOMAIN."/falhou");
	                exit();
	            }
	        }
	    }else{

	        if(isset($request[1])){
	            require_once(ERROS."404.php");
	            exit();
	        }else{
	            $reserva = new Reserva();

	            $reservas = $reserva->read();
	            require_once(VIEWS."reservas.php");
	            exit();
	        }

	        
	        
	    }   
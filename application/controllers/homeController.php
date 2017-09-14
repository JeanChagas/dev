<?php 

    

	function __autoload($file){
        
        if(file_exists(MODELS.$file.".class.php")){
            
            require_once(MODELS.$file.".class.php");

	    }elseif(file_exists(CONTROLLERS.$file.".php")){
            
            require_once(CONTROLLERS.$file.".php");
            
        }else{            
           
            require_once(ERROS."404.php");
            exit();
            
        }
        
    }  
    require_once(CONTROLLERS."loginController.php");

    $aux = (isset ($_GET['url']) ? $_GET['url'] : 'index');

    $request = array();
    $request = explode('/', $aux);

    switch ($request[0]){

    		case "create":

    				$dados = array(
    					'numero'   => '001',
    					'apelido'  => '"primeiro"',
    					'projetor' => '0'
    				);

                    $sala = new Sala();
                    $sala->create($dados);
                   
                    break;

            case "read":
                    $dados = array(
                        'numero'   => '101',
                        'apelido'  => '"Segundo"'
                    );
                    $sala = new Sala();
                    print_r($sala->read($dados));

                   
                    break;

            case "update":
            		$where = array(
            			'id' => '5'
            		);


            		$dados = array(
    					'numero'   => '101',
    					'apelido'  => '"Segundo"',
    					'projetor' => '1'
    				);

                    $sala = new Sala();
                    $sala->update($dados, $where);
                   
                    break;

            case "delete":

            		$where = array(
            			'id' => '3'
            		);

                    $sala = new Sala();
                    print_r($sala->delete($where));
                   
                    break;

            case "phpinfo":               
                    require_once("system/phpinfo.php");
                    exit();
                    break; 

            case "reservas": 
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
                            exit();ie;
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
                                 

                                  
                                    if(($timestampReserva - 3600) > $_POST['hora'] || ($timestampReserva + 3600) < $timestampPost){
                                     
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


                    break;                  
                        
            case "index":

                    $sala = new Sala();
                    $salas = array();

                    $salas = $sala->read();

                    

                    require_once(VIEWS."home.php");
                    break;

            case "logout":
                    require(CONTROLLERS."logoutController.php");
                    break;

            case "registro":
                    if(isset($_POST['numero']) && isset($_POST['apelido'])){
                      
                        $projetor = (isset ($_POST['projetor']) ? 1 : 0);

                        $sala = new Sala();

                        

                        $dados = array(
                            'numero'   => $_POST['numero'],
                            'apelido'  => '"'.$_POST['apelido'].'"',
                            'projetor' => $projetor

                        );

                        $tem = $sala->create($dados);
                    }

                    require(VIEWS."registro.php");
                    break;

            case "falhou":
                    $sala = new Sala();
                    $salas = array();

                    $salas = $sala->read();

                    $falhou = true;

                    require(VIEWS."home.php");
                    break;

            default:
                    require_once(ERROS."404.php");
                    break;



    }

 ?>

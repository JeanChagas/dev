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

    $lista = array();
    $lista = explode('/', $aux);

    switch ($lista[0]){

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

                   /* $user = new Usuario();
                    $dados = array(
                        'username' => '"jean.chagas"'
                     );
                    print_r($user->read($dados));*/
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
                        
            case "index":

                    $sala = new Sala();
                    $salas = array();

                    $salas = $sala->read();

                    require_once(VIEWS."home.php");
                    break;

            case "logout":
                    require(CONTROLLERS."logoutController.php");
                    break;

            default:
                    require_once(ERROS."404.php");
                    break;



    }

 ?>

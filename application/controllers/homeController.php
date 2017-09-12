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
                    $sala = new Sala();
                    print_r($sala->read());
                   
                    break;

            case "update":
            		$where = array(
            			'id' => '3'
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
                    require(VIEWS."home.php");
                    break;

            case "logout":
                    require(VIEWS."logout.php");
                    break;

            default:
                    require_once(ERROS."404.php");
                    break;



    }

 ?>

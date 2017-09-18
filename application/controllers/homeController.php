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

    				require_once(CONTROLLERS.$request[0].'Controller.php');
                    
                    break;

            case "read":
                    
                    require_once(CONTROLLERS.$request[0].'Controller.php');
                    
                    break;

            case "update":
            		
                    require_once(CONTROLLERS.$request[0].'Controller.php');
                    
                    break;;

            case "delete":

                    require_once(CONTROLLERS.$request[0].'Controller.php');
            		
                    break;

            case "phpinfo":               
                    require_once("system/phpinfo.php");
                    exit();
                    break; 

            case "reservas": 
                   
                    require_once(CONTROLLERS.$request[0].'Controller.php');
                    
                    break;                  
                        
            case "index":

                    $sala = new Sala();
                    $salas = array();

                    $salas = $sala->read();

                    

                    require_once(VIEWS."home.php");
                    break;

            case "logout":
                    require_once(CONTROLLERS.$request[0].'Controller.php');
                    break;

            case "registro":
                    
                    require_once(CONTROLLERS.$request[0].'Controller.php');

                    break;

            case "falhou":
                    
                    require_once(CONTROLLERS.$request[0].'Controller.php');
                    break;

            case "tabela":
                if(isset($request[1])){
                    
                    require_once(CONTROLLERS.$request[0].'Controller.php');

                }else{
                    require_once(ERROS."404.php");
                }
                    break;

            default:
                    require_once(ERROS."404.php");
                    break;



    }

 ?>

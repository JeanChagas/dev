<?php
	if(!isset($_SESSION)){
		session_start();
	}

	$complemento = $_SERVER['SCRIPT_URL'];

	if(empty($_SESSION['array'])){
		

		if(isset($_POST['email'])){
			session_destroy();
			require_once(CONTROLLERS.'registroController.php');
			
		}else{

			if(isset($_POST['username']) && isset($_POST['password'])){
				$username = explode('@', $_POST['username']);
				$_POST['username'] = $username[0]; 

			
				$user = new Usuario();
				$dados = array(
					'username' => '"'.$_POST['username'].'"',
					'password' => 'md5("'.$_POST['password'].'")'
				);
				
				$check = $user->logar($dados);
				
				if (!empty($check)) {
					
				    $_SESSION['array'] = $check;
				    /*$_SESSION = array();
				  	$_SESSION['array'] = array(
	   					'id' 		=> 	$check['id'],
						'nome'  	=> 	$check['nome'],
						'setor' 	=> 	$check['setor'],
						'email' 	=> 	$check['email'],
						'usuario' 	=> 	$check['username'],
						'password'	=> 	$check['password']
				   	);*/
				 
				 header('location: '.$_SERVER['REDIRECT_REDIRECT_SCRIPT_URI']); 	
					
				} else {
					session_destroy();
					$_POST = array('falhou' => '1');
					require_once(VIEWS.'login.php');
					exit();
				}
				
			}else{
				require_once(VIEWS.'login.php');
				exit();

			}
		}

		
	}
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

				foreach ($check as $key => $value) {
					$user->setId($check[$key]['id']);
					$user->setNome($check[$key]['nome']);
					$user->setSetor($check[$key]['setor']);
					$user->setEmail($check[$key]['email']);
					$user->setUsername($check[$key]['username']);
					$user->setPassword($check[$key]['password']);
				}

				

				if (!empty($check)) {
					
				    $_SESSION['array'] = $check;
				 
							
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
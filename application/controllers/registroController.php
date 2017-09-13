<?php
	if(isset($_POST['email'])){
		$username = explode('@', $_POST['email']);
		$_POST['username'] = $username[0]; 
		
		$user = new Usuario();
		//print_r($user->read()); die;

		foreach ($user->read() as $key => $value) {
			if($value['email'] == $_POST['email'] || $value['username'] == $_POST['username']){
				$check = false;
				$_POST = array('falha' => '1');
				require_once(VIEWS.'login.php');
				exit();
			}else{
				$check = true;
			}
		}

		if($check){
			$dados = array(
				'nome'     => 	 '"'.$_POST['nome'].'"',
				'email'    =>    '"'.$_POST['email'].'"',
				'username' =>    '"'.$_POST['username'].'"',
				'password' =>    'md5("'.$_POST['password'].'")'
			);

			//print_r($dados); die;

			$user->create($dados);
			$_POST = array('falha' => '0');
			require_once(VIEWS.'login.php');
			exit();
		}

	}
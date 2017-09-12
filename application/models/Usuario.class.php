<?php
  class Usuario extends UsuariosDAO{
        
        private $id;
        private $nome;
        private $setor;
        private $email;
        private $username;
        private $password;
        
        
        
        
        /*******GET/SET*********/
        
        public function getNome(){
            return $this->nome;
        }
        
        public function setNome($nome){
            $this->nome = $nome;
        }

         public function getSetor(){
            return $this->setor;
        }
        
        public function setSetor($setor){
            $this->setor = $setor;
        }
        
        public function getEmail(){
            return $this->email;
        }
        
        public function setEmail($email){
            $this->email = $email;
        }
        
        public function getUsername(){
            return $this->username;
        }
        
        public function setUsername($username){
            $this->username = $username;
        }

        public function getPassword(){
            return $this->password;
        }
        
        public function setPassword($password){
            $this->password = $password;
        }
        
        
        /***PROCEDIMENTOS E FUNÇÕES***/
        
        //standby        
        
    }



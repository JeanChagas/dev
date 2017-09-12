<?php
  class Sala extends SalasDAO{
        
        private $id;
        private $numero;
        private $apelido;
        private $projetor;
        
        
        
        
        /*******GET/SET*********/

        public function getId(){
            return $this->id;
        }
        
        public function setId($id){
            $this->id = $id;
        }
        
        public function getNumero(){
            return $this->numero;
        }
        
        public function setNumero($numero){
            $this->numero = $numero;
        }

         public function getApelido(){
            return $this->apelido;
        }
        
        public function setApelido($apelido){
            $this->apelido = $apelido;
        }
        
        public function getProjetor(){
            return $this->projetor;
        }
        
        public function setProjetor($projetor){
            $this->projetor = $projetor;
        }
        
        
        
        /***PROCEDIMENTOS E FUNÇÕES***/
        
        //standby        
        
    }


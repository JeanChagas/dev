<?php
  class Reserva extends ReservasDAO{
        
        private $id;
        private $data;
        private $hora;
        private $id_sala;
        private $id_usuario;
        
        
        
        
        /*******GET/SET*********/

        public function getId(){
            return $this->id;
        }
        
        public function setId($id){
            $this->id = $id;
        }
        
        public function getData(){
            return $this->data;
        }
        
        public function setData($data){
            $this->data = $data;
        }

         public function getHora(){
            return $this->hora;
        }
        
        public function setHora($hora){
            $this->hora = $hora;
        }
        
        public function getIdSala(){
            return $this->id_sala;
        }
        
        public function setIdSala($id_sala){
            $this->id_sala = $id_sala;
        }
        
        public function getIdUsuario(){
            return $this->id_usuario;
        }
        
        public function setIdUsuario($id_usuario){
            $this->id_usuario = $id_usuario;
        }
        
        
        /***PROCEDIMENTOS E FUNÇÕES***/
        
        //standby        
        
    }


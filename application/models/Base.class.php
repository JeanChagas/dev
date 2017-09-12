<?php
class Base extends Database{
    
    public $tabela;
     


        public function create(Array $dados){
            $campos = implode(", ", array_keys($dados));
            $valores  = implode(", ", array_values($dados));
            $sql = "INSERT INTO `".$this->tabela."`(".$campos.") VALUES (".$valores.");";
	    $statement = $this->dbconnect->prepare($sql);
            $statement->execute();
        }
        
        public function read(Array $where = null){

            $sql = "SELECT * FROM ".$this->tabela;
            

            if(!is_null($where)){
                $condicaoString = '';
                $condicoes = array();
                
                foreach (array_keys($where) as $nomeCampo) { 
                    $condicoes []= "`{$nomeCampo}` = :{$nomeCampo}";
                }

                $condicaoString = implode(' AND ', $condicoes);
                if (!empty($condicaoString)) {
                    $sql = $sql." WHERE {$condicaoString}";
                }
            }   

            $statement = $this->dbconnect->prepare($sql);  

            if(!is_null($where)){

                foreach ($where as $chave=>$value){

                    $statement->bindValue(":{$chave}", $value);
                       
                }   
            }   

            $statement->execute();
           
            return $statement->fetchAll(PDO::FETCH_ASSOC);
          
        }
        
        public function update(Array $dados, $where){
            
            $condicaoString = '';
            $condicoes = array();


            foreach($dados as $inds => $vals){
                    $campos[] = "`".$inds."` = ".$vals; 
            }
            
            $campos = implode(", ", $campos);
            
            $sql = "UPDATE `".$this->tabela."` SET ".$campos;

            
            foreach (array_keys($where) as $nomeCampo) { 
                $condicoes []= "`{$nomeCampo}` = :{$nomeCampo}";
            }

            $condicaoString = implode(' AND ', $condicoes);
            

            if (!empty($condicaoString)) {
                $sql = $sql." WHERE {$condicaoString}";
            }else{
                die('Ops! Falha na operação.');
            }

       
            $statement = $this->dbconnect->prepare($sql);  

            if(!is_null($where)){

                foreach ($where as $chave=>$value){

                    $statement->bindValue(":{$chave}", $value);
                       
                }   
            }   
    
            $statement->execute();
           
            
        }
         
        
        public function delete($where){
            
                $condicaoString = '';
                $condicoes = array();
                $sql = "DELETE FROM `".$this->tabela."`";
                
                foreach (array_keys($where) as $nomeCampo) { 
                    $condicoes []= "`{$nomeCampo}` = :{$nomeCampo}";
                }

                $condicaoString = implode(' AND ', $condicoes);
            	

                if (!empty($condicaoString)) {
                    $sql = $sql." WHERE {$condicaoString}";
                }else{
                    die('Ops! Falha na operação.');
                }

           
                $statement = $this->dbconnect->prepare($sql);  

                if(!is_null($where)){

                    foreach ($where as $chave=>$value){

                        $statement->bindValue(":{$chave}", $value);
                           
                    }   
                }   
		
                $statement->execute();
           
            
	}        
}

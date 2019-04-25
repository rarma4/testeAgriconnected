<?php

//include ("{$_SERVER['DOCUMENT_ROOT']}/learn/php/montarSite/class/ClassConexao.php");
include ("ClassConexao.php");

class ClassCrud extends ClassConexao{
	private $crud;
	private $contador;



	private function preparedStatements($query, $parametros){
		$this->countParametros($parametros);
		$this->crud=$this->conectaDB()->prepare($query);
		#echo $this->contador;

		if($this->contador > 0){
            for($i=1; $i <= $this->contador; $i++){
                $this->crud->bindValue($i,$parametros[$i-1]);
            }
        }

		$this->crud->execute();
	}
#Função do contador de parametros
	private function countParametros($parametros){
		$this->contador = count($parametros);
	}

#inserir no banco
	public function insertDB($tabela , $condicao , $parametros){
	    $this->preparedStatements("insert into {$tabela} values ({$condicao})" , $parametros);
	    return $this->crud;
	}

	#seleção no banco
	public function selectDB($campo, $tabela , $condicao , $parametros){
	    $this->preparedStatements("select {$campo} from {$tabela} {$condicao}" , $parametros);
	    return $this->crud;
	}

	#deletar do banco
	public function delDB($tabela, $condicao, $parametros){
		$this->preparedStatements("delete from {$tabela} where {$condicao}", $parametros);
		return $this->crud;
	}

	public function editDB($tabela, $set, $condicao, $parametros){
		$this->preparedStatements("update {$tabela} set {$set} where {$condicao}", $parametros);
		return $this->crud;
	}

	public function contar($campo, $campo2, $tabela , $condicao , $parametros){
	    $this->preparedStatements("select {$campo} count({$campo2}) from {$tabela} {$condicao}" , $parametros);
		return $this->crud;
		//select estado, count(estado) from usuarios group by estado; 
	}
	


}





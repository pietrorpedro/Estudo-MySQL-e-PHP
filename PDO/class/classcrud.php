<?php
class ClassCrud extends ClassConexao{
    #atributos
    private $crud;
    private $contador;

    #preparação das declarativas
    private function preparedStatements($query, $parametros){
        $this->countParametros($parametros);
        $this->crud = $this->connectDB()->prepare($query); # "$this->connectDB" pega da classe ClassConexao do arquivo classconexao.php ||crud vai chamar do banco de dados o connectDB e preparar a query
        if($this->contador > 0){
            for($i=1; $i <= $this->contador; $i++){
                $this->crud->bindValue($i, $parametros[$i-1])
            }            
        }

        $this->crud->execute();
    }
    #contador de parametros
    private function countParametros($parametros){
        $this->contador = count($parametros);
    }
}
<?php
abstract class ClassConexao{ //classe de conexão do banco de dados
    protected function connectDB(){
        $Con = mysqli_connect("localhost","root","","crud"); //1: localização do servidor. 2: usuario. 3: senha. 4: nome do banco de dados.
        if($Con){ //se $con for positivo (ou funcionando) vai retornar ela mesmo, caso contrario ira mostrar um erro.
            return $Con;
        } else{
            echo 'DB Error -> ' .mysqli_connect_error();
        }
    }
}

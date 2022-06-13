<?php
abstract class ClassConexao{ //classe de conexão do banco de dados
    protected  function connectDB(){
        $Con = mysqli_connect("localhost","root","","crud");
        if($Con){
            return $Con;
        } else{
            echo 'DB não conectado ' .mysqli_connect_error();
        }
    }
}

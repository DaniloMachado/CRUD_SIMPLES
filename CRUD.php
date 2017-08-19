<?php

class crud {
    public function inserir($host, $db, $pass, $user, $tabela, $campos, $valores){
        
        try{
            $conn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex){
            echo 'ERRO'.$ex->getMessage();
        }
        
        try {            
            $stmt = $conn->prepare("INSERT INTO $tabela ($campos) VALUES ($valores)");
            $stmt->execute();
        } catch (Exception $ex) {
            echo 'ERRO'.$ex->getMessage();            
        }
    }
    public function atualizar($host, $db, $pass, $user, $tabela, $campos, $valores,$campo_codigo, $codigo){
        
        try{
            $conn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex){
            echo 'ERRO'.$ex->getMessage();
        }
        
        try {
            
            $array_campos = explode(",", $campos);
            $array_valores = explode(",",$valores);
            $count =count($array_valores);
            
            for($i=0; $i <$count; $i++){
                $stmt = $conn->prepare("UPDATE $tabela SET $array_campos[$i] = '$array_valores[$i]' WHERE $campo_codigo = $codigo");
                $stmt->execute();
            }
            
        } catch (Exception $ex) {
            echo 'ERRO'.$ex->getMessage();            
        }
    }
    public function deletar($host, $db, $pass, $user, $tabela, $campo_codigo, $codigo){
        
        try{
            $conn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex){
            echo 'ERRO'.$ex->getMessage();
        }
        
        try {            
            $stmt = $conn->prepare("DELETE FROM $tabela WHERE $campo_codigo = $codigo");
            $stmt->execute();
        } catch (Exception $ex) {
            echo 'ERRO'.$ex->getMessage();            
        }
    }
    public function selecionar_todos($host, $db, $pass, $user, $tabela){
        
        try{
            $conn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex){
            echo 'ERRO'.$ex->getMessage();
        }
        
        try {            
            $stmt = $conn->prepare("SELECT * FROM $tabela");
            $stmt->execute();
            $busca = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $busca;
            
        } catch (Exception $ex) {
            echo 'ERRO'.$ex->getMessage();            
        }
    }
    public function selecionar_especifico($host, $db, $pass, $user, $tabela, $campo_codigo, $codigo){
        
        try{
            $conn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex){
            echo 'ERRO'.$ex->getMessage();
        }
        
        try {            
            $stmt = $conn->prepare("SELECT * FROM $tabela WHERE $campo_codigo = $codigo");
            $stmt->execute();
            $busca = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $busca;
        } catch (Exception $ex) {
            echo 'ERRO'.$ex->getMessage();            
        }
    }
}

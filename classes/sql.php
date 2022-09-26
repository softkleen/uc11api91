<?php 
class Sql extends PDO{
    private $cn;
    public function __construct(){
        $this->cn = new PDO("mysql:host=127.0.0.1;dbname=controledb","root","");
    }
    // método que atribui parametros para uma query sql
    public function setParams($comando, $parametros = array()){
        foreach($parametros as $key => $value){
            $this->setParam($comando,$key, $value);
        }
    }
    // método para tratar o parâmetro
    public function setParam($cmd, $key, $value){
        $cmd->bindParam($key, $value); 
    }
    // executa comandos SQL no banco
    public function querySql($comandoSql, $params = array()){
       $cmd = $this->cn->prepare($comandoSql);
       $this->setParams($cmd, $params);
       $cmd->execute();
       return $cmd;
    }
    public function select($comandoSql, $params = array()){
        $cmd = $this->querySql($comandoSql, $params);
        return $cmd->fetchAll(PDO::FETCH_ASSOC);

    }
}
?>
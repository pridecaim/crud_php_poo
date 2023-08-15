<?php
include_once('conexao/conexao.php');
$db=new Database();
class Crud{
    private $conn;
    private $table_name="carros";
    public function __construct($db){//classe construtora serve para puxar a conexão sempre que for referenciada a variavel "conn"
        $this->conn=$db;
    }
    //fução para (C)riar meu registros
    public function create($postValues){
        $modelo=$postValues['modelo'];
        $marca=$postValues['marca'];
        $placa=$postValues['placa'];
        $cor=$postValues['cor'];
        $ano=$postValues['ano'];

        $query="INSERT ". $this->table_name ." (modelo, marca, placa, cor, ano) VALUES (?,?,?,?,?)";
        $stmt=$this->conn->prepare($query);
        $stmt->BindParam(1,$modelo);
        $stmt->BindParam(2,$marca);
        $stmt->BindParam(3,$placa);
        $stmt->BindParam(4,$cor);
        $stmt->BindParam(5,$ano);

        $rows=$this->read();
        if($stmt->execute()){
            print"<script>alert('Cadastro Ok!')</script>";
            print"<script>location.href='?action=read'; </script>";
            return true;
        }else{
            return false;
        }
    }

    //função para ler os registros
    public function read(){
        $query="SELECT * FROM ". $this->table_name;
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

}
?>
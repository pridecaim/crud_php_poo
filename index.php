<?php
require_once('classes/Crud.php');
require_once('conexao/conexao.php');

$database=new Database();
$db=$database->getConnection();
$crud=new Crud($db);

if(isset($_GET['action'])){
    switch($_GET['action']){
        case 'create':
            $crud->create($_POST);
            $rows=$crud->read();
            break;
            case 'read':
                $rows=$crud->read();
                break;
            //case update

            //case delete

            default:
            $rows=$crud->read();
            break;
    }
}else{
    $rows=$crud->read();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <style>
        form{
            max-width:500px;
            margin: 0 auto;
        }
         label{
            display: flex;
            margin-top:10px
         }
         input[type=text]{
            width:100%;
            padding: 12px 20px;
            margin: 8px 0;
            display:inline-block;
            border: 1px solid #ccc;
            border-radius:4px;
            box-sizing:border-box;
         }
         input[type=submit]{
            background-color:#4caf50;
            color:white;
            padding:12px 20px;
            border:none;
            border-radius:4px;
            cursor:pointer;
            float:right;
         }
         input[type=submit]:hover{
            background-color:#45a049;
         }
         table{
            border-collapse:collapse;
            width:100%;
            font-family:Arial, sans-serif;
            font-size:14px;
            color:#333;
         }
         th, td{
            text-align:left;
            padding:8px;
            border: 1px solid #ddd;
         }
        th{
           background-color:#f2f2f2;
           font-weight:bold; 
        }
        a{
            display:inline-block;
            padding:4px 8px;
            background-color: #007bff;
            color:#fff;
            text-decoration:none;
            border-radius:4px;
        }
        a:hover{
            background-color:#0069d9;
        }

        a.delete{
            background-color: #dc3545;
        }
        a.delete:hover{
            background-color:#c82333;
        }
    </style>
</head>
<body>
    <form action="?action=create" method="POST">
        <label for="modelo">Modelo</label>
        <input type="text" name="modelo">
        <label for="marca">Marca</label>
        <input type="text" name="marca">
        <label for="placa">Placa</label>
        <input type="text" name="placa">
        <label for="cor">Cor</label>
        <input type="text" name="cor">
        <label for="ano">Ano</label>
        <input type="text" name="ano">
        <input type="submit" value="Cadastrar" name="enviar">
    </form>
    <table>
        <tr>
            <td>Id</td>
            <td>Modelo</td>
            <td>Marca</td>
            <td>Placa</td>
            <td>Cor</td>
            <td>Ano</td>
        </tr>
    </table>
</body>
</html>
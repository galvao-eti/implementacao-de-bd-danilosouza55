<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trabalho</title>
</head>

<body>
<?php
require '../src/PosAlfa2019/Conexao.php';
$dados = new Conexao();
$dados->busca();
?>
</body>

</html>

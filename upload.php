<?php

$pastaDestino = "/uploads/";

$nomeArquivo = $_FILES['arquivo']['name'];

var_dump($_FILES['arquivo']['name']);

if (file_exists(__DIR__. $pastaDestino. $nomeArquivo)) {
    echo "Arquivo já existe";
    exit;
}

// var_dump(__DIR__. $pastaDestino. $nomeArquivo);

if($_FILES['arquivo']['size'] > 20000000)
{
echo "Arquivo muito grande";
exit;
}


//var_dump (basename($_FILES["arquivo"]["name"]));
$extensao = strtolower(pathinfo($nomeArquivo,PATHINFO_EXTENSION));
var_dump (strtolower(pathinfo($target_file,PATHINFO_EXTENSION)));

if($extensao != "jpg" and $extensao != "jpeg" and $extensao != "png" and $extensao != "gif"){
 echo "formato do arquivo invalido";
 exit;
}
<?php

$pastaDestino = "/uploads/";
$nomeArquivo = $_FILES['arquivo']['name'];
var_dump($_FILES['arquivo']['name']);
if (file_exists(__DIR__. $pastaDestino. $nomeArquivo)) {
    echo "Arquivo já existe";
    exit;
}
var_dump(__DIR__. $pastaDestino. $nomeArquivo); 
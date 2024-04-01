<?php

$pastaDestino = "/uploads/";
$nomeArquivo = $_FILES['arquivo']['name'];
var_dump($_FILES['arquivo']['name']);
file_exists(__DIR__. $pastaDestino. $nomeArquivo);
var_dump(__DIR__. $pastaDestino. $nomeArquivo); 
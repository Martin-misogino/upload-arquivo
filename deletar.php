<?php
$nome_arquivo = $_GET['nome_arquivo'];
$pastaDestino = "/uploads/";
$apagou = unlink(__DIR__ . $pastaDestino . $_POST['nome_arquivo']);
         if($apagou == true) {
            $conexao = mysqli_connect("localhost", "root", "", "upload_arquivos");
            $sql = "DELETE FROM arquivo WHERE nome_arquivo = '$nome_arquivo'";
            $resultado2 = mysqli_query($conexao,$sql);
            if($resultado2 == false) {
                echo "erro ao apagar arquivo do BD";
                die();
            }
         } else {
            echo "erro ao apagar arquivo";
            die();
         }
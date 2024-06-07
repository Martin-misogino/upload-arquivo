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
//var_dump (strtolower(pathinfo($target_file,PATHINFO_EXTENSION)));

if($extensao != "jpg" and $extensao != "jpeg" and $extensao != "png" and $extensao != "gif"){
 echo "formato do arquivo invalido";
 exit;
}
if(getimagesize($_FILES['arquivo']['tmp_name']) === false){
    echo"problemas ao enviar a imagem tente novamente";
}

$novoNomeArquivo = uniqid();

//se deu tudo certo até aqui faz o upload
var_dump($pastaDestino. $_FILES['arquivo']['name']);
var_dump(__DIR__.$pastaDestino. $_FILES['arquivo']['name']);
$fezUpload= move_uploaded_file($_FILES['arquivo']['tmp_name'],__DIR__ . $pastaDestino. $novoNomeArquivo. "." . $extensao);

if($fezUpload == true){

    $conexao = mysqli_connect("localhost", "root", "", "upload_arquivos");
    $sql = "INSERT INTO arquivo (nome_arquivo) VALUES ('$novoNomeArquivo.$extensao')";
    $resultado = mysqli_query($conexao, $sql);
    if ($resultado != false) 
    {   
        // se for uma alteração de arquivo
        if(isset($_POST['nome_arquivo']))
        {
         $apagou = unlink(__DIR__ . $pastaDestino . $_POST['nome_arquivo']);
         if($apagou == true) {
            $sql = "DELETE FROM arquivo WHERE nome_arquivo = '". $_POST['nome_arquivo']."'";
            $resultado2 = mysqli_query($conexao,$sql);
            if($resultado2 == false) {
                echo "erro ao apagar arquivo do BD";
                die();
            }
         } else {
            echo "erro ao apagar arquivo";
            die();
         }
        }

        header("location:index.php");
    } 
    else
    {
        echo "erro ao registrar arquivo no banco de dados";
    }

}
else{
    echo "Erro ao mover o arquivo.";
}
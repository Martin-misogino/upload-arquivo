<?php

$conexao = mysqli_connect("localhost", "root", "", "upload_arquivos");
$sql = "SELECT * FROM arquivo";
$resultado = mysqli_query($conexao, $sql);
if($resultado != false) {
    $arquivos = mysqli_fetch_all($resultado, MYSQLI_BOTH);
} else {
    echo "Erro ao executar comando SQL";
    die;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Selecione o arquivo: <br>
        <input type="file" name="arquivo"> <br> <br>
        <input type="submit" value="Fazer upload" name="submit">
    </form>
<br><br>
    <table>
        <thead>
        <tr>
        <th>Arquivos</th>
        <th colspan="2">Opções</th>
        </tr>
        </thead>
        <tbody>
            <?php 
                foreach($arquivos as $arquivo) {
                    echo "<tr> <td>" . $arquivo["nome_arquivo"] . "</td>";
                    echo "<td><a href='alterar.php?nome_arquivo=". $arquivo['nome_arquivo']."'> Alterar</td>";
                    echo "<td><a href='excluir.php?nome_arquivo=". $arquivo['nome_arquivo']."'> Excluir</td></tr>";
                }
            ?>
        </tbody>
    </table>

</body>
</html>
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
                    $arq = $arquivo['nome_arquivo'];
                    echo "<tr>"; echo "<td>$arq</td>";
                    echo "<td>"; echo "<a "; echo "href='alterar.php?nome_arquivo= $arq'> Alterar</td>";
                    echo "<td><button onclick='excluir(\" $arq \")'> Excluir</button></td></tr>";
                }
            ?>
        </tbody>
    </table>

   <script>
    function excluir(nome_arquivo) {
        confirm("Você tem certeza que deseja excluir o arquivo" + nome_arquivo + "?");
    }
   </script>

</body>
</html>
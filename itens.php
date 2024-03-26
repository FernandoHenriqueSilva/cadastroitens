<?php
// Conexão com o banco de dados
$servername = "db"; // Alterado para "db"
$username = "fernando"; // Altere se necessário
$password = "123456"; // Altere se necessário
$database = "itens"; // Alterado para o nome do banco de dados

$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Verificar conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Consulta SQL para selecionar todos os itens cadastrados
$sql = "SELECT * FROM itens";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itens Cadastrados</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Itens Cadastrados</h2>
        <!-- Botão para cadastrar novos itens -->
        <a href="index.html" class="btn-cadastrar">Cadastrar Novo Item</a>
        <table>
            <tr>
                <th>Nome</th>
                <th>Código</th>
                <th>Peso</th>
                <th>Valor</th>
                <th>Imagem</th>
            </tr>
            <?php
            // Loop através de todos os resultados da consulta
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["nome"]."</td>";
                    echo "<td>".$row["codigo"]."</td>";
                    echo "<td>".$row["peso"]."</td>";
                    echo "<td>".$row["valor"]."</td>";
                    echo "<td><img src='".$row["imagem"]."' width='100'></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum item cadastrado</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

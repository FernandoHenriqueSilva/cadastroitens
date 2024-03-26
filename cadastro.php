<?php
// Conexão com o banco de dados (mantido igual)
$servername = "db";
$username = "fernando";
$password = "123456";
$database = "itens";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexão (mantido igual)
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pegar os dados do formulário (mantido igual)
    $nome = $_POST['nome'];
    $codigo = $_POST['codigo'];
    $peso = $_POST['peso'];
    $valor = $_POST['valor'];

    // Upload da imagem (mantido igual)
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["imagem"]["name"]);
    move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);

    // Inserir os dados no banco de dados (mantido igual)
    $sql = "INSERT INTO itens (nome, codigo, peso, valor, imagem) VALUES ('$nome', '$codigo', '$peso', '$valor', '$target_file')";
    
    if ($conn->query($sql) === TRUE) {
        // Exibir janela modal em JavaScript após o cadastro bem-sucedido
        echo "<script>
                alert('Item cadastrado com sucesso!');
                if (confirm('Deseja ver os itens cadastrados?')) {
                    window.location.href = 'itens.php'; // Redirecionar para itens.php se o usuário clicar em 'OK'
                } else {
                    window.location.href = 'index.html'; // Redirecionar para index.html se o usuário clicar em 'Cancelar'
                }
              </script>";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

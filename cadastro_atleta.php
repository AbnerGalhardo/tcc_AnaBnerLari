<?php
require_once 'conexao.php'; // garante que o arquivo seja incluído

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome       = $_POST['nome'] ?? '';
    $cpf        = $_POST['cpf'] ?? '';
    $email      = $_POST['email'] ?? '';
    $senha      = $_POST['senha'] ?? '';
    $time       = $_POST['time'] ?? '';
    $posicao    = $_POST['posicao'] ?? '';
    $genero     = $_POST['genero'] ?? '';
    $idade      = $_POST['idade'] ?? '';



    if ($nome && $cpf && $email && $senha && $time && $posicao && $genero && $idade ) {

        // Cria a conexão
        $conn = mysqli_connect('localhost', 'root', '', 'VolleyConnect', 3306);

        if (!$conn) {
            die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
        }

        // Define UTF-8 para evitar problemas com acentuação
        mysqli_set_charset($conn, "utf8");

        // Cria o comando SQL
        $sql = "INSERT INTO atleta (nome, cpf, email, senha, time, posicao, genero, idade)
                VALUES ('$nome', '$cpf', '$email', '$senha', '$time', '$posicao', '$genero', '$idade')";

        // Executa o comando
        if (mysqli_query($conn, $sql)) {
            $mensagem = "Cadastro concluído com sucesso!";
        } else {
            $mensagem = "Erro ao cadastrar: " . mysqli_error($conn);
        }

        // Fecha a conexão
        mysqli_close($conn);

    } else {
        $mensagem = "Todos os campos são obrigatórios.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro Concluído</title>
    <link rel="stylesheet" href="css/style_administrador2.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
</head>
<body>
    <div class="container">
        <?php if (!empty($mensagem)): ?>
            <h1><?= htmlspecialchars($mensagem) ?></h1>
        <?php endif; ?>

        <?php if (!empty($nome)): ?>
            <p><strong>Nome:</strong> <?= htmlspecialchars($nome) ?></p>
            <p><strong>CPF:</strong> <?= htmlspecialchars($cpf) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
            <p><strong>Senha:</strong> <?= htmlspecialchars($senha) ?></p>
            <p><strong>Time:</strong> <?= htmlspecialchars($time) ?></p>
            <p><strong>Posicao:</strong> <?= htmlspecialchars($posicao) ?></p>
            <p><strong>Genero:</strong> <?= htmlspecialchars($genero) ?></p>
            <p><strong>Idade:</strong> <?= htmlspecialchars($idade) ?></p>

        <?php endif; ?>

        <a href="login.php" class="botao">Login</a>
    </div>
</body>
</html>

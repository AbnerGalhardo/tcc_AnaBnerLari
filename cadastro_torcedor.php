
<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome=$_POST['nome'] ?? '';
    $cpf=$_POST['cpf'] ?? '';
    $email=$_POST['email'] ?? '';
    $senha=$_POST['senha'] ?? '';

    if ($nome && $cpf && $email && $senha)
    {

        echo "<h1>Cadastro concluido!</h1><br>";
        echo "Nome: $nome <br>";
        echo "CPF: $cpf <br>";
        echo "Email: $email <br>";
        echo "Senha: $senha <br>";

    } else {
        echo "Todos os Campos São Obrigatórios";
    }

    $sql = "INSERT INTO torcedor (nome, cpf, email, senha)
    
    VALUES ('$nome', '$cpf', '$email', '$senha')";
    $conexao = conecta();
    if (mysqli_query($conexao, $sql)) {
        echo "Novo registro criado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
    }

    desconecta($conexao);
}
?>
<div>
    <a href="login.html">Login</a>
        <link rel="stylesheet" href="css/style_torcedor2.css">
        </div>
    </div>
</div>
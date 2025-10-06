
<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome=$_POST['nome'] ?? '';
    $cpf=$_POST['cpf'] ?? '';
    $credencial=$_POST['credencial'] ?? '';
    $email=$_POST['email'] ?? '';
    $senha=$_POST['senha'] ?? '';

    if ($nome && $cpf && $credencial && $email && $senha)
    {

        echo "<h1>Cadastro concluido!</h1><br>";
        echo "Nome: $nome <br>";
        echo "CPF: $cpf <br>";
        echo "Credencial: $credencial <br>";
        echo "Email: $email <br>";
        echo "Senha: $senha <br>";

    } else {
        echo "Todos os Campos São Obrigatórios";
    }

    $sql = "INSERT INTO administrador (nome, cpf, credencial, email, senha) 
    
    VALUES ('$nome', '$cpf', '$credencial', '$email', '$senha')";
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
    <link rel="stylesheet" href="style_administrador2.css">
</div>
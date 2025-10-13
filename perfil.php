<?php
session_start();
include 'conexao.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['user_email']) || !isset($_SESSION['user_type'])) {
    header('Location: login.html');
    exit();
}

$user_email = $_SESSION['user_email'];
$user_type = $_SESSION['user_type'];
$user_data = null;

// Busca os dados do usuário na tabela correspondente
$table_name = '';
switch ($user_type) {
    case 'atleta':
        $table_name = 'atleta';
        break;
    case 'administrador':
        $table_name = 'administrador';
        break;
    case 'torcedor':
        $table_name = 'torcedor';
        break;
    default:
        // Tipo de usuário inválido, redireciona para login
        header('Location: login.html');
        exit();
}

$sql = "SELECT nome, email, senha FROM $table_name WHERE email = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $user_email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result && mysqli_num_rows($result) == 1) {
    $user_data = mysqli_fetch_assoc($result);
} else {
    // Usuário não encontrado ou erro, redireciona para login
    header('Location: login.html');
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pt-br">
<link rel="stylesheet" href="css/style_perfil.css">
<link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Perfil</title>
    <link rel="stylesheet" href="style_perfil.css">
    <!-- Font Awesome para ícones (ex: ícone de perfil) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="profile-container">
        <h1>SEU PERFIL</h1>

        <div class="profile-section foto-section">
            <div class="profile-icon-placeholder">
                <i class="fas fa-user-circle"></i>
            </div>
            <button class="btn-edit">Editar foto</button>
        </div>

        <div class="profile-section">
            <div class="info-group">
                <span class="info-label">Nome:</span>
                <span class="info-value"><?php echo htmlspecialchars($user_data['nome']); ?></span>
            </div>
            <button class="btn-edit">Editar nome</button>
        </div>

        <div class="profile-section">
            <div class="info-group">
                <span class="info-label">Email:</span>
                <span class="info-value"><?php echo htmlspecialchars($user_data['email']); ?></span>
            </div>
            <button class="btn-edit">Editar email</button>
        </div>

        <div class="profile-section">
            <div class="info-group">
                <span class="info-label">Senha:</span>
                <span class="info-value">********</span> <!-- Senha mascarada -->
            </div>
            <button class="btn-edit">Mudar senha</button>
        </div>
        <br>
        <h2>
        <button class="btn-edit" id="retorno"><a href="tela_principal.php">VOLTAR</a></button>
      </h2>
    </div>
</body>
</html>


<?php
include 'conexao.php';
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_email']) || !isset($_SESSION['user_type'])) {
    header("Location: login.php");
    exit();
}

// Processa as configurações se o formulário for enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aqui você pode adicionar a lógica para salvar as configurações
    // Por exemplo, salvar no banco de dados ou em sessão
    
    if (isset($_POST['modo_noturno'])) {
        $_SESSION['modo_noturno'] = $_POST['modo_noturno'] === 'on';
    } else {
        $_SESSION['modo_noturno'] = false;
    }
    
    // Redireciona para evitar reenvio do formulário
    header("Location: config.php");
    exit();
}

// Verifica o estado atual do modo noturno
$modo_noturno = $_SESSION['modo_noturno'] ?? false;

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações</title>
    <link rel="stylesheet" href="css/style_config.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="config-container">
        <h1>CONFIGURAÇÕES</h1>
        
        <form method="post" action="config.php">
            <!-- Atletas salvos -->
            <div class="config-item">
                <div class="config-content">
                    <span class="config-label">Atletas salvos</span> 
                </div>
                <div class="config-action">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>

            <!-- Notificações -->
            <div class="config-item">
                <div class="config-content">
                    <span class="config-label">Notificações</span>
                </div>
                <div class="config-action">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>

            <!-- Ajuda e perguntas frequentes -->
            <div class="config-item">
                <div class="config-content">
                    <span class="config-label">Ajuda e perguntas frequentes</span>
                </div>
                <div class="config-action">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
            <br>
                    <h2>
                    <button class="btn-edit" id="retorno"><a href="tela_principal.php">VOLTAR</a></button>
                    </h2>
        </form>
    </div>
</body>
</html>


<!-- Modo noturno
            <div class="config-item modo-noturno-item">
                <div class="config-content">
                    <span class="config-label">Modo noturno</span>
                </div>
                <div class="config-action">
                    <label class="toggle-switch">
                        <input type="checkbox" name="modo_noturno" <?php echo $modo_noturno ? 'checked' : ''; ?> onchange="this.form.submit()">
                        <span class="slider"></span>
                    </label>
                </div>
            </div> -->
            


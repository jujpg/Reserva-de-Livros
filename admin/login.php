<?php
include("../conexao.php");

// Obtenha os valores do formulário
$email = $_POST["email"];
$senha = $_POST["senha"];

// Consulta SQL para verificar o login
$sql = "SELECT * FROM `login` WHERE email = '$email' AND senha = '$senha'";

$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Login bem-sucedido
    // Você pode redirecionar o usuário para a página de administração ou executar outras ações aqui
    header("Location: admin_home.html");
} else {
    // Login falhou
    echo "Login falhou. Verifique suas credenciais.";
}

$conn->close();

?>
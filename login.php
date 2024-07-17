<?php
include 'conex.php';
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

// Verificar se o email existe
$email_query = $conn->prepare("SELECT id_usuario, senha FROM usuari WHERE email = ?");
$email_query->bind_param("s", $email);
$email_query->execute();
$email_result = $email_query->get_result();

if($email_result->num_rows > 0){
    $row = $email_result->fetch_assoc();
    // Se o email existe, verifique a senha
    if($row['senha'] === $senha) {
        $_SESSION['id_usuario'] = $row['id_usuario']; // Armazenando id_usuario na sessão
        echo 'success';
    } else {
        echo 'Senha incorreta';
    }
} else {
    echo 'Email não encontrado';
}

$conn->close();
exit;
?>

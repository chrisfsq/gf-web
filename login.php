<?php
include('config.php');

$register_message = '';
$login_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica se o formulário de registro foi enviado
    if (isset($_POST['login_submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (!empty($username) && !empty($password)) {
            $pwd_md5 = md5($password);
            $result = pg_query($db_ls, "SELECT * FROM accounts WHERE username='$username' AND password='$pwd_md5'");
            if (pg_num_rows($result) > 0) {
                // Login bem sucedido, redireciona para a página de perfil
                header("Location: profile.php");
                exit();
            } else {
                $login_message = "<font color='red'>USERNAME OR PASSWORD INCORRECT.</font>";
            }
        } else {
            $login_message = "<font color='red'>PLEASE FILL IN BOTH USERNAME AND PASSWORD FIELDS.</font>";
        }
        pg_close($db_ls);
    }
}
?>

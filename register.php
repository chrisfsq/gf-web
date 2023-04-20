<?php
include('config.php');

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if (!empty($username) && !empty($password)) {
        $result_exists = pg_query($db_ls, "SELECT * FROM accounts WHERE username='$username'");
        if (pg_num_rows($result_exists) > 0) {
            $message = "<font color='red'>USERNAME '$username' ALREADY REGISTERED</font>";
        } else {

            $result = pg_query($db_ls, 'SELECT COUNT(*) FROM accounts');
            $next_id = pg_fetch_result($result, 0, 0);
            $next_id++;

            $exists_id = pg_query($db_ls, "SELECT * FROM accounts WHERE id = $next_id");
            while (pg_num_rows($exists_id) > 0) {
                $next_id++;
                $exists_id = pg_query($db_ls, "SELECT * FROM accounts WHERE id = $next_id");
            }

            $pwd_md5 = md5($password);

            $result_ls = pg_query($db_ls, "INSERT INTO public.accounts (id, username, password, realname, email) VALUES($next_id, '$username', '$pwd_md5', '$username', '$email')");

            if (!$result_ls) {
                $message = "<font color='red'>ACCOUNT CREATION ERROR</font>";
            } else {
                $result_ms = pg_query($db_ms, "INSERT INTO tb_user (mid, password, pwd, idnum) VALUES ('$username','$pwd_md5','$pwd_md5', $next_id)");
                if (!$result_ms) {
                    $message = "<font color='red'>ACCOUNT CREATION ERROR</font>";
                } else {
                    $message = "<font color='green'>ACCOUNT '$username' CREATED</font>";
                }
            }

            pg_close($db_ls);
            pg_close($db_ms);
        }
    }
}
?>
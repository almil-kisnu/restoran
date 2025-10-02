<?php
require ('koneksi.php');

session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];
    /*
    $emailCheck = mysqli_real_escape_string($koneksi, $email);
    $passCheck  = mysqli_real_escape_string($koneksi, $pass);
    */

    if (!empty(trim($email)) && !empty(trim($pass))) {
        //select data berdasarkan username dari database
        $query  = "SELECT * FROM user_detail WHERE user_email = '$email'";
        $result = mysqli_query($koneksi, $query);
        $num    = mysqli_num_rows($result);

        $row = mysqli_fetch_array($result);
        $id        = $row['id'];
        $userVal   = $row['user_email'];
        $passVal   = $row['user_password'];
        $userName  = $row['user_fullname'];
        $sLevel    = $row['level'];

        if ($num != 0) {
            if ($userVal == $email && $passVal == $pass) {
                header('Location: home.php');
            } else {
                $error = 'User atau password salah!!';
                header('Location: login.php');
            }
        } else {
            $error = 'User tidak ditemukan!!';
            header('Location: login.php');
        }
    } else {
        $error = 'Data tidak boleh kosong !!';
        echo $error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>login page</title>
</head>
<body>
    <form action="login.php" method="POST">
        <p>Email : <input type="text" name="txt_email"></p>
        <p>Password : <input type="password" name="txt_pass"></p>
        <p><button type="submit" name="submit">Sign In</button></p>
    </form>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Sistem Informasi Perpustakaan</title>
    <link rel="stylesheet" href="./assets/css/login.css">
</head>
<body>
    <div id="wrapper">
        <div id="form-area">
            <center>
                <header>
                    <img src="./assets/img/pink.png" width="80">
                    <h1>Lit Hub</h1>
                    <h3>Log In</h3>
                </header>
                <div id="container">
                    <form action="" method="post">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" required>

                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>

                        <input type="submit" name="submit" id="password" value="Submit">
                    </form>
                <div class="other">
            <!--     Sign Up button -->
                <button class="btn submits sign-up"><a href="register.php">Sign Up</a></button>
            </div>

<?php                    
	session_start();
    include './config/konfigurasi-umum.php';
    include './config/koneksi-db.php';

    if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $login = mysqli_query($db_conn, $sql);
    $ketemu = mysqli_num_rows($login);
    $r = mysqli_fetch_array($login);

    if ($ketemu > 0) {
        $_SESSION['username'] = $r['username'];
        $_SESSION['nama_lengkap'] = $r['nama_lengkap'];

        // Mengarahkan pengguna ke halaman index.php setelah login berhasil
        header("Location: index.php");
        exit(); 

    } else {
        echo "<center>Login gagal! username & password tidak benar<br>";   
    }
 
	} else {
    // Form belum di-submit
    }

mysqli_close($db_conn);
?>
                </div>
                <footer>
                    <p><?php echo $_SITE_CREDIT; ?></p>
                </footer>
            </center>
        </div>
    </div>
</body>
</html>

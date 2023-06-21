<?php
    include 'koneksi.php';

    $usernameInput = $_POST['username'];
    $passwordInput = $_POST['password'];

    $usernamecheck = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$usernameInput'");
    
    if (mysqli_num_rows($usernamecheck) === 1) {
        $row = mysqli_fetch_assoc($usernamecheck);
        var_dump($row["password"]);
        if(password_verify($passwordInput, $row["password"])){
            session_start();
            $_SESSION['username'] = $usernameInput;
            $_SESSION['role'] = $row['role'];
            $_SESSION['id'] = $row['id'];
            header("location: loginpage.php?pesan=login");
            exit;
        }
        else {
            echo "incorrect password";
        }
    } else {
        echo "username not found";
    }
?>

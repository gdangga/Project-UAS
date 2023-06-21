<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
</head>
<body>
    <?php
        if(isset($_POST['signup'])){
            include 'koneksi.php';

            $username = $_POST['username'];
            $password = mysqli_real_escape_string($koneksi, $_POST['password']);
            $password2 = mysqli_real_escape_string($koneksi, $_POST['password2']);
            
            $usercheck = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");
            if(mysqli_fetch_assoc($usercheck)){
                echo "<script>
                        alert('username sudah terdaftar!')
                    </script>";
            }

            if( $password !== $password2){
                echo "<script>
                        alert('konfirmasi password tidak sesuai');
                      </script>";
            }
            


        }
    ?>
    <h2>Sign Up</h2>
    <form action="" method="post">
        <tr>
            <td>username</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td>Verivication</td>
            <td><input type="password" name="password2"></td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="signup">
            </td>
        </tr>
    </form>

</body>
</html>
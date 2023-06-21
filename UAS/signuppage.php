<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="styleu.css">
</head>

<body>
    <?php
        if(isset($_POST['signup'])){
            if(signup($_POST) > 0){
              header("location:loginpage.php");
              echo "<script>
                      alert('user baru berhasil dtambahkan');
                    </script>";
            }
            else{
              echo 'mysqli_error($koneksi)';
              header("location:signuppage.php");
            }
        }

        function signup($data){
          include 'koneksi.php';

          $username = $_POST['username'];
          $password = mysqli_real_escape_string($koneksi, $_POST['password']);
          $password2 = mysqli_real_escape_string($koneksi, $_POST['password2']);
          
          $usercheck = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");
          if(mysqli_fetch_assoc($usercheck)){
              echo "<script>
                      alert('username sudah terdaftar!')
                  </script>";
              return false;
          }

          if( $password !== $password2){
              echo "<script>
                      alert('konfirmasi password tidak sesuai');
                    </script>";
              return false;
          }
          //encription
          $password = password_hash($password, PASSWORD_DEFAULT);
          
          //inset into database
          mysqli_query($koneksi, "INSERT INTO user VALUES('','$username','$password','','','')");
          return mysqli_affected_rows($koneksi);
        }
    ?>

  <img src="img/gambar.png" alt="Gambar" class="gambar">
  
</div>
    <div class="container">
      <h2>Sign Up</h2>
      
      <h4>Come join with us to explore</h4>
      <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder=" " required>
  
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder=" " required>
  
        <label for="password">Confirm Password</label>
        <input type="password" id="password2" name="password2" placeholder=" " required>

        <input type="submit" name="signup">

        <h5>Allready have account? <a href="loginpage.php">Login</a></h5>
      </form>
    </div>

    

      
</body>
</html>
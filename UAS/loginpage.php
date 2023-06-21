<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <?php
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == 'login'){
                header("location:landingpage.php");
                exit;
            }
            if($_GET['pesan'] == 'gagal'){
                echo "Invalid username or password";
            }
        }
    ?>
  <div class="image-overlay">
  <img src="img/gambar.png" alt="Gambar" class="gambar">
  <div class="overlay-text">
    <h1>Welcome Back!</h1>
  </div>
</div>
    <div class="container">
      <h2>Login</h2>
      
      <h4>Wellcome back! Please lofin to your 
          account
      </h4>
      <form action="ceklogin.php" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder=" ">
  
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder=" ">

        <label for="remember">
          <input type="checkbox" id="remember" name="remember">
          Remember Me
        </label>
  
        <input type="submit" value="login">

        <h5>New User? <a href="signuppage.php">Signup</a></h5>
      </form>
    </div>

    

      
</body>
</html>
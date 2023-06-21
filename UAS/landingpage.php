
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <?php
    session_start();
    include 'koneksi.php';
    
    if($_SESSION['role'] == 'admin'){
        echo 'anda login sebagai admin';
    }
    elseif($_SESSION['role'] == 'user'){
        echo 'anda login sebagai user';
    }
    else{
        header("location:loginpage.php");
    }
    
    ?>
    <br><br>
    <div class="container">
        <div class="">
            <a href="uploadpage.php">upload</a>
        </div>
        <div class="col-4 align-item-center">
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Digital painting" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                </div>
            </form>
        </div>
        <?php
            $data = mysqli_query($koneksi, "SELECT * FROM content");
            while($result = mysqli_fetch_array($data)){
        ?>
        <div class="row d-flex mt-10">
            <div class="col-3">
                
            </div>
        </div>
    </div>
    <?php
        }
    ?>
</body>
</html>
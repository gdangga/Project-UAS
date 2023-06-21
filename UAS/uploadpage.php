<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="uploadpageStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</svg>
</head>
<body>
    <?php
        include 'koneksi.php';
        
        session_start();
        if(!$_SESSION){
            header('location:loginpage.php');
        }       
    ?>
    <div class="container col-4">     
        <form action="upload.php" method='post' enctype="multipart/form-data">
            <figure class="img-container">
                <img id="imageChosen" alt="">
                <figcaption class="figcaption" id="fileName"></figcaption>
            </figure>
            <input type="file" name="image" id="imageUpload" accept="image/*">
            <div class="d-flex justify-content-between">
                <label for="imageUpload">
                    <img src="img/cloud-arrow-up-fill.svg" class="icons" alt=""> &nbsp;
                    Choose a file  
                </label>
            </div>
            <br><br>
            <input type="text" name="title">
            <br><br>
            <input type="textarea" name="description">
            <br><br>
            <input type="submit" name="upload">
        </form>
    </div>
    <script src="uploadScript.js"></script>
</body>
</html>
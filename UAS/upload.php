<?php

    if(isset($_POST['upload'])){
        if(post($_POST) > 0){
            echo "  <script>  
                    alert('upload successful');
                    document.locaton.href = 'landingpage.php';
                    </script>";
        }
        else{
            echo "  <script>  
                    alert('upload failed');
                    document.locaton.href = 'uploadpage.php';
                    </script>";
        }
    }
    function post($data){
        include 'koneksi.php';

        //Get the user id
        session_start();
        $userId = $_SESSION['id'];

        $title = $data['title'];
        $description = $data['description'];
        echo $title;
        echo $description;
    
        //upload
        $image = upload();
        if( !$image ){
            return false;
        }

        //current time
        $currentDateTime = date('Y-m-d H:i:s');
    
        mysqli_query($koneksi, "INSERT INTO content VALUES('','$userId','$title','$description','$image','$currentDateTime')");

        return mysqli_affected_rows($koneksi);
    }
    
    function upload(){
        $imageName = $_FILES['image']['name'];
        $imageSize = $_FILES['image']['size'];
        $imageError = $_FILES['image']['error'];
        $imageTmpName = $_FILES['image']['tmp_name'];

        //check the image uploaded
        if( $imageError === 4 ){
            echo "checked";
            echo "<script>alert('please choose the file')</script>";
            return false; 
        }

        //check file extension
        $allowedExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.',$imageName);
        $imageExtension = strtolower(end($imageExtension));
        if( !in_array($imageExtension, $allowedExtension)){
            echo "<script>alert('the file is not image')</script>";
            return false;
        }

        //check file size
        if($imageSize > 5000000){
            echo "<script>alert('image size is too large')</script>";
            return false;
        }

        //rename file name
        $newImageName = uniqid();
        $newImageName .= '.';
        $newImageName .= $imageExtension;

        //upload image
        move_uploaded_file($imageTmpName, 'imgupload/'.$newImageName);
        return $newImageName;
    }
    



?>
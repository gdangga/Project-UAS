<?php
    include 'koneksi.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
   
    mysqli_query($koneksi, "INSERT INTO barang VALUES('','$username','$password')");
    header("location:landingpage.php");

?>
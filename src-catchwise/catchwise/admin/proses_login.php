<?php
    session_start();
    include ("koneksi.php");

    $nama_user     = $_POST['nama_user'];
    $password_user = $_POST['password_user'];

    $query  = "SELECT * FROM user WHERE nama_user = '$nama_user' and password_user = md5('$password_user')" ;
    $result = mysqli_query($koneksi, $query);
    
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $_SESSION['nama_user'] = $nama_user;
            $_SESSION['nama_user'] = $row['nama_user'];
        }
        header("location: dashboard.php");
    }else{

        header("location: Halaman_login.php");
    }
?>
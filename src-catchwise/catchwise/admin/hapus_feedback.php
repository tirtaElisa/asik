<?php
    include ("koneksi.php");

    $id = $_GET['id'];
    $query = "DELETE FROM feedback WHERE id = $id";

    if(mysqli_query($koneksi, $query)){

        header("location: feedback.php");
    
    }else{
        
        echo "Tidak Berhasil";
        
    }
?>
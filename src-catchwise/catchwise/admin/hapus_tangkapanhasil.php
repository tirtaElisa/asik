<?php
    include ("koneksi.php");

    $id_tangkapan = $_GET['id_tangkapan'];
    $query = "DELETE FROM tangkapanhasil WHERE id_tangkapan = $id_tangkapan";

    if(mysqli_query($koneksi, $query)){

        header("location: tangkapanhasil.php");
        
    }else{

        echo "Tidak Berhasil";
        
    }
?>
<?php
    include ("koneksi.php");

    $id_pemetaan = $_GET['id_pemetaan'];
    $query = "DELETE FROM pemetaan WHERE id_pemetaan = $id_pemetaan";

    if(mysqli_query($koneksi, $query)){

        header("location: port.php");
    
    }else{
        
        echo "Tidak Berhasil";
        
    }
?>
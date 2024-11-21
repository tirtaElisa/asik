<?php
    include ("koneksi.php");
 
    $tgl       = $_POST['tgl'];
    $nama      = $_POST['nama'];
    $pps       = $_POST['pps'];
    $tuna      = $_POST['tuna'];
    $tongkol   = $_POST['tongkol'];
    $cakalang  = $_POST['cakalang'];
    
    $query = "INSERT INTO `tangkapanhasil` (`tgl`, `nama`, `pps`, `tuna`, `tongkol`, `cakalang`) VALUES ('$tgl', '$nama', '$pps', '$tuna', '$tongkol', '$cakalang')";

    if(mysqli_query($koneksi, $query)){

        header("location: tangkapanhasil.php");
        
    }else{

        echo "Tidak Berhasil";
        
    }
?>
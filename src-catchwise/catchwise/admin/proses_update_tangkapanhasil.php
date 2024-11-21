<?php
    include ("koneksi.php");

    $id_tangkapan   = $_POST['id_tangkapan'];
    $tgl       = $_POST['tgl'];
    $nama      = $_POST['nama'];
    $pps       = $_POST['pps'];
    $tuna      = $_POST['tuna'];
    $tongkol   = $_POST['tongkol'];
    $cakalang  = $_POST['cakalang'];

    $query = "UPDATE `tangkapanhasil` set tgl = '$tgl', nama = '$nama', pps = '$pps', tuna = '$tuna', tongkol = '$tongkol', cakalang = '$cakalang' WHERE id_tangkapan = $id_tangkapan";

    if(mysqli_query($koneksi, $query)){
  
        header("location: tangkapanhasil.php");
  
    }else{

        echo "Tidak Berhasil";
        
    }
?>
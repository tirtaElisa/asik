<?php
    include ("koneksi.php");

    $id_pemetaan     = $_POST['id_pemetaan'];
    $titik_koordinat = $_POST['titik_koordinat'];
    $nama_pulau      = $_POST['nama_pulau'];
    $gmbr_pulau      = upload_file();
    $spesies_lamun   = $_POST['spesies_lamun'];

    $query = "UPDATE `pemetaan` set titik_koordinat = '$titik_koordinat', nama_pulau = '$nama_pulau', gmbr_pulau = '$gmbr_pulau', spesies_lamun = '$spesies_lamun' WHERE id_pemetaan = $id_pemetaan";

    function upload_file()
    {
        $namaFile = $_FILES['gmbr_pulau']['name'];
        $ukuranFile = $_FILES['gmbr_pulau']['size'];
        $error = $_FILES['gmbr_pulau']['error'];
        $tmpName = $_FILES['gmbr_pulau']['tmp_name'];

        $extensifileValid = ['jpg', 'jpeg', 'png'];
        $extensifile = explode('.', $namaFile);
        $extensifile = strtolower(end($extensifile));

        if (!in_array($extensifile, $extensifileValid)){
            echo "<script> alert('Format Tidak Valid');
            document.location.href = 'port.php';
            </script>";
        die();
        }

        if ($ukuranFile > 5048000) {
            echo "<script> alert('Ukuran File Max 2 MB');
            document.location.href = 'port.php';
            </script>";
        die();
        }

        $namaFileBaru  = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $extensifile;

        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
        return $namaFileBaru;
    
    }

    if(mysqli_query($koneksi, $query)){
  
        header("location: port.php");
  
    }else{

        echo "Tidak Berhasil";
        
    }
?>
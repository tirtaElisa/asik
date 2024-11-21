<?php
    include ("koneksi.php");

    $titik_koordinat = $_POST['titik_koordinat'];
    $nama_pulau      = $_POST['nama_pulau'];
    $gmbr_pulau      = upload_file();
    $spesies_lamun   = $_POST['spesies_lamun'];

    $query = "INSERT INTO `pemetaan` (`titik_koordinat`, `nama_pulau`, `gmbr_pulau`, `spesies_lamun`) VALUES ('$titik_koordinat','$nama_pulau', '$gmbr_pulau', '$spesies_lamun')";

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
            echo "<script> alert('Ukuran File Max 5 MB');
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

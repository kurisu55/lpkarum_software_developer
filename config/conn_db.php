<?php
define('SERVER', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'data_warga');

$connect = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);

// if ($connect->connect_error) {
//     echo "<script>alert('Database tidak terhubung!')</script>";
// }

// Input data baru
function inputForm($data)
{
    global $connect; //Global variabel

    $date = explode('-', $data['tanggalLahir']);
    $dateFIX = array($date[2], $date[1], $date[0]);

    // Input ke table orang
    $userId = $data['userId'];
    $name = $data['name'];
    $tanggalLahir = implode('-', $dateFIX);
    $tempatLahir = $data['tempatLahir'];
    $alamat = $data['alamat'];
    $sesuaiKTP = $data['sesuaiKTP'];
    $pendidikanTerakhir = $data['pendidikanTerakhir'];
    $pekerjaan = $data['pekerjaan'];

    $query = "INSERT INTO orang VALUES ('', '$userId', '$name', '$tanggalLahir', '$tempatLahir', '$alamat', '$sesuaiKTP', '$pendidikanTerakhir', '$pekerjaan');";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}

// Edit Data yang tersedia
// function editForm($data)
// {
//     global $connect; //Global variabel

//     // Value ke table orang
//     $userId = $data['userId'];
//     $name = $data['name'];
//     $tanggalLahir = $data['tanggalLahir'];
//     $tempatLahir = $data['tanggalLahir'];

//     // Value ke table domosili
//     $alamat = $data['alamat'];
//     $sesuaiKTP = $data['sesuaiKTP'];

//     // Value ke table pedidikanKarir
//     $pendidikanTerakhir = $data['pendidikanTerakhir'];
//     $pekerjaan = $data['pekerjaan'];

//     $query = "UPDATE orang SET '', '$userId', '$name', '$tanggalLahir', '$tempatLahir';";

//     mysqli_query($connect, $query);
//     return mysqli_affected_rows($connect);
// }

function hapusSoal($id)
{
    global $connect;

    mysqli_query($connect, "DELETE FROM orang WHERE userId=$id");
    return mysqli_affected_rows($connect);
}

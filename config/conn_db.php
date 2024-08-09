<?php
define('SERVER', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'warga');

$connect = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);

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

    $query = "INSERT INTO orang VALUES ('3', '$userId', '$name', '$tanggalLahir', '$tempatLahir');";
    $query .= "INSERT INTO domisili VALUES ('3', '$userId', '$alamat', '$sesuaiKTP');";
    $query .= "INSERT INTO lainnya VALUES ('3', '$userId', '$pendidikanTerakhir', '$pekerjaan')";

    if (mysqli_multi_query($connect, $query)) {
        return mysqli_affected_rows($connect);
    }
}

// Edit Data yang tersedia
function editForm($data)
{
    global $connect; //Global variabel

    // Value ke table orang
    $id = $data['id'];
    $userId = $data['userId'];
    $name = $data['name'];
    $tanggalLahir = $data['tanggalLahir'];
    $tempatLahir = $data['tempatLahir'];

    // Value ke table domosili
    $alamat = $data['alamat'];
    $sesuaiKTP = $data['sesuaiKTP'];

    // Value ke table pedidikanKarir
    $pendidikanTerakhir = $data['pendidikanTerakhir'];
    $pekerjaan = $data['pekerjaan'];

    $query = "UPDATE orang
              INNER JOIN domisili ON orang.userId = domisili.userId
              INNER JOIN lainnya ON domisili.userId = lainnya.userId
SET orang.Id = '$id', orang.userId= '$userId', orang.namaLengkap = '$name', orang.tanggalLahir = '$tanggalLahir', orang.tempatLahir = '$tempatLahir',
    domisili.Id = '$id', domisili.userId = '$userId', domisili.alamat = '$alamat', domisili.sesuaiKTP = '$sesuaiKTP',
    lainnya.Id = '$id', lainnya.userId = '$userId', lainnya.pendidikanTerakhir = '$pendidikanTerakhir', lainnya.pekerjaan = '$pekerjaan'
              WHERE orang.userId = '$userId'";

    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
    // var_dump(mysqli_affected_rows($connect));
    mysqli_close($connect);
}

function deleteData($id)
{
    global $connect;

    mysqli_query($connect, "DELETE FROM orang WHERE userId=$id");
    return mysqli_affected_rows($connect);
}

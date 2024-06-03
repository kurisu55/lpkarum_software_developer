<?php

include_once('../config/conn_db.php');

$id = $_GET["userId"];

// Aksi hapus
if (hapusSoal($id) > 0) {

    echo "<script>
    alert('Data berhasil dihapus!');
    document.location.href = 'edit_kuis.php';
    </script>
    ";
} else {
    echo "<script>
    alert('Data batal dihapus!');
    document.location.href = 'edit_kuis.php;
    </script>
    ";
}

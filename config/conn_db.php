<?php
define('SERVER', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'data_Warga');

$connect = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);

// if ($connect) {
//     echo 'Database connected!';
// }
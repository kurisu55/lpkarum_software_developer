<!-- Code PHP di HTML -->
<?php
include_once('config/conn_db.php');

if (isset($_POST['insertData'])) {
    // Convert fragmented date HTML
    $date = explode('-', $_POST['tanggalLahir']);
    $dateFIX = array($date[2], $date[1], $date[0]);

    // Get Id as generate No. Kependudukan
    $resultID = mysqli_query($connect, "SELECT max(Id) AS ID from orang");
    $rowID = mysqli_fetch_assoc($resultID);
    $maxID = $rowID['ID'];
    $INCmaxID = ++$maxID;
    $_POST['userId'] = (int)(str_pad($INCmaxID, 1, '0', STR_PAD_LEFT) . $date[2] . $date[1] . $date[0]);

    if ($_POST['name'] == '' || $_POST['tanggalLahir'] == '' || $_POST['tempatLahir'] == '' || $_POST['alamat'] == '' || $_POST['sesuaiKTP'] == '' || $_POST['pendidikanTerakhir'] == '' || $_POST['pekerjaan'] == '') {
        echo "<script>alert('Data harus diisi semua');</script>";
    } elseif (inputForm($_POST) > 0) {
        echo "<script>alert('berhasil!')</script>";
    }
}

$resultWholeData = mysqli_query($connect, "SELECT * FROM orang
INNER JOIN domisili ON orang.userId = domisili.userId
INNER JOIN lainnya ON orang.userId= lainnya.userId");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="prakerja, landing page, html css javascript, form" />
    <meta name="author" content="Kristovel Adi Sucipto" />
    <title>Form</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->

    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    <style>
        textarea {
            resize: none;
        }
    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.php">Landing Page</a>
        </div>
    </nav>
    <section class="page-section">
        <div class="container mt-5">
            <div class="row">
                <div class="border border-secondary col col-5 me-3">
                    <h1 class="text-center mt-2">FORM PENGISIAN</h1>
                    <form action="" method="post">
                        <div class="col-5 ms-3">
                            <label for="name" class="col-form-label">Nama : </label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Input nama!">
                        </div>
                        <div class="row">
                            <div class="col-5 ms-3">
                                <label for="tanggalLahir" class="col-form-label">Tanggal Lahir : </label>
                                <input type="date" name="tanggalLahir" class="form-control" id="tanggalLahir">
                            </div>
                            <div class="col-5 ms-3">
                                <label for="tempatLahir" class="col-form-label">Tempat Lahir : </label>
                                <input type="text" name="tempatLahir" class="form-control" id="tempatLahir" placeholder="Input tempat lahir!">
                            </div>
                        </div>
                        <div class="col-8 ms-3">
                            <label for="alamat" class="col-form-label">Alamat : </label>
                            <textarea name="alamat" class="form-control" id="alamat" placeholder="Input alamat!" cols="" rows="3"></textarea>
                        </div>
                        <div class="col-4 ms-3">
                            <label for="sesuaiKTP" class="col-form-label">Alamat sesuai KTP : </label>
                            <select name="sesuaiKTP" class="form-select" id="sesuaiKTP">
                                <option selected>...</option>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-5 ms-3">
                                <label for="pendidikanTerakhir" class="col-form-label">Pendidikan Terakhir : </label>
                                <select name="pendidikanTerakhir" class="form-select" id="pendidikanTerakhir">
                                    <option selected>...</option>
                                    <option value="sd">SD</option>
                                    <option value="smp">SMP</option>
                                    <option value="smaSederajat">SMA sederajat</option>
                                    <option value="perguruanTinggi">Perguruan Tinggi</option>
                                </select>
                            </div>
                            <div class="col-5 ms-3">
                                <label for="pekerjaan" class="col-form-label">Pekerjaan : </label>
                                <select name="pekerjaan" class="form-select" id="pekerjaan">
                                    <option selected>...</option>
                                    <option value="tidak">Tidak Bekerja</option>
                                    <option value="pegawai_swasta">Pegawai Swasta</option>
                                    <option value="pegawai_negeri">Pegawai Negeri</option>
                                    <option value="wirausaha">Wirausaha</option>
                                    <option value="pengusaha">Pengusaha</option>
                                </select>
                            </div>
                        </div>
                        <div class="my-3 ms-3">
                            <button type="submit" class="btn btn-outline-success center col" name="insertData">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="border-start border-secondary col col-6 ms-3">
                    <h1 class="text-center mt-2">FORM EDIT</h1>
                    <table class="table table-sm mt-5">
                        <thead>
                            <td>No. Kependudukan</td>
                            <td>Nama</td>
                            <td>Tanggal Lahir</td>
                            <td>Tempat Lahir</td>
                            <td>Alamat</td>
                            <td>Alamat sesuai KTP</td>
                            <td>Pendidikan Terakhir</td>
                            <td>Pekerjaan</td>
                            <td>Aksi</td>
                        </thead>
                        <?php while ($row = mysqli_fetch_assoc($resultWholeData)) : ?>
                            <tbody>
                                <td><?= $row['userId']; ?></td>
                                <td><?= $row['namaLengkap']; ?></td>
                                <td><?= $row['tanggalLahir']; ?></td>
                                <td><?= $row['tempatLahir']; ?></td>
                                <td><?= $row['alamat']; ?></td>
                                <td><?= $row['sesuaiKTP']; ?></td>
                                <td><?= $row['pendidikanTerakhir']; ?></td>
                                <td><?= $row['pekerjaan']; ?></td>
                                <td>
                                    <a href="dataAksi/edit.php?userId=<?= $row['userId']; ?>" class="badge alert-warning">Edit</a>
                                    <a href="dataAksi/delete.php?userId=<?= $row['userId']; ?>" onclick="return confirm('Konfirmasi hapus?');" class="badge alert-danger">Delete</a>
                                </td>
                            </tbody>
                        <?php endwhile; ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Location</h4>
                    <p class="lead mb-0">
                        Jl. Tugu Indah
                        <br />
                        Cilincing, Jakarta Utara
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Around the Web</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">About Freelancer</h4>
                    <p class="lead mb-0">
                        Freelance is a free to use, MIT licensed Bootstrap theme created by
                        <a href="http://startbootstrap.com">Start Bootstrap</a>
                        .
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy; Kurisu 2024</small></div>
    </div>

    <!-- <script>
        let formInput = document.getElementById('formInput');

        formInput.addEventListener('submit', function() {
            event.preventDefault();

            // Get Value from FORM INSERT
            const name = document.getElementById('name').value;
            const tanggalLahir = document.getElementById('tanggalLahir').value;
            const tempatLahir = document.getElementById('tempatLahir').value;
            const alamat = document.getElementById('alamat').value;
            const sesuaiKTP = document.getElementById('sesuaiKTP').value;
            const pendidikanTerakhir = document.getElementById('pendidikanTerakhir').value;
            const pekerjaan = document.getElementById('pekerjaan').value;

            if (name == '' || tanggalLahir == '' || tempatLahir == '' || alamat == '' || sesuaiKTP == '' || pendidikanTerakhir == '' || pekerjaan == '') {
                alert('Input harus diisi semua!');
            } else {
                alert('Berhasil! Data telah dimasukkan.');
            }
        })
    </script> -->
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
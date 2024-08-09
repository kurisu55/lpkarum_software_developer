<!-- Code PHP di HTML -->
<?php
include_once('../config/conn_db.php');

// Get userId for Clause Condition
$id = $_GET['userId'];

// Get Data by userId
$dataSelect = mysqli_query($connect, "SELECT * FROM orang
                                      INNER JOIN domisili ON orang.userId = domisili.userId
                                      INNER JOIN lainnya ON orang.userId= lainnya.userId
                                      WHERE orang.userId=$id");
$result = mysqli_fetch_assoc($dataSelect);

// Get data userId as POST
$_POST['userId'] = $id;
// Get data tanggalLahir as POST
$_POST['tanggalLahir'] = $result['tanggalLahir'];
// Get data tempatLahir as POST
$_POST['tempatLahir'] = $result['tempatLahir'];


if (isset($_POST['editData'])) {
    if (editForm($_POST) > 0) {
        echo "<script>alert('Data berhasil diubah!');</script>";
        header('Location:../crud.php');
    } else {
        echo "<script>alert('Data gagal diubah!');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="prakerja, landing page, html css javascript, form" />
    <meta name="author" content="Kristovel Adi Sucipto" />
    <title>NP : <?= $_POST['userId']; ?></title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->

    <link href="../css/styles.css" rel="stylesheet" type="text/css" />
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
            <a class="navbar-brand" href="../index.php">Landing Page</a>
        </div>
    </nav>
    <section class="page-section">
        <div class="container mt-5">
            <div class="row">
                <div class="border border-secondary col">
                    <h1 class="text-center mt-2">FORM EDIT</h1>
                    <form action="" method="post">
                        <input type="text" name="id" id="id" value="<?= $result['Id']; ?>" readonly hidden>
                        <div class="row">
                            <div class="col-3 ms-3">
                                <label for="name" class="col-form-label">No. Kependudukan : </label>
                                <input type="text" name="userId" class="form-control" id="userId" value="<?= $result['userId']; ?>" disabled>
                            </div>
                            <div class="col-5 ms-3">
                                <label for="name" class="col-form-label">Nama : </label>
                                <input type="text" name="name" class="form-control" id="name" value="<?= $result['namaLengkap']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8 ms-3">
                                <label for="alamat" class="col-form-label">Alamat : </label>
                                <textarea name="alamat" class="form-control" id="alamat" placeholder="Input alamat!" cols="" rows="3"><?= $result['alamat']; ?></textarea>
                            </div>
                            <div class="col-3 ms-3">
                                <label for="sesuaiKTP" class="col-form-label">Alamat sesuai KTP : </label>
                                <select name="sesuaiKTP" class="form-select" id="sesuaiKTP">
                                    <option value='1' <?php if ($result['sesuaiKTP'] == 1) {
                                                            echo 'selected';
                                                        } ?>>Ya</option>
                                    <option value='0' <?php if ($result['sesuaiKTP'] == 0) {
                                                            echo 'selected';
                                                        } ?>>Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 ms-3">
                                <label for="pendidikanTerakhir" class="col-form-label">Pendidikan Terakhir : </label>
                                <select name="pendidikanTerakhir" class="form-select" id="pendidikanTerakhir">
                                    <option value="">...</option>
                                    <option value="sd" <?php if ($result['pendidikanTerakhir'] == 'sd') {
                                                            echo 'selected';
                                                        } ?>>SD</option>
                                    <option value="smp" <?php if ($result['pendidikanTerakhir'] == 'smp') {
                                                            echo 'selected';
                                                        } ?>>SMP</option>
                                    <option value="smaSederajat" <?php if ($result['pendidikanTerakhir'] == 'smaSederajat') {
                                                                        echo 'selected';
                                                                    } ?>>SMA sederajat</option>
                                    <option value="perguruanTinggi" <?php if ($result['pendidikanTerakhir'] == 'perguruanTinggi') {
                                                                        echo 'selected';
                                                                    } ?>>Perguruan Tinggi</option>
                                </select>
                            </div>
                            <div class="col-4 ms-3">
                                <label for="pekerjaan" class="col-form-label">Pekerjaan : </label>
                                <select name="pekerjaan" class="form-select" id="pekerjaan">
                                    <option value="tidak" <?php if ($result['pekerjaan'] == 'tidak') {
                                                                echo 'selected';
                                                            } ?>>Tidak Bekerja</option>
                                    <option value="pegawai_swasta" <?php if ($result['pekerjaan'] == 'pegawai_swasta') {
                                                                        echo 'selected';
                                                                    } ?>>Pegawai Swasta</option>
                                    <option value="pegawai_negeri" <?php if ($result['pekerjaan'] == 'pegawai_negeri') {
                                                                        echo 'selected';
                                                                    } ?>>Pegawai Negeri</option>
                                    <option value="wirausaha" <?php if ($result['pekerjaan'] == 'wirausaha') {
                                                                    echo 'selected';
                                                                } ?>>Wirausaha</option>
                                    <option value="pengusaha" <?php if ($result['pekerjaan'] == 'pengusaha') {
                                                                    echo 'selected';
                                                                } ?>>Pengusaha</option>
                                </select>
                            </div>
                        </div>
                        <div class="my-3 ms-3">
                            <button type="submit" class="btn btn-outline-success center col" name="editData">Submit</button>
                        </div>
                    </form>
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
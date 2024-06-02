<!-- Code PHP di HTML -->
<?php
session_start();
if (isset($_POST['insertData'])) {
    if (
        $_POST['name'] == '' || $_POST['tanggalLahir'] == '' || $_POST['tempatLahir'] == '' || $_POST['alamat'] == ''
        || $_POST['sesuaiKTP'] == '' || $_POST['pendidikanTerakhir'] == '' || $_POST['pekerjaan'] == ''
    ) {
        echo "<script>alert('isi semua');</script>";
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
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php#portfolio">Portfolio</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php#about">About</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="page-section">
        <div class="container mt-5">
            <div class="row">
                <div class="border border-secondary col col-5 me-3">
                    <h1 class="text-center mt-2">FORM PENGISIAN</h1>
                    <form action="" method="post" id="formInput">
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
                                    <option value="Tidak">Tidak Bekerja</option>
                                    <option value="pegawaiSwasta">Pegawai Swasta</option>
                                    <option value="pegawaiNegeri">Pegawai Negeri</option>
                                    <option value="wirausaha">Wirausaha</option>
                                    <option value="pengusaha">Pengusaha</option>
                                </select>
                            </div>
                        </div>
                        <div class="row my-3 ms-2">
                            <div class="">
                                <button type="submit" class="btn btn-outline-success center col" name="insertData">Submit</button>
                            </div>
                            <div>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="border-start border-secondary col col-6 ms-3">
                    <h1 class="text-center mt-2">FORM EDIT</h1>
                    <form action="" method="post">
                        <div class="col-8 ms-3">
                            <label for="userId" class="col-form-label">Pencarian Data : </label>
                            <input type="text" name="userId" class="form-control" id="userId" placeholder="Berdasarkan nomor kependudukan!">
                        </div>
                        <div class="my-2 ms-3">
                            <button type="button" class="btn btn-outline-success center col">Submit</button>
                        </div>
                    </form>
                    <table class="table table-sm">
                        <thead>
                            <td>No. Kependudukan</td>
                            <td>Nama</td>
                            <td>Alamat</td>
                            <td>Tanggal Lahir</td>
                            <td>Tempat Lahir</td>
                            <td>Alamat</td>
                            <td>Alamat sesuai KTP</td>
                            <td>Pendidikan Terakhir</td>
                            <td>Pekerjaan</td>
                            <td>Aksi</td>
                        </thead>
                        <tbody>
                            <td></td>
                            <td></td>
                        </tbody>
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

    <script>
        let formInput = document.getElementById('formInput');

        formInput.addEventListener('submit', function() {
            // event.preventDefault();

            const name = document.getElementById('name').value;
            const tanggalLahir = document.getElementById('tanggalLahir').value;
            const tempatLahir = document.getElementById('tempatLahir').value;
            const alamat = document.getElementById('alamat').value;
            const sesuaiKTP = document.getElementById('sesuaiKTP').value;
            const pendidikanTerakhir = document.getElementById('pendidikanTerakhir').value;
            const pekerjaan = document.getElementById('pekerjaan').value;

            if (name == '' || tanggalLahir == '' || tempatLahir == '' || alamat == '' || sesuaiKTP == '' || pendidikanTerakhir == '' || pekerjaan == '') {
                alert('harus disi ya!');
            } else {
                alert('berhasil');
            }
        })
    </script>
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
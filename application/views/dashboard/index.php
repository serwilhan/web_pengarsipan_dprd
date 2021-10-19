<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E - Dokumen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/dashboard-style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<body>

    <nav class="nav">
        <a href="" class="logo">
            <i class="bi bi-file-earmark-plus"></i>
            <span> E-Dokumen </span>
        </a>

        <ul class="menu">
            <li class="active"><a href="index.html"><i class="bi bi-clipboard-data"></i><span>Dashboard</span></a></li>
            <li class="active"><a href="#"><i class="bi bi-folder-plus"></i><span>Transaksi Surat</span></a></li>
            <ul class="sub-menu">
                <li><a href="<?= "IncomingMail" ?>">Surat Masuk</a></li>
                <li><a href="mail2.html">Surat Keluar</a></li>
            </ul>
            <li class="active"><a href="user.html"><i class="bi bi-person"></i><span>User</span></a></li>
            <li class="active"><a href=""><i class="bi bi-gear"></i><span>Pengaturan</span></a></li>
    </nav>

    <main class="content">
        <header class="header">
            <button type="button" class="button toggle-menu active">
                <i class="bi bi-list"></i>
                <span>Dashboard</span>
            </button>
            <form action="" class="form">
                <input type="text" placeholder="Busca">
                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
            <div class="box-profile">
                <img src="<?= base_url('assets'); ?>/img/1.jpg" alt="">
                <p class="name">
                    User
                    <span> Super Admin</span>
                </p>
            </div>
        </header>

        <!-- Bagian Dashboard -->

        <section class="section">
            <div class="container-fluid container-content cards">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card shadow">
                            <div class="desc">
                                <span>0</span>
                                <p>Jumlah Surat Masuk</p>
                            </div>
                            <i class="bi bi-envelope-open-fill"></i>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card shadow">
                            <div class="desc">
                                <span>0</span>
                                <p>Jumlah Surat Keluar</p>
                            </div>
                            <i class="bi bi-telegram"></i>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card shadow">
                            <div class="desc">
                                <span>0</span>
                                <p>Jumlah File</p>
                            </div>
                            <i class="bi bi-file-earmark-zip-fill"></i>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card shadow">
                            <div class="desc">
                                <span>0</span>
                                <p>Jumlah Klasifikasi</p>
                            </div>
                            <i class="bi bi-people-fill"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid container-content charts">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="card shadow">
                            <canvas class="shadow" id="chartClientes" width="400" height="200"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="card shadow">
                            <canvas class="shadow" id="chartReceitas" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer class="footer">
        <span>Copyright <i class="material-icons" style="font-size:12px">copyright</i> 2021, DPRD Kota Makassar</span>
    </footer>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"></script>
    <script src="<?= base_url('assets'); ?>/js/scripts.js"></script>
    <script src="<?= base_url('assets'); ?>/js/charts.js"></script>
</body>

</html>
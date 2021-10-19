<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Dokumen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/dashboard-style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>

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
                <li><a href="mail.html">Surat Masuk</a></li>
                <li><a href="mail2.html">Surat Keluar</a></li>
            </ul>
            <li class="active"><a href="user.html"><i class="bi bi-person"></i><span>User</span></a></li>
            <li class="active"><a href=""><i class="bi bi-gear"></i><span>Pengaturan</span></a></li>
        </ul>
    </nav>

    <main class="content">
        <header class="header">
            <button type="button" class="button toggle-menu active">
                <i class="bi bi-list"></i>
                <span>Transaksi Surat</span>
            </button>
            <form action="" class="form">
                <input type="text" placeholder="Busca">
                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
            <div class="box-profile">
                <img src="img/1.jpg" alt="">
                <p class="name">
                    User
                    <span> Super Admin</span>
                </p>
            </div>
        </header>
        <div class="btn">
            <a href="btn-tambaharsip.html" class="btn btn-primary"><i class="bi bi-pencil-square"></i>Tambah Arsip</a>
        </div>

        <table class="table">
            <thead>
                <th>No.</th>
                <th>Nama Arsip</th>
                <th>Dokumen</th>
                <th>Bulan</th>
                <th>Tanggal</th>
                <th>Opsi</th>
            </thead>
            <tbody>
                <tr>
                    <td data-label="No.">1</td>
                    <td data-label="Nama Arsip">Surat 1</td>
                    <td data-label="Dokumen">Chapter 21112</td>
                    <td data-label="Bulan">Oktober</td>
                    <td data-label="Tanggal">1 januari 2021</td>
                    <td data-label="Opsi">
                        <button type="button" class="btn btn-light"><i class="bi bi-cloud-download"></i></button>
                        <button type="button" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </td>

                </tr>

                <tr>
                    <td data-label="No.">1</td>
                    <td data-label="Nama Arsip">Surat 1</td>
                    <td data-label="Dokumen">Chapter 21112</td>
                    <td data-label="Bulan">Oktober</td>
                    <td data-label="Tanggal">1 januari 2021</td>
                    <td data-label="Opsi">
                        <button type="button" class="btn btn-light"><i class="bi bi-cloud-download"></i></button>
                        <button type="button" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td data-label="No.">1</td>
                    <td data-label="Nama Arsip">Surat 1</td>
                    <td data-label="Dokumen">Chapter 21112</td>
                    <td data-label="Bulan">Oktober</td>
                    <td data-label="Tanggal">1 januari 2021</td>
                    <td data-label="Opsi">
                        <button type="button" class="btn btn-light"><i class="bi bi-cloud-download"></i></button>
                        <button type="button" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td data-label="No.">1</td>
                    <td data-label="Nama Arsip">Surat 1</td>
                    <td data-label="Dokumen">Chapter 21112</td>
                    <td data-label="Bulan">Oktober</td>
                    <td data-label="Tanggal">1 januari 2021</td>
                    <td data-label="Opsi">
                        <button type="button" class="btn btn-light"><i class="bi bi-cloud-download"></i></button>
                        <button type="button" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>

    </main>


    <footer class="footer">
        <span>Copyright <i class="material-icons" style="font-size:12px">copyright</i> 2021, DPRD Kota Makassar</span>
    </footer>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"></script>
    <script src="<?= base_url('assets'); ?>js/scripts.js"></script>
    <script src="<?= base_url('assets'); ?>js/charts.js"></script>
</body>


</html>
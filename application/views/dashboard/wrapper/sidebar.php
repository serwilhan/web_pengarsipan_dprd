<nav class="nav">
    <a href="" class="logo">
        <i class="bi bi-file-earmark-plus"></i>
        <span> E-Dokumen </span>
    </a>

    <ul class="menu">
        <li class="active"><a href="<?= base_url('dashboard'); ?>"><i class="bi bi-clipboard-data"></i><span>Dashboard</span></a></li>
        <li class="active"><a href="#"><i class="bi bi-folder-plus"></i><span>Transaksi Surat</span></a></li>
        <ul class="sub-menu">
            <li><a href="<?= base_url('suratmasuk'); ?>">Surat Masuk</a></li>
            <li><a href="<?= base_url('suratkeluar'); ?>">Surat Keluar</a></li>
        </ul>
        <li class="active"><a href="<?= base_url('user'); ?>"><i class="bi bi-person"></i><span>User</span></a></li>
        <li class="active"><a href="<?= base_url('pengaturan'); ?>"><i class="bi bi-gear"></i><span>Pengaturan</span></a></li>
</nav>
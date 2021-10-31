<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url('assets'); ?>/dist/img/DPRDLogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

        <span class="brand-text font-weight-light">
            <img src="<?= base_url('assets'); ?>/dist/img/DPRDLogo2.png" alt="AdminLTogo" style="margin-left: 30px;">
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/dist/img/profile/') . $user['pas_foto']; ?>" class="img-circle elevation-2" alt="User Image" style="width: 35px; height: 35px; object-fit: cover;">
            </div>
            <div class="info">
                <a href="<?= base_url('userprofile'); ?>" class="d-block"><?= $user['nama']; ?></a>
            </div>
        </div>

        <!-- QUERY MENU -->
        <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `user_menu` . `id`, `menu`
                        FROM `user_menu`
                        JOIN `user_access_menu` ON `user_menu` . `id` = `user_access_menu` . `menu_id`
                        WHERE `user_access_menu`.`role_id` = $role_id
                        ORDER BY `user_access_menu`.`menu_id` ASC
                     ";

        $menu = $this->db->query($queryMenu)->result_array();
        ?>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="<?= base_url('Dashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == "Dashboard") {
                                                                                echo "active";
                                                                            } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-header">TRANSAKSI SURAT</li>
                <li class="nav-item">
                    <a href="<?= base_url("SuratMasuk"); ?>" class="nav-link <?php if ($this->uri->segment(1) == "SuratMasuk") {
                                                                                    echo "active";
                                                                                } ?>">
                        <i class="nav-icon fas fa-file-download"></i>
                        <p>Surat Masuk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url("SuratKeluar"); ?>" class="nav-link <?php if ($this->uri->segment(1) == "SuratKeluar") {
                                                                                    echo "active";
                                                                                } ?>">
                        <i class="nav-icon fas fa-file-upload"></i>
                        <p>Surat Keluar</p>
                    </a>
                </li>

                <!-- MENU LOOPING -->
                <?php foreach ($menu as $m) : ?>
                    <li class="nav-header"><?= $m['menu']; ?></li>

                    <!-- SUB MENU -->
                    <?php
                    $menu_id = $m['id'];
                    $querySubMenu = "SELECT *
                                        FROM `user_sub_menu`
                                        JOIN `user_menu` ON `user_sub_menu` . `menu_id` = `user_menu` . `id`
                                        WHERE `user_sub_menu`.`menu_id` = $menu_id
                                        AND `user_sub_menu`.`menu_id` = 1
                     ";

                    $subMenu = $this->db->query($querySubMenu)->result_array();
                    ?>

                    <?php foreach ($subMenu as $subm) : ?>
                        <li class="nav-item">
                            <a href="<?= base_url($subm['url']); ?>" class="nav-link <?php if ($this->uri->segment(2) == "usermanagement") {
                                                                                            echo "active";
                                                                                        } ?>" ?>
                                <?= $subm['icon']; ?>
                                <p><?= $subm['title']; ?></p>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php endforeach; ?>

                <li class="nav-header">PENGATURAN</li>
                <li class="nav-item">
                    <a href="<?= base_url('UserProfile'); ?>" class="nav-link <?php if ($this->uri->segment(1) == "UserProfile") {
                                                                                    echo "active";
                                                                                } ?>">
                        <i class="nav-icon fas fa-user-edit"></i>
                        <p>Edit Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a type="button" data-toggle="modal" data-target="#modal-default"" class=" nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Logout</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin untuk Logout?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Kembali</button>
                <a href="<?= base_url("LoginPage/logout"); ?>" class="btn btn-danger btn-sm">Logout</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
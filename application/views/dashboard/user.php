<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Management</li> -->
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <?php if ($this->session->flashdata('user-message')) : ?>
            <?= $this->session->flashdata('user-message'); ?>
        <?php endif; ?>

        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger my-alert-style" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <button type="button" class="btn btn-info btn-block btn-flat btn-sm" data-toggle="modal" data-target="#exampleModalLong">
                        <i class="fas fa-plus-circle"></i> Tambah User
                    </button>
                </div>

                <div class="input-group input-group-sm float-right" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                Nama
                            </th>
                            <th>
                                NIK
                            </th>
                            <th>
                                Nomor Telepon
                            </th>
                            <th>
                                Role
                            </th>
                            <th>
                                Status
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_user as $data_usr) : ?>

                            <tr>
                                <td data-label="No"><?= $no++; ?></td>
                                <td data-label="Nama">
                                    <img alt="Avatar" class="table-avatar" src="<?= base_url('assets/dist/img/profile/') . $data_usr['pas_foto']; ?>">
                                    <a style="margin-left: 10px;"><?= $data_usr['nama']; ?></a>
                                </td>
                                <td data-label="NIK">
                                    <?= $data_usr['nik']; ?>
                                </td>
                                <td data-label="Nomor-Telepon">
                                    <?= $data_usr['nomor_telepon']; ?>
                                </td>
                                <td>
                                    <?php if ($data_usr['role_id'] == 1) : ?>
                                        <span class="badge badge-warning" style="width: 60px;">
                                            <?= 'Admin'; ?>
                                        </span>
                                    <?php else : ?>
                                        <span class="badge badge-secondary" style="width: 60px;">
                                            <?= 'User'; ?>
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($data_usr['is_active'] == 1) : ?>
                                        <span class="badge badge-success" style="width: 70px;">
                                            <?= 'Active'; ?>
                                        </span>
                                    <?php else : ?>
                                        <span class="badge badge-danger" style="width: 70px;">
                                            <?= 'Inactive'; ?>
                                        </span>
                                    <?php endif; ?>
                                </td>

                                <td class="project-actions text-right">

                                    <a class="btn btn-info btn-sm" href="<?= base_url(); ?>admin/usermanagement/edituser/<?= $data_usr['id']; ?>" data-toggle="modal" data-target="#editmodal<?= $data_usr['id']; ?>">
                                        <i class="fas fa-cog">
                                        </i>
                                        Settings
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="<?= base_url(); ?>admin/UserManagement/hapusUser/<?= $data_usr['id']; ?>" onclick="return confirm('Klik ok untuk menghapus user.');">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal Tambah User -->
<div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url(); ?>" method="POST">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Lengkap</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" name="nama" id="nama" value="<?= set_value('nama'); ?>">

                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="<?= set_value('nik'); ?>">

                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Nomor Telepon</label>
                        <input type="text" class="form-control" id="notelpon" name="notelpon" value="<?= set_value('notelpon'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="password1" name="password1">

                    </div>

                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password2" name="password2">
                    </div>

                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Edit Modal -->
<?php foreach ($data_user as $data_usr) : ?>
    <div class="modal fade" id="editmodal<?= $data_usr['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleEditModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleEditModal">Edit <strong><?= $data_usr['nama']; ?></strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if ($data_usr['role_id'] == 2) : ?>
                        <form action="<?= base_url(); ?>admin/usermanagement/setasadmin/<?= $data_usr['id']; ?>" method="POST">
                            <button type="submit" class="btn btn-warning btn-block">Jadikan Sebagai Admin</button>
                        </form>
                    <?php else : ?>
                        <form action="<?= base_url(); ?>admin/usermanagement/setasuser/<?= $data_usr['id']; ?>" method="POST">
                            <button type="submit" class="btn btn-secondary btn-block">Jadikan Sebagai User</button>
                        </form>
                    <?php endif; ?>
                    <div class="my-2"></div>
                    <?php if ($data_usr['is_active'] == 1) : ?>
                        <form action="<?= base_url(); ?>admin/usermanagement/nonactivateuser/<?= $data_usr['id']; ?>" method="POST">
                            <button type="submit" class="btn btn-danger btn-block">Nonaktifkan User</button>
                        </form>
                    <?php else : ?>
                        <form action="<?= base_url(); ?>admin/usermanagement/activateuser/<?= $data_usr['id']; ?>" method="POST">
                            <button type="submit" class="btn btn-success btn-block">Aktifkan User</button>
                        </form>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
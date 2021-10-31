<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li> -->
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger my-alert-style" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('editprofile-message'); ?>

            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle my-img" src="<?= base_url('assets/dist/img/profile/') . $user['pas_foto']; ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= $user['nama']; ?></h3>

                            <p class="text-muted text-center">NIK : <?= $user['nik']; ?></p>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-primary card-outline p-2">

                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- /.tab-pane -->
                                <div class="active tab-pane" id="settings">
                                    <?= form_open_multipart('UserProfile/editprofile'); ?>

                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">NIK</label>
                                        <div>
                                            <input type="text" class="form-control" id="inputEmail" placeholder="Email" value="<?= $user['nik']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                        <div>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Name" value="<?= $user['nama']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Nomor Telepon</label>
                                        <div>
                                            <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="Name" value="<?= $user['nomor_telepon']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="pas_foto" class="col-sm-2 col-form-label">Foto</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="pas_foto" name="pas_foto">
                                            <label class="custom-file-label" for="pas_foto">Choose file</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
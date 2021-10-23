<div class="wrapper">
    <div class="title">
        Tambah User
    </div>

    <form class="form" action="<?= base_url('user/tambahuser'); ?>" method="POST">
        <div class="inputfield">
            <label>Nama Lengkap</label>
            <input type="text" class="input" name="nama" id="nama" value="<?= set_value('nama'); ?>">
            <?php echo form_error('nik', '<small class="text-danger">', '</small>'); ?>
        </div>

        <div class="inputfield">
            <label>NIK</label>
            <input type="text" class="input" id="nik" name="nik" value="<?= set_value('nik'); ?>">
            <?php echo form_error('nik', '<small class="text-danger">', '</small>'); ?>
        </div>

        <div class="inputfield">
            <label>Nomor Telepon</label>
            <input type="text" class="input" id="notelpon" name="notelpon" value="<?= set_value('notelpon'); ?>">
        </div>

        <div class="inputfield">
            <label>Password</label>
            <input type="password" class="input" id="password1" name="password1">
            <?php echo form_error('password1', '<small class="text-danger">', '</small>'); ?>
        </div>

        <div class="inputfield">
            <label>Konfirmasi Password</label>
            <input type="password" class="input" id="password2" name="password2">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Upload Foto</label>
            <input class="form-control" type="file" id="foto" name="foto">
            <?php echo form_error('foto', '<small class="text-danger">', '</small>'); ?>

        </div>

        <div class="inputfield">
            <input type="submit" value="Tambah User" class="btn">
        </div>
    </form>

</div>
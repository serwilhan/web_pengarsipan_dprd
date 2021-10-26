<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Surat Keluar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Simple Tables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <button type="button" class="btn btn-info btn-block btn-flat btn-sm" data-toggle="modal" data-target="#exampleModalLong">
                                    <i class="fas fa-plus-circle"></i> Tambah Surat
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
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No Surat</th>
                                        <th>Perihal</th>
                                        <th>Penerima</th>
                                        <th>Tanggal Surat</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_suratkeluar as $data_sk) : ?>
                                        <tr>
                                            <td data-label="No."><?= $no++; ?></td>
                                            <td data-label="No Surat"><?= $data_sk['no_surat']; ?></td>
                                            <td data-label="Perihal"><?= $data_sk['perihal']; ?></td>
                                            <td data-label="Pengirim"><?= $data_sk['penerima']; ?></td>
                                            <td data-label="Tanggal Surat"><?= $data_sk['tanggal_surat']; ?></td>
                                            <td data-label="Opsi">
                                                <button type="button" class="btn btn-light btn-sm"><i class="bi bi-cloud-download">Detail</i></button>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>

</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Surat Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('SuratKeluar/tambah_suratkeluar'); ?>" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">No. Surat</label>
                        <input type="text" class="form-control" id="no_surat" aria-describedby="emailHelp" name="no_surat">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Surat</label>
                        <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Perihal</label>
                        <input type="text" class="form-control" id="perihal" name="perihal">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Penerima</label>
                        <input type="text" class="form-control" id="penerima" name="penerima">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Isi Ringkasan</label>
                        <textarea class="form-control" rows="3" id="isi_ringkasan" name="isi_ringkasan"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="file">Upload File</label>

                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file" name="file">
                            <label class="custom-file-label" for="file">Choose file</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>

            </div>

        </div>
    </div>
</div>
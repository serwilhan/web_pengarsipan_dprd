        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
            Tambah Arsip
        </button>

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
                        <div class="wrapper">
                            <div class="form">
                                <form action="<?= base_url('SuratKeluar/tambah_suratkeluar'); ?>" method="POST">
                                    <div class="inputfield">
                                        <label>No. Surat</label>
                                        <input type="text" class="input" id="no_surat" name="no_surat">
                                    </div>

                                    <div class="inputfield">
                                        <label>Tanggal Surat</label>
                                        <input type="date" class="input" id="tanggal_surat" name="tanggal_surat">
                                    </div>

                                    <div class="inputfield">
                                        <label>Perihal</label>
                                        <input type="text" class="input" id="perihal" name="perihal">
                                    </div>

                                    <div class="inputfield">
                                        <label>Penerima</label>
                                        <input type="text" class="input" id="penerima" name="penerima">
                                    </div>

                                    <div class="inputfield">
                                        <label>Isi Ringkasan</label>
                                        <textarea class="textarea" id='isi_ringkasan' name="isi_ringkasan"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload File</label>
                                        <input class="form-control" type="file" id="formFile" name="file">
                                    </div>

                                    <div class="inputfield">
                                        <input type="submit" value="Tambah Data" class="btn">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <table class="table">
            <thead>
                <th>No.</th>
                <th>No Surat</th>
                <th>Perihal</th>
                <th>Penerima</th>
                <th>Tanggal Surat</th>
                <th>Opsi</th>
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
                            <button type="button" class="btn btn-light"><i class="bi bi-cloud-download"></i></button>
                            <button type="button" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
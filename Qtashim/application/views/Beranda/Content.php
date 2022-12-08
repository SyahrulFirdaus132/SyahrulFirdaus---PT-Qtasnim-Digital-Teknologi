<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalLogout">
                Logout
            </button>

            <div class="modal fade" id="exampleModalLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apa anda yakin untuk keluar?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Pilih Logout Jika ingin Keluar halaman
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a class="btn btn-danger" href="<?= base_url('auth/logout'); ?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="navbar-nav ml-auto">
                <div class="topbar-divider d-none d-sm-block"></div>
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name'] ?></span>
                    </a>
                </li>
        </nav>

        <h1 class="text-center">PT Qtasnim Digital Teknologi</h1>
        <p class="text-center"> Nama : Syahrul Firdaus</p>
        <p class="text-center"> Teknikal Test</p>

        &nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalTambah">
            Tambah data Penjualan
        </button>


        <div class="modal fade" id="exampleModalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah data tabel Penjualan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <?= form_open_multipart('C_Content/tambah_aksi') ?>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="kode_barang" placeholder="Kode Barang" name="kode_barang" autofocus required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="nama_barang" placeholder="Nama Barang" name="nama_barang" required>
                        </div>


                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="id_stok" placeholder="Id Stok" name="id_stok" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="Stok" placeholder="stok" name="stok" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="jumlah_terjual" placeholder="Jumlah Terjual" name="jumlah_terjual" required>
                        </div>

                        <div class="form-group">
                            <input type="date" class="form-control form-control-user" id="tanggal_transaksi" placeholder="Tanggal Transaksi" name="tanggal_transaksi" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="jenis_barang" placeholder="Jenis Barang" name="jenis_barang" required>
                        </div>



                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Simpan
                        </button>
                        <a class="btn btn-warning btn-user btn-block" href="<?= base_url('C_Content') ?>">Batal</a>
                        <hr>

                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>


        <a href="<?= base_url('C_Content/Ascending'); ?>" class=" btn btn-success d-inline">
            KLIK UNTUK MENGURUTKAN DATA PENJUALAN BERDASARKAN DATA TRANSAKSI ( JUMLAH TERJUAL )</i></a>


        <a href="<?= base_url('C_Content/filter'); ?>" class=" btn btn-success d-inline">
            Filter</i></a>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">TABEL PENJUALAN SOAL NO 2 SEBELUM NORMALISASI</h6>
            </div>

            <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
                <div class="table-responsive">


                    <table class="table table-bordered" id="tabel6" width="100%" cellspacing="0">
                        <thead>
                            <tr style="background-color:#000000;color:#ffffff;">
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Id Stok</th>
                                <th>Stok</th>
                                <th>Jumlah Terjual</th>
                                <th>Tanggal Transaksi</th>
                                <th>Jenis Barang</th>
                                <th>Hapus</th>
                                <th>Update</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr style="background-color:#000000;color:#ffffff;">

                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Id Stok</th>
                                <th>Stok</th>
                                <th>Jumlah Terjual</th>
                                <th>Tanggal Transaksi</th>
                                <th>Jenis Barang</th>
                                <th>Hapus</th>
                                <th>Update</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($barang as $mhs) : ?>
                                <tr style="background-color:#FDFDBD ;">
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $mhs['kode_barang'] ?></td>
                                    <td><?php echo $mhs['nama_barang'] ?></td>
                                    <td><?php echo $mhs['id_stok'] ?></td>
                                    <td><?php echo $mhs['stok'] ?></td>
                                    <td><?php echo $mhs['jumlah_terjual'] ?></td>
                                    <td><?php echo $mhs['tanggal_transaksi'] ?></td>
                                    <td><?php echo $mhs['jenis_barang'] ?></td>
                                    <td>

                                        <a href="<?= base_url('C_Content/del/' . $mhs['id']); ?>" class=" btn btn-danger d-inline" onclick="return confirm('apakah ada yakin akan menghapusnya ?');">
                                            <i class="fas fa-trash-alt"></i></a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalUpdate">
                                            Update Data Penjualan
                                        </button>


                                        <div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">UPDATE DATA TABEL PENJUALAN</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <?= form_open_multipart('C_Content/update') ?>

                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-user" id="kode_barang" placeholder="Kode Barang" name="kode_barang" autofocus required>
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-user" id="nama_barang" placeholder="Nama Barang" name="nama_barang" required>
                                                        </div>


                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-user" id="id_stok" placeholder="Id Stok" name="id_stok" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-user" id="Stok" placeholder="stok" name="stok" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-user" id="jumlah_terjual" placeholder="Jumlah Terjual" name="jumlah_terjual" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="date" class="form-control form-control-user" id="tanggal_transaksi" placeholder="Tanggal Transaksi" name="tanggal_transaksi" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-user" id="jenis_barang" placeholder="Jenis Barang" name="jenis_barang" required>
                                                        </div>



                                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                                            Simpan
                                                        </button>
                                                        <a class="btn btn-warning btn-user btn-block" href="<?= base_url('C_Content') ?>">Batal</a>
                                                        <hr>

                                                        <?= form_close(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                </div>
            </div>
        </div>
    </div>
    </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-danger">NORMALISASI TABEL PENJUALAN</h6>
</div>
<table class="table table-bordered" id="tabel4" width="100%" cellspacing="0">
    <thead>
        <tr style="background-color:#3F0071;color:#ffffff;">
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah Terjual</th>
            <th>Jenis Barang</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($barang as $mhs) : ?>
            <tr style="background-color:#FDFDBD ;">
                <td><?php echo $no++ ?></td>
                <td><?php echo $mhs['kode_barang'] ?></td>
                <td><?php echo $mhs['nama_barang'] ?></td>
                <td><?php echo $mhs['jumlah_terjual'] ?></td>
                <td><?php echo $mhs['jenis_barang'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<table class="table table-bordered" id="tabel5" width="100%" cellspacing="0">
    <thead>
        <tr style="background-color:#3F0071;color:#ffffff;">
            <th>No</th>
            <th>Kode Barang</th>
            <th>Id Stok</th>
            <th>Stok</th>
            <th>Tanggal Transaksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($barang as $mhs) : ?>
            <tr style="background-color:#FDFDBD ;">
                <td><?php echo $no++ ?></td>
                <td><?php echo $mhs['kode_barang'] ?></td>
                <td><?php echo $mhs['id_stok'] ?></td>
                <td><?php echo $mhs['stok'] ?></td>
                <td><?php echo $mhs['tanggal_transaksi'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>




<script type="text/javascript">
    $(document).ready(function() {
        $('#tabel4').DataTable({
            "lengthChange": false,
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tabel5').DataTable({
            "lengthChange": false,
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tabel6').DataTable({
            "lengthChange": false,
        });
    });
</script>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
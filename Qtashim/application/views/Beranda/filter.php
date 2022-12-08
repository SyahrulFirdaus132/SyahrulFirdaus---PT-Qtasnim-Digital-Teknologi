<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalLogout">
                Logout
            </button>
            
            &nbsp;<a href="<?= base_url('C_Content'); ?>" class=" btn btn-danger d-inline">Kembali</i></a>

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

        <div class="container">
            <h1>Filter Data</h1>
            <br>
            <div class="col-md-3">
                <table class="table">
                    <tr>
                        <td>
                            <select class="form-control" name="" id="waktu">
                                <option value="0">Show All</option>
                                <option value="1">2015</option>
                                <option value="2">2016</option>
                                <option value="3">2017</option>
                            </select>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">FILTER TABEL</h6>
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
                </div>
            </div>
        </div>
    </div>
    </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tabel6').DataTable({
            "lengthChange": false,
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#waktu').change(function() {
            let a = $(this.value);

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
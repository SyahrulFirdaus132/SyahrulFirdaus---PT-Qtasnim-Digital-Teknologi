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


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">TRANSAKSI JUMLAH TERJUAL TERENDAH KE TERBANYAK</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="tabel2" width="100%" cellspacing="0">
                    <thead>
                        <tr style="background-color:#3F0071;color:#ffffff;">
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Id Stok</th>
                                <th>Stok</th>
                                <th >Jumlah Terjual</th>
                                <th>Tanggal Transaksi</th>
                                <th>Jenis Barang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($barang as $mhs) : ?>

                            <tr style="background-color: #FAF4B7 ; font-weight:bold;">
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $mhs['kode_barang'] ?></td>
                                    <td><?php echo $mhs['nama_barang'] ?></td>
                                    <td><?php echo $mhs['id_stok'] ?></td>
                                    <td><?php echo $mhs['stok'] ?></td>
                                    <td style="background-color: #C8FFD4;"><?php echo $mhs['jumlah_terjual'] ?></td>
                                    <td><?php echo $mhs['tanggal_transaksi'] ?></td>
                                    <td><?php echo $mhs['jenis_barang'] ?></td>
                            </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
                <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">TRANSAKSI JUMLAH TERJUAL TERBANYAK KE TERENDAH</h6>
        </div>
                <table class="table table-bordered" id="tabel3" width="100%" cellspacing="0">
                    <thead>
                        <tr style="background-color:#3F0071;color:#ffffff;">
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Jumlah Terjual</th>
                            <th>Tanggal Transaksi</th>
                            <th>Jenis Barang</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($barang as $mhs) : ?>

                            <tr style="background-color: #FAF4B7 ; font-weight:bold;">
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $mhs['nama_barang'] ?></td>
                                <td><?php echo $mhs['stok'] ?></td>
                                <td style="background-color: #C8FFD4;"><?php echo $mhs['jumlah_terjual'] ?></td>
                                <td><?php echo $mhs['tanggal_transaksi'] ?></td>
                                <td><?php echo $mhs['jenis_barang'] ?></td>
                            </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>


                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#tabel2').DataTable({
                            "lengthChange": false,
                            "order": [
                                [3, "asc"]
                            ]
                        });
                    });
                </script>

                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#tabel3').DataTable({
                            "lengthChange": false,
                            "order": [
                                [3, "desc"]
                            ]
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


<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin Kamu mau Pergi?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih Logout untuk keluar halaman.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>
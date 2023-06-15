<?= $this->extend('template/index'); ?>

<?= $this->section('page-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="clearfix">
                    <div class="float-left">
                        <h1 class="h3 mb-4 text-gray-800">Data Pesanan</h1>
                    </div>
                    <!-- <div class="float-right">
								<a href="" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
							</div> -->
                </div>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">

            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?php echo base_url('t_datapesanan/tambah'); ?>">

                            <div class="form-group">
                                <label for="nama">Nama Pemesan</label>
                                <input type="text" name="nama_pemesan" id="nama" required="required" placeholder="ketik" autocomplete="off" class="form-control">
                            </div>




                            <div class="form-group">
                                <label for="id_mobil">Mobil</label>
                                <select name="mobil" id="id_mobil" class="form-control">
                                    <option value="15">Suzuki All New Ertiga</option>
                                    <option value="16">truk</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_perjalanan">Perjalanan</label>
                                <select name="perjalanan" id="id_perjalanan" class="form-control">
                                    <option value="3">Cilacap - Jogjakarta (300 KM)</option>
                                    <option value="4">Cilacap - Ciamis (70 KM)</option>

                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id_jenis_bayar">Jenis Bayar</label>
                                        <select name="jenis_bayar" id="id_jenis_bayar" class="form-control">
                                            <option value="3">Cash</option>
                                            <option value="4">Kredit</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="number" name="total_harga" id="harga" placeholder="ketik" required="required" autocomplete="off" class="form-control">

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tgl_pinjam">Tanggal Pinjam</label>
                                        <input type="date" name="tanggal_pinjam" id="tgl_pinjam" required="required" autocomplete="off" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tgl_kembali">Tanggal Kembali</label>
                                        <input type="date" name="tanggal_kembali" id="tgl_kembali" required="required" autocomplete="off" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-success" name="tambah"><i class="fa fa-plus"></i> Tambah</button>
                                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="card shadow">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Pesanan</h6>
                    </div>
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('success'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">

                        <table class="table table-bordered" id="data" width="" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pemesan</th>
                                    <th>Mobil</th>
                                    <th>jenis_bayar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($data_pesanan as $m) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>

                                        <td><?= $m->nama_pemesan; ?></td>
                                        <td><?= $m->mobil; ?></td>
                                        <td><?= $m->jenis_bayar; ?></td>
                                        <td>
                                            <a href="t_datapesanan/ubah/<?= $m->id_pesanan; ?>" class="btn btn-sm btn-info mb-2"><i class="fa fa-pen"></i> Ubah</a><br>
                                            <a href="data/detailpesanan" class="btn btn-sm btn-warning mb-2"><i class="fa fa-eye"></i> Detail</a><br>
                                            <a href="t_datapesanan/hapus/<?= $m->id_pesanan; ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>
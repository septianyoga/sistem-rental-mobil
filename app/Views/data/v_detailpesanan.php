<?= $this->extend('template/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="clearfix">
                <div class="float-left">
                    <h1 class="h3 mb-4 text-gray-800">Detail Pesanan</h1>
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
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Pesanan - Fakhrul</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            Nama Pemesan <br>
                            Tanggal Pinjam <br>
                            Tanggal Kembali <br>
                            Mobil <br>
                            Perjalanan <br>
                            Total Harga <br>
                            Jenis Bayar <br>
                        </div>
                        <div class="col-sm-1">
                            : <br>
                            : <br>
                            : <br>
                            : <br>
                            : <br>
                            : <br>
                            : <br>
                        </div>
                        <div class="col-sm-6">
                            <strong>Fakhrul</strong><br>
                            <strong>2022-11-26</strong><br>
                            <strong>2022-11-27</strong><br>
                            <strong>Suzuki All New Ertiga</strong><br>
                            <strong>Cilacap - Jogjakarta</strong><br>
                            <strong>Rp. 300.000,00</strong><br>
                            <strong>Cash</strong><br>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <a href="" class="btn btn-sm btn-info"><i class="fa fa-pen"></i> Ubah</a>
                            <a href="" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Hapus</a>
                            <a href="<?= base_url('pesanan') ?>" class="btn btn-sm btn-secondary"><i class="fa fa-reply"></i> Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection(); ?>
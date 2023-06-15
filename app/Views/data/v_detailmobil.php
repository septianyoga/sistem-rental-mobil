<?= $this->extend('template/index'); ?>

<?= $this->section('page-content'); ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
	<div id="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="clearfix">
						<div class="float-left">
							<h1 class="h3 mb-4 text-gray-800">Detail Mobil</h1>
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
				<div class="col-sm-8">
					<div class="card shadow">
						<?php foreach ($data_mobil as $m) : ?>
							<div class="card-header">
								<h6 class="m-0 font-weight-bold text-primary">Detail Mobil - <?= $m->nama_mobil; ?></h6>
							</div>

							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<img src="<?= base_url('foto_mobil/' . $m->gambar) ?>" alt="Suzuki All New Ertiga" class="img-thumbnail mb-4">
									</div>
									<div class="col-md-6">
										<table class="table table-borderless">
											<tr>
												<td>Nama</td>
												<td>:</td>
												<td><b><?= $m->nama_mobil; ?></b></td>
											</tr>
											<tr>
												<td>Merk</td>
												<td>:</td>
												<td><b><?= $m->nama_merk; ?></b></td>
											</tr>
											<tr>
												<td>Nomer Polisi</td>
												<td>:</td>
												<td><b><?= $m->no_polisi; ?></b></td>
											</tr>
											<tr>
												<td>Jumlah Kursi</td>
												<td>:</td>
												<td><b><?= $m->jumlah_kursi; ?></b></td>
											</tr>
											<tr>
												<td>Tahun Beli</td>
												<td>:</td>
												<td><b><?= $m->tahun_beli; ?></b></td>
											</tr>
											<tr>
												<td>Harga</td>
												<td>:</td>
												<td><b>Rp.<?= number_format($m->harga, 0, ",", ".") ?></b></td>
											</tr>
										</table>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<a href="<?= base_url('mobil') ?>" class="btn btn-sm btn-secondary"><i class="fa fa-reply"></i> Kembali</a>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?= $this->endSection(); ?>
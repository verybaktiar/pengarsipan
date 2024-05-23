<div id="wrapper">
	<!-- Sidebar -->
	<?php $this->load->view('templates/sidebar'); ?>
	<!-- End of Sidebar -->
	<!-- Content Wrapper -->
	<div id="content-wrapper" class="d-flex flex-column">
		<!-- Main Content -->
		<div id="content">
			<!-- Topbar -->
			<?php $this->load->view('templates/topbar'); ?>

			<!-- End of Topbar -->
			<!-- Begin Page Content -->
			<div class="container-fluid">

				<!-- Page Heading -->
				<h1 class="h3 mb-4 text-gray-800">Dokumentasi</h1>
				<div class="card card-success">
					<div class="card-body">

						<?php if ($user == 'superadmin') { ?>
							<div class="row">
								<div class="col-md-3">
									<a href="<?= base_url('dokumentasi/create') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah data </a>
								</div>
							</div>
						<?php } else {
						} ?>
						<br>
						<div class="table-responsive">
							<?php if ($this->session->flashdata('message')) : ?>
								<div class="alert alert-success">
									<strong>Berhasil</strong>
									<p><?= $this->session->flashdata('message'); ?></p>
								</div>
							<?php endif ?>
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama Kegiatan</th>
										<th>Tanggal Kegiatan</th>
										<th>Deskripsi Kegiatan</th>
										<th>Gambar</th>
										<?php if ($user == 'superadmin' || $user == 'admin') { ?>
											<th>Aksi</th>
										<?php } else {
										} ?>

									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($dokumentasi as $sm) : ?>
										<tr>
											<td><?= $no++; ?></td>
											<td><?= $sm->nama_kegiatan; ?></td>
											<td><?= $sm->tanggal_kegiatan; ?></td>
											<td><?= $sm->deskripsi_kegiatan; ?></td>

											<td>
												<?php if ($sm->gambar) : ?>
													<img src="<?= base_url('uploads/' . $sm->gambar); ?>" alt="Gambar Program" style="width: 100px; height: auto;">
												<?php else : ?>
													<p>Tidak ada gambar</p>
												<?php endif; ?>
											</td>
											<?php if ($user == 'superadmin') { ?>
												<td>
													<a href="<?= base_url('dokumentasi/edit/' . $sm->id_dokumentasi) ?>"><span class="badge badge-warning d-block">Edit</span></a>
													<br>
													<a onclick="return confirm('Apakah anda yakin?')" href=" <?= base_url('dokumentasi/delete/' . $sm->id_dokumentasi) ?>"><span class="badge badge-danger d-block">Hapus</span></a>
													<br>
												<?php if ($sm->gambar) : ?>
													<a href="<?= base_url('uploads/' . $sm->gambar); ?>"><span class="badge badge-success d-block">Download</span></a>
												<?php endif; ?>
											</td>
												
											<?php } else {
											} ?>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- End of Main Content -->
		<!-- modal tambah -->
		<?php $this->load->view('admin/ekstra/modal'); ?>
		<!-- Footer -->
		<?php $this->load->view('templates/copyright') ?>
		<!-- End of Footer -->
	</div>
	<!-- End of Content Wrapper -->
</div>
</div>
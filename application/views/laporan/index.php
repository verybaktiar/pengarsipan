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
				<h1 class="h3 mb-4 text-gray-800">Laporan Kegiatan</h1>
				<div class="card card-success">
					<div class="card-body">

						<?php if ($user == 'member') { ?>
							<div class="row">
								<div class="col-md-3">
									<a href="<?= base_url('laporan/create') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah data </a>
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
										<th>Tanggal</th>
										<th>Kegiatan</th>
										<th>Tempat</th>
										<th>Penanggung Jawab</th>
										<th>Bukti Foto</th>
										<th>Status</th>
										
									<?php if ($user == 'member' || $user == '' ) { ?>
										<th>Aksi</th>
											<?php } else {
											} ?>
									
									</tr>
								</thead>
								<tbody>
								<?php $no = 1;
									foreach ($laporan as $sm) : ?>
										<tr>
											<td><?= $no++; ?></td>
											<td><?= $sm->tanggal; ?></td>
											<td><?= $sm->kegiatan; ?></td>
											<td><?= $sm->tempat; ?></td>
											<td><?= $sm->penanggung_jawab; ?></td>
											
											<td>
												<?php if ($sm->gambar): ?>
													<img src="<?= base_url('uploads/' . $sm->gambar); ?>" alt="Gambar Program" style="width: 100px; height: auto;">
												<?php else: ?>
													<p>Tidak ada gambar</p>
												<?php endif; ?>
											</td>
											<td><?= $sm->status; ?></td>
											<?php if ($user == 'member') { ?>
												<td>
													<a href="<?= base_url('laporan/edit/' . $sm->id_laporan) ?>"><span class="badge badge-warning d-block">Edit</span></a>
													<br>
													<a onclick="return confirm('Apakah anda yakin?')" href=" <?= base_url('laporan/delete/' . $sm->id_laporan) ?>"><span class="badge badge-danger d-block">Hapus</span></a>
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
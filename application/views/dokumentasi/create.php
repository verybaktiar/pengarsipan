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
                <h1 class="h3 mb-4 text-gray-800">Materi</h1>
                <div class="card card-success">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="row">
                            <div class="col-md-3">
                                <a href="<?= base_url('dokumentasi') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali </a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-danger">
                                    <?php echo validation_errors(); ?>
                                </div>
                                <form action="" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="">Nama Kegiatan</label>
                                        <input type="text" name="nama_kegiatan" placeholder="Nama Kegiatan" id="nama_kegiatan" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                                        <input type="date" name="tanggal_kegiatan" placeholder="Tanggal Kegiatan" id="tanggal_kegiatan" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi_kegiatan">Deskripsi Kegiatan</label>
                                        <input type="text" name="deskripsi_kegiatan" id="deskripsi_kegiatan" class="form-control">
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="gambar">Upload Gambar Kegiatan</label>
                                        <input type="file" name="gambar" id="gambar" class="form-control-file">
                                    </div>
                                    <div class="form-group">
                                        <label for="pdf">Upload PDF Kegiatan</label>
                                        <input type="file" name="pdf" id="pdf" class="form-control-file" accept="application/pdf">
                                    </div>
                                    
                                        <!-- <div class="form-group">
                                            <label>Dokumen Surat</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="dokumen" class="custom-file-input">
                                                    <label class="custom-file-label">Pilih dokumen</label>
                                                </div>
                                            </div> -->
                                      
										<button type="submit" class="btn btn-primary">Simpan</button>
									</form>
								</div>
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
</div>
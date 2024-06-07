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
                        <?= $this->session->flashdata('message'); ?>
                        <div class="row">
                            <div class="col-md-3">
                                <a href="<?= base_url('laporan') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali </a>
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
                                        <label for="">tanggal</label>
                                        <input type="date" name="tanggal" id="tanggal" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">kegiatan</label>
                                        <input type="text" name="kegiatan" placeholder="kegiatan" id="kegiatan" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">tempat</label>
                                        <input type="text" name="tempat" placeholder="tempat" id="tempat" class="form-control">
                                    </div>
                                  
                                    <div class="form-group">
                                        <label for="">penanggung jawab</label>
                                        <input type="text" name="penanggung_jawab" placeholder="penanggung jawab" id="penanggung_jawab" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Bukti Foto</label>
                                        <input type="file" name="gambar" id="gambar" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="Kegiatan Telah Dilaksanakan">Kegiatan Telah Dilaksanakan</option>
                                            <option value="Kegiatan Belum Dilaksanakan">Kegiatan Belum Dilaksanakan</option>
                                        </select>
                                    </div>

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
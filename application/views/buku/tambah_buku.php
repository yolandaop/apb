<div class="isi">
        <div class="row">
            <div class="col-lg-12"><br />
            
                <ol class="breadcrumb">
                    <li><a href="<?php print_r base_url('buku/index'); ?>">Buku</a></li>
                    <li class="active">Tambah Buku</li>
                </ol>

                <?php
                    print_r validation_errors();
                    //buat message nis
                    if(!empty($message)) {
                    print_r $message;
                    }
                ?>

            </div>
            <!-- /.col-lg-12 -->
        </div>
        
        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">

                    <div class="panel-heading">
                        Tambah Buku
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                    <?php
                        //validasi error upload
                        if(!empty($error)) {
                            print_r $error;
                        }
                    ?>
                    <?php print_r form_open_multipart('buku/insert', array('class' => 'form-horizontal', 'id' => 'jvalidate', 'autocomplete'=>'off')) ?>

                        <div class="form-group">
                            <p class="col-sm-2 text-left">Kode Buku </p>

                            <div class="col-sm-10">
                                <input type="text" name="bibid" class="form-control" placeholder="Kode Buku" value="<?php print_r set_value('bibid'); ?>">
                                <span class="text-danger">*) wajib diisi</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <p class="col-sm-2 text-left">Judul </p>

                            <div class="col-sm-10">
                                <input type="text" name="judul" class="form-control" placeholder="Judul Buku" value="<?php print_r set_value('judul'); ?>">
                            <span class="text-danger">*) wajib diisi</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <p class="col-sm-2 text-left">Kategori</p>

                            <div class="col-sm-10">
                                <input type="text" name="kategori" class="form-control" placeholder="Kategori" value="<?php print_r set_value('kategori'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <p class="col-sm-2 text-left">Penerbit </p>

                            <div class="col-sm-10">
                                <input type="text" name="penerbit" class="form-control" placeholder="Penerbit" value="<?php print_r set_value('penerbit'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <p class="col-sm-2 text-left">Deskripsi Buku </p>

                            <div class="col-sm-10">
                                <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi Buku" value="<?php print_r set_value('deskripsi'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <p class="col-sm-2 text-left">Nomor </p>

                            <div class="col-sm-10">
                                <input type="text" name="nomor" class="form-control" placeholder="Nomor Buku" value="<?php print_r set_value('nomor'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <p class="col-sm-2 text-left">Eksemplar </p>

                            <div class="col-sm-10">
                                <input type="text" name="eksemplar" class="form-control" placeholder="Jumlah Buku" value="<?php print_r set_value('eksemplar'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <p class="col-sm-2 text-left">Kepemilikan </p>

                            <div class="col-sm-10">
                                <input type="text" name="kepemilikan" class="form-control" placeholder="Sumber kepemilikan" value="<?php print_r set_value('kepemilikan'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <p class="col-sm-2 text-left">Sumber</p>

                            <div class="col-sm-10">
                                <input type="text" name="sumber" class="form-control" placeholder="Sumber buku" value="<?php print_r set_value('sumber'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <p class="col-sm-2 text-left">Tanggal diterima</p>

                            <div class="col-sm-10">
                                <input type="text" name="tanggal_diterima" class="form-control" placeholder="01-01-2000" value="<?php print_r set_value('tanggal_diterima'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <p class="col-sm-2 text-left">Tanggal digunakan </p>

                            <div class="col-sm-10">
                                <input type="text" name="tanggal_digunakan" class="form-control" placeholder="01-01-2000" value="<?php print_r set_value('tanggal_digunakan'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6">
                                <div class="btn-group pull-left">
                                    <?php print_r anchor('buku', 'Kembali', array('class' => 'btn btn-danger btn-sm')); ?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="btn-group pull-right">
                                    <input type="submit" name="save" value="Simpan" class="btn btn-success btn-sm">
                                </div>
                            </div>
                        </div>
                    <?php print_r form_close(); ?>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            </div>
        </div>
    </div>

<!-- jQuery -->
<script src="<?php print_r base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php print_r base_url(); ?>template/backend/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Datepicker -->
<script src="<?php print_r base_url(); ?>template/backend/sbadmin/js/bootstrap-datepicker.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php print_r base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Datepicker -->
<script src="<?php print_r base_url(); ?>template/backend/sbadmin/js/tinymce/tinymce.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php print_r base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>





</body>
</html>
<div class="isi">
<div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('buku/index'); ?>">Buku</a></li>
            <li class="active">Edit Buku</li>
        </ol>

        <?php
            echo validation_errors();
            //buat message nis
            if(!empty($message)) {
            echo $message;
            }
        ?>

    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">

            <div class="panel-heading">
                Edit Buku
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            <?php
                //validasi error upload
                if(!empty($error)) {
                    echo $error;
                }
            ?>
            <?php echo form_open_multipart('buku/update', array('class' => 'form-horizontal', 'id' => 'jvalidate', 'autocomplete'=>'off')) ?>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Bibid </p>

                    <div class="col-sm-10">
                        <input type="text" name="bibid" class="form-control" placeholder="Kode Buku" value="<?php echo $edit['bibid']; ?>" readonly="readonly">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Judul </p>

                    <div class="col-sm-10">
                        <input type="text" name="judul" class="form-control" placeholder="Judul Buku" 
                        value="<?php echo $edit['judul']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">Kategori </p>

                    <div class="col-sm-10">
                        <input type="text" name="kategori" class="form-control" placeholder="Kategori Buku" 
                        value="<?php echo $edit['kategori']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Penerbit </p>

                    <div class="col-sm-10">
                        <input type="text" name="penerbit" class="form-control" placeholder="Penerbit Buku" 
                        value="<?php echo $edit['penerbit']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Deskripsi Fisik </p>

                    <div class="col-sm-10">
                        <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi Buku" 
                        value="<?php echo $edit['deskripsi']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Nomor</p>

                    <div class="col-sm-10">
                        <input type="text" name="nomor" class="form-control" placeholder="Nomor Panggil Buku" 
                        value="<?php echo $edit['nomor']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Eksemplar </p>

                    <div class="col-sm-10">
                        <input type="text" name="eksemplar" class="form-control" placeholder="Jumlah Buku" value="<?php echo $edit['eksemplar']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">Kepemilikan </p>

                    <div class="col-sm-10">
                        <input type="text" name="kepemilikan" class="form-control" placeholder="Sumber kepemilikan" value="<?php echo $edit['kepemilikan']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">Sumber</p>

                    <div class="col-sm-10">
                        <input type="text" name="sumber" class="form-control" placeholder="Sumber buku" value="<?php echo $edit['sumber']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">Tanggal diterima</p>

                    <div class="col-sm-10">
                        <input type="text" name="tanggal_diterima" class="form-control" placeholder="01-01-2000" value="<?php echo $edit['tanggal_diterima']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">Tanggal digunakan </p>

                    <div class="col-sm-10">
                        <input type="text" name="tanggal_digunakan" class="form-control" placeholder="01-01-2000" value="<?php echo $edit['tanggal_digunakan']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                        <div class="btn-group pull-left">
                            <?php echo anchor('buku', 'Kembali', array('class' => 'btn btn-danger btn-sm')); ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="btn-group pull-right">
                            <input type="submit" name="update" value="Update" class="btn btn-success btn-sm">
                        </div>
                    </div>
                </div>
            <?php echo form_close(); ?>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
</div>


<!-- jQuery -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Datepicker -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/js/bootstrap-datepicker.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Datepicker -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/js/tinymce/tinymce.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>



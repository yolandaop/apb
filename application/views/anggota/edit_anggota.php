<div class="isi">
<div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a href="<?php print_r base_url('anggota/index'); ?>">Anggota</a></li>
            <li class="active">Edit Anggota</li>
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
                Edit Anggota
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            <?php
                //validasi error upload
                if(!empty($error)) {
                    print_r $error;
                }
            ?>
            <?php print_r form_open_multipart('anggota/update', array('class' => 'form-horizontal', 'id' => 'jvalidate', 'autocomplete'=>'off')) ?>

                <div class="form-group">
                    <p class="col-sm-2 text-left">NIS </p>

                    <div class="col-sm-10">
                        <input type="text" name="nis" class="form-control" placeholder="NIS" value="<?php print_r $edit['nis']; 
                        ?>" readonly="readonly">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Nama </p>

                    <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php print_r $edit['nama'] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Jenis Kelamin </p>

                    <div class="col-sm-10">
                    <?php 
                    $jenis_kelamin = array('L' => 'Laki-Laki', 'P' => 'Perempuan'); 
                    print_r form_dropdown('jenis',$jenis_kelamin,$edit['jk'],"class='form-control'");    
                    ?>
                   
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Tanggal Lahir </p>

                    <div class="col-sm-10">
                        <input type="text" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" id="tanggal"  value="<?php print_r $edit['ttl'] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Kelas </p>

                    <div class="col-sm-10">
                        <input type="text" name="kelas" class="form-control" placeholder="Kelas"  value="<?php print_r $edit['kelas']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Alamat </p>

                    <div class="col-sm-10">
                        <input type="text" name="alamat" class="form-control" placeholder=""  value="<?php print_r $edit['alamat']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">Orangtua </p>

                    <div class="col-sm-10">
                        <input type="text" name="orangtua" class="form-control" placeholder=""  value="<?php print_r $edit['orangtua']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                        <div class="btn-group pull-left">
                            <?php print_r anchor('anggota', 'Kembali', array('class' => 'btn btn-danger btn-sm')); ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="btn-group pull-right">
                            <input type="submit" name="update" value="Update" class="btn btn-success btn-sm">
                        </div>
                    </div>
                </div>
            <?php print_r form_close(); ?>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
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



<!-- Custom Theme JavaScript -->
<script src="<?php print_r base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>

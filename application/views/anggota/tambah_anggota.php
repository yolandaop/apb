<div class="isi">
<div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('anggota/index'); ?>">Anggota</a></li>
            <li class="active">Create Anggota</li>
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
                Create Anggota
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            <?php
                //validasi error upload
                if(!empty($error)) {
                    echo $error;
                }
            ?>
            <?php echo form_open_multipart('anggota/insert', array('class' => 'form-horizontal', 'id' => 'jvalidate', 'autocomplete'=>'off')) ?>

                <div class="form-group">
                    <p class="col-sm-2 text-left">NIS </p>

                    <div class="col-sm-10">
                        <input type="text" name="nis" class="form-control" placeholder="NIS" value="<?php echo set_value('nis'); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Nama </p>

                    <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo set_value('nama'); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Jenis Kelamin </p>

                    <div class="col-sm-10">
                    <select name="jenis" class="form-control" >
                        <option value="">- Pilih Jenis -</option>
                        <option value="L" <?php echo set_select('jenis','L'); ?> >Laki Laki</option>
                        <option value="P" <?php echo set_select('jenis','P'); ?>>Perempuan</option>
                    </select>   
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Tanggal Lahir </p>

                    <div class="col-sm-10">
                        <input type="text" name="tgl_lahir" class="form-control" placeholder="DD-MM-YYYY" id="tanggal"  value="<?php echo set_value('tgl_lahir'); ?>">
                    </div>
                </div>
                <div class="form-group">
                <p class="col-sm-2 text-left">Kelas </p>
                <div class="col-sm-10">
                     <input list="kelas" autocomplete="off" name="kelas" class="form-control" value="<?php echo set_value('kelas'); ?>">
                                <datalist id="kelas">
                                <option value="VII A">
                                <option value="VII B">
                                <option value="VII C">
                                <option value="VII D">
                                <option value="VII E">
                                <option value="VII F">
                                <option value="VII G">
                                <option value="VIII A">
                                <option value="VIII B">
                                <option value="VIII C">
                                <option value="VIII D">
                                <option value="VIII E">
                                <option value="VIII F">
                                <option value="VIII G">
                                <option value="IX A">
                                <option value="IX B">
                                <option value="IX C">
                                <option value="IX D">
                                <option value="IX E">
                                <option value="IX F">
                                <option value="IX G">
                                </datalist>
                             </div>
                        </div>


                <div class="form-group">
                    <p class="col-sm-2 text-left">language </p>
                            <select multiple='multiple' id="selMulti">
                                 <option value="1">Option 1</option>
                                 <option value="2">Option 2</option>
                                 <option value="3">Option 3</option>
                                 <option value="4">Option 4</option>    
                            </select>
                            <input type="button" id="go" value="Go!" />
                            <div style="margin-top: 10px;" id="result"></div>
                  </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Orang Tua </p>

                    <div class="col-sm-10">
                        <input type="text" name="orangtua" class="form-control" placeholder="Nama Orangtua"  value="<?php echo set_value('orangtua'); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                        <div class="btn-group pull-left">
                            <?php echo anchor('anggota', 'Kembali', array('class' => 'btn btn-danger btn-sm')); ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="btn-group pull-right">
                            <input type="submit" name="save" value="Simpan" class="btn btn-success btn-sm">
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
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

        <script>

                    $("#go").click(function(){
                         var selMulti = $.map($("#selMulti option:selected"), function (el, i) {
                             return $(el).text();
                         });
                         $("#result").text(selMulti.join(", "));
                    });

        </script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>

<div class="isi">
        <div class="row">
            <div class="col-lg-12"><br />
            
                <ol class="breadcrumb">
                    <li><a href="<?php print_r base_url('anggota/index'); ?>">Anggota</a></li>
                    <li class="active">Import anggota</li>
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
                        Import Anggota
                    </div>
					<?php 
						if(isset($response)){
							print_r $response;
						}
						?>
						<form method='post' action='' enctype="multipart/form-data">
							<input type='file' name='file' >
							<input type='submit' value='Upload' name='upload'>
						</form>
                    <!-- /.panel-heading -->
					<div class="well">
                        <h4>Petunjuk Import</h4>
                        <pre>Data yang dimasukkan harus sesuai dengan perintah sebagai berikut:
	1. Baris pertama adalah judul tabel seperti pada gambar dibawah
	2. Bila ada kolom yang kosong maka dapat dibiarkan kosong
	3. Kolom NIS dan Nama tidak boleh kosong!
	4. Simpan dengan format CSV</pre>
					<div class="row">
					<div class="col-lg-1"></div>
					<img src="<?php print_r base_url(); ?>assets/img/importA.png" alt="contoh import">
					</div>
					</div>
					</div>
				</div>
                <!-- /.panel -->
            </div>
            </div>
 

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
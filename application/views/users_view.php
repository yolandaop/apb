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
                    
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            </div>
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
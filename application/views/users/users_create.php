<div class="isi">
<div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a href="<?php print_r base_url('users/create'); ?>">Users</a></li>
            <li class="active">Create Users</li>
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
                Create Users
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            <?php
                //validasi error upload
                if(!empty($error)) {
                    print_r $error;
                }
            ?>
            <?php print_r form_open('users/insert', array('class' => 'form-horizontal', 'id' => 'jvalidate')) ?>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Username </p>

                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" placeholder="Username" value="<?php print_r set_value('username'); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Full Name </p>

                    <div class="col-sm-10">
                        <input type="text" name="full_name" class="form-control" placeholder="Full Name" value="<?php print_r set_value('full_name'); ?>">
                    </div>
                </div>
                <div class="form-group">
                <p class="col-sm-2 text-left">Level</p>
                <div class="col-sm-10">
                    <select id="level" name="level">
                        <option value="Admin">Admin</option>
                        <option value="Petugas">Petugas</option>
                    </select>
                             </div>
                        </div>
                
                <div class="form-group">
                    <p class="col-sm-2 text-left">Password </p>

                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php print_r set_value('password'); ?>">
                    </div>
                </div>

                

               
                <div class="form-group">
                    <div class="col-sm-6">
                        <div class="btn-group pull-left">
                            <?php print_r anchor('users', 'Cancel', array('class' => 'btn btn-danger btn-sm')); ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="btn-group pull-right">
                            <input type="submit" name="save" value="Save" class="btn btn-success btn-sm">
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
</div></div>



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



<script type="text/javascript">

tinymce.init({selector:'textarea'});

$(document).ready(function() {
    $("#tanggal1").datepicker({
        format:'yyyy-mm-dd'
    });
    
    $("#tanggal2").datepicker({
        format:'yyyy-mm-dd'
    });
    
    $("#tanggal").datepicker({
        format:'yyyy-mm-dd'
    });
})



</script>
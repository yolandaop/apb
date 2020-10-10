<div class="isi">
<div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a href="<?php print_r base_url('transaksi'); ?>">Peminjaman Individu</a></li>
            <li class="active">Data</li>
        </ol>

        <?php
            
            if(!empty($message)) {
                print_r $message;
            }
        ?>

    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
    <?php print_r anchor('transaksi/peminjaman', 'Tambah Peminjaman', array('class' => 'btn btn-primary btn-sm')); ?>
        <br /><br />
     
        <div class="panel panel-default">

            <div class="panel-heading">
                Peminjaman Individu
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <td>No.</td>
                                        <td>Id Transaksi</td>
                                        <td>NIS</td>
                                        <td>Nama</td>
                                        <td>Bibid</td>
                                        <td>Judul</td>
                                        <td>Tanggal Pinjam</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no = 1;
                                foreach($transaksi->result() as $row) {
                                ?>
                                    <tr>    
                                        <td><?php print_r $no;?></td>
                                       <td><?php print_r $row->id_transaksi;?></td>
                                       <td><?php print_r $row->nis;?></td>
                                       <td><?php print_r $row->nama;?></td>
                                       <td><?php print_r $row->bibid;?></td>
                                       <td><?php print_r $row->judul;?></td>
                                        <td><?php print_r $row->tanggal_pinjam;?></td>
                                        <td class="text-center">
                                        <a href="<?php print_r base_url('transaksi/kembali/'.$row->id_transaksi) ?>"><input type="submit" class="btn btn-success btn-xs" name="kembali" value="Kembali"></a>
                               </td>
                                    </tr>
                                <?php $no++; } ?>    
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- jQuery -->
<script src="<?php print_r base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php print_r base_url(); ?>template/backend/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php print_r base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?php print_r base_url(); ?>template/backend/sbadmin/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php print_r base_url(); ?>template/backend/sbadmin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php print_r base_url(); ?>template/backend/sbadmin/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php print_r base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->

<script>
$(document).ready(function() {

    //alert('');

    //load datatable
    $('#dataTables-example').DataTable({
        responsive: true
    });


   
    

}); //end document
</script>



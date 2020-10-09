<div class="isi">
<div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('transaksi_kelas'); ?>">Peminjaman Kelas</a></li>
            <li class="active">Data</li>
        </ol>

        <?php
            
            if(!empty($message)) {
                echo $message;
            }
        ?>

    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
    <?php echo anchor('transaksi_kelas/peminjaman', 'Tambah Peminjaman', array('class' => 'btn btn-primary btn-sm')); ?>
        <br /><br />
        <div class="panel panel-default">

            <div class="panel-heading">
                Peminjaman Kelas
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <td>No.</td>
                                        <td>Id Transaksi</td>
                                        <td>Bibid</td>
                                        <td>Judul</td>
                                        <td>Kelas</td>
                                        <td>Siswa</td>
                                        <td>NIS</td>
                                        <td>Tanggal Pinjam</td>
                                        <td>Jumlah</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no = 1;
                                foreach($transaksi_kelas->result() as $row) {
                                ?>
                                    <tr>    
                                        <td><?php echo $no;?></td>
                                        <td><?php echo $row->id_transaksi;?></td>
                                        <td><?php echo $row->bibid;?></td>
                                        <td><?php echo $row->judul;?></td>
                                        <td><?php echo $row->kelas;?></td>
                                        <td><?php echo $row->nama;?></td>
                                        <td><?php echo $row->nis;?></td>
                                        <td><?php echo $row->tanggal;?></td>
                                        <td><?php echo $row->jumlah;?></td>
                                        <td class="text-center">
                                        <a href="<?php echo base_url('transaksi_kelas/kembali/'.$row->id_transaksi) ?>"><input type="submit" class="btn btn-success btn-xs" name="kembali" value="Kembali"></a>
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
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>

<script type="text/javascript">
    // function confirmDelete()
    // {
    //     return confirm("Apakah anda yakin ingin menghapus data anggota")
    // }

    $(function(){
        $(".hapus").click(function(){
            var kode=$(this).attr("kode");
            var name=$(this).attr("name");
           
            $(".text-konfirmasi").html(name)
            $("#idhapus").val(kode);
            $("#myModal").modal("show");
        });
        
        $("#konfirmasi").click(function(){
            var kode=$("#idhapus").val();
            
            $.ajax({
                url:"<?php echo site_url('transaksi/kembali');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('anggota/index/delete-success');?>";
                }
            });
        });
    });
</script>


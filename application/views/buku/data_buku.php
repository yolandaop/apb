<div class="isi">
<div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a href="<?php print_r base_url('buku'); ?>">Buku</a></li>
            <li class="active">Data Buku</li>
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
        <?php print_r anchor('buku/create', 'Tambah Buku', array('class' => 'btn btn-primary btn-sm')); ?>
        <?php print_r anchor('import/buku', 'Import Buku', array('class' => 'btn btn-success btn-sm')); ?>
        <br /><br />
        <div class="panel panel-default">

            <div class="panel-heading">
                Data Buku
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Bibid</td>
                                        <td>Judul</td>
                                        <td>Kategori</td>
                                        <td>Penerbit</td>
                                        <td>Deskripsi Fisik</td>
                                        <td>Nomor</td>
                                        <td>Eksemplar</td>
                                        <td>Kepemilikan</td>
                                        <td>Sumber</td>
                                        <td>Tanggal diterima</td>
                                        <td>Tanggal digunakan</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no = 1;
                                foreach($buku->result() as $row) {
                                ?>
                                    <tr>
                                        <td><?php print_r $no;?></td>
                                        <!-- jika ada buku di dalam database maka tampilkan -->
                                        <td><?php print_r $row->bibid;?></td>
                                        <td><?php print_r $row->judul;?></td>
                                        <td><?php print_r $row->kategori;?></td>
                                        <td><?php print_r $row->penerbit;?></td>
                                        <td><?php print_r $row->deskripsi;?></td>
                                        <td><?php print_r $row->nomor;?></td>
                                        <td><?php print_r $row->eksemplar;?></td>
                                        <td><?php print_r $row->kepemilikan;?></td>
                                        <td><?php print_r $row->sumber;?></td>
                                        <td><?php print_r $row->tanggal_diterima;?></td>
                                        <td><?php print_r $row->tanggal_digunakan;?></td>
                                        <td class="text-center">
                                <a href="<?php print_r base_url('buku/edit/'.$row->bibid) ?>"><input type="submit" class="btn btn-success btn-xs" name="edit" value="Edit"></a>
                                <a href="#" name="<?php print_r $row->judul;?>" class="hapus btn btn-danger btn-xs" kode="<?php print_r $row->bibid;?>">Hapus</a>
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

<!-- Modal Hapus-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Konfirmasi</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" name="idhapus" id="idhapus">
                <p>Apakah anda yakin ingin menghapus buku <strong class="text-konfirmasi"> </strong> ?</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-success btn-xs" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger btn-xs" id="konfirmasi">Hapus</button>
        </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
           
            $(".text-konfirmasi").text(name)
            $("#idhapus").val(kode);
            $("#myModal").modal("show");
        });
        
        $("#konfirmasi").click(function(){
            var bibid = $("#idhapus").val();
            
            $.ajax({
                url:"<?php print_r site_url('buku/delete');?>",
                type:"POST",
                data:"bibid="+bibid,
                cache:false,
                success:function(html){
                    location.href="<?php print_r site_url('buku/index/delete-success');?>";
                }
            });
        });
    });
</script>


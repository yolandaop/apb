<div class="isi">
<div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('transaksi/laporan'); ?>">Laporan</a></li>
            <li class="active">Pengembalian Individu</li>
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
     <div class="panel panel-default">

            <div class="panel-heading">
                Pengembalian Individu
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <td>No.</td>
                                    <td>ID Transaksi</td>
                                    <td>Nama</td>
                                    <td>Bibid</td>
                                    <td>Judul</td>
                                    <td>Tanggal Pinjam</td>
                                    <td>Tanggal Kembali</td>
                                </tr>
                            </thead>
                            <?php $no=0; foreach($pengembalian->result() as $data): $no++;?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $data->id_transaksi;?></td>
                                <td><?php echo $data->nama;?></td>
                                <td><?php echo $data->bibid;?></td>
                                <td><?php echo $data->judul;?></td>
                                <td><?php echo $data->tanggal_pinjam; ?></td>
                                <td><?php echo $data->tanggal_kembali; ?></td>
                            </tr>
                            <?php endforeach;?>
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

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {

    //alert('');


    //get data via ajax 
    $("#tampilkan").click(function(){

        var tanggal1 = $("#tanggal1").val();
        var tanggal2 = $("#tanggal2").val();

        

        if(tanggal1 == "") {
            alert("Silahkan isi periode tanggal awal")
            $("#tanggal1").focus();
            return false;
        }
        else if(tanggal2 == ""){
            alert("Silahkan isi periode tanggal akhir")
            $("#tanggal2").focus();
            return false;
        }
        else{

            $('#loader').html('<img src="<?php echo base_url('assets/img/loader/loader1.gif') ?>"> ');

            $.ajax({
                url:"<?php echo site_url('laporan/cari_pengembalian');?>",
                type:"POST",
                data:"tanggal1="+tanggal1+"&tanggal2="+tanggal2,
                cache:false,
                success:function(hasil){
                    // console.log(hasil);
                    $("#tampil").html(hasil);

                     $('#loader').html("").hide();
                }
            })

            //  $('#loader').html("").hide();

        }

    }) //end tampilkan 

    $('body').on('click', '.show-kembali', function(){
        
        var id_transaksi = $(this).attr("kode");
        //alert(id_transaksi);        
        // $("#myModal3").modal("show");
        $.ajax({
                url:"<?php echo site_url('laporan/detail_pengembalian');?>",
                type:"POST",
                data:"id_transaksi="+id_transaksi,
                cache:false,
                success:function(hasil){
                    //console.log(hasil);
                    
                    $("#tampildetail").html(hasil);
                    $("#myModal3").modal("show");
                    //  $('#loader').html("").hide();
                }
            })
     
     });
    

}); //end document
</script>

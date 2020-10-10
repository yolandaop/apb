<div class="isi">
<div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a  href="<?php print_r base_url('transaksi'); ?>">Peminjaman Individu</a></li>
            <li class="active">Tambah</li>
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
        
    <!-- <legend>Transaksi</legend> -->
        <div class="panel panel-default">
            <div class="panel-body">
            <?php
                        //validasi error upload
                        if(!empty($error)) {
                            print_r $error;
                        }
                    ?>
                <form class="form-horizontal" action="<?php print_r site_url('transaksi/simpan');?>" method="post">
                        <div class="form-group">
                            <label class="col-lg-4 ">Id. Transaksi</label>
                            <div class="col-lg-7">
                                <input type="text" id="id_transaksi" name="id_transaksi" class="form-control" value="<?php print_r $autonumber ?>" readonly="readonly">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-4 ">Tanggal Pinjam</label>
                            <div class="col-lg-7">
                                <input type="text" id="tanggal" name="tanggal" class="form-control" value="<?php 
                                print_r $tglpinjam; ?>" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 ">Nama</label>
                            <div class="col-lg-4">
                                <input list="nama" autocomplete="off" placeholder="Ketikan Nama" name="nama" class="form-control" value="<?php print_r set_value('nama'); ?>">
                                <datalist id="nama">
                                <?php 
                                foreach($anggota as $row) {
                                ?>
                                <option value="<?php print_r $row->nama;?>"><?php print_r $row->nama;?></option>
                                <?php } ?> 
                                </datalist>
                            </div>
                            <label class="col-lg-1">NIS</label>
                            <div class="col-lg-2">
                            <input type="text" class="form-control"  id="nis" name="nis"  value="<?php print_r set_value('nis'); ?>" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4 ">Judul</label>
                            <div class="col-lg-4">
                            <input list="judul" autocomplete="off" placeholder="Ketikan Judul" name="judul" class="form-control" value="<?php print_r set_value('judul'); ?>">
                                <datalist id="judul">
                                <?php 
                                foreach($buku as $row) {
                                ?>
                                <option value="<?php print_r $row->judul;?>"><?php print_r $row->judul;?></option>
                                <?php } ?> 
                                </datalist>
                            </div>
                            <label class="col-lg-1">Bibid</label>
                            <div class="col-lg-2">
                            <input type="text" class="form-control"  id="bibid" name="bibid"  value="<?php print_r set_value('bibid'); ?>" readonly="readonly">
                            </div>
                        </div>
    
                        <div class="form-group">
                        <div class="col-lg-4">
                        <input type="submit" name="save" value="Simpan" class="btn btn-success btn-sm">
                        </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.col-lg-12 -->

</div>
<!-- /.end row -->

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

    $('#dataTables-example').DataTable({
        responsive: true
    });


    //load data tmp 
    function loadData()
    {
        $("#tampil").load("<?php print_r site_url('transaksi/tampil_tmp') ?>");
    }
    loadData();

    //function buat mengkosong form data buku setelah di tambah ke tmp
    function EmptyData()
    {
        $("#bibid").val("");
        $("#judul").val("");
    }

    //ambil data anggota berdasarkan nis
    // $("#nis").click(function(){


    //show modal search buku
    $("#cari").click(function(){
        $("#myModal2").modal("show");
        //return false;  biar gk langsung ilang
    })

    //search buku
    $("#caribuku").keyup(function(){
        var caribuku = $('#caribuku').val();

         $.ajax({
            url:"<?php print_r site_url('transaksi/cari_buku');?>",
            type:"POST",
            data:"caribuku="+caribuku,
            cache:false,
            success:function(hasil){
                $("#tampilbuku").html(hasil);
                
            }
        })
        
    })


    //tambah buku dari modal ke form
    
    // $(".tambah").live("click", function(){
    $('body').on('click', '.tambah', function(){
        
        var bibid = $(this).attr("kode");
        var judul     = $(this).attr("judul");
        
        $("#bibid").val(bibid);
        $("#judul").val(judul);
        $("#myModal2").modal("hide");
        //console.log(bibid);
       
    });


    //event keypress cari kode
    $("input[name=judul]").focusout(function(){
        
        //13 adalah kode asci buat enter
        
            var judul = $(this).val();

            $.ajax({
                url:"<?php print_r site_url('buku/cari_judul');?>",
                type:"POST",
                data:"judul="+judul,
                cache:false,
                success:function(hasil){
                //split digunakan untuk memecah string    
                   data = hasil.split("|");
                   if(data==0) {
                       alert("Buku " + judul + " Book Not Found");
                       $("#bibid").val("");
                   }
                   else{
                       $("#bibid").val(data[0]);
                    //    $("#tambah_buku").focus();
                   }

                   //console.log(data);
                }
            })
    })
    //event keypress cari kode
    $("input[name=nama]").focusout(function(){
        
        //13 adalah kode asci buat enter
        
            var nama = $(this).val();

            $.ajax({
                url:"<?php print_r site_url('transaksi/cari_nama');?>",
                type:"POST",
                data:"nama="+nama,
                cache:false,
                success:function(hasil){
                //split digunakan untuk memecah string    
                   data = hasil.split("|");
                   if(data==0) {
                       alert("Buku " + nama + " Book Not Found");
                       $("#nis").val("");
                   }
                   else{
                       $("#nis").val(data[0]);
                    //    $("#tambah_buku").focus();
                   }

                   //console.log(data);
                }
            })
    })
    
    $('form').on('keypress', function(e) {
    return e.which !== 13;
    });
    //end event keypress
 //end event keypress

    //tambah_buku ke tmp
    // $("#tambah_buku").click(function(){
        
    //     var bibid = $("#bibid").val();
    //     var judul     = $("#judul").val();

    //     if(bibid == "") {
    //         alert("Kode " + bibid + " Masih Kosong ");
    //         $("#bibid").focus();
    //         return false;
    //     }
    //     else if(judul == ""){
    //         alert("Judul " + judul + " Masih Kosong ");
    //         return false;
    //     }
    //     else{
    //         $.ajax({
    //             url:"<?php print_r site_url('transaksi/save_tmp');?>",
    //             type:"POST",
    //             data:"bibid="+bibid+"&judul="+judul,
    //             cache:false,
    //             success:function(hasil){
    //                 loadData();
    //                 EmptyData();
    //                 //alert(hasil);
    //                //console.log(data);
    //             }
    //         })
    //     }

    // }) //end tambahbuku 

    // //delete tabel tmp
    $('body').on('click', '.hapus', function(){
        
        //ambil dulu atribute kodenya
        var bibid = $(this).attr('kode');
        $.ajax({
            url:"<?php print_r site_url('transaksi/hapus_tmp');?>",
            type:"POST",
            data:"bibid="+bibid,
            cache:false,
            success:function(hasil){
                // alert(hasil);
                loadData();
            }
        })
        

    }); //end delete table tmp

    //simpan transaksi 
    //$("#simpan").click(function(){
    // $('body').on('click', '#simpan', function(){    
        
    //     //tampung data dari form buat dikirim 
    //     var no_transaksi = $("#no_transaksi").val();
    //     var tgl_pinjam   = $("#tgl_pinjam").val();
    //     var nama          = $("#nama").val();
    //     var jumlah         = $("#jumlah").val();

    //     //cek nis jika kosong 
    //     if(nama == "") {
    //         alert("Pilih Nis Siswa");
    //         $("#nama").focus();
    //         return false;
    //     }
    //     else{
    //         $.ajax({
    //             url:"<?php print_r site_url('transaksi_kelas/simpan_transaksi');?>",
    //             type:"POST",
    //             data:"no_transaksi="+no_transaksi+"&tgl_pinjam="+tgl_pinjam+
    //             "&nama="+nama+"&jumlah="+jumlah,
    //             cache:false,
    //             success:function(hasil){
    //               //console.log(hasil);
                 
    //               alert("Transaksi Peminjaman Berhasil");
                  
    //               location.reload();
    //             }
    //         })
    //     }
        
    // })


  

});
</script>




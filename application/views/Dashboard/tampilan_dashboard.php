<?php  

//index.php
$result = $this->db->query("SELECT YEAR(tanggal_pinjam) as year FROM transaksi GROUP BY YEAR(tanggal_pinjam) DESC")->result_array();
$tabel = $this->db->query("Select month(tanggal_pinjam) as status, count(*) as nis From transaksi where year(tanggal_pinjam)='2020' group by month(tanggal_pinjam)")->result_array();
         
?>  

<div class="isi">
    <br>
<div class="panel panel-default">
    <div class="panel-heading">

    <div class="row">
        <div class="col-lg-12">
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    </div>

    <div class="panel-body">

        <div class="row">
            <div class="col-lg-2 col-md-2"></div>
            <div class="col-lg-4 col-md-4">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <!-- <i class="fa fa-comments fa-5x"></i> -->
                                <i class="fa fa-folder-open fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php print_r $countpeminjaman; $tahun='2019'; ?></div>
                                <div>Peminjaman Individu</div>
                                
                            </div>
                        </div>
                    </div>
                    <a href="<?php print_r base_url('transaksi'); ?>" <?php 
            if ($id_petugas=='Admin'){
                print_r " hidden";
            }
            ?>>
                        <div class="panel-footer">
                            <span class="pull-left" >Lihat Semua</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-folder-open fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php print_r $countpeminjamankelas; ?></div>
                                <div>Peminjaman Kelas</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php print_r base_url('transaksi_kelas'); ?>" <?php 
            if ($id_petugas=='Admin'){
                print_r " hidden";
            }
            ?>>
                        <div class="panel-footer">
                            <span class="pull-left">Lihat Semua</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2"></div>

        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-2 col-md-2"></div>
            <div class="col-lg-4 col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <!-- <i class="fa fa-comments fa-5x"></i> -->
                                <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php print_r $countanggota; ?></div>
                                <div>Anggota</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php print_r base_url('anggota'); ?>">
                        <div class="panel-footer">
                            <span class="pull-left">Lihat Semua</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-book fa-5x"></i>
                            </div>
                            <div class="col-xs-5 text-right">
                                <div class="huge"><?php print_r $countbuku; ?></div>
                                <div>Judul Buku</div>
                            </div>
                            <div class="col-xs-4 text-right">
                                <div class="huge"><?php print_r $counteksemplar; ?></div>
                                <div>Eksemplar</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php print_r base_url('buku'); ?>">
                        <div class="panel-footer">
                            <span class="pull-left">Lihat Semua</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class= "col-lg-6">  
                       <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-9">
                                    <h3 class="panel-title">Data peminjaman Kelas</h3>
                                </div>
                                <div class="col-md-3">
                                    <select name="year2" class="form-control" id="year2">
                                        <option value="">Select Year</option>
                                    <?php
                                    foreach($result as $row)
                                    {
                                        print_r '<option value="'.$row["year"].'">'.$row["year"].'</option>';
                                    }
                                    ?>
                                    </select>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div id="chart_area2" style="width: 550px; height: 310px;"></div>
                        </div>
                    </div>
                </div>   
                <div class= "col-lg-6">  
                       <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-9">
                                    <h3 class="panel-title">Data peminjaman individu</h3>
                                </div>
                                <div class="col-md-3">
                                    <select name="year" class="form-control" id="year">
                                        <option value="">Select Year</option>                                        
                                    <?php
                                    foreach($result as $row)
                                    {
                                        print_r '<option value="'.$row["year"].'">'.$row["year"].'</option>';
                                    }
                                    ?>
                                    </select>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div id="chart_area" style="width: 550px; height: 310px;"></div>
                        </div>
                    </div>
                </div>  
        </div>
    </div>
</div>
</div>


<!-- jQuery -->

<script src="<?php print_r base_url();?>asset/highcharts/jquery.min.js" type="text/javascript"></script>
<script src="<?php print_r base_url(); ?>assets/highcharts/highcharts.js" type="text/javascript"></script>
<script src="<?php print_r base_url(); ?>assets/highcharts/modules/exporting.js" type="text/javascript"></script>
<script src="<?php print_r base_url(); ?>assets/highcharts/modules/offline-exporting.js" type="text/javascript"></script>
<script src="<?php print_r base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php print_r base_url(); ?>template/backend/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php print_r base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="<?php print_r base_url(); ?>template/backend/sbadmin/vendor/raphael/raphael.min.js"></script>
<script src="<?php print_r base_url(); ?>template/backend/sbadmin/vendor/morrisjs/morris.min.js"></script>
<script src="<?php print_r base_url(); ?>template/backend/sbadmin/data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php print_r base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback();

function loaddata2(year2, title)
{  
    var temp_title = title + ' '+year2+'';
    $.ajax({
        url:"<?php print_r site_url('dashboard/chart2');?>",
        method:"POST",
        data:{year2:year2},
        dataType:"JSON",
        success:function(data)
        {
            drawChart2(data, temp_title);
        }
    });
}

function drawChart2(chart_data, chart_main_title)
{
    var jsonData = chart_data;
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'bulan');
    data.addColumn('number', 'jumlah');
    $.each(jsonData, function(i, jsonData){
        var bulan = jsonData.bulan;
        var jumlah = parseFloat($.trim(jsonData.jumlah));
        data.addRows([[bulan, jumlah]]);
    });
    var options = {
        title:chart_main_title,
        hAxis: {
            title: "Bulan"
        },
        vAxis: {
            title: 'Jumlah Peminjam'
        }
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_area2'));
    chart.draw(data, options);
}

function loaddata(year, title)
{
    var temp_title = title + ' '+year+'';
    $.ajax({
        url:"<?php print_r site_url('dashboard/chart');?>",
        method:"POST",
        data:{year:year},
        dataType:"JSON",
        success:function(data)
        {
            drawChart(data, temp_title);
        }
    });
}

function drawChart(chart_data, chart_main_title)
{
    var jsonData = chart_data;
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'bulan');
    data.addColumn('number', 'jumlah');
    $.each(jsonData, function(i, jsonData){
        var bulan = jsonData.bulan;
        var jumlah = parseFloat($.trim(jsonData.jumlah));
        data.addRows([[bulan, jumlah]]);
    });
    var options = {
        title:chart_main_title,
        hAxis: {
            title: "Bulan"
        },
        vAxis: {
            title: 'Jumlah'
        }
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_area'));
    chart.draw(data, options);
}
</script>

<script>
    
$(document).ready(function(){

    $('#year2').change(function(){
        var year2 = $(this).val();
        if(year2 != '')
        {
            loaddata2(year2, 'Data peminjaman kelas tahun');
        }
    });

});

$(document).ready(function(){

$('#year').change(function(){
    var year = $(this).val();
    if(year != '')
    {
        loaddata(year, 'Data peminjaman individu tahun');
    }
});

});

</script>


<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata['username'] == '') {redirect('login/logout');}
        $this->load->model(array('Mod_anggota','Mod_buku','Mod_transaksi','Mod_transaksi_kelas'));
    }
    function chart2(){

        if(isset($_POST["year2"]))
        {
     //       SELECT * FROM transaksi WHERE YEAR(tanggal_pinjam) = '".$_POST["year"]."'ORDER BY id_transaksi ASC
        $result = $this->db->query("Select (case month(tanggal) when 1 THEN 'Jan' when 2 THEN 'Feb' when 3 THEN 'Mar' when 4 then 'Apr' when 5 then 'Mei' when 6 then 'Jun' when 7 then 'Jul' when 8 then 'Agt' when 9 then 'Sep' when 10 then 'Okt' when 11 then 'Nov' when 12 then 'Des' else 'Unknown' end) as bulan, count(*) as jumlah From transaksi_kelas where year(tanggal)='".$_POST["year2"]."' group by month(tanggal)")->result_array();
                foreach($result as $row)
                {
                $output[] = array(
                'bulan'   => $row["bulan"],
                'jumlah'  => floatval($row["jumlah"])
                );
                }
                echo json_encode($output);
        }

    }
    function chart(){

        if(isset($_POST["year"]))
        {
        $result = $this->db->query(" Select (case month(tanggal_pinjam) when 1 THEN 'Jan' when 2 THEN 'Feb' when 3 THEN 'Mar' when 4 then 'Apr' when 5 then 'Mei' when 6 then 'Jun' when 7 then 'Jul' when 8 then 'Agt' when 9 then 'Sep' when 10 then 'Okt' when 11 then 'Nov' when 12 then 'Des' else 'Unknown' end) as bulan, count(*) as jumlah From transaksi where year(tanggal_pinjam)='".$_POST["year"]."' group by month(tanggal_pinjam)")->result_array();
   
        foreach($result as $row)
                {
                $output[] = array(
                'bulan'   => $row["bulan"],
                'jumlah'  => floatval($row["jumlah"])
                );
                }
                echo json_encode($output);
        }

    }
    function index()
    {   
        $tahun= '2019';
        $query = $this->Mod_transaksi->statistik($tahun);
        $row = $query->row();

        if(isset($row))
        {
            $data['grafik'][]=(float)$row->Juli;
            $data['grafik'][]=(float)$row->Agustus;
            $data['grafik'][]=(float)$row->September;
            $data['grafik'][]=(float)$row->Oktober;
            $data['grafik'][]=(float)$row->November;
            $data['grafik'][]=(float)$row->Desember;
         $data['grafik'][]=(float)$row->Januari;
         $data['grafik'][]=(float)$row->Februari;
         $data['grafik'][]=(float)$row->Maret;
         $data['grafik'][]=(float)$row->April;
         $data['grafik'][]=(float)$row->Mei;
         $data['grafik'][]=(float)$row->Juni;
        }

        $tahun2='2019';
        $query2 = $this->Mod_transaksi_kelas->statistik($tahun2);
        $row2 = $query2->row();

        if(isset($row))
        {
            $data['grafik2'][]=(float)$row2->Juli;
            $data['grafik2'][]=(float)$row2->Agustus;
            $data['grafik2'][]=(float)$row2->September;
            $data['grafik2'][]=(float)$row2->Oktober;
            $data['grafik2'][]=(float)$row2->November;
            $data['grafik2'][]=(float)$row2->Desember;
         $data['grafik2'][]=(float)$row2->Januari;
         $data['grafik2'][]=(float)$row2->Februari;
         $data['grafik2'][]=(float)$row2->Maret;
         $data['grafik2'][]=(float)$row2->April;
         $data['grafik2'][]=(float)$row2->Mei;
         $data['grafik2'][]=(float)$row2->Juni;
        }
        $data['countanggota'] = $this->Mod_anggota->totalRows('anggota');   
        $data['countbuku'] = $this->Mod_buku->totalRows('buku');
        $data['counteksemplar'] = $this->Mod_buku->totalEksemplar('buku');
        $data['countpeminjaman'] = $this->Mod_transaksi->totalRows('transaksi');
        $data['countpeminjamankelas'] = $this->Mod_transaksi_kelas->totalRows('transaksi_kelas');
        $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
        $this->load->view('dashboard/tampilan_dashboard.php', $data); 
    }
        
    


}
/* End of file Controllername.php */
 
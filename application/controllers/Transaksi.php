<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata['username'] == '') {redirect('login/logout');}
        $this->load->model(array('Mod_transaksi','Mod_anggota','Mod_buku'));
    }

    public function index()
    {
        $data['transaksi']      = $this->Mod_transaksi->getPeminjaman();
        // print_r($data['countanggota']); die();

        if($this->uri->segment(3)=="create-success") {
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Disimpan...!</p></div>";    
                    $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
            $this->load->view('transaksi/tampilan_peminjaman', $data);  
        }
        else if($this->uri->segment(3)=="update-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Update...!</p></div>"; 
                    $data['id_petugas'] = $this->session->userdata['level'];
                    $this->load->view('includes/header', $data );
                    $this->load->view('transaksi/tampilan_peminjaman', $data);  
        }
        else if($this->uri->segment(3)=="delete-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Dihapus...!</p></div>"; 
                    $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
$this->load->view('transaksi/tampilan_peminjaman', $data);  
        }
        else{
            $data['message'] = "";
                    $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
$this->load->view('transaksi/tampilan_peminjaman', $data);  
        }
        
    }

    public function laporan()
    { 
        $data['title']="Laporan Pengembalian";
        $data['pengembalian']      = $this->Mod_transaksi->getPengembalian();
                $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
        $this->load->view('transaksi/pengembalian', $data);
     
    }

    public function peminjaman()
    {
        $data['tglpinjam']  = date('Y-m-d');
        $data['autonumber'] = $this->Mod_transaksi->AutoNumbering();
        $data['anggota']    = $this->Mod_anggota->getAnggota()->result();
        $data['buku']    = $this->Mod_buku->getBuku()->result();
                $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
        $this->load->view('transaksi/data_peminjaman', $data);
    }


    public function _set_rules()
    {
       $this->form_validation->set_rules('judul','Judul','required');
       $this->form_validation->set_rules('bibid','Bibid','required');
       $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>","</div>");
    }

    public function simpan()
    {
        if(isset($_POST['save'])) {

            //function validasi
            $this->_set_rules();
            //apabila user mengkosongkan form input
            if($this->form_validation->run()==true){
                // echo "masuk"; die();
                $data['tglpinjam']  = date('Y-m-d');
                $data['autonumber'] = $this->Mod_transaksi->AutoNumbering();
                //cek idbuku yg sudah digunakan
                $nama = $this->input->post('nama');
                $cek = $this->Mod_transaksi->cekPeminjaman($nama);
                //cek idbuku yg sudah digunaka
                if($cek->num_rows() > 0){
                    $data['message'] = "<div class='alert alert-block alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <p><i class='icon-ok'></i>Siswa tsb masih meminjam buku.</p></div>";
                    $data['tglpinjam']  = date('Y-m-d');
                    $data['autonumber'] = $this->Mod_transaksi->AutoNumbering();
                    $data['anggota']    = $this->Mod_anggota->getAnggota()->result();
                    $data['buku']    = $this->Mod_buku->getBuku()->result();
                    $data['id_petugas'] = $this->session->userdata['level'];
                    $this->load->view('includes/header', $data );
                    $this->load->view('transaksi/data_peminjaman', $data);
                }
                else{
                     $judul = slug($this->input->post('judul'));
                        $save  = array(
                            'id_transaksi' => $this->input->post('id_transaksi'),
                            'bibid' => $this->input->post('bibid'),
                            'judul' => $this->input->post('judul'),
                            'nama' => $this->input->post('nama'),
                            'nis' => $this->input->post('nis'),
                            'tanggal_pinjam' => $this->input->post('tanggal'),
                         );
                        $this->Mod_transaksi->insertTransaksi('transaksi', $save);
                        // echo "berhasil"; die();
                        $bibid = $this->input->post('bibid');
                        $jumlah = $this->Mod_buku->getEksemplar($bibid) - 1;

                        $dat = array(
                            'eksemplar' => $jumlah
                        );
                        $this->Mod_buku->updateBuku($bibid, $dat);
                        
                         redirect('transaksi/index/create-success');
                                 $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
                         $this->load->view('transaksi/tampilan_peminjaman', $data); 
                    }                    
            }
            //jika tidak mengkosongkan form
            else{
                $data['message'] = "";
                $data['tglpinjam']  = date('Y-m-d');
                $data['autonumber'] = $this->Mod_transaksi->AutoNumbering();
                $data['anggota']    = $this->Mod_anggota->getAnggota()->result();
                $data['buku']    = $this->Mod_buku->getBuku()->result();
                        $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
                $this->load->view('transaksi/data_peminjaman', $data);
            }

        }
    }
      
    public function cari_nama()
    {
        //$bibid = 7611;
        $nama = $this->input->post('nama');
        $hasil = $this->Mod_anggota->cekNama($nama);
        //jika ada buku dalam database
        if($hasil->num_rows() > 0) {
            $danggota = $hasil->row_array();
            print_r $danggota['nis'];
        }
    }

    public function kembali()
    {
        //update status peminjaman dari N menjadi Y
        $id_transaksi = $this->uri->segment(3);
        
        $data = array(
            'tanggal_kembali' => date('Y-m-d'),
            'status' => "kembali"
        );
        
        $bibid = $this->Mod_transaksi->getBibid($id_transaksi);
        foreach($bibid as $id){
            $kode = $id->bibid;
            $jumlah = 1 + $this->Mod_buku->getEksemplar($kode);
            $dat = array(
                'eksemplar' => $jumlah
            );
        $this->Mod_buku->updateBuku($kode, $dat);
        $this->Mod_transaksi->UpdateStatus($id_transaksi,$kode, $data);
        }
        $data['transaksi']      = $this->Mod_transaksi->getPeminjaman();
                $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
        $this->load->view('transaksi/tampilan_peminjaman', $data); 
    }
    



}

/* End of file Peminjaman.php */

<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class transaksi_kelas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata['username'] == '') {redirect('login/logout');}
        $this->load->model(array('Mod_transaksi_kelas','Mod_anggota','Mod_buku'));
    }

    public function index()
    {
        $data['transaksi_kelas']      = $this->Mod_transaksi_kelas->getPeminjaman();
        // print_r($data['countanggota']); die();

        if($this->uri->segment(3)=="create-success") {
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Disimpan...!</p></div>";    
                    $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
            $this->load->view('transaksi_kelas/tampilan_peminjaman', $data);  
        }
        else{
            $data['message'] = "";
                    $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
            $this->load->view('transaksi_kelas/tampilan_peminjaman', $data);  
        }
        
    }

    public function laporan()
    { 
        $data['title']="Laporan Pengembalian";
        $data['pengembalian_kelas']      = $this->Mod_transaksi_kelas->getPengembalian();
                $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
        $this->load->view('transaksi_kelas/pengembalian_kelas', $data);     
    }

    public function peminjaman()
    {
        $data['tglpinjam']  = date('Y-m-d');
        $data['autonumber'] = $this->Mod_transaksi_kelas->AutoNumbering();
        $data['anggota']    = $this->Mod_anggota->getAnggota()->result();
        $data['buku']    = $this->Mod_buku->getBuku()->result();
        $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
        $this->load->view('transaksi_kelas/data_peminjaman', $data);
    }



    public function simpan()
    {
        if(isset($_POST['save'])) {

            //function validasi
            $this->_set_rules();
            //apabila user mengkosongkan form input
            if($this->form_validation->run()==true){
                // echo "masuk"; die();
                $nis = $this->input->post('nis');
                $data['tglpinjam']  = date('Y-m-d');
                $data['autonumber'] = $this->Mod_transaksi_kelas->AutoNumbering();
                $bibid = $this->input->post('bibid');
                //cek idbuku yg sudah digunakan
                if($this->input->post('jumlah') > $this->Mod_buku->getEksemplar($bibid)){
                    $data['message'] = "<div class='alert alert-block alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <p><i class='icon-ok'></i>Jumlah buku yang diinputkan melebihi jumlah buku dalam database.</p></div>";
                    $data['tglpinjam']  = date('Y-m-d');
                    $data['autonumber'] = $this->Mod_transaksi_kelas->AutoNumbering();
                    $data['anggota']    = $this->Mod_anggota->getAnggota()->result();
                    $data['buku']    = $this->Mod_buku->getBuku()->result();
                    $data['id_petugas'] = $this->session->userdata['level'];
                    $this->load->view('includes/header', $data );
                    $this->load->view('transaksi_kelas/data_peminjaman', $data);
                }
                else{
                     $judul = slug($this->input->post('judul'));
                        $save  = array(
                            'id_transaksi' => $this->input->post('id_transaksi'),
                            'bibid' => $this->input->post('bibid'),
                            'judul' => $this->input->post('judul'),
                            'kelas' => $this->input->post('kelas'),
                            'nama' => $this->input->post('nama'),
                            'nis' => $this->input->post('nis'),
                            'tanggal' => $this->input->post('tanggal'),
                            'jumlah' => $this->input->post('jumlah'),
                         );
                        $this->Mod_transaksi_kelas->insertTransaksi('transaksi_kelas', $save);
                        // echo "berhasil"; die();
                        $bibid = $this->input->post('bibid');
                        $jumlah = $this->Mod_buku->getEksemplar($bibid) - $this->input->post('jumlah');

                        $dat = array(
                            'eksemplar' => $jumlah
                        );
                        $this->Mod_buku->updateBuku($bibid, $dat);
                        redirect('transaksi_kelas/index/create-success');
                        $data['id_petugas'] = $this->session->userdata['level'];
                        $this->load->view('includes/header', $data );
                        $this->load->view('transaksi_kelas/tampilan_peminjaman', $data);  
                    }                   
            }
            //jika tidak mengkosongkan form
            else{
                $data['message'] = "";
                $data['tglpinjam']  = date('Y-m-d');
                $data['autonumber'] = $this->Mod_transaksi_kelas->AutoNumbering();
                $data['anggota']    = $this->Mod_anggota->getAnggota()->result();
                $data['buku']    = $this->Mod_buku->getBuku()->result();
                $data['id_petugas'] = $this->session->userdata['level'];
                $this->load->view('includes/header', $data );
                $this->load->view('transaksi_kelas/data_peminjaman', $data);
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
            echo $danggota['nis'];
        }
    }

    public function kembali()
    {
        //update status peminjaman dari N menjadi Y
        $id_transaksi = $this->uri->segment(3);
        $data = array(
            'status' => "kembali",
            'tanggal_kembali' => date('Y-m-d'),
        );

        $bibid = $this->Mod_transaksi_kelas->getBibid($id_transaksi);
        $jumlah = $this->Mod_transaksi_kelas->getJumlah($bibid,$id_transaksi) + $this->Mod_buku->getEksemplar($bibid);
        $this->Mod_transaksi_kelas->UpdateStatus($id_transaksi, $data);

        $dat = array(
            'eksemplar' => $jumlah
        );
        $this->Mod_buku->updateBuku($bibid, $dat);
        $data['transaksi_kelas']      = $this->Mod_transaksi_kelas->getPeminjaman();
                $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
        $this->load->view('transaksi_kelas/tampilan_peminjaman', $data); 
    }

    public function _set_rules()
    {
       $this->form_validation->set_rules('judul','Judul','required');
       $this->form_validation->set_rules('bibid','Bibid','required');
       $this->form_validation->set_rules('kelas','Kelas','required');
       $this->form_validation->set_rules('nama','Nama','required');
       $this->form_validation->set_rules('jumlah','Jumlah','required');
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>","</div>");
    }
        
}

/* End of file Peminjaman.php */

<?php 

   defined('BASEPATH');

class Buku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata['username'] == '') {redirect('login/logout');}
        $this->load->model('Mod_buku');
    }


    public function index()
    {
        $data['buku']      = $this->Mod_buku->getAll();
        
        
        if($this->uri->segment(3)=="create-success") {
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Disimpan...!</p></div>";    
            $data['id_petugas'] = $this->session->userdata['level'];
             $this->load->view('includes/header', $data );
            $this->load->view('buku/data_buku',$data);  
        }
        else if($this->uri->segment(3)=="update-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Update...!</p></div>"; 
                    $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
            $this->load->view('buku/data_buku',$data); 
        }
        else if($this->uri->segment(3)=="delete-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Dihapus...!</p></div>"; 
                    $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
            $this->load->view('buku/data_buku', $data); 
        }
        
            $data['message'] = "";
                    $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
            $this->load->view('buku/data_buku', $data); 
        
        
    }

    public function create()
    {
                $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
        $this->load->view('buku/tambah_buku'); 
    }

    public function insert()
    {
        if(isset(filter_input(INPUT_POST, 'save'))) {

            //function validasi
            $this->_set_rules();

            //apabila user mengkosongkan form input
            if($this->form_validation->run()==true){
                // print_r "masuk"; die();
                $bibid = $this->input->post('bibid');
                $cek = $this->Mod_buku->cekBuku($bibid);
                //cek idbuku yg sudah digunakan
                if($cek->num_rows() > 0){
                    $data['message'] = "<div class='alert alert-block alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <p><strong><i class='icon-ok'></i>Kode Buku</strong> Sudah Digunakan...!</p></div>"; 
                            $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );       
                    $this->load->view('buku/tambah_buku', $data); 
                }
                 else{
                           $save  = array(
                             'bibid'   => $this->input->post('bibid'),
                             'judul'       => $this->input->post('judul'),
                             'kategori'   => $this->input->post('kategori'),
                             'penerbit'    => $this->input->post('penerbit'),
                             'deskripsi'    => $this->input->post('deskripsi'),
                             'nomor'    => $this->input->post('nomor'),
                             'eksemplar'    => $this->input->post('eksemplar'),
                             'kepemilikan'    => $this->input->post('kepemilikan'),
                             'sumber'    => $this->input->post('sumber'),
                             'tanggaL_diterima'    => $this->input->post('tanggal_diterima'),
                             'tanggal_digunakan'    => $this->input->post('tanggal_digunakan'),

                         );
                         $this->Mod_buku->insertBuku("buku", $save);
                        // print_r "berhasil"; die();
                         redirect('buku/index/create-success');
                                 $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
                         $this->load->view('buku/tambah_buku', $data); 
                     }
                   
            
            }
            //jika tidak mengkosongkan form
            else{
                $data['message'] = "";
                        $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
                $this->load->view('buku/tambah_buku', $data); 
            }

        }
    }

    public function edit()
    {
        $bibid = $this->uri->segment(3);
        
        $data['edit']    = $this->Mod_buku->cekBuku($bibid)->row_array();
        // $data['anggota'] =  $this->Mod_anggota->getAll()->result_array();
        // print_r($data['edit']); die();
                $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
        $this->load->view('buku/edit_buku', $data); 
    }

    public function update()
    {
        if(isset($_POST['update'])) {

            // print_r "proses update"; die();

            //jika tidak ada gambar yg diupload

                $this->_set_rules();
                
                //apabila user mengkosongkan form input
                if($this->form_validation->run()==true){
                    // print_r "masuk"; die();
                    
                    $bibid = $this->input->post('bibid');
                    $save  = array(
                        'bibid'   => $this->input->post('bibid'),
                        'judul'       => $this->input->post('judul'),
                        'kategori'   => $this->input->post('kategori'),
                        'penerbit'    => $this->input->post('penerbit'),
                        'deskripsi'    => $this->input->post('deskripsi'),
                        'nomor'    => $this->input->post('nomor'),
                        'eksemplar'    => $this->input->post('eksemplar'),
                        'kepemilikan'    => $this->input->post('kepemilikan'),
                        'sumber'    => $this->input->post('sumber'),
                        'tanggaL_diterima'    => $this->input->post('tanggal_diterima'),
                        'tanggal_digunakan'    => $this->input->post('tanggal_digunakan'),
                    );
                    $this->Mod_buku->updateBuku($bibid, $save);
                    // print_r "berhasil"; die();
                    redirect('buku/index/update-success');      
                }
                //jika tidak mengkosongkan
                else{
                    $bibid = $this->input->post('bibid');
                    $data['edit']    = $this->Mod_buku->cekBuku($bibid)->row_array();
                    $data['message'] = "";
                            $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
$this->load->view('buku/edit_buku', $data); 
                }

            //end empty $_FILES

        } // end $_POST['update']
    
    }

    public function delete()
    {
        // $nis  = $this->uri->segment(3);

        $bibid = $this->input->post('bibid');
        //hapus gambar yg ada diserver
        unlink('assets/img/buku/'.$gambar['image']);

        $this->Mod_buku->deleteBuku($bibid, 'buku');
        // print_r "berhasil"; die();
        redirect('buku/index/delete-success');
    }

    

    //function global buat validasi input
    public function _set_rules()
    {
        $this->form_validation->set_rules('bibid','Bibid','required|max_length[30]');
        $this->form_validation->set_rules('judul','Judul','required|max_length[300]');
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>","</div>");
    }

    public function cari_judul()
    {
        //$bibid = 7611;
        $judul = $this->input->post('judul');
        $hasil = $this->Mod_buku->cekJudul($judul);
        //jika ada buku dalam database
        if($hasil->num_rows() > 0) {
            $dbuku = $hasil->row_array();
            print_r $dbuku['bibid'];
        }
    }
   

    public function cari_bibid()
    {
        //$bibid = 7611;
        $bibid = $this->input->post('bibid');
        $hasil = $this->Mod_buku->cekBuku($bibid);
        //jika ada buku dalam database
        if($hasil->num_rows() > 0) {
            $dbuku = $hasil->row_array();
            print_r $dbuku['judul'];
        }
    }

}

/* End of file Buku.php */

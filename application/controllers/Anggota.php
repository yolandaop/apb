<?php 
defined('BASEPATH') OR die();

class Anggota extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata['username'] == '') {redirect('login/logout');}
        $this->load->model('Mod_anggota');
    }


    public function index()
    {
        $data['anggota']      = $this->Mod_anggota->getAll();
        if($this->uri->segment(3)=="create-success") {
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Disimpan...!</p></div>";    
                    $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
            $this->load->view('anggota/data_anggota', $data);  
        }
        else if($this->uri->segment(3)=="update-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Update...!</p></div>"; 
                    $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
            $this->load->view('anggota/data_anggota', $data); 
        }
        else if($this->uri->segment(3)=="delete-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Dihapus...!</p></div>"; 
                    $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
            $this->load->view('anggota/data_anggota', $data); 
        }

            $data['message'] = "";
                    $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
            $this->load->view('anggota/data_anggota', $data); 
        
        
    }

    public function create()
    {
                $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
        $this->load->view('anggota/tambah_anggota'); 
    }
    
    public function cari_anggota()
    {
        $nis = $this->input->post('nis');
        $cari = $this->Mod_anggota->cekAnggota($nis);
        //jika ada data anggota
        if($cari->num_rows() > 0) {
            $danggota = $cari->row_array();
            print_r $danggota['nama'];
        }
    }

    public function insert()
    {
        if(isset($_POST['save'])) {
            
            $this->_set_rules();

            //apabila user mengkosongkan form input
            if($this->form_validation->run()==true){
                // print_r "masuk"; die();
                $nis = $this->input->post('nis');
                $cek = $this->Mod_anggota->cekAnggota($nis);
                //cek nis yg sudah digunakan
                if($cek->num_rows() > 0){
                    $data['message'] = "<div class='alert alert-block alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <p><strong><i class='icon-ok'></i>NIS</strong> Sudah Digunakan...!</p></div>"; 
                            $data['id_petugas'] = $this->session->userdata['level'];
                    $this->load->view('includes/header', $data );
                    $this->load->view('anggota/tambah_anggota', $data);  
                }
                else{
                   

                        $save  = array(
                            'nis'   => $this->input->post('nis'),
                            'nama'  => $this->input->post('nama'),
                            'jk'    => $this->input->post('jenis'),
                            'ttl'   => $this->input->post('tgl_lahir'),
                            'kelas' => $this->input->post('kelas'),
                            'alamat' => $this->input->post('example1'),
                            'orangtua' => $this->input->post('orangtua'),
              
                        );
                        $this->Mod_anggota->insertAnggota("anggoa", $save);
                        //print_r "berhasil"; die();
                        redirect('anggota/index/create-success');
                                $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
                        $this->load->view('anggota/tambah_anggota', $data); 
                    } 
                }
            //jika tidak mengkosongkan
            else{
                $data['message'] = "";
                        $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
                $this->load->view('anggota/tambah_anggota', $data); 
            }
    }
    }
    public function edit()
    {
        $id_siswa = $this->uri->segment(3);
        $data['edit']    = $this->Mod_anggota->cekAnggota($id_siswa)->row_array();
                $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
        $this->load->view('anggota/edit_anggota', $data); 
    }

    public function update()
    {
       
                $this->_set_rules();
                
                //apabila user mengkosongkan form input
                if($this->form_validation->run()==true){
                    // print_r "masuk"; die();
                    
                    $nis = $this->input->post('nis');
                    
                    

                        $save  = array(
                            'nis'   => $this->input->post('nis'),
                            'nama'  => $this->input->post('nama'),
                            'jk'    => $this->input->post('jenis'),
                            'ttl'   => $this->input->post('tgl_lahir'),
                            'kelas' => $this->input->post('kelas'),
                            'alamat' => $this->input->post('alamat'),
                            'orangtua' => $this->input->post('orangtua')
                        );
                        $this->Mod_anggota->updateAnggota($nis, $save);
                        // print_r "berhasil"; die();
                        redirect('anggota/index/update-success');

                   
                        
                    
                }
                //jika tidak mengkosongkan
                else{
                    $nis = $this->input->post('nis');
                    $data['edit']    = $this->Mod_anggota->cekAnggota($nis)->row_array();
                    $data['message']="";
                            $data['id_petugas'] = $this->session->userdata['level'];
        $this->load->view('includes/header', $data );
                    $this->load->view('anggota/edit_anggota', $data); 
                }

            }    

        //end post update

    //end function update

    public function delete()
    {
        // $nis  = $this->uri->segment(3);

        $nis = $this->input->post('kode');
        $this->Mod_anggota->deleteAnggota($nis, 'anggota');
        // print_r "berhasil"; die();
        redirect('anggota/index/delete-success');
        
    }

    //function global buat validasi input
    public function _set_rules()
    {
        $this->form_validation->set_rules('nis','NIS','required|max_length[30]');
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('jenis','Jenis Kelamin','required|max_length[2]');
        $this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required|max_length[20]'); 
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>","</div>");
    }



}

/* End of file Anggota.php */
 
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_login');
        
    }

    public function index()
    {
        if(isset($_POST['proses'])) {
            
            //form validation
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
            $this->form_validation->set_error_delimiters('<span class="peringatan">', '</span>');
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('formlogin/login_data');
            }
            else{
                $username = $this->input->post('username');

                if($this->Mod_login->check_db($username)->num_rows()==1) {

                    $db = $this->Mod_login->check_db($username)->row();
        
                     if(hash_verified($this->input->post('password'), $db->password)) {
                        $userdata = array(
                            'id_petugas'  => $db->id_petugas,
                            'username'    => $db->username,
                            'full_name'   => ucfirst($db->full_name),
                            'level'        => $db->level,
                            'password'    => $db->password,
                        );

                    $this->session->set_userdata($userdata);

                    redirect('dashboard');
                    }

                    else{
                        $data['pesan'] = "<div class='alert alert-danger'>
                                                                <a href='#' class='close' data-dismiss='alert'>&times;</a>
                                                                <strong>Maaf</strong> Username dan Password anda salah. </div>";
                        $this->load->view('formlogin/login_data', $data);
                    }

                }
                else{
                    $data['pesan'] = "<div class='alert alert-danger'>
                                                                <a href='#' class='close' data-dismiss='alert'>&times;</a>
                                                                <strong>Sorry</strong> User Not Found. </div>";
                        $this->load->view('formlogin/login_data', $data); 
                }    

            }
        }
        else{
            $this->load->view('formlogin/login_data');
        }

        
    }//end function index

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}

/* End of file Login.php */

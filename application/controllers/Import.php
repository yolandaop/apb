<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller {

	public function __construct(){

        parent::__construct();
        if($this->session->userdata['username'] == '') {redirect('login/logout');}
		// load base_url
		$this->load->helper('url');

		// Load Model
		$this->load->model('Main_model');
	}
	
	public function buku(){

		// Check form submit or not 
 		if($this->input->post('upload') != NULL ){ 
   			$data = array(); 
   			if(!empty($_FILES['file']['name'])){ 
    			// Set preference 
    			$config['upload_path'] = 'assets/files/'; 
    			$config['allowed_types'] = 'csv'; 
    			$config['max_size'] = '1000'; // max_size in kb 
    			$config['file_name'] = $_FILES['file']['name']; 

    			// Load upload library 
    			$this->load->library('upload',$config); 
   
    			// File upload
    			if($this->upload->do_upload('file')){ 
     				// Get data about the file
     				$uploadData = $this->upload->data(); 
     				$filename = $uploadData['file_name']; 

     				// Reading file
                    $file = fopen("assets/files/".$filename,"r");
                    $i = 0;

                    $importData_arr = array();
                       
                    while (($filedata = fgetcsv($file, 1000, ";")) !== FALSE) {
                        $num = count($filedata);

                        for ($c=0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata[$c];
                        }
                        $i++;
                    }
                    fclose($file);

                    $skip = 0;

                    // insert import data
                    foreach($importData_arr as $userdata){
                        if($skip != 0){
                            $this->Main_model->insertRecordBuku($userdata);
                        }
                        $skip ++;
                    }
     				$data['response'] = 'successfully uploaded '.$filename; 
    			}else{ 
     				$data['response'] = 'failed'; 
    			} 
   			}else{ 
    			$data['response'] = 'failed'; 
   			} 
			   // load view 
			   $data['id_petugas'] = $this->session->userdata['level'];
			   $this->load->view('includes/header', $data );
   			$this->load->view('buku/import_buku',$data); 
  		}else{
			   // load view 
			   $data['id_petugas'] = $this->session->userdata['level'];
			   $this->load->view('includes/header', $data );
   				$this->load->view('buku/import_buku'); 
  		} 

	}

	public function anggota(){

		// Check form submit or not 
 		if($this->input->post('upload') != NULL ){ 
   			$data = array(); 
   			if(!empty($_FILES['file']['name'])){ 
    			// Set preference 
    			$config['upload_path'] = 'assets/files/'; 
    			$config['allowed_types'] = 'csv'; 
    			$config['max_size'] = '1000'; // max_size in kb 
    			$config['file_name'] = $_FILES['file']['name']; 

    			// Load upload library 
    			$this->load->library('upload',$config); 
   
    			// File upload
    			if($this->upload->do_upload('file')){ 
     				// Get data about the file
     				$uploadData = $this->upload->data(); 
     				$filename = $uploadData['file_name']; 

     				// Reading file
                    $file = fopen("assets/files/".$filename,"r");
                    $i = 0;

                    $importData_arr = array();
                       
                    while (($filedata = fgetcsv($file, 1000, ";")) !== FALSE) {
                        $num = count($filedata);

                        for ($c=0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata[$c];
                        }
                        $i++;
                    }
                    fclose($file);

                    $skip = 0;

                    // insert import data
                    foreach($importData_arr as $userdata){
                        if($skip != 0){
                            $this->Main_model->insertRecordAnggota($userdata);
                        }
                        $skip ++;
                    }
     				$data['response'] = 'successfully uploaded '.$filename; 
    			}else{ 
     				$data['response'] = 'failed'; 
    			} 
   			}else{ 
    			$data['response'] = 'failed'; 
   			} 
			   // load view 
			   $data['id_petugas'] = $this->session->userdata['level'];
			   $this->load->view('includes/header', $data );
   			$this->load->view('anggota/import_anggota',$data); 
  		}else{
			   // load view 
			   $data['id_petugas'] = $this->session->userdata['level'];
			   $this->load->view('includes/header', $data );
   				$this->load->view('anggota/import_anggota'); 
  		} 

	}

	
}

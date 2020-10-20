<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {

    function insertRecordBuku($record){
        
        if(count($record) > 0){
            
            // Check user
            $this->db->select('*');
            $this->db->where('bibid', $record[0]);
            $query = $this->db->get('buku');
            $response = $query->result_array();
            
            // Insert record
            if(count($response) == 0){
                $newbuku = array(
                    "bibid" => trim($record[0]),
                    "judul" => trim($record[1]),
                    "kategori" => trim($record[2]),
                    "penerbit" => trim($record[3]),
                    "deskripsi" => trim($record[4]),
                    "nomor" => trim($record[5]),
                    "eksemplar" => trim($record[6]),
                    "kepemilikan" => trim($record[7]),
                    "sumber" => trim($record[8]),
                    "tanggal_diterima" => trim($record[9]),
                    "tanggal_digunakan" => trim($record[10])
                );

                $this->db->insert('buku', $newbuku);
            }
            
        }
        
    }
    function insertRecordAnggota($record){
        
        if(count($record) > 0){
            
            // Check user
            $this->db->select('*');
            $this->db->where('nis', $record[0]);
            $query = $this->db->get('anggota');
            $response = $query->result_array();
            
            // Insert record
            if(count($response) == 0){
                $newanggota = array(
                    "nis" => trim($record[0]),
                    "nama" => trim($record[1]),
                    "jk" => trim($record[2]),
                    "ttl" => trim($record[3]),
                    "kelas" => trim($record[4]),
                    "alamat" => trim($record[5]),
                    "orangtua" => trim($record[6])

                );

                $this->db->insert('anggota', $newanggota);
            }
            
        }
        
    }

}
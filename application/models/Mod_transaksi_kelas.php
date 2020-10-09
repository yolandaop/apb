<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_transaksi_kelas extends CI_Model 
{

    private $table = "transaksi_kelas";
    private $tmp   = "tmp";
    
    function AutoNumbering()
    {
        $today = date('Ymd');

        $data = $this->db->query("SELECT MAX(id_transaksi) AS last FROM $this->table ")->row_array();

        $lastNoFaktur = $data['last'];
        
        $lastNoUrut   = substr($lastNoFaktur,8,3);
        
        $nextNoUrut   = $lastNoUrut+1;
        
        $nextNoTransaksi = $today.sprintf('%03s',$nextNoUrut);
        
        return $nextNoTransaksi;
    }

    function getTransaksi()
    {
        return $this->db->get('transaksi_kelas');
    }
    
   
    function insertTransaksi($tabel, $data)
    {
        $insert = $this->db->insert($tabel, $data);
        return $insert;
    }
    
    function cekTransaksi($kode)
    {
        $this->db->where("id_transaksi",$kode);
        return $this->db->get("transaksi_kelas");
    }



    function getId($kode)
    {
        $this->db->where("id_transaksi",$kode);
        return $this->db->get("transaksi_kelas.id_transaksi");
    }

    function getAll()
    {
        $this->db->order_by('transaksi_kelas.id_transaksi desc');
        return $this->db->get('transaksi_kelas');
    }

    function getPeminjaman()
    {
        $this->db->where('transaksi_kelas.status = "dipinjam"');
        $this->db->order_by('transaksi_kelas.id_transaksi desc');
        return $this->db->get('transaksi_kelas');
    }

    function getPengembalian()
    {
        $this->db->where('transaksi_kelas.status = "kembali"');
        $this->db->order_by('transaksi_kelas.id_transaksi desc');
        return $this->db->get('transaksi_kelas');
    }

    function getDataTransaksi($limit, $offset)
    {
        // return $this->db->get_where('post', array('category_id' => $category_id));
        $this->db->select('*');
        $this->db->from('transaksi_kelas a');
        // $this->db->where('a.nis', $nis);
        $this->db->limit($limit, $offset);
        $this->db->order_by('a.id_transaksi desc');
        return $this->db->get();
    }

    function totalRows()
	{
        $this->db->where('transaksi_kelas.status = "dipinjam"');
		return $this->db->count_all_results('transaksi_kelas');
    }

    
    function searchTransaksi($cari, $limit, $offset)
    {
        $this->db->like("id_transaksi",$cari);
        $this->db->or_like("nama",$cari);
        $this->db->limit($limit, $offset);
        return $this->db->get('transaksi_kelas');
    }

    
    public function UpdateStatus($id_transaksi, $data)
    {
        $this->db->where("id_transaksi", $id_transaksi);
        $this->db->update($this->table, $data);
        
    }

    function getJumlah($bibid,$id_transaksi)
    {
        $this->db->select('jumlah');
        $this->db->where("id_transaksi", $id_transaksi);
        $this->db->where("bibid",$bibid);
        return $this->db->get("transaksi_kelas")->row('jumlah');
    }

    function getBibid($id_transaksi)
    {
        $this->db->select("bibid");
        $this->db->where("id_transaksi",$id_transaksi);
        return $this->db->get("transaksi_kelas")->row('bibid');
    }

    function statistik($tahun2)
    {
        
        $sql= $this->db->query("
        select
        
        ifnull((SELECT count(id_transaksi) FROM (transaksi_kelas)WHERE((Month(tanggal)=7)AND (YEAR(tanggal)=$tahun2))),0) AS `Juli`,
        ifnull((SELECT count(id_transaksi) FROM (transaksi_kelas)WHERE((Month(tanggal)=8)AND (YEAR(tanggal)=$tahun2))),0) AS `Agustus`,
        ifnull((SELECT count(id_transaksi) FROM (transaksi_kelas)WHERE((Month(tanggal)=9)AND (YEAR(tanggal)=$tahun2))),0) AS `September`,
        ifnull((SELECT count(id_transaksi) FROM (transaksi_kelas)WHERE((Month(tanggal)=10)AND (YEAR(tanggal)=$tahun2))),0) AS `Oktober`,
        ifnull((SELECT count(id_transaksi) FROM (transaksi_kelas)WHERE((Month(tanggal)=11)AND (YEAR(tanggal)=$tahun2))),0) AS `November`,
        ifnull((SELECT count(id_transaksi) FROM (transaksi_kelas)WHERE((Month(tanggal)=12)AND (YEAR(tanggal)=$tahun2))),0) AS `Desember`,
        ifnull((SELECT count(id_transaksi) FROM (transaksi_kelas)WHERE((Month(tanggal)=1)AND (YEAR(tanggal)=$tahun2+1))),0) AS `Januari`,
        ifnull((SELECT count(id_transaksi) FROM (transaksi_kelas)WHERE((Month(tanggal)=2)AND (YEAR(tanggal)=$tahun2+1))),0) AS `Februari`,
        ifnull((SELECT count(id_transaksi) FROM (transaksi_kelas)WHERE((Month(tanggal)=3)AND (YEAR(tanggal)=$tahun2+1))),0) AS `Maret`,
        ifnull((SELECT count(id_transaksi) FROM (transaksi_kelas)WHERE((Month(tanggal)=4)AND (YEAR(tanggal)=$tahun2+1))),0) AS `April`,
        ifnull((SELECT count(id_transaksi) FROM (transaksi_kelas)WHERE((Month(tanggal)=5)AND (YEAR(tanggal)=$tahun2+1))),0) AS `Mei`,
        ifnull((SELECT count(id_transaksi) FROM (transaksi_kelas)WHERE((Month(tanggal)=6)AND (YEAR(tanggal)=$tahun2+1))),0) AS `Juni`
        from transaksi_kelas GROUP BY YEAR(tanggal) 
        ");
        
        return $sql;
        
    } 


}

/* End of file Mod_transaksi.php */

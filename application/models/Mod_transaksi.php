<?php 


   defined('BASEPATH');

class Mod_transaksi extends CI_Model 
{

    private $table = "transaksi";
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

    function cekPeminjaman($kode)
    {
        $this->db->where("nama", $kode);
        $this->db->where("status", "dipinjam");
        return $this->db->get("transaksi");
    }

    function getTmp()
    {
        return $this->db->get("tmp");
    }

    function getAll()
    {
        $this->db->order_by('transaksi.id_transaksi desc');
        return $this->db->get('transaksi');
    }

    
    function cekTmp($kode)
    {
        $this->db->where("bibid",$kode);
        return $this->db->get("tmp");
    }

    function InsertTmp($data)
    {
        //$this->db->insert("transaksi",$info);
        $this->db->insert($this->tmp, $data);    
    }

    function insertTransaksi($tabel, $data)
    {
        $insert = $this->db->insert($tabel, $data);
        return $insert;
    }

    function totalRows()
	{
        $this->db->where('transaksi.status = "dipinjam"');
		return $this->db->count_all_results('transaksi');
    }

    function getPeminjaman()
    {
        $this->db->where('transaksi.status = "dipinjam"');
        $this->db->order_by('transaksi.id_transaksi desc');
        return $this->db->get('transaksi');
    }
    
    function getPengembalian()
    {
        $this->db->where('transaksi.status = "kembali"');
        $this->db->order_by('transaksi.id_transaksi desc');
        return $this->db->get('transaksi');
    }
        
    public function UpdateStatus($id_transaksi,$bibid, $data)
    {
        $this->db->where("id_transaksi", $id_transaksi);
        $this->db->where("bibid", $bibid);
        $this->db->update($this->table, $data);
        
    }

    function jumlahTmp()
    {
        return $this->db->count_all("tmp");
    }

    function deleteTmp($bibid)
    {
        $this->db->where("bibid",$bibid);
        $this->db->delete($this->tmp);
    }

    function getTransaksi()
    {
        return $this->db->get($this->table);
    }

    function getBibid($id_transaksi)
    {
        $this->db->where("id_transaksi",$id_transaksi);
        return $this->db->get("transaksi")->result();
    }

    function statistik($tahun)
    {
        
        $sql= $this->db->query("
        select
        
        ifnull((SELECT count(id_transaksi) FROM (transaksi)WHERE((Month(tanggal_pinjam)=7)AND (YEAR(tanggal_pinjam)=$tahun))),0) AS `Juli`,
        ifnull((SELECT count(id_transaksi) FROM (transaksi)WHERE((Month(tanggal_pinjam)=8)AND (YEAR(tanggal_pinjam)=$tahun))),0) AS `Agustus`,
        ifnull((SELECT count(id_transaksi) FROM (transaksi)WHERE((Month(tanggal_pinjam)=9)AND (YEAR(tanggal_pinjam)=$tahun))),0) AS `September`,
        ifnull((SELECT count(id_transaksi) FROM (transaksi)WHERE((Month(tanggal_pinjam)=10)AND (YEAR(tanggal_pinjam)=$tahun))),0) AS `Oktober`,
        ifnull((SELECT count(id_transaksi) FROM (transaksi)WHERE((Month(tanggal_pinjam)=11)AND (YEAR(tanggal_pinjam)=$tahun))),0) AS `November`,
        ifnull((SELECT count(id_transaksi) FROM (transaksi)WHERE((Month(tanggal_pinjam)=12)AND (YEAR(tanggal_pinjam)=$tahun))),0) AS `Desember`,
        ifnull((SELECT count(id_transaksi) FROM (transaksi)WHERE((Month(tanggal_pinjam)=1)AND (YEAR(tanggal_pinjam)=$tahun+1))),0) AS `Januari`,
        ifnull((SELECT count(id_transaksi) FROM (transaksi)WHERE((Month(tanggal_pinjam)=2)AND (YEAR(tanggal_pinjam)=$tahun+1))),0) AS `Februari`,
        ifnull((SELECT count(id_transaksi) FROM (transaksi)WHERE((Month(tanggal_pinjam)=3)AND (YEAR(tanggal_pinjam)=$tahun+1))),0) AS `Maret`,
        ifnull((SELECT count(id_transaksi) FROM (transaksi)WHERE((Month(tanggal_pinjam)=4)AND (YEAR(tanggal_pinjam)=$tahun+1))),0) AS `April`,
        ifnull((SELECT count(id_transaksi) FROM (transaksi)WHERE((Month(tanggal_pinjam)=5)AND (YEAR(tanggal_pinjam)=$tahun+1))),0) AS `Mei`,
        ifnull((SELECT count(id_transaksi) FROM (transaksi)WHERE((Month(tanggal_pinjam)=6)AND (YEAR(tanggal_pinjam)=$tahun+1))),0) AS `Juni`
        from transaksi GROUP BY YEAR(tanggal_pinjam) 
        ");
        
        return $sql;
        
    } 

}

/* End of file Mod_transaksi.php */

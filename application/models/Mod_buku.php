<?php
   defined('BASEPATH');

class Mod_buku extends CI_Model {

    private $table   = "buku";
    private $primary = "bibid";

    function searchBuku($cari, $limit, $offset)
    {
        $this->db->like($this->primary,$cari);
        $this->db->or_like("judul",$cari);
        $this->db->limit($limit, $offset);
        return $this->db->get($this->table);
    }

    function totalRows($table)
	{
		return $this->db->count_all_results($table);
    }

    function totalEksemplar()
	{
		$this->db->select_sum('eksemplar');
        return $this->db->get("buku")->row('eksemplar');
    }

    function getBuku()
    {
        return $this->db->get('buku');
    }
    
    function getAll()
    {
        $this->db->order_by('buku.bibid desc');
        return $this->db->get('buku');
    }

    function getEksemplar($bibid)
    {
        $this->db->select('eksemplar');
        $this->db->where("bibid", $bibid);
        return $this->db->get("buku")->row('eksemplar');
    }

    function insertBuku($tabel, $data)
    {
        $insert = $this->db->insert($tabel, $data);
        return $insert;
    }

    function cekBuku($kode)
    {
        $this->db->where("bibid", $kode);
        return $this->db->get("buku");
    }

    function cekJudul($kode)
    {
        $this->db->where("judul", $kode);
        return $this->db->get("buku");
    }

    function updateBuku($bibid, $data)
    {
        $this->db->where('bibid', $bibid);
		$this->db->update('buku', $data);
    }

    function deleteBuku($kode, $table)
    {
        $this->db->where('bibid', $kode);
        $this->db->delete($table);
    }

    function BookSearch($judul)
    {
        $this->db->like($this->primary,$judul);
        $this->db->or_like("judul",$judul);
        $this->db->limit(10);
        return $this->db->get($this->table);
    }
}
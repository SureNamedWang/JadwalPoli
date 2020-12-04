<?php

class Dokter_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function getAll()
    {
        $this->db->select('dr.nama,d.nama as "namaDepartemen",d.name as "departementName", dr.foto');
        $this->db->from('dokter dr');
        $this->db->join('departemen d','dr.idDepartemenMain=d.id','inner');
        $this->db->where('dr.isActive',1);
        $this->db->where('d.isDeleted',0);
        $this->db->order_by('d.nama,dr.nama', 'asc');
        $query=$this->db->get();
        return $query->result();
    }

    
}
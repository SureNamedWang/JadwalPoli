<?php

class Schedule_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function getAll()
    {
        $dateNow = new DateTime("now", new DateTimeZone('Asia/Jakarta') );
        $tgl=$dateNow->format('Y-m-d');
        $this->db->select("s.paramedicname,s.doctor_speciality,s.time_slot,s.room,s.`status`");
        $this->db->from("schedule s");
        $this->db->where("s.scheduledatetime",$tgl);
        $this->db->order_by("s.time_slot","asc");
        $query=$this->db->get();
        return $query->result();
    }

    function allposts_count()
    {
        $dateNow = new DateTime("now", new DateTimeZone('Asia/Jakarta') );
        $tgl=$dateNow->format('Y-m-d');
        $this->db->select("s.paramedicname,s.doctor_speciality,s.time_slot,s.room,s.`status`");
        $this->db->from("schedule s");
        $this->db->where("s.scheduledatetime",$tgl);
        $this->db->order_by("s.time_slot","asc");
        return $this->db->count_all_results();
    }

    function allposts($limit,$start)
    {
        $dateNow = new DateTime("now", new DateTimeZone('Asia/Jakarta') );
        $tgl=$dateNow->format('Y-m-d');
        $this->db->select("s.paramedicname,s.doctor_speciality,s.time_slot,s.room,s.`status`");
        $this->db->from("schedule s");
        $this->db->where("s.scheduledatetime",$tgl);
        $this->db->limit($limit,$start);
        $this->db->order_by("s.time_slot","asc");
        
        $query = $this->db->get();

        if($this->db->count_all_results()>0)
        {
            return $query->result();
        }
        else
        {
            return null;
        }

    }

    
}
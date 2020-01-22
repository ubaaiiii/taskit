<?php

class m_task extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function all_my_task($id='')
    {
        $status = array("done","rejected");
        $this->db->where('dikerjakanOleh',$id);
        $this->db->where_not_in('status',$status);
        return $this->db->get('request')->num_rows();
        // return $this->db->get_where('request',array('dikerjakanOleh' => $id))->num_rows();
        // return $this->db->get_where('request',array('dikerjakanOleh' => 'done'))->num_rows();
    }

    function all_divisi_task($id='')
    {
        return $this->db->get_where('request',array('divisiTujuan' => $id))->num_rows();
    }
    
}

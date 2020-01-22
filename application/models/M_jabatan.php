<?php

class m_jabatan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function get_all_jabatan()
    {
        return $this->db->get('jabatan')->result_array();
    }

    function all_jabatan()   //total semua jabatan
    {
        return $this->db->get('jabatan')->num_rows();
    }

    function get_jabatan_by($id='')
    {
        return $this->db->get_where(array('id'=>$id))->result_array();
    }
}

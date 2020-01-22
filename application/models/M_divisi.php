<?php

class m_divisi extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function get_all_divisi()
    {
        return $this->db->get('divisi')->result_array();
    }

    function get_divisi_by($id)
    {
        return $this->db->get_where('divisi', array('id' => $id))->row_array();
    }

    function all_divisi()   //total semua divisi
    {
        return $this->db->get('divisi')->num_rows();
    }

    function proses_divisi()
    {
        if ($this->input->post('tipe')=="save"){
            $data = array(
                'id' => $this->input->post('kodeDivisi'),
                'divisi' => ucwords($this->input->post('divisi'))
            );
            return $this->db->insert('divisi',$data);

        } else if ($this->input->post('tipe')=="update"){
            $this->db->set('divisi',ucwords($this->input->post('divisi')));
            $this->db->where('id',$this->input->post('kodeDivisi'));
            return $this->db->update('divisi');

        } else if ($this->input->post('tipe')=="delete"){
            $this->db->where('id',$this->input->post('kodeDivisi'));
            return $this->db->delete('divisi');   

        }
    }
}

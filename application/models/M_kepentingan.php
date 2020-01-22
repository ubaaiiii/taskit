<?php

class m_kepentingan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_all_kepentingan()
    {
        return $this->db->get('kepentingan')->result_array();
    }

    function get_kepentingan_by($id)
    {
        return $this->db->get_where('kepentingan', array('id' => $id))->row_array();
    }

    function all_kepentingan()   //total semua kepentingan
    {
        return $this->db->get('kepentingan')->num_rows();
    }

    function proses_kepentingan()
    {
        if ($this->input->post('tipe')=="save"){
            $data = array(
                'id' => $this->input->post('id'),
                'kode' => $this->input->post('kode'),
                'skor' => $this->input->post('skor'),
                'kepentingan' => ucwords($this->input->post('deskripsi'))
            );
            return $this->db->insert('kepentingan',$data);

        } else if ($this->input->post('tipe')=="update"){
            $this->db->set('kepentingan',ucwords($this->input->post('kepentingan')));
            $this->db->set('skor',$this->input->post('skor'));
            $this->db->where('id',$this->input->post('kodekepentingan'));
            return $this->db->update('kepentingan');

        } else if ($this->input->post('tipe')=="delete"){
            $this->db->where('id',$this->input->post('kodekepentingan'));
            return $this->db->delete('kepentingan');

        }
    }
}

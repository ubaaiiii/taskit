<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class m_user extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function login($username, $password)
    {
        $query = $this->db->get_where('karyawan', array('username' => $username, 'password' => $password));
        return $query->row_array();
    }
}

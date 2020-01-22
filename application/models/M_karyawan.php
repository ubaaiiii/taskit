<?php

class m_karyawan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function get_all_karyawan()
    {
    	return $this->db->get('karyawan')->result_array();
    }
    
    function get_karyawan($id)
    {
    	return $this->db->get_where('karyawan',array('nik'=>$id))->row_array();
    }    

    function get_karyawan_divisi($id)
    {
        return $this->db->get_where('karyawan',array('divisi'=>$id))->result_array();
    } 

    function proses_karyawan()
    {
        if ($this->input->post('tipe')=="save"){
            $tanggal = substr($this->input->post('tanggalLahir'),8,2);
            $bulan = substr($this->input->post('tanggalLahir'),5,2);
            $tahun = substr($this->input->post('tanggalLahir'),0,4);
            $tanggalLahir2 = $tanggal."/".$bulan."/".$tahun;

            $upper = strtoupper($this->input->post('nama'));
            $kata = explode(" ",$upper,2);
            $username = "";
            $password = "";
            foreach($kata as $k){
                $username .= substr($k,0,3);
                $password .= $k[0];
            }
            $username.=$tanggal.$bulan;
            $password.= "@".$tanggal.$bulan."!";
            // $password = password_hash($password, PASSWORD_DEFAULT);

            $data = array(
                'nik'            => $this->input->post('nik'),
                'nama'           => ucwords($this->input->post('nama')),
                'tanggalLahir'   => $tanggalLahir2,
                'email'          => $this->input->post('email'),
                'divisi'         => $this->input->post('divisi'),
                'jabatan'        => $this->input->post('jabatan'),
                'username'       => $username,
                'password'       => $password
            );

            if ($this->db->insert('karyawan',$data)){
                $data2 = array(
                    'nama'       => $data['nama'],
                    'username'   => $username,
                    'password'   => $password,
                    'email'      => $data['email']
                );
            } else {
                $data2 = array(
                    'result'     => 'false'
                );
            }

            return $data2;

            // return json_encode($data2);
            // echo "save";

        } else if ($this->input->post('tipe')=="update"){
            $tanggal = substr($this->input->post('tanggalLahir'),8,2);
            $bulan = substr($this->input->post('tanggalLahir'),5,2);
            $tahun = substr($this->input->post('tanggalLahir'),0,4);
            $tanggalLahir2 = $tanggal."/".$bulan."/".$tahun;

            $data = array(
                'nama' => ucwords($this->input->post('nama')),
                'tanggalLahir' => $tanggalLahir2,
                'email' => $this->input->post('email'),
                'divisi' => $this->input->post('divisi'),
                'jabatan' => $this->input->post('jabatan'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );

            $this->db->where('nik',$this->input->post('nik'));
            return $this->db->update('karyawan',$data);

            echo $data['nama'];

        } else if ($this->input->post('tipe')=="delete"){
            $this->db->where('nik',$this->input->post('nik'));
            return $this->db->delete('karyawan');    

            // echo "delete";

        }
    }
}
<?php

class m_request extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    function gantiTanggal($tanggalnya='')
    {
        $tanggal = substr($tanggalnya,8,2);
        $bulan = substr($tanggalnya,5,2);
        $tahun = substr($tanggalnya,0,4);
       return $tanggal."/".$bulan."/".$tahun;
    }

    function get_request($id)
    {
        return $this->db->get_where('request', array('kodeRequest' => $id))->row_array();
    }

    function get_all_request()
    {
        return $this->db->get('request')->result_array();
    }

    function all_request()   //total semua request
    {
        return $this->db->get('request')->num_rows();
    }

    function new_request($id='')   //total request baru
    {

		$this->db->where('status', 'new');
        return $this->db->get('request')->num_rows();
    }

    function done_request()   //total request done
    {
        $this->db->where('status', 'done');
        return $this->db->get('request')->num_rows();
    }

    function reject_request()   //total request done
    {
        $this->db->where('status', 'rejected');
        return $this->db->get('request')->num_rows();
    }

    function progress_request()   //total request done
    {
        $this->db->where('status', 'onprogress');
        return $this->db->get('request')->num_rows();
    }

    function your_request($id = "")   //total request mu
    {
        return $this->db->get_where('request', array('requester' => $id))->num_rows();
    }

	function maksk1(){
        $this->db->select('k1');
        $this->db->from('matriks');
        $this->db->order_by('k1', 'desc');
        $query = $this->db->get();
		$query->row();
		//$this->load->view('k1');
		//$this->load->view('v_mahasiswa',$data);
        //return $query->result_array();
    }

    function proses_request()
    {
        if ($this->input->post('tipe')=="save"){
      //       $bobot = array(0.4,0.3,0.2,0.1);
			// $jlh_k=$this->input->post('kepentingan')+$this->input->post('divisi')+$this->input->post('rusak')+$this->input->post('lokasi');
			// //$jlh_k="2";
			// $matrik = array(
			// 		'kodeRequest' => $this->input->post('kodeRequest'),
			// 		'k1' => $this->input->post('kepentingan'),
			// 		'k2' => $this->input->post('divisi'),
			// 		'k3' => $this->input->post('rusak'),
			// 		'k4' => $this->input->post('lokasi'),
			// 		'hk' => $jlh_k
      //
			// );
			// $this->db->insert('matriks',$matrik);
      //
      //
      //
      //
			// //NILAI MAX DARI FIELD KRITERIA
			// //$this->db->select('k1');
			// //$this->db->from('matriks');
			// //$this->db->order_by('k1','DESC');
			// //$max1 = $this->db->post();
			// //$maxk1 = $query->result();
			// //$maxk1= $this->db->count_all_results();
      //
			//  //$max1=maksk1();
			// //$query->result();
      //
			// //$this->db->select('k1');
			// //$this->db->from('matriks');
			// //$this->db->order_by('k1','DESC');
			// //$max1= $this->db->post('k1');
      //
      //
      //
      //
      //
      //
      //
      //
			// //JUMLAH RECORD
			// $this->db->select('k1');
			// $this->db->from('matriks');
			// $jlh_brs= $this->db->count_all_results();
      //
			// $saw =((($jlh_k)/100)*($bobot[0]))*$jlh_brs;


      			//simpan data table request
      			$data = array(
                'kodeRequest' => $this->input->post('kodeRequest'),
                'deskripsi' => '['.$this->input->post('kepentingan').'] - '.$this->input->post('deskripsi'),
                'divisiTujuan' => $this->input->post('divisi'),
                'requester' => $this->input->post('requester'),
                'tanggalRequest' => date('d/m/Y', strtotime(' +1 day')),
        				'skor_saw' => "",
                'status' => 'new'
            );
            return $this->db->insert('request',$data);


        } else if ($this->input->post('tipe')=="update"){
            $this->db->set('status','onprogress');
            $this->db->set('progress','1');
            $this->db->set('catatanTugas',$this->input->post('catatan'));
            $this->db->set('tanggalDikerjakan',date('d/m/Y', strtotime(' +1 day')));
            $this->db->set('dikerjakanOleh',$this->input->post('ditugaskan'));
            $this->db->where('kodeRequest',$this->input->post('kodeRequest'));
            return $this->db->update('request');

        } else if ($this->input->post('tipe')=="progress"){
            $this->db->set('progress',$this->input->post('progress'));
            $this->db->where('kodeRequest',$this->input->post('kodeRequest'));
            return $this->db->update('request');

        } else if ($this->input->post('tipe')=="reject"){
            $this->db->set('status','rejected');
            $this->db->set('dikerjakanOleh',$this->session->user['nik']);
            $this->db->set('catatanDone',$this->input->post('catatan'));
            $this->db->set('tanggalDone',date('d/m/Y', strtotime(' +1 day')));
            $this->db->set('tanggalDikerjakan',date('d/m/Y', strtotime(' +1 day')));
            $this->db->where('kodeRequest',$this->input->post('kodeRequest'));
            return $this->db->update('request');

        } else if ($this->input->post('tipe')=="done"){
            $this->db->set('status','done');
            $this->db->set('progress',$this->input->post('progress'));
            $this->db->set('catatanDone',$this->input->post('catatan'));
            $this->db->set('tanggalDone',date('d/m/Y', strtotime(' +1 day')));
            $this->db->where('kodeRequest',$this->input->post('kodeRequest'));
            return $this->db->update('request');
        }
    }
}

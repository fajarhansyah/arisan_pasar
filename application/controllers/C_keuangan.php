<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_keuangan extends CI_Controller {
	public function index()
	{
        $query_data = $this->db->query("SELECT * FROM tb_data_induk");
        $data['data_arisan'] = $query_data->result_array();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('keuangan',$data);
		$this->load->view('template/footer');
	}
}

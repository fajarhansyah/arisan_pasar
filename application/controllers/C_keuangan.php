<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_keuangan extends CI_Controller {
	public function index()
	{

        $uang_arisan = $this->db->query("SELECT SUM(pembayaran_jumlah) AS 'uang_arisan' FROM tb_pembayaran");
        $data['uang_arisan'] = $uang_arisan->result_array();
		$uang_untung = $this->db->query("SELECT SUM(potongan) AS 'uang_untung' FROM tb_data_induk ");
        $data['uang_untung'] = $uang_untung->result_array();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('keuangan',$data);
		$this->load->view('template/footer');
	}
	public function detail_uang_arisan()
	{
        $harian = $this->db->query("SELECT *,SUM(pembayaran_jumlah) AS 'uang_masuk' FROM tb_pembayaran GROUP BY (pembayaran_tanggal)");
        // $harian = $this->db->query("SELECT *,SUM(pembayaran_jumlah) AS 'uang_masuk' FROM tb_pembayaran WHERE pembayaran_tanggal = '' ");
        $data['harian'] = $harian->result_array();

		$bulanan = $this->db->query("SELECT SUM(potongan) AS 'uang_untung' FROM tb_data_induk ");
        $data['bulanan'] = $bulanan->result_array();
		
		$tahunan = $this->db->query("SELECT SUM(potongan) AS 'uang_untung' FROM tb_data_induk ");
        $data['tahunan'] = $tahunan->result_array();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('detail_uang_arisan',$data);
		$this->load->view('template/footer');
	}
}

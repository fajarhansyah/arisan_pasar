<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_keuangan extends CI_Controller {
	public function index()
	{
		$tgl_skrng = date("Y-m-d");
        $uang_arisan = $this->db->query("SELECT SUM(pembayaran_jumlah) AS 'uang_arisan' FROM tb_pembayaran WHERE pengeluaran = 0");
        $data['uang_arisan'] = $uang_arisan->result_array();
		$uang_arisan_kurang = $this->db->query("SELECT SUM(pembayaran_jumlah) AS 'uang_arisan_kurang' FROM tb_pembayaran WHERE pengeluaran = 1");
        $data['uang_arisan_kurang'] = $uang_arisan_kurang->result_array();
		$autoce_uang_arisan = $this->db->query("SELECT * FROM tb_pembayaran WHERE pembayaran_tanggal = '$tgl_skrng' AND pengeluaran = '1'");
        $data['autoce_uang_arisan'] = $autoce_uang_arisan->result_array();
		$uang_untung = $this->db->query("SELECT SUM(potongan) AS 'uang_untung' FROM tb_data_induk ");
        $data['uang_untung'] = $uang_untung->result_array();
		if ($data['autoce_uang_arisan'] == null) {
			$data1 = array(
				'id_induk' 				=> 0,
				'pembayaran_jumlah' 	=> 0,
				'pembayaran_tanggal' 	=> $tgl_skrng,
				'pengeluaran' 			=> '1',
				'status' 				=> 'Awal'
			  );
			  $this->Model_crud->tambah_data($data1, 'tb_pembayaran');
		}
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('keuangan',$data);
		$this->load->view('template/footer');
	}
	public function detail_uang_arisan()
	{

        $harian = $this->db->query("
		SELECT t1.pembayaran_tanggal, t1.uang_masuk, t2.uang_keluar
		FROM (
		  SELECT pembayaran_tanggal,SUM(pembayaran_jumlah) AS 'uang_masuk' FROM tb_pembayaran WHERE pengeluaran = 0 
		  GROUP BY (pembayaran_tanggal)
		 ) AS t1,
		 (
		 SELECT pembayaran_tanggal,SUM(pembayaran_jumlah) AS 'uang_keluar' FROM tb_pembayaran WHERE pengeluaran = 1 
		 GROUP BY (pembayaran_tanggal)
		) AS t2
		WHERE t1.pembayaran_tanggal = t2.pembayaran_tanggal");
        $data['harian'] = $harian->result_array();

		$bulanan = $this->db->query("
		SELECT t1.pembayaran_tanggal, t1.uang_masuk, t2.uang_keluar
		FROM (
		  SELECT DATE_FORMAT(pembayaran_tanggal, '%M %Y') AS pembayaran_tanggal , SUM(pembayaran_jumlah)  AS 'uang_masuk'
		       FROM tb_pembayaran 
		       WHERE pengeluaran = '0'
		       GROUP BY YEAR(pembayaran_tanggal),MONTH(pembayaran_tanggal)
		 ) AS t1,
		 (
		 SELECT DATE_FORMAT(pembayaran_tanggal, '%M %Y') AS pmtg2, SUM(pembayaran_jumlah)  AS 'uang_keluar'
		       FROM tb_pembayaran 
		       WHERE pengeluaran = '1'
		       GROUP BY YEAR(pembayaran_tanggal),MONTH(pembayaran_tanggal)
		) AS t2
		WHERE t1.pembayaran_tanggal = t2.pmtg2  ");
        $data['bulanan'] = $bulanan->result_array();
		
		$tahunan = $this->db->query("
		SELECT t1.pembayaran_tanggal, t1.uang_masuk, t2.uang_keluar
		FROM (
		  SELECT DATE_FORMAT(pembayaran_tanggal, '%Y') AS pembayaran_tanggal , SUM(pembayaran_jumlah)  AS 'uang_masuk'
		       FROM tb_pembayaran 
		       WHERE pengeluaran = '0'
		       GROUP BY DATE_FORMAT(pembayaran_tanggal, '%Y')
		 ) AS t1,
		 (
		 SELECT DATE_FORMAT(pembayaran_tanggal, '%Y') AS pmtg2, SUM(pembayaran_jumlah)  AS 'uang_keluar'
		       FROM tb_pembayaran 
		       WHERE pengeluaran = '1'
		       GROUP BY DATE_FORMAT(pembayaran_tanggal, '%Y')
		) AS t2
		WHERE t1.pembayaran_tanggal = t2.pmtg2
		");
        $data['tahunan'] = $tahunan->result_array();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('detail_uang_arisan',$data);
		$this->load->view('template/footer');
	}
}

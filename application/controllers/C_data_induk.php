<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_data_induk extends CI_Controller {
	public function index()
	{
        $query_data = $this->db->query("SELECT * FROM tb_data_induk ");
        $data['data_arisan'] = $query_data->result_array();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('data_arisan',$data);
		$this->load->view('template/footer');
	}
	function simpan_data_induk(){
        $nama=$this->input->post('nama');
        $pembayaran=$this->input->post('pembayaran');
        $tp=$this->input->post('tipe_penerima');
		$tanggal_pembukaan = date("Y-m-d");
		$total_pembayaran = $pembayaran * 100;
		$potongan = $total_pembayaran * 2 / 100;
		$total_penerimaan = $total_pembayaran - $potongan ;
		$status = 1 ;
 
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/cache/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/error_log/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $image_name=$nama.'.png'; //buat name dari qr code sesuai dengan nim
 
       
		$data = array(
			'nama' 				=> $nama,
			'tanggal_pembukaan' => $tanggal_pembukaan,
			'total_pembayaran' 	=> $total_pembayaran,
			'potongan' 			=> $potongan,
			'total_penerimaan' 	=> $total_penerimaan,
			'qr_code' 			=> $image_name,
			'pembayaran' 		=> $pembayaran,
			'status' 			=> $status,
			'type_penerimaan' 	=> $tp
		  );
		  $this->Model_crud->tambah_data($data, 'tb_data_induk');
		  $insert_id = $this->db->insert_id();
		  $params['data'] = base_url('').'C_data_induk/hasil_scan_qr/'.$insert_id; //data yang akan di jadikan QR CODE
		  $params['level'] = 'H'; //H=High
		  $params['size'] = 10;
		  $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
		  $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
		  $this->session->set_flashdata('something', 'Pesan Terkirim');
		 //simpan ke database
        redirect('C_data_induk'); //redirect ke mahasiswa usai simpan data
    }
	function simpan_data_pembayaran(){
		
        $id_induk			=$this->input->post('id_induk');
        $pembayaran_jumlah	=$this->input->post('pembayaran_jumlah');
        $pembayaran_tanggal	=$this->input->post('pembayaran_tanggal');
		$tidak_bayar 		=$this->input->post('tidak_bayar');
		$bayar_jumlah = str_replace(".","",$pembayaran_jumlah); 
		$bayar_jumlah1 = str_replace("Rp","",$bayar_jumlah); 
		if ($tidak_bayar == 'tidak_bayar') {
			$data = array(
				'id_induk' 				=> $id_induk,
				'pembayaran_jumlah' 	=> '0',
				'pembayaran_tanggal' 	=> $pembayaran_tanggal,
				'status' 				=> 'Tidak Bayar'
			  );
		}else {
			$data = array(
				'id_induk' 				=> $id_induk,
				'pembayaran_jumlah' 	=> $bayar_jumlah1,
				'pembayaran_tanggal' 	=> $pembayaran_tanggal,
				'status' 				=> 'Bayar'
			  );
		}
		
		  $this->Model_crud->tambah_data($data, 'tb_pembayaran');
		  $this->session->set_flashdata('something', 'Pesan Terkirim');
		 //simpan ke database
        redirect('C_data_induk'); //redirect ke mahasiswa usai simpan data
    }
	public function edit()
	{
		$id_induk = $_GET['id_induk'];
		$query_data = $this->db->query("SELECT * FROM tb_data_induk WHERE id_induk = $id_induk");
        $data['data_arisan'] = $query_data->result_array(); ?>
			<!-- basic form start -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="form-group">
							<label for="exampleInputnama">Nama</label>
							<input type="text" class="form-control" id="exampleInputnama" name="nama" value="<?= $data['data_arisan'][0]['nama']?>" placeholder="Masukkan Nama">
							<input type="hidden"  name="id_induk" value="<?= $data['data_arisan'][0]['id_induk']?>">
						</div>
						<div class="form-group">
							<label for="exampleInputpembayran">Pembayaran</label>
							<input type="text" class="form-control" id="exampleInputbayar1" name="pembayaran" value="Rp. <?= number_format($data['data_arisan'][0]['pembayaran'],0,',','.');?>" placeholder="Masukkan pembayaran">
						</div>
						<div class="form-group">
							<label class="col-form-label">Tipe pemerimaan</label>
							<select class="form-control" name="tipe_penerima" required>
								<option disabled selected>- Pilih -</option>
								<option>Atas Bawah</option>
								<option>Tengah</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<!-- basic form end -->
			<script>
				var rupiah = document.getElementById("exampleInputbayar1");
				rupiah.addEventListener("keyup", function(e) {
				// tambahkan 'Rp.' pada saat form di ketik
				// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
				rupiah.value = formatRupiah(this.value, "Rp. ");
				});
				

				/* Fungsi formatRupiah */
				function formatRupiah(angka, prefix) {
					
				var number_string = angka.replace(/[^,\d]/g, "").toString(),
					split = number_string.split(","),
					sisa = split[0].length % 3,
					rupiah = split[0].substr(0, sisa),
					ribuan = split[0].substr(sisa).match(/\d{3}/gi);

				// tambahkan titik jika yang di input sudah menjadi angka ribuan
				if (ribuan) {
					separator = sisa ? "." : "";
					rupiah += separator + ribuan.join(".");
				}

				rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
				return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
				}
			</script>
<?php
	}
	public function update()
	{
		$id_induk=$this->input->post('id_induk');
		$nama=$this->input->post('nama');
        $pembayaran=$this->input->post('pembayaran');
		$bayar_jumlah = str_replace(".","",$pembayaran); 
		$bayar_jumlah1 = str_replace("Rp","",$bayar_jumlah);
        $tp=$this->input->post('tipe_penerima');
		$tanggal_pembukaan = date("Y-m-d");
		$total_pembayaran = $bayar_jumlah1 * 100;
		$potongan = $total_pembayaran * 2 / 100;
		$total_penerimaan = $total_pembayaran - $potongan ;
		$status = 1 ;
		 

		$data = array(
			'nama' 				=> $nama,
			'tanggal_pembukaan' => $tanggal_pembukaan,
			'total_pembayaran' 	=> $total_pembayaran,
			'potongan' 			=> $potongan,
			'total_penerimaan' 	=> $total_penerimaan,
			'pembayaran' 		=> $bayar_jumlah1,
			'status' 			=> $status,
			'type_penerimaan' 	=> $tp
		  );
		$where = array('id_induk' => $id_induk);
		$this->Model_crud->update_data($where, $data, 'tb_data_induk');
		$this->session->set_flashdata('something1', 'Pesan Terkirim');

		redirect('C_data_induk');
	}
	public function delete()
	{
		$id_induk=$this->input->post('id_induk');

		$data = array(
			'status' 			=> 0
		  );
		$where = array('id_induk' => $id_induk);
		
		$this->Model_crud->update_data($where, $data, 'tb_data_induk');

		redirect('C_data_induk');
	}
	public function hasil_scan_qr($id)
	{
        $query_data = $this->db->query("SELECT * FROM tb_data_induk WHERE id_induk = $id");
        $data['data_arisan'] = $query_data->result_array();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('hp_data_arisan',$data);
		$this->load->view('template/footer');
	}
	public function cetak_pembayaran()
	{
		$this->load->view('cetak_struk_pembayaran');
	}
	public function modal_detail(){
		$id_induk = $_GET['id_induk'];
		$query_data = $this->db->query("SELECT * FROM tb_data_induk WHERE id_induk = $id_induk");
        $data['data_arisan'] = $query_data->result_array();
        $query_data_pembayaran = $this->db->query("SELECT * FROM tb_pembayaran WHERE id_induk = $id_induk");
        $data['data_pembayaran'] = $query_data_pembayaran->result_array();
		$tot_query_data_pembayaran = $this->db->query("SELECT SUM(pembayaran_jumlah) AS 'tot_pem' FROM tb_pembayaran WHERE id_induk = $id_induk");
        $data['tot_data_pembayaran'] = $tot_query_data_pembayaran->result_array();
		?>
			<?php
				$i=1;
				foreach ($data['data_arisan'] as $key => $value1) {
			?>     
			<h6 style="color:green">Jumlah yang sudah dibayar :</h6> <span  style="color:green">Rp. <?= number_format($data['tot_data_pembayaran'][0]['tot_pem'],0,',','.');?></span><br>
			<h6 style="color:red">Jumlah yang belum dibayar :</h6><span  style="color:red">Rp. <?php $tot_blm_byr = $value1['total_pembayaran'] - $data['tot_data_pembayaran'][0]['tot_pem'];echo number_format($tot_blm_byr,0,',','.');?></span>
			<?php } ?>
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="single-table">
							<div class="table-responsive">
								<table id="tabel_pembayaran"class="table text-dark text-center">
									<thead class="text-uppercase">
										<tr class="table-active">
											<th scope="col">Hari</th>
											<th scope="col">Tanggal Pembayaran</th>
											<th scope="col">Bayar</th>
											<th scope="col">Status</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i=1;
											foreach ($data['data_pembayaran'] as $key => $value) {
										?>       
										<tr>
											<th scope="row"> <?= $i++ ?></th>
											<td><?=  date('d/m/Y', strtotime($value['pembayaran_tanggal'])) ;?></td>
											<td>Rp. <?= number_format($value['pembayaran_jumlah'],0,',','.');?></td>
											<td>
											<?php if ($value['status'] == 'Bayar') { ?>
												<span style="color:green">
											<?php }else { ?>
												<span style="color:red">
											<?php } ?>
											<?= $value['status'];?></span>	</td>   
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Contextual Classes end -->
		
		<?php
	}
}

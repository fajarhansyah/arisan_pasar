<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_rekap_penerima extends CI_Controller {
	public function index()
	{
        $query_data = $this->db->query("SELECT * FROM tb_data_induk");
        $data['data_arisan'] = $query_data->result_array();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('rekap_penerima',$data);
		$this->load->view('template/footer');
	}
	public function take_foto()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('bukti_penerima');
		$this->load->view('template/footer');
	}
	public function simpan_foto()
	{
		$image = $this->input->post('image');
		$image = str_replace('data:image/jpeg;base64,','', $image);
		$image = base64_decode($image);
		$filename = 'image_'.time().'.jpg';
		file_put_contents(FCPATH . '/uploads/' . $filename, $image);
		redirect('C_rekap_penerima');
	}
	public function qr_code()
	{
		$this->load->view('qr_code');
	}
	public function modal_detail(){
		$id_induk = $_GET['id_induk'];
		$type = $_GET['type'];
		$query_data = $this->db->query("SELECT * FROM tb_data_induk WHERE id_induk = $id_induk");
        $data['data_arisan'] = $query_data->result_array();
        $query_data_pembayaran = $this->db->query("SELECT * FROM tb_pembayaran WHERE id_induk = $id_induk");
        $data['data_pembayaran'] = $query_data_pembayaran->result_array();
		$tot_query_data_pembayaran = $this->db->query("SELECT SUM(pembayaran_jumlah) AS 'tot_pem' FROM tb_pembayaran WHERE id_induk = $id_induk");
        $data['tot_data_pembayaran'] = $tot_query_data_pembayaran->result_array();
		if ($type == 'tengah') {
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
		
		<?php }else{ 	$i=1;
				foreach ($data['data_arisan'] as $key => $value1) {
			?>     
			<h6 style="color:green">Jumlah yang sudah dibayar :</h6> <span style="color:green">Rp. <?= number_format($data['tot_data_pembayaran'][0]['tot_pem'],0,',','.');?></span><br>
			<h6 style="color:red">Jumlah yang belum dibayar 10 hari :</h6><span style="color:red">Rp. <?php $blm_byr = $value1['pembayaran'] * 10 - $data['tot_data_pembayaran'][0]['tot_pem'];echo number_format($blm_byr,0,',','.');?></span>
			<h6 style="color:red">Jumlah yang belum dibayar keseluruhan :</h6><span style="color:red">Rp. <?php $tot_blm_byr = $value1['total_pembayaran'] - $data['tot_data_pembayaran'][0]['tot_pem'];echo number_format($tot_blm_byr,0,',','.');?></span>
			<h6 style="color:red">Jumlah Keseluruhan :</h6><span style="color:red">Rp. <?= number_format($value1['total_pembayaran'],0,',','.') ?></span>
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
		
		<?php } ?>

		<?php
	}
}

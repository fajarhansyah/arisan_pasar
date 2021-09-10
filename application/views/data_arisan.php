<!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <!-- Dark table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Data Arisan</h4><br>
                        <button type="button" class="btn btn-sm btn-flat btn-success mb-3" title="Detail" data-toggle="modal" data-target=".bd-example-modal-lg-tambah">Tambah Data</button>

                        <div class="data-tables datatable-dark">
                            <table id="table_data_arisan" class="text-center">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Tanggal Pembukaan</th>
                                        <th scope="col">Pembayaran</th>
                                        <th scope="col">Total Pembayaran</th>
                                        <th scope="col">Potongan</th>
                                        <th scope="col">Type Penerimaan</th>
                                        <th scope="col">Total Penerimaan</th>
                                        <th scope="col">QR Code</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i=1;
                                        foreach ($data_arisan as $key => $value) {
                                    ?>       
                                    <tr>
                                        <th scope="row"> <?= $i++ ?></th>
                                        <td><?= $value['nama']?></td>
                                        <td><?=  date('d/m/Y', strtotime($value['tanggal_pembukaan'])) ;?></td>
                                        <td>Rp. <?= number_format($value['pembayaran'],0,',','.');?></td>
                                        <td>Rp. <?= number_format($value['total_pembayaran'],0,',','.');?></td>
                                        <td>Rp. <?= number_format($value['potongan'],0,',','.');?></td>
                                        <td>
                                            <?php 
                                                if ($value['type_penerimaan'] == 1) {
                                                echo 'Atas bawah';
                                                } else {
                                                    echo 'Tengah'; 
                                                } 
                                            ?>
                                        </td>
                                        <td>Rp. <?= number_format($value['total_penerimaan'],0,',','.');?></td>
                                        <td><img style="width: 100px;" src="<?php echo base_url().'assets/images/'.$value['qr_code'];?>"></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-flat btn-success mb-3" title="Bayar" name="<?php echo $value['id_induk'] ?> " onClick="bayar(this.name,<?php echo $value['pembayaran'] ?>)" data-toggle="modal" data-target=".bd-example-modal-lg-bayar"><i class="fa fa-money"></i></button>
                                            <button type="button" class="btn btn-sm btn-flat btn-warning mb-3" title="Detail" onClick="detail(<?php echo $value['id_induk'] ?>,<?php echo $value['total_pembayaran'] ?>)" data-toggle="modal" data-target=".bd-example-modal-lg-detail"><i class="fa fa-info-circle"></i></button>
                                            <button type="button" class="btn btn-sm btn-flat btn-primary mb-3" title="Edit" onClick="edit(<?php echo $value['id_induk'] ?>)" data-toggle="modal" data-target=".bd-example-modal-lg-edit"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-sm btn-flat btn-danger  mb-3" title="Hapus" onClick="hapus(<?php echo $value['id_induk'] ?>)"data-toggle="modal" data-target=".bd-example-modal-lg-hapus"><i class="fa fa-trash-o"></i></button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Dark table end -->
        </div>
    </div>
<!-- Large modal start -->

            <div class="modal fade bd-example-modal-lg-tambah">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="<?php echo base_url().'C_data_induk/simpan_data_induk'?>" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Data Pembukaan</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <!-- basic form start -->
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputnama">Nama</label>
                                                <input type="text" class="form-control" id="exampleInputnama"  name="nama" placeholder="Masukkan Nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputpembayaran">Pembayaran</label>
                                                <input type="number" class="form-control" id="exampleInputpembayaran" name="pembayaran" placeholder="Masukkan pembayaran">
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Tipe penerimaan</label>
                                                <select class="form-control" name="tipe_penerima">
                                                    <option disabled selected>- Pilih -</option>
                                                    <option value="1">Atas Bawah</option>
                                                    <option value="2">Tengah</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- basic form end -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg-bayar">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="<?php echo base_url().'C_data_induk/simpan_data_pembayaran'?>" method="post">
                            <input type="hidden"  id="kirim_id_induk"  name="id_induk">                    
                            <div class="modal-header">
                                <h5 class="modal-title">Modal Bayar</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <!-- basic form start -->
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="example-date-input" class="col-form-label">Tanggal</label>
                                                <input class="form-control" type="date" value="<?php echo date("Y-m-d"); ?>" id="example-date-input" name="pembayaran_tanggal">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputbayar">Jumlah bayar</label>
                                                <input type="text" class="form-control exampleInputbayar" id="exampleInputbayar"  name="pembayaran_jumlah"  >
                                            </div>
                                            <button type="submit" class="btn btn-danger" value="tidak_bayar"  name="tidak_bayar">Tidak Bayar</button>

                                        </div>
                                    </div>
                                </div>

                                <!-- basic form end -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-success">Bayar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg-detail">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header">
                                <h5 class="modal-title">Modal Detail</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div id="body_detail" class="modal-body">
                               
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg-edit">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="<?php echo base_url().'C_data_induk/update'?>" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal Edit</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div id="body_edit" class="modal-body">
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg-hapus">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="<?php echo base_url().'C_data_induk/delete'?>" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal Hapus</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Yakin Anda Akan menghapus Pelanggan ini?</p>
							    <input type="hidden"  name="id_induk" id="hapus_id">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
<!-- Large modal modal end -->   
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
            $(document).ready(function() {
              $('#table_data_arisan').DataTable();
            });
</script>
<script>
function bayar(id_induk,pembayaran)
      {
        $('#kirim_id_induk').val(id_induk);
        var	number_string = pembayaran.toString(),
            sisa 	= number_string.length % 3,
            rupiah 	= number_string.substr(0, sisa),
            ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
                
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        $('.exampleInputbayar').val('Rp.'+ rupiah);

        var rupiah = document.getElementById("exampleInputbayar");
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

            }
</script>
<script>
    function detail(id_induk,pembayaran){
        $.ajax({
          url : "<?php echo base_url('c_data_induk/modal_detail') ?>",
          data: "id_induk=" +id_induk,
          success:function(data){
            $('#body_detail').html(data);
          }
        })
      } 
</script>
<script>
    function edit(id_induk){
        $.ajax({
          url : "<?php echo base_url('c_data_induk/edit') ?>",
          data: "id_induk=" +id_induk,
          success:function(data){
            $('#body_edit').html(data);
          }
        })
      }   
</script>
<script>
    function hapus(id_induk){
        $('#hapus_id').val(id_induk);

      }   
</script>
<div class="col-12">
    <form action="<?php echo base_url().'C_data_induk/pembayaran_hp'?>"  method="post">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="example-date-input" class="col-form-label">Tanggal</label>
                    <input class="form-control" type="date" name="tanggal" value="<?= date("Y-m-d");?>" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputbayar">Nama Pelanggan</label>
                    <input type="text" class="form-control"  value="<?= $data_arisan[0]['nama_pelanggan']?>" readonly>
                    <input type="hidden"  name="id_induk" value="<?= $data_arisan[0]['id_induk']?>" >
                </div>
                
                <div class="form-group">
                    <label for="exampleInputbayar">Jumlah bayar</label>
                    <input type="text" class="form-control" id="rupiah"  value="Rp. <?= number_format($data_arisan[0]['pembayaran'],0,',','.');?>">
                    <input type="hidden" name="pembayaran_jumlah"  value="<?= $data_arisan[0]['pembayaran']?>">
                </div>
                <div class="row">
                    <div class="col-12">
                        <center>
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-danger" name="status" value="tidak_bayar"> Tidak Bayar</button>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-success" name="status" value="bayar">Bayar</button>
                                </div>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table text-dark text-center">
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
                                foreach ($data_pembayaran as $key => $value) {
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
<script>
var rupiah = document.getElementById("rupiah");
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
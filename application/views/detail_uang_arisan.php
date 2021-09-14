<!-- page title area end -->
<div class="main-content-inner">
        <div class="row">
            <!-- Dark table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Detail Harian</h4>  
                        <br>

                        <div class="data-tables datatable-dark">
                            <table id="table_data_arisan" class="text-center table_data_arisan">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Uang Masuk</th>
                                        <th scope="col">Uang Keluar</th>
                                        <th scope="col">Total Pendapatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i=1;
                                        foreach ($harian as $key => $value) {
                                    ?>       
                                    <tr>
                                        <th scope="row"> <?= $i++ ?></th>
                                        <td><?= $value['pembayaran_tanggal']?></td>
                                        <td>Rp. <?= number_format($value['uang_masuk'],0,',','.');?></td>
                                        <td>Rp. <?= number_format($value['uang_keluar'],0,',','.');?></td>
                                        <td>Rp. <?php
                                            $tot = $value['uang_masuk'] - $value['uang_keluar'] ;
                                            echo number_format($tot,0,',','.');
                                        ?></td>
                                        
                                     
                                        
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Detail Bulanan</h4>   
                        <br>

                        <div class="data-tables datatable-dark">
                            <table id="table_data_arisan" class="text-center table_data_arisan">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Bulan</th>
                                        <th scope="col">Uang Masuk</th>
                                        <th scope="col">Uang Keluar</th>
                                        <th scope="col">Total Pendapatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i=1;
                                        foreach ($bulanan as $key => $value) {
                                    ?>       
                                    <tr>
                                        <th scope="row"> <?= $i++ ?></th>
                                        <td><?= $value['pembayaran_tanggal']?></td>
                                        <td>Rp. <?= number_format($value['uang_masuk'],0,',','.');?></td>
                                        <td>Rp. <?= number_format($value['uang_keluar'],0,',','.');?></td>
                                        <td>Rp. <?php
                                            $tot = $value['uang_masuk'] - $value['uang_keluar'] ;
                                            echo number_format($tot,0,',','.');
                                        ?></td>
                                        
                                     
                                        
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Detail Tahunan</h4>    
                        <br>

                        <div class="data-tables datatable-dark">
                            <table id="table_data_arisan" class="text-center table_data_arisan">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tahun</th>
                                        <th scope="col">Uang Masuk</th>
                                        <th scope="col">Uang Keluar</th>
                                        <th scope="col">Total Pendapatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i=1;
                                        foreach ($tahunan as $key => $value) {
                                    ?>       
                                    <tr>
                                        <th scope="row"> <?= $i++ ?></th>
                                        <td><?= $value['pembayaran_tanggal']?></td>
                                        <td>Rp. <?= number_format($value['uang_masuk'],0,',','.');?></td>
                                        <td>Rp. <?= number_format($value['uang_keluar'],0,',','.');?></td>
                                        <td>Rp. <?php
                                            $tot = $value['uang_masuk'] - $value['uang_keluar'] ;
                                            echo number_format($tot,0,',','.');
                                        ?></td>
                                        
                                     
                                        
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

            <div class="modal fade bd-example-modal-lg-detail">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header">
                                <h5 class="modal-title">Modal Detail</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div id="body_detail_tengah" class="modal-body">
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg-detail1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header">
                                <h5 class="modal-title">Modal Detail</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div id="body_detail_ab" class="modal-body">
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg-penerima">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header">
                                <h5 class="modal-title">Modal Penerima</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <h6 style="color:green">Yang sudah dibayar :</h6> <span style="color:green">Rp 30.000</span><br><br>
                                <h6 style="color:red">Bolong :</h6><span style="color:red">Rp 300.000</span><br><br>
                                <h6 style="color:red">Potongan :</h6><span style="color:red">Rp 2.000.000</span><br><br>
                                <h6 style="color:green">Menerima :</h6><span style="color:green">Rp 3.000.000</span>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <a href="<?php echo base_url() ?>C_rekap_penerima/take_foto"><button type="button" class="btn btn-primary">Bayarkan & Foto Bukti</button></a>
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
              $('.table_data_arisan').DataTable();
            });
</script>
<script>
    function detail_ab(id_induk,pembayaran){
        var type = 'ab';
        $.ajax({
          url : "<?php echo base_url('c_rekap_penerima/modal_detail') ?>",
          data: "id_induk=" +id_induk+"&type=" +type,
          success:function(data){
            $('#body_detail_ab').html(data);
          }
        })
      }
      function detail_tengah(id_induk,pembayaran){
        var type = 'tengah';
        $.ajax({
          url : "<?php echo base_url('c_rekap_penerima/modal_detail') ?>",
          data: "id_induk=" +id_induk+"&type=" +type,
          success:function(data){
            $('#body_detail_tengah').html(data);
          }
        })
      } 
</script>
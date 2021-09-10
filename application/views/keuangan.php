<!-- page title area end -->
<div class="main-content-inner">
        <div class="row">
            <!-- Dark table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Keuangan</h4><br>
                        <div class="row">
                            <div class="col-xl-6 col-ml-6 col-mdl-6 col-sm-6 mt-5">
                                <div class="card">
                                    <div class="pricing-list dark-pricing">
                                        <div class="prc-head">
                                            <h4>Uang Untung</h4>
                                        </div>
                                        <div class="prc-list">
                                            <H2>Rp. <?= number_format($uang_untung[0]['uang_untung'],0,',','.');?></H2>
                                            <a href="#">Ambil</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-ml-6 col-mdl-6 col-sm-6 mt-5">
                                <div class="card">
                                    <div class="pricing-list dark-pricing">
                                        <div class="prc-head">
                                            <h4>Uang Arisan</h4>
                                        </div>
                                        <div class="prc-list">
                                            <H2>Rp. <?= number_format($uang_arisan[0]['uang_arisan'],0,',','.') ?></H2>
                                            <a href="<?php echo base_url() ?>C_keuangan/detail_uang_arisan">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-ml-12 col-mdl-12 col-sm-12 mt-5">
                                <div class="card">
                                    <div class="pricing-list dark-pricing">
                                        <div class="prc-head">
                                            <h4>Total Uang</h4>
                                        </div>
                                        <div class="prc-list">
                                        <?php $total_uang = $uang_arisan[0]['uang_arisan'] + $uang_untung[0]['uang_untung'];?>
                                            <H2>Rp. <?= number_format($total_uang,0,',','.') ?></H2>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                        <form>
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
                                                <input type="text" class="form-control" id="exampleInputnama"  placeholder="Masukkan Nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputpembayran">Pembayaran</label>
                                                <input type="number" class="form-control" id="exampleInputpembayran" placeholder="Masukkan pembayaran">
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Tipe pemerimaan</label>
                                                <select class="form-control">
                                                    <option disabled selected>- Pilih -</option>
                                                    <option>Atas Bawah</option>
                                                    <option>Tengah</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- basic form end -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg-bayar">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form>
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
                                                <input class="form-control" type="date" value="2018-03-05" id="example-date-input">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputbayar">Jumlah bayar</label>
                                                <input type="number" class="form-control" id="exampleInputbayar" aria-describedby="emailHelp" placeholder="Masukkan Pembayaran">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- basic form end -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-success">Bayar</button>
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
                            <div class="modal-body">
                                <h6 style="color:green">Jumlah yang sudah dibayar :</h6> <span style="color:green">Rp 30.000</span><br>
                                <h6 style="color:red">Jumlah yang belum dibayar :</h6><span style="color:red">Rp 300.000</span>
                                <!-- Contextual Classes start -->
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
                                                                <th scope="col">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr >
                                                            <th scope="row">1</th>
                                                            <td>09 / 07 / 2018</td>
                                                            <td><span style="color:green"> Bayar</span></td>
                                                        </tr>
                                                        <tr >
                                                            <th scope="row">2</th>
                                                            <td>09 / 07 / 2018</td>
                                                            <td><span style="color:red">Belum Bayar</span></td>
                                                        </tr>
                                                        <tr >
                                                            <th scope="row">3</th>
                                                            <td>09 / 07 / 2018</td>
                                                            <td> <span style="color:red">Belum Bayar</span></td>
                                                        </tr>
                                                        <tr >
                                                            <th scope="row">4</th>
                                                            <td>09 / 07 / 2018</td>
                                                            <td><span style="color:green"> Bayar</span></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Contextual Classes end -->
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
                        <form>
                            <div class="modal-header">
                                <h5 class="modal-title">Modal Edit</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <!-- basic form start -->
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputnama">Nama</label>
                                                <input type="text" class="form-control" id="exampleInputnama"  placeholder="Masukkan Nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputpembayran">Pembayaran</label>
                                                <input type="number" class="form-control" id="exampleInputpembayran" placeholder="Masukkan pembayaran">
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Tipe pemerimaan</label>
                                                <select class="form-control">
                                                    <option disabled selected>- Pilih -</option>
                                                    <option>Atas Bawah</option>
                                                    <option>Tengah</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- basic form end -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg-hapus">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal Hapus</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius voluptates explicabo natus nobis, aperiam placeat aliquid nisi ut exercitationem dolor quisquam nam tempora voluptatem. Unde dignissimos est aliquid quidem porro dolorum ipsam suscipit animi quas, debitis ea, sunt quo distinctio doloribus eveniet dolores tempore delectus voluptatum! Possimus earum asperiores animi.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="button" class="btn btn-danger">Hapus</button>
                        </div>
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
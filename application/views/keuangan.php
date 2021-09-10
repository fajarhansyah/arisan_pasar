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

                                        <td>
                                            <button type="button" class="btn btn-sm btn-flat btn-success mb-3" title="Bayar" data-toggle="modal" data-target=".bd-example-modal-lg-bayar"><i class="fa fa-money"></i></button>
                                            <button type="button" class="btn btn-sm btn-flat btn-warning mb-3" title="Detail" data-toggle="modal" data-target=".bd-example-modal-lg-detail"><i class="fa fa-info-circle"></i></button>
                                            <button type="button" class="btn btn-sm btn-flat btn-primary mb-3" title="Edit" data-toggle="modal" data-target=".bd-example-modal-lg-edit"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-sm btn-flat btn-danger  mb-3" title="Hapus" data-toggle="modal" data-target=".bd-example-modal-lg-hapus"><i class="fa fa-trash-o"></i></button>
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
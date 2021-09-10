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
            <div class="row">
                <div class="col-4"> </div>
                <div class="col-4">
                <a href="<?php echo base_url().'C_data_induk/cetak_pembayaran'?>"> <button type="button" class="btn btn-success" >Bayar</button></a>
                </div>
                <div class="col-4"> </div>
            </div>
        </div>
    </div>
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
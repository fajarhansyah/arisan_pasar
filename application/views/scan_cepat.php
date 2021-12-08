<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="<?php echo base_url() ?>assets/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/assets/js/instascan.min.js"></script><!-- page title area end -->
<body>
    <div class="container">
        <div class="row">
            <div class="row justify-content-center mt-5">
                <div class="col-md-5">
                    <div class="card-body">
                        <video id="preview" width="300" hight="300"></video>
                        <div class ="form-group">
                            <input type="text" id="qrcode" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
 
<script type="text/javascript">
let scanner = new Instascan.Scanner({video: document.getElementById('preview')}) ;
scanner.addListener('scan', function(content){
    var Contoh1 = content.substr(57);
    $("#qrcode").val(Contoh1);

});

Instascan.Camera.getCameras().then(function(cameras){

    if (cameras.length > 0) {
        scanner.start(cameras[0]);
    }else{
        console.error('Camera tidak ditemukan');
    }

}).catch(function (e){
    console.error(e);
});
</script>
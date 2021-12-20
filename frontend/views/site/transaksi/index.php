<?php

use yii\helpers\Url;

$this->title = 'Transaksi';

$this->registerJs("
  $(document).ready(function(){
    _getData();
  });

  function _getData()
  {
    $.ajax({
        type     : 'POST',
        url      : '".Url::base(true)."/api/get-keranjang',
        dataType : 'JSON',
        data     : {
          'nomor' : ".$nomor."
        },
        success: function(res){
          let html  = '';
          let array = [];
          res.data.map((item, index) => {
          let gambar_f = '/tokoku/uploads/backend/produk/'+item.gambar;
          array.push('<div class=".'"container-keranjang row"'.">'
              +'<div class=".'"row row-keranjang"'.">'
                +'<img width=".'"100"'." src="."'+gambar_f+'".">'
                +'<div class=".'"list-keranjang"'.">'
                  +'<p>'+item.nama_produk+'</p>'
                  +'<p>'+item.harga_f+'</p>'
                  +'<p>Qty '+item.qty+'</p>'
                +'</div>'
              +'</div>'
              +'<div class=".'"list-keranjang right-keranjang"'.">'
              +'</div>'
            +'</div>');
          })
          array = array.join('');
          html  = array.toString();
          $('#list-transaksi').html(html);
          return true;
        },
        error: function(e){
          alert('ERROR at PHP side!!');
          return false;
        }
    });
  }
");
?>
<div class="container">
  <!-- produk -->
  <div id="list-transaksi"></div>
  <!-- end produk -->
  <!-- pembayaran -->
  <div class="container-keranjang" style="column-count: 2">
    <div class="row-keranjang">
      <p>Metode Pembayaran</p>
    </div>
    <div class="list-keranjang" style="text-align: end; padding: 0px 15px 0px 0px">
      <a href="javascript:void(0)">Pilih</a>
    </div>
  </div>
  <!-- end pembayaran -->
  <!-- vaucher -->
  <div class="container-keranjang" style="column-count: 2">
    <div class="row-keranjang">
      <p>Vaucher</p>
    </div>
    <div class="list-keranjang" style="text-align: end; padding: 0px 15px 0px 0px">
      <a href="javascript:void(0)">Pilih</a>
    </div>
  </div>
  <!-- end vaucher -->
  <!-- total -->
  <div class="container-keranjang">
    <div class="" style="column-count: 2">
      <div class="row-keranjang">
        <p>Harga</p>
      </div>
      <div class="list-keranjang" style="text-align: end; padding: 0px 15px 0px 0px">
        <a>Rp 90.000</a>
      </div>
    </div>
    <div class="" style="column-count: 2">
      <div class="row-keranjang">
        <p>Biaya Admin</p>
      </div>
      <div class="list-keranjang" style="text-align: end; padding: 0px 15px 0px 0px">
        <a>-</a>
      </div>
    </div>
    <div class="" style="column-count: 2">
      <div class="row-keranjang">
        <p>Kode Unik</p>
      </div>
      <div class="list-keranjang" style="text-align: end; padding: 0px 15px 0px 0px">
        <a>Rp 898</a>
      </div>
    </div>
    <div class="" style="column-count: 2">
      <div class="row-keranjang">
        <p>Ongkir</p>
      </div>
      <div class="list-keranjang" style="text-align: end; padding: 0px 15px 0px 0px">
        <a>Rp 10.000</a>
      </div>
    </div>
    <div class="" style="column-count: 2">
      <div class="row-keranjang">
        <p>Total Harga</p>
      </div>
      <div class="list-keranjang" style="text-align: end; padding: 0px 15px 0px 0px">
        <a>Rp 100.898</a>
      </div>
    </div>
  </div>
  <div class="" style="text-align: end; margin: 5px 0px 0px 0px">
    <button class="btn btn-success" type="button" name="button">Pesan</button>
  </div>
  <!-- end total -->
</div>

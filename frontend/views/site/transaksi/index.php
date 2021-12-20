<?php

use yii\helpers\Url;
use yii\bootstrap4\Modal;

$this->title = 'Transaksi';

$this->registerJs("
  $(document).ready(function(){
    _getData();
  });

  function _getData()
  {
    $.ajax({
        type     : 'POST',
        url      : '".Url::base(true)."/api/get-transaksi',
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
          html  = '';
          array = [];
          html = '<div class=".'"row-keranjang"'.">'
                  +'<p>'+((res.data[0].pembayaran) ? res.data[0].pembayaran : ".'"Metode Pembayaran"'.")+'</p>'
                 +'</div>'
                 +'<div class=".'"list-keranjang"'." style=".'"text-align: end; padding: 0px 15px 0px 0px"'.">'
                  +'<button class=".'"btn btn-sm btn-info showModalButton"'." value=".Url::to(['pembayaran?nomor='.$nomor]).">Pilih</button>'
                 +'</div>'
          $('#metode-pembayaran').html(html);

          html  = '';
          array = [];
          for (i=0; i < 5 ; i++) {
            if (i == 0) {
                array.push('<div style=".'"column-count: 2"'.">'
                  +'<div class=".'"row-keranjang"'.">'
                    +'<p>Harga</p>'
                  +'</div>'
                  +'<div class=".'"list-keranjang"'." style=".'"text-align: end; padding: 0px 15px 0px 0px"'.">'
                    +'<a>'+res.rincian_f.harga_f+'</a>'
                  +'</div>'
                +'</div>');
            }
            if (i == 1) {
                array.push('<div style=".'"column-count: 2"'.">'
                  +'<div class=".'"row-keranjang"'.">'
                    +'<p>Biaya Admin</p>'
                  +'</div>'
                  +'<div class=".'"list-keranjang"'." style=".'"text-align: end; padding: 0px 15px 0px 0px"'.">'
                    +'<a>'+res.rincian_f.biaya_admin_f+'</a>'
                  +'</div>'
                +'</div>');
            }
            if (i == 2) {
                array.push('<div style=".'"column-count: 2"'.">'
                  +'<div class=".'"row-keranjang"'.">'
                    +'<p>Kode Unik</p>'
                  +'</div>'
                  +'<div class=".'"list-keranjang"'." style=".'"text-align: end; padding: 0px 15px 0px 0px"'.">'
                    +'<a>'+res.rincian_f.kode_unik_f+'</a>'
                  +'</div>'
                +'</div>');
            }
            if (i == 3) {
                array.push('<div style=".'"column-count: 2"'.">'
                  +'<div class=".'"row-keranjang"'.">'
                    +'<p>Ongkir</p>'
                  +'</div>'
                  +'<div class=".'"list-keranjang"'." style=".'"text-align: end; padding: 0px 15px 0px 0px"'.">'
                    +'<a>'+res.rincian_f.onkir_f+'</a>'
                  +'</div>'
                +'</div>');
            }
            if (i == 4) {
              array.push('<div style=".'"column-count: 2"'.">'
                +'<div class=".'"row-keranjang"'.">'
                  +'<p>Total Harga</p>'
                +'</div>'
                +'<div class=".'"list-keranjang"'." style=".'"text-align: end; padding: 0px 15px 0px 0px"'.">'
                  +'<a>'+res.rincian_f.total_f+'</a>'
                +'</div>'
              +'</div>');
            }
          }
          array = array.join('');
          html  = array.toString();
          $('#list-total').html(html);
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
  <div class="container-keranjang" style="column-count: 2" id="metode-pembayaran"></div>
  <!-- end pembayaran -->
  <!-- Voucher -->
  <!-- <div class="container-keranjang" style="column-count: 2">
    <div class="row-keranjang">
      <p>Voucher</p>
    </div>
    <div class="list-keranjang" style="text-align: end; padding: 0px 15px 0px 0px">
      <a href="javascript:void(0)">Pilih</a>
    </div>
  </div> -->
  <!-- end Voucher -->
  <!-- total -->
  <div class="container-keranjang" id="list-total"></div>
  <!-- end total -->
  <div class="" style="text-align: end; margin: 5px 0px 0px 0px">
    <button class="btn btn-success" type="button" name="button">Pesan</button>
  </div>
</div>


<?php
  Modal::begin([
    'id'=>'modal',
    'size'=>'modal-md',
  ]);

  echo "<div id='modalContent'></div>";

  Modal::end();
?>

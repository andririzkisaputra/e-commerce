<?php

/* @var $this yii\web\View */

$this->title = 'Pesanan';

$this->registerJs("

  $(document).ready(function() {
    _getData();
  });

  function _getData() {
  }

");
?>
<div class="container">
  <div class="container-keranjang justify-content" style="">
    <div class="">
      <b>Nomor Transaksi</b>
    </div>
    <div class="right-keranjang text-align-end" style="">
      <b class="">Status Pesanan</b>
    </div>
  </div>
  <div class="container-pesanan row" style="">
    <div class="" style="width: 320px;">
      <img width="300" src="https://asset.kompas.com/crops/riPGK5eD7amHKtv3dFNqioI6IqI=/13x7:700x465/780x390/data/photo/2021/09/24/614dc6865eb24.jpg">
    </div>
    <div class="" style="">
      <div class="" style="">
        <b class="">Nama Produk</b>
        <p class="">Harga Produk</p>
        <p class="">Qty</p>
      </div>
      <div class="" style="">
        <input class="" type="submit" value="Detail" />
      </div>
    </div>
  </div>
</div>

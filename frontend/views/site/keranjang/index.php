<?php

use yii\helpers\Url;

$this->title = 'Keranjang';

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
        success: function(res){
          let html  = '';
          let array = [];
          res.data.map((item, index) => {
          array.push('<div class=".'"container-keranjang row"'.">'
              +'<div class=".'"row row-keranjang"'.">'
                +'<img width=".'"100"'." src=".'"'.Url::base(true).'/images/p1.png"'.">'
                +'<div class=".'"list-keranjang"'.">'
                  +'<p>'+item.nama_produk+'</p>'
                  +'<p>'+item.harga_f+'</p>'
                  +'<p>'+item.qty+'</p>'
                +'</div>'
              +'</div>'
              +'<div class=".'"list-keranjang right-keranjang"'.">'
                +'<a href=".'"javascript:void(0)"'." id=".'"delete-keranjang"'." data='+item.keranjang_id+'>'
                  +'<i class=".'"btn btn-default fa fa-trash-o"'." aria-hidden=".'"true"'."></i>'
                +'</a>'
                +'<div class=".'"btn-box"'.">'
                  +'<a href=".'"javascript:void(0)"'." id=".'"beli"'." data='+item.keranjang_id+'>Beli</a>'
                +'</div>'
              +'</div>'
            +'</div>');
          })
          array = array.join('');
          html  = array.toString();
          $('#list-keranjang').html(html);
          return true;
        },
        error: function(e){
          alert('ERROR at PHP side!!');
          return false;
        }
    });
  }

  $(document).on('click', '#delete-keranjang', function() {
    var keranjang_id = $(this).attr('data');
    if (keranjang_id) {
      $.ajax({
          type     : 'POST',
          url      : '".Url::base(true)."/api/delete-keranjang',
          dataType : 'JSON',
          data     : {
            keranjang_id : keranjang_id
          },
          success: function(data){
            _getData();
            return true;
          },
          error: function(){
            alert('ERROR at PHP side!!');
            return false;
          }
      });
    } else {
      return false;
    }
  });

  $(document).on('click', '#beli', function() {
    var keranjang_id = $(this).attr('data');
    console.log(keranjang_id);
    location.href = ".'"'.Url::base(true).'/site/transaksi?nomor="+keranjang_id'.";
    // if (keranjang_id) {
    //   $.ajax({
    //       type     : 'POST',
    //       url      : '".Url::base(true)."/api/pre-pesan',
    //       dataType : 'JSON',
    //       data     : {
    //         keranjang_id : keranjang_id
    //       },
    //       success: function(data){
    //         // _getData();
    //         return true;
    //       },
    //       error: function(){
    //         alert('ERROR at PHP side!!');
    //         return false;
    //       }
    //   });
    // } else {
    //   return false;
    // }
  });

");
?>
<div class="container">
  <div id="list-keranjang">

  </div>
</div>

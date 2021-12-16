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
        }
        success: function(res){
          console.log(res)
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
<div class="">

</div>

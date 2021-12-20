<?php

namespace frontend\controllers;

use Yii;
use common\models\Api;
use app\models\Keranjang;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Site controller
 */
class ApiController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionRekomendasiProduk()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			$searchValue     = '';
      // $where_like 		 = array(
			// 	'produk.nama_produk'   => $searchValue,
			// 	'produk.nama_kategori' => $searchValue,
			// );
      $where      = ['=', 'produk.is_delete' , '1'];
      $modelApi = new Api();
			$query		= $modelApi->get_join_tabel($where, false, 9, 0, 'produk.updated_at', 'produk', 'kategori', 'kategori.kategori_id = produk.kategori_id');
			foreach ($query as $key => $value) {
				$query[$key]['no']	      = $key+1;
				$query[$key]['harga_f']	  = "Rp ".number_format($value['harga'],0,',','.');
        $query[$key]['keranjang'] = $modelApi->get_tabel_by('keranjang', ['produk_id' => $value['produk_id'], 'is_selected' => '0', 'created_by' => Yii::$app->user->identity->id]);
			}

      $result['data'] = $query;
      return $result;
    }

    /**
     * Select Keranjang action.
     *
     * @return string|Response
     */
    public function actionSelectKeranjang()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $modelApi = new Api();
      $model    = new Keranjang();
      $query = $modelApi->get_tabel_by('produk', ['produk_id' => $_POST['produk_id']]);
      $data  = $modelApi->simpan_keranjang($model, $query);
      $result['data'] = $data;
      return $result;
    }

    /**
     * Keranjang action.
     *
     * @return string|Response
     */
    public function actionKeranjang()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $modelApi = new Api();
      $model    = new Keranjang();
      $queryKeranjang	= $modelApi->get_tabel_by('keranjang', ['keranjang_id' => $_POST['keranjang_id']]);
      $query = $modelApi->get_tabel_by('produk', ['produk_id' => $queryKeranjang['produk_id']]);
      $data  = $modelApi->update_keranjang($queryKeranjang, $query, $_POST['is_keranjang']);

      $result['data'] = $data;
      return $result;
    }

    /**
     * Keranjang action.
     *
     * @return string|Response
     */
    public function actionGetKeranjang()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $modelApi = new Api();
      $query = $modelApi->get_join_tabel(
        [
          'keranjang.created_by' => Yii::$app->user->identity->id,
          'is_selected'          => '0'
        ],
        false, false, false, 'keranjang.created_at', 'keranjang', 'produk', 'keranjang.produk_id = produk.produk_id',
        'keranjang.*, produk.nama_produk, produk.gambar'
      );

      foreach ($query as $key => $value) {
				$query[$key]['harga_f']	  = "Rp ".number_format($value['harga'],0,',','.');
				// $query[$key]['gambar_f']  = Url::base().'/backend/web/uploads/'.$value['gambar'];
			}
      $result['data'] = $query;
      return $result;
    }
    /**
     * Keranjang action.
     *
     * @return string|Response
     */
    public function actionGetTransaksi()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $modelApi = new Api();
      $query = $modelApi->get_join_tabel(
        [
          'keranjang.created_by' => Yii::$app->user->identity->id,
          'is_selected'          => '0',
          'keranjang_id'         => $_POST['nomor']
        ],
        false, false, false, 'keranjang.created_at', 'keranjang', 'produk', 'keranjang.produk_id = produk.produk_id',
        'keranjang.*, produk.nama_produk, produk.gambar'
      );

      foreach ($query as $key => $value) {
				$query[$key]['harga_f']	  = "Rp ".number_format($value['harga'],0,',','.');
				// $query[$key]['gambar_f']  = Url::base().'/backend/web/uploads/'.$value['gambar'];
			}
      $result['data'] = $query;
      return $result;
    }

    /**
     * Keranjang action.
     *
     * @return string|Response
     */
    public function actionDeleteKeranjang()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $modelApi = new Api();
      $query = $modelApi->delete_keranjang($_POST['keranjang_id']);

      $result['data'] = $query;
      return $result;
    }

    /**
     * Prepesan action.
     *
     * @return string|Response
     */
    public function actionPrePesan()
    {
      // \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      // $modelApi = new Api();
      // $query = $modelApi->delete_keranjang($_POST['keranjang_id']);

      $result['data'] = true;
      return $result;
    }

}

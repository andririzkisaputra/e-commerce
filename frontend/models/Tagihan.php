<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tagihan".
 *
 * @property int $tagihan_id
 * @property int|null $transaksi_id
 * @property string|null $kode_tagihan
 * @property string|null $status_tagihan 1. menunggu pembayaran  2. menunggu konfirmasi pembayaran  3. dibayar  4. batal  5. gagal	
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $upadate_at
 */
class Tagihan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tagihan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['transaksi_id', 'created_by', 'created_at', 'upadate_at'], 'integer'],
            [['status_tagihan'], 'string'],
            [['kode_tagihan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tagihan_id' => 'Tagihan ID',
            'transaksi_id' => 'Transaksi ID',
            'kode_tagihan' => 'Kode Tagihan',
            'status_tagihan' => 'Status Tagihan',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'upadate_at' => 'Upadate At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TagihanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TagihanQuery(get_called_class());
    }
}

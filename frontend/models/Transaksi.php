<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi".
 *
 * @property int $transaksi_id
 * @property string|null $kode_transaksi
 * @property string|null $status_transaksi 1. menunggu pembayaran 2. menunggu konfirmasi pembayaran 3. dibayar 4. batal 5. gagal 6. dikirim 7. selesai
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $upadate_at
 */
class Transaksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_transaksi'], 'string'],
            [['created_by', 'created_at', 'upadate_at'], 'integer'],
            [['kode_transaksi'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'transaksi_id' => 'Transaksi ID',
            'kode_transaksi' => 'Kode Transaksi',
            'status_transaksi' => 'Status Transaksi',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'upadate_at' => 'Upadate At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TransaksiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransaksiQuery(get_called_class());
    }
}

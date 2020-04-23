<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $order_no
 * @property string $country
 * @property string $ship_city
 * @property string $ship_address
 * @property string $company_agent
 * @property string $company_name
 * @property string $ship-date
 * @property int $status
 * @property int $type
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'order_no', 'country', 'ship_city', 'ship_address', 'company_agent', 'company_name', 'ship_date', 'status', 'type'], 'required'],
            [['id', 'status', 'type'], 'integer'],
            [['ship_date'], 'safe'],
            [['order_no', 'country', 'ship_city', 'company_agent', 'company_name'], 'string', 'max' => 100],
            [['ship_address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_no' => 'Order No',
            'country' => 'Country',
            'ship_city' => 'Ship City',
            'ship_address' => 'Ship Address',
            'company_agent' => 'Company Agent',
            'company_name' => 'Company Name',
            'ship-date' => 'Ship Date',
            'status' => 'Status',
            'type' => 'Type',
        ];
    }
}

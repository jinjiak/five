<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $order_id
 * @property integer $user_id
 * @property string $order_no
 * @property integer $pay_type
 * @property integer $status
 * @property integer $pay_status
 * @property string $accept_name
 * @property string $telphone
 * @property integer $province
 * @property integer $city
 * @property integer $area
 * @property string $address
 * @property string $payable_amount
 * @property string $payable_freight
 * @property string $pay_time
 * @property string $send_time
 * @property string $create_time
 * @property string $completion_time
 * @property string $accept_time
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'pay_type', 'status', 'pay_status', 'province', 'city', 'area'], 'integer'],
            [['payable_amount', 'payable_freight'], 'number'],
            [['pay_time', 'send_time', 'create_time', 'completion_time', 'accept_time'], 'safe'],
            [['order_no', 'accept_name', 'telphone'], 'string', 'max' => 20],
            [['address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'user_id' => 'User ID',
            'order_no' => 'Order No',
            'pay_type' => 'Pay Type',
            'status' => 'Status',
            'pay_status' => 'Pay Status',
            'accept_name' => 'Accept Name',
            'telphone' => 'Telphone',
            'province' => 'Province',
            'city' => 'City',
            'area' => 'Area',
            'address' => 'Address',
            'payable_amount' => 'Payable Amount',
            'payable_freight' => 'Payable Freight',
            'pay_time' => 'Pay Time',
            'send_time' => 'Send Time',
            'create_time' => 'Create Time',
            'completion_time' => 'Completion Time',
            'accept_time' => 'Accept Time',
        ];
    }
}

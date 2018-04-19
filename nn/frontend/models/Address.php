<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property integer $address_id
 * @property integer $user_id
 * @property string $accept_name
 * @property string $tel
 * @property integer $province
 * @property integer $city
 * @property integer $area
 * @property string $address_name
 * @property integer $is_default
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'province', 'city', 'area', 'is_default'], 'integer'],
            [['accept_name'], 'string', 'max' => 30],
            [['tel'], 'string', 'max' => 20],
            [['address_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'address_id' => 'Address ID',
            'user_id' => 'User ID',
            'accept_name' => 'Accept Name',
            'tel' => 'Tel',
            'province' => 'Province',
            'city' => 'City',
            'area' => 'Area',
            'address_name' => 'Address Name',
            'is_default' => 'Is Default',
        ];
    }
}

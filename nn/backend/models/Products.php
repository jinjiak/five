<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $products_id
 * @property string $products_no
 * @property integer $goods_id
 * @property string $spec_array
 * @property integer $store_nums
 * @property string $sell_price
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_id', 'store_nums'], 'integer'],
            [['sell_price'], 'number'],
            [['products_no'], 'string', 'max' => 20],
            [['spec_array'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'products_id' => 'Products ID',
            'products_no' => 'Products No',
            'goods_id' => 'Goods ID',
            'spec_array' => 'Spec Array',
            'store_nums' => 'Store Nums',
            'sell_price' => 'Sell Price',
        ];
    }
}

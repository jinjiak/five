<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property integer $goods_id
 * @property integer $category_id
 * @property string $goods_name
 * @property string $goods_no
 * @property string $sell_price
 * @property string $market_price
 * @property string $cost_price
 * @property string $create_time
 * @property integer $store_nums
 * @property string $ablum_path
 * @property integer $is_status
 * @property string $content
 * @property integer $brand_id
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'store_nums', 'is_status', 'brand_id'], 'integer'],
            [['sell_price', 'market_price', 'cost_price'], 'number'],
            [['create_time'], 'safe'],
            [['content'], 'string'],
            [['goods_name', 'goods_no'], 'string', 'max' => 50],
            [['ablum_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'goods_id' => 'Goods ID',
            'category_id' => 'Category ID',
            'goods_name' => 'Goods Name',
            'goods_no' => 'Goods No',
            'sell_price' => 'Sell Price',
            'market_price' => 'Market Price',
            'cost_price' => 'Cost Price',
            'create_time' => 'Create Time',
            'store_nums' => 'Store Nums',
            'ablum_path' => 'Ablum Path',
            'is_status' => 'Is Status',
            'content' => 'Content',
            'brand_id' => 'Brand ID',
        ];
    }
}

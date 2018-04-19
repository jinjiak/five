<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "goods_attribute".
 *
 * @property integer $goods_attribute_id
 * @property integer $attribute_id
 * @property string $attribute_values
 */
class GoodsAttribute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods_attribute';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attribute_id'], 'integer'],
            [['attribute_values'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'goods_attribute_id' => 'Goods Attribute ID',
            'attribute_id' => 'Attribute ID',
            'attribute_values' => 'Attribute Values',
        ];
    }
}

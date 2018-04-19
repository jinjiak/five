<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "attribute".
 *
 * @property integer $attribute_id
 * @property integer $type_id
 * @property string $attribute_name
 * @property integer $attribute_type
 */
class Attribute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attribute';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id', 'attribute_type'], 'integer'],
            [['attribute_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'attribute_id' => 'Attribute ID',
            'type_id' => 'Type ID',
            'attribute_name' => 'Attribute Name',
            'attribute_type' => 'Attribute Type',
        ];
    }
}

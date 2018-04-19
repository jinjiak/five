<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ablum".
 *
 * @property integer $ablum_id
 * @property string $ablum_img
 */
class Ablum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ablum';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ablum_img'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ablum_id' => 'Ablum ID',
            'ablum_img' => 'Ablum Img',
        ];
    }
}

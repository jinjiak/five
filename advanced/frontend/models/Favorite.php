<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "favorite".
 *
 * @property integer $favorite_id
 * @property integer $user_id
 * @property integer $goods_id
 * @property string $time
 */
class Favorite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'favorite';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'goods_id'], 'integer'],
            [['time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'favorite_id' => 'Favorite ID',
            'user_id' => 'User ID',
            'goods_id' => 'Goods ID',
            'time' => 'Time',
        ];
    }
}

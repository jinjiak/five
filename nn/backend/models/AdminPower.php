<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "admin_power".
 *
 * @property integer $id
 * @property integer $admin_id
 * @property integer $power_id
 */
class AdminPower extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin_power';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_id', 'power_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'admin_id' => 'Admin ID',
            'power_id' => 'Power ID',
        ];
    }
}

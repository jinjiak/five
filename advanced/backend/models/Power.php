<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "power".
 *
 * @property integer $power_id
 * @property string $power_name
 * @property string $controller
 * @property string $action
 */
class Power extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'power';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['power_name', 'controller', 'action'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'power_id' => 'Power ID',
            'power_name' => 'Power Name',
            'controller' => 'Controller',
            'action' => 'Action',
        ];
    }
}

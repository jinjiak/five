<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "userinfo".
 *
 * @property integer $user_id
 * @property string $info_name
 * @property integer $info_sex
 * @property string $info_year
 * @property string $info_month
 * @property string $info_day
 */
class Userinfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userinfo';
    }
    public function getUserinfo() {
        return $this->hasOne(userinfo::className(),['user_id' => 'user_id']);
    } 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['info_sex'], 'integer'],
            [['info_name'], 'string', 'max' => 30],
            [['info_year', 'info_month', 'info_day'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'info_name' => 'Info Name',
            'info_sex' => 'Info Sex',
            'info_year' => 'Info Year',
            'info_month' => 'Info Month',
            'info_day' => 'Info Day',
        ];
    }
}

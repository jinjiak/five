<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "userinfo".
 *
 * @property integer $info_id
 * @property string $info_name
 * @property integer $info_sex
 * @property string $info_year
 * @property string $info_month
 * @property string $info_day
 * @property string $info_tel
 * @property string $info_email
 * @property integer $user_id
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
    public function getuserinfo() {
        return $this->hasOne(Userinfo::className(),['user_id' => 'user_id']);
    } 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['info_sex', 'user_id'], 'integer'],
            [['info_year', 'info_month', 'info_day'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'info_id' => 'Info ID',
            'info_name' => 'Info Name',
            'info_sex' => 'Info Sex',
            'info_year' => 'Info Year',
            'info_month' => 'Info Month',
            'info_day' => 'Info Day',
            'user_id' => 'User ID',
        ];
    }
}

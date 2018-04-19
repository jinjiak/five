<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $user_id
 * @property string $user_name
 * @property string $user_pwd
 * @property string $head_ico
 * @property integer $user_status
 * @property string $user_tel
 * @property string $user_email
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
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
            [['user_status'], 'integer'],
            [['user_name'], 'string', 'max' => 20],
            [['user_pwd'], 'string', 'max' => 32],
            [['head_ico'], 'string', 'max' => 255],
            [['user_tel'], 'string', 'max' => 11],
            [['user_email'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_name' => 'User Name',
            'user_pwd' => 'User Pwd',
            'head_ico' => 'Head Ico',
            'user_status' => 'User Status',
            'user_tel' => 'User Tel',
            'user_email' => 'User Email',
        ];
    }
}

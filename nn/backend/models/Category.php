<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $category_id
 * @property string $category_name
 * @property integer $parent_id
 * @property integer $sort
 * @property integer $is_show
 * @property string $path
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'sort', 'is_show'], 'integer'],
            [['category_name'], 'string', 'max' => 50],
            [['path'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'category_name' => 'Category Name',
            'parent_id' => 'Parent ID',
            'sort' => 'Sort',
            'is_show' => 'Is Show',
            'path' => 'Path',
        ];
    }
}

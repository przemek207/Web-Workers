<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mo".
 *
 * @property integer $id
 * @property string $name
 * @property string $course
 */
class Mo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'course'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['course'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'course' => 'Course',
        ];
    }

    /**
     * @inheritdoc
     * @return MoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MoQuery(get_called_class());
    }
}

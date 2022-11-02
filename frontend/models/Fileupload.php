<?php

namespace app\models;

use Yii;


class Fileupload extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'upload_details';
    }


    public function rules()
    {
        return [
            [['description', 'file_name'], 'required'],
            [['created_by'], 'safe'],
            [['description'], 'filter', 'filter' => 'ucfirst'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'file_name' => 'File',
        ];
    }
}

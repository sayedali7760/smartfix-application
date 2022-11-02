<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fileupload;

class FileuploadSearch extends Fileupload
{

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['description', 'file_name'], 'safe'],
        ];
    }
    public function scenarios()
    {
        return Model::scenarios();
    }
    public function search($params)
    {
        $query = Fileupload::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'created_by' => Yii::$app->user->identity->id,
        ]);
        // $query->andFilterWhere(['like', 'description', $this->description]);
        $query->OrderBy('id DESC');
        return $dataProvider;
    }
}

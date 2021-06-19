<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\db\Categories;

class CategoriesSearch extends Categories
{
    public function rules()
    {
        return [
            [['title'], 'string'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Categories::find()->from($this->tableName().'t');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> [
                'defaultOrder' => ['position' => SORT_ASC,]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            't.id' => $this->id,
        ]);

        return $dataProvider;
    }
}
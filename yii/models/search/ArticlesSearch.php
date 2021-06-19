<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\db\Articles;
use yii\db\Expression;

class ArticlesSearch extends Articles
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'text', 'photo'], 'safe'],
        ];

    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Articles::find()
        ->orderBy(['published_at' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'defaultPageSize' => 20
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'published' => 1,
        ]);

        return $dataProvider;
    }
}
<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\db\Articles;

/**
 * BlogArticlesSearch represents the model behind the search form of `app\models\db\BlogArticles`.
 */
class ArticlesSearch extends Articles
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_id', 'main', 'favourite'], 'integer'],/* 'id', 'published_at', 'updated_at', 'created_at', 'publish_at', */
            [['published', 'title', 'slug', 'subtitle', 'text', 'meta_title', 'meta_description', 'meta_keywords'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Articles::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'author_id' => $this->author_id,/* 
            'published_at' => $this->published_at,
            'publish_at' => $this->publish_at,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at, */
        ]);

        $query->andFilterWhere(['like', 'published', $this->published])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'main', $this->main])
            ->andFilterWhere(['like', 'favourite', $this->favourite])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'meta_title', $this->meta_title])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'meta_keywords', $this->meta_keywords]);

        return $dataProvider;
    }
}

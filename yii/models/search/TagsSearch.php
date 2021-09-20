<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\db\Tags;
use app\models\db\Articles;

class TagsSearch extends Tags
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
        $query = Tags::find()->from($this->tableName().'t');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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

    public function articlesSearch($params)
    {

        $query = new Articles();

        $query->select(['id, title, published, main, favourite, author_id, updated_at, published_at']);
        $query->from(['articles', 'article_tags']);
        $query->join('LEFT JOIN', 'article_tags', 'articles.id = article_tags.article_id');
        $query->join('LEFT JOIN', 'tags', 'tags.id = article_tags.tag_id');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'meta_title', $this->meta_title])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'meta_keywords', $this->meta_keywords]);

        return $dataProvider;
    }
}
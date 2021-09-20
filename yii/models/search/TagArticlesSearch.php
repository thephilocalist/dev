<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\db\Tags;
use app\models\db\Articles;
use app\models\db\ArticleCategories;

class TagArticlesSearch extends Articles
{
    public function rules()
    {
        return [
            [['title'], 'string'],
            [['author_id', 'main', 'favourite'], 'integer'],
            [['published', 'title', 'slug', 'subtitle', 'text', 'meta_title', 'meta_description', 'meta_keywords'], 'safe'],
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

        $query = Articles::findCategoryArticles();

        $query->select(['*']);
        $query->from(['articles']);
        $query->join('LEFT JOIN', 'article_tags', 'articles.id = article_tags.article_id');
        $query->join('LEFT JOIN', 'tags', 'tags.id = article_tags.tag_id');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'author_id' => $this->author_id,
        ]);

        $query->andFilterWhere(['like', 'published', $this->published])/* 
            ->andFilterWhere(['like', 'title', $this->title]) */
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'meta_title', $this->meta_title])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'meta_keywords', $this->meta_keywords]);

        return $dataProvider;
    }
}
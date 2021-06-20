<?php

namespace app\models\db;

/**
 * This is the ActiveQuery class for [[ArticlesCategories]].
 *
 * @see ArticlesCategories
 */
class ArticleCategoriesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ArticlesCategories[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ArticlesCategories|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
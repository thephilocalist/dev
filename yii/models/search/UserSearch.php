<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\db\User;

class UserSearch extends User
{
    public function rules()
    {
        return [
            [['username', 'password', 'authKey', 'forgotToken',], 'string'],
            [['created_at', 'updated_at', 'enable', 'role',], 'integer'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = User::find()->from($this->tableName().'t');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        return $dataProvider;
    }
}
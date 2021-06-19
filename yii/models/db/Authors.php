<?php 

namespace app\models\db;

use Yii;
use yii\helpers\BaseHtml;

/**
 * This is the model class for table "{{%authors}}"
 * 
 * @property $id
 * @property $name
 * @property $bio
 * @property $meta_title
 * @property $meta_description
 * @property $meta_keywords
 * @property $photo
 * @property string $facebook
 * @property string $twitter
 * @property string $linkedin
 * @property string $google
 * @property string $instagram
 * @property string $pinterest
 * 
 * @property Articles[] $Articles
 * 
 */

 class Authors extends \yii\db\ActiveRecord
 {
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%authors}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'bio', 'meta_title', 'meta_description', 'meta_keywords', 'photo'], 'string'],
            [['id'], 'integer'],
            ['facebook', 'url', 'defaultScheme' => 'https'],
            ['twitter', 'url', 'defaultScheme' => 'https'],
            ['linkedin', 'url', 'defaultScheme' => 'https'],
            ['google', 'url', 'defaultScheme' => 'https'],
            ['instagram', 'url', 'defaultScheme' => 'https'],
            ['pinterest', 'url', 'defaultScheme' => 'https'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'bio' => Yii::t('app', 'Bio'),
            'photo' => Yii::t('app', 'Photo'),
            'facebook' => Yii::t('app', 'Facebook'),
            'twitter' => Yii::t('app', 'Twitter'),
            'linkedin' => Yii::t('app', 'Linkedin'),
            'google' => Yii::t('app', 'Google'),
            'instagram' => Yii::t('app', 'Instagram'),
            'pinterest' => Yii::t('app', 'Pinterest'),
        ];
    }

 }
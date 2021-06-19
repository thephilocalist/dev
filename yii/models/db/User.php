<?php

namespace app\models\db;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $enable
 * @property int $role
 * @property string $authKey
 * @property string $forgotToken
 * @property int $created_at
 * @property int $updated_at
 * @property Architect[] $architects
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['username'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 100],
            [['enable', 'role'], 'integer'],
            [['authKey', 'forgotToken'], 'string', 'max' => 30],
            [['username'], 'unique'],
        ];
    }

    public function behaviors()
    {
        return [
          TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'enable' => Yii::t('app', 'Enable'),
            'role' => Yii::t('app', 'Role'),
            'authKey' => Yii::t('app', 'Auth Key'),
            'forgotToken' => Yii::t('app', 'Forgot Token'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    /**
     * {@inheritdoc}
     *
     * @return UserQuery the active query used by this AR class
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }

    public static function findIdentity($id)
    {
        return self::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['authKey' => $token]);
    }

    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        $hash = Yii::$app->getSecurity()->generatePasswordHash($password);
        
        if (\Yii::$app->getSecurity()->validatePassword($password, $hash)) {
            return true;
        }

        return false;
    }

    public function generateAccessToken()
    {
        $tokenArray = [
            'id' => $this->id,
            'username' => $this->username,
          ];
        $this->accessToken = CJSON::encode($tokenArray);
    }

    public function beforeSave($record)
    {
        if (parent::beforeSave($record)) {
            if ($this->isNewRecord) {
                $this->role = 0;
                $this->password = \Yii::$app->security->generatePasswordHash($this->password);
                $this->authKey = \Yii::$app->security->generateRandomString(30);
                $this->enable = 1;
            }

            $this->forgotToken = \Yii::$app->security->generateRandomString(30);

            if ($this->isAttributeChanged('password', false)) {
                $this->password = \Yii::$app->security->generatePasswordHash($this->password);
            }

            return true;
        }

        return false;
    }
}

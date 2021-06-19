<?php

namespace app\controllers\xthehiddenphiloclstadminurlx;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\db\Welcome;
use app\models\upload\WelcomePhotoUpload;
use yii\web\UploadedFile;

class WelcomeController extends Controller
{
    public $layout = '@app/views/layouts/admin.php';

    public function behaviors()
    {
        return [
          'access' => [
            'class' => AccessControl::className(),
            'only' => ['logout'],
            'rules' => [
                [
                    'actions' => ['logout'],
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
            'denyCallback' => function () {
                $this->redirect(['Xthehiddenphiloclstadminurlx/login']);
            },
          ],
          'verbs' => [
            'class' => VerbFilter::className(),
            'actions' => [],
          ],
        ];
    }

    public function beforeAction($action)
    {
        if (Yii::$app->user->identity == NULL) {
            $this->layout = 'content';
            return $this->redirect('/Xthehiddenphiloclstadminurlx/login');
        }
        return $action;        
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $model =  Welcome::find()->one();
        
        return $this->render('/admin/welcome/index', [
            'model' => $model,
        ]);
    }

    public function actionUpdate()
    {
        if (Yii:: $app->request->post()) {
            $model = Welcome::findOne('1');
            $model->title = Yii::$app->request->post('Welcome')['title'];
            $model->meta_title = Yii::$app->request->post('Welcome')['meta_title'];
            $model->meta_description = Yii::$app->request->post('Welcome')['meta_description'];
            $model->meta_keywords = Yii::$app->request->post('Welcome')['meta_keywords'];
            $model->text = Yii::$app->request->post('Welcome')['text'];

            if ($model->save()) {
                return $this->redirect(['update', 'id' => $model->id]);
            }
        }

        if (Yii::$app->request->get('redirect')) {
            $model =  Welcome::find()->one();

            return $this->render('/admin/welcome/update', ['model' => $model] );
        } else {
            $model =  Welcome::find()->one();
            
            return $this->render('/admin/welcome/update', ['model' => $model] );
        }
    }

    public function actionPhoto($id)
    {
        $model =  Welcome::find()->where(['id' => $id])->one();

        return $this->render('/admin/welcome/photo', [
            'model' => $model,
            ]);
    }

    public function actionUploadPhoto($id)
    {
        $model =  Welcome::find()->where(['id' => $id])->one();
        $photo = new WelcomePhotoUpload();
        $photo->imageFile = UploadedFile::getInstanceByName('imageFile');
        $photo->photo = \Yii::$app->security->generateRandomString();

        if ($photo->upload($id)) {

            $model->photo = $photo->photo;

            if ($model->save()) {     

                $this->redirect(['photo', 'id' => $id]);

            } else {

                return false;
            }

        } else {
            return ["error" => $photo->getErrors('imageFile')];
        }
    }
}
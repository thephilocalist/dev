<?php

namespace app\controllers\xthehiddenphiloclstadminurlx;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\db\About;
use app\models\upload\AboutPhotosUpload;
use PhpOffice\PhpSpreadsheet\Calculation\Financial\Securities\Price;

class AboutController extends Controller
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
        $model = About::findOne('1');
        
        return $this->render('/admin/about/index', [
            'model' => $model,
        ]);
    }

    public function actionUpdate()
    {
        if (Yii:: $app->request->post()) {
            $model = About::findOne('1');
            $model->title = Yii::$app->request->post('About')['title'];
            $model->meta_title = Yii::$app->request->post('About')['meta_title'];
            $model->meta_description = Yii::$app->request->post('About')['meta_description'];
            $model->meta_keywords = Yii::$app->request->post('About')['meta_keywords'];
            $model->text = Yii::$app->request->post('About')['text'];

            if ($model->save()) {
                return $this->redirect(['update', 'id' => $model->id]);
            }
        }

        if (Yii::$app->request->get('redirect')) {
            $model = About::findOne('1');

            return $this->render('/admin/about/update', ['model' => $model] );
        } else {

            $model = About::findOne('1');
            
            return $this->render('/admin/about/update', ['model' => $model] );
        }
    }

    public function actionPhoto($id)
    {
        $model = About::findOne('1');

        return $this->render('/admin/about/photo', [
            'model' => $model,
            ]);
    }

    public function actionUploadPhoto($id)
    {
        $about =  About::find()->where(['id' => $id])->one();
        $photo = new AboutPhotosUpload();
        $photo->imageFile = UploadedFile::getInstanceByName('imageFile');
        $photo->photo = \Yii::$app->security->generateRandomString();

        if ($photo->upload($id)) {

            $about->photo = $photo->photo;

            if ($about->save()) {     

                $this->redirect(['photo', 'id' => $id]);

            } else {

                return false;
            }

        } else {
            return ["error" => $photo->getErrors('imageFile')];
        }
    }
}
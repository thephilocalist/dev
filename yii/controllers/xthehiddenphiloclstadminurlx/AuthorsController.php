<?php

namespace app\controllers\xthehiddenphiloclstadminurlx;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\db\Authors;
use app\models\upload\AuthorsPhotosUpload;

class AuthorsController extends Controller
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
        $model = Authors::find()->all();
        
        return $this->render('/admin/authors/index', [
            'model' => $model,
        ]);
    }

    public function actionCreate()
    {
        $model = new Authors();

        if (Yii::$app->request->post()) {
            if ($model->load(Yii::$app->request->post())) {
                $model = new Authors();
                $model->name = Yii::$app->request->post('Authors')['name'];
                $model->bio = Yii::$app->request->post('Authors')['bio'];
                $model->meta_title = Yii::$app->request->post('Authors')['meta_title'];
                $model->meta_description = Yii::$app->request->post('Authors')['meta_description'];
                $model->meta_keywords = Yii::$app->request->post('Authors')['meta_keywords'];

                if ($model->save()) {
                    return $this->redirect(['update', 'id' => $model->id]);
                }
            }
        }

        return $this->render('/admin/authors/create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate()
    {
        if (Yii:: $app->request->post()) {
            $model = Authors::find()->where(['id' => Yii::$app->request->get('id')])->one();
            $model->name = Yii::$app->request->post('Authors')['name'];
            $model->bio = Yii::$app->request->post('Authors')['bio'];
            $model->meta_title = Yii::$app->request->post('Authors')['meta_title'];
            $model->meta_description = Yii::$app->request->post('Authors')['meta_description'];
            $model->meta_keywords = Yii::$app->request->post('Authors')['meta_keywords'];

            if ($model->save()) {
                return $this->redirect(['update', 'id' => $model->id]);
            }
        }

        if (Yii::$app->request->get('redirect')) {
            $model = Authors::find()->where(['id' => Yii::$app->request->get('id')])->one();

            return $this->render('/admin/authors/update', ['model' => $model] );
        } else {

            $model = Authors::find()->where(['id' => Yii::$app->request->get('id')])->one();
            
            return $this->render('/admin/authors/update', ['model' => $model] );
        }
    }

    public function actionPhoto($id)
    {
        $model = Authors::find()->where(['id' => Yii::$app->request->get('id')])->one();

        return $this->render('/admin/authors/photo', [
            'model' => $model,
            ]);
    }

    public function actionUploadPhoto($id)
    {
        $model = Authors::find()->where(['id' => Yii::$app->request->get('id')])->one();
        $photo = new AuthorsPhotosUpload();
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

    public function actionRestSort()
    {
        if (Yii::$app->request->isGet) {
            $authors = Authors::find();

            return $this->asJson(['authors' => $authors->all()]);
        }

    }
}
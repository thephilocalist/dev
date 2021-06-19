<?php

namespace app\controllers\xthehiddenphiloclstadminurlx;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\db\Socials;
class SocialsController extends Controller
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
        $model = Socials::find()->all();
        
        return $this->render('/admin/socials/index', [
            'model' => $model,
        ]);
    }

    public function actionCreate()
    {
        $model = new Socials();

        if (Yii::$app->request->post()) {
            if ($model->load(Yii::$app->request->post())) {
                $model = new Socials();
                $model->name = Yii::$app->request->post('Socials')['name'];
                $model->link = Yii::$app->request->post('Socials')['link'];

                if ($model->save()) {
                    return $this->redirect(['update', 'id' => $model->id]);
                }
            }
        }

        return $this->render('/admin/socials/create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate()
    {
        if (Yii:: $app->request->post()) {
            $model = Socials::find()->where(['id' => Yii::$app->request->get('id')])->one();
            $model->name = Yii::$app->request->post('Socials')['name'];
            $model->link = Yii::$app->request->post('Socials')['link'];

            if ($model->save()) {
                return $this->redirect(['update', 'id' => $model->id]);
            }
        }

        if (Yii::$app->request->get('redirect')) {
            $model = Socials::find()->where(['id' => Yii::$app->request->get('id')])->one();

            return $this->render('/admin/socials/update', ['model' => $model] );
        } else {

            $model = Socials::find()->where(['id' => Yii::$app->request->get('id')])->one();
            
            return $this->render('/admin/socials/update', ['model' => $model] );
        }
    }

    public function actionRestSort()
    {
        if (Yii::$app->request->isGet) {
            $model = Socials::find();

            return $this->asJson(['socials' => $model->all()]);
        }

    }
}
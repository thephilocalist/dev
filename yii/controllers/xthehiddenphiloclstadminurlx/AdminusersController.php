<?php

namespace app\controllers\xthehiddenphiloclstadminurlx;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\search\UserSearch;
use app\models\db\User;

class AdminusersController extends Controller
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
        $searchModel = new UserSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('/admin/adminusers/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new User();

        if (Yii::$app->request->post()) {
            if ($model->load(Yii::$app->request->post())) {

                $model = new User();
                $model->username = Yii::$app->request->post('User')['username'];
                $model->password = Yii::$app->request->post('User')['password'];
                
                if ($model->save()) {
                    return $this->redirect('index');
                }

            }
        }
        
        return $this->render('/admin/adminusers/create', ['model' => $model]);
    }

    public function actionDelete()
    {
        if (Yii::$app->request->post()) {
            $category = User::findOne(Yii::$app->request->post('id'));
            $category->delete();
            
            return $this->redirect('index');
        }

    }



    public function actionUpdate()
    {
        if (Yii:: $app->request->post()) {
            $model = User::find()->where(['id' => Yii::$app->request->get('id')])->one();
            $model->username = Yii::$app->request->post('User')['username'];
            $model->password = Yii::$app->request->post('User')['password'];

            if ($model->save()) {
                return $this->redirect(['update', 'id' => $model->id]);
            }
        }

        if (Yii::$app->request->get('redirect')) {
            $model = User::find()->where(['id' => Yii::$app->request->get('id')])->one();

            return $this->render('/admin/adminusers/update', ['model' => $model] );
        } else {

            $model = User::find()->where(['id' => Yii::$app->request->get('id')])->one();
            
            return $this->render('/admin/adminusers/update', ['model' => $model] );
        }
    }

    public function actionRestSort()
    {
        if (Yii::$app->request->isGet) {
            $users = User::find();

            return $this->asJson(['users' => $users->all()]);
        }

    }

}
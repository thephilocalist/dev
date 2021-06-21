<?php

namespace app\controllers\xthehiddenphiloclstadminurlx;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\search\SubscribersSearch;

class NewsletterController extends Controller
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
                $this->redirect(['xthehiddenphiloclstadminurlx/login']);
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
            return $this->redirect('/xthehiddenphiloclstadminurlx/login');
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
        $searchModel = new SubscribersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('/admin/newsletter/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
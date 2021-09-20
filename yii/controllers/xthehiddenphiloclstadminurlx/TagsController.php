<?php

namespace app\controllers\xthehiddenphiloclstadminurlx;

use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\db\Tags;
use app\models\search\TagsSearch;
use app\models\search\TagArticlesSearch;
use yii\helpers\BaseHtml;

class TagsController extends Controller
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
        $model = Tags::find()->all();
        
        return $this->render('/admin/tags/index', [
            'model' => $model,
        ]);
    }

    public function actionCreate()
    {
        $model = new Tags();

        if (Yii::$app->request->post()) {
            if ($model->load(Yii::$app->request->post())) {

                $model = new Tags();
                $model->title = Yii::$app->request->post('Tags')['title'];
                $model->meta_title = Yii::$app->request->post('Tags')['meta_title'];
                $model->meta_description = Yii::$app->request->post('Tags')['meta_description'];
                $model->meta_keywords = Yii::$app->request->post('Tags')['meta_keywords'];

                if ($model->save()) {
                    return $this->redirect(['update', 'id' => $model->id]);
                }

            }
        }

        return $this->render('/admin/tags/create', ['model' => $model]);
    }

    public function actionUpdate()
    {
        $category = Tags::find()->where(['id' => Yii::$app->request->get('id')])->one();

        if (Yii::$app->request->post()) {
            $category = Tags::find()->where(['id' => Yii::$app->request->get('id')])->one();/* 
            $category->enable = Yii::$app->request->post('Tags')['enable']; */
            $category->title = Yii::$app->request->post('Tags')['title'];
            $category->meta_title = Yii::$app->request->post('Tags')['meta_title'];
            $category->meta_description = Yii::$app->request->post('Tags')['meta_description'];
            $category->meta_keywords = Yii::$app->request->post('Tags')['meta_keywords'];
            
            if ($category->save()) {
                return $this->redirect(['update', 'id' => $category->id]);
            }
        }

        return $this->render('/admin/tags/update', ['model' => $category] );
    }

    public function actionArticles($id)
    {
        $tag = Tags::findOne($id);
        $searchModel = new TagArticlesSearch();
        $dataProvider = $searchModel->articlesSearch(Yii::$app->request->queryParams);


        return $this->render('/admin/tags/articles', [
            'tag' => $tag,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDelete()
    {
        if (Yii::$app->request->post()) {
            $tag = Tags::findOne(Yii::$app->request->post('id'));

            $tag->delete();
            
            return $this->redirect('index');
        }

    }

    public function actionRestSort()
    {
        if (Yii::$app->request->isGet) {
            $model = Tags::find();

            return $this->asJson(['tags' => $model->all()]);
        }

    }

    public function findTagModel($params)
    {
        if (($model = Tags::findOne($params['id'])) !== null) {
            $model->title = BaseHtml::decode($params['title']);
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
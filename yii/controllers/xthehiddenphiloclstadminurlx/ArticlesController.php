<?php

namespace app\controllers\xthehiddenphiloclstadminurlx;

use Yii;
use app\models\db\Authors;
use app\models\db\Articles;
use app\models\db\Categories;
use app\models\db\ArticleCategories;
use app\models\upload\ArticlesPhotosUpload;
use app\models\search\AuthorsSearch;
use app\models\search\ArticlesSearch;
use app\models\search\CategoriesSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;


class ArticlesController extends Controller
{
    public $layout = '@app/views/layouts/content.php';

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
            echo 'null';die;
            $this->layout = 'content';
            return $this->redirect('/Xthehiddenphiloclstadminurlx/login');
        }
        $this->layout = 'admin';
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
        $model = new Articles();
        $searchModel = new ArticlesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['article-text', 'id' => $model->id]);
        }

        return $this->render('/admin/articles/index', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Articles();

        if (Yii::$app->request->post()) {
            if ($model->load(Yii::$app->request->post())) {
                
                $model = new Articles();
                $model->title = Yii::$app->request->post('Articles')['title'];
                $model->author_id = Yii::$app->request->post('Articles')['author_id'];

                if ($model->save()) {
                    return $this->redirect(['update', 'id' => $model->id]);
                }
            }
        }

        return $this->render('/admin/articles/create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate()
    {
        if (Yii:: $app->request->post()) {
            $categories = Categories::find()->all();
            $model = Articles::find()->where(['id' => Yii::$app->request->get('id')])->one();
            $this_article_categories = ArticleCategories::find()->where(['article_id' => $model->id])->all();
            
            $model->author_id = Yii::$app->request->post('Articles')['author_id'];
            $model->meta_title = Yii::$app->request->post('Articles')['meta_title'];
            $model->published = Yii::$app->request->post('Articles')['published'];
            $model->main = Yii::$app->request->post('Articles')['main'];
            $model->favourite = Yii::$app->request->post('Articles')['favourite'];
            $model->meta_description = Yii::$app->request->post('Articles')['meta_description'];
            $model->meta_keywords = Yii::$app->request->post('Articles')['meta_keywords'];

            foreach($categories as $category) {
                if ($this_article_categories) {
                    foreach($this_article_categories as $this_article_category) {
                        if ($this_article_category->category_id == $category->id) {
                            if( Yii::$app->request->post()[$category->id] == 0){
                                $artcle_category = ArticleCategories::find()->where(['article_id' => $model->id])->andWhere(['category_id' => $category->id])->one();
                                $artcle_category->delete();               
                            }
                        } else {
                            if( Yii::$app->request->post()[$category->id] == 1){
                                $artcle_category = ArticleCategories::find()->where(['article_id' => $model->id])->andWhere(['category_id' => $category->id])->one();

                                if($artcle_category) {
                                } else {
                                    $artcle_category = new ArticleCategories();
                                    $artcle_category->article_id = $model->id;
                                    $artcle_category->category_id = $category->id;
                                    $artcle_category->save();
                                }
                            }    
                        }
                    }
                } else {
                    if(Yii::$app->request->post()[$category->id] == 1){
                        $artcle_category = new ArticleCategories();
                        $artcle_category->article_id = $model->id;
                        $artcle_category->category_id = $category->id;
                        $artcle_category->save();
                    }
                }
            }

            if ($model->save()) {
                return $this->redirect(['update', 'id' => $model->id]);
            }
        }

        if (Yii::$app->request->get('redirect')) {
            $model = Articles::find()->where(['id' => Yii::$app->request->get('id')])->one();
    
            return $this->render('/admin/articles/update', ['model' => $model] );
        } else {
    
            $model = Articles::find()->where(['id' => Yii::$app->request->get('id')])->one();
            
            return $this->render('/admin/articles/update', ['model' => $model] );
        }

    }

    public function actionEnable()
    {
        $model = Articles::find()->where(['id' => Yii::$app->request->get('id')])->one();
        $model->published = '1';

        if ($model->save()) {

            return $this->redirect(['update', 'id' => $model->id]);
        }

    }

    public function actionDisable()
    {
        $model = Articles::find()->where(['id' => Yii::$app->request->get('id')])->one();
        $model->published = '0';

        if ($model->save()) {

            return $this->redirect(['update', 'id' => $model->id]);
        }

    }

    public function actionText()
    {
        $model = Articles::find()->where(['id' => Yii::$app->request->get('id')])->one();
        
        if (Yii:: $app->request->post()) {
            $model = Articles::find()->where(['id' => Yii::$app->request->get('id')])->one();
            $model->title = Yii::$app->request->post('Articles')['title'];
            $model->text = Yii::$app->request->post('Articles')['text'];

            if ($model->save()) {
                return $this->redirect(['text', 'id' => $model->id]);
            }
        }

        if (Yii::$app->request->get('redirect')) {
            $model = Articles::find()->where(['id' => Yii::$app->request->get('id')])->one();
    
            return $this->render('/admin/articles/text', ['model' => $model] );
        } else {
    
            $model = Articles::find()->where(['id' => Yii::$app->request->get('id')])->one();
            
            return $this->render('/admin/articles/text', ['model' => $model] );
        }

    }

    public function actionPhoto()
    {
        $model = Articles::find()->where(['id' => Yii::$app->request->get('id')])->one();

        return $this->render('/admin/articles/photo', [
            'article' => $model,
            ]);

    }

    public function actionUploadPhoto($id)
    {
        $model = Articles::find()->where(['id' => Yii::$app->request->get('id')])->one();
        $photo = new ArticlesPhotosUpload();
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
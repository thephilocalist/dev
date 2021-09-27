<?php

namespace app\controllers\xthehiddenphiloclstadminurlx;

use Yii;
use app\models\db\Authors;
use app\models\db\Articles;
use app\models\db\Categories;
use app\models\db\Tags;
use app\models\db\ArticleCategories;
use app\models\db\ArticleTags;
use app\models\upload\ArticlesMainPhotoUpload;
use app\models\upload\ArticlesCategoryPhotoUpload;
use app\models\upload\ArticlesFeaturedPhotoUpload;
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
            $tags = Tags::find()->all();
            $model = Articles::find()->where(['id' => Yii::$app->request->get('id')])->one();
            $this_article_categories = ArticleCategories::find()->where(['article_id' => $model->id])->all();
            $this_article_tags = ArticleTags::find()->where(['article_id' => $model->id])->all();
            $timestamp = strtotime(Yii::$app->request->post('Articles')['publish_at']);
            
            $model->author_id = Yii::$app->request->post('Articles')['author_id'];
            $model->meta_title = Yii::$app->request->post('Articles')['meta_title'];
            $model->published = Yii::$app->request->post('Articles')['published'];
            $model->featured = Yii::$app->request->post('Articles')['featured'];/*
            $model->favourite = Yii::$app->request->post('Articles')['favourite']; */
            $model->meta_description = Yii::$app->request->post('Articles')['meta_description'];
            $model->meta_keywords = Yii::$app->request->post('Articles')['meta_keywords'];
            $model->publish_at = $timestamp;

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

            foreach($tags as $tag) {
                if ($this_article_tags) {
                    foreach($this_article_tags as $this_article_tag) {
                        if ($this_article_tag->tag_id == $tag->id) {
                            if( Yii::$app->request->post()[$tag->id] == 0){
                                $artcle_tag = ArticleTags::find()->where(['article_id' => $model->id])->andWhere(['tag_id' => $tag->id])->one();
                                $artcle_tag->delete();               
                            }
                        } else {
                            if( Yii::$app->request->post()[$tag->id] == 1){
                                $artcle_tag = ArticleTags::find()->where(['article_id' => $model->id])->andWhere(['tag_id' => $tag->id])->one();

                                if($artcle_tag) {
                                } else {
                                    $artcle_tag = new ArticleTags();
                                    $artcle_tag->article_id = $model->id;
                                    $artcle_tag->tag_id = $tag->id;
                                    $artcle_tag->save();
                                }
                            }    
                        }
                    }
                } else {
                    if(Yii::$app->request->post()[$tag->id] == 1){
                        $artcle_tag = new ArticleTags();
                        $artcle_tag->article_id = $model->id;
                        $artcle_tag->tag_id = $tag->id;
                        $artcle_tag->save();
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

    public function actionMainPhoto()
    {
        $model = Articles::find()->where(['id' => Yii::$app->request->get('id')])->one();

        return $this->render('/admin/articles/main-photo', [
            'article' => $model,
            ]);

    }

    public function actionFeaturedPhoto()
    {
        $model = Articles::find()->where(['id' => Yii::$app->request->get('id')])->one();

        return $this->render('/admin/articles/featured-photo', [
            'article' => $model,
            ]);

    }

    public function actionCategoryPhoto()
    {
        $model = Articles::find()->where(['id' => Yii::$app->request->get('id')])->one();

        return $this->render('/admin/articles/category-photo', [
            'article' => $model,
            ]);

    }

    public function actionUploadMainPhoto($id)
    {
        $model = Articles::find()->where(['id' => Yii::$app->request->get('id')])->one();
        $photo = new ArticlesMainPhotoUpload();
        $photo->imageFile = UploadedFile::getInstanceByName('imageFile');
        $photo->main_photo = \Yii::$app->security->generateRandomString();

        if ($photo->upload($id)) {

            $model->photo = $photo->main_photo;

            if ($model->save()) {     

                $this->redirect(['main-photo', 'id' => $id]);

            } else {

                return false;
            }

        } else {
            return ["error" => $photo->getErrors('imageFile')];
        }
    }

    public function actionUploadFeaturedPhoto($id)
    {
        $model = Articles::find()->where(['id' => Yii::$app->request->get('id')])->one();
        $photo = new ArticlesFeaturedPhotoUpload();
        $photo->imageFile = UploadedFile::getInstanceByName('imageFile');
        $photo->featured_photo = \Yii::$app->security->generateRandomString();

        if ($photo->upload($id)) {

            $model->photo = $photo->featured_photo;

            if ($model->save()) {     

                $this->redirect(['featured-photo', 'id' => $id]);

            } else {

                return false;
            }

        } else {
            return ["error" => $photo->getErrors('imageFile')];
        }
    }

    public function actionUploadCategoryPhoto($id)
    {
        $model = Articles::find()->where(['id' => Yii::$app->request->get('id')])->one();
        $photo = new ArticlesCategoryPhotoUpload();
        $photo->imageFile = UploadedFile::getInstanceByName('imageFile');
        $photo->category_photo = \Yii::$app->security->generateRandomString();

        if ($photo->upload($id)) {

            $model->photo = $photo->category_photo;

            if ($model->save()) {     

                $this->redirect(['category-photo', 'id' => $id]);

            } else {

                return false;
            }

        } else {
            return ["error" => $photo->getErrors('imageFile')];
        }
    }

}
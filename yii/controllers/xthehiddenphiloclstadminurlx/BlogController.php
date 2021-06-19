<?php

namespace app\controllers\xthehiddenphiloclstadminurlx;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\db\Articles;
use app\models\upload\ArticlesPhotosUpload;
use yii\web\UploadedFile;

class BlogController extends Controller
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
                $this->redirect(['xhiddenkagiosadminurlx/login']);
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
            return $this->redirect('/Xhiddenkagiosadminurlx/login');
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
        $articles = Articles::find()->orderBy(['published' => SORT_DESC])->all();

        return $this->render('/admin/blog/index', [
            'articles' => $articles,
        ]);
    }

    public function actionRest()
    {
        if (Yii::$app->request->isGet) {
            $articles = Articles::find();
            
            return $this->asJson(['articles' => $articles->orderBy(['published' => SORT_DESC])->all()]);
        }
    }

    public function actionCreate()
    {
        $model = new Articles();

        if (Yii::$app->request->post()) {
            if ($model->load(Yii::$app->request->post())) {
                $model = new Articles();
                $model->title = Yii::$app->request->post('Articles')['title'];
                $model->slung = Yii::$app->request->post('Articles')['slung'];
                $model->meta_title = Yii::$app->request->post('Articles')['meta_title'];
                $model->meta_description = Yii::$app->request->post('Articles')['meta_description'];
                $model->meta_keywords = Yii::$app->request->post('Articles')['meta_keywords'];
                $model->text = Yii::$app->request->post('Articles')['text'];
                $model->author = Yii::$app->request->post('Articles')['author'];
                $model->published = 0;
                $model->created_at = time();
                $model->published_at = 0;


                if ($model->save()) {
                    return $this->redirect(['update', 'id' => $model->id]);
                }
            }
        }

        return $this->render('/admin/blog/create', ['model' => $model]);
    }

    public function actionUpdate()
    {
        if (Yii::$app->request->post()) {
            $article = Articles::find()->where(['id' => Yii::$app->request->get('id')])->one();
            $article->title = Yii::$app->request->post('Articles')['title'];
            $article->slung = Yii::$app->request->post('Articles')['slung'];
            $article->meta_title = Yii::$app->request->post('Articles')['meta_title'];
            $article->meta_description = Yii::$app->request->post('Articles')['meta_description'];
            $article->meta_keywords = Yii::$app->request->post('Articles')['meta_keywords'];
            $article->text = Yii::$app->request->post('Articles')['text'];
            $article->author = Yii::$app->request->post('Articles')['author'];

            if ($article->save()) {
                return $this->redirect(['update', 'id' => $article->id]);
            }
        }

        $article = Articles::find()->where(['id' => Yii::$app->request->get('id')])->one();

        return $this->render('/admin/blog/update', ['model' => $article]);
    }

    function actionPhoto()
    {
        $article = Articles::find()->where(['id' => Yii::$app->request->get('id')])->one();

        return $this->render('/admin/blog/photo', [
            'article' => $article,
        ]);
    }

    public function actionUploadPhoto($id)
    {
        $article =  Articles::find()->where(['id' => $id])->one();
        $photo = new ArticlesPhotosUpload();
        $photo->imageFile = UploadedFile::getInstanceByName('imageFile');
        $photo->photo = \Yii::$app->security->generateRandomString();

        if ($photo->upload()) {

            $article->photo = $photo->photo;

            if ($article->save()) {     

                $this->redirect(['photo', 'id' => $id]);

            } else {

                return false;
            }

        } else {
            return ["error" => $photo->getErrors('imageFile')];/* 
            return false; */
        }
    }

    function actionDelete()
    {
        if (Yii::$app->request->post()) {
            $article = Articles::find()->where(['id' => Yii::$app->request->post('id')])->one();

            if($article->photo) {
                unlink('images/articles/'.$article->photo.'.jpg');
                unlink('images/articles/'.$article->photo.'@100x100.jpg');
                unlink('images/articles/'.$article->photo.'@200x200.jpg');
                unlink('images/articles/'.$article->photo.'@380x220.jpg');
                unlink('images/articles/'.$article->photo.'@600x400.jpg');
                unlink('images/articles/'.$article->photo.'@1024.jpg');
            }
            
            $article->delete();

            return $this->redirect('index');
        }
    }

    public function actionEnable()
    {
        $article = Articles::find()->where(['id' => Yii::$app->request->get('id')])->one();
        $article->published = 1;
        $article->save();

        return $this->render('/admin/blog/update', ['model' => $article]);
    }

    public function actionDisable()
    {
        $article = Articles::find()->where(['id' => Yii::$app->request->get('id')])->one();
        $article->published = 0;
        $article->save();

        return $this->render('/admin/blog/update', ['model' => $article]);
    }
}
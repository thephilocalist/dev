<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\db\Articles;
use app\models\db\Categories;
use app\models\db\Authors;
use app\models\db\About;
use app\models\db\Welcome;
use app\models\db\Socials;
use app\models\db\ArticleCategories;
use app\models\db\ArticleCategoriesQuery;
use app\models\search\ArticlesSearch;
use app\models\search\AuthorsSearch;
use app\models\search\CategoriesSearch;
use Cocur\Slugify\Slugify;
use yii\db\Expression;

class SiteController extends Controller
{
    public $layout = '@app/views/layouts/site.php';
    /**
     * {@inheritdoc}
     */
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
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $categories = Categories::find()->where(['enable' => '1'])->orderBy(['position' => SORT_DESC])->all();
        $welcome = Welcome::find()->one();
        $articles = Articles::find()->where(['published' => '1'])->orderBy(['published_at' => SORT_DESC])->all();
        $main_articles = Articles::find()->where(['published' => '1'])->andWhere(['main' => '1'])->orderBy(['published_at' => SORT_DESC])->all();
        $favourite_articles = Articles::find()->where(['published' => '1'])->andWhere(['favourite' => '1'])->orderBy(['published_at' => SORT_DESC])->limit('3')->all();
        $authors = Authors::find()->all();

        return $this->render('index', [
            'categories' => $categories,
            'articles' => $articles,
            'main_articles' => $main_articles,
            'favourite_articles' => $favourite_articles,
            'authors' => $authors,
            'welcome' => $welcome,

        ]);
    }

    public function actionCategory($slug)
    {
        $category = Categories::find()->where(['enable' => '1'])->andWhere(['slug' => $slug])->one();
        $favourite_articles = Articles::find()->where(['published' => '1'])->andWhere(['favourite' => '1'])->orderBy(['published_at' => SORT_DESC])->limit('3')->all();
        
        return $this->render('category', [
            'category' => $category,
            'articles' => $category->articles,
            'favourite_articles' => $favourite_articles,

        ]);

    }

    public function actionArticles($slug)
    {
        $article = Articles::find()->where(['published' => '1'])->andWhere(['slug' => $slug])->one();
        $article_category = ArticleCategories::find()->where(['article_id' => $article->id])->orderBy(new Expression('rand()'))->one();
        
        return $this->render('article', [
            'article' => $article,
            'reladed_articles' => $article_category->category->articles

        ]);

    }

    public function actionAuthors($slug)
    {
        $author = Authors::find()->where(['slug' => $slug])->one();
        $related_articles = Articles::find()->where(['published' => '1'])->andWhere(['author_id' => $author->id])->orderBy(new Expression('rand()'))->limit(3)->all();
        $articles = Articles::find()->where(['published' => '1'])->andWhere(['author_id' => $author->id])->orderBy(['published_at' => SORT_DESC])->all();
        
        return $this->render('author', [
            'related_articles' => $related_articles,
            'author' => $author,
            'articles' => $articles,

        ]);

    }

    public function actionSearchArticles($name)
    {
        $slugify = new Slugify();
        $term = $slugify->slugify($name);
        $articles = Articles::find()->
                                  select(['slug as slug', 'title as value', 'id as id'])->
                                  where(['like', 'slug', $term])->
                                  asArray()->
                                  all();

        return $this->asJson($articles);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}

<?php

namespace app\controllers\xthehiddenphiloclstadminurlx;

use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\db\Categories;
use app\models\search\CategoriesSearch;
use app\models\upload\CategoriesPhotosUpload;
use yii\web\UploadedFile;
use yii\helpers\BaseHtml;

class CategoriesController extends Controller
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
        if (Yii::$app->request->isAjax) {
            $list = Yii::$app->request->post('category');
            $count = 0;
            foreach ($list as $id) {
                $model = Categories::find()->where(['id' => $id])->one();
                $model->position = $count;
                $model->save();
                ++$count;
            }

            return $this->asJson(['success' => true]);
        }
        
        $model = new CategoriesSearch();
        $dataProvider = $model->search(Yii::$app->request->queryParams);

        return $this->render('/admin/categories/index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Categories();

        if (Yii::$app->request->post()) {
            if ($model->load(Yii::$app->request->post())) {

                $model = new Categories();
                $model->title = Yii::$app->request->post('Categories')['title'];
                $model->meta_title = Yii::$app->request->post('Categories')['meta_title'];
                $model->meta_description = Yii::$app->request->post('Categories')['meta_description'];
                $model->meta_keywords = Yii::$app->request->post('Categories')['meta_keywords'];

                if ($model->save()) {
                    return $this->redirect(['update', 'id' => $model->id]);
                }

            }
        }

        return $this->render('/admin/categories/create', ['model' => $model]);
    }

    public function actionUpdate()
    {
        $category = Categories::find()->where(['id' => Yii::$app->request->get('id')])->one();

        if (Yii::$app->request->post()) {
            $category = Categories::find()->where(['id' => Yii::$app->request->get('id')])->one();
            $category->enable = Yii::$app->request->post('Categories')['enable'];
            $category->title = Yii::$app->request->post('Categories')['title'];
            $category->meta_title = Yii::$app->request->post('Categories')['meta_title'];
            $category->meta_description = Yii::$app->request->post('Categories')['meta_description'];
            $category->meta_keywords = Yii::$app->request->post('Categories')['meta_keywords'];
            
            if ($category->save()) {
                return $this->redirect(['update', 'id' => $category->id]);
            }
        }

        return $this->render('/admin/categories/update', ['model' => $category] );
    }

    public function actionPhoto($id)
    {
        $category = Categories::findOne($id);

        return $this->render('/admin/categories/photo', [
            'category' => $category,
            ]);
    }

    public function actionRestSort()
    {
        if (Yii::$app->request->isGet) {
            $categories = Categories::find();

            return $this->asJson(['categories' => $categories->orderBy('position')->all()]);
        }

    }

    public function actionSort()
    {
        if (Yii::$app->request->isAjax) {
            $list = Yii::$app->request->post('photo');
            $count = 0;
            foreach ($list as $item) {
                $model = $this->findOfferPhoto($item);
                $model->position = $count;
                $model->save();
                ++$count;
            }

            return $this->asJson(['success' => true]);
        }

    }

    public function actionDelete()
    {
        if (Yii::$app->request->post()) {
            $category = Categories::findOne(Yii::$app->request->post('id'));

            if($category->photo) {
                unlink('images/categories/'.$category->photo.'.jpg');
                unlink('images/categories/'.$category->photo.'@100x100.jpg');
                unlink('images/categories/'.$category->photo.'@200x200.jpg');
                unlink('images/categories/'.$category->photo.'@380x220.jpg');
                unlink('images/categories/'.$category->photo.'@600x400.jpg');
                unlink('images/categories/'.$category->photo.'@1024.jpg');
            }

            $category->delete();
            
            return $this->redirect('index');
        }

    }

    public function actionUploadPhoto($id)
    {
        $category =  Categories::find()->where(['id' => $id])->one();
        $photo = new CategoriesPhotosUpload();
        $photo->imageFile = UploadedFile::getInstanceByName('imageFile');
        $photo->photo = \Yii::$app->security->generateRandomString(20);

        if ($photo->upload($id)) {

            $category->photo = $photo->photo;

            if ($category->save()) {                

                $this->redirect(['photo', 'id' => $id]);

            } else {

                return false;
            }

        } else {
            return ["error" => $photo->getErrors('imageFile')];/* 
            return false; */
        }
    }

    public function findCategoryModel($params)
    {
        if (($model = Categories::findOne($params['id'])) !== null) {
            $model->title = BaseHtml::decode($params['title']);
            $model->text = BaseHtml::decode($params['text']);
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
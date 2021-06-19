<?php

namespace app\controllers\xthehiddenphiloclstadminurlx;

use Yii;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\db\Texts;
use app\models\LoginForm;
use yii\helpers\BaseHtml;

class UploadController extends Controller
{

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
                $this->redirect(['axassderweruser/login']);
            },
          ],
          'verbs' => [
            'class' => VerbFilter::className(),
            'actions' => [],
          ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    
    public function actionRedactor()
    {
      $dir = 'images/redactor/';

      $_FILES['imageFile']['type'] = strtolower($_FILES['imageFile']['type']);

      if ($_FILES['imageFile']['type'] == 'image/png'
      || $_FILES['imageFile']['type'] == 'image/jpg'
      || $_FILES['imageFile']['type'] == 'image/jpeg')
      {
        $filename = md5(date('YmdHis')).'.jpg';
        $file = $dir.$filename;
        move_uploaded_file($_FILES['imageFile']['tmp_name'], $file);

        $array = array(
          'url' => '/'.$file,
          'id' => $filename
        );
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $array;

      }
    }

}
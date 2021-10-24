<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use Yii;
use app\models\db\Articles;


class CronController extends Controller {

    protected function actionPublish()
    {
        $date = time();
        $model = Articles::find()->andWhere(['published' => 0])->andWhere(['>', 'publish_at', $date])->all();
        foreach($model as $article) {
            
            $article->published = '1';

            if ($article->save()) {
    
                return true;
            }
            // */5 * * * * kathe 5 lepta php cron/publish
        }
    }

}
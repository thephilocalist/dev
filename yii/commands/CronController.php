<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */
/* /opt/plesk/php/7.4/bin/php /var/www/vhosts/thephilocalist.gr/dev.thephilocalist.gr/yii  cron/publish  */

namespace app\commands;

use yii\console\Controller;
use app\models\db\Articles;


class CronController extends Controller {

    public function actionPublish()
    {
        $date = time();
        $model = Articles::find()->andWhere(['published' => 0])->andWhere(['<', 'publish_at', $date])->all();

        foreach($model as $article) {            
            $article->published = '1';
            $article->save();
            
            // */5 * * * * kathe 5 lepta php cron/publish 
        }
    }

}
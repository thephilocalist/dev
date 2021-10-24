<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */
/* /opt/plesk/php/7.4/bin/php /var/www/vhosts/thephilocalist.gr/dev.thephilocalist.gr/yii  cron/publish  \

Καλησπέρα σας,
Αντιμετωπιζω δυσκολία με τη δημιουργια του command στο scheduled tasks.
Συγκεκριμένα το command που εχω ορισει είναι php dev.thephilocalist.gr/yii cron/publish (να εκτελει την actionPublish() του commands/CronController) η εντολή οταν την τρεχω με το  run now δεν εμφανίζει καποιο error αλλα ταυτοχρονα δεν κανει κατι (τοπικα στο pc μου η ιδια εντολη ειναι η php yii cron/publish και εκτελειται σωστα) 

Πρεπει να καλω διαφορετικα την php? 

*/

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
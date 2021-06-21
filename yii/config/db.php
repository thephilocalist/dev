<?php

return [
     
     'class' => 'yii\db\Connection',
     'dsn' => YII_ENV == 'dev' ? 'mysql:host=localhost;dbname=philocalist_db' : 'mysql:host=localhost;dbname=n137576arv_philocalist_db',
     'username' => YII_ENV == 'dev' ? 'root' : 'n137576arv_philocalist_db_user',
     'password' => YII_ENV == 'dev' ? 'root' : '?l2mG0o9',
     'charset' => 'utf8',
 
     // Schema cache options (for production environment)
     //'enableSchemaCache' => true,
     //'schemaCacheDuration' => 60,
     //'schemaCache' => 'cache',
 ];
 

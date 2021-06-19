<?php

return [
     
     'class' => 'yii\db\Connection',
     'dsn' => YII_ENV == 'dev' ? 'mysql:host=localhost;dbname=philocalist_db' : 'mysql:host=localhost;dbname=philocalist_db',
     'username' => YII_ENV == 'dev' ? 'root' : 'kagiosg_myqsql_user',
     'password' => YII_ENV == 'dev' ? 'root' : '?p#P&(vXSkPe',
     'charset' => 'utf8',
 
     // Schema cache options (for production environment)
     //'enableSchemaCache' => true,
     //'schemaCacheDuration' => 60,
     //'schemaCache' => 'cache',
 ];
 

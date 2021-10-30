<?php

namespace app\assets\admin;

use yii\web\AssetBundle;

class Assets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $loadingAssets = '';
    public $css = [
      'admin/bootstrap/dist/css/bootstrap.min.css',
      'admin/font-awesome/css/font-awesome.min.css',
      'admin/css/AdminLTE.css',
      'admin/css/skins/_all-skins.min.css',
      'libs/redactor-250/redactor/redactor.css',
      'libs/redactor-250/redactor/alignment.css',
      'css/admin/admin.css',
      'admin/css/app.css',
      'semantic/semantic.min.css'
    ];
    public $js = [
      'admin/jquery-ui/jquery-ui.min.js',
      'admin/js/adminlte.min.js',
      'libs/redactor-250/redactor/redactor.js',
      'libs/redactor-250/redactor/fontcolor.js',
      'libs/redactor-250/redactor/fontsize.js',
      'libs/redactor-250/redactor/fullscreen.js',
      'libs/redactor-250/redactor/table.js',
      'libs/redactor-250/redactor/imagemanager.js',
      'libs/redactor-250/redactor/alignment.js',
      'libs/redactor-250/redactor/video.js',
      'libs/redactor-250/redactor/source.js',
      'libs/redactor-250/redactor/properties.js',
      'libs/redactor-250/redactor/bufferbuttons.js',
      'admin/js/app.js',
      'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.2/umd/popper.min.js',
      'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.js',
      'admin/js/categories/category.photos.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
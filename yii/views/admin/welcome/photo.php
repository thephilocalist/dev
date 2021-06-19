<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use kartik\file\FileInput;
use yii\jui\JuiAsset;

$this->registerJsFile('@web/libs/angular/angular.js', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerJsFile('@web/libs/angular/angular-sanitize.js', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerCssFile('@web/libs/dropzone/dropzone.css', ['depends' => [app\assets\admin\Assets::className()]]);
$this->registerJsFile('@web/libs/dropzone/dropzone.js', ['depends' => [app\assets\admin\Assets::className()]]);
JuiAsset::register($this);

$this->title = 'Main Photo';
?>


<div class="content" ng-app="App" ng-controller="controller">
<div class="box">
<div class="spacer-30"></div>

<?php $this->beginContent('@app/views/admin/welcome/welcomemenu.php', ['active' => 'photo', 'id' => $model->id]); ?>
<?php $this->endContent(); ?>
<div class="spacer-30"></div>
<div class="clearfix"></div>
  <div class="box-header">
    Upload Image
  </div>
  <div class="box-body">
    <?=
    FileInput::widget([
        'name' => 'imageFile',
        'options'=> [
            'multiple'=> false
        ],
        'pluginOptions' => [
            'uploadUrl' => Url::to(['/Xthehiddenphiloclstadminurlx/welcome/upload-photo', 'id' => $model->id]),
            'showPreview' => true,
            'showCaption' => true,
            'showRemove' => false,
            'showUpload' => true,
            'showError' => false
        ]
    ]);
    ?>
  </div>
</div>
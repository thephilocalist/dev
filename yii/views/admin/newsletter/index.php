<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yiister\gentelella\widgets\Panel;
use yii\widgets\Menu;

$this->title = Yii::t('app', 'Subscribers');
?>
<div class="row">
  <div class="col-lg-10 col-md-10 col-md-offset-1 col-lg-offset-1 col-xs-12">
    <div class="content">
      <div class="clear-30"></div>
      <div class="clear-30"></div>

      <?php
      Panel::begin([
        'header' => '',
      ])?>
      <?=ExportMenu::widget([
        'dropdownOptions' => [
          'label' => 'Export Data', 'class' => 'btn btn-primary',
          'style' => 'margin-bottom: 20px',
        ],
        'dataProvider' => $dataProvider,
        'fontAwesome' => true,
        'pjaxContainerId' => 'kv-pjax-container',
        'batchSize' => 50,
        'target' => '_self',
        'showConfirmAlert' => false,
        'showColumnSelector' => false,
        'exportConfig' => [
          ExportMenu::FORMAT_TEXT => false,
          ExportMenu::FORMAT_PDF => false,
          ExportMenu::FORMAT_HTML => false,
        ],
        'columns' => [
          'email:email',
          [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{delete}'
          ],
        ],
        'filename' => '_subscribers'.time(),
      ]) ?>
      <div class="clear-30"></div>
      <?= GridView::widget([
          'dataProvider' => $dataProvider,
          'columns' => [
            'email:email',
            [
              'class' => 'yii\grid\ActionColumn',
              'template' => '{delete}'
            ],
          ],
      ]); ?>
  </div>
</div>
</div>

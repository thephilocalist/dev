<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yiister\gentelella\widgets\Panel;
use app\models\db\Authors;

?>

<div class="row">
  <div class="">
    <div class="content">
      <div class="clear-30"></div>
      <div class="clear-30"></div>
      <?php
      Panel::begin([
        'header' => Yii::t('app', 'Articles'),
      ])?>

      <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']);?>

      <div class="clear-30"></div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="table-responsive">
      <?= GridView::widget([
          'dataProvider' => $dataProvider,
          'filterModel' => $searchModel,
          'columns' => [
            'id',
            'title',
            [
              'label' => 'Published',
              'filter' => ['0' => 'Draft', '1' => 'Published'],
              'attribute' => 'published',
              'value' => function ($model) {
                switch ($model->published) {
                  case 0:
                  return 'Draft';
                  break;
                  case 1:
                  return 'Published';
                  break;
                }
              },
            ],
            [
              'label' => 'Main',
              'filter' => ['0' => 'No', '1' => 'Yes'],
              'attribute' => 'main',
              'value' => function ($model) {
                switch ($model->main) {
                  case 0:
                  return 'No';
                  break;
                  case 1:
                  return 'Yes';
                  break;
                }
              },
            ],
            [
              'label' => 'Favourite',
              'filter' => ['0' => 'No', '1' => 'Yes'],
              'attribute' => 'favourite',
              'value' => function ($model) {
                switch ($model->favourite) {
                  case 0:
                  return 'No';
                  break;
                  case 1:
                  return 'Yes';
                  break;
                }
              },
            ],
            [
              'label' => 'Author',
              'attribute' => 'author_id',
              'filter' => ArrayHelper::map(Authors::find()->all(), 'id', 'name'),
              'value' => function ($model) {
                return $model->author->name;
              },
            ],
            'updated_at:date',/* 
            'created_at:date', */
            'published_at:date',/* 
            'publish_at:date', */
            [
              'class' => 'yii\grid\ActionColumn',
              'template' => '{view} {update} {delete}',
              'buttons' => [
                'view' => function ($url, $model) {
                    $url = 'articles/'.$model->slug;

                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['title' => 'update', 'target' => '_blank']);
                },
                'update' => function ($url, $model) {
                    $url = Url::to(['Xthehiddenphiloclstadminurlx/articles/update', 'id' => $model->id]);

                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['title' => 'update']);
                },
                'delete' => function ($url, $model) {
                    $url = Url::to(['Xthehiddenphiloclstadminurlx/articles/delete', 'id' => $model->id]);

                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, ['title' => 'delete', 'data' => [
                      'confirm' => Yii::t('app', 'Are you sure that you want to delete this item?'),
                      ],
                    ]);
                },
              ],
            ],
          ],
      ]); ?>
      </div>
      </div>
      <?php Panel::end() ?>
      <div class="clear-30"></div>
      <div class="clear-30"></div>
    </div>
  </div>
</div>
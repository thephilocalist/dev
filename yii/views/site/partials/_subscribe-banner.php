<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="subscribe-banner-container">

    <?php $form = ActiveForm::begin([
    ]);?>
        <?= $form->field($model, 'email')->textInput(['type' => 'text', 'placeholder' => 'Enter your email..', 'autofocus' => false])->label(false);?>
        <?= Html::submitButton('SUBMIT', ['class' => 'button newsletter-button']) ?>
        <p>Subscribe to our Newsletter and learn our daily storys</p>
    <?php ActiveForm::end(); ?>
</div>
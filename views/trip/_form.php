<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
?>
<div class="trip-form">
    <div class="row">
        <div class="col-lg-6">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'autofocus' => true]) ?>

            <?= $form->field($model, 'country_code')->dropDownList($countryList, ['prompt' => 'Wybierz kraj...']) ?>

            <?= $form->field($model, 'start_date')->input('date') ?>

            <?= $form->field($model, 'end_date')->input('date') ?>

            <?= $form->field($model, 'rating')->dropDownList([
                1 => '1 - słabo',
                2 => '2 - takie sobie',
                3 => '3 - w porządku',
                4 => '4 - bardzo dobrze',
                5 => '5 - rewelacja',
            ]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <?= Html::submitButton('Zapisz', ['class' => 'btn btn-success']) ?>
                <?= Html::a('Anuluj', ['index'], ['class' => 'btn btn-outline-secondary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

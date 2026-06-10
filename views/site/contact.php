<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Kontakt';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('success')): ?>

        <p>Wiadomość została wysłana.</p>

        <?php if (YII_DEBUG && Yii::$app->mailer->useFileTransport): ?>
            <p class="text-body-secondary small">
                Tryb deweloperski: e-mail zapisano w folderze
                <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>
            </p>
        <?php endif; ?>

    <?php else: ?>

        <p>Masz pytanie dotyczące projektu? Wypełnij poniższy formularz.</p>

        <div class="row">
            <div class="col-lg-6">
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                    'template' => '<div class="row"><div class="col-lg-4">{image}</div><div class="col-lg-8">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Wyślij', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>

    <?php endif; ?>
</div>

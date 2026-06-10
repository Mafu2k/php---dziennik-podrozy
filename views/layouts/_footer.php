<?php

use yii\helpers\Html;

?>
<footer id="footer" class="mt-auto py-3 bg-body-tertiary">
    <div class="container">
        <div class="row text-body-secondary">
            <div class="col-md-6 text-center text-md-start">
                &copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?>
            </div>
            <div class="col-md-6 text-center text-md-end">
                Projekt zaliczeniowy &mdash;
                <a href="https://www.yiiframework.com/" rel="external" class="text-body-secondary">Yii 2 Framework</a>
            </div>
        </div>
    </div>
</footer>

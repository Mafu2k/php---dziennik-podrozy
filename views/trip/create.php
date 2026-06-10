<?php

use yii\helpers\Html;

$this->title = 'Dodaj podróż';
$this->params['breadcrumbs'][] = ['label' => 'Podróże', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trip-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'countryList' => $countryList,
    ]) ?>
</div>

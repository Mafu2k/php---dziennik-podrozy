<?php

use yii\helpers\Html;

$this->title = 'Edytuj podróż: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Podróże', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edycja';
?>
<div class="trip-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'countryList' => $countryList,
    ]) ?>
</div>

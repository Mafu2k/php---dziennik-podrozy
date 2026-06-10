<?php

use yii\bootstrap5\LinkPager;
use yii\helpers\Html;

$this->title = 'Kraje';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Liczba krajów w bazie: <?= $pagination->totalCount ?></p>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Kod</th>
                <th>Nazwa</th>
                <th>Liczba ludności</th>
                <th>Liczba podróży</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($countries as $country): ?>
                <tr>
                    <td><?= Html::encode($country->code) ?></td>
                    <td><?= Html::encode($country->name) ?></td>
                    <td><?= Yii::$app->formatter->asInteger($country->population) ?></td>
                    <td><?= count($country->trips) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?= LinkPager::widget(['pagination' => $pagination]) ?>
</div>

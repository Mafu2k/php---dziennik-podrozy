<?php

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Podróże';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trip-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->isGuest): ?>
        <p><?= Html::a('Dodaj podróż', ['create'], ['class' => 'btn btn-success']) ?></p>
    <?php endif; ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table table-striped'],
        'columns' => [
            [
                'attribute' => 'title',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a(Html::encode($model->title), ['view', 'id' => $model->id]);
                },
            ],
            [
                'attribute' => 'country_code',
                'value' => 'country.name',
            ],
            'start_date:date',
            'end_date:date',
            [
                'attribute' => 'rating',
                'value' => function ($model) {
                    return str_repeat('★', $model->rating) . str_repeat('☆', 5 - $model->rating);
                },
            ],
            [
                'class' => ActionColumn::class,
                'template' => '{update} {delete}',
                'visible' => !Yii::$app->user->isGuest,
            ],
        ],
    ]) ?>
</div>

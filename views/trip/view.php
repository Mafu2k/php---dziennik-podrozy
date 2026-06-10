<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Podróże', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trip-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->isGuest): ?>
        <p>
            <?= Html::a('Edytuj', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Usuń', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Czy na pewno chcesz usunąć tę podróż?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php endif; ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            [
                'attribute' => 'country_code',
                'value' => $model->country->name,
            ],
            'start_date:date',
            'end_date:date',
            [
                'label' => 'Czas trwania',
                'value' => $model->durationInDays . ($model->durationInDays === 1 ? ' dzień' : ' dni'),
            ],
            [
                'attribute' => 'rating',
                'value' => str_repeat('★', $model->rating) . str_repeat('☆', 5 - $model->rating),
            ],
            'description:ntext',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

    <p><?= Html::a('Wróć do listy', ['index'], ['class' => 'btn btn-outline-secondary']) ?></p>
</div>

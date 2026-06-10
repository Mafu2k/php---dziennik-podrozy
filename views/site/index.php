<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;

$this->title = Yii::$app->name;
?>
<div class="site-index">
    <div class="p-5 mb-4 mt-3 bg-body-tertiary rounded-3 text-center">
        <h1 class="display-4">Dziennik Podróży</h1>
        <p class="lead">Aplikacja do zapisywania i oceniania odbytych podróży, zbudowana w frameworku Yii 2.</p>
        <p>
            <?= Html::a('Zobacz podróże', ['/trip/index'], ['class' => 'btn btn-primary btn-lg']) ?>
            <?= Html::a('Przeglądaj kraje', ['/country/index'], ['class' => 'btn btn-outline-secondary btn-lg']) ?>
        </p>
    </div>

    <div class="row text-center mb-4">
        <div class="col-md-6">
            <h2 class="display-6"><?= $tripCount ?></h2>
            <p class="text-body-secondary">zapisanych podróży</p>
        </div>
        <div class="col-md-6">
            <h2 class="display-6"><?= $visitedCountries ?></h2>
            <p class="text-body-secondary">odwiedzonych krajów</p>
        </div>
    </div>

    <h2 class="mb-3">Ostatnio dodane</h2>

    <?php if (empty($latestTrips)): ?>
        <p>Nie dodano jeszcze żadnej podróży.</p>
    <?php else: ?>
        <div class="row">
            <?php foreach ($latestTrips as $trip): ?>
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?= Html::encode($trip->title) ?></h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary"><?= Html::encode($trip->country->name) ?></h6>
                            <p class="card-text"><?= Html::encode(StringHelper::truncate((string) $trip->description, 120)) ?></p>
                            <?= Html::a('Czytaj więcej', ['/trip/view', 'id' => $trip->id], ['class' => 'card-link']) ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

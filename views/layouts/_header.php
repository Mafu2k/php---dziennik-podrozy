<?php

use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Html;

$items = [
    ['label' => 'Strona główna', 'url' => ['/site/index']],
    ['label' => 'Podróże', 'url' => ['/trip/index']],
    ['label' => 'Kraje', 'url' => ['/country/index']],
    ['label' => 'O projekcie', 'url' => ['/site/about']],
    ['label' => 'Kontakt', 'url' => ['/site/contact']],
    [
        'label' => 'Zaloguj się',
        'url' => ['/site/login'],
        'visible' => Yii::$app->user->isGuest,
    ],
    [
        'label' => 'Wyloguj (' . Html::encode(Yii::$app->user->identity->username ?? '') . ')',
        'url' => ['/site/logout'],
        'linkOptions' => [
            'data-method' => 'post',
            'class' => 'nav-link logout',
        ],
        'visible' => !Yii::$app->user->isGuest,
    ],
];

?>
<header id="header">
    <?php NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top'],
    ]) ?>
    <?= Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto'],
        'encodeLabels' => false,
        'items' => $items,
    ]) ?>
    <?= Html::button('&#127769;', [
        'id' => 'theme-toggle',
        'class' => 'btn btn-link nav-link fs-5',
        'aria-label' => 'Przełącz tryb ciemny',
    ]) ?>
    <?php NavBar::end() ?>
</header>

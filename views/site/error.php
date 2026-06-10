<?php

use yii\helpers\Html;
use yii\web\HttpException;

$this->title = $name;
$statusCode = $exception instanceof HttpException ? $exception->statusCode : 500;
?>
<div class="site-error text-center">
    <h1 class="display-1 fw-bold text-body-secondary mb-0"><?= Html::encode($statusCode) ?></h1>

    <h2 class="display-6 fw-semibold mb-3"><?= Html::encode($message) ?></h2>

    <p class="text-body-secondary mb-4">
        Powyższy błąd wystąpił podczas przetwarzania żądania przez serwer.<br>
        Jeśli uważasz, że to błąd aplikacji, skontaktuj się z nami przez formularz kontaktowy.
    </p>

    <?= Html::a('Wróć na stronę główną', Yii::$app->homeUrl, ['class' => 'btn btn-outline-primary btn-lg']) ?>
</div>

<?php

use yii\helpers\Html;

$this->title = 'O projekcie';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p class="lead">
        Dziennik Podróży to projekt zaliczeniowy z przedmiotu &bdquo;Działania na frameworkach PHP&rdquo;.
    </p>

    <p>Aplikacja pozwala zapisywać odbyte podróże, przypisywać je do krajów i oceniać w skali od 1 do 5.</p>

    <h2 class="h4 mt-4">Co zostało wykorzystane</h2>

    <ul>
        <li>Yii 2 Basic Project Template zainstalowany przez Composer</li>
        <li>wzorzec MVC &mdash; kontrolery, modele Active Record i widoki</li>
        <li>migracje bazodanowe wraz z wstawianiem danych (<code>batchInsert</code>)</li>
        <li>walidacja modeli, w tym walidator własny i scenariusz z <code>exist</code></li>
        <li>formularze oparte o <code>ActiveForm</code> z captchą</li>
        <li>paginacja wyników (<code>Pagination</code> + <code>LinkPager</code> oraz <code>GridView</code>)</li>
        <li>REST API oparte o <code>yii\rest\ActiveController</code> z ładnymi adresami URL</li>
        <li>kontrola dostępu &mdash; filtry <code>AccessControl</code> i <code>VerbFilter</code></li>
    </ul>

    <h2 class="h4 mt-4">Baza danych</h2>

    <p>
        Projekt domyślnie korzysta z bazy SQLite, dzięki czemu można go uruchomić bez konfigurowania
        serwera baz danych. Po zmianie pliku <code>config/db.php</code> działa też z MySQL (XAMPP).
    </p>

    <p>
        <?= Html::a('Wróć na stronę główną', Yii::$app->homeUrl, ['class' => 'btn btn-outline-primary']) ?>
    </p>
</div>

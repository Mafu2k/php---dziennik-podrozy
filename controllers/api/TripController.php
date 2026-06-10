<?php

namespace app\controllers\api;

use app\models\Trip;
use yii\rest\ActiveController;

class TripController extends ActiveController
{
    public $modelClass = Trip::class;
}

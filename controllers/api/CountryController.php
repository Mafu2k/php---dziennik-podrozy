<?php

namespace app\controllers\api;

use app\models\Country;
use yii\rest\ActiveController;

class CountryController extends ActiveController
{
    public $modelClass = Country::class;

    public function actions()
    {
        $actions = parent::actions();

        unset($actions['delete'], $actions['create'], $actions['update']);

        return $actions;
    }
}

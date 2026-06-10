<?php

namespace app\controllers;

use app\models\Country;
use yii\data\Pagination;
use yii\web\Controller;

class CountryController extends Controller
{
    public function actionIndex()
    {
        $query = Country::find()->with('trips');

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'countries' => $countries,
            'pagination' => $pagination,
        ]);
    }
}

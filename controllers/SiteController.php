<?php

namespace app\controllers;

use app\models\ContactForm;
use app\models\LoginForm;
use app\models\Trip;
use Yii;
use yii\captcha\CaptchaAction;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ErrorAction;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
            ],
            'captcha' => [
                'class' => CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $latestTrips = Trip::find()
            ->with('country')
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(3)
            ->all();

        return $this->render('index', [
            'latestTrips' => $latestTrips,
            'tripCount' => (int) Trip::find()->count(),
            'visitedCountries' => (int) Trip::find()->select('country_code')->distinct()->count(),
        ]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', ['model' => $model]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();

        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('success', 'Dziękujemy za wiadomość. Odpowiemy najszybciej, jak to możliwe.');

            return $this->refresh();
        }

        return $this->render('contact', ['model' => $model]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}

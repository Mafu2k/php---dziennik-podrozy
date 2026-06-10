<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Trip extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%trip}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public function rules()
    {
        return [
            [['title', 'country_code', 'start_date', 'end_date'], 'required'],
            ['title', 'string', 'max' => 128],
            ['description', 'string'],
            ['country_code', 'exist', 'targetClass' => Country::class, 'targetAttribute' => 'code'],
            [['start_date', 'end_date'], 'date', 'format' => 'php:Y-m-d'],
            ['end_date', 'validateEndDate'],
            ['rating', 'default', 'value' => 3],
            ['rating', 'integer', 'min' => 1, 'max' => 5],
        ];
    }

    public function validateEndDate($attribute, $params)
    {
        if (!$this->hasErrors() && $this->end_date < $this->start_date) {
            $this->addError($attribute, 'Data zakończenia nie może być wcześniejsza niż data rozpoczęcia.');
        }
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Tytuł',
            'description' => 'Opis',
            'country_code' => 'Kraj',
            'start_date' => 'Data rozpoczęcia',
            'end_date' => 'Data zakończenia',
            'rating' => 'Ocena',
            'created_at' => 'Utworzono',
            'updated_at' => 'Zaktualizowano',
        ];
    }

    public function getCountry()
    {
        return $this->hasOne(Country::class, ['code' => 'country_code']);
    }

    public function getDurationInDays()
    {
        return (int) round((strtotime($this->end_date) - strtotime($this->start_date)) / 86400) + 1;
    }

    public function fields()
    {
        $fields = parent::fields();

        $fields['duration'] = function ($model) {
            return $model->durationInDays;
        };

        return $fields;
    }

    public function extraFields()
    {
        return ['country'];
    }
}

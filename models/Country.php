<?php

namespace app\models;

use yii\db\ActiveRecord;

class Country extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%country}}';
    }

    public function rules()
    {
        return [
            [['code', 'name'], 'required'],
            ['code', 'string', 'length' => 2],
            ['code', 'unique'],
            ['name', 'string', 'max' => 52],
            ['population', 'default', 'value' => 0],
            ['population', 'integer', 'min' => 0],
        ];
    }

    public function attributeLabels()
    {
        return [
            'code' => 'Kod',
            'name' => 'Nazwa',
            'population' => 'Liczba ludności',
        ];
    }

    public function getTrips()
    {
        return $this->hasMany(Trip::class, ['country_code' => 'code']);
    }

    public function extraFields()
    {
        return ['trips'];
    }
}

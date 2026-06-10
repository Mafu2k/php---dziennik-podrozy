<?php

use yii\db\Migration;

class m260602_190200_seed_trip_table extends Migration
{
    public function safeUp()
    {
        $now = time();

        $this->batchInsert(
            '{{%trip}}',
            ['title', 'description', 'country_code', 'start_date', 'end_date', 'rating', 'created_at', 'updated_at'],
            [
                ['Tydzień nad Adriatykiem', 'Zwiedzanie Splitu i Dubrownika, kąpiele w morzu i degustacja lokalnej kuchni.', 'HR', '2025-07-12', '2025-07-19', 5, $now, $now],
                ['Weekend w Pradze', 'Szybki wypad pociągiem, spacer po moście Karola, Hradczany i knedliki.', 'CZ', '2025-09-05', '2025-09-07', 4, $now, $now],
                ['Objazd po Toskanii', 'Florencja, Siena i San Gimignano wynajętym samochodem.', 'IT', '2025-10-18', '2025-10-25', 5, $now, $now],
                ['Zima na Islandii', 'Polowanie na zorzę polarną, Błękitna Laguna i wodospad Gullfoss.', 'IS', '2026-01-30', '2026-02-05', 4, $now, $now],
                ['Majówka w Lizbonie', 'Tramwaj 28, pasteis de nata i punkty widokowe w Alfamie.', 'PT', '2026-05-01', '2026-05-04', 5, $now, $now],
            ]
        );
    }

    public function safeDown()
    {
        $this->delete('{{%trip}}', ['title' => [
            'Tydzień nad Adriatykiem',
            'Weekend w Pradze',
            'Objazd po Toskanii',
            'Zima na Islandii',
            'Majówka w Lizbonie',
        ]]);
    }
}

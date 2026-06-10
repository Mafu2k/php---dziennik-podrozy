<?php

use yii\db\Migration;

class m260512_174300_create_country_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%country}}', [
            'code' => $this->char(2)->notNull()->append('PRIMARY KEY'),
            'name' => $this->string(52)->notNull(),
            'population' => $this->integer()->notNull()->defaultValue(0),
        ]);

        $this->batchInsert('{{%country}}', ['code', 'name', 'population'], [
            ['PL', 'Polska', 36620000],
            ['DE', 'Niemcy', 83450000],
            ['FR', 'Francja', 68290000],
            ['ES', 'Hiszpania', 48350000],
            ['IT', 'Włochy', 58990000],
            ['PT', 'Portugalia', 10640000],
            ['GR', 'Grecja', 10300000],
            ['HR', 'Chorwacja', 3850000],
            ['CZ', 'Czechy', 10900000],
            ['SK', 'Słowacja', 5420000],
            ['AT', 'Austria', 9130000],
            ['NO', 'Norwegia', 5550000],
            ['IS', 'Islandia', 393000],
            ['TR', 'Turcja', 85320000],
            ['EG', 'Egipt', 114500000],
            ['TH', 'Tajlandia', 71800000],
            ['JP', 'Japonia', 123100000],
            ['US', 'Stany Zjednoczone', 340100000],
            ['MX', 'Meksyk', 129700000],
            ['BR', 'Brazylia', 211100000],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%country}}');
    }
}

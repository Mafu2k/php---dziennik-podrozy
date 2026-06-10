<?php

use yii\db\Migration;

class m260519_181500_create_trip_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%trip}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(128)->notNull(),
            'description' => $this->text(),
            'country_code' => $this->char(2)->notNull(),
            'start_date' => $this->date()->notNull(),
            'end_date' => $this->date()->notNull(),
            'rating' => $this->integer()->notNull()->defaultValue(3),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'FOREIGN KEY ([[country_code]]) REFERENCES {{%country}} ([[code]])',
        ]);

        $this->createIndex('idx-trip-country_code', '{{%trip}}', 'country_code');
    }

    public function safeDown()
    {
        $this->dropIndex('idx-trip-country_code', '{{%trip}}');
        $this->dropTable('{{%trip}}');
    }
}

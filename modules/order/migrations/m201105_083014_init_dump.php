<?php

use yii\db\Migration;

/**
 * Class m201105_083014_init_dump
 */
class m201105_083014_init_dump extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(file_get_contents(__DIR__ . '/dump/test_db_structure.sql'));
        $this->execute(file_get_contents(__DIR__ . '/dump/test_db_data.sql'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('orders');
        $this->dropTable('services');
        $this->dropTable('users');
    }
}

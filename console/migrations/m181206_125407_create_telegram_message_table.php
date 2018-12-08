<?php

use yii\db\Migration;

/**
 * Handles the creation of table `telegram_message`.
 */
class m181206_125407_create_telegram_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('telegram_message', [
            'id' => $this->primaryKey(),
            'description' => $this->text(),
            'status' => $this->integer(),
            'user_id' => $this->integer(),
        ]);

        $this->addForeignKey('fk_project_users_initiator', 'project', 'initiator_id', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('telegram_message');
    }
}

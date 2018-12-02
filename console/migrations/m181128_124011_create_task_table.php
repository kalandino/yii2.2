<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tasks`.
 */
class m181128_124011_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'date' => $this->dateTime()->notNull(),
            'description' => $this->text(),
            'responsible_id' => $this->integer(),
            'initiator_id' => $this->integer(),
            'project_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            // 'user_id' => $this->integer()
        ]);

        $this->addForeignKey('fk_task_users_responsible', 'task', 'responsible_id', 'user', 'id');
        $this->addForeignKey('fk_task_users_initiator', 'task', 'initiator_id', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('task');
    }
}

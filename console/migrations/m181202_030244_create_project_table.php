<?php

use yii\db\Migration;

/**
 * Handles the creation of table `project`.
 */
class m181202_030244_create_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('project', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'date' => $this->dateTime()->notNull(),
            'description' => $this->text(),
            'responsible_id' => $this->integer(),
            'initiator_id' => $this->integer(),
            'project_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey('fk_project_users_responsible', 'project', 'responsible_id', 'user', 'id');
        $this->addForeignKey('fk_project_users_initiator', 'project', 'initiator_id', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('project');
    }
}

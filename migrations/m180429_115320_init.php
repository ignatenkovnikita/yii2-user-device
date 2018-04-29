<?php

use yii\db\Migration;

/**
 * Class m180429_115320_init
 */
class m180429_115320_init extends Migration
{
    const TABLE_USER_DEVICE = '{{%user_device}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_USER_DEVICE, [
            'id' => $this->primaryKey(),
            'uuid' => $this->string()->notNull()->unique(),
            'status_id' => $this->integer()->defaultValue(1),
            'json' => $this->text(),
            'token' => $this->string()->notNull(),
            'created_at' => $this->bigInteger(),
            'updated_at' => $this->bigInteger(),
            'author_id' => $this->integer(),
            'updater_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_USER_DEVICE);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180429_115320_init cannot be reverted.\n";

        return false;
    }
    */
}

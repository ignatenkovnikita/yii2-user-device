<?php

use yii\db\Migration;

/**
 * Class m230222_140840_drop_not_null_token
 */
class m230222_140840_drop_not_null_token extends Migration
{
    const TABLE_USER_DEVICE = '{{%user_device}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn(self::TABLE_USER_DEVICE, 'token', $this->string());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230222_140840_drop_not_null_token cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230222_140840_drop_not_null_token cannot be reverted.\n";

        return false;
    }
    */
}

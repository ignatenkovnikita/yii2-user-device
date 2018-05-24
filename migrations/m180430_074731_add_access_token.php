<?php

use yii\db\Migration;

/**
 * Class m180430_074731_add_access_token
 */
class m180430_074731_add_access_token extends Migration
{
    const TABLE_USER_DEVICE = '{{%user_device}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(self::TABLE_USER_DEVICE, 'access_token', $this->string());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(self::TABLE_USER_DEVICE, 'access_token');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180430_074731_add_access_token cannot be reverted.\n";

        return false;
    }
    */
}

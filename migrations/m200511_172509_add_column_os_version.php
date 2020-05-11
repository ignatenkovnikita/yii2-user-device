<?php

use yii\db\Migration;

/**
 * Class m200511_172509_add_column_os_version
 */
class m200511_172509_add_column_os_version extends Migration
{
    const TABLE_USER_DEVICE = '{{%user_device}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(self::TABLE_USER_DEVICE, 'os', $this->string());
        $this->addColumn(self::TABLE_USER_DEVICE, 'version', $this->string());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200511_172509_add_column_os_version cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200511_172509_add_column_os_version cannot be reverted.\n";

        return false;
    }
    */
}

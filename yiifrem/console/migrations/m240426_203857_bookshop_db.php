<?php

use yii\db\Migration;

/**
 * Class m240426_203857_bookshop_db
 */
class m240426_203857_bookshop_db extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = "CREATE TABLE `book` (
            `id` integer auto_increment PRIMARY KEY,
            `name` varchar(255),
            `author` varchar(255),
            `price` varchar(255),
            `createdtime` date,
            `description` text
          );
          
          CREATE TABLE `bookimg` (
            `bookid` integer,
            `path` varchar(255)
          );
          
          ALTER TABLE `bookimg` ADD FOREIGN KEY (`bookid`) REFERENCES `book` (`id`);";
          $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240426_203857_bookshop_db cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240426_203857_bookshop_db cannot be reverted.\n";

        return false;
    }
    */
}

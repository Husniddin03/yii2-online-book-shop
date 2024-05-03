<?php

use yii\db\Migration;

/**
 * Class m240503_085422_bookfyle_db_init
 */
class m240503_085422_bookfyle_db_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = "CREATE TABLE `bookfile` (
            `bookid` integer,
            `path` varchar(255)
          );
          
          ALTER TABLE `bookfile` ADD FOREIGN KEY (`bookid`) REFERENCES `book` (`id`);";
          $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240503_085422_bookfyle_db_init cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240503_085422_bookfyle_db_init cannot be reverted.\n";

        return false;
    }
    */
}

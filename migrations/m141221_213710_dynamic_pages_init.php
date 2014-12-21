<?php

use yii\db\Schema;
use yii\db\Migration;

class m141221_213710_dynamic_pages_init extends Migration
{
    public function up()
    {
		$command = $this->db->createCommand("CREATE TABLE IF NOT EXISTS `dynamic_page` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `name` varchar(255) NOT NULL,
			  `text` text NOT NULL,
			  `dt_created` datetime NOT NULL,
			  `display` tinyint(2) NOT NULL,
			  `public` tinyint(2) NOT NULL,
			  `translit` varchar(50) DEFAULT NULL,
			  PRIMARY KEY (`id`),
			  KEY `display` (`display`,`public`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");
		$command->execute();
    }

    public function down()
    {
        echo "m141221_213710_dynamic_pages_init cannot be reverted.\n";

        return false;
    }
}

<?php

use yii\db\Schema;
use yii\db\Migration;

class m141221_214221_menu_init extends Migration
{
    public function up()
    {
		$command = $this->db->createCommand("CREATE TABLE IF NOT EXISTS `menu` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `name` varchar(50) NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ; ".

			"CREATE TABLE IF NOT EXISTS `menu_item` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `id_menu` int(11) NOT NULL,
			  `id_parent` int(11) NOT NULL,
			  `url` varchar(255) NOT NULL,
			  `name` varchar(50) NOT NULL,
			  `display` int(11) NOT NULL,
			  `position` int(11) NOT NULL,
			  PRIMARY KEY (`id`),
			  KEY `id_menu` (`id_menu`,`id_parent`,`display`,`position`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;");
		$command->execute();
    }

    public function down()
    {
        echo "m141221_214221_menu_init cannot be reverted.\n";

        return false;
    }
}

<?php

use yii\db\Schema;
use yii\db\Migration;

class m141221_213034_user_init extends Migration
{
    public function up()
    {
		$command = $this->db->createCommand("CREATE TABLE IF NOT EXISTS `user` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `username` varchar(50) NOT NULL,
			  `password` varchar(255) NOT NULL,
			  `email` varchar(50) NOT NULL,
			  `status` tinyint(2) NOT NULL,
			  `dt_created` datetime NOT NULL,
			  `auth_key` varchar(255) NOT NULL,
			  `access_token` varchar(255) NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");
		$command->execute();

		$command = $this->db->createCommand("INSERT INTO `user` (`id`, `username`, `password`, `email`, `status`, `dt_created`, `auth_key`, `access_token`) VALUES
			(1, 'admin', '\$2y$13\$t6K0.4DBTSjR455nCZLu8OBnzvUeRuSA/1hX0slksp6UncO367e0S', 'aaaadmin@mail.ru', 1, '2014-11-22 14:00:20', '', 'xhMlyJm7CgEUmR6Hh8bjKJw6nqwnpAX0');");
		$command->execute();
    }

    public function down()
    {
        echo "m141221_213034_user_init cannot be reverted.\n";

        return false;
    }
}

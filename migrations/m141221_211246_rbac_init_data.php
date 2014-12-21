<?php

use yii\db\Schema;
use yii\db\Migration;

class m141221_211246_rbac_init_data extends Migration
{
    public function up()
    {
		$command = $this->db->createCommand("INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
			('admin', 1, 'Administrator', NULL, NULL, 1416664724, 1416664724),
			('admin.settings', 2, 'Админ : настройки', NULL, NULL, 1417363347, 1417377726),
			('dynamic_page.admin.add', 2, 'Динамические страницы : добавить', NULL, NULL, 1417377796, 1417377796),
			('dynamic_page.admin.delete', 2, 'Динамические страницы : удалить', NULL, NULL, 1417377925, 1417377925),
			('dynamic_page.admin.delete-selected', 2, 'Динамические страницы : удалить выбранные', NULL, NULL, 1417378051, 1417378051),
			('dynamic_page.admin.edit', 2, 'Динамические страницы : изменить', NULL, NULL, 1417377859, 1417377859),
			('dynamic_page.admin.index', 2, 'Динамические страницы : список', NULL, NULL, 1417377666, 1417555922),
			('menu.admin.add', 2, 'Меню : добавить', NULL, NULL, 1417379360, 1417379360),
			('menu.admin.delete', 2, 'Меню : удалить', NULL, NULL, 1417379430, 1417379430),
			('menu.admin.delete-selected', 2, 'Меню : удалить выбранные', NULL, NULL, 1417379460, 1417379460),
			('menu.admin.edit', 2, 'Меню : изменить', NULL, NULL, 1417379395, 1417379395),
			('menu.admin.index', 2, 'Меню : список', NULL, NULL, 1417379314, 1417379314),
			('menu.admin.item-add', 2, 'Меню : пункт добавить', NULL, NULL, 1417379505, 1417379505),
			('menu.admin.item-delete', 2, 'Меню : пункт удалить', NULL, NULL, 1417379561, 1417379561),
			('menu.admin.item-edit', 2, 'Меню : пункт изменить', NULL, NULL, 1417379534, 1417379534),
			('rbac.admin.permissions', 2, 'Rbac операции : список', NULL, NULL, 1417378453, 1417379626),
			('rbac.admin.permissions-add', 2, 'Rbac операции : добавить', NULL, NULL, 1417378496, 1417378496),
			('rbac.admin.permissions-delete', 2, 'Rbac операции : удалить', NULL, NULL, 1417378994, 1417378994),
			('rbac.admin.permissions-delete-selected', 2, 'Rbac операции : удалить выбранные', NULL, NULL, 1417379056, 1417379056),
			('rbac.admin.permissions-edit', 2, 'Rbac операции : редактировать', NULL, NULL, 1417378968, 1417378968),
			('rbac.admin.roles', 2, 'Rbac роли : список', NULL, NULL, 1417378138, 1417378138),
			('rbac.admin.roles-add', 2, 'Rbac роли : добавить', NULL, NULL, 1417378189, 1417378189),
			('rbac.admin.roles-delete', 2, 'Rbac роли : удалить', NULL, NULL, 1417378275, 1417378275),
			('rbac.admin.roles-delete-selected', 2, 'Rbac роли : удалить выбранные', NULL, NULL, 1417378333, 1417378333),
			('rbac.admin.roles-edit', 2, 'Rbac роли : редактировать', NULL, NULL, 1417378239, 1417378239),
			('superadmin', 1, 'Суперадмин', NULL, NULL, 1417377716, 1417377716),
			('user.admin.add', 2, 'Пользователи : добавить', NULL, NULL, 1417379182, 1417379182),
			('user.admin.delete', 2, 'Пользователи : удалить', NULL, NULL, 1417379243, 1417379243),
			('user.admin.delete-selected', 2, 'Пользователи : удалить выбранные', NULL, NULL, 1417379276, 1417379276),
			('user.admin.edit', 2, 'Пользователи : редактировать', NULL, NULL, 1417379213, 1417379213),
			('user.admin.index', 2, 'Пользователи : список', NULL, NULL, 1416664770, 1417379106);");

		$command->execute();

		$command = $this->db->createCommand("INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
			('admin', 'admin.settings'),
			('superadmin', 'admin.settings'),
			('admin', 'dynamic_page.admin.add'),
			('superadmin', 'dynamic_page.admin.add'),
			('admin', 'dynamic_page.admin.delete'),
			('superadmin', 'dynamic_page.admin.delete'),
			('admin', 'dynamic_page.admin.delete-selected'),
			('superadmin', 'dynamic_page.admin.delete-selected'),
			('admin', 'dynamic_page.admin.edit'),
			('superadmin', 'dynamic_page.admin.edit'),
			('admin', 'dynamic_page.admin.index'),
			('superadmin', 'dynamic_page.admin.index'),
			('admin', 'menu.admin.add'),
			('superadmin', 'menu.admin.add'),
			('admin', 'menu.admin.delete'),
			('superadmin', 'menu.admin.delete'),
			('admin', 'menu.admin.delete-selected'),
			('superadmin', 'menu.admin.delete-selected'),
			('admin', 'menu.admin.edit'),
			('superadmin', 'menu.admin.edit'),
			('admin', 'menu.admin.index'),
			('superadmin', 'menu.admin.index'),
			('admin', 'menu.admin.item-add'),
			('superadmin', 'menu.admin.item-add'),
			('admin', 'menu.admin.item-delete'),
			('superadmin', 'menu.admin.item-delete'),
			('admin', 'menu.admin.item-edit'),
			('superadmin', 'menu.admin.item-edit'),
			('admin', 'rbac.admin.permissions'),
			('superadmin', 'rbac.admin.permissions'),
			('admin', 'rbac.admin.permissions-add'),
			('superadmin', 'rbac.admin.permissions-add'),
			('admin', 'rbac.admin.permissions-delete'),
			('superadmin', 'rbac.admin.permissions-delete'),
			('admin', 'rbac.admin.permissions-delete-selected'),
			('superadmin', 'rbac.admin.permissions-delete-selected'),
			('admin', 'rbac.admin.permissions-edit'),
			('superadmin', 'rbac.admin.permissions-edit'),
			('admin', 'rbac.admin.roles'),
			('superadmin', 'rbac.admin.roles'),
			('admin', 'rbac.admin.roles-add'),
			('superadmin', 'rbac.admin.roles-add'),
			('admin', 'rbac.admin.roles-delete'),
			('superadmin', 'rbac.admin.roles-delete'),
			('admin', 'rbac.admin.roles-delete-selected'),
			('superadmin', 'rbac.admin.roles-delete-selected'),
			('admin', 'rbac.admin.roles-edit'),
			('superadmin', 'rbac.admin.roles-edit'),
			('admin', 'user.admin.add'),
			('superadmin', 'user.admin.add'),
			('admin', 'user.admin.delete'),
			('superadmin', 'user.admin.delete'),
			('admin', 'user.admin.delete-selected'),
			('superadmin', 'user.admin.delete-selected'),
			('admin', 'user.admin.edit'),
			('superadmin', 'user.admin.edit'),
			('admin', 'user.admin.index'),
			('superadmin', 'user.admin.index')");

		$command->execute();

		$command = $this->db->createCommand("INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
			('admin', '1', 1416664821);");
		$command->execute();
    }

    public function down()
    {
        echo "m141221_211246_rbac_init cannot be reverted.\n";

        return false;
    }
}

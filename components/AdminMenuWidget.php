<?php
namespace app\components;

use yii\base\Widget;
use yii\widgets\Menu;

class AdminMenuWidget extends Widget
{

	public function run()
	{
		return Menu::widget([
			'options' => [ 'class' => 'main-menu nav nav-pills nav-stacked'],
			'activateParents' => true,
			'items'=> [
				[ 	'label' 	=> 'Страницы', 'url'=> ['/dynamic_page/admin'],
					'active' 	=> $this->checkModuleActive('dynamic_page'),
					'visible' 	=> \Yii::$app->user->can('dynamic_page.admin.index')
				],

				[	'label' => 'RBAC', 'url'=> ['/rbac/admin/roles'],
					'active'=> $this->checkModuleActive('rbac'),
					'visible'=> \Yii::$app->user->can('rbac.admin.roles'),
					'items'=>[
						[	'label'=>'Роли(групы)', 'url'=>array('/rbac/admin/roles'),
							'active'=>$this->isInRoles(),
							'visible'=> \Yii::$app->user->can('rbac.admin.roles')
						],
						[	'label'=>'Операции', 'url'=>array('/rbac/admin/permissions'),
							'active'=>$this->isInOperations(),
							'visible'=> \Yii::$app->user->can('rbac.admin.permissions')
						]
					]
				],

				[	'label'=>'Пользователи', 'url'=>array('/user/admin'),
					'active'=> $this->checkModuleActive('user'),
					'visible'=> \Yii::$app->user->can('user.admin.index')
				],

				[	'label'=>'Меню', 'url'=>array('/menu/admin'),
					'active'=> $this->checkModuleActive('menu'),
					'visible'=> \Yii::$app->user->can('menu.admin.index')
				]
			]
		]);
	}

	private function checkModuleActive($moduleId){
		return \Yii::$app->controller->module->id == $moduleId;
	}

	private function isInRoles(){
		$action = \Yii::$app->controller->action->id;
		return  $action == 'roles-edit' || $action == 'roles-add' || $action == 'roles';
	}

	private function isInOperations(){
		$action = \Yii::$app->controller->action->id;
		return  $action == 'permissions' || $action == 'permissions-edit' || $action == 'permissions-add';
	}
}
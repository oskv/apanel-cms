<?php
namespace app\modules\rbac\controllers;

use app\modules\rbac\models\PermissionSearch;
use Yii;
use app\components\ApanelAdminController;
use app\modules\rbac\models\Role;
use app\modules\rbac\models\Permission;

class AdminController extends ApanelAdminController
{

	public function actionIndex()
	{
		return $this->actionRoles();
	}

	public function actionRoles()
	{
		$roles = Role::getAll();
		return $this->render('roles', ['models' => $roles]);
	}

	public function actionRolesAdd($id = null)
	{
		$auth = Yii::$app->authManager;
		$model = new Role();
		if($id){
			$role = $auth->getRole($id);
			$model->id = $role->name;
			$model->name = $role->description;
		}

		if(isset($_POST['Role'])){
			$model->attributes  = Yii::$app->request->post('Role');
			if ($model->validate()) {
				$role = $auth->getRole($model->id);
				if(!empty($role)){
					$role->description = $model->name;
					$auth->update($model->id, $role);
				}else{
					$role = $auth->createRole($model->id);
					$role->description = $model->name;
					$auth->add($role);
				}
				$this->redirect('roles');
			}
		}
		return $this->render('roles-add', ['model' => $model]);
	}

	public function actionRolesEdit($id)
	{
		return $this->actionRolesAdd($id);
	}

	public function actionRolesDelete($id)
	{
		$auth = Yii::$app->authManager;
		$auth->remove($auth->getRole($id));
		$this->redirect('roles');
	}

	public function actionRolesDeleteSelected()
	{
		$auth = Yii::$app->authManager;
		if(isset($_POST['Role'])){

			foreach($_POST['Role'] as $k=>$val){
				if($val['id']){
					$auth->remove($auth->getRole($k));
				}
			}
		}
		$this->redirect('roles');
	}

	public function actionPermissions()
	{
		$auth = Yii::$app->authManager;
		$searchModel = new PermissionSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->get());

		return $this->render('permissions', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
			'permissions' => $auth->getPermissions(),
			'roles' => $auth->getRoles()
		]);
	}

	public function actionPermissionsAdd($id = null)
	{
		$auth = Yii::$app->authManager;
		$model = new Permission();
		$roles = $auth->getRoles();
		$permission = null;

		if($id){
			$permission = $auth->getPermission($id);
			$model->id = $permission->name;
			$model->name = $permission->description;
		}

		if(isset($_POST['Permission'])){
			$model->attributes  = Yii::$app->request->post('Permission');
			if ($model->validate()) {
				$permission = $auth->getPermission($model->id);
				if(!empty($permission)){
					$permission->description = $model->name;
					$auth->update($model->id, $permission);
				}else{
					$permission = $auth->createPermission($model->id);
					$permission->description = $model->name;
					$auth->add($permission);
				}

				foreach($roles as $role){
					if(isset($model->attributes['accessRoles'][$role->name])){
						if(!$auth->hasChild($role, $permission)){
							$auth->addChild($role, $permission);
						}
					}else{
						$auth->removeChild($role, $permission);
					}
				}
				$this->redirect('permissions');
			}
		}
		return $this->render('permissions-add', [
			'model' => $model,
			'roles' => $roles,
			'permission' => $permission,
			'auth' => $auth
		]);
	}

	public function actionPermissionsEdit($id)
	{
		return $this->actionPermissionsAdd($id);
	}

	public function actionPermissionsDelete($id)
	{
		$auth = Yii::$app->authManager;
		$auth->remove($auth->getPermission($id));
		$this->redirect('permissions');
	}

	public function actionPermissionsDeleteSelected()
	{
		$auth = Yii::$app->authManager;
		if(isset($_GET['selection'])){
			foreach($_GET['selection'] as $k=>$val){
				$auth->remove($auth->getPermission($val));
			}
		}
		$this->redirect('permissions');
	}

}
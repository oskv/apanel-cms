<?php
namespace app\modules\user\controllers;

use app\modules\user\models\User;
use app\modules\user\models\UserSearch;
use Yii;
use app\components\ApanelAdminController;

class AdminController extends ApanelAdminController
{

	public function actionIndex()
	{
		$searchModel = new UserSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->get());

		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel
		]);
	}

	public function actionAdd($id = null)
	{
		$id = intval($id);
		$rolesArr = [ 0 => 'Не задано'];
		$oldPass = null;

		foreach(Yii::$app->authManager->getRoles() as $k=>$data){
			$rolesArr[$k] = $data->description;
		}

		if(!$id){
			$model = new User(['scenario' => 'add']);
		}else{
			$model = User::findOne($id);
			$model->password = null;
			$model->roleId = $model->getRoleId();
			if(empty($model)){
				$model = new User(['scenario' => 'add']);
			}
		}

		if(isset($_POST['User'])){
			$model->password_old = $model->password;
			$postData = Yii::$app->request->post('User');
			$model->attributes = $postData;

			if ($model->validate()) {
				$model->save();
				$this->redirect('index');
			}
		}

		return $this->render('add', ['model' => $model, 'rolesArr' => $rolesArr]);
	}

	public function actionEdit($id)
	{
		return $this->actionAdd($id);
	}

	public function actionDelete($id)
	{
		$model = User::findOne($id);
		if($model){
			$model->delete();
		}
		$this->redirect('index');
	}

	public function actionDeleteSelected()
	{
		if(isset($_GET['selection'])){
			User::deleteAll(['in', 'id', $_GET['selection']]);
		}
		$this->redirect('index');
	}

}
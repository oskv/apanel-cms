<?php
namespace app\controllers;

use app\modules\user\models;
use Yii;
use yii\web\Controller;

class AdminController extends Controller
{
	public function actionIndex()
	{
		if (Yii::$app->user->can('admin.settings')) {
			return $this->actionSettings();
		}else{
			return $this->actionLogin();
		}
	}

	public function actionLogin()
	{
		$this->layout = '//admin/login';
		$model = new models\LoginForm();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			return $this->actionSettings();
		} else {
			return $this->render('@app/modules/user/views/admin/login', ['model' => $model]);
		}
	}

	public function actionLogout()
	{
		Yii::$app->user->logout();
		$this->redirect('/admin');
	}

	public function actionSettings()
	{
		if (Yii::$app->user->can('admin.settings')) {
			$this->layout = '//admin/main';
			return $this->render('settings');
		}else{
			return $this->actionLogin();
		}
	}
}

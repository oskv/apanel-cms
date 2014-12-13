<?php

namespace app\components;

use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class ApanelAdminController extends Controller
{
	public $layout='//admin/main';

	public function beforeAction($action){
		if (\Yii::$app->user->isGuest) {
			$this->redirect('/admin');
		}

		$authItem = \Yii::$app->controller->module->id
			.'.'.\Yii::$app->controller->id
			.'.'.\Yii::$app->controller->action->id;
		if (!\Yii::$app->user->can($authItem)) {
			throw new ForbiddenHttpException('You haven\' access to this page');
		}
		return true;
	}
}

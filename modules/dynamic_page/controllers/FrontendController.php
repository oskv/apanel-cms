<?php
namespace app\modules\dynamic_page\controllers;

use yii\web\Controller;
use app\modules\dynamic_page\models\DynamicPage;
use yii\web\NotFoundHttpException;

class FrontendController extends Controller
{
	public function actionShow($url){
		$model = DynamicPage::findByUrl($url);
		if(empty($model) || !$model->display){
			throw new NotFoundHttpException('Page not found');
		}

		return $this->render('show', ['model' => $model]);
	}
}